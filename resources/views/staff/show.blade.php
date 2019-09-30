@extends('layouts.adminLTE')

@section('css')
@endsection

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Empleados <small>examen</small></h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('staff.index') }}"><i class="fa fa-users"></i> Empleados</a></li>
                <li class="active">Detalles</li>
            </ol>
        </section>

        <section class="content">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-info-circle"></i> Informaci&oacute;n del Empleado</h3>
                </div>

                <div class="box-body">
                    <div class="callout bg-olive col-xs-12 col-md-6">
                        <dl class="dl-horizontal">
                            <dt>C&oacute;digo:</dt><dd>{{ $staff->code }}</dd>
                            <dt>Nombre:</dt><dd>{{ $staff->name }}</dd>
                            <dt>Salario D&oacute;lares:</dt><dd>{{ number_format($staff->dollarSalary, '2', '.', ',') }}</dd>
                            <dt>Salario Pesos:</dt><dd>{{ number_format($staff->pesosSalary, '2', '.', ',') }}</dd>
                            <dt>Direcci&oacute;n:</dt><dd>{{ $staff->address }}</dd>
                            <dt>Estado:</dt><dd>{{ $staff->state }}</dd>
                            <dt>Ciudad:</dt><dd>{{ $staff->city }}</dd>
                            <dt>Tel&eacute;fono:</dt><dd>{{ $staff->telephone }}</dd>
                            <dt>Correo:</dt><dd>{{ $staff->email }}</dd>
                            <dt>Activo:</dt><dd>{{ $staff->active == '1' ? 'Si' : 'No' }}</dd>
                        </dl>
                    </div>

                    <div class="callout bg-gray col-xs-12 col-md-6">
                        <h4><i class="fa fa-usd"></i> Proyecci&oacute;n Salarial (6 meses)</h4>

                        <table class="table table-bordered table-condensed">
                            <thead class="bg-purple">
                                <tr>
                                    <th class="text-center">Mes / A&ntilde;o</th>
                                    <th class="text-center">Salario D&oacute;lares</th>
                                    <th class="text-center">Salario Pesos</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $date = \Illuminate\Support\Carbon::now();
                                @endphp

                                @for($i = 0; $i < 6; $i++)
                                    @php
                                        $newMonth = $date->addMonth();
                                    @endphp
                                    <tr>
                                        <td class="text-center">{{ $newMonth->format('m-Y') }}</td>
                                        <td class="text-right"><strong>{{ number_format($staff->dollarSalary, '2', '.', ',') }}</strong></td>
                                        <td class="text-right"><strong>{{ number_format($staff->pesosSalary, '2', '.', ',') }}</strong></td>
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="modal-footer">
                    <a href="{{ route('staff.index') }}" type="button" class="btn btn-danger"><i class="fa fa-mail-reply"></i> Regresar</a>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('js')
@endsection
