@extends('layouts.app')

@section('titleModule', 'Sales')

@section('content')
    <!-- DataTales Example -->
    <div class="insert">
        @foreach ($sales as $sale)
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
        @endforeach
    </div>

    {{-- modal crear --}}
    <div class="modal fade " id="modalCreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content fondo2">
                <div class="modal-header d-flex justify-content-center">
                    <h1 class="modal-title fs-2 colorLetra " id="exampleModalLabel"><b> Crear factura</b></h1>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('sales.store') }}" class ="user">
                        @csrf



                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input name="product" type="text" class="form-control form-control-user"
                                    placeholder="Nombre del producto">
                            </div>

                            <div class="col-sm-6">
                                <input name="amount" type="number" class="form-control form-control-user"
                                    placeholder="Cantidad">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input name="total_cost" type="number" class="form-control form-control-user"
                                    placeholder="Total">
                            </div>

                            <div class="col-sm-6">
                                <input name="purchase_date" type="date" class="form-control form-control-user"
                                    placeholder="Fecha de compra">
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input name="shipping_details" type="text" class="form-control form-control-user"
                                    placeholder="Detalles del envio">
                            </div>

                            <div class="col-sm-6">
                                <input name="order_status" type="text" class="form-control form-control-user"
                                    placeholder="Estado del pedido">
                            </div>

                        </div>


                        <div class="form-group row">

                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input name="user_id" type="number" class="form-control form-control-user" id="exampleName"
                                    placeholder="Usuario">
                            </div>

                            <div class="col-sm-6">
                                <input name="product_id" type="number" class="form-control form-control-user"
                                    placeholder="Producto">
                            </div>
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


    {{-- Modal editar --}}
    <div class="modal fade " id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content fondo2">
                <div class="modal-header d-flex justify-content-center">
                    <h1 class="modal-title fs-2 colorLetra " id="exampleModalLabel"><b> Actualizar Factura</b></h1>
                </div>
                <div class="modal-body">
                    <form method="POST " id="formEdit" action="{{ route('sales.update', $sale->id) }}" class="user"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')


                        <div class="form-group row">
                            <input name="id" type="text" class="form-control form-control-user" hidden>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input name="productEdit" type="text" class="form-control form-control-user"
                                    id="exampletProductEdit" placeholder="Usuario">
                            </div>

                            <div class="col-sm-6">
                                <input name="amountEdit" type="number" class="form-control form-control-user"
                                    id="exampleInputAmountEdit" placeholder="Cantidad">
                            </div>


                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input name="total_costEdit" type="text" class="form-control form-control-user"
                                        id="exampleInputTotal_coustEdit" placeholder="Total">
                                </div>

                                <div class="col-sm-6">
                                    <input name="purchase_dateEdit" type="date" class="form-control form-control-user"
                                        id="exampleInputPurchase_dateEdit" placeholder="Fecha de compra">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input name="order_statusEdit" type="text" class="form-control form-control-user"
                                        id="exampleinputOrder_statusEdit" placeholder="Estado del pedido">
                                </div>

                                <div class="col-sm-6">
                                    <input name="shipping_detailsEdit" type="text"
                                        class="form-control form-control-user" id="exampleInputShipping_detailsEdit"
                                        placeholder="Detalles del envio">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input name="user_idEdit" type="text" class="form-control form-control-user"
                                        id="exampleinputUser_idEdit" placeholder="Usuario">
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <input name="product_idEdit" type="text"
                                            class="form-control form-control-user" id="exampleInputProduct_idEdit"
                                            placeholder="Producto">
                                    </div>
                                </div>



                                <!-- **Carga y vista previa de imagen** -->
                                {{--  <div class="form-group text-center">
                            <label for="profileImage" class="form-label colorLetra"><b>Seleccionar foto del producto
                                </b></label>
                            <input type="file" id="profileImage" name="profile_image" class="form-control"
                                accept="image/*" onchange="previewImage(event)">

                            <img id="imagePreview" src="{{ asset('profile_images/' . $product->photo) }}"
                                alt="Foto de perfil" class="mt-3 img-thumbnail"
                                style="max-width: 150px; {{ $product->profile_image ? '' : 'display: none;' }}">


                        </div> --}}

                                <div class="modal-footer">
                                    <button type="submit" class="botonGuardar save"
                                        data-bs-dismiss="modal"><b>Guardar</b>

                                    </button>
                                    <button type="button" class="botonCancelar" data-bs-dismiss="modal"><b>Cancelar</b>

                                    </button>

                                </div>
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
                    <form method="POST" id="formDelete" action="{{ url('sales/' . $sale->id) }}" class="user">
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
            var saleId = $(this).attr('id');

            $.get('sales/' + saleId + '/edit', {}, function(data) {
                var sale = data.sale

                $('input[name="id"]').val(saleId);
                $('input[name="productEdit"]').val(sale.product);
                $('input[name="amountEdit"]').val(sale.amount);
                $('input[name="total_costEdit"]').val(sale.total_cost);
                $('input[name="purchase_dateEdit"]').val(sale.purchase_date);
                $('input[name="order_statusEdit"]').val(sale.order_status);
                $('input[name="shipping_detailsEdit"]').val(sale.shipping_details);
                $('input[name="user_idEdit"]').val(sale.user_id);
                $('input[name="product_idEdit"]').val(sale.product_id);
                console.log(sale)
            })
        })

        $('#formEdit').submit(function(e) {
            e.preventDefault();

            var form = $(this)[0]; // Obtener el formulario
            var formData = new FormData(form); // Crear FormData con el formulario
            var saleId = $('input[name="id"]').val();
            var url = "/sales/" + saleId;

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
            var saleId = $(this).attr('id');
            $('button[name="id"]').val(saleId);
        })

        $('#formDelete').submit(function(e) {
            e.preventDefault();
            var form = $(this);
            var saleId = form.find('button[name="id"]').val();
            var url = "/sales/" + saleId;

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

            $.post('sales/search', {
                    q: $query,
                    _token: $token
                },

                function(data) {
                    $('.insert').empty().append(data);
                }
            )
        })

        // Jquery para cambiar la imagen
        /* function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('imagePreview');
                output.src = reader.result;
                output.style.display = "block";
            }
            reader.readAsDataURL(event.target.files[0]);
        } */
    </script>
@endsection
