@extends('layouts.app')

@section('title','Usuarios')

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
                        <h3 class="card-title">Usuarios</h3>
                    </div>
                    <div class="col-md-2">
                        <a href="{{route('dashboard.usuarios.create')}}" class="btn btn-block btn-primary">Crear Usuario</a>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="tablaUsuarios" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Activo</th>
                            <th>Ultimo Inicio de Sesion</th>
                            <th class="no-sort" style="width: 10%"></th>
                        </tr>
                    </thead>
                    {{-- <tbody>
                        @foreach ($usuarios as $usuario)
                        <tr>
                            <td> {{$usuario->nombre_completo}} </td>
                            <td> {{$usuario->email}} </td>
                            <td> {!! ($usuario->activo) ? '<span class="badge badge-success">Si</span>':'<span class="badge badge-danger">No</span>' !!} </td>
                            <td> {{$usuario->logged_at}} </td>
                            <td class="text-right">
                                <a class="btn btn-primary btn-sm" href="{{route('dashboard.usuarios.show',$usuario->id)}}">
                                    <i class="fas fa-folder">
                                    </i>
                                    Ver
                                </a>
                                @can('Editar Usuarios')
                                <a class="btn btn-info btn-sm" href="{{route('dashboard.usuarios.edit',$usuario->id)}}">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Editar
                                </a>
                                @endcan
                                @can('Eliminar Usuarios')
                                <a class="btn btn-danger btn-sm" href="#"   data-toggle="modal" data-target="#usuario-destroy-{{ $usuario->id }}">
                                    <i class="fas fa-trash">
                                    </i>
                                    Eliminar
                                </a>
                                @endcan
                                @include('usuarios::usuarios.destroy')
                            </td>
                        </tr>
                        @endforeach
                    </tbody> --}}
                    <tfoot>
                        <tr>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Activo</th>
                            <th>Ultimo Inicio de Sesion</th>
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


@section('footscripts')

<!-- DataTables -->
<script src="{{asset('plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<script>
    $(function () {
        $('#tablaUsuarios').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": '{!! route('dashboard.usuarios.list') !!}',
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
            "language": {
                "lengthMenu": "Mostrando _MENU_ usuarios por pagina",
                "zeroRecords": "No se encontró nada - lo sentimos",
                "info": "Mostrando pagina _PAGE_ de _PAGES_",
                "infoEmpty": "No hay usuarios disponibles",
                "infoFiltered": "(filtrando de _MAX_ total usuarios)",
                "search":         "Buscar:",
                "paginate": {
                    "first":      "Primero",
                    "last":       "Ultimo",
                    "next":       "Siguiente",
                    "previous":   "Anterior"
                },
            },columns: [
                { data: 'nombre', name: 'nombre' },
                { data: 'email', name: 'email' },
                { data: 'estado', name: 'estado' },
                { data: 'logged_at', name: 'logged_at' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ]
        });
    });

</script>
@endsection
