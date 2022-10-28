<div id="modalVenta" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    {!! Form::open(['route' => 'ventas.store']) !!}
    <div class="modal-dialog" role="document">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="background-color: #1565C0">
                <h4 class="modal-title text-white"><span>Vender producto</span></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">
                <table class="table table-bordered">

                    <tr>
                        <td><strong>Descripción</strong></td>
                        <td><input style="border: 0; background-color:white" readonly class="form-control" name="descripcion" id="descripcion"></td>
                    </tr>

                    <tr>
                        <td><strong>Código</strong></td>
                        <td><input style="border: 0; background-color:white" readonly class="form-control" name="codigo" id="codigo"></td>
                    </tr>

                    <tr>
                        <td><strong>Precio unitario</strong></td>
                        <td><input style="border: 0; background-color:white" readonly class="form-control" name="precio" id="precio"></td>
                    </tr>



                </table>

                {!! Form::hidden('idproducto', null, ['class' => 'form-control', 'name'=>'idproducto', 'id'=>'idproducto']) !!}

                @if($errors->has('cantidad'))
                    <div class="form-group has-error">
                        <div class="help-block">
                            <label class="alert-danger">{{ $errors->first('cantidad') }}</label>
                        </div>
                    </div>
                @endif
                <div class="form-group">
                    <div class="col-lg-4">
                        {!! Form::label('Cantidad', 'Cantidad *:', ['class' => 'control-label']) !!}
                    </div>
                    <div class="col-lg-8">

                        {!! Form::number('cantidad', null, ['class' => 'form-control', 'maxlength' => '8', 'required', 'min'=>'0', 'name'=>'cantidad', 'id'=>'cantidad']) !!}
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
                    <div class="col-lg-4">
                        {!! Form::label('Fecha', 'Fecha *:', ['class' => 'control-label']) !!}
                    </div>
                    <div class="col-lg-8">
                        {!! Form::date('fecha', null, ['class' => 'form-control', 'maxlength' => '70', 'required', 'autocomplete'=>'off']) !!}
                    </div>
                    <br><br>
                </div>


                @if($errors->has('cliente_id'))
                    <div class="form-group has-error">
                        <div class="help-block">
                            <label class="alert-danger">{{ $errors->first('cliente_id') }}</label>
                        </div>
                    </div>
                @endif
                <div class="form-group">
                    <div class="col-lg-4">
                        {!! Form::label('cliente_id', 'Cliente *:', ['class' => 'control-label']) !!}
                    </div>
                    <div class="col-lg-8">

                        {!! Form::select('cliente_id', \App\Models\Cliente::get()->pluck('nombre_completo', 'id')->toArray(),  null, ['class' => 'form-control ', 'required' ]) !!}
                    </div>
                    <br><br>
                </div>

                <div class="form-group">
                    <div class="col-lg-4">
                {!! Form::label('factura', 'Tipo: *') !!}<br>
                    </div>
                    <div class="col-lg-8">
                        {!! Form::select('es_facturado', config('cmb.facturado'),  null, ['class' => 'form-control ', 'id' =>'es_facturado', 'name' =>'es_facturado' ]) !!}

                    </div>
                    <br><br>
                </div>

                <div class="form-group">
                    <div class="col-lg-4">
                        {!! Form::label('precio', 'Precio total BOB:', ['class' => 'control-label']) !!}
                    </div>
                    <div class="col-lg-8">

                        {!! Form::text('calculo', null, ['class' => 'form-control', 'maxlength' => '70', 'required', 'id' =>'calculo' , 'readonly' =>'readonly']) !!}
                    </div>
                    <br><br>
                </div>

            </div>
            <div class="modal-footer" style="border-top: none">

                <button type="submit" class="btn btn-primary">
                    <b class="fa fa-save"></b> Guardar
                </button>
                <button type="button" class="btn btn-default border border-secondary" data-dismiss="modal">
                    <b class="fa fa-close"></b> Cancelar
                </button>
            </div>
        </div>

    </div>
    {!! Form::close() !!}
</div>
<script src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript">

    $('input[name="cantidad"]').on('change', function()
    {
        calcular();
    });
    $('select[name="es_facturado"]').on('change', function()
    {
        calcular();
    });
    function calcular() {
        var cantidad=$('#cantidad').val();
        var idproducto=$('#idproducto').val();
        var es_facturado=$('#es_facturado').val();
        $('#calculo').val('');
        $.ajax({
            url: '/calcular-precio/'+idproducto+'/'+es_facturado+'/'+cantidad,
            type:"GET",
            dataType:"json",

            success:function(data) {
                $('#calculo').val(data);

            },

        });
    }
</script>
