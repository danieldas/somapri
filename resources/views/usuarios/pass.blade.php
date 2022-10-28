<div id="modal" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    {!! Form::open(['route' => 'usuarios.cambiarPass']) !!}
    <div class="modal-dialog" role="document">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="background-color: #1565C0">
                <h4 class="modal-title text-white"><span>Cambiar</span> password </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">
                <table class="table table-bordered">

                    <tr>
                        <td><strong>Cuenta</strong></td>
                        <td><input style="border: 0; background-color:white" readonly class="form-control" name="cuenta" id="cuenta"></td>
                    </tr>

                    <tr>
                        <td><strong>Nombre</strong></td>
                        <td><input style="border: 0; background-color:white" readonly class="form-control" name="nombre" id="nombre"></td>
                    </tr>

                </table>

                {!! Form::hidden('id', null, ['class' => 'form-control', 'name'=>'id', 'id'=>'id']) !!}

                <div>
                    @if($errors->has('password'))
                        <div class="form-group has-error">
                            <div class="help-block">
                                <label class="alert-danger">{{ $errors->first('password') }}</label>
                            </div>
                        </div>
                    @endif
                    <div class="form-group col-sm-12">
                        {!! Form::label('Password', 'Password:', ['class' => 'control-label']) !!}

                        {!! Form::text('password', null, ['class' => 'form-control', 'maxlength' => '70', 'id' => 'password' , 'required']) !!}
                    </div>
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
