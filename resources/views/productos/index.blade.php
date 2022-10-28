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

                                {!! Form::open([
                                    'route' => 'productos.index',
                                    'method' => 'get',
                                    'class' => 'col-lg-12',
                                ]) !!}

                                <div class="input-group ">

                                    <div class="input-group ">
                                        <div class="col-lg-7">
                                            {!! Form::text('buscar', old('', Request::input('buscar')), [
                                                'class' => 'form-control ',
                                                'placeholder' => 'Buscar por Descripción, Código...',
                                                'autocomplete'=>'off'
                                                ]) !!}
                                        </div>

                                        <div class="col-lg-5">

                                            <button style="margin-left: -15px" type="submit"
                                                    class="btn btn-lg btn-success" title="Buscar">
                                                <b class="fa fa-search"></b>
                                            </button>
                                            <a href="{{ route('productos.create') }}" style="margin-left: 15px"
                                               class="btn btn-primary active">
                                                <b class="fa fa-plus"></b> Registrar Producto
                                            </a>
                                            <button type="button" class="btn btn-success"
                                                    onclick="exportarAExcel()"><i
                                                    class="fa fa-file-excel-o"></i>
                                                Exportar
                                            </button>
                                        </div>
                                    </div>


                                    {!! Form::close() !!}
                                </div>
                                <div class="table-responsive">
                                    <table style=" border: 1px solid black; width: 95%;  margin: 0 auto" class="table table-striped table-bordered"
                                           id="productos-table">
                                        <thead>
                                        <tr style="background: #CFD8DC">
                                            <th style=" border: 1px solid black;">N°</th>
                                            <th style=" border: 1px solid black;">Fecha</th>
                                            <th style=" border: 1px solid black;">Código</th>
                                            <th style=" border: 1px solid black;">Descripción</th>
                                            <th style=" border: 1px solid black;">Stock</th>
                                            <th style=" border: 1px solid black;">Precio Unit.</th>
                                            <th style=" border: 1px solid black;">Origen</th>
                                            <th style=" border: 1px solid black;">Fábrica</th>
                                            <th style=" border: 1px solid black;"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($productos as $producto)
                                            <tr>
                                                <td style=" border: 1px solid black;">{{$loop->iteration}}</td>
                                                <td style=" border: 1px solid black;">{{ $producto->fecha_primera }}</td>
                                                <td style=" border: 1px solid black;">{{ $producto->codigo }}</td>
                                                <td style=" border: 1px solid black;">{{ $producto->descripcion }}</td>
                                                <td style=" border: 1px solid black;">{{ $producto->stock }}</td>
                                                <td style=" border: 1px solid black;">{{ number_format($producto->precio_unitario) }}</td>
                                                <td style=" border: 1px solid black;">{{ $producto->origen }}</td>
                                                <td style=" border: 1px solid black;">{{ $producto->fabrica }}</td>

                                                <td style=" border: 1px solid black;">
                                                    <a href="{{ route('productos.edit', ['producto' => $producto->id]) }}"
                                                       class="btn btn-sm btn-warning " title="Editar">
                                                        <b class="fa fa-pencil"></b>
                                                    </a>
                                                    <a data-toggle="modal" data-target="#modal"
                                                       data-txtdescripcion="{{$producto->descripcion}}"
                                                       data-txtid="{{$producto->id}}"
                                                       data-txtcodigo="{{$producto->codigo}}"
                                                       data-txtprecio="{{$producto->precio_unitario}}"
                                                       class="btn btn-sm btn-secondary text-white"
                                                       title="Agregar compra">
                                                        <b class="fa fa-plus"> Agregar compra</b>
                                                    </a>

                                                    <a
                                                        href="{{ route('compras.lista', [$producto->id]) }}"
                                                        class="btn btn-sm btn-secondary text-white"
                                                        title="Compras">
                                                        <b class="fa fa-list"> Compras</b>
                                                    </a>

                                                    @if($producto->stock>0)
                                                        <a data-toggle="modal" data-target="#modalVenta"
                                                           data-txtdescripcion="{{$producto->descripcion}}"
                                                           data-txtid="{{$producto->id}}"
                                                           data-txtcodigo="{{$producto->codigo}}"
                                                           data-txtprecio="{{$producto->precio_unitario}}"
                                                           class="btn btn-sm btn-secondary text-white"
                                                           title="Vender">
                                                            <b class="fa fa-minus"> Vender</b>
                                                        </a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="8" class="text-center">No Existen Productos</td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <div class="text-center">
                                    {{ $productos->appends($_GET)->links()  }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="appCompra">
            @include("compras.modal")
        </div>
        <div id="appVenta">
            @include("ventas.modal")
        </div>
        <script>
            function exportarAExcel() {
                var nombreArchivo = 'reporteProductos.xls';
                var htmlExport = jQuery('#productos-table').prop('outerHTML')
                var ua = window.navigator.userAgent;
                var msie = ua.indexOf("MSIE ");

                //other browser not tested on IE 11
                // If Internet Explorer
                if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) {
                    jQuery('body').append(" <iframe id=\"iframeExport\" style=\"display:none\"></iframe>");
                    iframeExport.document.open("txt/html", "replace");
                    iframeExport.document.write(htmlExport);
                    iframeExport.document.close();
                    iframeExport.focus();
                    sa = iframeExport.document.execCommand("SaveAs", true, nombreArchivo);
                } else {
                    var link = document.createElement('a');

                    document.body.appendChild(link); // Firefox requires the link to be in the body
                    link.download = nombreArchivo;
                    link.href = 'data:application/vnd.ms-excel,' + escape(htmlExport);
                    link.click();
                    document.body.removeChild(link);
                }
            }

            $('#modal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget)
                var id = button.data('txtid')
                var descripcion = button.data('txtdescripcion')
                var codigo = button.data('txtcodigo')
                var precio = button.data('txtprecio')

                var modal = $(this)
                modal.find('.modal-body #producto_id').val(id);
                modal.find('.modal-body #descripcion').val(descripcion);
                modal.find('.modal-body #codigo').val(codigo);
                modal.find('.modal-body #precio').val(precio);
            })

            $('#modalVenta').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget)
                var id = button.data('txtid')
                var descripcion = button.data('txtdescripcion')
                var codigo = button.data('txtcodigo')
                var precio = button.data('txtprecio')

                var modal = $(this)
                modal.find('.modal-body #idproducto').val(id);
                modal.find('.modal-body #descripcion').val(descripcion);
                modal.find('.modal-body #codigo').val(codigo);
                modal.find('.modal-body #precio').val(precio);
            })
        </script>
@endsection
