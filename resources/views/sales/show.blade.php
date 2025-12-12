@extends('layouts.app')

@section('titleModule', 'Detalle de Venta')

@section('content')
<div class="container mt-4">
    <div class="card shadow rounded-4 p-4">
        <h3 class="mb-4">Venta #{{ $sale->id }}</h3>

        <h5 class="mb-3">Información de la venta</h5>
        <p><b>Fecha de compra:</b> {{ $sale->purchase_date }}</p>
        <p><b>Cantidad:</b> {{ $sale->amount }}</p>
        <p><b>Estado del pedido:</b> {{ $sale->order_status }}</p>
        <p><b>Detalles de envío:</b> {{ $sale->shipping_details }}</p>
        <p><b>Total:</b> {{ $sale->product?->price * $sale->amount ?? 0 }}</p>

        <hr>

        <h5 class="mb-3">Información del producto</h5>
        <p><b>Nombre:</b> {{ $sale->product?->name ?? 'Producto no encontrado' }}</p>
        <p><b>Descripción:</b> {{ $sale->product?->description ?? 'Producto no encontrado' }}</p>
        <p><b>Tamaño:</b> {{ $sale->product?->size ?? 'Producto no encontrado' }}</p>
        <p><b>Color:</b> {{ $sale->product?->color ?? 'Producto no encontrado' }}</p>
        <p><b>Categoría:</b> {{ $sale->product?->category ?? 'Producto no encontrado' }}</p>
        <p><b>Precio unitario:</b> {{ $sale->product?->price ?? 'Producto no encontrado' }}</p>

        <hr>

        <h5 class="mb-3">Información del cliente</h5>
        <p><b>Nombre:</b> {{ $sale->user?->name ?? 'Usuario no encontrado' }}</p>
        <p><b>Apellido:</b> {{ $sale->user?->lastname ?? '' }}</p>
        <p><b>Documento:</b> {{ $sale->user?->document ?? '' }}</p>
        <p><b>Dirección:</b> {{ $sale->user?->address ?? '' }}</p>
        <p><b>Teléfono:</b> {{ $sale->user?->phone ?? '' }}</p>
        <p><b>Correo electrónico:</b> {{ $sale->user?->email ?? '' }}</p>

        <div class="mt-4">
            <a href="{{ route('sales.edit', $sale->id) }}" class="btn btn-warning">Editar</a>
            <a href="{{ route('sales.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
</div>
@endsection
