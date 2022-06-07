@extends('layouts.template')
@section('title', 'Editar Novedades')
@section('content')


    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h1 class="text-white title-it"> <i class="fas fa-phone-square"></i>
                        EDITAR NOVEDAD</h1>

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


                            <form action="{{ route('novedadupdatecontroller.update',$novedad->id) }}" method="POST" class="form-control form-createe">
                                <!--estogenera el token de validacion  -->
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="servicio">Nombre-Apellido-Cedula-Contrato:</label>
                                            <input type="text" name=""
                                            id="servicio" class="form-control" disabled
                                                placeholder="servicio" value="{{ $novedad->cclicontratocliente->cliente->nombre }} {{ $novedad->cclicontratocliente->cliente->apellido }} :{{ $novedad->cclicontratocliente->cliente->cedula }} {{ $novedad->cclicontratocliente->contratocodigo }}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="servicio">Servicio:</label>
                                            <input type="text" name=""
                                            id="servicio" class="form-control" disabled
                                                placeholder="servicio" value="@if ($novedad->cclicontratocliente->servicio == 1)Radio @else Fibra @endif">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="cedula">Cantacto 1:</label>
                                            <input type="text" name="" disabled id="contacto"
                                                onKeyPress="return soloNumeros(event)" class="form-control"
                                                placeholder="Contacto 1" value="{{ $novedad->cclicontratocliente->contacto }}">

                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="cedula">Cantacto 2:</label>
                                            <input type="text" name="" disabled id="contacto1"
                                                onKeyPress="return soloNumeros(event)" class="form-control"
                                                placeholder="Contacto 2" value="{{ $novedad->cclicontratocliente->contacto1 }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="cedula">Correo Electronico:</label>
                                            <input type="email" name="" id="email" disabled class="form-control"
                                                placeholder="Correo Electronico" value="{{ $novedad->cclicontratocliente->cliente->email }}">

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group">
                                            <label for="cedula">Provincia-Cantón: Cdla o Recinto - Dirección:</label>
                                            
                                            <input type="text" name="cdaorecinto" id="cdaorecinto" disabled
                                                class="form-control" placeholder="Cdla o Recinto-Dirección" value="{{ $novedad->cclicontratocliente->canton->provincia->name }}:{{ $novedad->cclicontratocliente->canton->name }}:{{ $novedad->cclicontratocliente->cdaorecinto }}:{{ $novedad->cclicontratocliente->direccion }}">

                                        </div>
                                    </div>
                                    <div class="col-md-4">


                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="horainciar">Hora de percance:</label>
                                            <input type="datetime-local" name="horainciar" id="horainciar" 
                                            step="00-00-0000 00:01" class="form-control"
                                                placeholder="Correo Electronico" value="">

                                            @error('horainciar')
                                                <div class="alert alert-danger" role="alert">
                                                    <small>{{ $message }}</small>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="fechavisita">Fecha de visita:</label>
                                            <input type="date" name="fechavisita" id="fechavisita" class="form-control"
                                                placeholder="Correo Electronico" value="{{ $novedad->fechavisita }}">

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
                                            <input type="time" name="horavisita"
                                             id="horavisita" class="form-control"
                                                placeholder="Correo Electronico"  step="00:01"
                                                 value="{{ $novedad->horavisita }}">

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
                                        
                                        @if ($novedad->novedadopercance === 1)

                                        
                                        <option value="{{ $novedad->novedadopercance }}" >Seleccionado: Instalación</option>
                                    @elseif($novedad->novedadopercance === 2)
                                        <option value="{{ $novedad->novedadopercance }}" >Seleccionado: Retiro de Equipo</option>
                                    @elseif($novedad->novedadopercance === 3)
                                        
                                        <option value="{{ $novedad->novedadopercance }}" >Seleccionado: Reinstalación</option>
                                    @elseif($novedad->novedadopercance === 4)
                                        <option value="{{ $novedad->novedadopercance }}" >Seleccionado: Intermitente</option>
                                    @elseif($novedad->novedadopercance === 5)
                                        <option value="{{ $novedad->novedadopercance }}" >Seleccionado: Lento</option>
                                    @elseif($novedad->novedadopercance === 6)
                                    
                                        <option value="{{ $novedad->novedadopercance }}" >Seleccionado: Desconf. Router</option>
                                    @elseif($novedad->novedadopercance === 7)
                                        <option value="{{ $novedad->novedadopercance }}" >Seleccionado: Cable. Dañado</option>
                                    @elseif($novedad->novedadopercance === 8)
                                        <option value="{{ $novedad->novedadopercance }}" >Seleccionado: Problema de Equipos</option>
                                    @elseif($novedad->novedadopercance === 9)
                                        <option value="{{ $novedad->novedadopercance }}" >Seleccionado: Sin servicio</option>
                                    @elseif($novedad->novedadopercance === 10)
                                    <option value="{{ $novedad->novedadopercance }}" >Seleccionado: Otros</option>
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
                                <div class="form-group">
                                    <label for="especificar">Especificar:</label>
                                    <textarea rows="5" class="form-control" name="especificar"
                                        placeholder="Si elige otros por favor especificar">{{ $novedad->especificar }}
                                        </textarea>
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
                                                                    value="{{ $novedad->nombre }}">
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
                                                                    value="{{ $novedad->parentesco }}">
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
                                                                    value="{{ $novedad->celular }}"
                                                                    onKeyPress="return soloNumeros(event)" 
                                                                    minlength="10"
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
                                    <button class="btn btn-success btn-border btn-round mr-2" id="Dato-registrar" type="submit"><i
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
        
        $("#horainciar").val('{{ $novedad->horainciar->format('Y-m-d') }}T{{ $novedad->horainciar->format('H:i')}}');
         $('#Dato-registrar').click(function(){
             
            $("input").prop('disabled', false);
        
        });
    </script>
@endsection
