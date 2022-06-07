@extends('layouts.template')
@section('title','Listado Usuario')
@section('content')
<div class="col-md-12">
   
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <div class="alert alert-secondary" role="alert">
                    <h1 class="title-it">Clientes</h1>
                </div>
            
                <a class="btn btn-success btn-round ml-auto" data-toggle="tooltip" data-original-title="Ver" 
                href="{{ route('clientes.create') }}"><i class="fa fa-plus"></i> Ingresar</a>
            </div>
        </div>
        <div class="card-body">
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
                            <form method="POST" {{route('clientes.delete')}}>
                                <div class="row">
                                    @csrf
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
                <table id="add-row" cellspacing="0" width="100%" class="display table table-striped table-hover add-row" >
                    
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Nombres-Apellidos</th>
							<th scope="col">Cedula</th>
                            <th scope="col">Fecha de Nacimiento</th>
                            <th scope="col">Contacto-1</th>
                            <th scope="col">Contacto-2</th>
                            <th scope="col">Email</th>
							<th scope="col">Direccion</th>
                            <th scope="col">Canton-Provincia</th>
                            <th scope="col">Estado</th>
							<th  style="width: 10%">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($clientes as $cliente)
						<tr data-id="{{$cliente->id}}">
							<td>{{$cliente->id}}</td>
							<td>{{$cliente->name}} {{$cliente->apellido}}</td>
							<td>{{$cliente->cedula}}</td>
                            <td>{{$cliente->fechanacimiento}}</td>
                            <td>{{$cliente->contacto}}</td>
							<td>{{$cliente->contacto1}}</td>
                            <td>{{$cliente->email}}</td>
                            <td>{{$cliente->direccion}}</td>
                            <td>
                                {{ $cliente->canton->name }}-{{ $cliente->canton->provincia->name }}
                              </td>
                              <td>
                                @if ($cliente->estado === 1)

                                <span class="badge badge-success">Activo</span>
                                @else
                                <span class="badge badge-danger">Inactivo</span>
                                @endif
                              </td>
							<td>

                           
								<div class="form-button-action">
									
									<a class="btn btn-link btn-success btn-lg" data-toggle="tooltip" data-original-title="Ver" 
									href="{{ route('users.show',$cliente->id) }}"><i class="fa fa-eye"></i></a>
									
									<a class="btn btn-link btn-primary btn-lg" data-toggle="tooltip" data-original-title="Editar" 
									href="{{ route('clientes.editar',$cliente->id) }}"><i class="fa fa-edit"></i></a>
									
									
                                    <a class="btn btn-link btn-danger btn-eliminar" 
                                    data-toggle="tooltip" data-original-title="Eliminar"
                                    data-json='{"id":"{{ $cliente->id }}"}' 
                                    rel="action"
								><i class="fa fa-times"></i></a>
									
                               
								 
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


@endsection

@section('scripts')
    <script>
     
     $(document).ready(function(){ 

$('.conteinerr').on('click', 'a[rel="action"]',function(){

    var data = $(this).data('json'),
    action = data.action,
    id = data.id;

    var nombreapellido = $(this).parents('tr').children('td').eq(1).html();
    var cedula = $(this).parents('tr').children('td').eq(2).html();
    var direccion = $(this).parents('tr').children('td').eq(3).html();
                    $('#descripcion').val(nombreapellido);
                    $('#cid').val(id);
                    $('#ccedula').val(cedula);
                    $('#cdireccion').val(direccion);
                   
    $('#addRowModal').modal();

   
    
});
     });
  
    </script>
@endsection

