@extends('layouts.app')
@section('title', 'Editar Usuario')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-lg border-0 rounded-4 fondo2">
                <div class="card-header text-center fs-3 colorLetra">
                    <b>Actualizar Usuario</b>
                </div>

                <div class="card-body p-4">

                    <form method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="id" value="{{ $user->id }}">

                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <label class="colorLetra fw-bold">Nombre</label>
                                <input name="nameEdit" type="text" class="form-control form-control-user" value="{{ $user->name }}">
                            </div>

                            <div class="col-sm-6 mb-3">
                                <label class="colorLetra fw-bold">Apellidos</label>
                                <input name="lastnameEdit" type="text" class="form-control form-control-user" value="{{ $user->lastname }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <label class="colorLetra fw-bold">Documento</label>
                                <input name="documentEdit" type="text" class="form-control form-control-user" value="{{ $user->document }}">
                            </div>

                            <div class="col-sm-6 mb-3">
                                <label class="colorLetra fw-bold">Dirección</label>
                                <input name="addressEdit" type="text" class="form-control form-control-user" value="{{ $user->address }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <label class="colorLetra fw-bold">Celular</label>
                                <input name="phoneEdit" type="text" class="form-control form-control-user" value="{{ $user->phone }}">
                            </div>

                            <div class="col-sm-6 mb-3">
                                <label class="colorLetra fw-bold">Fecha de nacimiento</label>
                                <input name="birthdayEdit" type="date" class="form-control form-control-user" value="{{ $user->birthday }}">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="colorLetra fw-bold">Correo</label>
                            <input name="emailEdit" type="email" class="form-control form-control-user" value="{{ $user->email }}">
                        </div>

                        <div class="mb-3">
                            <label class="colorLetra fw-bold">Contraseña (opcional)</label>
                            <input name="passwordEdit" type="password" class="form-control form-control-user" placeholder="Nueva contraseña">
                        </div>

                        <div class="form-group mb-4">
                            <label class="colorLetra fw-bold">Rol</label>
                            <select name="roleEdit" class="form-control">
                                <option value="Customer" {{ $user->role == 'Customer' ? 'selected' : '' }}>Usuario</option>
                                <option value="Administrador" {{ $user->role == 'Administrador' ? 'selected' : '' }}>Administrador</option>
                            </select>
                        </div>

                        <div class="form-group text-center mb-4">
                            <label class="form-label colorLetra fw-bold">Seleccionar foto de perfil</label>
                            <input type="file" name="profile_image" class="form-control" accept="image/*">

                            <img id="imagePreview"
                                 src="{{ $user->photo ? asset('profile_images/' . $user->photo) : asset('profile_images/default_user.png') }}"
                                 alt="Foto de perfil"
                                 class="mt-3 img-thumbnail"
                                 style="max-width: 150px;">
                        </div>

                        <div class="text-center mt-4">
                            <button type="submit" class="botonGuardar save px-4 py-2">
                                <b>Guardar</b>
                            </button>

                            <a href="{{ route('users.index') }}" class="botonCancelar px-4 py-2 ms-2">
                                <b>Cancelar</b>
                            </a>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

<script>
    document.getElementById('profileImageInput')?.addEventListener('change', function(event) {
        const [file] = event.target.files;
        const preview = document.getElementById('imagePreview');
        if (file) {
            preview.src = URL.createObjectURL(file);
        } else {
            preview.src = "{{ $user->photo ? asset('profile_images/' . $user->photo) : asset('profile_images/default_user.png') }}";
        }
    });
</script>

@endsection
