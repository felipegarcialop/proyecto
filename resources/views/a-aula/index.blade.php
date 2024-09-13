@extends('layouts.app')

@section('template_title')
    A Aula
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('A Aula') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('a-aulas.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                                    {{ __('Create New') }}
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
                                        <th>Docente</th>
                                        <th>Alumnos</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($aAulas as $aAula)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
                                            <!-- Mostrar el nombre del docente -->
                                            <td>{{ $aAula->docente ? $aAula->docente->user->name : 'No Docente' }}</td>
                                            
                                            <!-- Mostrar los nombres de los alumnos -->
                                            <td>
                                                @if (!empty($aAula->alumno_ids))
                                                    @foreach ($aAula->alumno_ids as $alumnoId)
                                                        {{ $alumnos[$alumnoId]->user->name ?? 'Unknown' }},
                                                    @endforeach
                                                @else
                                                    {{ 'No Alumnos' }}
                                                @endif
                                            </td>

                                            <td>
                                                <form action="{{ route('a-aulas.destroy', $aAula->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary" href="{{ route('a-aulas.show', $aAula->id) }}">
                                                        <i class="fa fa-fw fa-eye"></i> {{ __('Show') }}
                                                    </a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('a-aulas.edit', $aAula->id) }}">
                                                        <i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}
                                                    </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}
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
                <!-- Paginación -->
                {!! $aAulas->links() !!}
            </div>
        </div>
    </div>
@endsection
