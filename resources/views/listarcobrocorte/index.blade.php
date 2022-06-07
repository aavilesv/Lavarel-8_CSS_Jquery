@extends('layouts.template')
@section('title', 'Listado de Empleados')
@section('content')


    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h1 class="text-white title-it"><i class="fas fa-user-friends"></i> Empleados</h1>

                    <h5 class="text-white op-7 mb-2"><i class="far fa-building"></i> Recursos Humanos</h5>
                </div>
                <div class="ml-md-auto py-2 py-md-0">
                    <a class="btn btn-primary btn-round ml-auto" data-toggle="tooltip"
                        data-original-title="Imprimir todos los registros" target="_blank"
                        href="{{ route('pdfempleado.empleadospdfall') }}"><i class="icon-printer"></i> Imprimir</a>
                    <a class="btn btn-success btn-round ml-auto" data-toggle="tooltip" data-original-title="Ingresar"
                        href="{{ route('listarcobrocorte.create') }}"><i class="fa fa-plus"></i> Ingresar</a>
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
                        <div class="card-category"><i class="fab fa-creative-commons-nd"></i> Empleados Registradas</div>
                        <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                             <!-- Modal -->
            <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header no-bd">
                            <h3 class="modal-title">
                                <span class="fw-mediumbold">
                                </span> 
                                <label class="badge badge-warning">Eliminar</label>
                                <span class="fw-light">
                                        
                                </span>
                            </h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p class="small">Estas seguro que quieres eliminar?</p>
                            <form method="POST" action="{{route('rhempleados.destroy',0)}}">
                                <div class="row">
                                    @csrf
                                    @method('delete')
                                    <input type="hidden" name="id" id="cid" value="">
                                    <div class="col-sm-12">
                                        <div class="form-group form-group-default">
                                            <label>Nombre Y Apellido</label>
                                            <input id="descripcion"  type="text"  disabled class="form-control" placeholder="Nombre Apellidos">
                                        </div>
                                    </div>
                                    <div class="col-md-6 pr-0">
                                        <div class="form-group form-group-default">
                                            <label>Cedula</label>
                                         
                                            <input 
                                            type="text" name="cedula" id="ccedula"  disabled
                                            class="form-control" placeholder="Cedula">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label>Dirección</label>
                                            <input id="cdireccion" type="text"  disabled class="form-control" placeholder="fill office">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer no-bd">
                            
                                    <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                                    <button type="submit" id="addRowButton" class="btn btn-danger">Eliminar</button>
                                
                                </div>
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div>
                            <div class="table-responsive">
                                <table id="add-row" cellspacing="0" width="100%"
                                    class="display table table-striped table-hover table-head-bg-primary add-row nowrap">

                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Foto</th>
                                            <th scope="col">Nombres-Apellidos</th>
                                            <th scope="col">Tarifa</th>
                                            <th scope="col">Fecha de Nacimiento</th>
                                            <th scope="col">Contacto-1</th>
                                            <th scope="col">Contacto-2</th>
                                            <th scope="col">Cdla-Recinto</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Direccion</th>
                                            <th scope="col">Licencia</th>
                                            <th scope="col">Canton-Provincia</th>
                                            <th scope="col">Estado</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($listadocobro as $listado)
                                            <tr data-id="{{ $listado->id }}">
                                                <td>{{ $listado->id }}</td>
                                                <td>
                                                    <center> <a href="{{ asset($listado->cclicontratocliente->cliente->ffoto) }}"
                                                            data-lightbox="mygallery"
                                                            data-title="{{ $listado->nombre }} {{ $listado->apellido }}">
                                                            <img src="{{ asset($listado->cclicontratocliente->cliente->ffoto) }}" title="ver imagen"
                                                                class="img-fluid center" alt="Responsive image"
                                                                style="width:100px; height:100px;"></a> </center>
                                                </td>

                                                <td>{{ $listado->cclicontratocliente->cliente->nombre }} {{ $listado->cclicontratocliente->cliente->apellido }}</td>
                                                <td>${{ $listado->cclicontratocliente->tarifa }}</td>
                                                <td>{{ $listado->fechanacimiento }}</td>
                                                <td>{{ $listado->contacto }}</td>
                                                <td>{{ $listado->contacto1 }}</td>
                                                <td>{{ $listado->cdaorecinto }}</td>
                                                <td>{{ $listado->email }}</td>
                                                <td>{{ $listado->direccion }}</td>
                                                <td>{{ $listado->licencia }}</td>
                                                
                                                <td>
                                                    @if ($listado->estado === 1)

                                                        <span class="badge badge-success">Activo</span>
                                                    @else
                                                        <span class="badge badge-danger">Inactivo</span>
                                                    @endif
                                                </td>
                                                <td>


                                                    <div class="form-button-action">

                                                        <a class="btn btn-link btn-info btn-lg" data-toggle="tooltip"
                                                            data-original-title="Imprimir registro" target="_blank"
                                                            href="{{ route('pdfempleado.empleadospdfgetone', $listado->id) }}"><i
                                                                class="icon-printer"></i></a>
                              
                                                        <a class="btn btn-link btn-primary btn-lg" data-toggle="tooltip"
                                                            data-original-title="Editar"
                                                            href="{{ route('rhempleados.edit', $listado->id) }}"><i
                                                                class="fa fa-edit"></i></a>

                                                    </div>
                                                </td>

                                            </tr>
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

     $('#contratosclientes').click(function(e){
  
});
     $(document).ready(function(){ 

$('.conteinerr').on('click', 'a[rel="action"]',function(){

    var data = $(this).data('json'),
    action = data.action,
    id = data.id;

    var nombreapellido = $(this).parents('tr').children('td').eq(2).html();
    var cedula = $(this).parents('tr').children('td').eq(3).html();
    var direccion = $(this).parents('tr').children('td').eq(9).html();
                    $('#descripcion').val(nombreapellido);
                    $('#cid').val(id);
                    $('#ccedula').val(cedula);
                    $('#cdireccion').val(direccion);
                   
    $('#addRowModal').modal();

   
    
});
     });
  
    </script>
@endsection