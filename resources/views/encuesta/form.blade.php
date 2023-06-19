<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Titulo') }}
            {{ Form::text('Titulo', $encuesta->Titulo, ['class' => 'form-control' . ($errors->has('Titulo') ? ' is-invalid' : ''), 'placeholder' => 'Titulo']) }}
            {!! $errors->first('Titulo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tema_id') }}
            {{ Form::select('tema_id',$tema ,$encuesta->tema_id, ['class' => 'form-control' . ($errors->has('tema_id') ? ' is-invalid' : ''), 'placeholder' => 'Tema Id']) }}
            {!! $errors->first('tema_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>