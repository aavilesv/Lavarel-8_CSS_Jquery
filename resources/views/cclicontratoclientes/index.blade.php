@extends('layouts.template')
@section('title','Listado de Contratos')
@section('content')


        <div class="panel-header bg-primary-gradient">
            
            
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h1 class="text-white title-it"><i class="far fa-file-alt"></i> Clientes</h1>
                       
                        <h5 class="text-white op-7 mb-2"><i class="fas fa-folder-open"></i> Contratos</h5>
                    </div>
                    <div class="ml-md-auto py-2 py-md-0">
                   
                        <a class="btn btn-success btn-round ml-auto" data-toggle="tooltip" 
                        data-original-title="Ingresar" 
                        href="{{ route('contratoclientes.create') }}"><i class="fa fa-plus"></i> Ingresar</a>
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
                            <div class="card-category"><i class="fab fa-creative-commons-nd"></i> Contratos de Clientes Registrados</div>
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
                                                <th>#Código-Contrato</th>
                                                <th>Tipo de Contrato</th>
                                                <th>Cédula</th>
                                                <th>Cantón</th>
                                                <th>Provincia</th>
                                                <th>Dirección</th>
                                                <th>Celular</th>
                                                <th>Correo</th>
                                                <th>Fecha</th>
                                                <th>Archivo</th>
                                                <th>Estado</th>
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
                                              <td>{{ $rrhprofesion->contratocodigo }}</td>
                                              <td>{{ $rrhprofesion->cclicontratotipocliente->descripcion }}</td>
                                              <td>{{ $rrhprofesion->cliente->cedula }}</td>
                                              <td>{{ $rrhprofesion->canton->name }}</td>
                                              <td>{{ $rrhprofesion->canton->provincia->name }}</td>
                                              <td>{{ $rrhprofesion->direccion }}</td>
                                              <td>{{ $rrhprofesion->contacto }}</td>
                                              <td>{{ $rrhprofesion->cliente->email }}</td>
                                              
                                             
                                              <td> {{date("d F Y", strtotime($rrhprofesion->created_at))}}{{ $rrhprofesion->created_at }}</td>
                                              <td>
                                                <a class="btn btn-link btn-primary btn-lg" target="_blank" data-toggle="tooltip"
                                                data-original-title="Ver" 
                                               href="{{ asset($rrhprofesion->archivo) }}"><i class="fas fa-file-alt"></i></a>
                                               </td>
                                               <td>
                                                @if ($rrhprofesion->eliminar === 1)
                
                                                <span class="badge badge-success">Activo</span>
                                                @else
                                                <span class="badge badge-danger">Inactivo</span>
                                                @endif
                                              </td>
                                              <td>
                                                <div class="form-button-action">
                                                    <a class="btn btn-link btn-success btn-lg" data-toggle="tooltip" data-original-title="Ver" 
                                                href="{{ route('contratoclientes.show',$rrhprofesion->id) }}"><i class="fa fa-eye"></i></a>
                                                    <a class="btn btn-link btn-primary btn-lg" data-toggle="tooltip"
                                                     data-original-title="Editar" 
                                                    href="{{ route('contratoclientes.edit',$rrhprofesion->id) }}"><i class="fa fa-edit"></i></a>
                                                      
                                                <a class="btn btn-link btn-warning btn-eliminar" 
                                                data-toggle="tooltip" data-original-title="Anular Contrato"
                                                data-json='{"id":"{{ $rrhprofesion->id }}"}' 
                                                rel="action"
                                            ><i class="fas fa-check"></i></a>
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
                                <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header no-bd">
                                                <h3 class="modal-title">
                                                    <span class="fw-mediumbold">
                                                    </span> 
                                                    <label class="badge badge-warning">Anular Contrato</label>
                                                    <span class="fw-light">
                                                            
                                                    </span>
                                                </h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p class="small">Estas seguro que quieres anular contrato ?</p>
                                                <form method="POST" action="{{route('contratoclientes.destroy',0)}}">
                                                    <div class="row">
                                                        @csrf
                                                        @method('delete')
                                                        <input type="hidden" name="id" id="cidd" value="">
                                                        <div class="col-sm-12">
                                                            <div class="form-group form-group-default">
                                                                <label>Nombre Y Apellido</label>
                                                                <input  id="descripcion"  type="text"  disabled class="form-control" placeholder="Nombre Apellidos">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 pr-0">
                                                            <div class="form-group form-group-default">
                                                                <label>Cedula</label>
                                                             
                                                                <input 
                                                                type="text" name="cedula" id="ccedula"  disabled
                                                                class="form-control" placeholder="Cedula">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group form-group-default">
                                                                <label>Fecha de contrato</label>
                                                                <input id="cdireccion" type="text"  disabled class="form-control" placeholder="fill office">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer no-bd">
                                                
                                                        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                                                        <button type="submit" id="addRowButton" class="btn btn-warning">Eliminar</button>
                                                    
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
     
     $(document).ready(function(){ 

$('.conteinerr').on('click', 'a[rel="action"]',function(){

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

