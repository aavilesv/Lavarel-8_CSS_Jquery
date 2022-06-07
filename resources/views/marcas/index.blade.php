@extends('layouts.template')
@section('title', 'Listado de Marcas')
@section('content')


    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h1 class="text-white title-it"><i class="fab fa-sellsy"></i> Marcas</h1>

                    <h5 class="text-white op-7 mb-2"><i class="fas fa-shopping-cart"></i> Compras</h5>
                </div>
                <div class="ml-md-auto py-2 py-md-0">
                    <button onclick="myFunction('{{ route('marca.create') }}')" href="#mdsucur" rel="action"
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
                                            <th>#Cod</th>
                                            <th>Nombre</th>
                                            <th>Estado</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>


                                        @foreach ($marca as $key => $marc)
                                            <tr>
                                                <td>{{ $marc->id }}</td>
                                                <td>{{ $marc->nombres }}</td>
                                                <td>
                                                    @if ($marc->status === 1)

                                                        <span class="badge badge-success">Activo</span>
                                                    @else
                                                        <span class="badge badge-danger">Inactivo</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="form-button-action">
                                                        <button
                                                            onclick="myFunction('{{ route('marca.edit', $marc->id) }}')"
                                                            href="#mdsucur" rel="action" data-toggle="modal"
                                                            title="Editar" data-backdrop="static"
                                                            data-keyboard="false" class="btn btn-link btn-primary btn-lg">
                                                            <i class="fa fa-edit"></i>
                                                        </button>

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
