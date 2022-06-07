@extends('layouts.template')
@section('title', 'Reporte de fibra')
@section('content')


    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h1 class="text-white title-it"><i class="icon-speedometer"></i> REPORTE DE FIBRA

                    </h1>

                    <h5 class="text-white op-7 mb-2"><i class="far fa-building"></i> Soporte Tecnico</h5>
                </div>

                <div class="ml-md-auto py-2 py-md-0">

                    @if ($novedadopercance != '')
                        <a class="btn btn-primary btn-round ml-auto" data-toggle="tooltip"
                            data-original-title="Imprimir solo {{ $novedadopercance }}" target="_blank"
                            href="{{ route('pdffreportefibranovedad.soportegetonefibranovedad',$novedad) }}">
                            
                            <i class="icon-printer"></i> Imprimir</a>
                    @elseif ($buscarincial === '')
                            
                            <a class="btn btn-primary btn-round ml-auto" data-toggle="tooltip"
                            data-original-title="Imprimir todos los reportes de fibra" target="_blank"
                            href="{{ route('pdffreportefibra.soporteallfibra') }}">
                            <i class="icon-printer"></i> Imprimir</a>
                    @else <a class="btn btn-primary btn-round ml-auto" data-toggle="tooltip"
                    data-original-title="Desde {{ $buscarincial }}  hasta {{ $buscarfinal }}" target="_blank"
                    href="{{ route('pdfffehcareportefibra.soporteallgetfechafibra', [$buscarincial, $buscarfinal]) }}">
                    <i class="icon-printer"></i> Imprimir</a>
                    
                    @endif


                </div>
            </div>
        </div>
    </div>

    <div class="page-inner mt--5">
        <div class="row mt--2">
            <div class="col-md-12">
                <div class="card full-height">
                    <div class="card-body">
                        <div class="card-title"><i class="far fa-list-alt"></i> Listado</div>
                        <div class="card-category"><i class="fab fa-creative-commons-nd"></i> Reportes Registrados</div>



                        
                        <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                            <div class="container m-10">
                                <div class="form-button-action">
                                    <div class="row">
                                        <div @if ($novedadopercance != '' or $buscarincial != '') class="col-md-10"  @else class="col-md-12" @endif>
                                            <form class="navbar-left navbar-form nav-search mr-md-3">
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
                                                <div class="input-group">
                                                    
                                                    <div class="form-group">
                                                        <input type="hidden" name="novedad" value="yo">
                                                        <label for="novedadopercance">Novedad o Percance:</label>
                                                        <select class="chosen-select form-control" name="novedadopercance" data-placeholder="Sucursal">
                                                           
                                                            @if ($novedadopercance != '')
                                                            we
                                                            <option value="{{$novedadopercance}}">Seleccionado :{{$novedadopercance}}</option>
                                                            @else 
                                                            <option value="" selected disabled hidden>Seleccione alguna Novedad</option>
                                                            @endif
                                                            <option value="1">Instalación</option>
                                                            <option value="2">Retiro de Equipo</option>
                                                            <option value="3">Reinstalación</option>
                                                            <option value="4">Intermitente</option>
                                                            <option value="5">Lento</option>
                                                            <option value="6">Desconf. Router</option>
                                                            <option value="7">Cable. Dañado</option>
                                                            <option value="8">Problema Equipos</option>
                                                            <option value="9">Sin servicio</option>
                                                            <option value="10">Otros</option>
                                                        </select>
                                                        @error('novedadopercance')
                                                            <div class="alert alert-danger" role="alert">
                                                                <small>{{ $message }}</small>
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        @if ($novedadopercance != '' or $buscarincial != '')
                                            <div class="col-md-2">
                                                <a href="{{ route('reporteradio.index') }}" data-toggle="tooltip"
                                                    data-original-title="Recargar Pagina" class="btn btn-success btn-round">
                                                    <i class="icon-reload"> Recargar</i>
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="table-responsive">
                                <table id="add-row" cellspacing="0" width="100%"
                                    class="display table table-striped table-hover add-row nowrap">
                                    <thead>
                                        <tr>
                                            <th style="width: 10%">Action</th>
                                            <th scope="col">#</th>
                                            <th scope="col">Cliente:</th>
                                            <th scope="col">Novedad:</th>
                                            <th scope="col">Técnico:</th>
                                            <th scope="col">Fecha</th>
                                            <th scope="col">Hora de llegada</th>
                                            <th scope="col">Hora de salida</th>
                                            <th scope="col">Onu -Configuración</th>
                                            <th scope="col">Router -Configuración</th>
                                            <th scope="col">Cambio clave wifi -Configuración</th>
                                            <th scope="col">Router-Actualización</th>
                                            <th scope="col">DBM -Instalación</th>
                                            <th scope="col">Upc -Instalación</th>
                                            <th scope="col">APC -Instalación</th>
                                            <th scope="col">ODB -Instalación</th>
                                            <th scope="col">Conectores -Instalación</th>
                                            <th scope="col">Router -Instalación</th>
                                            <th scope="col">Cable de Red -Instalación</th>
                                            <th scope="col">Onu Anterior -Instalación</th>
                                            <th scope="col">Cable fibra -Instalación</th>
                                            <th scope="col">N° Conectores -Instalación</th>
                                            <th scope="col">N° y Marca del Router -Instalación</th>
                                            <th scope="col">Onu Nueva -Instalación</th>
                                            <th scope="col">Metros de Cable Fibra -Instalación</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($fibraa as $fibr)
                                        @if ($numeropercance  == $fibr->novedad->novedadopercance )
                                            <tr data-id="{{ $fibr->id }}">
                                                <td>
                                                    <div class="form-button-action">
                                                        <a class="btn btn-link btn-info btn-lg" data-toggle="tooltip"
                                                            data-original-title="Imprimir registro" target="_blank"
                                                            href="{{ route('pdffreportefibra.soportegetonefibra', $fibr->id) }}"><i
                                                                class="icon-printer"></i></a>
                                                    </div>
                                                </td>
                                                <td>{{ $fibr->id }}
                                                </td>
                                                <td> {{ $fibr->novedad->cclicontratocliente->cliente->nombre }}-
                                                    {{ $fibr->novedad->cclicontratocliente->cliente->apellido }}
                                                </td>
                                                <td>
                                                    @if ($fibr->novedad->novedadopercance === 1)

                                                        <span class="badge badge-success">Instalaci贸n</span>
                                                    @elseif($fibr->novedad->novedadopercance === 2)
                                                        <span class="badge badge-info">Retiro de Equipo</span>
                                                    @elseif($fibr->novedad->novedadopercance === 3)
                                                        <span class="badge badge-warning">Reinstalaci贸n</span>
                                                    @elseif($fibr->novedad->novedadopercance === 4)
                                                        <span class="badge badge-danger">Intermitente</span>
                                                    @elseif($fibr->novedad->novedadopercance === 5)
                                                        <span class="badge badge-info">Lento</span>
                                                    @elseif($fibr->novedad->novedadopercance === 6)
                                                        <span class="badge badge-warning">Desconf. Router</span>
                                                    @elseif($fibr->novedad->novedadopercance === 7)
                                                        <span class="badge badge-warning">Cable. Da帽ado</span>
                                                    @elseif($fibr->novedad->novedadopercance === 8)
                                                        <span class="badge badge-info">Problema de Equipos</span>
                                                    @elseif($fibr->novedad->novedadopercance === 9)
                                                        <span class="badge badge-info">Sin servicio</span>
                                                    @elseif($fibr->novedad->novedadopercance === 10)
                                                        <span class="badge badge-info">Otros</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $fibr->usuario }}
                                                </td>
                                                <td>{{ $fibr->fecha }}</td>
                                                <td>{{ $fibr->horallegada }}</td>
                                                <td>{{ $fibr->horasalida }}</td>
                                                <td style="text-align: center;">
                                                    @if ($fibr->conu == 1)
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="flexCheckChecked"
                                                            style="background-color: blue; background: blue;" checked
                                                            disabled>
                                                    @endif


                                                </td>
                                                <td style="text-align: center;">
                                                    @if ($fibr->crouter == 1)
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="flexCheckChecked"
                                                            style="background-color: blue; background: blue;" checked
                                                            disabled>
                                                    @endif
                                                </td>
                                                <td style="text-align: center;">
                                                    @if ($fibr->ccambiowiffi == 1)
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="flexCheckChecked"
                                                            style="background-color: blue; background: blue;" checked
                                                            disabled>
                                                    @endif
                                                </td>
                                                <td style="text-align: center;">
                                                    @if ($fibr->arouter == 1)
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="flexCheckChecked"
                                                            style="background-color: blue; background: blue;" checked
                                                            disabled>
                                                    @endif
                                                </td>
                                                <td style="text-align: center;">{{ $fibr->idbm }}</td>
                                                <td style="text-align: center;">{{ $fibr->iupc }}</td>
                                                <td style="text-align: center;">{{ $fibr->iapc }}</td>
                                                <td style="text-align: center;">{{ $fibr->iodb }}</td>
                                                <td style="text-align: center;">
                                                    @if ($fibr->iconectores == 1)
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="flexCheckChecked"
                                                            style="background-color: blue; background: blue;" checked
                                                            disabled>
                                                    @endif
                                                </td>
                                                <td style="text-align: center;">
                                                    @if ($fibr->irouter == 1)
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="flexCheckChecked"
                                                            style="background-color: blue; background: blue;" checked
                                                            disabled>
                                                    @endif
                                                </td>
                                                <td style="text-align: center;">
                                                    @if ($fibr->icablered == 1)
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="flexCheckChecked"
                                                            style="background-color: blue; background: blue;" checked
                                                            disabled>
                                                    @endif
                                                </td>
                                                <td style="text-align: center;">{{ $fibr->ionuanterior }}</td>
                                                <td style="text-align: center;">
                                                    @if ($fibr->icablefibra == 1)
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="flexCheckChecked"
                                                            style="background-color: blue; background: blue;" checked
                                                            disabled>
                                                    @endif
                                                </td>
                                                <td style="text-align: center;">{{ $fibr->inconectores }}</td>
                                                <td style="text-align: center;">{{ $fibr->inmarcadelrouter }}</td>
                                                <td style="text-align: center;">{{ $fibr->ionunueva }}</td>
                                                <td style="text-align: center;">{{ $fibr->imetroscable }}</td>




                                            </tr>
                                            @endif
                                            @if ($numeropercance == '' )

                                            <tr data-id="{{ $fibr->id }}">
                                                <td>
                                                    <div class="form-button-action">
                                                        <a class="btn btn-link btn-info btn-lg" data-toggle="tooltip"
                                                            data-original-title="Imprimir registro" target="_blank"
                                                            href="{{ route('pdffreportefibra.soportegetonefibra', $fibr->id) }}"><i
                                                                class="icon-printer"></i></a>
                                                    </div>
                                                </td>
                                                <td>{{ $fibr->id }}
                                                </td>
                                                <td> {{ $fibr->novedad->cclicontratocliente->cliente->nombre }}-
                                                    {{ $fibr->novedad->cclicontratocliente->cliente->apellido }}
                                                </td>
                                                <td>
                                                    @if ($fibr->novedad->novedadopercance === 1)

                                                        <span class="badge badge-success">Instalaci贸n</span>
                                                    @elseif($fibr->novedad->novedadopercance === 2)
                                                        <span class="badge badge-info">Retiro de Equipo</span>
                                                    @elseif($fibr->novedad->novedadopercance === 3)
                                                        <span class="badge badge-warning">Reinstalaci贸n</span>
                                                    @elseif($fibr->novedad->novedadopercance === 4)
                                                        <span class="badge badge-danger">Intermitente</span>
                                                    @elseif($fibr->novedad->novedadopercance === 5)
                                                        <span class="badge badge-info">Lento</span>
                                                    @elseif($fibr->novedad->novedadopercance === 6)
                                                        <span class="badge badge-warning">Desconf. Router</span>
                                                    @elseif($fibr->novedad->novedadopercance === 7)
                                                        <span class="badge badge-warning">Cable. Da帽ado</span>
                                                    @elseif($fibr->novedad->novedadopercance === 8)
                                                        <span class="badge badge-info">Problema de Equipos</span>
                                                    @elseif($fibr->novedad->novedadopercance === 9)
                                                        <span class="badge badge-info">Sin servicio</span>
                                                    @elseif($fibr->novedad->novedadopercance === 10)
                                                        <span class="badge badge-info">Otros</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $fibr->usuario }}
                                                </td>
                                                <td>{{ $fibr->fecha }}</td>
                                                <td>{{ $fibr->horallegada }}</td>
                                                <td>{{ $fibr->horasalida }}</td>
                                                <td style="text-align: center;">
                                                    @if ($fibr->conu == 1)
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="flexCheckChecked"
                                                            style="background-color: blue; background: blue;" checked
                                                            disabled>
                                                    @endif


                                                </td>
                                                <td style="text-align: center;">
                                                    @if ($fibr->crouter == 1)
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="flexCheckChecked"
                                                            style="background-color: blue; background: blue;" checked
                                                            disabled>
                                                    @endif
                                                </td>
                                                <td style="text-align: center;">
                                                    @if ($fibr->ccambiowiffi == 1)
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="flexCheckChecked"
                                                            style="background-color: blue; background: blue;" checked
                                                            disabled>
                                                    @endif
                                                </td>
                                                <td style="text-align: center;">
                                                    @if ($fibr->arouter == 1)
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="flexCheckChecked"
                                                            style="background-color: blue; background: blue;" checked
                                                            disabled>
                                                    @endif
                                                </td>
                                                <td style="text-align: center;">{{ $fibr->idbm }}</td>
                                                <td style="text-align: center;">{{ $fibr->iupc }}</td>
                                                <td style="text-align: center;">{{ $fibr->iapc }}</td>
                                                <td style="text-align: center;">{{ $fibr->iodb }}</td>
                                                <td style="text-align: center;">
                                                    @if ($fibr->iconectores == 1)
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="flexCheckChecked"
                                                            style="background-color: blue; background: blue;" checked
                                                            disabled>
                                                    @endif
                                                </td>
                                                <td style="text-align: center;">
                                                    @if ($fibr->irouter == 1)
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="flexCheckChecked"
                                                            style="background-color: blue; background: blue;" checked
                                                            disabled>
                                                    @endif
                                                </td>
                                                <td style="text-align: center;">
                                                    @if ($fibr->icablered == 1)
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="flexCheckChecked"
                                                            style="background-color: blue; background: blue;" checked
                                                            disabled>
                                                    @endif
                                                </td>
                                                <td style="text-align: center;">{{ $fibr->ionuanterior }}</td>
                                                <td style="text-align: center;">
                                                    @if ($fibr->icablefibra == 1)
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="flexCheckChecked"
                                                            style="background-color: blue; background: blue;" checked
                                                            disabled>
                                                    @endif
                                                </td>
                                                <td style="text-align: center;">{{ $fibr->inconectores }}</td>
                                                <td style="text-align: center;">{{ $fibr->inmarcadelrouter }}</td>
                                                <td style="text-align: center;">{{ $fibr->ionunueva }}</td>
                                                <td style="text-align: center;">{{ $fibr->imetroscable }}</td>




                                            </tr>
                                            @endif
                                        @endforeach

                                    </tbody>
                                </table>
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
