@extends('layouts.app')

@section('template_title')
    {{ $encuesta->name ?? "{{ __('Show') Encuesta" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Encuesta</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('encuestas.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Titulo:</strong>
                            {{ $encuesta->Titulo }}
                        </div>
                        <div class="form-group">
                            <strong>Tema Id:</strong>
                            {{ $encuesta->tema_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
