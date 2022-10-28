@extends('plantillas.principal')
@section('contenido')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Compras de producto <strong> {{$compras[0]->producto->codigo}}</strong></h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li>Compras</li>
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


                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered"
                                           style="width: 70%;  margin: 0 auto">
                                        <thead>
                                        <tr style="background: #CFD8DC">
                                            <th>N°</th>
                                            <th>Fecha</th>
                                            <th>Cantidad</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($compras as $compra)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{ date( 'd/m/Y', strtotime($compra->fecha))}}</td>
                                                <td>{{ $compra->cantidad }}</td>

                                                <td>
                                                    {!! Form::open(['route' => ['compras.destroy', $compra->id], 'method' => 'delete']) !!}

                                                    <button type="submit" class="btn btn-sm btn-danger" title="Eliminar" onclick="return confirm('¿Estás seguro de eliminar la compra?')">
                                                        <b class="fa fa-trash-o"></b>
                                                    </button>
                                                    {!! Form::close() !!}

                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center">No Existen Compras</td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
