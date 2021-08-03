<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
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
        return view('product.list')->with(compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $product->value = $request->value;
        $product->state = $request->state;
        $product->save();

        return back()->with('mensaje', 'Producto creado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('product.delete', compact('product'));
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
        $product = Product::findOrFail($id);
        $product->code = $request->code;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->weight = $request->weight;
        $product->value = $request->value;
        $product->state = $request->state;
        $product->save();
        
        return back()->with('mensaje', 'Producto actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // return redirect()->route('products.index');
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('mensaje', 'Producto eliminado correctamente.');
    }

    public function filter()
    {
        return view('product.filter');
    }

    public function search(Request $request)
    {
        $products = Product::whereBetween('created_at', [$request->st_dt, $request->fn_dt])->get();
        $sum = 0;

        foreach ($products as $item)
            $sum = $sum + $item->value;

        return view('product.search', compact('products', 'sum'));
    }
}
