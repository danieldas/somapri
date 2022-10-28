@if($errors->has('codigo'))
    <div class="form-group has-error">
        <div class="help-block">
            <label class="alert-danger">{{ $errors->first('codigo') }}</label>
        </div>
    </div>
@endif
<div class="form-group">
    <div class="col-lg-2">
        {!! Form::label('Codigo', 'Código *:', ['class' => 'control-label']) !!}
    </div>
    <div class="col-lg-8">

        {!! Form::text('codigo', null, ['class' => 'form-control', 'maxlength' => '20', 'required', 'autocomplete'=>'off']) !!}
    </div>
    <br><br>
</div>

@if($errors->has('descripcion'))
    <div class="form-group has-error">
        <div class="help-block">
            <label class="alert-danger">{{ $errors->first('descripcion') }}</label>
        </div>
    </div>
@endif
<div class="form-group">
    <div class="col-lg-2">
        {!! Form::label('descripcion', 'Descripción *:', ['class' => 'control-label']) !!}
    </div>
    <div class="col-lg-8">
        {!! Form::text('descripcion', null, ['class' => 'form-control', 'maxlength' => '100', 'required', 'autocomplete'=>'off']) !!}
    </div>
    <br><br>
</div>

@if($errors->has('origen'))
    <div class="form-group has-error">
        <div class="help-block">
            <label class="alert-danger">{{ $errors->first('origen') }}</label>
        </div>
    </div>
@endif
<div class="form-group">
    <div class="col-lg-2">
        {!! Form::label('origen', 'Origen *:', ['class' => 'control-label']) !!}
    </div>
    <div class="col-lg-8">

        {!! Form::select('origen', config('cmb.origenes'),  null, ['class' => 'form-control ',  'name' => 'origen' ,  'id' => 'origen', 'required' ]) !!}
    </div>
    <br><br>
</div>

@if($errors->has('fabrica'))
    <div class="form-group has-error">
        <div class="help-block">
            <label class="alert-danger">{{ $errors->first('fabrica') }}</label>
        </div>
    </div>
@endif
<div class="form-group">
    <div class="col-lg-2">
        {!! Form::label('fabrica', 'Fábrica *:', ['class' => 'control-label']) !!}
    </div>
    <div class="col-lg-8">
        {!! Form::text('fabrica', null, ['class' => 'form-control', 'maxlength' => '70', 'required', 'autocomplete'=>'off']) !!}
    </div>
    <br><br>
</div>

@if($errors->has('precio_unitario'))
    <div class="form-group has-error">
        <div class="help-block">
            <label class="alert-danger">{{ $errors->first('precio_unitario') }}</label>
        </div>
    </div>
@endif
<div class="form-group">
    <div class="col-lg-2">
        {!! Form::label('precio_unitario', 'Precio Unitario BOB *:', ['class' => 'control-label']) !!}
    </div>
    <div class="col-lg-8">
        {!! Form::number('precio_unitario', null, ['class' => 'form-control', 'maxlength' => '15', 'required', 'autocomplete'=>'off', 'min'=>0, 'step'=>"any"]) !!}
    </div>
    <br><br>
</div>

@if($errors->has('utilidad'))
    <div class="form-group has-error">
        <div class="help-block">
            <label class="alert-danger">{{ $errors->first('utilidad') }}</label>
        </div>
    </div>
@endif
<div class="form-group">
    <div class="col-lg-2">
        {!! Form::label('utilidad', 'Utilidad (%) *:', ['class' => 'control-label']) !!}
    </div>
    <div class="col-lg-8">
        {!! Form::number('utilidad', null, ['class' => 'form-control', 'maxlength' => '15', 'required', 'autocomplete'=>'off', 'min'=>0, 'step'=>"any"]) !!}
    </div>
    <br><br>
</div>


