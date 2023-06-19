@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>Descripción</title>
</head>
<body>
    <h1>Descripción</h1>

    <h2>{{ $dato->Nombre}}</h2>
    <p>{{ $dato->Descripcion }}</p>
    <p>{{ $dato->Fecha }}</p>

</body>
</html>
@endsection