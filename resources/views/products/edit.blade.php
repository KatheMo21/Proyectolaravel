@extends('layouts.app')
@section('title', 'Editar Producto')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-lg border-0 rounded-4 fondo2">
                <div class="card-header text-center fs-3 colorLetra">
                    <b>Actualizar Producto</b>
                </div>

                <div class="card-body p-4">

                    <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="id" value="{{ $product->id }}">

                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <label class="colorLetra fw-bold">Nombre</label>
                                <input name="nameEdit" type="text" class="form-control form-control-user"
                                    value="{{ $product->name }}">
                            </div>

                            <div class="col-sm-6 mb-3">
                                <label class="colorLetra fw-bold">Descripción</label>
                                <input name="descriptionEdit" type="text" class="form-control form-control-user"
                                    value="{{ $product->description }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <label class="colorLetra fw-bold">Tamaño</label>
                                <input name="sizeEdit" type="text" class="form-control form-control-user"
                                    value="{{ $product->size }}">
                            </div>

                            <div class="col-sm-6 mb-3">
                                <label class="colorLetra fw-bold">Color</label>
                                <input name="colorEdit" type="text" class="form-control form-control-user"
                                    value="{{ $product->color }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <label class="colorLetra fw-bold">Precio</label>
                                <input name="priceEdit" type="number" class="form-control form-control-user"
                                    value="{{ $product->price }}">
                            </div>

                            <div class="col-sm-6 mb-3">
                                <label class="colorLetra fw-bold">Categoría</label>
                                <input name="categoryEdit" type="text" class="form-control form-control-user"
                                    value="{{ $product->category }}">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="colorLetra fw-bold">Inventario</label>
                            <input name="stockEdit" type="number" class="form-control form-control-user"
                                value="{{ $product->stock }}">
                        </div>
                        <div class="form-group text-center">
                            <label class="form-label colorLetra"><b>Seleccionar foto del producto</b></label>
                            <input type="file" name="profile_image" class="form-control" accept="image/*">

                            <img id="imagePreview" 
                                src="{{ asset('profile_images/' . $product->photo) }}"
                                alt="Foto del producto" 
                                class="mt-3 img-thumbnail"
                                style="max-width: 150px;">
                        </div>

                        <div class="text-center mt-4">
                            <button type="submit" class="botonGuardar save px-4 py-2">
                                <b>Guardar</b>
                            </button>

                            <a href="{{ route('products.index') }}" class="botonCancelar px-4 py-2 ms-2">
                                <b>Cancelar</b>
                            </a>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection