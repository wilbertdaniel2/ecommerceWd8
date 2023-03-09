<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    //Relacion muchos a muchos
    public function product(){
        return $this->belongsToMany(Product::class);
    }

    public function capacity(){
        return $this->belongsToMany(Capacity::class);
    }
}
