<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    //Relacion muchos a muchos
    public function products(){
        return $this->belongsToMany(Product::class);
    }

    public function capacities(){
        return $this->belongsToMany(Capacity::class);
    }
}
