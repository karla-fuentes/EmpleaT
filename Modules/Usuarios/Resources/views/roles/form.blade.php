@php
$edit = isset($rol);
@endphp

<div class="card-body">
    <div class="form-group">
        <label for="name">Nombre</label>
        {!! Form::text('name', null, ['class' => 'form-control'.($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Nombre', 'required' => true ]) !!}
        @if ($errors->has('name'))
        <span class="has-error">{{ $errors->first('name') }}</span>
        @endif
    </div>
    {!! Form::hidden('id', null) !!}
</div>
<!-- /.card-body -->
