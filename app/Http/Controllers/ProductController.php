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
        $product = Product::all();
        return view('products.create', compact('product'));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        /* dd($request-> all()); */

        $product               = new Product;   // para actualizar, es este mismo paso pero sin instancear el usuario.
        $product->name        = $request->name;
        $product->description = $request->description;
        $product->size        = $request->size;
        $product->color       = $request->color;
        $product->price       = $request->price;
        //$user-> photo    = $request-> photo;
        $product->category    = $request->category;
        $product->stock       = $request->stock;


        if ($product->save()) {
            return redirect('products')->with('messages', 'El producto: ' . $product->name . '¡Fué Creado!');
        }



    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {

        // Guardar imagen si el usuario sube una nueva
        if ($request->hasFile('profile_image')) {
            // Eliminar imagen anterior si existe
            $oldImagePath = public_path('profile_images/' . $product->photo);
            if ($product->photo && file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }

            // Guardar nueva imagen en public/profile_images/
            $imageName = time() . '.' . $request->profile_image->getClientOriginalExtension();
            $request->profile_image->move(public_path('profile_images'), $imageName);

            // Guardar el nombre de la imagen en la base de datos
            $product->photo = $imageName;
        }

        // Guardar otros campos

        $product->name         = $request->nameEdit;
        $product->description = $request->descriptionEdit;
        $product->size        = $request->sizeEdit;
        $product->color       = $request->colorEdit;
        $product->price       = $request->priceEdit;
        $product->category    = $request->categoryEdit;
        $product->stock       = $request->stockEdit;


        if ($product->save()) {
            return redirect('products')->with('messages', 'El producto: ' . $product->name . ' ¡Fue actualizdo!');
        }



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if ($product->delete()) {
            return redirect('products')->with('messages', 'El producto: ' . $product->name . ' ¡Fue eliminado!');
        }

        // API
        
    }

    public function search(Request $request)
    {
        $products = Product::names($request->q)->paginate(20);
        return view('products.search')->with(['products' => $products]);
    }


}
