@extends('layouts.app')

@section('content')
<style>
    /* Estilos para la paginación personalizada */
    .pagination-custom {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }
    .pagination-custom a {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        font-size: 18px;
        color: #007bff; /* Color azul */
        background-color: #f8f9fa;
        border: 1px solid #007bff;
        border-radius: 5px;
        text-decoration: none;
        margin: 0 5px;
    }
    .pagination-custom a.disabled {
        color: #6c757d;
        border-color: #6c757d;
        pointer-events: none;
    }
    .pagination-custom a:hover {
        background-color: #007bff;
        color: #ffffff;
    }
</style>

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Gestión de usuarios</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('users.create') }}"> Crear nuevo usuario</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered">
    <tr>
        <th>No.</th>
        <th>Nombre</th>
        <th>Correo</th>
        <th>Grado</th>
        <th>Institución</th>
        <th>Roles</th>
        <th width="280px">Acción</th>
    </tr>
    @foreach ($data as $key => $user)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>
            @if($user->grado)
                {{ $user->grado->descripcion }}
                @if($user->grado->grupo)
                    - {{ $user->grado->grupo->descripcion }}
                @endif
            @else
                No asignado
            @endif
        </td>
        <td>{{ $user->institucion->Nombre ?? 'No asignado' }}</td>
        <td>
            @if(!empty($user->getRoleNames()))
                @foreach($user->getRoleNames() as $v)
                    <span class="badge rounded-pill bg-dark">{{ $v }}</span>
                @endforeach
            @endif
        </td>
        <td>
            <a class="btn btn-primary" href="{{ route('users.edit', $user->id) }}">
                <i class="fa fa-edit"></i>
            </a>
            {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id], 'style' => 'display:inline']) !!}
                <button type="submit" class="btn btn-danger">
                    <i class="fa fa-trash"></i>
                </button>
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
</table>

<!-- Paginación -->
<div class="pagination-custom">
    <!-- Botón Anterior -->
    <a href="{{ $data->previousPageUrl() }}" class="@if(!$data->previousPageUrl()) disabled @endif">
        <i class="fa fa-chevron-left"></i>
    </a>

    <!-- Botones de Páginas -->
    @for ($i = 1; $i <= $data->lastPage(); $i++)
        <a href="{{ $data->url($i) }}" class="@if($data->currentPage() == $i) active @endif">
            {{ $i }}
        </a>
    @endfor

    <!-- Botón Siguiente -->
    <a href="{{ $data->nextPageUrl() }}" class="@if(!$data->nextPageUrl()) disabled @endif">
        <i class="fa fa-chevron-right"></i>
    </a>
</div>

@endsection
