<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('ponderacion') }}
            {{ Form::text('ponderacion', $ponderacione->ponderacion, ['class' => 'form-control' . ($errors->has('ponderacion') ? ' is-invalid' : ''), 'placeholder' => 'Ponderacion']) }}
            {!! $errors->first('ponderacion', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt-2 d-md-flex justify-content-md-end">
        <button type="submit" class="btn btn-primary"><i class="fa fa-solid fa-check"></i>{{ __('') }}</button>
    </div>
</div>