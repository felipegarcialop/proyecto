@extends('layouts.app')
  
@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>Cuestionarios</title>
</head>
<body>
    <h1>Cuestionarios</h1>

    <table>
        <thead>
            <tr>
                <th>Pregunta</th>
                <th>Respuesta</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach ($cuestionarios as $cuestionario)
                <tr>
                    <td>{{ $cuestionario->pregunta->pregunta }}</td>
                    <td>
                        @foreach ($respuestas as $respuesta)
                            <label>
                                <input type="radio" name="respuesta_{{ $cuestionario->id }}" value="{{ $respuesta->id }}" {{ $cuestionario->respuesta_id == $respuesta->id ? 'checked' : '' }}>
                                {{ $respuesta->Respuestas }}
                            </label>
                        @endforeach
                    </td>
                   
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

@endsection