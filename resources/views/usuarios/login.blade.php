<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SOMAPRI</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/css/AdminLTE.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/css/skins/_all-skins.min.css">

    <!-- iCheck -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/square/_all.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body class="hold-transition login-page" style="background-color: #ECEFF1">


<div class="login-box"  style="width: 550px;">
    <div class="login-logo">
        <a ><sub><small><b>SOMAPRI</b></small></sub></a>
    </div>

    <!-- /.login-logo -->

    <div class="login-box-body"  style="border: 1px solid #D0D0D0; box-shadow: 0 3px 12px rgba(0, 0, 0, .09); border-radius: 7px" >
        <div class="row">
            <div class="col-sm-4" style="height: 200px;  align-content: center; vertical-align: center; text-align: center">
                <br><br><br><br>
                <img style="width: 110%; align-content: center; vertical-align: center; text-align: center" src="{!! asset('img/somapri1.png') !!}"><br><br>

            </div>
            <div class="col-sm-8">
                <p class="login-box-msg text-muted">Se requiere sus credenciales de acceso para utilizar el sistema</p>





        @if(session('mensaje'))
            <div class="alert alert-success">
                {{ session('mensaje') }}
            </div>
        @endif

        @if($errors->has('login'))
            <div class="alert alert-danger">
                {{ $errors->first('login') }}
            </div>
        @endif
        {!! Form::open(['route' => 'usuarios.logear']) !!}

                <div class="form-group has-feedback">
                               {!! Form::text('cuenta', null, ['class' => 'form-control',  'placeholder' => 'Cuenta']) !!}

                    <span class="glyphicon glyphicon-user form-control-feedback"></span>

                </div>

                <div class="form-group has-feedback">
                    {!! Form::password('password', ['class' => 'form-control',  'placeholder' => 'Password']) !!}

                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>


                </div>



        <button class="btn btn-primary btn-lg btn-block" type="submit">Ingresar</button>

        {!! Form::close() !!}

    </div>

</div>
    </div>
    <p><br><br></p>
    <div class="text-center text-muted">
        &copy; SOMAPRI 2022
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- AdminLTE App -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/js/adminlte.min.js"></script>


</body>

</html>
