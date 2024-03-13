@extends('layouts.app')

@section('title','Dropdowns - Ver')


@section('headlinks')
@endsection

@section('content')

<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title"> Dropdown </h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                title="Collapse"><i class="fas fa-minus"></i></button>
        </div>
    </div>
    <div class="card-body">
        <div class="card">
            <div class="card-header">
                <div class="row">

                    <div class="col-md-10">
                        <h3 class="card-title">{{ $dropdown->value }}</h3>
                    </div>
                    @can('Editar Dropdowns')
                    <div class="col-md-2">
                        <a class="btn btn-info btn-sm" href="javascript:editarDropdown({{$dropdown->id}},'{{$dropdown->value}}','{{$dropdown->key}}');">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Editar
                        </a>
                        <a class="btn btn-success btn-sm" href="javascript:crearDropdown({{$dropdown->id}});">
                            <i class="fas fa-plus">
                            </i>
                            Agregar
                        </a>
                    </div>
                    @endcan
                </div>
            </div>
            <div class="card-body">
                {{$dropdown->description}}
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="accordion" id="accordionExample">
                        @foreach ($dropdown->hijos()->get() as $element)
                        <div class="card">
                            <div class="card-header" id="heading{{$element->id}}">
                                <div class="row">
                                    <div class="col-md-10">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{$element->id}}" aria-expanded="false" aria-controls="collapse{{$element->id}}">
                                                {{$element->value}}
                                            </button>
                                        </h5>
                                    </div>
                                    <div class="col-md-2">
                                        <a class="btn btn-success btn-sm" href="javascript:crearDropdown({{$element->id}});"><i class="fas fa-plus"></i></a>
                                        <a class="btn btn-info btn-sm" href="javascript:editarDropdown({{$element->id}},'{{$element->value}}','{{$element->key}}');"><i class="fas fa-pencil-alt"></i></a>
                                        <a class="btn btn-danger btn-sm" href="javascript:borrarDropdown({{$element->id}},'{{$element->value}}');"><i class="fas fa-trash"></i></a>
                                    </div>
                                </div>

                            </div>

                            <div id="collapse{{$element->id}}" class="collapse" aria-labelledby="heading{{$element->id}}" data-parent="#heading{{$element->id}}">
                                <div class="card-body">
                                    @include('configuraciones::dropdowns.partials.parent', ['elements' => $element->hijos()])
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
@endsection

@section('footer')
<div id="editarDropdown" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="" id="editarForm" method="post">
                <div class="modal-header">
                    <h5 class="modal-title">Editar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::hidden('_method', 'PATCH') !!}
                    @csrf
                    <div class="form-group">
                        <label for="value">* Nombre</label>
                        {!! Form::text('value', null, ['class' => 'form-control','id' => 'valueDropdown']) !!}
                    </div>
                    <div class="form-group">
                        <label for="key">Valor</label>
                        {!! Form::text('key', null, ['class' => 'form-control','id' => 'keyDropdown']) !!}
                        <span class="has-error">Dejar en blanco si no se desea agregar un valor en especifico</span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div id="crearDropdown" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{route('admin.dropdowns.store')}}" id="crearForm" method="post">
                <div class="modal-header">
                    <h5 class="modal-title">Crear</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @csrf
                    {!! Form::hidden('parent_id', null, ['id' => 'createparentDropdown']) !!}
                    <div class="form-group">
                        <label for="value">* Nombre</label>
                        {!! Form::text('value', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        <label for="key">Valor</label>
                        {!! Form::text('key', null, ['class' => 'form-control']) !!}
                        <span class="has-error">Dejar en blanco si no se desea agregar un valor en especifico</span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div id="dropdown-destroy" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
                    <i class="fa fa-warning"></i> Confirmar acción </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fa fa-close"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>¿Eliminar dropdown <strong id="value"></strong>?</p>
                </div>
                <div class="modal-footer">
                    <form method="post" id="borrarDropdown" action="">
                        {!! Form::hidden('_method', 'DELETE',) !!}
                        @csrf
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Sí, eliminar</button>
                    </form>
                </div>
        </div>

    </div>
</div>
@endsection

@section('footscripts')
<script>
    function editarDropdown(id,value,key,parent = null) {
        $('#valueDropdown').val(value);
        $('#keyDropdown').val(key);
        $('#editarDropdown').modal();
        $('#editarForm').attr('action', '{{route('admin.dropdowns.index')}}/'+id);
    }
    function crearDropdown(parent = null){
        $('#createparentDropdown').val(parent);
        $('#crearForm').attr('action', '{{route('admin.dropdowns.index')}}');
        $('#crearDropdown').modal();
    }
    function borrarDropdown(id,nombre) {
        $('#value').html(nombre);
        $('#borrarDropdown').attr('action', '{{route('admin.dropdowns.index')}}/'+id);
        $('#dropdown-destroy').modal();
    }
</script>
@endsection
