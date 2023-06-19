@extends('layouts.app')

@section('template_title')
    {{ $pregunta->name ?? "{{ __('Show') Pregunta" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Pregunta</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('preguntas.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Pregunta:</strong>
                            {{ $pregunta->pregunta }}
                        </div>
                        <div class="form-group">
                            <strong>Encuesta Id:</strong>
                            {{ $pregunta->encuesta_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
