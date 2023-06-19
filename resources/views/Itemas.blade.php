@extends('layouts.app')
<!DOCTYPE html>
<html>
<head>
    <title>Descripción</title>
</head>
<body>
    <h1>Descripción</h1>

    <h2>{{ $dato->Nombre}}</h2>
    <p>{{ $dato->descripcion }}</p>
    <p>{{ $dato->fecha }}</p>

</body>
</html>
