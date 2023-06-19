<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('pregunta_id') }}
            {{ Form::select('pregunta_id',$pregunta ,$cuestionario->pregunta_id, ['class' => 'form-control' . ($errors->has('pregunta_id') ? ' is-invalid' : ''), 'placeholder' => 'Pregunta Id']) }}
            {!! $errors->first('pregunta_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('repuesta_id') }}
            {{ Form::select('repuesta_id', $respuestas,$cuestionario->repuesta_id, ['class' => 'form-control' . ($errors->has('repuesta_id') ? ' is-invalid' : ''), 'placeholder' => 'Repuesta Id']) }}
            {!! $errors->first('repuesta_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('ponderaciones_id') }}
            {{ Form::select('ponderaciones_id',$ponderaciones,$cuestionario->ponderaciones_id, ['class' => 'form-control' . ($errors->has('ponderaciones_id') ? ' is-invalid' : ''), 'placeholder' => 'Ponderaciones Id']) }}
            {!! $errors->first('ponderaciones_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>