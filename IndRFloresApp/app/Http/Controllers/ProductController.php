<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('product.list', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return back()->with('Mensaje', 'El producto se creó correctamente');
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->code = $request->code;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->weight = $request->weight;
        $product->state = $request->state;
        $product->created_at = now()->toDateString();
        $product->updated_at = now()->toDateString();
        $product->save();

        return back()->with('Mensaje', 'El producto se creó correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'=>'required',
            'description'=>'required',
            'weight'=>'required',
            'state'=>'required'
        ]);
        $product_updated = Product::findOrFail($id);
        $product_updated->code = $request->code;
        $product_updated->name = $request->name;
        $product_updated->description = $request->description;
        $product_updated->weight = $request->weight;
        $product_updated->state = $request->state;
        $product_updated->updated_at = now()->toDateString();
        $product_updated->save();
        return redirect('/product')->with('exitoso', '¡Los datos fueron actualizados exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect('/product')->with('exitoso', '¡Registro borrado exitosamente!');
    }
}
