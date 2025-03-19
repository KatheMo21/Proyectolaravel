@forelse ($users as $user)
    <div class="card rounded-4" style="width: 18rem; display:inline-block; margin: 10px;">
        <img class="foto rounded-circle mt-4 mx-auto d-block" src="{{ asset('profile_images/' . $user->photo) }}" alt="..."
            style="width:260" height="260">
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
                    </tr><br>


                </tbody>
                <button class="botonEditar  btn-block edit " data-bs-toggle="modal" data-bs-target="#modalEdit"
                    id='{{ $user->id }}'><b>Editar</b></button>

                <button class="botonEliminar btn-block delete" data-bs-toggle="modal" data-bs-target="#modalDelete"
                    id='{{ $user->id }}'><b>Eliminar</b></button>

                <form method="POST" action="{{ url('users/' . $user->id) }}">
                    @csrf
                    @method('DELETE')

                </form>
            </div>
        </div>
    </div>
@empty
    <h1> No encontro registros para criterio de busqueda </h1>
@endforelse
