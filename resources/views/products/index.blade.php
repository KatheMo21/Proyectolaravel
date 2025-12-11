@extends('layouts.app')

@section('tittle', 'Productos')

@section('content')
    <!-- DataTales Example -->
    <div class="insert">
        @foreach ($products as $product)
            <div class="card rounded-4 align-items-start" style="width: 18rem; display:inline-block; margin: 10px;">
                <img class="foto rounded-circle mt-4 mx-auto my-auto d-block" src="{{ asset('profile_images/' . $product->photo) }}"
                    alt="foto producto"  style="width:85%" height="260">
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
                        <a href="{{ route('products.edit', $product->id) }}" class="botonEditar btn-block edit text-center">
                            <b>Editar</b>
                        </a>

                        <form method="POST" action="{{ url('products/' . $product->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="botonEliminar btn-block"><b>Eliminar</b></button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <script>
        // Jquery para buscar un producto desde la barra global
        $('#qsearch').on('keyup', function(e) {
            e.preventDefault();
            var query = $(this).val();
            var token = $('input[name=_token]').val();

            $.post('products/search', {
                    q: query,
                    _token: token
                },
                function(data) {
                    $('.insert').empty().append(data);
                }
            );
        });
    </script>

@endsection
