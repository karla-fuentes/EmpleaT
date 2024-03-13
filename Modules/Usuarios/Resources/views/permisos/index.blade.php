@extends('layouts.app')

@section('title','Permisos')

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
                        <h3 class="card-title">Permisos</h3>
                    </div>
                    <div class="col-md-2">
                        <a href="{{route('dashboard.permisos.create')}}" class="btn btn-block btn-primary">Crear Permiso</a>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="tablaPermisos" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th class="no-sort" style="width: 20%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permisos as $permiso)
                        <tr>
                            <td> {{$permiso->name}} </td>
                            
                            <td class="text-right">
                                {{-- <a class="btn btn-primary btn-sm" href="{{route('dashboard.permisos.show',$permiso->id)}}">
                                    <i class="fas fa-folder">
                                    </i>
                                    Ver
                                </a> --}}
                                @can('Editar Roles')
                                <a class="btn btn-info btn-sm" href="{{route('dashboard.permisos.edit',$permiso->id)}}">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Editar
                                </a>
                                @endcan
                                @can('Eliminar Roles')
                                <a class="btn btn-danger btn-sm" href="#"   data-toggle="modal" data-target="#permiso-destroy-{{ $permiso->id }}">
                                    <i class="fas fa-trash">
                                    </i>
                                    Eliminar
                                </a>
                                @endcan
                                @include('usuarios::permisos.destroy')
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
        $('#tablaPermisos').DataTable({
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
                "lengthMenu": "Mostrando _MENU_ permisos por página",
                "zeroRecords": "No se encontró nada - lo sentimos",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "No hay permisos disponibles",
                "infoFiltered": "(filtrando de _MAX_ total permisos)",
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
