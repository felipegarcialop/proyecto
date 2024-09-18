<div class="box box-info padding-1">
    <div class="box-body" style="font-size: 16px;">
        
        <div class="form-group">
            {{ Form::label('Titulo', null, ['style' => 'font-size: 16px;']) }}
            {{ Form::text('Titulo', $encuesta->Titulo, [
                'class' => 'form-control' . ($errors->has('Titulo') ? ' is-invalid' : ''), 
                'placeholder' => 'Titulo de la encuesta',
                'style' => 'font-size: 16px;'
            ]) }}
            {!! $errors->first('Titulo', '<div class="invalid-feedback" style="font-size: 16px;">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('Tema', null, ['style' => 'font-size: 16px;']) }}
            {{ Form::select('tema_id', $tema, $encuesta->tema_id, [
                'class' => 'form-control' . ($errors->has('tema_id') ? ' is-invalid' : ''), 
                'placeholder' => 'Tema de la encuesta',
                'style' => 'font-size: 16px;'
            ]) }}
            {!! $errors->first('tema_id', '<div class="invalid-feedback" style="font-size: 16px;">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt-2 d-md-flex justify-content-md-end">
        <button type="submit" class="btn btn-primary" style="font-size: 16px;"><i class="fa fa-solid fa-check"></i>{{ __('') }}</button>
    </div>
</div>
