@extends('layouts.template')
@section('title', 'Listado de Inventario')
@section('content')


    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h1 class="text-white title-it"><i class="fas fa-warehouse"></i> Inventario</h1>
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
                        <div class="card-category"><i class="fab fa-creative-commons-nd"></i> Área Registradas</div>
                        <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">

                            <div class="table-responsive">
                                <table id="add-row"
                                    class="display table table-striped table-hover table-head-bg-primary add-row nowrap">
                                    <thead>
                                        <tr>
                                            <th style="width: 10%">Action</th>
                                            <th>Articulo</th>
                                            <th>Descripción</th>
                                            <th>Local inicial</th>
                                            <th>Ingreso</th>
                                            <th>Salida</th>
                                            <th>Existencia</th>
                                            <th>Usuario que creo</th>
                                            <th>Usuario que Modifico</th>
                                         
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($inventario as $key => $inventari)
                                        <tr>
                                                 <td>
                                                <div class="form-button-action">
                                                  
                                                    <button
                                                        onclick="myFunction('{{ route('Inventario.show', $inventari->id) }}')"
                                                        href="#mdsucur" rel="action" data-toggle="modal" title="Ver"
                                                        data-backdrop="static" data-keyboard="false"
                                                        class="btn btn-link btn-success btn-lg">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                </div>
                                            </td>
                                            <td>{{ $inventari->articulo->marca->nombres }} {{ $inventari->articulo->nombres }}</td>
                                            <td>{{ $inventari->descripcion }}</td>
                                            <td>{{ $inventari->incial }}</td>
                                            <td>{{ $inventari->ingreso }}</td>
                                            <td>{{ $inventari->articulosalida }}</td>
                                            <td>{{ $inventari->existencia }}</td>
                                            <td>{{ $inventari->usercrear }}</td>
                                            <td>{{ $inventari->usermodifica }}</td>
                                   
                                       

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
