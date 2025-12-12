@extends('layouts.app')

@section('titleModule', 'Usuarios')

@section('content')
    <!-- DataTales Example -->
    <div class="insert">
        @foreach ($users as $user)
            <div class="card rounded-4" style="width: 18rem; display:inline-block; margin: 10px;">
                <img class="foto rounded-circle mt-4 mx-auto my-auto d-block"
                    src="{{ asset('profile_images/' . $user->photo) }}" alt="..." style="width:85%" height="260">
                <div class="card-body">
                    <h5 class="card-title text-center"><b class="colorLetraterracota"> Información</b></h5>
                    <div>
                        <tbody>

                            <tr>
                                <th><b class="colorLetraterracota">Nombre:</b> </th>
                                <th>{{ $user->name }}</th>
                            </tr><br>

                            <tr>
                                <th><b class="colorLetraterracota">Apellido:</b></th>
                                <th>{{ $user->lastname }}</th>
                            </tr><br>

                            <tr>
                                <th><b class="colorLetraterracota">Documento: </b></th>
                                <th>{{ $user->document }}</th>
                            </tr> <br>

                            <tr>
                                <th><b class="colorLetraterracota"> Dirección: </b> </th>
                                <th>{{ $user->address }}</th>
                            </tr><br>

                            <tr>
                                <th><b class="colorLetraterracota">Celular: </b></th>
                                <th>{{ $user->phone }}</th>
                            </tr><br>

                            <tr>
                                <th><b class="colorLetraterracota"> Fecha de nacimiento: </b> </th>
                                <th>{{ $user->birthday }} </th>
                            </tr><br>

                            <tr>
                                <th><b class="colorLetraterracota">Correo electrónico: </b></th>
                                <th>{{ $user->email }}</th>
                            </tr><br>

                            <tr>
                                <th><b class="colorLetraterracota">Rol: </b></th>
                                <th>{{ $user->role }}</th>
                            </tr><br>

                            <tr>
                                <th><b class="colorLetraterracota">Preferencias: </b></th>
                                <th>{{ $user->preferences }}</th>
                            </tr><br> <br>


                        </tbody>
                        <a href="{{ route('users.edit', $user->id) }}" class="botonEditar btn-block edit text-center">Editar</a>
                       <!-- <button class="botonEditar  btn-block edit " data-bs-toggle="modal" data-bs-target="#modalEdit"
                            id='{{ $user->id }}'><b>Editar</b></button>-->

                        

                        <form method="POST" action="{{ url('users/' . $user->id) }}">
                            @csrf
                            @method('DELETE')
                            <button  type="submit" class="botonEliminar btn-block delete"><b>Eliminar</b></button>

                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

   

                            {{-- Modal editar --}}
                            <div class="modal fade " id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content fondo2">
                                        <div class="modal-header d-flex justify-content-center">
                                            <h1 class="modal-title fs-2 colorLetra " id="exampleModalLabel"><b> Actualizar usuario</b></h1>
                                            {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST " id="formEdit" action="{{ route('users.update', $user->id) }}" class="user"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group row">
                                                    <input name="id" type="text" class="form-control form-control-user" hidden>
                                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                                        <input name="nameEdit" type="text" class="form-control form-control-user"
                                                            id="exampleFirstName" placeholder="Nombre">
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <input name="lastnameEdit" type="text" class="form-control form-control-user"
                                                            id="exampleLastName" placeholder="Apellidos">
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                                        <input name="documentEdit" type="text" class="form-control form-control-user"
                                                             placeholder="Documento">
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <input name="addressEdit" type="text" class="form-control form-control-user"
                                                            id="exampleInputAddress" placeholder="Dirección">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                                        <input name="phoneEdit" type="text" class="form-control form-control-user"
                                                            id="exampleinputPhone" placeholder="Celular">
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <input name="birthdayEdit" type="date" class="form-control form-control-user"
                                                            id="exampleInputBirthday" placeholder="Fecha de nacimiento">
                                                    </div>
                                                </div>

                                                <div class="col-m-12 mb-3 mb-m-0">
                                                    <input name="emailEdit" type="email" class="form-control form-control-user"
                                                        placeholder="Correo electrónico">
                                                </div>

                                                <div class="form-group">
                                                    <select name="roleEdit" class="form-control" aria-placeholder="Rol">
                                                        <option value="" disabled selected>Seleccione un rol</option>
                                                        <option value="Usuario">Usuario</option>
                                                        <option value="Administrador">Administrador</option>
                                                    </select>
                                                </div>

                                                <!-- **Carga y vista previa de imagen** -->
                                                <div class="form-group text-center">
                                                    <label for="profileImage" class="form-label colorLetra"><b>Seleccionar foto de perfil</b></label>
                                                    <input type="file" id="profileImage" name="profile_image" class="form-control"
                                                        accept="image/*" onchange="previewImage(event)">

                                                    <img id="imagePreview" src="{{ asset('profile_images/' . $user->photo) }}"
                                                        alt="Foto de perfil" class="mt-3 img-thumbnail"
                                                        style="max-width: 150px; {{ $user->profile_image ? '' : 'display: none;' }}">


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
                                            <form method="POST" id="formDelete" action="{{ url('users/' . $user->id) }}" class="user">
                                                {{-- <form method="POST" action="{{ url('users/' . $user->id) }}" class="user"> --}}
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
                                    var userId = $(this).attr('id');

                                    $.get('users/' + userId + '/edit', {}, function(data) {
                                        var user = data.user

                                        $('input[name="id"]').val(userId);
                                        $('input[name="nameEdit"]').val(user.name);
                                        $('input[name="lastnameEdit"]').val(user.lastname);
                                        $('input[name="documentEdit"]').val(user.document);
                                        $('input[name="addressEdit"]').val(user.address);
                                        $('input[name="phoneEdit"]').val(user.phone);
                                        $('input[name="birthdayEdit"]').val(user.birthday);
                                        $('input[name="emailEdit"]').val(user.email);
                                        $('select[name="roleEdit"]').val(user.role);

                                        console.log(user)
                                    })
                                })

                                $('#formEdit').submit(function(e) {
                                    e.preventDefault();

                                    var form = $(this)[0]; // Obtener el formulario
                                    var formData = new FormData(form); // Crear FormData con el formulario
                                    var userId = $('input[name="id"]').val();
                                    var url = "/users/" + userId;

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
                                    var userId = $(this).attr('id');
                                    $('button[name="id"]').val(userId);
                                })

                                $('#formDelete').submit(function(e) {
                                    e.preventDefault();
                                    var form = $(this);
                                    var userId = form.find('button[name="id"]').val();
                                    var url = "/users/" + userId;

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

                                    $.post('users/search', {
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
@endsection
