<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Sale;

class SaleController extends Controller
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
        $sales = Sale::all();
        $products = Product::all();
        return view('sale.list')->with(compact('sales', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        return view('sale.create')->with(compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sale = new Sale();
        $productSelected = Product::findOrFail($request->product_id);
        if ($productSelected->stock > 0) 
        {
            $sale->product_id = $request->product_id;
            $sale->weight = $request->weight;
            $sale->sale_date = $request->sale_date;
            $sale->state = 1;
            $sale->save();

            $productSelected->stock = $productSelected->stock - 1;
            $productSelected->save();
            
            return back()->with('message', 'Venta creada correctamente.');
        }else
            return back()->with('error', 'Error al crear la venta, el número de productos en almacén es insuficiente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sale = Sale::findOrFail($id);
        $productSelected = Product::findOrFail($sale->product_id);

        return view('sale.delete', compact('sale', 'productSelected'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sale = Sale::findOrFail($id);
        $productSelected = Product::findOrFail($sale->product_id);
        $products = Product::all();

        return view('sale.edit', compact('sale', 'productSelected', 'products'));
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
        $sale = Sale::findOrFail($id);
        $sale->product_id = $request->product_id;
        $sale->weight = $request->weight;
        $sale->save();
        
        return back()->with('message', 'Producto actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sale = Sale::findOrFail($id);
        $sale->delete();

        return redirect()->route('sales.index')->with('message', 'Venta eliminada correctamente.');
    }

    public function filter()
    {
        return view('sale.filter');
    }

    public function search(Request $request)
    {
        $sales = Sale::whereBetween('created_at', [$request->st_dt, $request->fn_dt])->get();
        $products = Product::all();
        $sum = 0;

        foreach ($sales as $sale)
        {
            $productSelected = Product::findOrFail($sale->product_id);
            $sum = $sum + $sale->weight*$productSelected->value;
        }

        return view('sale.search', compact('sales', 'products', 'sum'));
    }

    public function getProductInfo(Request $request, $id)
    {
        if ($request->ajax())
        {
            $product = Product::productInfo($id);
            return response()->json($product);
        }
    }
}
