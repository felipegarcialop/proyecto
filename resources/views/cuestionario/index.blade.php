@extends('layouts.app')

@section('template_title')
    Cuestionario
@endsection

@section('content')
    <style>
        /* Ajuste de tamaño de fuente para el contenido de la tarjeta */
        .card-header, .alert, .btn, .table th, .table td {
            font-size: 16px;
        }

        /* Ajuste del tamaño de fuente para el contenido de la tabla */
        .table th, .table td {
            font-size: 16px;
        }

        /* Espaciado para el botón de añadir */
        .btn-primary.btn-sm {
            margin-left: 10px;
        }

        /* Ajuste de tamaño del icono en los botones */
        .btn i {
            font-size: 16px;
        }
    </style>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('Cuestionarios') }}
                            </span>
                            
                            <div class="float-right">
                                <a href="{{ route('cuestionarios.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                                    <i class="fa fa-regular fa-plus"></i> {{ __('Crear nuevo') }}
                                </a>
                            </div>
                        </div>
                    </div>

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th>Preguntas</th>
                                        <th>Respuestas</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cuestionarios as $cuestionario)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $cuestionario->pregunta->pregunta }}</td>
                                            <td>{{ $cuestionario->repuesta->Respuestas }}</td>
                                            <td>
                                                <form action="{{ route('cuestionarios.destroy', $cuestionario->id) }}" method="POST">                                                    
                                                    <a class="btn btn-sm btn-success" href="{{ route('cuestionarios.edit', $cuestionario->id) }}">
                                                        <i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}
                                                    </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $cuestionarios->links() !!}
            </div>
        </div>
    </div>
@endsection
