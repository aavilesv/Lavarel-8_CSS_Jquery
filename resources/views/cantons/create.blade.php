@extends('layouts.template')
@section('title', 'Registro de Cantón')
@section('content')
<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h1 class="text-white title-it"><i class="fas fa-map-signs"></i> Crear CANTÓN</h1>
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
                    <div class="card-title"> <i class="fab fa-creative-commons-nd"></i> Formulario</i></div>
                    <div class="card-category"><i class="fas fa-align-justify"></i> Registar</div>
                    <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                      
                        <form action="{{ route('cantons.ingresar') }}" method="POST" class="form-control form-createe">
                            <!--estogenera el token de validacion  -->
                            @csrf
                            <div class="form-group">
                                <label for="provincia_id">Provincia:</label>
                                <select class="chosen-select form-control" id="provincia_id" name="provincia_id"
                                    data-placeholder="Sucursal">
                                        <option value="" selected disabled hidden>Seleccione una provincia</option>
                                        @foreach ($provincia as $pronvi)
                                            <option value="{{ $pronvi->id }}">{{ $pronvi->name }}</option>
                                            s
                                        @endforeach
                                </select>
                                @error('provincia_id')
                                    <div class="alert alert-danger" role="alert">
                                        <small>{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">Nombre:</label>
                                <input type="text" name="name" onKeyPress="return sololetrascoma(event)" class="form-control"
                                    placeholder="Nombre" value="{{ old('name') }}">
                                @error('name')
                                    <div class="alert alert-danger" role="alert">
                                        <small>{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>
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
        $('.form-createe').submit(function(e) {
            e.preventDefault();
            swal({
                title: 'Esta seguro?',
                text: "Enviar Datos!",
                type: 'info',
                icon:'info',
                buttons: {
                    cancel: {
                        visible: true,
                        text: 'No, cancelar!',
                        className: 'btn btn-danger'
                    },
                    confirm: {
                        text: 'Si, Enviar datos!',
                        className: 'btn btn-success'
                    }
                }
            }).then((willDelete) => {
                if (willDelete) {
                    this.submit();
                } else {

                }
            });
        });

    </script>
@endsection
