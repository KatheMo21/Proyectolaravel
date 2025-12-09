@extends('layouts.app')
@section('title', 'Editar Producto')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white text-center fs-4 rounded-top-4">
                    Editar Producto
                </div>

                <div class="card-body p-4">

                    <form action="{{ route('products.update', product->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nombre</label>
                            <input type="text" name="name" class="form-control rounded-3">
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Tamaño</label>
                                <input type="text" name="size" class="form-control rounded-3">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Color</label>
                                <input type="text" name="color" class="form-control rounded-3">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Precio</label>
                                <input type="number" name="price" class="form-control rounded-3">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Categoria</label>
                                <input type="text" name="category" class="form-control rounded-3">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">Stock</label>
                            <input type="number" name="stock" class="form-control rounded-3">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Descripción</label>
                            <textarea name="description" class="form-control rounded-3" rows="3"></textarea>
                        </div>

                        <div class="text-center">
                            <button class="btn btn-success px-5 py-2 rounded-3 fw-bold">
                                Editar
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection