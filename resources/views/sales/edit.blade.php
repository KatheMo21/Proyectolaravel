@extends('layouts.app')

@section('titleModule', 'Editar Venta')

@section('content')
<div class="container mt-4">
    <div class="card shadow rounded-4 p-4">
        <h3 class="mb-4">Editar venta #{{ $sale->id }}</h3>

        <form action="{{ route('sales.update', $sale->id) }}" method="POST" class="user">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Usuario:</label>
                <select name="user_id" class="form-control">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ $sale->user_id == $user->id ? 'selected' : '' }}>
                            {{ $user->name }} {{ $user->lastname }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Producto:</label>
                <select name="product_id" class="form-control">
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}" {{ $sale->product_id == $product->id ? 'selected' : '' }}>
                            {{ $product->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Cantidad:</label>
                <input type="number" name="amount" class="form-control" value="{{ $sale->amount }}">
            </div>

            <div class="mb-3">
                <label>Fecha de compra:</label>
                <input type="date" name="purchase_date" class="form-control" value="{{ $sale->purchase_date }}">
            </div>

            <div class="mb-3">
                <label>Estado del pedido:</label>
                <input type="text" name="order_status" class="form-control" value="{{ $sale->order_status }}">
            </div>

            <div class="mb-3">
                <label>Detalles de envío:</label>
                <input type="text" name="shipping_details" class="form-control" value="{{ $sale->shipping_details }}">
            </div>

            <button type="submit" class="btn btn-success">Actualizar</button>
            <a href="{{ route('sales.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection
