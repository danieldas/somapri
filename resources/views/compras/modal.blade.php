<div id="modal" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    {!! Form::open(['route' => 'compras.store']) !!}
    <div class="modal-dialog" role="document">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="background-color: #1565C0">
                <h4 class="modal-title text-white"><span>Agregar compra</span></h4>
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

                {!! Form::hidden('producto_id', null, ['class' => 'form-control', 'name'=>'producto_id', 'id'=>'producto_id']) !!}

                @if($errors->has('cantidad'))
                    <div class="form-group has-error">
                        <div class="help-block">
                            <label class="alert-danger">{{ $errors->first('cantidad') }}</label>
                        </div>
                    </div>
                @endif
                <div class="form-group">
                    <div class="col-lg-3">
                        {!! Form::label('Cantidad', 'Cantidad *:', ['class' => 'control-label']) !!}
                    </div>
                    <div class="col-lg-9">

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
                    <div class="col-lg-3">
                        {!! Form::label('Fecha', 'Fecha *:', ['class' => 'control-label']) !!}
                    </div>
                    <div class="col-lg-9">
                        {!! Form::date('fecha', null, ['class' => 'form-control', 'maxlength' => '70', 'required', 'autocomplete'=>'off']) !!}
                    </div>
                    <br><br>
                </div>


                <br>


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
