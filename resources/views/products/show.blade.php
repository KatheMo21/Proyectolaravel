@extends('layouts.app')
@section('tittle', 'Detalle Producto')
@section('content')

    <h3>Producto: {{ $product->name }}</h3>

    <p><strong>Descripción:</strong> {{ $product->description }}</p>
    <p><strong>Tamño:</strong> {{ $product->size }}</p>
    <p><strong>Color:</strong> {{ $product->color }}</p>
    <p><strong>Precio:</strong> {{ $product->price}}</p>
    <p><strong>Categoria:</strong> {{ $product->category }}</p>
    <p><strong>Stock:</strong> {{ $product->stock }}</p>
  

    <a href="{{ route('products.index') }}" class="btn btn-secondary">Volver</a>

@endsection