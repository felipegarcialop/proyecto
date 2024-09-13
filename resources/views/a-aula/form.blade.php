<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
{{-- Select2 CDN --}}
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        // Initialize Select2 for multiple select
        $('.select2-multiple').select2({
            placeholder: "Seleccionar alumnos",
            allowClear: true
        });
    });
</script>

<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('docente_id') }}
            {{ Form::select('docente_id', $docentes, $aAula->docente_id, ['class' => 'form-control' . ($errors->has('docente_id') ? ' is-invalid' : ''), 'placeholder' => 'Docente Id']) }}
            {!! $errors->first('docente_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('alumno_id', 'Alumnos') }}
            {{ Form::select('alumno_id[]', $alumnos, $aAula->alumno_ids, [ // Usa $aAula->alumno_ids
                'class' => 'select2-multiple form-control' . ($errors->has('alumno_id') ? ' is-invalid' : ''),
                'multiple' => 'multiple',
                'placeholder' => 'Seleccionar alumnos'
            ]) }}
            {!! $errors->first('alumno_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>