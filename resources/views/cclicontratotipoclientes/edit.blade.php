@extends('layouts.template')
@section('title', 'Editar Tipo de Contrato')
@section('content')


    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h1 class="text-white title-it"><i class="far fa-file-alt"></i> Editar Tipo de Contrato</h1>

                    <h5 class="text-white op-7 mb-2"><i class="fas fa-folder-open"></i> Contratos Clientes</h5>
                </div>

            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="row mt--2">
            <div class="col-md-12">
                <div class="card full-height">
                    <div class="card-body">
                        <div class="card-title"> <i class="far fa-file-alt"> Formulario</i></div>
                        <div class="card-category"><i class="fas fa-align-justify"></i> Registar</div>
                        <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                            <form action="{{ route('tipocontrato.update', $rrhtipocontrato) }}" method="POST"
                                class="form-control">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label for="descripcion">Nombre:</label>
                                    <input type="text" name="descripcion"
                                        class="form-control" placeholder="Descripcion"
                                        value="{{ old('descripcion', $rrhtipocontrato->descripcion) }}">
                                    @error('descripcion')
                                        <div class="alert alert-danger" role="alert">
                                            <small>{{ $message }}</small>
                                        </div>
                                    @enderror
                                </div>
                                <div class="ml-md-auto py-2 py-md-0">
                                    <a href="{{ route('tipocontrato.index') }}"
                                        class="btn btn-danger btn-border btn-round mr-2"><i class="fas fa-reply"></i>
                                        Cancelar</a>
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
