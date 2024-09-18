<style>
    .font-size-16 {
        font-size: 16px;
    }
</style>

<div class="box box-info padding-1 font-size-16">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Respuestas') }}
            {{ Form::text('Respuestas', $repuesta->Respuestas, ['class' => 'form-control' . ($errors->has('Respuestas') ? ' is-invalid' : ''), 'placeholder' => 'Respuestas']) }}
            {!! $errors->first('Respuestas', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Respuestas') }}
            {{ Form::text('Valor', $repuesta->Valor, ['class' => 'form-control' . ($errors->has('Valor') ? ' is-invalid' : ''), 'placeholder' => 'Valor']) }}
            {!! $errors->first('Valor', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
    <div class="box-footer mt-2 d-md-flex justify-content-md-end">
        <button type="submit" class="btn btn-primary"><i class="fa fa-solid fa-check"></i>{{ __('') }}</button>
    </div>
</div>