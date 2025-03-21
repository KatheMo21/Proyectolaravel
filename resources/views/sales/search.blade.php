@forelse ($sales as $sale)
    <div class="card rounded-4 align-items-start" style="width: 18rem; display:inline-block; margin: 10px;">
        {{-- <img class="foto rounded-circle mt-4 mx-auto d-block" src="{{ asset('profile_images/' . $product->photo) }}"
        alt="foto producto" style="width:260" height="260"> --}}
        <div class="card-body">
            <h5 class="card-title text-center"><b class="colorLetraterracota"> Información</b></h5>
            <div>
                <tbody>

                    <tr>
                        <th><b class="colorLetraterracota">Producto:</b> </th>
                        <th>{{ $sale->product }}</th>
                    </tr><br>

                    <tr>
                        <th><b class="colorLetraterracota">Cantidad:</b></th>
                        <th>{{ $sale->amount }}</th>
                    </tr><br>

                    <tr>
                        <th><b class="colorLetraterracota">Total: </b></th>
                        <th>{{ $sale->total_cost }}</th>
                    </tr> <br>

                    <tr>
                        <th><b class="colorLetraterracota"> Fechda de compra: </b> </th>
                        <th>{{ $sale->purchase_date }}</th>
                    </tr><br>

                    <tr>
                        <th><b class="colorLetraterracota">Estado del pedido: </b></th>
                        <th>{{ $sale->order_status }}</th>
                    </tr><br>

                    <tr>
                        <th><b class="colorLetraterracota"> Detalles de envio: </b> </th>
                        <th>{{ $sale->shipping_details }} </th>
                    </tr><br>

                    <tr>
                        <th><b class="colorLetraterracota">Usuario: </b></th>
                        <th>{{ $sale->user_id }}</th>
                    </tr><br>

                    <tr>
                        <th><b class="colorLetraterracota">Producto: </b></th>
                        <th>{{ $sale->product_id }}</th>
                    </tr><br>

                </tbody>
                <button class="botonEditar  btn-block edit " data-bs-toggle="modal" data-bs-target="#modalEdit"
                    id='{{ $sale->id }}'><b>Editar</b></button>

                <button class="botonEliminar btn-block delete" data-bs-toggle="modal" data-bs-target="#modalDelete"
                    id='{{ $sale->id }}'><b>Eliminar</b></button>

                <form method="POST" action="{{ url('sales/' . $sale->id) }}">
                    @csrf
                    @method('DELETE')

                </form>
            </div>
        </div>
    </div>
@empty
    <h1> No encontro registros para criterio de busqueda </h1>
@endforelse
