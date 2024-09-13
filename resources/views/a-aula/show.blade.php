@extends('layouts.app')

@section('template_title')
    {{ $aAula->name ?? "{{ __('Show') A Aula" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} A Aula</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('a-aulas.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Docente Id:</strong>
                            {{ $aAula->docente_id }}
                        </div>
                        <div class="form-group">
                            <strong>Alumno Id:</strong>
                            {{ $aAula->alumno_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
