@extends('layouts.app')

@section('template_title')
    Pregunta
@endsection

@section('content')
    <style>
        .font-size-16 {
            font-size: 16px;
        }
    </style>
    <div class="container-fluid font-size-16">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('Pregunta') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('preguntas.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                                    <i class="fa fa-regular fa-plus"></i>{{ __('') }}
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
                                        <th>Pregunta</th>
                                        <th>Encuesta</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($preguntas as $pregunta)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $pregunta->pregunta }}</td>
                                            <td>{{ $pregunta->encuesta->Titulo }}</td>
                                            <td>
                                                <form action="{{ route('preguntas.destroy', $pregunta->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-success" href="{{ route('preguntas.edit', $pregunta->id) }}">
                                                        <i class="fa fa-fw fa-edit"></i> {{ __('') }}
                                                    </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="fa fa-fw fa-trash"></i> {{ __('') }}
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
                {!! $preguntas->links() !!}
            </div>
        </div>
    </div>
@endsection
