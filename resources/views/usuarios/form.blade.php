@if($errors->has('nombre'))
    <div class="form-group has-error">
        <div class="help-block">
            <label class="alert-danger">{{ $errors->first('nombre') }}</label>
        </div>
    </div>
@endif
<div class="form-group">
    <div class="col-lg-2">
        {!! Form::label('Nombre', 'Nombre *:', ['class' => 'control-label']) !!}
    </div>
    <div class="col-lg-8">

        {!! Form::text('nombre', null, ['class' => 'form-control', 'maxlength' => '70', 'required', 'autocomplete'=>'off']) !!}
    </div>
    <br><br>
</div>

@if($errors->has('apellido_paterno'))
    <div class="form-group has-error">
        <div class="help-block">
            <label class="alert-danger">{{ $errors->first('apellido_paterno') }}</label>
        </div>
    </div>
@endif
<div class="form-group">
    <div class="col-lg-2">
        {!! Form::label('Apellido_Paterno', 'Apellido Paterno *:', ['class' => 'control-label']) !!}
    </div>
    <div class="col-lg-8">
        {!! Form::text('apellido_paterno', null, ['class' => 'form-control', 'maxlength' => '70', 'required', 'autocomplete'=>'off']) !!}
    </div>
    <br><br>
</div>

@if($errors->has('apellido_materno'))
    <div class="form-group has-error">
        <div class="help-block">
            <label class="alert-danger">{{ $errors->first('apellido_materno') }}</label>
        </div>
    </div>
@endif
<div class="form-group">
    <div class="col-lg-2">
        {!! Form::label('Apellido_Materno', 'Apellido Materno *:', ['class' => 'control-label']) !!}
    </div>
    <div class="col-lg-8">
        {!! Form::text('apellido_materno', null, ['class' => 'form-control', 'maxlength' => '70', 'required', 'autocomplete'=>'off']) !!}
    </div>
    <br><br>
</div>

@if($errors->has('ci'))
    <div class="form-group has-error">
        <div class="help-block">
            <label class="alert-danger">{{ $errors->first('ci') }}</label>
        </div>
    </div>
@endif
<div class="form-group">
    <div class="col-lg-2">
        {!! Form::label('Carnet', 'Carnet *:', ['class' => 'control-label']) !!}
    </div>
    <div class="col-lg-8">

        {!! Form::text('ci', null, ['class' => 'form-control', 'maxlength' => '20', 'required', 'autocomplete'=>'off']) !!}
    </div>
    <br><br>
</div>


@if($errors->has('rol'))
    <div class="form-group has-error">
        <div class="help-block">
            <label class="alert-danger">{{ $errors->first('rol') }}</label>
        </div>
    </div>
@endif
<div class="form-group">
    <div class="col-lg-2">
        {!! Form::label('Rol', 'Rol *:', ['class' => 'control-label']) !!}
    </div>
    <div class="col-lg-8">

        {!! Form::select('rol',
                     config('cmb.roles'),  old('', Request::input('rol')),
                        [     'class' => 'form-control ', ]) !!}
    </div>
    <br><br>
</div>
