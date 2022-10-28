@extends('plantillas.principal')
@section('contenido')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Clientes</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li>Clientes</li>
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
                            'route' => 'clientes.store',
                            ]) !!}

                            @include('clientes.form')


                            <div class="text-center">
                                <button type="submit" id="btnGuardar" class="btn btn-primary">
                                    <b class="fa fa-save"></b> Guardar
                                </button>
                                <a class="btn btn-outline-primary"
                                   href="{{ route('clientes.index') }}">
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

@endsection
