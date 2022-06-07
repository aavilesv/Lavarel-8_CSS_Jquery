@extends('layouts.template')
@section('title', 'Atención al Cliente')
@section('content')


    <div class="card">
        <div class="card-header">
            <div class="alert alert-secondary" role="alert">
                <h1 class="title-it">Atención de la novedad</h1>
            </div>
        </div>


        <div class="card-body">
            <div class="table-responsive">
                <table class="display table table-striped table-hover add-row nowrap">
                    <tr>
                        <th> Cliente:</th>
                        <td colspan="2">{{ $novedad->cclicontratocliente->cliente->nombre }}-
                            {{ $novedad->cclicontratocliente->cliente->apellido }}
                            -{{ $novedad->cclicontratocliente->contratocodigo }}</td>
                        <th> Hora de novedad:</th>
                        <td colspan="2">{{ $novedad->horainciar }}</td>
                    </tr>
                    <tr>
                        <th> Fecha de visita:</th>
                        <td colspan="2">{{ $novedad->fechavisita }}</td>
                        <th> Hora de visita:</th>
                        <td colspan="2">{{ $novedad->horavisita }}</td>
                    </tr>
                    <tr>
                        <th>Contacto 1:</th>
                        <td>{{ $novedad->cclicontratocliente->contacto }}</td>
                        <th><strong>Contacto 2:</strong></th>
                        <td> {{ $novedad->cclicontratocliente->contacto1 }}</td>
                        <th><strong>Correo electronico:</strong></th>
                        <td> {{ $novedad->cclicontratocliente->cliente->email }}</td>
                    </tr>
                    <tr>
                        <th>Novedad o percance:</th>
                        <td colspan="1">
                            @if ($novedad->novedadopercance === 1)
                                <span class="badge badge-success">Instalación</span>
                            @elseif($novedad->novedadopercance === 2)
                                <span class="badge badge-info">Retiro de Equipo</span>
                            @elseif($novedad->novedadopercance === 3)
                                <span class="badge badge-warning">Reinstalación</span>
                            @elseif($novedad->novedadopercance === 4)
                                <span class="badge badge-danger">Intermitente</span>
                            @elseif($novedad->novedadopercance === 5)
                                <span class="badge badge-info">Lento</span>
                            @elseif($novedad->novedadopercance === 6)
                                <span class="badge badge-warning">Desconf. Router</span>
                            @elseif($novedad->novedadopercance === 7)
                                <span class="badge badge-warning">Cable. Dañado</span>
                            @elseif($novedad->novedadopercance === 8)
                                <span class="badge badge-info">Problema de Equipos</span>
                            @elseif($novedad->novedadopercance === 9)
                                <span class="badge badge-info">Sin servicio</span>
                            @elseif($novedad->novedadopercance === 10)
                                <span class="badge badge-info">Otros</span>
                            @endif
                        </td>
                        <th>Provincia-Cantón:</th>
                        <td>{{ $novedad->cclicontratocliente->canton->provincia->name }}
                            -{{ $novedad->cclicontratocliente->canton->name }}
                        </td>
                        <th>Cdla o Recinto:</th>
                        <td>{{ $novedad->cclicontratocliente->cdaorecinto }}</td>
                    </tr>
                    <tr>
                        <th>
                            GPS:
                        </th>
                        <td>
                            <a class="btn btn-link btn-info btn-lg" data-toggle="tooltip"
                                data-original-title="Abrir Ubicación del cliente GPS" target="_blank"
                                href="{{ $novedad->cclicontratocliente->gps }}"><i class="fas fa-external-link-alt"></i>
                                Abrir
                                Ubicación</a>
                        </td>
                        <th>
                            Dirección:
                        </th>
                        <td colspan="3">
                            {{ $novedad->cclicontratocliente->direccion }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            Especificar:
                        </th>
                        <td colspan="5">
                            {{ $novedad->especificar }}
                        </td>
                    </tr>
                </table>
                <div class="table-responsive">
                    <table class="display table table-striped table-hover nowrap">

                        <thead>
                            <tr>
                                <th style="text-align: center;" colspan="4">
                                    <h1>Referencias Familiares para visita de soporte en casa</h1>
                                </th>
                            </tr>
                            <tr>
                                <th>Nombre</th>
                                <th>Parantesco</th>
                                <th>Celular</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td> {{ $novedad->nombre }}</td>
                                <td> {{ $novedad->parentesco }}</td>
                                <td> {{ $novedad->celular }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="table-responsive">
                    <table class="display table table-striped table-hover nowrap">

                        <thead>
                            <tr>
                                <th style="text-align: center;" colspan="4">
                                    <h1>Referencias Familiares </h1>
                                </th>
                            </tr>
                            <tr>

                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Parantesco</th>
                                <th>Celular</th>
                            </tr>
                        </thead>

                        <tbody>



                            <tr>
                                <td> {{ $novedad->cclicontratocliente->rnombre }}</td>
                                <td> {{ $novedad->cclicontratocliente->rapellido }}</td>
                                <td> {{ $novedad->cclicontratocliente->rparantesco }}</td>
                                <td> {{ $novedad->cclicontratocliente->rcelular }} </td>

                            </tr>
                            <tr>
                                <td> {{ $novedad->cclicontratocliente->nombre }}</td>
                                <td> {{ $novedad->cclicontratocliente->apellido }}</td>
                                <td> {{ $novedad->cclicontratocliente->parantesco }}</td>
                                <td> {{ $novedad->cclicontratocliente->celular }} </td>

                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            <form action="{{ route('soportes.update', $novedad->id) }}" id="Dato" method="POST" class="form-control form-createe">
                <!--estogenera el token de validacion  -->
                @csrf
                @method('put')
                <input type="hidden" name="novedad_id" value="{{ $novedad->id }}">
                <hr>
                <div class="form-group">
                    <h1 style="font-size: 40px; text-align: center;">Visita de Soporte</h1>
                </div>

                <div class="row">
                    <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for="usuario">Tecnico:</label>
                            <input type="text" name="usuario" required class="form-control" placeholder="Nombre: Requirido"
                                value="{{ old('usuario') }}">

                        </div>
                        <div class="form-group">
                            <label for="fecha">Fecha:</label>
                            <input type="date" id="fechaActual" disabled name="fecha" class="form-control" value="">

                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for="horallegada">Hora de la llegada:</label>
                            <input type="time" name="horallegada" id="horallegada" class="form-control"
                                placeholder="Requirido" value="{{ old('horallegada') }}">
                            @error('horallegada')
                                <div class="alert alert-danger" role="alert">
                                    <small>{{ $message }}</small>
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for="horasalida">Hora de salida:</label>
                            <input type="time" name="horasalida" id="horasalida" class="form-control"
                                placeholder="Requirido" value="{{ old('horasalida') }}">
                            @error('horasalida')
                                <div class="alert alert-danger" role="alert">
                                    <small>{{ $message }}</small>
                                </div>
                            @enderror
                        </div>
                    </div>


                </div>
                <hr>
                <div class="form-group">
                    <h1 style="font-size: 40px; text-align: center;">Solución</h1>
                </div>
                <hr>

                <strong>
                    <h3 style="font-size: 25px; text-align: center;">Servicio en Fibra</h3>
                </strong>
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                        <h3 style="font-size: 25px; text-align: center;">Configuración</h3>
                        <div class="form-group">
                            <input type="checkbox" name="conu" value="1">
                            <label for="conu">Onu</label><br>
                            <input type="checkbox" name="crouter" value="1">
                            <label for="crouter"> Router</label><br>
                            <input type="checkbox" name="ccambiowiffi" value="1">
                            <label for="ccambiowiffi"> Cambio de Clave Wifi</label><br>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                        <h3 style="font-size: 25px; text-align: center;">Actualización</h3>
                        <div class="form-group">
                            <input type="checkbox" name="arouter" value="1">
                            <label for="arouter"> Router</label><br>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-6 col-lg-12">
                        <h3 style="font-size: 25px; text-align: center;">Instalación o Cambio de Equipos </h3>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="idbm">DBM:</label>
                            <input type="text" name="idbm" id="idbm" class="form-control" placeholder="Requirido"
                                value="{{ old('horallegada') }}">
                        </div>
                        <div class="form-group">
                            <label for="iupc">UPC:</label>
                            <input type="text" name="iupc" id="iupc" class="form-control" placeholder="Requirido"
                                value="{{ old('horallegada') }}">
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="iconectores" value="1">
                            <label for="iconectores">Conectores</label><br>
                            <input type="checkbox" name="irouter" value="1">
                            <label for="irouter"> Router </label><br>
                            <input type="checkbox" name="icablered" value="1">
                            <label for="icablered"> Cable de Red</label><br>
                        </div>
                        <div class="form-group">
                            <label for="ionuanterior">Onu Anterior:</label>
                            <input type="text" name="ionuanterior" id="ionuanterior" class="form-control"
                                placeholder="Requirido" value="{{ old('horallegada') }}">
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="icablefibra" value="1">
                            <label for="icablefibra">Cable Fibra</label><br>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="iapc">APC:</label>
                            <input type="text" name="iapc" id="iapc" class="form-control" placeholder="Requirido"
                                value="{{ old('iapc') }}">
                        </div>
                        <div class="form-group">
                            <label for="horallegada">ODB:</label>
                            <input type="text" name="iodb" id="iodb" class="form-control" placeholder="Requirido"
                                value="{{ old('iodb') }}">
                        </div>
                        <div class="form-group">
                            <label for="inconectores">N° Conectores:</label>
                            <input type="text" name="inconectores" id="inconectores" class="form-control"
                                placeholder="Requirido" value="{{ old('horallegada') }}">
                        </div>
                        <div class="form-group">
                            <label for="inmarcadelrouter">N° y Marca del Router:</label>
                            <input type="text" name="inmarcadelrouter" id="inmarcadelrouter" class="form-control"
                                placeholder="Requirido" value="{{ old('inmarcadelrouter') }}">
                        </div>
                        <div class="form-group">
                            <label for="ionunueva">Onu Nueva:</label>
                            <input type="text" name="ionunueva" id="ionunueva" class="form-control" placeholder="Requirido"
                                value="{{ old('horallegada') }}">
                        </div>
                        <div class="form-group">
                            <label for="imetroscable">Metros de Cable Fibra:</label>
                            <input type="text" name="imetroscable" id="imetroscable" class="form-control"
                                placeholder="Requirido" value="{{ old('horallegada') }}">
                        </div>

                    </div>
                </div>

                <div class="form-group">
                    <label for="observaciones">Observaciones:</label>
                    <textarea rows="4" name="observaciones" class="form-control" placeholder="....">
                    </textarea>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nombreresponsable">Nombre del que firma:</label>
                            <input type="text" name="nombreresponsable" id="nombreresponsable" class="form-control" placeholder="Nombre del que firma en casa" value="{{ old('nombreresponsable') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="parentescoresponsable">Parentesco con el Cliente:</label>
                            <input type="text" name="parentescoresponsable" id="parentescoresponsable" class="form-control" placeholder="Parentesco con el Cliente" value="{{ old('horallegada') }}">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <a href="{{ route('soportes.index') }}" class="btn btn-danger"><i class="fas fa-reply"></i>
                        Cancelar</a>
                    <button class="btn btn-success" type="submit"><i class="fas fa-save"></i> Enviar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $('.form-createe').submit(function(e) {
            e.preventDefault();
            swal({
                title: 'Esta seguro?',
                text: "Enviar Datos!",
                type: 'info',
                icon: 'info',
                buttons: {
                    cancel: {
                        visible: true,
                        text: 'No, cancelar!',
                        className: 'btn btn-danger'
                    },
                    confirm: {
                        text: 'Si, Enviar datos!',
                        className: 'btn btn-success'
                    }
                }
            }).then((willDelete) => {
                if (willDelete) {
                    this.submit();
                } else {

                }
            });
        });
        $('#Dato').click(function() {
            $("input").prop('disabled', false);
        });
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

        document.getElementById('fechaActual').value = ano + "-" + mes + "-" + dia;
        document.getElementById('horallegada').value = hora + ":" + minut;
        document.getElementById('horasalida').value = hora + ":" + minut;
    </script>
@endsection
