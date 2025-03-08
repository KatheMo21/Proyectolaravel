<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>
    <!-- resources/views/layouts/app.blade.php -->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">


    <!-- <link href="{{asset("https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css")}} rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->

    <!-- Custom fonts for this template-->
    <link href="{{asset("vendor/fontawesome-free/css/all.min.css")}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset("css/sb-admin-2.min.css")}}" rel="stylesheet">

</head>

<body class="fondo">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image ">
                       
                            <img src="{{ asset('img/collage.jpg') }}" alt="" style="width:106%" height="100%" >
                        
                    </div>

                    <div class="col-lg-7">
                        <div class="p-5 fondo2">
                            <div class="text-center">
                                <h1 class="h1 colorLetra mb-4 ">
                                    <b>Crear cuenta</b> </h1>
                            </div>
                            <form  method="POST" action="{{ route('register') }}" class ="user">
                            @csrf
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input name="name" type="text" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="Nombre">
                                    </div>

                                    <div class="col-sm-6">
                                        <input name="lastname" type="text" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="Apellidos">
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input name="document" type="text" class="form-control form-control-user" id="exampleInputDocument"
                                            placeholder="Documento">
                                    </div>

                                    <div class="col-sm-6">
                                        <input name="address" type="text" class="form-control form-control-user" id="exampleInputAddress"
                                            placeholder="Dirección">
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
                                            <input name="password" type="password" class="form-control form-control-user" id="exampleInputPassword"
                                                placeholder="Contraseña">
                                        </div>

                                        <div class="col-sm-6">
                                            <input name="password_confirmation" type="password" class="form-control form-control-user" id="exampleRepeatPassword"
                                                placeholder="Confirmar contraseña">
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-user btn-block"  id="boton"> 
                                        <b>Registrar</b></button>
                            </form>
                                    <div class="text-center mt-3">
                                    <a class="small colorLetra" href="{{ route('password.request')}}">
                                        <b>¿ Olvidó la contraseña?</b></a>
                                    </div>
                                    <div class="text-center ">
                                    <a class="small colorLetra" href="{{ route('login') }}">
                                        <b>¿ Ya tienes una cuenta?</b> </a>
                                    </div>
                                </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset("vendor/jquery/jquery.min.js")}}"></script>
    <script src="{{asset("vendor/bootstrap/js/bootstrap.bundle.min.js")}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset("vendor/jquery-easing/jquery.easing.min.js")}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset("js/sb-admin-2.min.js")}}"></script>

</body>

</html>