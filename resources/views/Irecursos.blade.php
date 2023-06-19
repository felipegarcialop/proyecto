@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>Descripción</title>
</head>
<body>
    <h1>Descripción</h1>

    <h2>{{ $dato->nombre}}</h2>
    <p>{{ $dato->objetivo}}</p>
    <p>{{ $dato->descipcion }}</p>

</body>
</html>
@endsection