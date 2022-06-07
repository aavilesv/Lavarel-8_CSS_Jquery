@extends('layouts.template')
@section('title', 'Listado de Compras')
@section('content')


    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h1 class="text-white title-it"><i class="fas fa-shopping-cart"></i> Compras</h1>

                    <h5 class="text-white op-7 mb-2"><i class="fas fa-shopping-cart"></i> Compras</h5>
                </div>
                <div class="ml-md-auto py-2 py-md-0">
                    <a class="btn btn-success btn-round ml-auto" data-toggle="tooltip" data-original-title="Ingresar"
                        href="{{ route('compra.create') }}"><i class="fa fa-plus"></i> Ingresar</a>


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
                        <div class="card-category"><i class="fab fa-creative-commons-nd"></i> Compras Registradas</div>
                        <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped 
                                        table-hover table-head-bg-primary add-row">
                                    <thead>
                                        <tr>
                                            <th>#ID</th>
                                            <th>#Factura</th>
                                            <th>Proveedor</th>
                                            <th>Fecha</th>
                                            <th>Total</th>
                                            <th>Estado</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($compra as $key => $compr)
                                            <tr>
                                                <td>{{ $compr->id }}</td>
                                                <td>{{ $compr->factura }}</td>
                                                <td>{{ $compr->proveedor->nombres }}</td>
                                                <td>{{ $compr->created_at }}</td>
                                                <td>${{ $compr->total }}</td>
                                                <td>
                                                    @if ($compr->status === 1)
                                                        <span class="badge badge-success">Activo</span>
                                                    @else
                                                        <span class="badge badge-danger">Inactivo</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="form-button-action">
                                                        <button
                                                            onclick="myFunction('{{ route('compra.show', $compr->id) }}')"
                                                            href="#mdsucur" rel="action" data-toggle="modal" title="Ver"
                                                            data-backdrop="static" data-keyboard="false"
                                                            class="btn btn-link btn-success btn-lg">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                        <!--
                                                        <button
                                                            onclick="myFunction('{{ route('articulo.edit', $compr->id) }}')"
                                                            href="#mdsucur" rel="action" data-toggle="modal" title="Devolver"
                                                            data-backdrop="static" data-keyboard="false"
                                                            class="btn btn-link btn-danger btn-lg">
                                                            <i class="fas fa-window-minimize"></i>
                                                        </button>-->
                                                        <a class="btn btn-link btn-info btn-lg" data-toggle="tooltip"
                                                        data-original-title="Imprimir" target="_blank"
                                                        href="{{ route('pdfcompraone.compraone',$compr->id) }}">
                                                        <i class="icon-printer"></i></a>
                                                       
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
        $(document).ready(function() {

            $('.conteinerr').on('click', 'a[rel="action"]', function() {

                var data = $(this).data('json'),
                    action = data.action,
                    id = data.id;

                var nombreapellido = $(this).parents('tr').children('td').eq(2).html();
                var cedula = $(this).parents('tr').children('td').eq(3).html();
                var direccion = $(this).parents('tr').children('td').eq(9).html();
                $('#descripcion').val(nombreapellido);
                $('#cid').val(id);
                $('#ccedula').val(cedula);
                $('#cdireccion').val(direccion);

                $('#addRowModal').modal();



            });
        });

    </script>
@endsection
