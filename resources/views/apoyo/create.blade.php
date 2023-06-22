@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Apoyo
@endsection

@section('content')
    <section class="content container-fluid">
        <a href="{{ route('apoyos.index') }}" style="text-decoration: none; color: black"><i class="fa fa-solid fa-arrow-left"></i> Regresar</a>
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header text-center">
                        <h4><span class="card-title" >{{ __('Agregar una institucion de') }} apoyo</span></h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('apoyos.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('apoyo.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
