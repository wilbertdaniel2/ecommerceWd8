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

function qty_avalable($product_id, $color_id = null, $capacity_id = null){

    return quantity($product_id, $color_id, $capacity_id) - qty_added($product_id, $color_id, $capacity_id);
}