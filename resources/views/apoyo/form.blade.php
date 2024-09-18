<div class="box box-info padding-1">
    
    <div class="box-body" style="font-size: 16px;">
        
        <div class="form-group">
            {{ Form::label('Nombre', null, ['style' => 'font-size: 16px;']) }}
            {{ Form::text('nombre', $apoyo->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese el nombre de la institucion de apoyo', 'style' => 'font-size: 16px;']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback" style="font-size: 16px;">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('descripcion', null, ['style' => 'font-size: 16px;']) }}
            {{ Form::textarea('descripcion', $apoyo->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion de la institucion de apoyo', 'style' => 'font-size: 16px;']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback" style="font-size: 16px;">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('direccion', null, ['style' => 'font-size: 16px;']) }}
            {{ Form::text('direccion', $apoyo->direccion, ['class' => 'form-control' . ($errors->has('direccion') ? ' is-invalid' : ''), 'placeholder' => 'Direccion de la institucion de apoyo', 'style' => 'font-size: 16px;']) }}
            {!! $errors->first('direccion', '<div class="invalid-feedback" style="font-size: 16px;">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('telefono', null, ['style' => 'font-size: 16px;']) }}
            {{ Form::text('telefono', $apoyo->telefono, ['class' => 'form-control' . ($errors->has('telefono') ? ' is-invalid' : ''), 'placeholder' => 'Telefono de contacto de la institucion de apoyo', 'style' => 'font-size: 16px;']) }}
            {!! $errors->first('telefono', '<div class="invalid-feedback" style="font-size: 16px;">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('correo', null, ['style' => 'font-size: 16px;']) }}
            {{ Form::text('correo', $apoyo->correo, ['class' => 'form-control' . ($errors->has('correo') ? ' is-invalid' : ''), 'placeholder' => 'Correo de contacto de la institucion de apoyo', 'style' => 'font-size: 16px;']) }}
            {!! $errors->first('correo', '<div class="invalid-feedback" style="font-size: 16px;">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt-2 d-md-flex justify-content-md-end">
        <button type="submit" class="btn" style="background-color: #fbcd77; font-size: 16px;"><i class="fa fa-solid fa-check"></i>{{ __('') }}</button>
    </div>
</div>
