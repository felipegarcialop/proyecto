<div class="box box-info padding-1">
    <style>
        .box-body {
            font-size: 16px;
        }
        .form-group label {
            font-size: 16px;
        }
        .form-control {
            font-size: 16px;
        }
        .invalid-feedback {
            font-size: 16px;
        }
        .btn {
            font-size: 16px;
        }
    </style>

    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Titulo', null, ['style' => 'font-size: 16px;']) }}
            {{ Form::text('Titulo', $encuesta->Titulo, [
                'class' => 'form-control' . ($errors->has('Titulo') ? ' is-invalid' : ''), 
                'placeholder' => 'Titulo de la encuesta',
                'style' => 'font-size: 16px;'
            ]) }}
            {!! $errors->first('Titulo', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('Tema', null, ['style' => 'font-size: 16px;']) }}
            {{ Form::select('tema_id', $tema, $encuesta->tema_id, [
                'class' => 'form-control' . ($errors->has('tema_id') ? ' is-invalid' : ''), 
                'placeholder' => 'Tema de la encuesta',
                'style' => 'font-size: 16px;'
            ]) }}
            {!! $errors->first('tema_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt-2 d-md-flex justify-content-md-end">
        <button type="submit" class="btn btn-primary">
            <i class="fa fa-solid fa-check"></i> {{ __('') }}
        </button>
    </div>
</div>
