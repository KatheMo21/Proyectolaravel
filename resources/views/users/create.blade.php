@extends('layouts.app')
@section('title', 'Crear Producto')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-lg border-0 rounded-4 fondo2">
                <div class="card-header text-center fs-3 colorLetra">
                    <b>Crear usuario</b>
                </div>

                <div class="card-body p-4 fondo2">

                    <form method="POST" action="{{ route('users.store') }}" class="user">
                        @csrf

                        <div class="form-group row mb-3">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input name="name" type="text" class="form-control form-control-user" placeholder="Nombre">
                            </div>

                            <div class="col-sm-6">
                                <input name="lastname" type="text" class="form-control form-control-user" placeholder="Apellidos">
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input name="document" type="text" class="form-control form-control-user" id="exampleInputDocument" placeholder="Documento">
                            </div>

                            <div class="col-sm-6">
                                <input name="address" type="text" class="form-control form-control-user" placeholder="Dirección">
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input name="phone" type="text" class="form-control form-control-user" placeholder="Celular">
                            </div>

                            <div class="col-sm-6">
                                <input name="birthday" type="date" class="form-control form-control-user" placeholder="Fecha de nacimiento">
                            </div>
                        </div>

                        <div class="mb-3">
                            <input name="email" type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Correo electrónico">
                        </div>

                        <div class="form-group row mb-3">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input name="password" type="password" class="form-control form-control-user" placeholder="Contraseña">
                            </div>

                            <div class="col-sm-6">
                                <input name="password_confirmation" type="password" class="form-control form-control-user" placeholder="Confirmar contraseña">
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <select name="role" class="form-control form-control" id="">
                                <option value="" disabled selected>Seleccione un rol</option>
                                <option value="Usuario">Usuario</option>
                                <option value="Administrador">Administrador</option>
                            </select>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="botonCrear" id="botonCrear"><b>Crear</b></button>
                            <a href="{{ route('users.index') }}" class="botonCancelar" id="botonCancelar"><b>Cancelar</b></a>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection