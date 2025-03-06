@extends('layouts.app')

@section('titleModule', 'Usuarios')

@section('content')
    <!-- DataTales Example -->


    <div class="card" style="width: 18rem;">
        <img src="{{ asset('img/admin.jpg') }}" class="card-img-top mx-auto border border-light" alt="..."
            style="width:80%" height="70%">
        <div class="card-body">
            <h5 class="card-title">Información</h5>
            <div>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <th><b>Nombre:</b> </th>
                            <th>{{ $user->name }}</th>
                        </tr><br>

                        <tr>
                            <th><b>Apellido:</b></th>
                            <th>{{ $user->lastname }}</th>
                        </tr><br>

                        <tr>
                            <th><b>Documento: </b></th>
                            <th>{{ $user->document }}</th>
                        </tr> <br>

                        <tr>
                            <th><b> Dirección: </b> </th>
                            <th>{{ $user->address }}</th>
                        </tr><br>

                        <tr>
                            <th><b>Celular: </b></th>
                            <th>{{ $user->phone }}</th>
                        </tr><br>

                        <tr>
                            <th><b> de nacimiento: </b> </th>
                            <th>{{ $user->birthday }} </th>
                        </tr><br>

                        <tr>
                            <th><b>Correo electrónico: </b></th>
                            <th>{{ $user->email }}</th>
                        </tr><br>

                        <tr>
                            <th><b>Rol: </b></th>
                            <th>{{ $user->role }}</th>
                        </tr><br>

                        <tr>
                            <th><b>Preferencias: </b></th>
                            <th>{{ $user->preferences }}</th>
                        </tr><br>

                        {{-- <tr>
                        <th><b>Historial de compras: </b></th>
                        <th>{{ $user->purchase_history }}</th>
                    </tr><br>
                    
                    <tr>
                        <th>Foto</th>
                        <th>{{ $user->photo }}</th>
                    </tr><br> --}}
                    @endforeach
                </tbody>
                <a href="#" class="btn colorLetraClara" id="botonAcciones">Editar</a> 
            </div>
        </div>

        {{-- <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Documento</th>
                            <th>Dirección</th>
                            <th>Celular</th>
                            <th>Fecha de nacimiento </th>
                            <th>Correo electrónico</th>
                            <th>Rol </th>
                            <th>Preferencias</th>
                            <th>Historial de compras</th>
                            <th>Foto</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Documento</th>
                            <th>Dirección</th>
                            <th>Celular</th>
                            <th>Fecha de nacimiento </th>
                            <th>Correo electrónico</th>
                            <th>Rol </th>
                            <th>Preferencias</th>
                            <th>Historial de compras</th>
                            <th>Foto</th>
                            <th>Acciones</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <th>{{ $user->name }}</th>
                                <th>{{ $user->lastname }}</th>
                                <th>{{ $user->document }}</th>
                                <th>{{ $user->address }}</th>
                                <th>{{ $user->phone }}</th>
                                <th>{{ $user->birthday }} </th>
                                <th>{{ $user->email }}</th>
                                <th>{{ $user->role }}</th>
                                <th>{{ $user->preferences }}</th>
                                <th>{{ $user->purchase_history }}</th>
                                <th>{{ $user->photo }}</th>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>--}}
    </div> 

    {{-- Modal Actualizar --}}
    <div class="modal fade " id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content fondo2">
                <div class="modal-header d-flex justify-content-center">
                    <h1 class="modal-title fs-2 colorLetra " id="exampleModalLabel"><b> Actualizar usuario</b></h1>
                    {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                </div>
                <div class="modal-body">
                    <form method="PUT" action=" {{--{{ route('users.update') }}--}}" class ="user"> 
                        @csrf
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input name="name" type="text" class="form-control form-control-user"
                                    id="exampleFirstName" placeholder="Nombre">
                            </div>

                            <div class="col-sm-6">
                                <input name="lastname" type="text" class="form-control form-control-user"
                                    id="exampleLastName" placeholder="Apellidos">
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input name="document" type="text" class="form-control form-control-user"
                                    id="exampleInputDocument" placeholder="Documento">
                            </div>

                            <div class="col-sm-6">
                                <input name="address" type="text" class="form-control form-control-user"
                                    id="exampleInputAddress" placeholder="Dirección">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input name="phone" type="text" class="form-control form-control-user"
                                    id="exampleinputPhone" placeholder="Telefono">
                            </div>

                            <div class="col-sm-6">
                                <input name="birthday" type="date" class="form-control form-control-user"
                                    id="exampleInputBirthday" placeholder="Fecha de nacimiento">
                            </div>
                        </div>

                        <div class="col-m-12 mb-3 mb-m-0">
                            <input name="email" type="email" class="form-control form-control-user"
                                id="exampleInputEmail" placeholder="Correo electrónico">
                        </div>



                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input name="password" type="password" class="form-control form-control-user"
                                    id="exampleInputPassword" placeholder="Contraseña">
                            </div>

                            <div class="col-sm-6">
                                <input name="password_confirmation" type="password"
                                    class="form-control form-control-user" id="exampleRepeatPassword"
                                    placeholder="Confirmar contraseña">
                            </div>
                        </div>

                        <div class="form-group">
                            <select name="role" class="form-control form-control-user " aria-placeholder="Rol" id="">
                                <option value="Usuario">Usuario</option>
                                <option value="Administrador">Administrador</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="botonCrear"><b>Crear</b>
                               
                            </button>
                            <button type="button" class="btn btn-secondary" id="botonCancelar" data-bs-dismiss="modal"><b>Cancelar</b>
                                
                            </button>
                            
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>








    <div class="modal fade " id="modalCreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content fondo2">
                <div class="modal-header d-flex justify-content-center">
                    <h1 class="modal-title fs-2 colorLetra " id="exampleModalLabel"><b> Crear usuario</b></h1>
                    {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('users.store') }}" class ="user">
                        @csrf
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input name="name" type="text" class="form-control form-control-user"
                                    id="exampleFirstName" placeholder="Nombre">
                            </div>

                            <div class="col-sm-6">
                                <input name="lastname" type="text" class="form-control form-control-user"
                                    id="exampleLastName" placeholder="Apellidos">
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input name="document" type="text" class="form-control form-control-user"
                                    id="exampleInputDocument" placeholder="Documento">
                            </div>

                            <div class="col-sm-6">
                                <input name="address" type="text" class="form-control form-control-user"
                                    id="exampleInputAddress" placeholder="Dirección">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input name="phone" type="text" class="form-control form-control-user"
                                    id="exampleinputPhone" placeholder="Telefono">
                            </div>

                            <div class="col-sm-6">
                                <input name="birthday" type="date" class="form-control form-control-user"
                                    id="exampleInputBirthday" placeholder="Fecha de nacimiento">
                            </div>
                        </div>

                        <div class="col-m-12 mb-3 mb-m-0">
                            <input name="email" type="email" class="form-control form-control-user"
                                id="exampleInputEmail" placeholder="Correo electrónico">
                        </div>



                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input name="password" type="password" class="form-control form-control-user"
                                    id="exampleInputPassword" placeholder="Contraseña">
                            </div>

                            <div class="col-sm-6">
                                <input name="password_confirmation" type="password"
                                    class="form-control form-control-user" id="exampleRepeatPassword"
                                    placeholder="Confirmar contraseña">
                            </div>
                        </div>

                        <div class="form-group">
                            <select name="role" class="form-control form-control-user " aria-placeholder="Rol" id="">
                                <option value="Usuario">Usuario</option>
                                <option value="Administrador">Administrador</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="botonCrear"><b>Crear</b>
                               
                            </button>
                            <button type="button" class="btn btn-secondary" id="botonCancelar" data-bs-dismiss="modal"><b>Cancelar</b>
                                
                            </button>
                            
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
        {{-- @yield('modalCreate') --}}
    @endsection
