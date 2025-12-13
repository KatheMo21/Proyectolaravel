<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaleRequest;
use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\User;
use App\Models\Product;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        $sales = Sale::with('user', 'product')->get();
        $users = User::all();
        $products = Product::all();

        return view('sales.index', compact('sales', 'users', 'products'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $users = User::all();
        $products = Product::all();
        return view('sales.create', compact('users','products'));

    }

    public function createList() {}


    /**
     * Store a newly created resource in storage.
     */
    public function store(SaleRequest $request)
    {
        /* dd($request-> all()); */

        $sale                  = new Sale;   // para actualizar, es este mismo paso pero sin instancear el usuario.
        /* $sale->product         = $request->product; */
        $sale->amount          = $request->amount;
        $sale->total_cost      = $request->total_cost;
        $sale->purchase_date   = $request->purchase_date;
        //$user-> photo         = $request-> photo;
        $sale->order_status    = $request->order_status;
        $sale->shipping_details = $request->shipping_details;
        $sale->user_id         = $request->user_id;
        $sale->product_id      = $request->product_id;


        if ($sale->save()) {
            return redirect()->route('sales.index')->with('messages', 'la venta: ' . $sale->id . '¡Fué Creada!');
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
    public function edit(Sale $sale)
    {

        $users = User::all();
        $products = Product::all();
        //$sales = Sale::all();
        return view('sales.edit', compact('sale', 'users', 'products'));

        /** return view('sales.edit', compact('sale'));*/
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(SaleRequest $request, Sale $sale)
    {
        //dd($request->all());
        // Guardar imagen si el usuario sube una nueva
        /* if ($request->hasFile('profile_image')) {
            // Eliminar imagen anterior si existe
            $oldImagePath = public_path('profile_images/' . $sale->photo);
            if ($sale->photo && file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }

            // Guardar nueva imagen en public/profile_images/
            $imageName = time() . '.' . $request->profile_image->getClientOriginalExtension();
            $request->profile_image->move(public_path('profile_images'), $imageName);

            // Guardar el nombre de la imagen en la base de datos
            $sale->photo = $imageName;
        } */


        // Guardar otros campos


        /* $sale->product         = $request->productEdit; */


        $sale->amount           = $request->amountEdit;
        $sale->total_cost       = $request->total_costEdit ?? $sale->total_cost;
        $sale->purchase_date    = $request->purchase_dateEdit;
        $sale->order_status     = $request->order_statusEdit;
        $sale->shipping_details = $request->shipping_detailsEdit;
        $sale->user_id          = $request->user_idEdit;
        $sale->product_id       = $request->product_idEdit;

        if ($sale->save()) {
            return redirect()->route('sales.index')
                ->with('messages', 'La venta fue actualizada correctamente');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sale $sale)
    {
        if ($sale->delete()) {
            return redirect('sales')->with('messages', 'la venta: ' . $sale->name . ' ¡Fue eliminada!');
        }
    }

    public function search(Request $request)
    {
        $sales = Sale::names($request->q)->paginate(20);
        return view('sales.search')->with(['sales' => $sales]);
    }
}
