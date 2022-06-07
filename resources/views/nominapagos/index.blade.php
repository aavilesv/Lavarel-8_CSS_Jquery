@extends('layouts.template')
@section('title', 'Listado de Nominas de Pago')
@section('content')
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h1 class="text-white title-it"><i class="flaticon-agenda-1"></i> Nomina de Pagos</h1>
                    <h5 class="text-white op-7 mb-2"><i class="far fa-calendar-alt"></i> Nomina</h5>
                </div>
                <div class="ml-md-auto py-2 py-md-0">
                    @if ($buscarincial === '')  
                     <a class="btn btn-primary btn-round ml-auto" data-toggle="tooltip" 
                      data-original-title="Imprimir todos los registros" 
                      target="_blank"href="{{ route('pdfnominatotal.nominapdfall') }}">
                      <i class="icon-printer"></i> Imprimir</a>
                    @else <a class="btn btn-primary btn-round ml-auto" data-toggle="tooltip" 
                    data-original-title="Desde {{ $buscarincial }} hasta {{ $buscarfinal }}" target="_blank"
                     href="{{ route('pdfnominalista.nominapdlista',[$buscarincial, $buscarfinal]) }}">
                     <i class="icon-printer"></i> Imprimir</a>   @endif
                    <a class="btn btn-success btn-round ml-auto" data-toggle="tooltip" data-original-title="Ingresar" href="{{ route('nominapago.create') }}"><i class="fa fa-plus"></i> Ingresar</a>
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="row mt--2">
            <div class="col-md-12">
                <div class="card full-height">
                    <div class="card-body">
                        <div class="card-title"><i class="far fa-list-alt"></i> Roles</div>
                        <div class="card-category"><i class="fab fa-creative-commons-nd"></i> Roles de pagos de Empleados
                            Registrados</div>
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

                        <div class="collapse" id="search-nav">
                            <form class="navbar-left navbar-form nav-search mr-md-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <button type="submit" class="btn btn-search pr-1">
                                            <i class="fa fa-search search-icon"></i>
                                        </button>
                                    </div>
                                    <input type="text" placeholder="Buscar por Apellido" name="apellido"
                                        class="form-control">
                                </div>
                            </form>
                        </div>
                        @if ($buscarincial != '')  
                        <br>
                        <a class="btn btn-success btn-round ml-auto" data-toggle="tooltip" data-original-title="Refrescar" href="{{ route('nominapago.index') }}"><i class="fa fa-plus"></i> Recargar pagina</a>
                        <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                            <div class="table-responsive"> 
                                <div class="alert alert-primary" role="alert">
                                  Busquedad      <h5 style="text-align: center;">
                                     Desde {{ $buscarincial }}  hasta
                                         {{ $buscarfinal }}</h5>

                                  </div>
                                <table cellspacing="0" width="100%" class="display table table-striped table-hover 
                                        table-head-bg-info  nowrap">

                                    <thead>
                                        <tr>
                                            <th width="100%">#</th>
                                            <th width="100%">Empleado</th>
                                            <th scope="col">Sueldo</th>
                                            <th scope="col">Horas extras</th>
                                            <th scope="col">Comisionees</th>
                                            <th scope="col">Días Laborales</th>
                                            <th scope="col">Líquido </th>
                                            <th scope="col">Prestamos quirogra iess</th>
                                            <th scope="col">Descuentos de internet</th>
                                            <th scope="col">Aporte al IESS</th>
                                            <th scope="col">Prestamos y Anticipos</th>
                                            <th scope="col">Total Descuentos</th>
                                            <th scope="col">Fecha-Hora</th>
                                            <th scope="col">Archivo</th>

                                            <th style="width: 10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($nominas as $provincia)
                                            <tr data-id="{{ $provincia->id }}">
                                                <td>{{ $provincia->id }}</td>
                                                <td width="100%">{{ $provincia->rrhempleado->nombre }}
                                                    {{ $provincia->rrhempleado->apellido }}</td>
                                                <td>{{ $provincia->sueldo }}</td>
                                                <td>{{ $provincia->horasextras }}</td>
                                                <td>{{ $provincia->comisiones }}</td>
                                                <td>{{ $provincia->dialaborales }}</td>
                                                <td>{{ $provincia->liquido }}</td>
                                                <td>{{ $provincia->prestamosquirogramaiess }}</td>
                                                <td>{{ $provincia->descuentosinternet }}</td>

                                                <td>{{ $provincia->aporteiess }}</td>
                                                <td>{{ $provincia->prestamosyanticipos }}</td>
                                                <td>{{ $provincia->totaldescuentos }}</td>
                                                <td>{{ $provincia->created_at }}</td>
                                                <td>
                                                    <a class="btn btn-link btn-primary btn-lg" target="_blank"
                                                        data-toggle="tooltip" data-original-title="Ver"
                                                        href="{{ asset($provincia->archivo) }}"><i
                                                            class="fas fa-file-alt"></i></a>
                                                </td>
                                                <td>


                                                    <div class="form-button-action">
                                                        <a class="btn btn-link btn-info btn-lg" data-toggle="tooltip"
                                                            data-original-title="Imprimir registro" target="_blank"
                                                            href="{{ route('pdfnominaone.nominaone', $provincia->id) }}"><i
                                                                class="icon-printer"></i></a>
                                                        <a class="btn btn-link btn-primary btn-lg" data-toggle="tooltip"
                                                            data-original-title="Editar"
                                                            href="{{ route('nominapago.edit', $provincia->id) }}"><i
                                                                class="fa fa-edit"></i></a>


                                                    </div>
                                                </td>

                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                {{ $nominas->links() }}


                            </div>
                        </div>
                        @endif
                        
                        <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                            <div class="table-responsive">
                                <table cellspacing="0" width="100%" class="display table table-striped table-hover 
                                        table-head-bg-primary  nowrap">

                                    <thead>
                                        <tr>
                                            <th width="100%">#</th>
                                            <th width="100%">Empleado</th>
                                            <th scope="col">Sueldo</th>
                                            <th scope="col">Horas extras</th>
                                            <th scope="col">Comisionees</th>
                                            <th scope="col">Días Laborales</th>
                                            <th scope="col">Líquido </th>
                                            <th scope="col">Prestamos quirogra iess</th>
                                            <th scope="col">Descuentos de internet</th>
                                            <th scope="col">Aporte al IESS</th>
                                            <th scope="col">Prestamos y Anticipos</th>
                                            <th scope="col">Total Descuentos</th>
                                            <th scope="col">Fecha-Hora</th>
                                            <th scope="col">Archivo</th>

                                            <th style="width: 10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($nominass as $provincia)
                                            <tr data-id="{{ $provincia->id }}">
                                                <td>{{ $provincia->id }}</td>
                                                <td width="100%">{{ $provincia->rrhempleado->nombre }}
                                                    {{ $provincia->rrhempleado->apellido }}</td>
                                                <td>{{ $provincia->sueldo }}</td>
                                                <td>{{ $provincia->horasextras }}</td>
                                                <td>{{ $provincia->comisiones }}</td>
                                                <td>{{ $provincia->dialaborales }}</td>
                                                <td>{{ $provincia->liquido }}</td>
                                                <td>{{ $provincia->prestamosquirogramaiess }}</td>
                                                <td>{{ $provincia->descuentosinternet }}</td>

                                                <td>{{ $provincia->aporteiess }}</td>
                                                <td>{{ $provincia->prestamosyanticipos }}</td>
                                                <td>{{ $provincia->totaldescuentos }}</td>
                                                <td>{{ $provincia->created_at }}</td>
                                                <td>
                                                    <a class="btn btn-link btn-primary btn-lg" target="_blank"
                                                        data-toggle="tooltip" data-original-title="Ver"
                                                        href="{{ asset($provincia->archivo) }}"><i
                                                            class="fas fa-file-alt"></i></a>
                                                </td>
                                                <td>


                                                    <div class="form-button-action">
                                                        <a class="btn btn-link btn-info btn-lg" data-toggle="tooltip"
                                                            data-original-title="Imprimir registro" target="_blank"
                                                            href="{{ route('pdfnominaone.nominaone', $provincia->id) }}"><i
                                                                class="icon-printer"></i></a>
                                                        <a class="btn btn-link btn-primary btn-lg" data-toggle="tooltip"
                                                            data-original-title="Editar"
                                                            href="{{ route('nominapago.edit', $provincia->id) }}"><i
                                                                class="fa fa-edit"></i></a>


                                                    </div>
                                                </td>

                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                {{ $nominass->links() }}

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
        var fecha = new Date();
        var mes = fecha.getMonth() + 1; //obteniendo mes
        var dia = fecha.getDate(); //obteniendo dia
        var ano = fecha.getFullYear(); //obteniendo año
        var hora = fecha.getHours(); //obteniendo año
        var minut = fecha.getMinutes(); //obteniendo año

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
                swal("Información!", "Ingresar fecha final mayor a fecha inicial", {
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
                swal("Información!", "Ingresar fecha inicial menor a fecha final", {
                    icon: "info",

                    buttons: {
                        confirm: {
                            className: 'btn btn-info'
                        }
                    },
                });
            }
            //$('#cdaorecinto').val(cliente.cdaorecinto);

        });

    </script>
@endsection
