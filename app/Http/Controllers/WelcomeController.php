<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Cover;
use App\Models\Order;

class WelcomeController extends Controller
{
    public function __invoke()
    {

        if (auth()->user()) {

            $pendiente = Order::where('status', 1)->where('user_id', auth()->user()->id)->count();
            if ($pendiente) {

                $mensaje = "Usted tiene $pendiente ordenes pendientes. <a class='font-bold' href='". route('orders.index') ."?status=1'>Ir a pagar</a>";

                session()->flash('flash.banner', $mensaje);
            }

            
        }

        $covers = Cover::where('is_active', true)
                    ->whereDate('start_at', '<=', now())
                    ->where(function($query){
                        $query->whereDate('end_at', '>=', now())
                              ->orWhereNull('end_at');
                    })
                    ->get();

        $brands= Brand::all()->take(8); //Esta consulta no se esta usando de momento 30/05/2024

                    //return $covers;
        $categories = Category::all();
        return view('welcome', compact('covers', 'categories', 'brands'));
    }
}
