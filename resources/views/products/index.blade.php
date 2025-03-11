@extends('layouts.app')

@section('titleModule', 'Productos')

@section('content')
    <!-- DataTales Example -->

    @foreach ($products as $product)
        <div class="card" style="width: 18rem; display:inline-block; margin: 10px;">
            <img class="foto" src="{{ asset('img/admin.jpg') }}" alt="..." style="width:80%"
                height="70%">
            <div class="card-body">
                <h5 class="card-title text-center"><b class="colorLetraterracota"> Información</b></h5>
                <div>
                    <tbody>

                        <tr>
                            <th ><b class="colorLetraterracota">Nombre:</b> </th>
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
                            <th><b class="colorLetraterracota"> categoría: </b> </th>
                            <th>{{ $product->category }} </th>
                        </tr><br>

                        <tr>
                            <th><b class="colorLetraterracota">Stock </b></th>
                            <th>{{ $product->stock }}</th>
                        </tr><br>

                        


                    </tbody>
                    <button class="botonEditar  btn-block edit " data-bs-toggle="modal"
                        data-bs-target="#modalEdit"  id='{{ $product->id }}'><b>Editar</b></button>

                    <button class="botonEliminar btn-block edit" data-bs-toggle="modal"
                    data-bs-target="#modalDelete" id='{{ $product->id }}'><b>Eliminar</b></button>
                    <form method="POST" action="{{ url('products/' . $product->id) }}">
                        @csrf
                        @method('DELETE')
                       
                    </form>
                </div>
            </div>
        </div>
    @endforeach
    

    {{-- Modal Editar --}}
    <div class="modal fade " id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content fondo2">
                <div class="modal-header d-flex justify-content-center">
                    <h1 class="modal-title fs-2 colorLetra " id="exampleModalLabel"><b> Actualizar producto</b></h1>
                    {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                </div>
                <div class="modal-body">
                    <form method="PUT" action="{{ url('products/' . $product->id) }}" class="product" id="formEdit">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <input name="id" type="text" class="form-control form-control-user" hidden>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input name="nameEdit" type="text" class="form-control form-control-user"
                                    id="exampleFirstName" placeholder="Nombre">
                            </div>

                            <div class="col-sm-6">
                                <input name="descriptionEdit" type="text" class="form-control form-control-user"
                                    id="exampDescription" placeholder="Descripción">
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input name="sizeEdit" type="text" class="form-control form-control-user"
                                    id="exampleInputSize" placeholder="Tamaño">
                            </div>

                            <div class="col-sm-6">
                                <input name="colorEdit" type="text" class="form-control form-control-user"
                                    id="exampleInputColor" placeholder="Color">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input name="priceEdit" type="text" class="form-control form-control-user"
                                    id="exampleinputPrice" placeholder="Precio">
                            </div>

                            <div class="col-sm-6">
                                <input name="categoryEdit" type="text" class="form-control form-control-user"
                                    id="exampleInputCategory" placeholder="categoría">
                            </div>
                        </div>

                        <div class="col-m-12 mb-3 mb-m-0">
                            <input name="stockEdit" type="text" class="form-control form-control-user"
                                id="exampleInputStock" placeholder="Inventario">
                        </div>

                        
                        <div class="modal-footer">
                            <button type="submit" class="botonGuardar save" data-bs-dismiss="modal"
                                ><b>Guardar</b>

                            </button>
                            <button type="button" class="botonCancelar" 
                                data-bs-dismiss="modal"><b>Cancelar</b>

                            </button>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    {{-- Modal Eliminar --}}
    <div class="modal fade " id="modalDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content fondo2">
                <div class="modal-header d-flex justify-content-center">
                    <h1 class="modal-title fs-2 colorLetra "><b> ¿Está seguro que desea eliminar el Producto ? </b></h1>
                    {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ url('products/'.$product->id) }}" class="product"> 
                        @csrf
                        @method('DELETE')
                        
                       
                        <div class="modal-footer">
                            <button type="submit" class="botonEliminarModal  save" data-bs-dismiss="modal"
                               ><b>Eliminar</b>

                            </button>
                            <button type="button" class="botonEliminar"
                                data-bs-dismiss="modal"><b>Cancelar</b>

                            </button>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    {{-- modal crear --}}
    <div class="modal fade " id="modalCreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content fondo2">
                <div class="modal-header d-flex justify-content-center">
                    <h1 class="modal-title fs-2 colorLetra " id="exampleModalLabel"><b> Crear producto</b></h1>
                    {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('products.store') }}" class ="product">
                        @csrf
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input name="name" type="text" class="form-control form-control-user"
                                    id="exampleFirstName" placeholder="Nombre">
                            </div>

                            <div class="col-sm-6">
                                <input name="description" type="text" class="form-control form-control-user"
                                    id="exampleDescription" placeholder="Descripción">
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input name="size" type="text" class="form-control form-control-user"
                                    id="exampleInputSze" placeholder="Tamaño">
                            </div>

                            <div class="col-sm-6">
                                <input name="color" type="text" class="form-control form-control-user"
                                    id="exampleInputColor" placeholder="Color">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input name="price" type="text" class="form-control form-control-user"
                                    id="exampleinputPrice" placeholder="Precio">
                            </div>

                            <div class="col-sm-6">
                                <input name="category" type="text" class="form-control form-control-user"
                                    id="exampleInputCategory" placeholder="Categoría">
                            </div>
                        </div>

                        <div class="col-m-12 mb-3 mb-m-0">
                            <input name="stock" type="text" class="form-control form-control-user"
                                id="exampleInputStock" placeholder="Inventario">
                        </div>


                        <div class="modal-footer">
                            <button type="submit" class="botonCrear" id="botonCrear"><b>Crear</b>

                            </button>
                            <button type="button" class="botonCancelar" id="botonCancelar"
                                data-bs-dismiss="modal"><b>Cancelar</b>

                            </button>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <script>
        $(document).on('click', '.edit', function() {
            var productId = $(this).attr('id');

            $.get('products/' + productId + '/edit', {}, function(data) {
                var product = data.product

                $('input[name="id"]').val(productId);
                $('input[name="nameEdit"]').val(product.name);
                $('input[name="descriptionEdit"]').val(product.description);
                $('input[name="sizeEdit"]').val(product.size);
                $('input[name="colorEdit"]').val(product.color);
                $('input[name="priceEdit"]').val(product.price);
                $('input[name="categoryEdit"]').val(product.category);
                $('input[name="stockEdit"]').val(product.stock);
               

                console.log(product)
            })
        })

        $('#formEdit').submit(function(e) {
            e.preventDefault();
            var form = $(this);
            var productId = form.find('input[name="id"]').val();
            var url = "/products/" + productId;

            $.ajax({
                url: url,
                type: 'PUT',
                data: form.serialize(),
                success: function(response) {
                    console.log("Actualización exitosa:", response);
                    $('#modalEdit').modal('hide'); // Cierra el modal
                    location.reload(); // Recarga la página
                },
                error: function(xhr) {
                    $('#modalEdit').modal('hide'); // Cierra el modal
                    location.reload();
                    console.error("Error:", xhr.responseText);
                }
            });
        });
    </script>
@endsection