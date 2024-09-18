<style>
    .font-size-16 {
        font-size: 16px;
    }
</style>

<div class="box box-info padding-1 font-size-16">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('pregunta') }}
            {{ Form::text('pregunta', $pregunta->pregunta, ['class' => 'form-control' . ($errors->has('pregunta') ? ' is-invalid' : ''), 'placeholder' => 'Pregunta']) }}
            {!! $errors->first('pregunta', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('encuesta') }}
            {{ Form::select('encuesta_id', $encuesta, $pregunta->encuesta_id, ['class' => 'form-control' . ($errors->has('encuesta_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecione']) }}
            {!! $errors->first('encuesta_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt-2 d-md-flex justify-content-md-end">
        <button type="submit" class="btn btn-primary">
            <i class="fa fa-solid fa-check"></i>{{ __('') }}
        </button>
    </div>
</div>
