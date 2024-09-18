<style>
    .font-size-16 {
        font-size: 16px;
    }
</style>

<div class="box box-info padding-1 font-size-16">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $recuso->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('objetivo') }}
            {{ Form::textarea('objetivo', $recuso->objetivo, ['class' => 'form-control' . ($errors->has('objetivo') ? ' is-invalid' : ''), 'placeholder' => 'Objetivo']) }}
            {!! $errors->first('objetivo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('descipcion') }}
            {{ Form::textarea('descipcion', $recuso->descipcion, ['class' => 'form-control' . ($errors->has('descipcion') ? ' is-invalid' : ''), 'placeholder' => 'Descipcion']) }}
            {!! $errors->first('descipcion', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt-2 d-md-flex justify-content-md-end">
        <button type="submit" class="btn btn-primary"><i class="fa fa-solid fa-check"></i>{{ __('') }}</button>
    </div>
</div>
