@extends('layouts.template')
@section('title','Listado de Contratos')
@section('content')


        <div class="panel-header bg-primary-gradient">
            
            
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h1 class="text-white title-it"><i class="fas fa-phone-volume"></i> Actualizar datos Clientes</h1>
                       
                        <h5 class="text-white op-7 mb-2"><i class="icon-globe"></i> Contratos</h5>
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
                            <div class="card-title"><i class="far fa-list-alt"></i> Listado</div>
                            <div class="card-category"><i class="fab fa-creative-commons-nd"></i> Clientes Registrados con contratos</div>
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
                                            <div    @if ($buscador != '' or $buscarincial !='') class="col-md-10"  @else class="col-md-12"  @endif>
                                                <form class="navbar-left navbar-form nav-search mr-md-3">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <button type="submit" title="Click para Buscar"  class="btn btn-search pr-1">
                                                                <i class="fa fa-search search-icon"></i>
                                                            </button>
                                                        </div>
                                                        <input type="text" placeholder="Buscador" title="Escribe para buscar"  name="buscador"
                                                        value="{{ $buscador }}"
                                                            class="form-control">
                                                    </div>
                                                </form>  
                                            </div>
                                            @if ($buscador != '' or $buscarincial !='')  
                                            <div class="col-md-2">
                                                <a href="{{ route('contratoclientes.index') }}"
                                                data-toggle="tooltip" data-original-title="Recargar Pagina" 
                                                 class="btn btn-success btn-round">
                                                    <i class="icon-reload"> Recargar</i>
                                                </a>
                                            </div>
                                            @endif
                                        </div>
                                    
                                       
                                    </div>
                                    <div class="collapse" id="search-nav">
                                        
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="display table table-striped table-hover nowrap" >
                                        <thead>
                                            <tr>
                                                <th>#Cod</th>
                                                <th>Foto de vivienda</th>
                                                <th>Cliente</th>
                                                <th>Cédula</th>
                                                <th>Cantón</th>
                                                <th>Provincia</th>
                                                <th>Dirección</th>
                                                <th>Celular</th>
                                                <th>Correo</th>
                                                <th  style="width: 10%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($rrhcontrato as $rrhprofesion)
                                            <tr>
                                              <td>{{ $rrhprofesion->id }}</td>
                                              <td>
                                                <center> <a href="{{ asset($rrhprofesion->ffoto) }}"
                                                    data-lightbox="mygallery"
                                                    data-title="{{ $rrhprofesion->cliente->nombre }} {{ $rrhprofesion->cliente->apellido }}">
                                                    <img src="{{ asset($rrhprofesion->ffoto) }}" title="ver imagen"
                                                        class="img-fluid center" alt="Responsive image"
                                                        style="width:100px; height:100px;"></a> </center>
                                                    </td>
                                              <td>{{ $rrhprofesion->cliente->nombre }} {{ $rrhprofesion->cliente->apellido }}</td>
                                              <td>{{ $rrhprofesion->cliente->cedula }}</td>
                                              <td>{{ $rrhprofesion->canton->name }}</td>
                                              <td>{{ $rrhprofesion->canton->provincia->name }}</td>
                                              <td>{{ $rrhprofesion->direccion }}</td>
                                              <td>{{ $rrhprofesion->contacto }}</td>
                                              <td>{{ $rrhprofesion->cliente->email }}</td>
                                              
                                              <td>
                                                <div class="form-button-action">
                                                    <a class="btn btn-link btn-primary btn-lg" data-toggle="tooltip"
                                                     data-original-title="Editar" 
                                                    href="{{ route('clientesagregar.edit',$rrhprofesion->id) }}"><i class="fa fa-edit"></i></a>
                                                      
                                                </div>
                                            </td>
                                             
                                            </tr>
                                            @empty
   
                                            <tr>
                                                <td colspan="10"> <center>No existen registros</center></td>
                                            </tr>
                                                                                @endforelse
                                        </tbody>
                                    </table>
                                    {{ $rrhcontrato->appends(['buscador' => $buscador,'buscarincial' => $buscarincial,'buscarfinal' => $buscarfinal])->links() }}
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

