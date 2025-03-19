@forelse ($products as $product)
    <div class="card rounded-4" style="width: 18rem; display:inline-block; margin: 10px;">
        <img class="foto rounded-circle mt-4 mx-auto d-block" src="{{ asset('img/jardinMeditacion.jpg') }}" alt="..."
            style="width:80%" height="70%">
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
@empty
    <h1> No encontro registros para criterio de busqueda </h1>
@endforelse
