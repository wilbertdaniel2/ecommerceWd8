<?php

use App\Models\Product;
use App\Models\Capacity;
use Gloudemans\Shoppingcart\Facades\Cart;

//Esta funcion me permite calcular el stock disponible para el producto
function quantity($product_id, $color_id = null, $capacity_id = null){
    $product = Product::find($product_id);

    if($capacity_id){
        $capacity = Capacity::find($capacity_id);

        $quantity = $capacity->colors->find($color_id)->pivot->quantity;
    }elseif($color_id){
        $quantity = $product->colors->find($color_id)->pivot->quantity;
    }else{
        $quantity = $product->quantity;
    }

    return $quantity;
}

/*Esta funcion me permite determinar la cantidad de productos que he agregado en el
carrito de compras*/
function qty_added($product_id, $color_id = null, $capacity_id = null){
    
    $cart = Cart::content();

    $item = $cart->where('id', $product_id)
                 ->where('options.color_id', $color_id)
                 ->where('options.capacity_id', $capacity_id)
                 ->first();

    if($item){
        return $item->qty;
    }else{
        return 0;
    }
}

function qty_available($product_id, $color_id = null, $capacity_id = null){

    return quantity($product_id, $color_id, $capacity_id) - qty_added($product_id, $color_id, $capacity_id);
}

function discount($item){
    $product = Product::find($item->id);
    $qty_available = qty_available($item->id, $item->options->color_id, $item->options->capacity_id);


    if ($item->options->capacity_id) {
    
        $capacity = Capacity::find($item->options->capacity_id);

        $capacity->colors()->detach($item->options->color_id);

        $capacity->colors()->attach([
            $item->options->color_id => ['quantity' => $qty_available]
        ]);

    }elseif ($item->options->color_id) {
        
        $product->colors()->detach($item->options->color_id);

        $product->colors()->attach([
            $item->options->color_id => ['quantity' => $qty_available]
        ]);

    }else{

        $product->quantity = $qty_available;

        $product->save();

    }
}

function increase($item){

    $product = Product::find($item->id);
    $quantity = quantity($item->id, $item->options->color_id, $item->options->capacity_id) + $item->qty;


    if ($item->options->capacity_id) {
    
        $capacity = Capacity::find($item->options->capacity_id);

        $capacity->colors()->detach($item->options->color_id);

        $capacity->colors()->attach([
            $item->options->color_id => ['quantity' => $quantity]
        ]);

    }elseif ($item->options->color_id) {
        
        $product->colors()->detach($item->options->color_id);

        $product->colors()->attach([
            $item->options->color_id => ['quantity' => $quantity]
        ]);

    }else{

        $product->quantity = $quantity;

        $product->save();

    }
}