@extends('layouts.app')

@section('titleModule', 'Crear Venta')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 rounded-4 fondo2">
                <div class="card-header text-center fs-3 colorLetra">
                    <b>Crear Venta</b>
                </div>

                <div class="card-body p-4">
                    <form method="POST" action="{{ route('sales.store') }}" class="user">

                        @csrf

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label class="colorLetra fw-bold">Cantidad</label>
                                <input name="amount" type="number" class="form-control form-control-user" value="{{ old('amount') }}" placeholder="Cantidad">
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label class="colorLetra fw-bold">Total</label>
                                <input name="total_cost" type="number" class="form-control form-control-user" value="{{ old('total_cost') }}" placeholder="Total">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label class="colorLetra fw-bold">Fecha de compra</label>
                                <input name="purchase_date" type="date" class="form-control form-control-user" value="{{ old('purchase_date') }}">
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label class="colorLetra fw-bold">Detalles de envío</label>
                                <input name="shipping_details" type="text" class="form-control form-control-user" value="{{ old('shipping_details') }}" placeholder="Detalles del envío">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label class="colorLetra fw-bold">Estado del pedido</label>
                                <input name="order_status" type="text" class="form-control form-control-user" value="{{ old('order_status') }}" placeholder="Estado del pedido">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label class="colorLetra fw-bold">Usuario</label>
                                <select name="user_id" class="form-control form-control-user">
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label class="colorLetra fw-bold">Producto</label>
                                <select name="product_id" class="form-control form-control-user">
                                    @foreach($products as $product)
                                        <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>{{ $product->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="text-center mt-4">
                            <button type="submit" class="botonCrear px-4 py-2"><b>Crear</b></button>
                            <a href="{{ route('sales.index') }}" class="botonCancelar px-4 py-2 ms-2"><b>Cancelar</b></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
