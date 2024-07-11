<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeatureDetail extends Model
{
    use HasFactory;

    protected $fillable = ['feature_id', 'description', 'order', 'product_id'];

    //Relacion uno a muchos
    public function product(){
        return $this->hasMany(Product::class);
    }

    public function feature(){
        return $this->belongsTo(Feature::class);
    }


    
}
