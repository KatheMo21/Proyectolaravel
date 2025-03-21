@forelse ($sales as $sale)
    <div class="card rounded-4 align-items-start" style="width: 18rem; display:inline-block; margin: 10px;">
        {{-- <img class="foto rounded-circle mt-4 mx-auto d-block" src="{{ asset('profile_images/' . $product->photo) }}"
        alt="foto producto" style="width:260" height="260"> --}}
        <div class="card-body">
            <h5 class="card-title text-center"><b class="colorLetraterracota"> Información</b></h5>
            <div>
                <tbody>

                    <tr>
                        <th><b class="colorLetraterracota"> Fecha de compra: </b> </th>
                        <th>{{ $sale->purchase_date }}</th>
                    </tr><br>


                    <tr>
                        <th><b class="colorLetraterracota">Cantidad:</b></th>
                        <th>{{ $sale->amount }}</th>
                    </tr><br>

                    <tr>
                        <th><b class="colorLetraterracota">Precio Unidad: </b></th>
                        <th>{{ is_object($sale->product) ? $sale->product->price : 'Producto no encontrado' }}</th>
                    </tr><br>

                    <tr>
                        <th><b class="colorLetraterracota">Nombre producto: </b></th>
                        <th>{{ is_object($sale->product) ? $sale->product->name : 'Producto no encontrado' }}</th>
                    </tr><br>



                    {{-- <tr>
                        <th><b class="colorLetraterracota"> Detalles de envio: </b> </th>
                        <th>{{ $sale->shipping_details }} </th>
                    </tr><br> --}}

                    <tr>
                        <th><b class="colorLetraterracota">Nombre usuario: </b></th>
                        <th>{{ is_object($sale->user) ? $sale->user->name : 'Usuario no encontrado' }}</th>
                    </tr><br>

                    <tr>
                        <th><b class="colorLetraterracota">Apellido : </b></th>
                        <th>{{ is_object($sale->user) ? $sale->user->lastname : 'Usuario no encontrado' }}</th>
                    </tr><br>

                    <tr>
                        <th><b class="colorLetraterracota">Id usuario: </b></th>
                        <th>{{ is_object($sale->user) ? $sale->user->id : 'id no encontrado' }}</th>
                    </tr><br>

                    <tr>
                        <th><b class="colorLetraterracota">Documento: </b></th>
                        <th>{{ is_object($sale->user) ? $sale->user->document : 'id no encontrado' }}</th>
                    </tr><br>

                    <tr>
                        <th><b class="colorLetraterracota">Dirección: </b></th>
                        <th>{{ is_object($sale->user) ? $sale->user->address : 'id no encontrado' }}</th>
                    </tr><br>

                    <tr>
                        <th><b class="colorLetraterracota">Número celular: </b></th>
                        <th>{{ is_object($sale->user) ? $sale->user->phone : 'id no encontrado' }}</th>
                    </tr><br>

                    <tr>
                        <th><b class="colorLetraterracota">Correo electrónico: </b></th>
                        <th>{{ is_object($sale->user) ? $sale->user->email : 'id no encontrado' }}</th>
                    </tr><br>



                    <tr>
                        <th><b class="colorLetraterracota">Id producto: </b></th>
                        <th>{{ is_object($sale->product) ? $sale->product->id : 'Producto no encontrado' }}</th>
                    </tr><br>

                    <tr>
                        <th><b class="colorLetraterracota">Descripción producto: </b></th>
                        <th>{{ is_object($sale->product) ? $sale->product->description : 'Producto no encontrado' }}
                        </th>
                    </tr><br>

                    <tr>
                        <th><b class="colorLetraterracota">Tamaño: </b></th>
                        <th>{{ is_object($sale->product) ? $sale->product->size : 'Producto no encontrado' }}</th>
                    </tr><br>

                    <tr>
                        <th><b class="colorLetraterracota">Color: </b></th>
                        <th>{{ is_object($sale->product) ? $sale->product->color : 'Producto no encontrado' }}</th>
                    </tr><br>

                    <tr>
                        <th><b class="colorLetraterracota">Categoría: </b></th>
                        <th>{{ is_object($sale->product) ? $sale->product->category : 'Producto no encontrado' }}
                        </th>
                    </tr><br>

                    <tr>
                        <th><b class="colorLetraterracota">Estado del pedido: </b></th>
                        <th>{{ $sale->order_status }}</th>
                    </tr><br>

                    <tr>
                        <th><b class="colorLetraterracota">Total venta: </b></th>
                        <th>{{ $sale->product->price * $sale->amount }}</th>
                    </tr> <br> <br>

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
