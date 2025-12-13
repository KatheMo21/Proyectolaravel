@extends('layouts.app')

@section('title', 'Editar Venta')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 rounded-4 fondo2">
                <div class="card-header text-center fs-3 colorLetra">
                    <b>Actualizar Venta</b>
                </div>
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('sales.update', $sale->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="id" value="{{ $sale->id }}">

                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <label class="colorLetra fw-bold">Cantidad</label>
                                <input name="amountEdit" type="number" class="form-control form-control-user" value="{{ $sale->amount }}">
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="colorLetra fw-bold">Total</label>
                                <input name="total_costEdit" type="number" class="form-control form-control-user" value="{{ $sale->total_cost }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <label class="colorLetra fw-bold">Fecha de compra</label>
                                <input name="purchase_dateEdit" type="date" class="form-control form-control-user" value="{{ $sale->purchase_date }}">
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="colorLetra fw-bold">Estado del pedido</label>
                                <input name="order_statusEdit" type="text" class="form-control form-control-user" value="{{ $sale->order_status }}">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="colorLetra fw-bold">Detalles de envío</label>
                            <input name="shipping_detailsEdit" type="text" class="form-control form-control-user" value="{{ $sale->shipping_details }}">
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <label class="colorLetra fw-bold">Usuario</label>
                                <select name="user_idEdit" class="form-control form-control-user">
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}" {{ $sale->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label class="colorLetra fw-bold">Producto</label>
                                <select name="product_idEdit" class="form-control form-control-user">
                                    @foreach($products as $product)
                                        <option value="{{ $product->id }}" {{ $sale->product_id == $product->id ? 'selected' : '' }}>{{ $product->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="text-center mt-4">
                            <button type="submit" class="botonGuardar px-4 py-2"><b>Guardar</b></button>
                            <a href="{{ route('sales.index') }}" class="botonCancelar px-4 py-2 ms-2"><b>Cancelar</b></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
