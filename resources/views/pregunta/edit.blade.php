@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Pregunta
@endsection

@section('content')
    <style>
        .font-size-16 {
            font-size: 16px;
        }
    </style>
    <section class="content container-fluid font-size-16">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Editar') }} pregunta</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('preguntas.update', $pregunta->id) }}" role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('pregunta.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
