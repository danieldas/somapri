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
                        <li>Lista</li>
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
                            <strong class="card-title">Lista</strong>
                        </div>
                        <div class="card-body">
                            @if(session('mensaje'))
                                <div class="alert alert-success">
                                    {{ session('mensaje') }}
                                </div>
                            @endif
                            @if(session('mensajeRojo'))
                                <div class="alert alert-danger">
                                    {{ session('mensajeRojo') }}
                                </div>
                            @endif
                            <div class="form-group">


                                <div class="input-group ">
                                    {!! Form::open([
                                                                      'route' => 'clientes.index',
                                                                      'method' => 'get',
                                                                      'class' => 'col-lg-10',
                                                                  ]) !!}
                                    <div class="input-group ">
                                        <div class="col-lg-7">
                                            {!! Form::text('buscar', old('', Request::input('buscar')), [
                                                'class' => 'form-control ',
                                                'placeholder' => 'Buscar por Nombre completo...',
                                                'autocomplete'=>'off'
                                                ]) !!}
                                        </div>

                                        <div class="col-lg-5">

                                            <button style="margin-left: -15px" type="submit"
                                                    class="btn btn-lg btn-success" title="Buscar">
                                                <b class="fa fa-search"></b>
                                            </button>
                                            <a href="{{ route('clientes.create') }}" style="margin-left: 15px"
                                               class="btn btn-primary active">
                                                <b class="fa fa-plus"></b> Registrar Cliente
                                            </a>
                                        </div>
                                    </div>

                                    {!! Form::close() !!}
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered"
                                           style="width: 70%;  margin: 0 auto">
                                        <thead>
                                        <tr style="background: #CFD8DC">
                                            <th>N°</th>
                                            <th>Nombre completo</th>
                                            <th>Carnet</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($clientes as $cliente)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{ $cliente->nombre_completo }}</td>
                                                <td>{{ $cliente->ci }}</td>

                                                <td>
                                                    <a href="{{ route('clientes.edit', ['cliente' => $cliente->id]) }}"
                                                       class="btn btn-sm btn-warning " title="Editar">
                                                        <b class="fa fa-pencil"></b>
                                                    </a>

                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center">No Existen Clientes</td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <div class="text-center">
                                    {{ $clientes->appends($_GET)->links()  }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
