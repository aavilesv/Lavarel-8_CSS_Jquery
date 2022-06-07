<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <div class="text">
                <ul class="list-inline">
                    <li class="list-inline-item">
                        <h3 class="display-4"> <i class="flaticon-shopping-bag"></i></h3>
                    </li>
                    <li class="list-inline-item">
                        <h3 class="display-4"> Compra </h3>
                    </li>
                </ul>
            </div>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div id="content_frame">
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="display table table-striped 
                        table-hover table-head-bg-primary">
                            <tr class="thh">
                                <th> Sr.(es):</th>
                                <td colspan="2"> {{ $compra->proveedor->nombres }}</td>

                                <th>#Factura:</th>
                                <td colspan="2"> {{ $compra->factura }}</td>
                            </tr>
                            <tr class="thh">
                                <th>RUC/CI:</th>
                                <td>{{ $compra->proveedor->cedula }}</td>
                                <td><strong>Fecha:</strong></td>
                                <td>{{ $compra->fecha }}</td>
                            </tr>
                            <tr class="thh">
                                <th>Dirección:</th>
                                <td colspan="2">{{ $compra->proveedor->direccion }}</td>
                                <th>Celular:</th>
                                <td colspan="2">{{ $compra->proveedor->telefono }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="panel panel-info">
                        <div class="table-responsive">
                            <h4 class="display-4">Detalle de Compra</h4>
                            <table class="display table table-striped 
                        table-bordered add-roww nowrap">
                                <thead>
                                    <tr class="table-info">
                                        <th scope="col">Articulo</th>
                                        <th scope="col">Cantidad</th>
                                        <th scope="col">V.Unit.</th>
                                        <th scope="col">V.I Total</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse  ($detallecompra as $key => $compr)
                                        <tr class="p-0 m-0">
                                            <td>{{ $compr->articulo->marca->nombres }}
                                                {{ $compr->articulo->nombres }}</td>
                                            <td>{{ $compr->cantidad }}</td>
                                            <td>${{ $compr->precio }}</td>
                                            <td>${{ $compr->totalprecio }}</td>
                                        </tr>
                                    @empty

                                        <tr>
                                            <td colspan="100">
                                                <center>No existen registros</center>
                                            </td>
                                        </tr>

                                    @endforelse
                                </tbody>
                            </table>
                            <br>
                            <table class="display table table-striped 
                            table-bordered">
                                <tr>
                                    <th colspan="2">FORMA DE PAGO</th>
                                    <th rowspan="2" colspan="1"> Total</th>
                                    <td rowspan="2" colspan="1">${{ $compra->total }}</td>

                                </tr>
                                <tr>
                                    <th>EFECTIVO</th>
                                    <td>${{ $compra->total }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('.add-roww').DataTable({
        "pageLength": 4,
    });

</script>
