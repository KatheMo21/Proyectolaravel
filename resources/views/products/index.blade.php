@extends('layouts.app')

@section('tittle', 'Productos')

@section('content')
    <!-- DataTales Example -->
    <div class="insert">
        @foreach ($products as $product)
            <div class="card rounded-4 align-items-start" style="width: 18rem; display:inline-block; margin: 10px;">
                <img class="foto rounded-circle mt-4 mx-auto d-block" src="{{ asset('profile_images/' . $product->photo) }}"
                    alt="foto producto" style="width:260" height="260">
                <div class="card-body">
                    <h5 class="card-title text-center"><b class="colorLetraterracota"> Información</b></h5>
                    <div>
                        <tbody>

                            <tr>
                                <th><b class="colorLetraterracota">Nombre:</b> </th>
                                <th>{{ $product->name }}</th>
                            </tr><br>

                            <tr>
                                <th><b class="colorLetraterracota">Descripción:</b></th>
                                <th>{{ $product->description }}</th>
                            </tr><br>

                            <tr>
                                <th><b class="colorLetraterracota">Tamaño: </b></th>
                                <th>{{ $product->size }}</th>
                            </tr> <br>

                            <tr>
                                <th><b class="colorLetraterracota"> Color: </b> </th>
                                <th>{{ $product->color }}</th>
                            </tr><br>

                            <tr>
                                <th><b class="colorLetraterracota">Precio: </b></th>
                                <th>{{ $product->price }}</th>
                            </tr><br>

                            <tr>
                                <th><b class="colorLetraterracota"> Categoría: </b> </th>
                                <th>{{ $product->category }} </th>
                            </tr><br>

                            <tr>
                                <th><b class="colorLetraterracota">Inventario: </b></th>
                                <th>{{ $product->stock }}</th>
                            </tr><br>

                        </tbody>
                        <button class="botonEditar  btn-block edit " data-bs-toggle="modal" data-bs-target="#modalEdit"
                            id='{{ $product->id }}'><b>Editar</b></button>

                        <button class="botonEliminar btn-block delete" data-bs-toggle="modal" data-bs-target="#modalDelete"
                            id='{{ $product->id }}'><b>Eliminar</b></button>

                        <form method="POST" action="{{ url('products/' . $product->id) }}">
                            @csrf
                            @method('DELETE')

                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    
@endsection
