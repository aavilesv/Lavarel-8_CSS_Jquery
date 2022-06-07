@extends('layouts.template')
@section('title', 'Atención al Cliente')
@section('content')

    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h1 class="text-white title-it"> <i class="fas fa-phone-volume"></i>
                        ATENCIÓN AL CLIENTE</h1>

                    <h5 class="text-white op-7 mb-2"><i class="icon-globe"></i> Novedades de los Clientes</h5>
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
                        <div class="card-title"><i class="fas fa-align-justify"></i> Listado</div>
                        <div class="card-category"><i class="fas fa-server"></i> Registrados para la atención</div>
                        <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                            <div class="table-responsive">
                                <table class="display table table-striped table-hover add-row nowrap">
                                    <tr>
                                        <th> Cliente:</th>
                                        <td colspan="2">
                                            
                                            {{ $reporteradio->novedad->cclicontratocliente->cliente->nombre }}
                                            -{{ $reporteradio->novedad->cclicontratocliente->cliente->apellido }}-{{ $reporteradio->novedad->cclicontratocliente->contratocodigo }}</td>
                                        <th> Hora de novedad:</th>
                                        <td colspan="2">{{ $reporteradio->novedad->horainciar }}</td>
                                    </tr>
                                    
            <tr>
                <th> Fecha de visita:</th>
                <td colspan="2">{{ $reporteradio->novedad->fechavisita }}</td>
                <th> Hora de visita:</th>
                <td colspan="2">{{ $reporteradio->novedad->horavisita }}</td>
            </tr>
                                    <tr>
                                        <th>Contacto 1:</th>
                                        <td>{{ $reporteradio->novedad->cclicontratocliente->contacto }}</td>
                                        <th><strong>Contacto 2:</strong></th>
                                        <td> {{ $reporteradio->novedad->cclicontratocliente->contacto1 }}</td>
                                        <th><strong>Correo electronico:</strong></th>
                                        <td> {{ $reporteradio->novedad->cclicontratocliente->cliente->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>Novedad o percance:</th>
                                        <td colspan="1">
                                            @if ($reporteradio->novedad->novedadopercance === 1)
                                                <span class="badge badge-success">Instalación</span>
                                            @elseif($reporteradio->novedad->novedadopercance === 2)
                                                <span class="badge badge-info">Retiro de Equipo</span>
                                            @elseif($reporteradio->novedad->novedadopercance === 3)
                                                <span class="badge badge-warning">Reinstalación</span>
                                            @elseif($reporteradio->novedad->novedadopercance === 4)
                                                <span class="badge badge-danger">Intermitente</span>
                                            @elseif($reporteradio->novedad->novedadopercance === 5)
                                                <span class="badge badge-info">Lento</span>
                                            @elseif($reporteradio->novedad->novedadopercance === 6)
                                                <span class="badge badge-warning">Desconf. Router</span>
                                            @elseif($reporteradio->novedad->novedadopercance === 7)
                                                <span class="badge badge-warning">Cable. Dañado</span>
                                            @elseif($reporteradio->novedad->novedadopercance === 8)
                                                <span class="badge badge-info">Problema de Equipos</span>

                                            @elseif($reporteradio->novedad->novedadopercance === 9)
                                                <span class="badge badge-info">Sin servicio</span>
                                            @elseif($reporteradio->novedad->novedadopercance === 10)
                                                <span class="badge badge-info">Otros</span>
                                            @endif
                                        </td>
                                        <th>Provincia-Cantón:</th>
                                        <td>{{ $reporteradio->novedad->cclicontratocliente->canton->provincia->name }}-{{ $reporteradio->novedad->cclicontratocliente->canton->name }}
                                        </td>
                                        <th>Cdla o Recinto:</th>
                                        <td>{{ $reporteradio->novedad->cclicontratocliente->cdaorecinto }}</td>
                                    </tr>
                                    <tr>
                                        <th>
                                            GPS:
                                        </th>
                                        <td>
                                            <a class="btn btn-link btn-info btn-lg" data-toggle="tooltip"
                                                data-original-title="Abrir Ubicación del cliente GPS" target="_blank"
                                                href="{{ $reporteradio->novedad->cclicontratocliente->gps }}"><i
                                                    class="fas fa-external-link-alt"></i> Abrir
                                                Ubicación</a>
                                        </td>
                                        <th>
                                            Dirección:
                                        </th>
                                        <td colspan="3">
                                            {{ $reporteradio->novedad->cclicontratocliente->direccion }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Especificar:
                                        </th>
                                        <td colspan="5">
                                            {{ $reporteradio->novedad->especificar }}
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            
                            
        <div class="table-responsive">
            <table class="display table table-striped table-hover nowrap" >
                
                <thead>
                    <tr>
                        <th style="text-align: center;" colspan="4">
                            <h1>Referencias Familiares para visita de soporte en casa</h1></th>
                    </tr>
                    <tr>
                        <th>Nombre</th>
                        <th>Parantesco</th>
                        <th>Celular</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                      <td>    {{ $reporteradio->novedad->nombre }}</td>
                      <td>    {{ $reporteradio->novedad->parentesco }}</td>
                      <td>    {{ $reporteradio->novedad->celular }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
                <div class="table-responsive">
                    <table class="display table table-striped table-hover nowrap" >
                        
                        <thead>
                            <tr>
                                <th style="text-align: center;" colspan="4">
                                    <h1>Referencias Familiares </h1></th>
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
                              <td>    {{ $reporteradio->novedad->cclicontratocliente->rnombre }}</td>
                              <td>    {{ $reporteradio->novedad->cclicontratocliente->rapellido }}</td>
                              <td>    {{ $reporteradio->novedad->cclicontratocliente->rparantesco }}</td>
                              <td>    {{ $reporteradio->novedad->cclicontratocliente->rcelular }} </td>
                            
                            </tr>
                            <tr>
                                <td>    {{ $reporteradio->novedad->cclicontratocliente->nombre }}</td>
                                <td>    {{ $reporteradio->novedad->cclicontratocliente->apellido }}</td>
                                <td>    {{ $reporteradio->novedad->cclicontratocliente->parantesco }}</td>
                                <td>    {{ $reporteradio->novedad->cclicontratocliente->celular }} </td>
                              
                              </tr>
                        
                        </tbody>
                    </table>
                </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card full-height">
                    <div class="card-body">
                        <div class="card-title"><i class="fas fa-map-marker-alt"></i> Visita de Soporte</div>
                        <div class="card-category">Atención de Clientes</div>
                        <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                            <form action="{{ route('editarreporteradio.update', $reporteradio->id) }}" id="btn-send" method="POST"
                                class="form-control form-createe">
                                <!--estogenera el token de validacion  -->
                                @csrf
                                @method('put')
                                <input type="hidden" name="novedad_id" value="{{ $reporteradio->id }}">
                                <hr>
                                <div class="row">
                                    <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                                        <div class="form-group">
                                            <label for="fecha">Fecha:</label>
                                            <input type="date" id="fechaActual"  name="fecha" class="form-control"
                                                value="{{ $reporteradio->fecha }}">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                                        <div class="form-group">
                                            <label for="horallegada">Hora de la llegada:</label>
                                            <input type="time" name="horallegada" id="horallegada"  class="form-control"
                                            step="00:00"
                                                placeholder="Requirido" value="{{ $reporteradio->horallegada }}">
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
                                              step="00:00"  placeholder="Requirido"
                                               value="{{ $reporteradio->horasalida }}">
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

                                <h3 style="font-size: 25px; text-align: center;">Servicio en Radio</h3>
                                <div class="row">
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="usuario">Tecnico:</label>
                                            <input type="text" name="usuario" required  class="form-control"
                                                placeholder="Nombre: Requirido" value="{{ $reporteradio->usuario }}">

                                        </div>
                                        <h3 style="font-size: 25px; text-align: center;">Configuración</h3>
                                        <div class="form-group">
                                            @if($reporteradio->cantena)
                                            <input type="checkbox" name="cantena" value="1" checked>
                                            @else
                                            <input type="checkbox" name="cantena" value="1">
                                            @endif
                                            <label for="cantena"> Antena</label><br>

                                            @if($reporteradio->crouter)
                                                <input type="checkbox" name="crouter" value="1" checked>
                                            @else
                                                <input type="checkbox" name="crouter" value="1">
                                            @endif
                                            
                                            <label for="crouter"> Router</label><br>
                                            @if($reporteradio->ccambiowiffi)
                                                <input type="checkbox" name="ccambiowiffi" value="1" checked>
                                            @else
                                                <input type="checkbox" name="ccambiowiffi" value="1">
                                            @endif
                                            
                                            <label for="ccambiowiffi"> Cambio de Clave Wifi</label><br>

                                            @if($reporteradio->cfrecuencias)
                                                <input type="checkbox" name="cfrecuencias" value="1" checked>
                                            @else
                                                <input type="checkbox" name="cfrecuencias" value="1">
                                            @endif
                                            
                                            <label for="cfrecuencias"> Frecuencias</label>

                                        </div>

                                        <hr style="width:100%;text-align:left;margin-left:0">
                                        <div class="form-group">
                                            <label for="horallegada">IP:</label>
                                            <input type="text" name="cip" id="cap" class="form-control"
                                                placeholder="Requirido" value="{{ $reporteradio->cip }}">

                                        </div>
                                        <div class="form-group">
                                            <label for="horallegada">RED:</label>
                                            <input type="text" name="cred" id="cred" class="form-control"
                                                placeholder="Requirido" value="{{ $reporteradio->cred }}">

                                        </div>
                                        <div class="form-group">
                                            <label for="horallegada">AP:</label>
                                            <input type="text" name="cap" id="cap" class="form-control"
                                                placeholder="Requirido" value="{{ $reporteradio->cap }}">

                                        </div>

                                    </div>


                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                        <h3 style="font-size: 25px; text-align: center;">Actualización</h3>
                                        <div class="form-group">
                                            @if($reporteradio->aanterior)
                                            <input type="checkbox" name="aanterior" value="1" checked>
                                            @else
                                            <input type="checkbox" name="aanterior" value="1">
                                            @endif
                                            <label for="aanterior"> Antena</label><br>
                                            @if($reporteradio->arouter)
                                                <input type="checkbox" name="arouter" value="1" checked>
                                            @else
                                                <input type="checkbox" name="arouter" value="1">
                                            @endif
                                            
                                            <label for="arouter"> Router</label><br>
                                        </div>
                                        <div class="form-group">
                                            <label for="accq">CCQ:</label>
                                            <input type="text" name="accq" id="accq" class="form-control"
                                                placeholder="Requirido" value="{{ $reporteradio->accq }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="aseñal">Señal:</label>
                                            <input type="text" name="aseñal" id="aseñal" class="form-control"
                                                placeholder="Requirido" value="{{ $reporteradio->aseñal }}">
                                        </div>

                                    </div>


                                </div>
                                <div class="row">
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-12">
                                        <h3 style="font-size: 25px; text-align: center;">Instalación o Cambio de Equipos
                                        </h3>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6">

                                        <div class="form-group">
                                            @if($reporteradio->iconectores)
                                                <input type="checkbox" name="iconectores" value="1" checked>
                                            @else
                                                <input type="checkbox" name="iconectores" value="1">
                                            @endif
                                            <label for="vehicle1"> Conectores</label><br>
                                            @if($reporteradio->irouter)
                                                <input type="checkbox" name="irouter" value="1" checked>
                                            @else
                                                <input type="checkbox" name="irouter" value="1">
                                            @endif
                                            <label for="irouter"> Router</label><br>
                                            @if($reporteradio->ipoe)
                                                <input type="checkbox" name="ipoe" value="1" checked>
                                            @else
                                                <input type="checkbox" name="ipoe" value="1">
                                            @endif
                                            
                                            <label for="ipoe"> Poe</label><br>
                                        </div>
                                        <div class="form-group">
                                            <label for="iantenaanterior">Antena Anterior:</label>
                                            <input type="text" name="iantenaanterior" id="iantenaanterior"
                                                class="form-control" placeholder="Requirido"
                                                value="{{ $reporteradio->iantenaanterior }}">
                                        </div>
                                        <div class="form-group">
                                            @if($reporteradio->itubogalvanizado)
                                                <input type="checkbox" name="itubogalvanizado" value="1" checked>
                                            @else
                                                <input type="checkbox" name="itubogalvanizado" value="1">
                                            @endif
                                            
                                            <label for="itubogalvanizado">Tubo Galvanizado</label><br>
                                            @if($reporteradio->icable)
                                                <input type="checkbox" name="icable" value="1" checked>
                                            @else
                                                <input type="checkbox" name="icable" value="1">
                                            @endif
                                            <label for="icable"> Cable</label><br>
                                            
                                            @if($reporteradio->iadicionocaña)
                                            <input type="checkbox" name="iadicionocaña" value="1" checked>
                                            @else
                                            <input type="checkbox" name="iadicionocaña" value="1">
                                            @endif
                                            
                                            <label for="iadicionocaña"> Adiciono Caña</label><br>
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="inconectores">N° Conectores:</label>
                                            <input type="text" name="inconectores" id="inconectores" class="form-control"
                                                placeholder="Requirido" value="{{ $reporteradio->inconectores }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="imarcadelrouter">N° y Marca del Router:</label>
                                            <input type="text" name="imarcadelrouter" id="imarcadelrouter"
                                                class="form-control" placeholder="Requirido"
                                                value="{{ $reporteradio->imarcadelrouter }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="iantenanueva">Antena Nueva:</label>
                                            <input type="text" name="iantenanueva" id="iantenanueva" class="form-control"
                                                placeholder="Requirido" value="{{ $reporteradio->iantenanueva }}">
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" name="ituboaluminio" value="1">
                                            <label for="ituboaluminio">Tubo Aluminio</label><br>
                                        </div>
                                        <div class="form-group">
                                            <label for="imetroscable">Metros de Cable:</label>
                                            <input type="text" name="imetroscable" id="imetroscable" class="form-control"
                                                placeholder="Requirido" value="{{ $reporteradio->imetroscable }}">
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="observaciones">Observaciones:</label>
                                    <textarea rows="4" cols="10" name="observaciones" class="form-control">{{ $reporteradio->observaciones }}

                    </textarea>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nombreresponsable">Nombre del que firma:</label>
                                            <input type="text" name="nombreresponsable" id="nombreresponsable" class="form-control"
                                                placeholder="Nombre del que firma en casa" value="{{ $reporteradio->nombreresponsable }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="parentescoresponsable">Parentesco con el Cliente:</label>
                                            <input type="text" name="parentescoresponsable" id="parentescoresponsable" class="form-control"
                                                placeholder="Parentesco con el Cliente" value="{{ $reporteradio->parentescoresponsable }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="ml-md-auto py-2 py-md-0">
                                    <a href="{{ route('editarreporteradio.index') }}"
                                        class="btn btn-danger btn-border btn-round mr-2"><i class="fas fa-reply"></i>
                                        Cancelar</a>
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
        
        $('#btn-send').click(function() {
            $('input').prop("disabled", false);

        });

    </script>
@endsection
