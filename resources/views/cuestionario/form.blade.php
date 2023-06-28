<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Pregunta') }}
            {{ Form::select('pregunta_id',$pregunta ,$cuestionario->pregunta_id, ['class' => 'form-control' . ($errors->has('pregunta_id') ? ' is-invalid' : ''), 'placeholder' => 'Pregunta....']) }}
            {!! $errors->first('pregunta_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Respuesta') }}
            {{ Form::select('repuesta_id', $respuestas,$cuestionario->repuesta_id, ['class' => 'form-control' . ($errors->has('repuesta_id') ? ' is-invalid' : ''), 'placeholder' => 'Repuesta...']) }}
            {!! $errors->first('repuesta_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Ponderacion') }}
            {{ Form::select('ponderaciones_id',$ponderaciones,$cuestionario->ponderaciones_id, ['class' => 'form-control' . ($errors->has('ponderaciones_id') ? ' is-invalid' : ''), 'placeholder' => 'Ponderaciones...']) }}
            {!! $errors->first('ponderaciones_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt-2 d-md-flex justify-content-md-end">
        <button type="submit" class="btn btn-primary" style="background-color: #fbcd77;"><i class="fa fa-solid fa-check"></i>{{ __('') }}</button>
    </div>
</div>