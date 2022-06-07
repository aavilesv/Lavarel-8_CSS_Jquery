@extends('layouts.template')
@section('title', 'Planes ingresos')
@section('content')
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h1 class="text-white title-it"><i class="flaticon-laptop"></i> Planes</h1>
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
                        <div class="card-category"><i class="fab fa-creative-commons-nd"></i> Ingresar planes y servicios
                         </div>
                        <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                            <form action="{{ route('planes.store') }}" method="POST" class="form-control form-createe"
                                enctype="multipart/form-data">
                                <!--estogenera el token de validacion  -->
                                @csrf
                                <div class="card full-height">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <i class="fas fa-chalkboard-teacher"></i> Datos del Plan
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <ol class="activity-feed">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <li class="feed-item feed-item-success">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Descripción:</time>
                                                            <input type="text" name="descripcion" maxlength="200"
                                                            class="form-control input-border-bottom decimales"
                                                             required placeholder="Ejemplo: Plan de 40 Megas,Plan de 20 Megas">
                                                        </div>
                                                        
                                                    </li>
                                                </div>
                                                <div class="col-md-6">
                                                    <li class="feed-item feed-item-success">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Valor$:</time>
                                                            <input type="text" name="valor" maxlength="200"
                                                            class="form-control input-border-bottom recibo"
                                                             required placeholder="0.00">
                                                        </div>
                                                        
                                                    </li>
                                                </div>
                                                <div class="col-md-6">
                                                    <li class="feed-item feed-item-success">
                                                        <time class="date col-12" datetime="9-25">Servicio</time>
                                                        <select
                                                            class="chosen-selectt form-control input-border-bottom cliente_id" required 
                                                            name="status" data-placeholder="Servicio">
                                                            <option value="" selected disabled hidden>Seleccione un servicio</option>
                                                            <option value="1">Radio</option>
                                                            <option value="0">Fibra</option>
                                                        </select>
                                                        @error('cliente_id')
                                                            <div class="alert alert-danger" role="alert">
                                                                <small>{{ $message }}</small>
                                                            </div>
                                                        @enderror
                                                    </li>
                                                </div>
                                                <div class="col-sm-6 col-md-6">
                                                    <li class="feed-item feed-item-primary">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Foto</time>
                                                            <input type="file" id="archivo" name="foto"
                                                                class="form-control input-border-bottom imagejs"
                                                                required
                                                                accept="image/*" oncut="return false" oncopy="return false"
                                                                onpaste="return false" placeholder="requerido" value="sd">
                                                        </div>
                                                    </li>
                                                </div>
                                            </div>
                                        </ol>
                                        

                                        <div class="ml-md-auto py-2 py-md-0">
                                            <a href="javascript: history.go(-1)" class="btn btn-danger btn-border btn-round mr-2"><i class="fas fa-reply"></i> Volver</a>
                                            <button id="btn-registrar" class="btn btn-success btn-border btn-round mr-2" type="submit"><i class="fas fa-save"></i> Ingresar</button>
                                        </div>


                                        <!--<a href="javascript:history.back()"> Volver Atrás</a>-->




                                    </div>
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
        $('.chosen-selectt').select2();
        
        $(".recibo").numeric({
            negative: false,
            decimalPlaces: 2
        });
    </script>
@endsection
