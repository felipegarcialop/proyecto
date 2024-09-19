@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Encuesta
@endsection

@section('content')
    <style>
        .card-header, .card-body, .form-group label, .form-control, .btn {
            font-size: 16px;
        }
        .invalid-feedback {
            font-size: 16px;
        }
    </style>

    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Editar') }} encuesta</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('encuestas.update', $encuesta->id) }}" role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('encuesta.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
