@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Repuesta
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
                        <span class="card-title">{{ __('Editar') }} repuesta</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('repuestas.update', $repuesta->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('repuesta.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
