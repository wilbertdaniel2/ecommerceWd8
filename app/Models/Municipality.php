<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'cost', 'department_id'];

    public function districts(){
       return $this->hasMany(District::class); 
    }

    public function orders(){
        return $this->HasMany(Order::class);
    }
}
