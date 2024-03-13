@extends('layouts.app')

@section('title','Rol - Editar')
    
@section('content')

<div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Editar Rol</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        {{ Form::model($rol, ['route' => ['dashboard.roles.update', $rol->id], 'role' => 'form', 'method' => 'PATCH']) }}
        @include('usuarios::roles.form')
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
        {!! Form::close() !!}
    </div>
    <!-- /.card -->
    
@endsection
