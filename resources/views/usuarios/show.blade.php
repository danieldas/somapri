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
                        <li>Detalle</li>
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
                            <strong class="card-title">Detalle</strong>
                        </div>
                        <div class="card-body">
                            @if(session('mensaje'))
                                <div class="alert alert-success">
                                    {{ session('mensaje') }}
                                </div>
                            @endif
                            <table class="table table-bordered" style="width: 70%;  margin: 0 auto; text-align: center">
                                <tr>
                                    <td><strong>Cuenta: </strong>{{ $usuario->cuenta }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Nombre: </strong>{{ $usuario->nombre }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Apellido Paterno: </strong>{{ $usuario->apellido_paterno }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Apellido Materno: </strong>{{ $usuario->apellido_materno }}</td>
                                </tr>

                                <tr>
                                    <td><strong>Rol: </strong>{{ $usuario->rol}}</td>
                                </tr>

                                <tr>
                                    <td><strong>Cédula de identidad: </strong>{{ $usuario->ci}}</td>
                                </tr>
                                <tr>
                                    <td><strong>Estado: </strong>
                                        @if($usuario->alta)
                                            Alta
                                        @else
                                            Baja
                                        @endif
                                    </td>
                                </tr>

                            </table>
                            <br>
                            <div class="text-center">

                                <div class="btn-group" role="group">

                                    @if($usuario->alta)
                                        <a href="{{ route('usuarios.cambiarEstado', ['id' => $usuario->id, 'estado' => '0'])}}"
                                           class="btn btn-danger " title="Dar Baja">
                                            <b class="fa fa-arrow-down"></b> Dar Baja
                                        </a>
                                    @else
                                        <a href="{{ route('usuarios.cambiarEstado', ['id' => $usuario->id, 'estado' => '1'])}}"
                                           class="btn btn-success " title="Dar Alta">
                                            <b class="fa fa-arrow-up"></b> Dar Alta
                                        </a>
                                    @endif
                                    <a href="{{ route('usuarios.edit', ['usuario' => $usuario->id]) }}"
                                       class="btn btn-warning "
                                       title="Editar">
                                        <b class="fa fa-pencil"></b> Editar
                                    </a>

                                    <a href="{{ route('usuarios.index') }}"
                                       class="btn btn-secondary">
                                        <b class="fa fa-reply"></b> Volver
                                    </a>
                                </div>
                            </div>
                            </td>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
