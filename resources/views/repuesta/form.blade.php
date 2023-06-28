<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Respuestas') }}
            {{ Form::text('Respuestas', $repuesta->Respuestas, ['class' => 'form-control' . ($errors->has('Respuestas') ? ' is-invalid' : ''), 'placeholder' => 'Respuestas']) }}
            {!! $errors->first('Respuestas', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary"><i class="fa fa-solid fa-check"></i>{{ __('') }}</button>
    </div>
</div>