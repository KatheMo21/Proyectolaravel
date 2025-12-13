@extends('layouts.app')

@section('titleModule', 'Sales')

@section('content')
    <div class="insert">

        @foreach ($sales as $sale)
            <div class="card rounded-4 align-items-start" style="width: 18rem; display:inline-block; margin: 10px;">

                <div class="card-body">
                    <h5 class="card-title text-center">
                        <b class="colorLetraterracota">Información</b>
                    </h5>
                    <hr>

                    <p><b>Fecha:</b> {{ $sale->purchase_date }}</p>
                    <p><b>Cantidad:</b> {{ $sale->amount }}</p>
                    <p><b>Estado:</b> {{ $sale->order_status }}</p>

                    <hr>

                    <p><b>Usuario:</b>
                        {{ $sale->user->name ?? 'Sin usuario' }}
                        {{ $sale->user->lastname ?? '' }}
                    </p>

                    <p><b>Producto:</b>
                        {{ $sale->product->name ?? 'Sin producto' }}
                    </p>

                    <p><b>Precio unidad:</b>
                        {{ $sale->product->price ?? 0 }}
                    </p>

                    <p><b>Total:</b>
                        {{ ($sale->product->price ?? 0) * $sale->amount }}
                    </p>

                    <hr>

                    <a href="{{ route('sales.edit', $sale->id) }}" class="botonEditar btn-block edit text-center">
                        <b>Editar</b>
                    </a>

                    <form method="POST" action="{{ url('sales/' . $sale->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="botonEliminar btn-block">
                            <b>Eliminar</b>
                        </button>
                    </form>

                </div>
            </div>
        @endforeach

        <script>
            // Jquery para buscar un producto desde la barra global
            $('#qsearch').on('keyup', function(e) {
                e.preventDefault();
                var query = $(this).val();
                var token = $('input[name=_token]').val();

                $.post('sales/search', {
                        q: query,
                        _token: token
                    },
                    function(data) {
                        $('.insert').empty().append(data);
                    }
                );
            });
        </script>

    </div>
@endsection
