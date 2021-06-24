<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Models\Product;

class CartController extends Controller
{
    public function add(Request $request){
        $producto=Product::find($request->producto_id);
        Cart::add(
            $producto->_id,
            $producto->nombre,
            $producto->precio,
            $producto->cantidad,
            

        );
        return back()->with('success',"$producto->nombre se ha agregado con exito al carrito");
    }
    public function cart(){

        return view('checkout');
    }
    public function removeProduct($id){
        
        Cart::remove($id);
        return back();
    }
}
