@extends('layouts.app')

@section('template_title')
    Cuestionario
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header" style="font-size: 16px;">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Cuestionarios') }}
                            </span>
                                
                             <div class="float-right">
                                <a href="{{ route('cuestionarios.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left" style="font-size: 16px;">
                                    <i class="fa fa-regular fa-plus"></i>{{ __('') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success" style="font-size: 16px;">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th style="font-size: 16px;">No</th>
                                        <th style="font-size: 16px;">Preguntas</th>
                                        <th style="font-size: 16px;">Respuestas</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cuestionarios as $cuestionario)
                                        <tr>
                                            <td style="font-size: 16px;">{{ ++$i }}</td>
                                            <td style="font-size: 16px;">{{ $cuestionario->pregunta->pregunta }}</td>
                                            <td style="font-size: 16px;">{{ $cuestionario->repuesta->Respuestas }}</td>
                                            <td>
                                                <form action="{{ route('cuestionarios.destroy',$cuestionario->id) }}" method="POST">                                                    
                                                    <a class="btn btn-sm btn-success" href="{{ route('cuestionarios.edit',$cuestionario->id) }}" style="font-size: 16px;"><i class="fa fa-fw fa-edit"></i> {{ __('') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" style="font-size: 16px;"><i class="fa fa-fw fa-trash"></i> {{ __('') }}</button>
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
