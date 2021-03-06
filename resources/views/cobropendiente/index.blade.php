@extends('layouts.template')
@section('title', 'Listado de cobros pendientes')
@section('content')
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h1 class="text-white title-it"><i class="fas fa-calendar-alt"></i> Clientes deudores</h1>
                    <h5 class="text-white op-7 mb-2"><i class="fas fa-money-bill-wave"></i> Cobros a Clientes</h5>
                </div>
                <div class="ml-md-auto py-2 py-md-0">
                    <a class="btn btn-success btn-round ml-auto" data-toggle="tooltip" data-original-title="Ingresar"
                        href="{{ route('cuentasporcobrar.create') }}"><i class="fa fa-plus"></i> Ingresar</a>
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="row mt--2">
            <div class="col-md-12">
                <div class="card full-height">
                    <div class="card-body">
                        <div class="card-title"><i class="far fa-list-alt"></i> Listado de Clientes</div>
                        <div class="card-category"><i class="fab fa-creative-commons-nd"></i> Listado de pagos Diarios</div>
                        {{ date('l') }}
                        <form class="navbar-left navbar-form nav-search mr-md-12">
                            <div class="form-group text">
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <time class="date" datetime="9-25"><strong>Desde</strong> </time>
                                        <input type="date" required name="fechainicial" id="fechainicial"
                                            placeholder="Search ..." value="{{ old('fechainicial', $buscarincial) }}"
                                            class="form-control">
                                    </li>
                                    <li class="list-inline-item">
                                        <time class="date" datetime="9-25"><strong>Hasta</strong></time>
                                        <input type="date" required id="fechafinal" name="fechafinal"
                                            placeholder="Search ..." value="{{ old('fechafinal', $buscarfinal) }}"
                                            class="form-control">

                                    </li>
                                    <li class="list-inline-item">

                                        <button type="submit" title="Buscar" class="btn btn-search pr-1">
                                            <i class="fa fa-search search-icon"></i>
                                        </button>

                                    </li>
                                </ul>
                            </div>
                        </form>
                        <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                            <br>
                            <div class="container">
                                <div class="form-button-action">
                                    <div class="row">
                                        <div @if ($buscador != '' or $buscarincial != '') class="col-md-10"  @else class="col-md-12" @endif>
                                            <form class="navbar-left navbar-form nav-search mr-md-3">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <button type="submit" title="Click para Buscar"
                                                            class="btn btn-search pr-1">
                                                            <i class="fa fa-search search-icon"></i>
                                                        </button>
                                                    </div>
                                                    <input type="text" placeholder="Buscador" title="Escribe para buscar"
                                                        name="buscador" value="{{ $buscador }}" class="form-control">
                                                </div>
                                            </form>
                                        </div>
                                        @if ($buscador != '' or $buscarincial != '')
                                            <div class="col-md-2">
                                                <a href="{{ route('cobropendiente.index') }}" data-toggle="tooltip"
                                                    data-original-title="Recargar Pagina" class="btn btn-success btn-round">
                                                    <i class="icon-reload"> Recargar</i>
                                                </a>
                                            </div>
                                        @endif
                                    </div>


                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="display table table-striped table-hover nowrap">
                                    <thead>
                                        <tr>
                                            <th>#Cod</th>
                                            <th>Cliente</th>
                                            <th>C??dula</th>
                                            <th>Fecha_de_pago</th>
                                            <th>Tarifa</th>
                                            <th>Saldo</th>
                                            <th>Abonado</th>
                                            <th>Estado</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($cuentascobrar as $rrhprofesion)
                                            <tr>
                                                <td class="success">{{ $rrhprofesion->id }}</td>
                                                <td>{{ $rrhprofesion->cclicontratocliente->cliente->nombre }}
                                                    -{{ $rrhprofesion->cclicontratocliente->cliente->apellido }}</td>
                                                <td>{{ $rrhprofesion->cclicontratocliente->cliente->cedula }}</td>
                                                <td>{{ $rrhprofesion->cclicontratocliente->created_at }}</td>
                                                <td>${{ $rrhprofesion->cclicontratocliente->tarifa }}</td>


                                                <td>${{ $rrhprofesion->saldo }}</td>
                                                <td>${{ $rrhprofesion->abonado }}</td>

                                                <td>
                                                    @if ($rrhprofesion->status === 1)

                                                        <span class="badge badge-success">Pagado</span>
                                                    @else
                                                        <span class="badge badge-danger">Pediente</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="form-button-action">

                                                        <a class="btn btn-link btn-success btn-lg" data-toggle="tooltip"
                                                            data-original-title="Ver"
                                                            href="{{ route('cuentasporcobrar.show', $rrhprofesion->id) }}"><i
                                                                class="fa fa-eye"></i></a>
                                                        @if ($rrhprofesion->status === 0)
                                                            <!--<a class="btn btn-link btn-primary btn-lg" data-toggle="tooltip"
                                                    data-original-title="Valor Pendiente" 
                                                   href="{{ route('cuentasporcobrar.edit', $rrhprofesion->id) }}">
                                                   <i class="fas fa-money-bill-wave"></i></a>-->
                                                        @endif


                                                    </div>
                                                </td>

                                            </tr>
                                        @empty

                                            <tr>
                                                <td colspan="10">
                                                    <center>No existen registros</center>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                {{ $cuentascobrar->appends(['buscador' => $buscador, 'buscarincial' => $buscarincial, 'buscarfinal' => $buscarfinal])->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header no-bd">
                    <h3 class="modal-title">
                        <span class="fw-mediumbold">
                        </span>
                        <label class="badge badge-warning">Registrar</label>
                        <span class="fw-light">

                        </span>
                    </h3>
                    
                </div>
                <div class="modal-body">
                    <p class="small">Registrar inicial en caja diario.</p>
                    <form method="POST" action="{{ route('diariacobro.store') }}" class="form-createe">
                        <div class="row">
                            @csrf
                            <input type="hidden" name="id" id="cid" value="">
                            <div class="col-sm-12">
                                <div class="form-group form-group-default">
                                    <label>Valores en Caja</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group form-group-default">
                                    <label>Total en Caja $</label>

                                    <input type="tele" name="saldocaja" id="saldocaja" value="0" required minlength="0"
                                       min="1" class="form-control" placeholder="Total en Caja">

                                </div>
                            </div>

                        </div>
                        <div class="modal-footer no-bd">
                            <button type="submit" id="addRowButton" class="btn btn-success">Registrar</button>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    $("#saldocaja").numeric({
        negative: false,
        decimalPlaces: 2
    });


    $(document).ready(function() {

        $('.conteinerr').on('click', 'a[rel="action"]', function() {

            var data = $(this).data('json'),
                action = data.action,
                id = data.id;

            var nombreapellido = $(this).parents('tr').children('td').eq(2).html();
            var cedula = $(this).parents('tr').children('td').eq(4).html();
            var direccion = $(this).parents('tr').children('td').eq(10).html();
            $('#descripcion').val(nombreapellido);
            $('#cidd').val(id);
            $('#ccedula').val(cedula);
            $('#cdireccion').val(direccion);

            $('#addRowModal').modal();



        });
    });

    var fecha = new Date();
    var mes = fecha.getMonth() + 1; //obteniendo mes
    var dia = fecha.getDate(); //obteniendo dia
    var ano = fecha.getFullYear(); //obteniendo a??o
    var hora = fecha.getHours(); //obteniendo a??o
    var minut = fecha.getMinutes(); //obteniendo a??o

    if (dia < 10)
        dia = '0' + dia; //agrega cero si el menor de 10
    if (mes < 10)
        mes = '0' + mes; //agrega cero si el menor de 10
    if (minut < 10)
        minut = '0' + minut; //agrega cero si el menor de 10

    if ("{{ $buscarfinal }}" === "") {
        document.getElementById('fechafinal').value = ano + "-" + mes + "-" + dia;
    }

    $('#fechafinal').change(function() {
        if ($('#fechafinal').val() < $('#fechainicial').val()) {
            $('#fechafinal').val('');
            swal("Informaci??n!", "Ingresar fecha final mayor a fecha inicial", {
                icon: "info",
                buttons: {
                    confirm: {
                        className: 'btn btn-info'
                    }
                },
            });
        }
    });
    $('#fechainicial').change(function() {
        if ($('#fechafinal').val() < $('#fechainicial').val()) {
            $('#fechainicial').val('');
            swal("Informaci??n!", "Ingresar fecha inicial menor a fecha final", {
                icon: "info",

                buttons: {
                    confirm: {
                        className: 'btn btn-info'
                    }
                },
            });
        }
    });
</script>
@endsection
