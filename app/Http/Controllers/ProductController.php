<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::all();
        return view('productos.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('productos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre'=> 'required',
            'precio' => 'required',
            'categoria'=> 'required',
            'cantidad'=>'required',
            'imagen'=> 'required|image|mimes:jpeg,png,jpg|max:4800',
        ]);
        $image=$request->file('imagen');
        $imageName=time().$image->getClientOriginalName();
        $name=$request->get('nombre');
        $price=$request->get('precio');
        $quantity=$request->get('cantidad');
        $category=$request->get('categoria');

        $product=new Product();
        $product->nombre=$name;
        $product->precio=$price;
        $product->categoria=$category;
        $product->cantidad=$quantity;
        $product->image='img/'.$imageName;

        $product->save();
        $request->imagen->move(public_path('img'), $imageName);

        return redirect()->route('productos.index')
                        ->with('success','Producto creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto=Product::find($id);
        return view('productos.show',compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        return view('productos.edit',compact('id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'nombre'=> 'required',
            'precio' => 'required',
            'categoria'=> 'required',
            'cantidad'=>'required',
            'imagen'=> 'required|image|mimes:jpeg,png,jpg|max:4800',
        ]);
        $image=$request->file('imagen');
        $imageName=time().$image->getClientOriginalName();
        $name=$request->get('nombre');
        $price=$request->get('precio');
        $quantity=$request->get('cantidad');
        $category=$request->get('categoria');

        $product=Product::find($id);
        $product->nombre=$name;
        $product->precio=$price;
        $product->categoria=$category;
        $product->cantidad=$quantity;
        $product->image='img'.$imageName;

        $product->save();
        $request->imagen->move(public_path('img'), $imageName);

        return redirect()->route('productos.index')
                        ->with('success','Producto actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Product::find($id);
        $product->delete();


        return redirect()->route('productos.index');
    }
}
