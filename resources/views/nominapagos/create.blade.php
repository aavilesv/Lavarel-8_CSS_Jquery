@extends('layouts.template')

@section('title', 'Crear de Nominas de Pago')

@section('content')


    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h1 class="text-white title-it"><i class="flaticon-agenda-1"></i> Crear Nomina de Pago</h1>

                    <h5 class="text-white op-7 mb-2"><i class="far fa-calendar-alt"></i> Nomina</h5>
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
                        <div class="card-title"><i class="far fa-list-alt"></i> Realizar Pago</div>
                        <div class="card-category"><i class="fab fa-creative-commons-nd"></i> Roles de pagos de Empleados
                            Registrados</div>
                        <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                            <form action="{{ route('nominapago.store') }}" method="POST"
                            class="form-control form-createe" enctype="multipart/form-data">
                            <!--estogenera el token de validacion  -->
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card full-height">
                                        <div class="card-header">
                                            <div class="card-title">
                                                <i class="fas fa-pen-alt"></i> Relizar Pago
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <ol class="activity-feed">
                                     

                                                <li class="feed-item feed-item-success">
                                                    <div class="row">
                                                        <time class="date col-12" datetime="9-25">Empleados</time>
                                                        <div class="col-md-9">
                                                            <select
                                                                class="chosen-select form-control input-border-bottom cliente_id"
                                                                id="cliente_idd" name="rrhempleado_id"
                                                                data-placeholder="Cliente">
                                                                <option value="" selected disabled hidden>Seleccione
                                                                    un Nombre-Cedula</option>
                                                                @foreach ($clientes as $cliente)
                                                                    <option value="{{ $cliente->id }}" data-cjson='{"cedula":"{{ $cliente->cedula }}"
                                                                                    ,"contacto":"{{ $cliente->contacto }}",
                                        "apellido":"{{ $cliente->apellido }}"
                                        ,"nombre":"{{ $cliente->nombre }}"}'>
                                                                        {{ $cliente->nombre }}
                                                                        {{ $cliente->apellido }} :
                                                                        {{ $cliente->cedula }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            @error('cliente_id')
                                                                <div class="alert alert-danger" role="alert">
                                                                    <small>{{ $message }}</small>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-3">
                                                            <a data-toggle="tooltip"
                                                                data-original-title="Ingresar Cliente"
                                                                class="btn btn-success btn-sm rounded-circle"
                                                                href="{{ route('rhempleados.create') }}" rel="action">
                                                                <i class="fa fa-plus"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </li>

                                                <li class="feed-item feed-item-secondary">
                                                    <div class="row">
                                                        <time class="date" datetime="9-25">Nombre</time>
                                                        <input type="text" id="cnombre"
                                                            class="form-control input-border-bottom"
                                                            placeholder="Descirpción: requerido">
                                                    </div>
                                                </li>
                                                <li class="feed-item feed-item-success">
                                                    <div class="row">
                                                        <time class="date" datetime="9-25">Apellido</time>
                                                        <input type="text" id="capellido"
                                                            class="form-control input-border-bottom"
                                                            placeholder="Descirpción: requerido">
                                                    </div>
                                                </li>
                                           
                                      

                                            </ol>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="card full-height">
                                        <div class="card-header">
                                            <div class="card-title">
                                                <i class="fas fa-align-justify"></i>
                                            </div>
                                        </div>

                                        <div class="card-body">
                                            <ol class="activity-feed">
                                                <li class="feed-item feed-item-secondary">
                                                    <div class="row">
                                                        <time class="date" datetime="9-25">Cedula</time>
                                                        <input type="text" id="ccedula"
                                                            class="form-control input-border-bottom"
                                                            placeholder="Descirpción: requerido">
                                                    </div>
                                                </li>
                                             

                                                <li class="feed-item feed-item-success">
                                                    <div class="row">
                                                        <time class="date" datetime="9-25">Archivo</time>
                                                        <input type="file" name="archivo"
                                                            class="form-control validarpdf"
                                                            placeholder="Archivo Contrato"
                                                            value="{{ old('archivo') }}">
                                                        @error('archivo')
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
                            <div class="col-md-12">
                                <div class="card full-height">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <i class="fas fa-money-bill"> Datos a ingresar</i>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">

                                            </div>
                                            <div class="col-6">
                                                <div class="form-group form-inline">
                                                    <label for="inlineinput" class="col-md-3 col-form-label">Día Laborales</label>
                                                    <div class="col-md-9 p-0">
                                                        <input type="text" class="form-control input-full" 
                                                        id="inlineinput" name="dialaborales"
                                                         placeholder="Dia Laborales"
                                                        value="{{ old('dialaborales') }}"
                                                        onKeyPress="return soloNumerospunto(event)" 
                                                        maxlength="10">
                                                        @error('dialaborales')
                                                        <div class="alert alert-danger" role="alert">
                                                            <small>{{ $message }}</small>
                                                        </div>
                                                    @enderror
                                                    </div>
                                                </div> 
                                            </div>
                                        </div>
                                                                             <div class="row">
                                           
                                            <div class="col-12 col-md-6">
                                              
                                                <ol class="activity-feed">
                                                    <li class="feed-item feed-item-success">
                                                        <div class="row">

                                                            <time class="date" datetime="9-25">Sueldo</time>
                                                            <input type="text" name="sueldo"
                                                            onKeyPress="return soloNumerospunto(event)"
                                                                class="form-control input-border-bottom"
                                                                placeholder="Sueldo: requerido" 
                                                                value="{{ old('sueldo') }}">
                                                            @error('sueldo')
                                                                <div class="alert alert-danger" role="alert">
                                                                    <small>{{ $message }}</small>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </li>


                                                    <li class="feed-item feed-item-primary">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Horas Extras</time>
                                                            <input type="text" name="horasextras"
                                                                class="form-control input-border-bottom"
                                                                placeholder="Horas Extras: no requerido"
                                                                onKeyPress="return soloNumerospunto(event)"
                                                                value="{{ old('horasextras') }}">
                                                            @error('horasextras')
                                                                <div class="alert alert-danger" role="alert">
                                                                    <small>{{ $message }}</small>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </li>

                                                    <li class="feed-item feed-item-secondary">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Comisiones</time>
                                                            <input type="text" name="comisiones"
                                                                class="form-control input-border-bottom"
                                                                placeholder="Comisiones: no requerido "
                                                                value="{{ old('comisiones') }}"
                                                                onKeyPress="return soloNumerospunto(event)"
                                                                maxlength="10">
                                                            @error('comisiones')
                                                                <div class="alert alert-danger" role="alert">
                                                                    <small>{{ $message }}</small>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </li>
                                                    <li class="feed-item feed-item-secondary">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Liquido</time>
                                                            <input type="text" name="liquido"
                                                                class="form-control input-border-bottom"
                                                                placeholder="liquido"
                                                                value="{{ old('liquido') }}"
                                                                onKeyPress="return soloNumerospunto(event)"
                                                                maxlength="10">
                                                            @error('liquido')
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
                                                            <time class="date" datetime="9-25">Prestamos quirogra iess</time>
                                                            <input type="text" name="prestamosquirogramaiess"
                                                                onKeyPress="return soloNumerospunto(event)"
                                                                class="form-control input-border-bottom"
                                                                placeholder="Prestamos quirogra iess: no requerido"
                                                                value="{{ old('prestamosquirogramaiess') }}">
                                                            @error('prestamosquirogramaiess')
                                                                <div class="alert alert-danger" role="alert">
                                                                    <small>{{ $message }}</small>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </li>
                                                    <li class="feed-item feed-item-secondary">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Descuentos Internet</time>
                                                            <input type="text" name="descuentosinternet"
                                                                class="form-control input-border-bottom"
                                                                placeholder="Descuentos Internet: no requerido "
                                                                value="{{ old('descuentosinternet') }}"
                                                                onKeyPress="return soloNumerospunto(event)" 
                                                                maxlength="10">
                                                            @error('descuentosinternet')
                                                                <div class="alert alert-danger" role="alert">
                                                                    <small>{{ $message }}</small>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </li>
                                                    <li class="feed-item feed-item-secondary">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Aporte IESS</time>
                                                            <input type="text" name="aporteiess"
                                                                class="form-control input-border-bottom"
                                                                placeholder="Aporte IESS: requerido "
                                                                value="{{ old('aporteiess') }}"
                                                                onKeyPress="return soloNumerospunto(event)" 
                                                                maxlength="10">
                                                            @error('aporteiess')
                                                                <div class="alert alert-danger" role="alert">
                                                                    <small>{{ $message }}</small>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </li>
                                                    <li class="feed-item feed-item-secondary">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Prestamos y Anticipos</time>
                                                            <input type="text" name="prestamosyanticipos"
                                                                class="form-control input-border-bottom"
                                                                placeholder="Prestamos y Anticipos: no requerido "
                                                                value="{{ old('prestamosyanticipos') }}"
                                                                onKeyPress="return soloNumerospunto(event)" 
                                                                maxlength="10">
                                                            @error('prestamosyanticipos')
                                                                <div class="alert alert-danger" role="alert">
                                                                    <small>{{ $message }}</small>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </li>
                                                    <li class="feed-item feed-item-secondary">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Total de descuentos</time>
                                                            <input type="text" name="totaldescuentos"
                                                                class="form-control input-border-bottom"
                                                                placeholder="Total de descuentos"
                                                                value="{{ old('totaldescuentos') }}"
                                                                onKeyPress="return soloNumerospunto(event)" 
                                                                maxlength="10">
                                                            @error('totaldescuentos')
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
                            <!-- aqui sale-->
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
        $('#cliente_idd').change(function() {

            var cliente = $('#cliente_idd option:selected').data('cjson');

            //           $('#direccion').val(cliente.direc);
            $('#cnombre').val(cliente.nombre);
            $('#capellido').val(cliente.apellido);
            $('#ccedula').val(cliente.cedula);
            //$('#gps').val(cliente.gps);
            //$('#contacto1').val(cliente.contacto1);
            //$('#cdaorecinto').val(cliente.cdaorecinto);

        });

    </script>
@endsection