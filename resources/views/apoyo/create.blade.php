@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Apoyo
@endsection

@section('content')
    <section class="content container-fluid" style="font-size: 16px;">
        <a href="{{ route('apoyos.index') }}" style="text-decoration: none; color: black; font-size: 16px;">
            <i class="fa fa-solid fa-arrow-left"></i> Regresar
        </a>
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header text-center" style="font-size: 16px;">
                        <h4><span class="card-title">{{ __('Agregar una institucion de') }} apoyo</span></h4>
                    </div>
                    <div class="card-body" style="font-size: 16px;">
                        <form method="POST" action="{{ route('apoyos.store') }}" role="form" enctype="multipart/form-data">
                            @csrf

                            @include('apoyo.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
