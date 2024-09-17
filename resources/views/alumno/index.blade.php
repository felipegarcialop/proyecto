@extends('layouts.app')

@section('template_title')
    Alumno
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('Alumno') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('alumnos.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                                    {{ __('Crear Alumnno') }}
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
                        <!-- Formulario de búsqueda -->
                        <form method="GET" action="{{ route('alumnos.index') }}" class="mb-3">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="Buscar alumnos..." value="{{ request()->input('search') }}">
                                <button class="btn btn-primary" type="submit">Buscar</button>
                            </div>
                        </form>

                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th>Usuario</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($alumnos as $alumno)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $alumno->user->name }}</td>
                                            <td>
                                                <form action="{{ route('alumnos.destroy', $alumno->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary" href="{{ route('alumnos.show', $alumno->id) }}">
                                                        <i class="fa fa-fw fa-eye"></i>
                                                    </a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('alumnos.edit', $alumno->id) }}">
                                                        <i class="fa fa-fw fa-edit"></i> 
                                                    </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="fa fa-fw fa-trash"></i> 
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
                {!! $alumnos->links() !!}
            </div>
        </div>
    </div>
@endsection
