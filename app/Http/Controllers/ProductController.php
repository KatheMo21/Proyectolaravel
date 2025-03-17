<?php

namespace App\Http\Controllers;


use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use App\Models\Product; // App esta en mayuscula porque se le esta diciendo que vaya a la raiz del proyecto y lo lea.

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::All();
        return view('products.index')->with(['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        // dd($request-> all());

        $product               = new Product;   // para actualizar, es este mismo paso pero sin instancear el usuario.
        $product->name        = $request->name;
        $product->description = $request->description;
        $product->size        = $request->size;
        $product->color       = $request->color;
        $product->price       = $request->price;
        //$user-> photo    = $request-> photo;  
        $product->category    = $request->category;
        $product->stock = $request->stock;


        if ($product->save()) {
            return redirect('products')->with('messages', 'El producto: ' . $product->name . '¡Fué Creado!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {

        return ['product' => $product];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {

        $product->name         = $request->nameEdit;
        $product->name        = $request->name;
        $product->description = $request->description;
        $product->size        = $request->size;
        $product->color       = $request->color;
        $product->price       = $request->price;
        $product->category    = $request->category;
        $product->stock = $request->stock;


        if ($product->save()) {
            return redirect('products')->with('messages', 'El producto: ' . $product->name . ' ¡Fue actualizdo!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(product $product)
    {
        if ($product->delete()) {
            return redirect('products')->with('messages', 'El producto: ' . $product->name . ' ¡Fue eliminado!');
        }
    }

    public function search(Request $request)
    {
        $products = Product::names($request->q)->paginate(20);
        return view('products.search')->with(['products' => $products]);
    }
}
