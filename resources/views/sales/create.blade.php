@extends('layouts.app')
@section('title', 'Crear Venta')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-lg border-0 rounded-4 fondo2">
                <div class="card-header text-center fs-3 colorLetra">
                    Crear Nueva Venta
                </div>

                <div class="card-body p-4 fondo2">

                    <form method="POST" action="{{ route('sales.store') }}" class="sales">
                        @csrf

                        <div class="form-group row mb-3">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label class="fw-bold colorLetra">Cantidad</label>
                                <input name="amount" type="number" class="form-control form-control-user" placeholder="Cantidad">
                            </div>
                            <div class="col-sm-6">
                                <label class="fw-bold colorLetra">Total</label>
                                <input name="total_cost" type="number" class="form-control form-control-user" placeholder="Total venta">
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label class="fw-bold colorLetra">Fecha de compra</label>
                                <input name="purchase_date" type="date" class="form-control form-control-user">
                            </div>
                            <div class="col-sm-6">
                                <label class="fw-bold colorLetra">Estado del pedido</label>
                                <input name="order_status" type="text" class="form-control form-control-user" placeholder="Estado del pedido">
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label class="fw-bold colorLetra">Detalles de envío</label>
                                <input name="shipping_details" type="text" class="form-control form-control-user" placeholder="Detalles del envío">
                            </div>
                            <div class="col-sm-6">
                                <label class="fw-bold colorLetra">Seleccionar usuario</label>
                                <select name="user_id" class="form-control form-control-user">
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }} {{ $user->lastname }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <div class="col-sm-6">
                                <label class="fw-bold colorLetra">Seleccionar producto</label>
                                <select name="product_id" class="form-control form-control-user">
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }} - ${{ $product->price }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="botonCrear"><b>Crear</b></button>
                            <a href="{{ route('sales.index') }}" class="botonCancelar"><b>Cancelar</b></a>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
