@extends('layouts.template')
@section('title', 'Listado de Novedades')
@section('content')


    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h1 class="text-white title-it"> <i class="fas fa-phone-square"></i>
                        NOVEDADES</h1>

                    <h5 class="text-white op-7 mb-2"><i class="icon-globe"></i> RECEPCIÓN</h5>
                </div>
                <div class="ml-md-auto py-2 py-md-0">
                    <a class="btn btn-primary btn-round ml-auto" data-toggle="tooltip"
                        data-original-title="Imprimir todos los registros" target="_blank"
                        href="{{ route('pdfnovedad.novedadall') }}"><i class="icon-printer"></i> Imprimir</a>

                    <a class="btn btn-success btn-round ml-auto" data-toggle="tooltip" data-original-title="Ver"
                        href="{{ route('novedads.create') }}"><i class="fa fa-plus"></i> Ingresar</a>
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="row mt--2">
            <div class="col-md-12">
                <div class="card full-height">
                    <div class="card-body">
                        <div class="card-title"><i class="fas fa-align-justify"></i> Novedades Registradas</div>
                        <div class="card-category"><i class="fas fa-server"></i> Datos</div>
                        <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                            <div class="table-responsive">
                                <table  class="display table table-striped table-hover add-rowww">
                                    <thead>
                                        <tr>
                                            <th style="width: 10%">Action</th>
                                            <th scope="col">#</th>
                                            <th scope="col">Servicio</th>
                                            <th scope="col">Cliente</th>
                                            <th scope="col">Hora de percance</th>
                                            <th scope="col">Fecha de visita</th>
                                            <th scope="col">Hora de visita</th>
                                            <th scope="col">Novedad de parcance</th>
                                            <th scope="col">Especificar</th>
                                            <th scope="col">Estado</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($novedads as $novedad)

                                            <tr data-id="{{ $novedad->id }}">
                                                
                                                <td>
                                                    <div class="form-button-action">
                                                        <a class="btn btn-link btn-info btn-lg" data-toggle="tooltip"
                                                            data-original-title="Imprimir registro" target="_blank"
                                                            href="{{ route('pdfnovedad.novedadgetone', $novedad->id) }}"><i
                                                                class="icon-printer"></i></a>
                                                                <a class="btn btn-link btn-warning btn-eliminar" 
                                                data-toggle="tooltip" data-original-title="Eliminar Novedad"
                                                data-json='{"id":"{{ $novedad->id }}"}' 
                                                rel="action"
                                            ><i class="fas fa-times"></i></a>

                                                    </div>
                                                </td>
                                                <td>{{ $novedad->id }}</td>
                                                <td>
                                                    @if ($novedad->cclicontratocliente->servicio == 1)

                                                                        <span class="badge badge-success"> 
                                                                            Radio</span>
                                                                    @else
                                                                        <span class="badge badge-danger">
                                                                            Fibra</span>
                                                                    @endif
                                                </td>
                                                <td>{{ $novedad->cclicontratocliente->cliente->nombre }} {{ $novedad->cclicontratocliente->cliente->apellido }}
                                                {{ $novedad->cclicontratocliente->contratocodigo }}</td>
                                                <td>{{ $novedad->horainciar }}</td>
                                                <td>{{ $novedad->fechavisita }}</td>
                                                <td>{{ $novedad->horavisita }}</td>

                                                <td>
                                                    @if ($novedad->novedadopercance === 1)

                                                        <span class="badge badge-success">Instalaci贸n</span>
                                                    @elseif($novedad->novedadopercance === 2)
                                                        <span class="badge badge-info">Retiro de Equipo</span>
                                                    @elseif($novedad->novedadopercance === 3)
                                                        <span class="badge badge-warning">Reinstalaci贸n</span>
                                                    @elseif($novedad->novedadopercance === 4)
                                                        <span class="badge badge-danger">Intermitente</span>
                                                    @elseif($novedad->novedadopercance === 5)
                                                        <span class="badge badge-info">Lento</span>
                                                    @elseif($novedad->novedadopercance === 6)
                                                        <span class="badge badge-warning">Desconf. Router</span>
                                                    @elseif($novedad->novedadopercance === 7)
                                                        <span class="badge badge-warning">Cable. Da帽ado</span>
                                                    @elseif($novedad->novedadopercance === 8)
                                                        <span class="badge badge-info">Problema de Equipos</span>
                                                    @elseif($novedad->novedadopercance === 9)
                                                        <span class="badge badge-info">Sin servicio</span>
                                                    @elseif($novedad->novedadopercance === 10)
                                                        <span class="badge badge-info">Otros</span>
                                                    @endif
                                                </td>
                                                <td>{{ $novedad->especificar }}</td>
                                                <td>
                                                    @if ($novedad->estado === 1)

                                                        <span class="badge badge-success">Activo</span>
                                                    @else
                                                        <span class="badge badge-danger">Inactivo</span>
                                                    @endif
                                                </td>

                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header no-bd">
                                            <h3 class="modal-title">
                                                <span class="fw-mediumbold">
                                                </span> 
                                                <label class="badge badge-warning">Anular Novedad</label>
                                                <span class="fw-light">
                                                        
                                                </span>
                                            </h3>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="small">Estas seguro que quieres eliminar novedad ?</p>
                                            <form method="POST" action="{{route('novedadupdatecontroller.destroy',0)}}">
                                                <div class="row">
                                                    @csrf
                                                    @method('delete')
                                                    <input type="hidden" name="id" id="cidd" value="">
                                                    <div class="col-sm-12">
                                                        <div class="form-group form-group-default">
                                                            <label>Nombre Y Apellido</label>
                                                            <input id="descripcion"  type="text"  disabled class="form-control" placeholder="Nombre Apellidos">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 pr-0">
                                                        <div class="form-group form-group-default">
                                                            <label>Hora de parcance</label>
                                                         
                                                            <input type="text" name="cedula" id="ccedula"  disabled class="form-control" placeholder="Cedula">
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
    var table = $('.add-rowww').DataTable({
                orderCellsTop: true,
                fixedHeader: true,
                "pageLength": 10,
                "destroy": true,
                
            });
    //Creamos una fila en el head de la tabla y lo clonamos para cada columna
    $('.add-rowww thead tr').clone(true).appendTo('.add-rowww thead');
            $('.add-rowww thead tr:eq(1) th').each(function(i) {
                var title = $(this).text(); //es el nombre de la columna
                $(this).html('<input type="text" placeholder="Buscar...' + title + '" />');
                $('input', this).on('keyup change', function() {
                    if (table.column(i).search() !== this.value) {
                        table
                            .column(i)
                            .search(this.value)
                            .draw();
                    }
                });
            });
$('.conteinerr').on('click', 'a[rel="action"]',function(){

    var data = $(this).data('json'),
    action = data.action,
    id = data.id;

    var nombreapellido = $(this).parents('tr').children('td').eq(3).html();
    var cedula = $(this).parents('tr').children('td').eq(4).html();
    var direccion = $(this).parents('tr').children('td').eq(10).html();
                    $('#descripcion').val(nombreapellido);
                    $('#cidd').val(id);
                    $('#ccedula').val(cedula);
                    $('#cdireccion').val(direccion);
                   
    $('#addRowModal').modal();

   
    
});
     });
    </script>
@endsection
