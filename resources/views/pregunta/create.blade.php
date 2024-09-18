@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Pregunta
@endsection

@section('content')
    <style>
        .font-size-16 {
            font-size: 16px;
        }
    </style>
    <section class="content container-fluid font-size-16">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Crear') }} pregunta</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('preguntas.store') }}" role="form" enctype="multipart/form-data">
                            @csrf

                            @include('pregunta.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
