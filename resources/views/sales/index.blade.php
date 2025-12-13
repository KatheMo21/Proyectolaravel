@extends('layouts.app')

@section('titleModule', 'Ventas')

@section('content')
<div class="container mt-4">
    <!--<a href="{{ route('sales.create') }}" class="btn btn-primary mb-3">Crear venta</a>-->

    <div class="row">
        @foreach ($sales as $sale)
            <div class="card rounded-4 mb-3" style="width: 18rem; margin-right: 10px; display:inline-block;">
                <div class="card-body">
                    <h5 class="card-title"><b>Venta #{{ $sale->id }}</b></h5>
                    <hr>
                    <p><b>Fecha de compra:</b> {{ $sale->purchase_date }}</p>

                    <h6>Producto</h6>
                    <p><b>Nombre:</b> {{ $sale->product?->name ?? 'Producto no encontrado' }}</p>
                    <p><b>Precio unidad:</b> {{ $sale->product?->price ?? 0 }}</p>
                    <p><b>Categoría:</b> {{ $sale->product?->category ?? 'N/A' }}</p>
                    <p><b>Tamaño:</b> {{ $sale->product?->size ?? 'N/A' }}</p>
                    <p><b>Color:</b> {{ $sale->product?->color ?? 'N/A' }}</p>

                    <h6>Cliente</h6>
                    <p><b>Nombre:</b> {{ $sale->user?->name ?? 'Usuario no encontrado' }} {{ $sale->user?->lastname ?? '' }}</p>
                    <p><b>Documento:</b> {{ $sale->user?->document ?? 'N/A' }}</p>
                    <p><b>Dirección:</b> {{ $sale->user?->address ?? 'N/A' }}</p>
                    <p><b>Teléfono:</b> {{ $sale->user?->phone ?? 'N/A' }}</p>
                    <p><b>Correo:</b> {{ $sale->user?->email ?? 'N/A' }}</p>

                    <h6>Detalles de la venta</h6>
                    <p><b>Cantidad:</b> {{ $sale->amount }}</p>
                    <p><b>Total:</b> {{ $sale->product ? $sale->product->price * $sale->amount : 0 }}</p>
                    <p><b>Estado del pedido:</b> {{ $sale->order_status }}</p>

                    <div class="mt-2">
                        <a href="{{ route('sales.edit', $sale->id) }}" class="btn btn-warning btn-sm">Editar</a>

                        <form action="{{ route('sales/'. $sale->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-3">
        {{ $sales->links() }} <!-- Paginación -->
    </div>
</div>
@endsection
