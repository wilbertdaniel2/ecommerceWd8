<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    //Relacion uno a muchos
    public function capacity(){
        return $this->hasMany(Capacity::class);
    }

    public function detail(){
        return $this->hasMany(Detail::class);
    }

    public function screen(){
        return $this->hasMany(Screen::class);
    }

    public function camera(){
        return $this->hasMany(Camera::class);
    }

    public function grid(){
        return $this->hasMany(Grid::class);
    }

    //Relacion uno a muchos inversa
    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function subcategory(){
        return $this->belongsTo(Subcategory::class);
    }

    //Relacion muchos a muchos
    public function colors(){
        return $this->belongsToMany(color::class);
    }

    //Relacion uno a muchos polimorfica
    public function images(){
        return $this->morphMany(Image::class, "imageable");
    }
}
