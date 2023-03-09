<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Capacity extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'product_id'];


    //Relacion uno a muchos inversa
    public function product(){
        return $this->belongsTo(Product::class);
    }

    //Relacion muchos a muchos 
    public function colors(){
        return $this->BelongsToMany(Color::class);
    }
}
