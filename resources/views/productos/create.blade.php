@extends('plantillas.principal')
@section('contenido')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Productos</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li>Productos</li>
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
                            'route' => 'productos.store',
                            ]) !!}

                            @include('productos.form')
                                @if($errors->has('cantidad'))
                                    <div class="form-group has-error">
                                        <div class="help-block">
                                            <label class="alert-danger">{{ $errors->first('cantidad') }}</label>
                                        </div>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <div class="col-lg-2">
                                        {!! Form::label('Cantidad', 'Cantidad *:', ['class' => 'control-label']) !!}
                                    </div>
                                    <div class="col-lg-8">

                                        {!! Form::number('cantidad', null, ['class' => 'form-control', 'maxlength' => '8', 'required', 'min'=>'0']) !!}
                                    </div>
                                    <br><br>
                                </div>


                                @if($errors->has('fecha'))
                                    <div class="form-group has-error">
                                        <div class="help-block">
                                            <label class="alert-danger">{{ $errors->first('fecha') }}</label>
                                        </div>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <div class="col-lg-2">
                                        {!! Form::label('Fecha', 'Fecha *:', ['class' => 'control-label']) !!}
                                    </div>
                                    <div class="col-lg-8">
                                        {!! Form::date('fecha', null, ['class' => 'form-control', 'maxlength' => '70', 'required', 'autocomplete'=>'off']) !!}
                                    </div>
                                    <br><br>
                                </div>

                            <div class="text-center">
                                <button type="submit" id="btnGuardar" class="btn btn-primary">
                                    <b class="fa fa-save"></b> Guardar
                                </button>
                                <a class="btn btn-outline-primary"
                                   href="{{ route('productos.index') }}">
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
