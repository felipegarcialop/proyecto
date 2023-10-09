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

    .btn-color-1 {background-color: #a5e1e9;}

    .btn-color-2 {background-color: #d5edb9;}

    .btn-color-3 {background-color: #c4bdf3;}

    .btn-color-4 {background-color: #fbe8a4;}

    .btn-color-5 {background-color: #ffc296;}

    .btn-color-6 {background-color: #f9cadc;}

    .view-btn:hover {
      opacity: 0.8;
    }
  </style>

<div class="container text-center">
    <div class="row">
      
        @foreach ($datos as $index => $dato)
            @php
            $colorClass = 'btn-color-' . (($index % 6) + 1);
            @endphp
            <div class="view-card">
                <div class="card" >
                    <div class="card-body">
                        <h3 class="card-title">{{ $dato->Nombre }}</h3>
                        <a href="{{ route('Iapoyos',$dato->id) }}" style="color: black"
                        class="btn btn {{ $colorClass }} view-btn rounded-pill">Ver </a>
                    </div>
                </div>
            </div>
        @endforeach
    </>
        @role("Admin")
        <button class="btn">
            <a href="{{ route('apoyos.create') }}" class="btn btn-secondary btn-sm float-right"  data-placement="left">
                <i class="fa fa-regular fa-plus"></i>
            </a>
        </button>
        @endrole
        </div>
    </div>
</div>

@endsection