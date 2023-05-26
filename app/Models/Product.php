<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    const BORRADOR = 1;
    const PUBLICADO = 2;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    //accesores

    public function getStockAttribute(){
        if ($this->subcategory->capacity) {
            return ColorCapacity::whereHas('capacity.product', function(Builder $query){
                    $query->where('id', $this->id);
                    })->sum('quantity');
        } elseif ($this->subcategory->color) {
            return ColorProduct::whereHas('product', function(Builder $query){
                    $query->where('id', $this->id);
                    })->sum('quantity');
        }else{
            return $this->quantity;
        }
        
    }

    //Relacion uno a muchos
    public function capacities(){
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
        return $this->belongsToMany(Color::class)->withPivot('quantity', 'id');
    }

    //Relacion uno a muchos polimorfica
    public function images(){
        return $this->morphMany(Image::class, "imageable");
    }

     //Url amigables
     public function getRouteKeyName(){
        return 'slug';
    }
}
