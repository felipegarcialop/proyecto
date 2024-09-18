@extends('layouts.app')

@section('template_title')
    Encuesta
@endsection

@section('content')
    <div class="container-fluid" style="font-size: 16px;">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('Encuestas') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('encuestas.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
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
                                        <th style="font-size: 16px;">No</th>
                                        <th style="font-size: 16px;">Titulo</th>
                                        <th style="font-size: 16px;">Tema</th>
                                        <th style="font-size: 16px;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($encuestas as $encuesta)
                                        <tr>
                                            <td style="font-size: 16px;">{{ ++$i }}</td>
                                            <td style="font-size: 16px;">{{ $encuesta->Titulo }}</td>
                                            <td style="font-size: 16px;">{{ $encuesta->tema->Nombre }}</td>
                                            <td>
                                                <form action="{{ route('encuestas.destroy',$encuesta->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-success" href="{{ route('encuestas.edit',$encuesta->id) }}" style="font-size: 16px;">
                                                        <i class="fa fa-fw fa-edit"></i> {{ __('') }}
                                                    </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" style="font-size: 16px;">
                                                        <i class="fa fa-fw fa-trash"></i>{{ __('') }}
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
                {!! $encuestas->links() !!}
            </div>
        </div>
    </div>
@endsection
