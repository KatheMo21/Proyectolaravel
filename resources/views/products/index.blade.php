@extends('layouts.app')

@section('titleModule', 'Productos')

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

    {{-- modal crear --}}
    <div class="modal fade " id="modalCreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content fondo2">
                <div class="modal-header d-flex justify-content-center">
                    <h1 class="modal-title fs-2 colorLetra " id="exampleModalLabel"><b> Crear producto</b></h1>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('products.store') }}" class ="user">
                        @csrf
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input name="name" type="text" class="form-control form-control-user" id="exampleName"
                                    placeholder="Nombre">
                            </div>

                            <div class="col-sm-6">
                                <input name="description" type="text" class="form-control form-control-user"
                                    placeholder="Descripción">
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input name="size" type="text" class="form-control form-control-user"
                                    placeholder="Tamaño">
                            </div>

                            <div class="col-sm-6">
                                <input name="color" type="text" class="form-control form-control-user"
                                    placeholder="Color">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input name="price" type="int" class="form-control form-control-user"
                                    placeholder="Precio">
                            </div>

                            <div class="col-sm-6">
                                <input name="category" type="text" class="form-control form-control-user"
                                    placeholder="Categoría">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input name="stock" type="int" class="form-control form-control-user"
                                    placeholder="Inventario">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="botonCrear" id="botonCrear"><b>Crear</b>

                                </button>
                                <button type="button" class="botonCancelar" id="botonCancelar"
                                    data-bs-dismiss="modal"><b>Cancelar</b>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    {{-- Modal editar --}}
    <div class="modal fade " id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content fondo2">
                <div class="modal-header d-flex justify-content-center">
                    <h1 class="modal-title fs-2 colorLetra " id="exampleModalLabel"><b> Actualizar producto</b></h1>
                </div>
                <div class="modal-body">
                    <form method="POST " id="formEdit" action="{{ route('products.update', $product->id) }}"
                        class="user" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        
                        <div class="form-group row">
                            <input name="id" type="text" class="form-control form-control-user" hidden>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input name="nameEdit" type="text" class="form-control form-control-user"
                                    id="exampletNameEdit" placeholder="Nombre">
                            </div>

                            <div class="col-sm-6">
                                <input name="descriptionEdit" type="text" class="form-control form-control-user"
                                    id="exampleDescriptionEdit" placeholder="Descripción">
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input name="sizeEdit" type="text" class="form-control form-control-user"
                                    id="exampleInputSizetEdit" placeholder="Tamaño">
                            </div>

                            <div class="col-sm-6">
                                <input name="colorEdit" type="text" class="form-control form-control-user"
                                    id="exampleInputColorEdit" placeholder="Color">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input name="priceEdit" type="number" class="form-control form-control-user"
                                    id="exampleinputPriceEdit" placeholder="Precio">
                            </div>

                            <div class="col-sm-6">
                                <input name="categoryEdit" type="text" class="form-control form-control-user"
                                    id="exampleInputCategoryEdit" placeholder="Categoría">
                            </div>
                        </div>

                        <div class="col-m-12 mb-3 mb-m-0">
                            <input name="stockEdit" type="number" class="form-control form-control-user"
                                id="exampleInputStockEdit" placeholder="Inventario">
                        </div>

                        <!-- **Carga y vista previa de imagen** -->
                        <div class="form-group text-center">
                            <label for="profileImage" class="form-label colorLetra"><b>Seleccionar foto del producto
                                </b></label>
                            <input type="file" id="profileImage" name="profile_image" class="form-control"
                                accept="image/*" onchange="previewImage(event)">

                            <img id="imagePreview" src="{{ asset('profile_images/' . $product->photo) }}"
                                alt="Foto de perfil" class="mt-3 img-thumbnail"
                                style="max-width: 150px; {{ $product->profile_image ? '' : 'display: none;' }}">


                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="botonGuardar save" data-bs-dismiss="modal"><b>Guardar</b>

                            </button>
                            <button type="button" class="botonCancelar" data-bs-dismiss="modal"><b>Cancelar</b>

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
                {{-- <div class="modal-header d-flex justify-content-center">
                    <h1 class="modal-title fs-2 colorLetra "><b> ¿Está seguro que desea eliminar el usuario ? </b></h1>
                    {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> 
                </div> --}}
                <div class="modal-body">
                    <form method="POST" id="formDelete" action="{{ url('products/' . $product->id) }}" class="user">
                        @csrf
                        @method('DELETE')

                        <div class="form-group">
                            <label for="">¿Realmente quiere eliminarlo?</label>
                        </div>
                        <div class="form-group">
                            <label for="">Este acción no tiene retroceso.</label>
                        </div>


                        <div class="modal-footer">
                            <button type="submit" name="id" class="botonEliminarModal  save"
                                data-bs-dismiss="modal"><b>Eliminar</b>

                            </button>
                            <button type="button" class="botonEliminar" data-bs-dismiss="modal"><b>Cancelar</b>

                            </button>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


    <script>
        // Jquery para el modal de editar
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

            var form = $(this)[0]; // Obtener el formulario
            var formData = new FormData(form); // Crear FormData con el formulario
            var productId = $('input[name="id"]').val();
            var url = "/products/" + productId;

            $.ajax({
                url: url,
                type: 'POST', // Laravel requiere POST en formularios con archivos
                data: formData,
                processData: false, // Evitar que jQuery transforme los datos
                contentType: false // No establecer content-type manualmente
            }).always(function(response) {
                console.log("Eliminación exitosa:", response);
                $('#modalEdit').modal('hide');
                location.reload();
            });
        });


        // Jquery para el modal de eliminar
        $(document).on('click', '.delete', function() {
            var productId = $(this).attr('id');
            $('button[name="id"]').val(productId);
        })

        $('#formDelete').submit(function(e) {
            e.preventDefault();
            var form = $(this);
            var productId = form.find('button[name="id"]').val();
            var url = "/products/" + productId;

            $.ajax({
                url: url,
                type: 'DELETE',
                data: form.serialize()
            }).always(function(response) {
                console.log("Eliminación exitosa:", response);
                $('#modalDelete').modal('hide');
                location.reload();
            });
        });

        // Jquery para buscar un registro
        $('#qsearch').on('keyup', function(e) {
            e.preventDefault();
            $query = $(this).val();
            $token = $('input[name=_token]').val();

            $.post('products/search', {
                    q: $query,
                    _token: $token
                },

                function(data) {
                    $('.insert').empty().append(data);
                }
            )
        })

        // Jquery para cambiar la imagen
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('imagePreview');
                output.src = reader.result;
                output.style.display = "block";
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>



    {{-- <script>
        // Jquery para el modal de editar
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
                $('select[name="stockEdit"]').val(product.stock);

                /*   console.log(product) */
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
                data: form.serialize()
            }).always(function(response) {
                console.log("Eliminación exitosa:", response);
                $('#modalDelete').modal('hide');
                location.reload();
            });
        });

        // Jquery para el modal de eliminar
        $(document).on('click', '.delete', function() {
            var productId = $(this).attr('id');
            $('button[name="id"]').val(productId);
        })

        $('#formDelete').submit(function(e) {
            e.preventDefault();
            var form = $(this);
            var productId = form.find('button[name="id"]').val();
            var url = "/products/" + productId;

            $.ajax({
                url: url,
                type: 'DELETE',
                data: form.serialize()
            }).always(function(response) {
                console.log("Eliminación exitosa:", response);
                $('#modalDelete').modal('hide');
                location.reload();
            });
        });

        // Jquery para buscar un registro
        $('#qsearch').on('keyup', function(e) {
            e.preventDefault();
            $query = $(this).val();
            $token = $('input[name=_token]').val();

            $.post('products/search', {
                    q: $query,
                    _token: $token
                },

                function(data) {
                    $('.insert').empty().append(data);
                }
            )
        })

        // Jquery para cambiar la imagen
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('imagePreview');
                output.src = reader.result;
                output.style.display = "block";
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script> --}}
@endsection
