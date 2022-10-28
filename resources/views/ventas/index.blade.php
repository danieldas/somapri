@extends('plantillas.principal')
@section('contenido')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Ventas</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li>Ventas</li>
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
                                    'route' => 'ventas.index',
                                    'method' => 'get',
                                    'class' => 'col-lg-12',
                                ]) !!}

                                <div class="input-group ">

                                    <div class="input-group ">
                                        <div class="col-lg-4">
                                            {!! Form::label('Fecha', 'Buscar:') !!}
                                            {!! Form::text('buscar', old('', Request::input('buscar')), [
                                                'class' => 'form-control ',
                                                'placeholder' => 'Buscar por Descripción, Código...',
                                                'autocomplete'=>'off'
                                                ]) !!}
                                        </div>

                                        <div class="form-group col-sm-2">
                                            {!! Form::label('Fecha', 'Fecha Ini.:') !!}
                                            {!! Form::date('fecha_inicial', isset($_GET['fecha_inicial']) ? $_GET['fecha_inicial'] : date('Y-m-d', strtotime(date('Y-m-d'). ' - 1 weeks')), ['class' => 'form-control', 'id' => 'fecha_inicial']) !!}
                                        </div>
                                        <div class="form-group col-sm-2">
                                            {!! Form::label('Fecha', 'Fecha Fin.:') !!}
                                            {!! Form::date('fecha_final', isset($_GET['fecha_final']) ? $_GET['fecha_final'] : date('Y-m-d'), ['class' => 'form-control','id' => 'fecha_final']) !!}
                                        </div>

                                        <div class="col-lg-4">
                                            <br>
                                            <button style="margin-left: -15px; margin-top: 7px" type="submit"
                                                    class="btn btn-lg btn-success" title="Buscar">
                                                <b class="fa fa-search"></b>
                                            </button>
                                            <button style="margin-top: 7px" type="button" class="btn btn-success"
                                                    onclick="exportarAExcel()"><i
                                                    class="fa fa-file-excel-o"></i>
                                                Exportar
                                            </button>
                                        </div>
                                    </div>


                                    {!! Form::close() !!}
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered"
                                           style="border: 1px solid black; width: 95%;  margin: 0 auto" id="ventas-table">
                                        <thead>
                                        <tr style="background: #CFD8DC">
                                            <th style=" border: 1px solid black;">N°</th>
                                            <th style=" border: 1px solid black;">Fecha</th>
                                            <th style=" border: 1px solid black;">Código</th>
                                            <th style=" border: 1px solid black;">Descripción</th>
                                            <th style=" border: 1px solid black;">Precio Total BOB</th>
                                            <th style=" border: 1px solid black;">Cliente</th>
                                            <th style=" border: 1px solid black;">Cantidad</th>
                                            <th style=" border: 1px solid black;"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($ventas as $venta)
                                            <tr>
                                                <td style=" border: 1px solid black;">{{$loop->iteration}}</td>
                                                <td style=" border: 1px solid black;">{{ date( 'd/m/Y', strtotime($venta->fecha)) }}</td>
                                                <td style=" border: 1px solid black;">{{ $venta->producto->codigo }}</td>
                                                <td style=" border: 1px solid black;">{{ $venta->producto->descripcion }}</td>
                                                <td style=" border: 1px solid black;">{{ number_format($venta->precio, 2) }}</td>
                                                <td style=" border: 1px solid black;">{{ $venta->cliente->nombre_completo }}</td>
                                                <td style=" border: 1px solid black;">{{ $venta->cantidad }}</td>

                                                <td style=" border: 1px solid black;">

                                                    {!! Form::open(['route' => ['ventas.destroy', $venta->id], 'method' => 'delete']) !!}

                                                    <button type="submit" class="btn btn-sm btn-danger" title="Eliminar" onclick="return confirm('¿Estás seguro de eliminar la venta?')">
                                                        <b class="fa fa-trash-o"></b>
                                                    </button>
                                                    {!! Form::close() !!}
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="8" class="text-center">No Existen Ventas</td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <div class="text-center">
                                    {{ $ventas->appends($_GET)->links()  }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function exportarAExcel() {
                var nombreArchivo = 'reporteVentas.xls';
                var htmlExport = jQuery('#ventas-table').prop('outerHTML')
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

        </script>
@endsection
