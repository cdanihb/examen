@extends('layouts.adminLTE')

@section('css')
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ asset('plugins/iCheck/all.css') }}">
@endsection

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Empleados <small>examen</small></h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('staff.index') }}"><i class="fa fa-users"></i> Empleados</a></li>
                <li class="active">Nuevo</li>
            </ol>
        </section>

        <section class="content">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-user"></i> Datos del Empleado</h3>
                </div>

                <form id="frmNewStaff" class="form-horizontal">
                    @csrf

                    <div class="box-body">
                        <div class="form-group col-md-6 col-xs-12">
                            <label for="code" class="col-sm-4 control-label">C&oacute;digo</label>

                            <div id="div_code" class="col-sm-8">
                                <input id="code" name="code" type="text" class="form-control" placeholder="Código" maxlength="10" autofocus required>
                                <span id="span_code" class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group col-md-6 col-xs-12">
                            <label for="name" class="col-sm-4 control-label">Nombre</label>

                            <div id="div_name" class="col-sm-8">
                                <input id="name" name="name" type="text" class="form-control" placeholder="Nombre" maxlength="100" required>
                                <span id="span_name" class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group col-md-6 col-xs-12">
                            <label for="dollarSalary" class="col-sm-4 control-label">Salario D&oacute;lares</label>

                            <div id="div_dollarSalary" class="col-sm-8">
                                <input id="dollarSalary" name="dollarSalary" type="text" class="form-control" placeholder="Salario Dólares" maxlength="15" data-mask required>
                                <span id="span_dollarSalary" class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group col-md-6 col-xs-12">
                            <label for="pesosSalary" class="col-sm-4 control-label">Salario Pesos</label>

                            <div id="div_pesosSalary" class="col-sm-8">
                                <input id="pesosSalary" name="pesosSalary" type="text" class="form-control" placeholder="Salario Pesos" maxlength="15" readonly data-mask required>
                                <span id="span_pesosSalary" class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group col-md-6 col-xs-12">
                            <label for="address" class="col-sm-4 control-label">Direcci&oacute;n</label>

                            <div id="div_address" class="col-sm-8">
                                <input id="address" name="address" type="text" class="form-control" placeholder="Dirección" maxlength="100" required>
                                <span id="span_address" class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group col-md-6 col-xs-12">
                            <label for="state" class="col-sm-4 control-label">Estado</label>

                            <div id="div_state" class="col-sm-8">
                                <input id="state" name="state" type="text" class="form-control" placeholder="Estado" maxlength="50" required>
                                <span id="span_state" class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group col-md-6 col-xs-12">
                            <label for="city" class="col-sm-4 control-label">Ciudad</label>

                            <div id="div_city" class="col-sm-8">
                                <input id="city" name="city" type="text" class="form-control" placeholder="Ciudad" maxlength="50" required>
                                <span id="span_city" class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group col-md-6 col-xs-12">
                            <label for="telephone" class="col-sm-4 control-label">Tel&eacute;fono</label>

                            <div id="div_telephone" class="col-sm-8">
                                <input id="telephone" name="telephone" type="text" class="form-control" placeholder="Teléfono" maxlength="10" data-mask required>
                                <span id="span_telephone" class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group col-md-6 col-xs-12">
                            <label for="email" class="col-sm-4 control-label">Correo</label>

                            <div id="div_email" class="col-sm-8">
                                <input id="email" name="email" type="email" class="form-control" placeholder="Correo" maxlength="191" required>
                                <span id="span_email" class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group col-md-6 col-xs-12">
                            <label for="active" class="col-sm-4 control-label">Activo</label>

                            <div id="div_active" class="col-sm-8">
                                <label>
                                    <input name="active" type="radio" class="flat-purple" value="1" checked> S&iacute;
                                </label>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <label>
                                    <input name="active" type="radio" class="flat-purple" value="0"> No
                                </label>
                                <span id="span_active" class="help-block"></span>
                            </div>
                        </div>
                    </div>

                    <div class="box-footer text-right">
                        <button id="btnCancel" type="button" class="btn btn-danger"><i class="fa fa-remove"></i> Cancelar</button>
                        <button id="btnSave" type="button" class="btn bg-purple"><i class="fa fa-save"></i> Guardar</button>
                    </div>
                </form>
            </div>

            <div id="modal-cancel" class="modal modal-warning fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title"><i class="fa fa-warning"></i> Alerta</h4>
                        </div>

                        <div class="modal-body">
                            <p>Esta seguro de cancelar el registro del empleado, se perderan todos los datos.</p>
                        </div>

                        <div class="modal-footer">
                            <button id="btnModalCancel" type="button" class="btn btn-danger"><i class="fa fa-remove"></i> Cancelar</button>
                            <a href="{{ route('staff.index') }}" class="btn bg-purple"><i class="fa fa-check"></i> Aceptar</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('js')
    <!-- InputMask -->
    <script src="{{ asset('plugins/input-mask/jquery.inputmask.js') }}"></script>
    <script src="{{ asset('plugins/input-mask/jquery.inputmask.regex.extensions.js') }}"></script>
    <!-- iCheck 1.0.1 -->
    <script src="{{ asset('plugins/iCheck/icheck.min.js') }}"></script>
    <script type="text/javascript">
        var urlStaff = "{{ route('staff.index') }}", urlStoreStaff = "{{ route('staff.store') }}", urlWsStaff = "{{ route('staff.ws') }}";
    </script>
    <script src="{{ asset('dist/js/newStaff.js') }}"></script>
@endsection
