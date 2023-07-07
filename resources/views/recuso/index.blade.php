@extends('layouts.app')

@section('template_title')
    Recuso
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Material de apoyo') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('recusos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                <i class="fa fa-solid fa-plus"></i>{{ __('') }}
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
                                        
										<th>Nombre</th>
										<th>Objetivo</th>
										<th>Descipcion</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($recusos as $recuso)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $recuso->nombre }}</td>
											<td>{{ $recuso->objetivo }}</td>
											<td>{{ $recuso->descipcion }}</td>

                                            <td>
                                                <form action="{{ route('recusos.destroy',$recuso->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('recusos.show',$recuso->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('recusos.edit',$recuso->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $recusos->links() !!}
            </div>
        </div>
    </div>
@endsection
