@extends('layouts.template')
@section('title', 'Recepción de Novedades')
@section('content')


    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h1 class="text-white title-it"> <i class="fas fa-phone-square"></i>
                        CREAR NOVEDAD</h1>

                    <h5 class="text-white op-7 mb-2"><i class="icon-globe"></i> RECEPCIÓN</h5>
                </div>
                <div class="ml-md-auto py-2 py-md-0">

                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="row mt--2">
            <div class="col-md-12">
                <div class="card full-height">
                    <div class="card-body">
                        <div class="card-title"><i class="fas fa-align-justify"></i> Novedad</div>
                        <div class="card-category"><i class="fas fa-server"></i> Registro</div>
                        <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">


                            <form action="{{ route('novedads.store') }}" method="POST" class="form-control form-createe">
                                <!--estogenera el token de validacion  -->
                                @csrf
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="cliente_id">Nombre-Apellido-Cedula-Contrato:</label>
                                            <select class="chosen-select form-control" id="cclicontratocliente_idddd"
                                                name="cclicontratocliente_id" data-placeholder="Sucursal">
                                                <option value="" selected disabled hidden>Seleccione Los datos del cliente
                                                </option>
                                                @foreach ($clientes as $cliente)
                                                    <option value="{{ $cliente->id }}"
                                                        data-cjson='{"cedula":"{{ $cliente->cliente->cedula }}"
                                                                            ,"contacto":"{{ $cliente->contacto }}"
                                                                            ,"cdaorecinto":
                                                                            "{{ $cliente->canton->provincia->name }}:{{ $cliente->canton->name }}:{{ $cliente->cdaorecinto }}:{{ $cliente->direccion }}"
                                                                            ,"contacto1":"{{ $cliente->contacto1 }}" 
                                                                            ,"email":"{{ $cliente->cliente->email }}"
                                                                            ,"servicio":
                                                                            @if ($cliente->servicio == 1) "Radio" @else "Fibra" @endif
                                                                            ,"nombre":"{{ $cliente->cliente->nombre }}"}'>
                                                        {{ $cliente->cliente->nombre }}
                                                        {{ $cliente->cliente->apellido }} :
                                                        {{ $cliente->cliente->cedula }} {{ $cliente->contratocodigo }}

                                                        
                                                    </option>
                                                @endforeach

                                            </select>
                                            @error('cclicontratocliente_id')
                                                <div class="alert alert-danger" role="alert">
                                                    <small>{{ $message }}</small>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="servicio">Servicio:</label>
                                            <input type="text" name="servicio" id="servicio" class="form-control" disabled
                                                placeholder="GPS" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="cedula">Cantacto 1:</label>
                                            <input type="text" name="contacto" disabled id="contacto"
                                                onKeyPress="return soloNumeros(event)" class="form-control"
                                                placeholder="Contacto 1" value="">

                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="cedula">Cantacto 2:</label>
                                            <input type="text" name="contacto1" disabled id="contacto1"
                                                onKeyPress="return soloNumeros(event)" class="form-control"
                                                placeholder="Contacto 2" value="">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="cedula">Correo Electronico:</label>
                                            <input type="email" name="email" id="email" disabled class="form-control"
                                                placeholder="Correo Electronico" value="">

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group">
                                            <label for="cedula">Provincia-Cantón: Cdla o Recinto - Dirección:</label>

                                            <input type="text" name="cdaorecinto" id="cdaorecinto" disabled
                                                class="form-control" placeholder="Cdla o Recinto-Dirección" value="">

                                        </div>
                                    </div>
                                    <div class="col-md-4">


                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="fechavisita">Fecha de visita:</label>
                                            <input type="date" name="fechavisita" id="fechavisita" class="form-control"
                                                placeholder="Correo Electronico" value="">

                                            @error('fechavisita')
                                                <div class="alert alert-danger" role="alert">
                                                    <small>{{ $message }}</small>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="horavisita">Hora de visita:</label>
                                            <input type="time" name="horavisita" id="horavisita" class="form-control"
                                                placeholder="Correo Electronico" value="">

                                            @error('horavisita')
                                                <div class="alert alert-danger" role="alert">
                                                    <small>{{ $message }}</small>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="novedadopercance">Novedad o Percance:</label>
                                    <select class="chosen-select form-control" name="novedadopercance"
                                        data-placeholder="Sucursal">
                                        <option value="" selected disabled hidden>Seleccione alguna Novedad</option>

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
                                <div class="form-group">
                                    <label for="especificar">Especificar:</label>
                                    <textarea rows="5" class="form-control" name="especificar"
                                        placeholder="Si elige otros por favor especificar">Sin especificar</textarea>
                                    @error('especificar')
                                        <div class="alert alert-danger" role="alert">
                                            <small>{{ $message }}</small>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <div class="card full-height">
                                        <div class="card-header">
                                            <div class="card-title">
                                                <i class="fas fa-list-ul"> Referencias Familiares</i>
                                            </div>
                                        </div>

                                        <div class="card-body">
                                            <time class="date" datetime="9-25">1)</time>
                                            <hr>
                                            <div class="row">
                                                <div class="col-12 col-md-6">
                                                    <ol class="activity-feed">
                                                        <li class="feed-item feed-item-success">
                                                            <div class="row">

                                                                <time class="date" datetime="9-25">Nombre</time>
                                                                <input type="text" name="nombre"
                                                                    onKeyPress="return sololetrascoma(event)"
                                                                    class="form-control input-border-bottom"
                                                                    placeholder="Nombre: no requerido"
                                                                    value="{{ old('nombre') }}">
                                                                @error('rnombre')
                                                                    <div class="alert alert-danger" role="alert">
                                                                        <small>{{ $message }}</small>
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </li>


                                                        <li class="feed-item feed-item-primary">
                                                            <div class="row">
                                                                <time class="date" datetime="9-25">Parantesco</time>
                                                                <input type="text" name="parentesco"
                                                                    class="form-control input-border-bottom"
                                                                    placeholder="Parantesco: no requerido"
                                                                    value="{{ old('parentesco') }}">
                                                                @error('parentesco')
                                                                    <div class="alert alert-danger" role="alert">
                                                                        <small>{{ $message }}</small>
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </li>



                                                    </ol>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <ol class="activity-feed">
                                                        <li class="feed-item feed-item-secondary">
                                                            <div class="row">
                                                                <time class="date" datetime="9-25">Celular</time>
                                                                <input type="text" name="celular"
                                                                    class="form-control input-border-bottom"
                                                                    placeholder="Contacto: no requerido "
                                                                    value="{{ old('celular') }}"
                                                                    onKeyPress="return soloNumeros(event)" minlength="10"
                                                                    maxlength="10">
                                                                @error('celular')
                                                                    <div class="alert alert-danger" role="alert">
                                                                        <small>{{ $message }}</small>
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </li>
                                                    </ol>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="ml-md-auto py-2 py-md-0">
                                    <a href="javascript: history.go(-1)" class="btn btn-danger btn-border btn-round mr-2"><i
                                            class="fas fa-reply"></i>
                                        Volver</a>
                                    <button class="btn btn-success btn-border btn-round mr-2" type="submit"><i
                                            class="fas fa-save"></i> Ingresar</button>
                                </div>



                            </form>

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
            mes = '0' + mes //agrega cero si el menor de 10
        if (minut < 10)
            minut = '0' + minut; //agrega cero si el menor de 10
        var fechaactualversion = ano + "-" + mes + "-" + dia;
        document.getElementById('fechavisita').value = ano + "-" + mes + "-" + dia;
        document.getElementById('horavisita').value = hora + ":" + minut;

        $('#fechavisita').change(function() {
            if ($('#fechavisita').val() < fechaactualversion) {
                swal("Información!", "Ingresar fecha correcta para la visita", {
                    icon: "info",
                    buttons: {
                        confirm: {
                            className: 'btn btn-info'
                        }
                    },
                });
                document.getElementById('fechavisita').value = ano + "-" + mes + "-" + dia;


            }
        });

        $('#alert_demo_7').click(function(e) {
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                buttons: {
                    confirm: {
                        text: 'Yes, delete it!',
                        className: 'btn btn-success'
                    },
                    cancel: {
                        visible: true,
                        className: 'btn btn-danger'
                    }
                }
            }).then((Delete) => {
                if (Delete) {
                    swal({
                        title: 'Deleted!',
                        text: 'Your file has been deleted.',
                        type: 'success',
                        buttons: {
                            confirm: {
                                className: 'btn btn-success'
                            }
                        }
                    });
                } else {
                    swal.close();
                }
            });
        });

        $('#cclicontratocliente_idddd').change(function() {
            var cliente = $('#cclicontratocliente_idddd option:selected').data('cjson');
            $('#contacto').val(cliente.contacto);
            //           $('#direccion').val(cliente.direc);

            $('#email').val(cliente.email);

            $('#servicio').val(cliente.servicio);
            $('#contacto1').val(cliente.contacto1);
            $('#cdaorecinto').val(cliente.cdaorecinto);

        });
    </script>
@endsection
