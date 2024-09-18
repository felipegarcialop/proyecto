@extends('layouts.app')

@section('template_title')
    Alumno
@endsection

@section('content')
    <div class="container-fluid" style="font-size: 16px;">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header" style="font-size: 16px;">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('Alumno') }}
                            </span>

                            
                        </div>
                    </div>
                    
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success" style="font-size: 16px;">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body" style="font-size: 16px;">
                        <!-- Formulario de búsqueda -->
                        <form method="GET" action="{{ route('alumnos.index') }}" class="mb-3" style="font-size: 16px;">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="Buscar alumnos..." value="{{ request()->input('search') }}" style="font-size: 16px;">
                                <button class="btn btn-primary" type="submit" style="font-size: 16px;">Buscar</button>
                            </div>
                        </form>

                        <div class="table-responsive" style="font-size: 16px;">
                            <table class="table table-striped table-hover" style="font-size: 16px;">
                                <thead class="thead">
                                    <tr>
                                        <th style="font-size: 16px;">No</th>
                                        <th style="font-size: 16px;">Usuario</th>
                                        <th style="font-size: 16px;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($alumnos as $alumno)
                                        <tr>
                                            <td style="font-size: 16px;">{{ ++$i }}</td>
                                            <td style="font-size: 16px;">{{ $alumno->user->name }}</td>
                                            <td>
                                                <form action="{{ route('alumnos.destroy', $alumno->id) }}" method="POST">
                    
                                                    
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
