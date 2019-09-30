@extends('layouts.adminLTE')

@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Empleados <small>examen</small></h1>

            <ol class="breadcrumb">
                <li class="active"><i class="fa fa-users"></i> Empleados</li>
            </ol>
        </section>

        <section class="content">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-list"></i> Lista de Empleados</h3>

                    <div class="pull-right box-tools">
                        <a href="{{ route('staff.new') }}" class="btn bg-purple btn-sm"><i class="fa fa-user-plus"></i> Agregar Empleado</a>
                    </div>
                </div>

                <div class="box-body table-responsive">
                    <table id="staff" class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">C&oacute;digo</th>
                                <th class="text-center">Nombre</th>
                                <th class="text-center">Salario D&oacute;lares</th>
                                <th class="text-center">Salario Pesos</th>
                                <th class="text-center">Correo</th>
                                <th class="text-center">Activo</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($staff as $s)
                                <tr id="{{ $s->id }}">
                                    <td class="text-center">{{ $s->code }}</td>
                                    <td class="text-left">{{ $s->name }}</td>
                                    <td class="text-right">{{ number_format($s->dollarSalary, 2, '.', ',') }}</td>
                                    <td class="text-right">{{ number_format($s->pesosSalary, 2, '.', ',') }}</td>
                                    <td class="text-left">{{ $s->email }}</td>
                                    @if($s->active == '1')
                                        <td class="text-center"><small class="label label-success">Activo</small></td>
                                    @else
                                        <td class="text-center"><small class="label label-danger">Inactivo</small></td>
                                    @endif
                                    <td class="text-center">
                                        <a href="{{ route('staff.show', [$s->id]) }}" class="btn bg-purple btn-xs" data-toggle="tooltip" title="Detalles"><i class="fa fa-info-circle"></i></a>
                                        @if($s->active == '1')
                                            <button class="btn btn-warning btn-xs" data-toggle="tooltip" title="Inactivar" onclick="inactiveStaff('{{ $s->id }}', '{{ $s->name }}', '{{ route('staff.status') }}')"><i class="fa fa-warning"></i></button>
                                        @else
                                            <button class="btn btn-success btn-xs" data-toggle="tooltip" title="Activar" onclick="activeStaff('{{ $s->id }}', '{{ $s->name }}', '{{ route('staff.status') }}')"><i class="fa fa-check"></i></button>
                                        @endif
                                        <a href="{{ route('staff.edit', [$s->id]) }}" class="btn btn-info btn-xs" data-toggle="tooltip" title="Editar"><i class="fa fa-pencil"></i></a>
                                        <button class="btn btn-danger btn-xs" data-toggle="tooltip" title="Eliminar" onclick="deleteStaff('{{ $s->id }}', '{{ $s->name }}', '{{ route('staff.destroy') }}')"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div id="modal-active" class="modal modal-success fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title"><i class="fa fa-check"></i> Activar Empleado</h4>
                        </div>

                        <div id="modalBodyActive" class="modal-body">
                        </div>

                        <div class="modal-footer">
                            <button id="btnModalActiveCancel" type="button" class="btn btn-danger"><i class="fa fa-remove"></i> Cancelar</button>
                            <button id="btnModalActiveAccept" type="button" class="btn bg-purple"><i class="fa fa-check"></i> Aceptar</button>
                        </div>
                    </div>
                </div>
            </div>

            <div id="modal-inactive" class="modal modal-warning fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title"><i class="fa fa-warning"></i> Inactivar Empleado</h4>
                        </div>

                        <div id="modalBodyInactive" class="modal-body">
                        </div>

                        <div class="modal-footer">
                            <button id="btnModalInactiveCancel" type="button" class="btn btn-danger"><i class="fa fa-remove"></i> Cancelar</button>
                            <button id="btnModalInactiveAccept" type="button" class="btn bg-purple"><i class="fa fa-check"></i> Aceptar</button>
                        </div>
                    </div>
                </div>
            </div>

            <div id="modal-delete" class="modal modal-danger fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title"><i class="fa fa-trash"></i> Eliminar Empleado</h4>
                        </div>

                        <div id="modalBodyDelete" class="modal-body">
                        </div>

                        <div class="modal-footer">
                            <button id="btnModalDeleteCancel" type="button" class="btn btn-danger"><i class="fa fa-remove"></i> Cancelar</button>
                            <button id="btnModalDeleteAccept" type="button" class="btn bg-purple"><i class="fa fa-check"></i> Aceptar</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('js')
    <!-- DataTables -->
    <script src="{{ asset('bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('dist/js/staff.js') }}"></script>
@endsection
