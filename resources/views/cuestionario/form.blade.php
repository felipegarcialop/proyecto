<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
{{-- selec2 cdn --}}
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        // Select2 Multiple
        $('.select2-multiple').select2({
            placeholder: "Select",
            allowClear: true
        });
    });
</script>

<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Pregunta') }}
            {{ Form::select('pregunta_id',$pregunta ,$cuestionario->pregunta_id, ['class' => 'form-control' . ($errors->has('pregunta_id') ? ' is-invalid' : ''), 'placeholder' => 'Pregunta....']) }}
            {!! $errors->first('pregunta_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('Respuesta') }}
            {{ Form::select('repuesta_id[]', $respuestas,$cuestionario->repuesta_id, ['class' => 'select2-multiple form-control' . ($errors->has('repuesta_id') ? ' is-invalid' : ''),'multiple' => 'multiple','placeholder' => 'Repuesta...']) }}
            {!! $errors->first('repuesta_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt-2 d-md-flex justify-content-md-end">
        <button type="submit" class="btn btn-primary" style="background-color: #fbcd77;"><i class="fa fa-solid fa-check"></i>{{ __('') }}</button>
    </div>
</div>
