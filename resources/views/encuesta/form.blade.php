<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Titulo') }}
            {{ Form::text('Titulo', $encuesta->Titulo, ['class' => 'form-control' . ($errors->has('Titulo') ? ' is-invalid' : ''), 'placeholder' => 'Titulo de la encuesta']) }}
            {!! $errors->first('Titulo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Tema') }}
            {{ Form::select('tema_id',$tema ,$encuesta->tema_id, ['class' => 'form-control' . ($errors->has('tema_id') ? ' is-invalid' : ''), 'placeholder' => 'Tema de la encuesta']) }}
            {!! $errors->first('tema_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt-2 d-md-flex justify-content-md-end">
        <button type="submit" class="btn btn-primary"><i class="fa fa-solid fa-check"></i>{{ __('') }}</button>
    </div>
</div>