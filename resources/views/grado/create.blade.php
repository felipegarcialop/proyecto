@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Grado
@endsection

@section('content')
    <section class="content container-fluid" style="font-size: 16px;">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Agregar un ') }} semestre</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('grados.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('grado.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
