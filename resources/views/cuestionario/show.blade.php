@extends('layouts.app')

@section('template_title')
    {{ $cuestionario->name ?? "{{ __('Show') Cuestionario" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Cuestionario</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('cuestionarios.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Pregunta Id:</strong>
                            {{ $cuestionario->pregunta_id }}
                        </div>
                        <div class="form-group">
                            <strong>Repuesta Id:</strong>
                            {{ $cuestionario->repuesta_id }}
                        </div>
                        

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
