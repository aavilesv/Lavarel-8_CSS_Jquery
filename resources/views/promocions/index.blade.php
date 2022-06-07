@extends('layouts.template')
@section('title', 'Listado de Novedades')
@section('content')


    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h1 class="text-white title-it"> <i class="icon-present"></i> PROMOCIONES</h1>
                    <h5 class="text-white op-7 mb-2"><i class="icon-globe"></i> PROMOCIONES Y SORTEOS</h5>
                </div>
                <div class="ml-md-auto py-2 py-md-0">

                    <a class="btn btn-success btn-round ml-auto" data-toggle="tooltip" data-original-title="Ingresar"
                        href="{{ route('promocion.create') }}"><i class="fa fa-plus"></i> Ingresar promoción</a>
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="row mt--2">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">

                        <h4 class="card-title"></h4>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-pills nav-secondary nav-pills-no-bd" id="pills-tab-without-border"
                            role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-home-tab-nobd" data-toggle="pill"
                                    href="#pills-home-nobd" role="tab" aria-controls="pills-home-nobd"
                                    aria-selected="true">Promociones</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" id="pills-contact-tab-nobd" data-toggle="pill"
                                    href="#pills-contact-nobd" role="tab" aria-controls="pills-contact-nobd"
                                    aria-selected="false">Clientes con promociones</a>
                            </li>
                        </ul>
                        <div class="tab-content mt-2 mb-3" id="pills-without-border-tabContent">
                            <div class="tab-pane fade show active" id="pills-home-nobd" role="tabpanel"
                                aria-labelledby="pills-home-tab-nobd">
                                <div class="table-responsive">
                                    <table id="basic-datatables" class="display table table-striped table-hover add-row">
                                        <thead>
                                            <tr>
                                                <th style="width: 10%">Action</th>
                                                <th scope="col">#</th>
                                                <th scope="col">Titulo</th>
                                                <th scope="col">Descripción</th>
                                                <th scope="col">Servicio</th>
                                                <th scope="col">Fecha Desde</th>
                                                <th scope="col">Fecha Hasta</th>
                                                <th scope="col">Estado</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($promocion as $promocion)

                                                <tr data-id="{{ $promocion->id }}">

                                                    <td>
                                                        <div class="form-button-action">
                                                            <a class="btn btn-link btn-primary btn-lg" data-toggle="tooltip"
                                                                data-original-title="Editar"
                                                                href="{{ route('promocion.edit', $promocion->id) }}"><i
                                                                    class="fa fa-edit"></i></a>
                                                            <a class="btn btn-link btn-warning btn-eliminar"
                                                                data-toggle="tooltip" data-original-title="Eliminar Novedad"
                                                                data-json='{"id":"{{ $promocion->id }}","action":"promocion"}'
                                                                rel="action"><i class="fas fa-times"></i></a>
                                                            <a class="btn btn-link btn-primary btn-lg" data-toggle="tooltip"
                                                                data-original-title="Editar"></a>
                                                        </div>
                                                    </td>
                                                    <td>{{ $promocion->id }}</td>


                                                    <td>{{ $promocion->titulo }}</td>
                                                    <td>{{ $promocion->descripcion }}</td>
                                                    <td>
                                                        @if ($promocion->servicio === 1)

                                                            <span class="badge badge-success">Radio</span>
                                                        @else
                                                            <span class="badge badge-danger">Fibra</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $promocion->fechainicio }}</td>

                                                    <td>{{ $promocion->fechafinal }}</td>
                                                    <td>
                                                        @if ($promocion->status === 1)

                                                            <span class="badge badge-success">Activo</span>
                                                        @else
                                                            <span class="badge badge-danger">Inactivo</span>
                                                        @endif
                                                    </td>

                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="pills-contact-nobd" role="tabpanel"
                                aria-labelledby="pills-contact-tab-nobd">
                                <div class="table-responsive">
                                    <table id="basic-datatables" class="display table table-striped table-hover add-row">
                                        <thead>
                                            <tr>
                                                <th style="width: 10%">Action</th>
                                                <th scope="col">#</th>
                                                <th scope="col">Contrato</th>
                                                <th scope="col">#CODIGO_DE_DOCUMENTO</th>
                                                <th scope="col">Cliente</th>
                                                <th scope="col">Cédula</th>
                                                <th scope="col">Titulo</th>
                                                <th scope="col">Descripción</th>
                                                <th scope="col">Servicio</th>
                                                <th scope="col">Fecha Desde</th>
                                                <th scope="col">Fecha Hasta</th>
                                                <th scope="col">Estado</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($promocioncliente as $promocion)

                                                <tr data-id="{{ $promocion->id }}">

                                                    <td>
                                                        <div class="form-button-action">
                                                            <a class="btn btn-link btn-warning btn-eliminar"
                                                                data-toggle="tooltip"
                                                                data-original-title="Eliminar Promoción"
                                                                data-json='{"id":"{{ $promocion->id }}","action":"cliente"}'
                                                                rel="action"><i class="fas fa-times"></i></a>
                                                        </div>
                                                    </td>
                                                    <td>{{ $promocion->promocion->id }}</td>
                                                    <td>{{ $promocion->cclicontratocliente->contratocodigo }}</td>
                                                    <td>{{ $promocion->cclicontratocliente->documentocodigo }}</td>
                                                    <td>{{ $promocion->cclicontratocliente->cliente->nombre }}
                                                        {{ $promocion->cclicontratocliente->cliente->apellido }}</td>
                                                    <td>{{ $promocion->cclicontratocliente->cliente->cedula }}</td>
                                                    <td>{{ $promocion->promocion->titulo }}</td>
                                                    <td>{{ $promocion->promocion->descripcion }}</td>
                                                    <td>
                                                        @if ($promocion->promocion->servicio === 1)

                                                            <span class="badge badge-success">Radio</span>
                                                        @else
                                                            <span class="badge badge-danger">Fibra</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $promocion->promocion->fechainicio }}</td>

                                                    <td>{{ $promocion->promocion->fechafinal }}</td>
                                                    <td>
                                                        @if ($promocion->promocion->status === 1)

                                                            <span class="badge badge-success">Activo</span>
                                                        @else
                                                            <span class="badge badge-danger">Inactivo</span>
                                                        @endif
                                                    </td>

                                                </tr>
                                            @endforeach


                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header no-bd">
                                            <h3 class="modal-title">
                                                <span class="fw-mediumbold">
                                                </span>
                                                <label class="badge badge-warning">Anular Promoción</label>
                                                <span class="fw-light">

                                                </span>
                                            </h3>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="small">Estas seguro que quieres anular Promoción ?</p>
                                            <form method="POST" action="{{ route('promocion.destroy', 0) }}">
                                                <div class="row">
                                                    @csrf
                                                    @method('delete')
                                                    <input type="hidden" name="id" id="cidd" value="">
                                                    <div class="col-sm-12">
                                                        <div class="form-group form-group-default">
                                                            <label>Nombre</label>
                                                            <input id="descripcion" type="text" disabled
                                                                class="form-control" placeholder="Nombre Apellidos">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 pr-0">
                                                        <div class="form-group form-group-default">
                                                            <label>Descripción</label>

                                                            <input type="text" name="cedula" id="ccedula" disabled
                                                                class="form-control" placeholder="Cedula">
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="modal-footer no-bd">

                                                    <button type="button" class="btn btn-success"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" id="addRowButton"
                                                        class="btn btn-warning">Eliminar</button>

                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="addRowModall" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header no-bd">
                                            <h3 class="modal-title">
                                                <span class="fw-mediumbold">
                                                </span>
                                                <label class="badge badge-warning">Anular Promoción</label>
                                                <span class="fw-light">

                                                </span>
                                            </h3>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="small">Estas seguro que quieres eliminar Promocion ?</p>
                                            <form method="POST" action="{{ route('promociondetalle.destroy', 0) }}">
                                                <div class="row">
                                                    @csrf
                                                    @method('delete')
                                                    <input type="hidden" name="id" class="cidd" value="">
                                                    <div class="col-sm-12">
                                                        <div class="form-group form-group-default">
                                                            <label>Nombre Y Apellido</label>
                                                            <input type="text" disabled class="form-control descripcion"
                                                                placeholder="Nombre Apellidos">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 pr-0">
                                                        <div class="form-group form-group-default">
                                                            <label>Cedula</label>

                                                            <input type="text" name="cedula" disabled
                                                                class="form-control ccedula" placeholder="Cedula">
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="modal-footer no-bd">

                                                    <button type="button" class="btn btn-success"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" id="addRowButton"
                                                        class="btn btn-warning">Eliminar</button>

                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection

@section('scripts')
    <script>
        $(document).ready(function() {

            $('.conteinerr').on('click', 'a[rel="action"]', function() {

                var data = $(this).data('json'),
                    action = data.action,
                    id = data.id;

                if (action === 'cliente') {
                    var nombreapellido = $(this).parents('tr').children('td').eq(2).html();
                    var cedula = $(this).parents('tr').children('td').eq(3).html();
                    var direccion = $(this).parents('tr').children('td').eq(10).html();
                    $('.descripcion').val(nombreapellido);
                    $('.cidd').val(id);
                    $('.ccedula').val(cedula);
                    $('.cdireccion').val(direccion);

                    $('#addRowModall').modal();

                } else {
                    var nombreapellido = $(this).parents('tr').children('td').eq(2).html();
                    var cedula = $(this).parents('tr').children('td').eq(3).html();
                    var direccion = $(this).parents('tr').children('td').eq(10).html();
                    $('#descripcion').val(nombreapellido);
                    $('#cidd').val(id);
                    $('#ccedula').val(cedula);
                    $('#cdireccion').val(direccion);

                    $('#addRowModal').modal();
                }



            });
        });
    </script>
@endsection
