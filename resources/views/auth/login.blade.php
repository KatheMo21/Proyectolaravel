<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Iniciar sesión</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
      {{-- logo --}}
      <link rel="icon" class="fa-fw " href="{{ asset('img/logo.png') }}" type="image/x-icon">

</head>

<body class="fondoInicioSesión">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-5 shadow-lg my-5  ">

                    <div class="card-body p-0  ">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6  ">

                                <img src="{{ asset('img/logo_intensionadamente.jpg') }}" alt=""
                                    style="width:105%" height="100%">



                            </div>
                            <div class="col-lg-6 fondo2">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h1 colorLetra fw-bolder mb-4">Iniciar sesión</h1>
                                    </div>
                                    <form method="POST" action="{{ route('login') }}"class="user">
                                        @csrf
                                        <div class="form-group">
                                            <input name="email" type="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Ingrese el correo electrónico">
                                        </div>
                                        <div class="form-group">
                                            <input name="password" type="password"
                                                class="form-control form-control-user" id="exampleInputPassword"
                                                placeholder="Contraseña">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input name="remember"type="checkbox" class="custom-control-input"
                                                    id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Recuérdame
                                                </label>
                                            </div>
                                        </div>

                                        <button type = "submit" class="btn btn-primary btn-user btn-block"
                                            id="boton">
                                            <b>Iniciar sesión</b> </button>
                                        <br>

                                    </form>

                                    <div class="text-center ">
                                        <a class="small colorLetra " href="{{ route('password.request') }}">
                                            <h6><b>¿ Olvidó la contraseña?</b></h6>
                                        </a>
                                    </div>
                                    <div class="text-center ">
                                        <a class="small colorLetra" href="{{ route('register') }}">
                                            <h6><b>Crear una cuenta</b> </h6>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

</body>

</html>
