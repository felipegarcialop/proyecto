@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Alumno
@endsection

@section('content')
    <section class="content container-fluid" style="font-size: 16px;">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header" style="font-size: 16px;">
                        <span class="card-title">{{ __('Create') }} Alumno</span>
                    </div>
                    <div class="card-body" style="font-size: 16px;">
                        <form method="POST" action="{{ route('alumnos.store') }}" role="form" enctype="multipart/form-data">
                            @csrf

                            @include('alumno.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
