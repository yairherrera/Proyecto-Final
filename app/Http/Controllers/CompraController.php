<?php

namespace App\Http\Controllers;

use App\Mail\Compra;
use Illuminate\Http\Request;

class CompraController extends Controller
{
    public function index(){
        return view('compra.index');
    }
    public function store(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'reuired|email',
            'mensaje' => 'required',
        ]);
        $correo = new Compra($request->all());
        \Mail::to('unapersonaenojada@gmail.com')->send($correo);
        
        return redirect()->route('productos.index');
    }
}
