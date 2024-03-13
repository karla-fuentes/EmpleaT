@extends('layouts.app')

@section('title','Roles - Crear')

@section('content')

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Crear Rol</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    {!! Form::open(['route' => 'dashboard.roles.store', 'role' => 'form']) !!}
    @include('usuarios::roles.form')
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
    {!! Form::close() !!}
</div>
<!-- /.card -->

@endsection
