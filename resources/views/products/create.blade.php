@extends('layouts.app')
@section('title', 'Crear Producto')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-lg border-0 rounded-4 fondo2">
                <div class="card-header  text-center fs-3 colorLetra">
                    Crear Nuevo Producto
                </div>

                <div class="card-body p-4 fondo2">

                    <form method="POST" action="{{ route('products.store') }}" class="user">
                        @csrf

                        <div class="form-group row mb-3">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input name="name" type="text" class="form-control form-control-user" placeholder="Nombre">
                            </div>
                            <div class="col-sm-6">
                                <input name="description" type="text" class="form-control form-control-user" placeholder="Descripción">
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input name="size" type="text" class="form-control form-control-user" placeholder="Tamaño">
                            </div>
                            <div class="col-sm-6">
                                <input name="color" type="text" class="form-control form-control-user" placeholder="Color">
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input name="price" type="number" class="form-control form-control-user" placeholder="Precio">
                            </div>
                            <div class="col-sm-6">
                                <input name="category" type="text" class="form-control form-control-user" placeholder="Categoría">
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input name="stock" type="number" class="form-control form-control-user" placeholder="Inventario">
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="botonCrear"><b>Crear</b></button>
                            <a href="{{ route('products.index') }}" class="botonCancelar"><b>Cancelar</b></a>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection