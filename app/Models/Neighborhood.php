<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Neighborhood extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'municipality_id'];

    public function orders(){
        return $this->HasMany(Order::class);
    }
}
