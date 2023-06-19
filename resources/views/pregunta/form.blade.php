<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('pregunta') }}
            {{ Form::text('pregunta', $pregunta->pregunta, ['class' => 'form-control' . ($errors->has('pregunta') ? ' is-invalid' : ''), 'placeholder' => 'Pregunta']) }}
            {!! $errors->first('pregunta', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('encuesta_id') }}
            {{ Form::select('encuesta_id', $encuesta,$pregunta->encuesta_id, ['class' => 'form-control' . ($errors->has('encuesta_id') ? ' is-invalid' : ''), 'placeholder' => 'Encuesta Id']) }}
            {!! $errors->first('encuesta_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>