<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Department extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    //Relacion uno a muchos
    public function municipalities(){
        return $this->hasMany(Municipality::class);
    }

    public function orders(){
        return $this->HasMany(Order::class);
    }
}
