@extends('layouts.app')

@section('title','Roles')

@section('headstyle')

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
                        <h3 class="card-title">Roles</h3>
                    </div>
                    <div class="col-md-2">
                        <a href="{{route('dashboard.roles.create')}}" class="btn btn-block btn-primary">Crear Rol</a>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="tablaRoles" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th class="no-sort" style="width: 20%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $rol)
                        <tr>
                            <td> {{$rol->name}} </td>
                            <td class="text-right">
                                {{-- <a class="btn btn-primary btn-sm" href="{{route('dashboard.roles.show',$rol->id)}}">
                                    <i class="fas fa-folder">
                                    </i>
                                    Ver
                                </a> --}}
                                @can('Editar Roles')
                                <a class="btn btn-info btn-sm" href="{{route('dashboard.roles.edit',$rol->id)}}">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Editar
                                </a>
                                @endcan
                                @can('Eliminar Roles')
                                <a class="btn btn-danger btn-sm" href="#"   data-toggle="modal" data-target="#rol-destroy-{{ $rol->id }}">
                                    <i class="fas fa-trash">
                                    </i>
                                    Eliminar
                                </a>
                                @endcan
                                @include('usuarios::roles.destroy')
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Nombre</th>
                            <th class="no-sort" style="width: 20%"></th>
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


@section('footscripts')

<!-- DataTables -->
<script src="{{asset('plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<script>
    $(function () {
        $('#tablaRoles').DataTable({
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
            "language": {
                "lengthMenu": "Mostrando _MENU_ roles por pagina",
                "zeroRecords": "No se encontró nada - lo sentimos",
                "info": "Mostrando pagina _PAGE_ de _PAGES_",
                "infoEmpty": "No hay roles disponibles",
                "infoFiltered": "(filtrando de _MAX_ total roles)",
                "search":         "Buscar:",
                "paginate": {
                    "first":      "Primero",
                    "last":       "Ultimo",
                    "next":       "Siguiente",
                    "previous":   "Anterior"
                },
            }
        });
    });

</script>
@endsection
