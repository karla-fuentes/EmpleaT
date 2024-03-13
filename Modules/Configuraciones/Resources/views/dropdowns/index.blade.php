@extends('layouts.app')

@section('title','Dropdowns')

@section('headlinks')

<!-- DataTables -->
<link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
@endsection

@section('content')
<div class="row">
    <div class="col-12">

        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-10">
                        <h3 class="card-title">Dropdowns</h3>
                    </div>
                    <div class="col-md-2">
                        <a href="{{route('admin.dropdowns.create')}}" data-toggle="modal" data-target="#crearDropdown" class="btn btn-block btn-primary">Crear Dropdown</a>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="tablaDropdowns" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Agrupación</th>
                            <th>Descripción</th>
                            <th class="no-sort" style="width: 10%"></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Agrupación</th>
                            <th>Descripción</th>
                            <th class="no-sort"  style="width: 10%"></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->
@endsection

@section('footer')
    <!-- Modal -->
<div id="crearDropdown" class="modal fade" tabindex="-1"  role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Crear Dropdown</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'admin.dropdowns.store', 'role' => 'form']) !!}

                <div class="form-group">
                    <label for="value">Nombre</label>
                    {!! Form::text('value', null, ['class' => 'form-control'.($errors->has('value') ? ' is-invalid' : ''), 'placeholder' => 'Nombre', 'required' => false ]) !!}
                    @if ($errors->has('value'))
                    <span class="has-error">{{ $errors->first('value') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label class="control-label" for="description">Descripción</label>
                    {!! Form::textarea('description', null, ['class' => 'form-control'.($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Descripción']) !!}
                    @if ($errors->has('description'))
                    <span class="has-error">{{ $errors->first('description') }}</span>
                    @endif
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>

    </div>
</div>
<div id="dropdown-edit" class="modal fade" tabindex="-1"  role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar Dropdown</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'admin.dropdowns.store', 'role' => 'form', 'id' => 'editarForm']) !!}
                {!! Form::hidden('_method', 'PATCH') !!}
                <div class="form-group">
                    <label for="value">Nombre</label>
                    {!! Form::text('value', null, ['class' => 'form-control'.($errors->has('value') ? ' is-invalid' : ''), 'placeholder' => 'Nombre', 'required' => false,'id' => 'nombre' ]) !!}
                    @if ($errors->has('value'))
                    <span class="has-error">{{ $errors->first('value') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label class="control-label" for="description">Descripción</label>
                    {!! Form::textarea('description', null, ['class' => 'form-control'.($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Descripción','id' => 'descripcion']) !!}
                    @if ($errors->has('description'))
                    <span class="has-error">{{ $errors->first('description') }}</span>
                    @endif
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>

    </div>
</div>

<div id="dropdown-destroy"  tabindex="-1" class="modal fade" role="dialog">
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

<!-- DataTables -->
<script src="{{asset('plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<script>
    function borrarDropdown(id,nombre) {
        $('#value').html(nombre);
        $('#borrarDropdown').attr('action', '{{route('admin.dropdowns.index')}}/'+id);
        $('#dropdown-destroy').modal();
    }
    function editarDropdown(id,nombre,descripcion) {
        $('#nombre').val(nombre);
        $('#descripcion').val(descripcion);
        $('#editarForm').attr('action', '{{route('admin.dropdowns.index')}}/'+id);
        $('#dropdown-edit').modal();
    }
    $(function () {
        $('#tablaDropdowns').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": '{!! route('admin.dropdowns.list') !!}',
                "data": function (d) {
                    // d.proyecto = $('#proyecto').val();
                    // d.sector = $('#sector').val();
                    // d.manzana = $('#manzana').val();
                    // d.lote = $('#lote').val();
                }
            },
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "columnDefs": [ {
                "targets": 'no-sort',
                "orderable": false,
            } ],
            "order": [[ 0, "desc" ]],
            "language": {
                "lengthMenu": "Mostrando _MENU_ dropdowns por pagina",
                "zeroRecords": "No se encontró nada - lo sentimos",
                "info": "Mostrando pagina _PAGE_ de _PAGES_",
                "infoEmpty": "No hay dropdowns disponibles",
                "infoFiltered": "(filtrando de _MAX_ total dropdowns)",
                "search":         "Buscar:",
                "paginate": {
                    "first":      "Primero",
                    "last":       "Ultimo",
                    "next":       "Siguiente",
                    "previous":   "Anterior"
                },
            },columns: [
                { data: 'value', name: 'value' },
                { data: 'description', name: 'description' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ]
        });
    });

</script>
@endsection
