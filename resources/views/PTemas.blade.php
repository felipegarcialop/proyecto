@extends('layouts.app')
  
@section('content')
<style>
    /* Estilos para el contenedor de la vista */
    .view-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background-color: #f1f1f1;
    }

    /* Estilos para los botones */
    .view-btn {
      display: inline-block;
      padding: 20px 40px;
      margin: 10px;
      color: white;
      text-decoration: none;
      border-radius: 4px;
      transition: background-color 0.3s ease;
    }

    .btn-color-1 {background-color: #d44b4d;}

    .btn-color-2 {background-color: #d8c97f;}

    .btn-color-3 {background-color: #af726e;}

    .btn-color-4 {background-color: #ed9152;}

    .btn-color-5 {background-color: #598a52;}

    .btn-color-6 {background-color: #c18a90;}

    .view-btn:hover {
      opacity: 0.8;
    }
  </style>

<div class="container text-center">
    <div class="row">
        <div class="col">
            @foreach ($datos as $index => $dato)
            @php
            $colorClass = 'btn-color-' . (($index % 6) + 1);
            @endphp
            <button  style="border:none; background-color: #f8fafc; width: 200px; height: 100px; ">
            <a href="{{ route('Itemas',$dato->id) }}" style="color: black" 
            class="btn btn-lg {{ $colorClass }} me-md-4  rounded-pill">{{ $dato->Nombre }}</a>
            </button>
        @endforeach
        @role("Administradores")
        <button class="btn">
            <a href="{{ route('temas.create') }}" class="btn btn-secondary btn-sm float-right"  data-placement="left">
                <i class="fa fa-regular fa-plus"></i>
            </a>
        </button>
        @endrole
        </div>
    </div>
</div>

@endsection