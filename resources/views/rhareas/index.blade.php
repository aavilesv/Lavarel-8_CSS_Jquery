@extends('layouts.template')
@section('title','Listado de Cargos')
@section('content')


        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h1 class="text-white title-it"><i class="fas fa-globe"></i> Áreas</h1>
                       
                        <h5 class="text-white op-7 mb-2"><i class="far fa-building"></i> Recursos Humanos</h5>
                    </div>
                    <div class="ml-md-auto py-2 py-md-0">
                   
                        <a class="btn btn-success btn-round ml-auto" data-toggle="tooltip" 
                        data-original-title="Ingresar" 
                        href="{{ route('rhareas.create') }}"><i class="fa fa-plus"></i> Ingresar</a>
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
                            <div class="card-category"><i class="fab fa-creative-commons-nd"></i> Área Registradas</div>
                            <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                               
                                <div class="table-responsive">
                                    <table id="add-row" class="display table table-striped table-hover table-head-bg-primary add-row" >
                                        <thead>
                                            <tr>
                                                <th>#Cod</th>
                                                <th>Nombre</th>
                                                <th>Estado</th>
                                                <th  style="width: 10%">Action</th>
                                            </tr>
                                        </thead>
                       
                                        <tbody>
                                                                
                    
                                            @foreach ($areas as $key => $cargo)
                                            <tr>
                                              <td>{{ $cargo->id }}</td>
                                              <td>{{ $cargo->nombre }}</td>
                                              <td>
                                                @if ($cargo->estado === 1)

                                                <span class="badge badge-success">Activo</span>
                                                @else
                                                <span class="badge badge-danger">Inactivo</span>
                                                @endif
                                            </td>
                                              <td>
                                                <div class="form-button-action">
                                                    <a class="btn btn-link btn-primary btn-lg" data-toggle="tooltip"
                                                     data-original-title="Editar" 
                                                    href="{{ route('rhareas.edit',$cargo->id) }}"><i class="fa fa-edit"></i></a>
                                                    
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

