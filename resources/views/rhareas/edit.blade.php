@extends('layouts.template')
@section('title','Editar Cargo')
@section('content')


        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h1 class="text-white title-it"><i class="fas fa-globe"></i> Editar Cargo</h1>
                       
                        <h5 class="text-white op-7 mb-2"><i class="far fa-building"></i> Recursos Humanos</h5>
                    </div>
                 
                </div>
            </div>
        </div>
        <div class="page-inner mt--5">
            <div class="row mt--2">
                <div class="col-md-12">
                    <div class="card full-height">
                        <div class="card-body">
                            <div class="card-title"> <i class="fas fa-address-card"> Formulario</i></div>
                        <div class="card-category"><i class="fas fa-align-justify"></i> Registar</div>
                            <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                                <form action="{{ route('rhareas.update',$rrharea) }}" method="POST"  class="form-control">
                                    @csrf
                                    @method('put')
                                    <div class="form-group">
                                        <label for="nombre">Nombre:</label>
                                        <input type="text" name="nombre"  onKeyPress="return sololetrascoma(event)" 
                                        class="form-control" placeholder="Nombre"
                                               value="{{old('nombre',$rrharea->nombre)}}">
                                        @error('nombre')
                                        <div class="alert alert-danger" role="alert">
                                            <small>{{$message}}</small>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="ml-md-auto py-2 py-md-0">
                                        <a href="javascript: history.go(-1)" class="btn btn-danger btn-border btn-round mr-2"><i class="fas fa-reply"></i> Volver</a>
		<button class="btn btn-success btn-border btn-round mr-2" type="submit"><i class="fas fa-save" ></i> Ingresar</button>
                                      
                                    </div>
                                  </form>
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       
        </div>


@endsection

