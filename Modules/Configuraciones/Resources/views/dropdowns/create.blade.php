@extends('layouts.app')

@section('title','Dropdowns - Crear')

@section('headlinks')
<!-- Select2 -->
<link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endsection

@section('content')

<div class="card card-danger">
    <div class="card-header">
        <h3 class="card-title">Crear Dropdown</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    {!! Form::open(['route' => 'admin.dropdowns.store', 'role' => 'form']) !!}
    @include('configuracion::dropdowns.form')
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
    {!! Form::close() !!}
</div>
<!-- /.card -->

@endsection

@section('footscripts')
<!-- Select2 -->
<script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>
<script>
    //Initialize Select2 Elements
    $('.select2').select2({
        placeholder: "Seleccione un Rol",
        allowClear: true
    });
    $('.select22').select2({
        placeholder: "Seleccione uno o varios Permisos",
        allowClear: true
    });
</script>
@endsection
