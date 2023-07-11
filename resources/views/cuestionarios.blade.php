@extends('layouts.app')
  
@section('content')
<!DOCTYPE html>
<html>
<head>

    <title>Cuestionarios</title>
</head>
<body>
    
    <h1>Cuestionarios</h1>
    <form action="/cuestionario/guardar" class="form" role="form" method="POST">
    @csrf 
    <table>
        <thead>
            <tr>
                <th>Pregunta</th>
                <th>Respuesta</th>
                
            </tr>
        </thead>
        <tbody>
        <input class="form-control" type="hidden" id="id" name="id" value="{{ $id }}">
        <input class="form-control" type="hidden" id="con" name="con" value="{{ $con->con }}">

            @foreach ($cuestionarios as $cuestionario)
                <tr>
                    <td>{{ $cuestionario->pregunta->pregunta }}</td>
                    <td>
                    <input class="form-control" type="hidden" id="idP" name="idPregunta[]" value="{{ $cuestionario->id }}">

                        @foreach ($respuestas as $respuesta)
                            <label>
                                <input type="radio" name="respuesta_{{ $cuestionario->id }}" value="{{ $respuesta->id }}" {{ $cuestionario->respuesta_id == $respuesta->id ? 'checked' : '' }} required>
                                {{ $respuesta->Respuestas }}
                            </label>
                        @endforeach
                    </td>
                   
                </tr>
            @endforeach
        </tbody>
         
    </table>
    <button class="primary" type="submit">
guardar 
    </button>  
    </form>

</body>
</html>

@endsection