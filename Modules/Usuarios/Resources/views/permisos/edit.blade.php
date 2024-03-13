@extends('layouts.app')

@section('title','Permisos - Editar')
    
@section('content')

<div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Editar Permiso</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        {{ Form::model($permiso, ['route' => ['dashboard.permisos.update', $permiso->id], 'role' => 'form', 'method' => 'PATCH']) }}
        @include('usuarios::permisos.form')
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
        {!! Form::close() !!}
    </div>
    <!-- /.card -->
    
@endsection
