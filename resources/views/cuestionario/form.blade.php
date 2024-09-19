<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        body {
            font-size: 16px; /* Define el tamaño de fuente para el cuerpo del documento */
        }
        .form-group label {
            font-size: 16px; /* Tamaño de fuente para las etiquetas dentro del formulario */
        }
        .form-control, 
        .select2-container--default .select2-selection--multiple {
            font-size: 16px; /* Tamaño de fuente para los campos de entrada y el select2 */
        }
        .invalid-feedback {
            font-size: 16px; /* Tamaño de fuente para los mensajes de error */
        }
        .btn {
            font-size: 16px; /* Tamaño de fuente para los botones */
        }
        .btn-custom {
            background-color: #fbcd77;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="box box-info padding-1">
            <div class="box-body">
                
                <div class="form-group">
                    {{ Form::label('Pregunta') }}
                    {{ Form::select('pregunta_id', $pregunta, $cuestionario->pregunta_id, [
                        'class' => 'form-control' . ($errors->has('pregunta_id') ? ' is-invalid' : ''),
                        'placeholder' => 'Pregunta....'
                    ]) }}
                    {!! $errors->first('pregunta_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <div class="form-group">
                    {{ Form::label('repuesta_id', 'Respuestas') }}
                    {{ Form::select('repuesta_id[]', $res->pluck('Respuestas', 'id')->map(function($item, $key) use ($res) {
                        $Valor = $res->firstWhere('id', $key)->Valor;
                        return "$item - $Valor";
                    })->toArray(), $cuestionario->repuesta_id, [
                        'class' => 'select2-multiple form-control' . ($errors->has('repuesta_id') ? ' is-invalid' : ''),
                        'multiple' => 'multiple',
                        'placeholder' => 'Seleccionar respuestas'
                    ]) }}
                    {!! $errors->first('repuesta_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>

            </div>
            <div class="box-footer mt-2 d-md-flex justify-content-md-end">
                <button type="submit" class="btn btn-primary btn-custom">
                    <i class="fa fa-solid fa-check"></i> {{ __('Guardar') }}
                </button>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            // Inicializa Select2 con la opción para seleccionar múltiples
            $('.select2-multiple').select2({
                placeholder: "Seleccionar respuestas",
                allowClear: true
            });
        });
    </script>
</body>
</html>
