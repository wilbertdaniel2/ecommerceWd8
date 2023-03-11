<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColorSize extends Model
{
    use HasFactory;

    protected $table = "color_capacity";

    //Relacion uno a mucos inversa

    public function color(){
        return $this->belongsTo(Color::class);
    }

    public function capacity(){
        return $this->belongsTo(Capacity::class);
    }
}
