@extends('layouts.template')
@section('title', 'Listado de Proveedores')
@section('content')


    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div> 

                    <h1 class="text-white title-it"><i class="fas fa-user-friends"></i> Proveedores</h1>

                    <h5 class="text-white op-7 mb-2"><i class="fas fa-shopping-cart"></i> Compras</h5>
                </div>
                <div class="ml-md-auto py-2 py-md-0">
                    <button onclick="myFunction('{{ route('proveedor.create') }}')" href="#mdsucur" rel="action"
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
                        <div class="card-category"><i class="fab fa-creative-commons-nd"></i> Proveedores Registrados</div>
                        <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">

                            <div class="table-responsive">
                                <table id="add-row"
                                    class="display table table-striped table-hover table-head-bg-primary add-row">
                                    <thead>
                                        <tr>
                                            <th>#Cod</th>
                                            <th>Nombre</th>
                                            <th>Dirección</th>
                                            <th>Cédula</th>
                                            <th>Email</th>
                                            <th>Telefono</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>


                                        @foreach ($proveedor as $key => $proveedo)
                                            <tr>
                                                <td>{{ $proveedo->id }}</td>
                                                <td>{{ $proveedo->nombres }}</td>
                                                <td>{{ $proveedo->direccion }}</td>
                                                <td>{{ $proveedo->cedula }}</td>
                                                <td>{{ $proveedo->email }}</td>
                                                <td>{{ $proveedo->telefono }}</td>
                                             
                                                <td>
                                                    <div class="form-button-action">
                                                        <button
                                                            onclick="myFunction('{{ route('proveedor.edit', $proveedo->id) }}')"
                                                            href="#mdsucur" rel="action" data-toggle="modal"
                                                            title="Editar" data-backdrop="static"
                                                            data-keyboard="false" class="btn btn-link btn-primary btn-lg">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                        <a class="btn btn-link btn-danger btn-eliminar"
                                                        data-toggle="tooltip" data-original-title="Eliminar"
                                                        data-json='{"id":"{{ $proveedo->id }}"}' rel="action"><i
                                                            class="fa fa-times"></i></a>

                                                    </div>
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- modal-->
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
                                            <form method="POST" action="{{ route('proveedor.destroy', 0) }}">
                                                <div class="row">
                                                    @csrf
                                                    @method('delete')
                                                    <input type="hidden" name="id" id="cid" value="">
                                                    <div class="col-sm-12">
                                                        <div class="form-group form-group-default">
                                                            <label>Nombre Y Apellido</label>
                                                            <input id="descripcion" type="text" disabled
                                                                class="form-control" placeholder="Nombre Apellidos">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 pr-0">
                                                        <div class="form-group form-group-default">
                                                            <label>Cedula</label>

                                                            <input type="text" name="cedula" id="ccedula" disabled
                                                                class="form-control" placeholder="Cedula">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-group-default">
                                                            <label>Email</label>
                                                            <input id="cdireccion" type="text" disabled class="form-control"
                                                                placeholder="fill office">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer no-bd">

                                                    <button type="button" class="btn btn-success"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" id="addRowButton"
                                                        class="btn btn-danger">Eliminar</button>

                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- fin--->
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

                var nombreapellido = $(this).parents('tr').children('td').eq(1).html();
                var cedula = $(this).parents('tr').children('td').eq(3).html();
                var direccion = $(this).parents('tr').children('td').eq(4).html();
                $('#descripcion').val(nombreapellido);
                $('#cid').val(id);
                $('#ccedula').val(cedula);
                $('#cdireccion').val(direccion);

                $('#addRowModal').modal();



            });
        });

    </script>
@endsection
