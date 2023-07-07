<!DOCTYPE html>
<html>
<head>
    <title>Encuestas</title>
</head>
<body>
    <h1>Encuestas</h1>

    @foreach ($encuestas as $encuesta)
        <div>
            <h2>{{ $encuesta->Titulo }}</h2>
            <a href="{{ route('cuestionario.index', $encuesta->id) }}">Realizar encuesta</a>
        </div>
    @endforeach
</body>
</html>
