<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <div class="text">
                <ul class="list-inline">
                    <li class="list-inline-item"> <i class="fab fa-ioxhost"></i></li>
                    <li class="list-inline-item">
                        <h3> <strong class="card-title"> Mostrar detalle de Inventario</strong>
                        </h3>
                    </li>
                </ul>
            </div>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">

            <div class="table-responsive">
                <table class="display table table-striped table-hover table-head-bg-primary">
                    <tr class="thh">
                        <th> Articulo:</th>
                        <td colspan="2"> {{ $inventario->articulo->marca->nombres }} {{ $inventario->articulo->nombres }}</td>

                        <th>Descripción:</th>
                        <td colspan="2"> {{ $inventario->descripcion }}</td>
                    </tr>
                    <tr class="thh">
                        <th> Usuario que ingreso:</th>
                        <td colspan="2"> {{ $inventario->usercrear }}</td>

                        <th>Usuario que registro salida:</th>
                        <td colspan="2"> {{ $inventario->usermodifica }}</td>
                    </tr>
                    <tr class="thh">
                        <th>Fecha de Ingreso:</th>
                        <td>{{ $inventario->created_at }}</td>
                        <td colspan="2"><strong>Última Fecha de salida:</strong></td>
                        <td>{{ $inventario->updated_at }}</td>
                    </tr>
                </table>
            </div>
            <div class="table-responsive">

                <table class="display table table-striped table-bordered add-roww nowrap">
                    <thead>
                        <tr class="table-info">
                            <th scope="col">Local-Inicial</th>
                            <th scope="col">Ingreso</th>
                            <th scope="col">Salida</th>
                            <th scope="col">Existencia</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="p-0 m-0">
                            <td>{{ $inventario->incial }}</td>
                            <td>{{ $inventario->ingreso }}</td>
                            <td>{{ $inventario->articulosalida }}</td>
                            <td>{{ $inventario->existencia }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
</script>
