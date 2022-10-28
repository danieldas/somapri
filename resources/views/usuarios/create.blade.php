@extends('plantillas.principal')
@section('contenido')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Usuarios</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li>Usuarios</li>
                        <li>Agregar</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">
        <div class="animated fadeIn">

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Agregar</strong>
                        </div>
                        <div class="card-body">
                            @if($errors->has('registro'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('registro') }}
                                </div>
                            @endif
                            @if(session('mensaje'))
                                <div class="alert alert-success">
                                    {{ session('mensaje') }}
                                </div>
                            @endif
                            {!! Form::open([
                            'route' => 'usuarios.store',
                            'id' => 'formUsuario',
                            ]) !!}

                            @include('usuarios.form')

                            @if($errors->has('password'))
                                <div class="form-group has-error">
                                    <div class="help-block">
                                        <label class="alert-danger">{{ $errors->first('password') }}</label>
                                    </div>
                                </div>
                            @endif
                            <div class="form-group">
                                <div class="col-lg-2">
                                    {!! Form::label('Password', 'Password *:', ['class' => 'control-label']) !!}
                                </div>
                                <div class="col-lg-8">
                                    {!! Form::text('password', null, ['class' => 'form-control', 'maxlength' => '70', 'required', 'autocomplete'=>'off']) !!}
                                </div>
                                <br><br>
                            </div>



                            <div class="text-center">
                                <button type="submit" id="btnGuardar" class="btn btn-primary">
                                    <b class="fa fa-save"></b> Guardar
                                </button>
                                <a class="btn btn-outline-primary"
                                   href="{{ route('usuarios.index') }}">
                                    <b class="fa fa-reply"></b> Volver
                                </a>
                            </div>
                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        $("#formUsuario").on("submit", function() {
            $("#btnGuardar").prop("disabled", true);
        });
    </script>
@endsection
