@extends('layouts.template')
@section('title', 'Listado de Salidas')
@section('content')


    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h1 class="text-white title-it"><i class="fas fa-truck"></i> Salidas de Árticulos</h1>

                    <h5 class="text-white op-7 mb-2"><i class="fas fa-warehouse"></i> Inventario</h5>
                </div>
                <div class="ml-md-auto py-2 py-md-0">
                    <button onclick="myFunction('{{ route('LocalInventario.create') }}')" href="#mdsucur" rel="action"
                        data-toggle="modal" title="Ingresar" data-backdrop="static" data-keyboard="false"
                        class="btn btn-success btn-round ml-auto">
                        <i class="fa fa-plus">Ingresar</i>
                    </button>

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
                                <table id="add-row"
                                    class="display table table-striped table-hover table-head-bg-primary add-row">
                                    <thead>
                                        <tr>
                                            <th style="width: 10%">Action</th>
                                            <th>#Factura</th>
                                            <th>Fecha</th>
                                            <th>Descripción</th>
                                            <th>Cantidad</th>
                                            <th>codigo</th>
                                            <th>codig</th>
                                            <th>cliente</th>
                                            <th>Articulo</th>
                                           
                                        </tr>
                                    </thead>

                                    <tbody>


                                        @foreach ($salidas as $key => $marc)
                                            <tr>
                                                <td>
                                                    <div class="form-button-action">
                                                        <button
                                                            onclick="myFunction('{{ route('LocalInventario.edit', $marc->id) }}')"
                                                            href="#mdsucur" rel="action" data-toggle="modal"
                                                            title="Editar" data-backdrop="static"
                                                            data-keyboard="false" class="btn btn-link btn-primary btn-lg">
                                                            <i class="fa fa-edit"></i>
                                                        </button>

                                                    </div>
                                                </td>
                                                <td>{{ $marc->factura }}</td>
                                                <td>{{ $marc->fecha }}</td>
                                                <td>{{ $marc->accion }}</td>
                                                <td>{{ $marc->cantidad }}</td>
                                                <td>{{ $marc->codigo }}</td>
                                                <td>{{ $marc->codig }}</td>
                                                <td>{{ $marc->cliente }}</td>
                                                <td>{{ $marc->articulo }}</td>
                                                

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
    <div class="modal face animated rotateIn" id="mdsucur" role="dialog">
    </div>

@endsection
@section('modal')

@endsection
@section('scripts')
    <script>
        function myFunction(url) {
            $('#mdsucur').load(url, function() {
                $('#mdsucur').modal({
                    backdrop: 'static',
                    keyboard: false,
                    show: true,
                    remote: false
                });
            });
            return false;
        }
       
    </script>
@endsection
