@php
$edit = isset($usuario);
$rol = null;
if($edit){
    foreach ($roles->get() as $value) {
        if(in_array($value->name, $usuario->getRoleNames()->toArray())){
            $rol = $value->id;
            break;
        }
    }
}
$permiso = [];
if($edit){
    foreach ($permisos->get() as $value) {
        if(in_array($value->name, $usuario->getPermissionNames()->toArray())){
            $permiso[] = $value->id;
        }
    }
}
@endphp

<div class="card-body">
    <div class="form-group">
        <label for="nombre">Nombre</label>
        {!! Form::text('nombre', null, ['class' => 'form-control'.($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre', 'required' => true ]) !!}
        @if ($errors->has('nombre'))
        <span class="has-error">{{ $errors->first('nombre') }}</span>
        @endif
    </div>
    <div class="form-group">
        <label for="apellido">Apellido</label>
        {!! Form::text('apellido', null, ['class' => 'form-control'.($errors->has('apellido') ? ' is-invalid' : ''), 'placeholder' => 'Apellido', 'required' => true ]) !!}
        @if ($errors->has('apellido'))
        <span class="has-error">{{ $errors->first('apellido') }}</span>
        @endif
    </div>
    <div class="form-group">
        <label for="email">Correo Electrónico</label>
        {!! Form::email('email', null, ['class' => 'form-control'.($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Correo electrónico', 'required' => true ]) !!}
        @if ($errors->has('email'))
        <span class="has-error">{{ $errors->first('email') }}</span>
        @endif
    </div>
    <div class="form-group">
        <label for="password">Contraseña</label>
        {!! Form::password('password', [
            'class' => 'form-control'.($errors->has('password') ? ' is-invalid' : ''),
            'placeholder' =>
            'Contraseña',
            'required' => ($edit ? false : true) ,
            ]) !!}
        <span class="text-muted small">Entre 8 y 32 caratceres</span>
        @if ($errors->has('password'))
        <span class="has-error">{{ $errors->first('password') }}</span>
        @endif
    </div>
    <div class="form-group">
        <label for="password_confirmation">Confirmar contraseña</label>
        {!! Form::password('password_confirmation', [
            'class' => 'form-control'.($errors->has('password_confirmation') ? ' is-invalid' : ''),
            'placeholder' =>
            'Confirmar contraseña',
            'required' => ($edit ? false : true)
            ]) !!}
        <span class="text-muted small">Entre 8 y 32 caratceres</span>
        @if ($errors->has('password_confirmation'))
        <span class="has-error">{{ $errors->first('password_confirmation') }}</span>
        @endif
    </div>

    <div class="form-group">
        <label class="control-label" for="descripcion">Descripción</label>
        {!! Form::textarea('descripcion', null, ['class' => 'form-control'.($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripción']) !!}
        @if ($errors->has('descripcion'))
        <span class="has-error">{{ $errors->first('descripcion') }}</span>
        @endif
    </div>

    @hasrole('Super Admin')
    <div class="form-group">
        <div class="form-check">
            {!! Form::radio('activo', 1, null, ['class' => 'form-check-input', 'id' => 'activeCheck1']) !!}
            <label class="form-check-label" for="activeCheck1">Activo</label>
        </div>
        <div class="form-check">
            {!! Form::radio('activo', 0, ($edit ? null : 1), ['class' => 'form-check-input', 'id' => 'activeCheck2']) !!}
            <label class="form-check-label" for="activeCheck2">Inactivo</label>
        </div>
        @if ($errors->has('activo'))
        <span class="has-error">{{ $errors->first('activo') }}</span>
        @endif
    </div>
    <div class="form-group">
        <label class="control-label" for="rol">Rol</label>
        {!! Form::select('rol', $roles->pluck('name','id')->toArray(), ($edit) ? $rol : null, [
            'class' => 'form-control select2 '.($errors->has('rol') ? ' is-invalid' : ''),
            'placeholder' => ''
        ]) !!}
        @if ($errors->has('rol'))
        <span class="has-error">{{ $errors->first('rol') }}</span>
        @endif
    </div>
    <div class="form-group">
        <label class="control-label" for="permisos">Permisos</label>
        <select multiple="multiple" name="permisos[]" id="permisos" class="form-control select22 {{($errors->has('permisos') ? ' is-invalid' : '')}}">
        @foreach($permisos->pluck('name','id')->toArray() as $key => $value)
            <option value="{{$key}}" @if( in_array($key, $permiso) )selected="selected"@endif>{{$value}}</option>
        @endforeach
        </select>
        @if ($errors->has('permisos'))
        <span class="has-error">{{ $errors->first('permisos') }}</span>
        @endif
    </div>
    @endrole
    {!! Form::hidden('id', null) !!}
</div>
<!-- /.card-body -->
