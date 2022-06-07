@extends('layouts.template')
@section('title', 'Listado Usuario')
@section('header')

@endsection
@section('content')
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h1 class="text-white title-it"> <i class="fas fa-user-friends"></i>
                        Clientes</h1>

                    <h5 class="text-white op-7 mb-2"><i class="icon-globe"></i> Registro de Clientes</h5>
                </div>
                <div class="ml-md-auto py-2 py-md-0">
                    <a class="btn btn-primary btn-round ml-auto" data-toggle="tooltip"
                        data-original-title="Imprimir todos los registros" target="_blank"
                        href="{{ route('pdfclieente.clientespdfall') }}"><i class="icon-printer"></i> Imprimir</a>
                    <a class="btn btn-success btn-round ml-auto" data-toggle="tooltip" data-original-title="Ver"
                        href="{{ route('clientes.create') }}"><i class="fa fa-plus"></i> Ingresar</a>
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
                        <div class="card-category"><i class="fas fa-server"></i> Datos</div>
     
           
                        <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                            <br>
                            <div class="container">
                               
                                <div class="form-button-action">
                                    <div class="row">
                                        <div    @if ($buscador != '') class="col-md-10"  @else class="col-md-12"  @endif>
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
                                        @if ($buscador != '')  
                                        <div class="col-md-2">
                                            <a href="{{ route('clientes.index') }}"
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
                                <table  cellspacing="0" width="100%"
                                    class="display table table-striped table-hover 
                                    nowrap">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Foto del Cliente</th>
                                            <th scope="col">Foto del Cliente#2</th>

                                            <th scope="col">Nombres-Apellidos</th>
                                            <th scope="col">Cedula</th>
                                            <th scope="col">Fecha de Nacimiento</th>

                                            <th scope="col">Email</th>
                                            <th scope="col">Estado Civil</th>
                                            <th scope="col">Genero</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse  ($clientes as $cliente)
                                            <tr data-id="{{ $cliente->id }}">
                                                <td>{{ $cliente->id }}</td>
                                                <td>
                                                    <center> <a href="{{ asset($cliente->fotocedula2) }}"
                                                            data-lightbox="mygallery"
                                                            data-title="{{ $cliente->nombre }} {{ $cliente->apellido }}">
                                                            <img src="{{ asset($cliente->fotocedula2) }}" title="ver imagen"
                                                                class="img-fluid center" alt="Responsive image"
                                                                style="width:100px; height:100px;"></a> </center>
                                                </td>
                                                <td>
                                                    <center> <a href="{{ asset($cliente->ffoto) }}"
                                                            data-lightbox="mygallery"
                                                            data-title="{{ $cliente->nombre }} {{ $cliente->apellido }}">
                                                            <img src="{{ asset($cliente->ffoto) }}" title="ver imagen"
                                                                class="img-fluid center" alt="Responsive image"
                                                                style="width:100px; height:100px;"></a> </center>
                                                </td>

                                                <td>{{ $cliente->nombre }} {{ $cliente->apellido }}</td>
                                                <td>{{ $cliente->cedula }}</td>
                                                <td>{{ $cliente->fechanacimiento }}</td>
                                                <td>{{ $cliente->email }}</td>
                                                <td>
                                                    @if ($cliente->estadocivil === 1)
                                                        <span class="badge badge-info">Casado</span>
                                                    @elseif($cliente->estadocivil === 2)
                                                        <span class="badge badge-primary">Soltero</span>
                                                    @else
                                                        <span class="badge badge-info">Divorciado</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($cliente->sexo === 1)

                                                        <span class="badge badge-success">Masculino</span>
                                                    @else
                                                        <span class="badge badge-primary">Femenino</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="form-button-action">
                                                        <a class="btn btn-link btn-info btn-lg" data-toggle="tooltip"
                                                            data-original-title="Imprimir registro" target="_blank"
                                                            href="{{ route('pdfclieente.clientegetone', $cliente->id) }}"><i
                                                                class="icon-printer"></i></a>
                                                        <a class="btn btn-link btn-success btn-lg" data-toggle="tooltip"
                                                            data-original-title="Ver"
                                                            href="{{ route('clientes.show', $cliente->id) }}"><i
                                                                class="fa fa-eye"></i></a>

                                                        <a class="btn btn-link btn-primary btn-lg" data-toggle="tooltip"
                                                            data-original-title="Editar"
                                                            href="{{ route('clientes.edit', $cliente->id) }}"><i
                                                                class="fa fa-edit"></i></a>


                                                        <a class="btn btn-link btn-danger btn-eliminar"
                                                            data-toggle="tooltip" data-original-title="Eliminar"
                                                            data-json='{"id":"{{ $cliente->id }}"}' rel="action"><i
                                                                class="fa fa-times"></i></a>



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

{{ $clientes->appends(['buscador' => $buscador])->links() }}
                            </div>

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
                                            <form method="POST" action="{{ route('clientes.destroy', 0) }}">
                                                <div class="row">
                                                    @csrf
                                                    @method('delete')
                                                    <input type="hidden" name="id" id="cid" value="">
                                                    <div class="col-sm-12">
                                                        <div class="form-group form-group-default">
                                                            <label>Nombre Y Apellido</label>
                                                            <input id="descripcion" type="text" disabled
                                                                class="form-control" placeholder="Nombre Apellidos">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 pr-0">
                                                        <div class="form-group form-group-default">
                                                            <label>Cedula</label>

                                                            <input type="text" name="cedula" id="ccedula" disabled
                                                                class="form-control" placeholder="Cedula">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-group-default">
                                                            <label>Fecha de Nacimiento</label>
                                                            <input id="cdireccion" type="text" disabled class="form-control"
                                                                placeholder="fill office">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer no-bd">

                                                    <button type="button" class="btn btn-success"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" id="addRowButton"
                                                        class="btn btn-danger">Eliminar</button>

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
        $(document).ready(function() {
            $('.conteinerr').on('click', 'a[rel="action"]', function() {
                var data = $(this).data('json'),
                    action = data.action,
                    id = data.id;
                var nombreapellido = $(this).parents('tr').children('td').eq(2).html();
                var cedula = $(this).parents('tr').children('td').eq(3).html();
                var direccion = $(this).parents('tr').children('td').eq(4).html();
                $('#descripcion').val(nombreapellido);
                $('#cid').val(id);
                $('#ccedula').val(cedula);
                $('#cdireccion').val(direccion);

                $('#addRowModal').modal();



            });
        });

    </script>
@endsection
