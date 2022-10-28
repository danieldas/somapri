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
                        <li>Usuario</li>
                        <li class="active">Lista</li>
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


                                {!! Form::open([
                                    'route' => 'usuarios.index',
                                    'method' => 'get',
                                    'class' => 'col-lg-10',
                                    ]) !!}
                                <div class="input-group ">
                                    <div class="col-lg-6">
                                        {!! Form::text('buscar', old('', Request::input('buscar')), [
                                            'class' => 'form-control ',
                                            'placeholder' => 'Buscar por Nombre Completo, Carnet...',
                                            'autocomplete'=>'off'
                                            ]) !!}
                                    </div>

                                    <div class="col-lg-2">
                                        {!! Form::select('alta',

                                            config('cmb.altas'),
                                            old('', Request::input('alta')),
                                            [
                                                'class' => 'form-control ',
                                            ])
                                        !!}
                                    </div>
                                    <div class="col-lg-4">

                                        <button type="submit" class="btn btn-lg btn-success" title="Buscar">
                                            <b class="fa fa-search"></b>
                                        </button>
                                        <a class="btn btn-primary active"
                                           href="{{ route('usuarios.create') }}" >
                                            <b class="fa fa-plus"></b> Registrar Usuario</a>
                                    </div>

                                </div>
                                {!! Form::close() !!}
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead >
                                    <tr style="background: #CFD8DC">
                                        <th>N°</th>
                                        <th>Cuenta</th>
                                        <th>Nombre Completo</th>
                                        <th>Carnet</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($usuarios as $usuario)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{ $usuario->cuenta }}</td>
                                            <td>{{ $usuario->nombre_completo }} </td>
                                            <td>{{ $usuario->ci }}</td>
                                            <td>
                                                @if($usuario->alta)

                                                    <a href="{{ route('usuarios.show', ['usuario' => $usuario->id]) }}"
                                                       class="btn btn-sm btn-info" title="Detalle">
                                                        <b class="fa fa-eye"></b>
                                                    </a>
                                                    <a href="{{ route('usuarios.edit', ['usuario' => $usuario->id]) }}"
                                                       class="btn btn-sm btn-warning " title="Editar">
                                                        <b class="fa fa-pencil"></b>
                                                    </a>
                                                    <a href="{{ route('usuarios.cambiarEstado', ['id' => $usuario->id, 'estado' => '0'])}}"

                                                       class="btn btn-sm btn-danger " title="Dar Baja">
                                                        <b class="fa fa-arrow-down"></b>
                                                    </a>

                                                    <a data-toggle="modal" data-target="#modal"
                                                       data-txtcuenta="{{$usuario->cuenta}}"
                                                       data-txtid="{{$usuario->id}}"
                                                       data-txtnombre="{{$usuario->nombre_completo}}"
                                                       class="btn btn-sm btn-secondary text-white"
                                                       title="Cambiar password">
                                                        <b class="fa fa-lock"></b>
                                                    </a>

                                                @else

                                                    <a href="{{ route('usuarios.cambiarEstado', ['id' => $usuario->id, 'estado' => '1'])}}"
                                                       class="btn btn-sm btn-success " title="Dar Alta">
                                                        <b class="fa fa-arrow-up"></b>
                                                    </a>
                                                @endif

                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">No existen usuarios</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                                <div class="text-center">
                                    {{ $usuarios->appends($_GET)->links()  }}
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="appUsuario">
        @include("usuarios.pass")
    </div>
    <script>
        $('#modal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var id = button.data('txtid')
            var cuenta = button.data('txtcuenta')
            var nombre = button.data('txtnombre')

            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #cuenta').val(cuenta);
            modal.find('.modal-body #nombre').val(nombre);
        })
    </script>
@endsection
