<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Pdf Compra</title>
    
    <link rel="stylesheet" href="{{ asset('css/estilopdf.css') }}">
</head>

<body>

    <header>
        <div class="logo">
            <img src="{{ asset('img/quantika.png') }}" alt="navbar brand" class="navbar-brand">
        </div>

        <h1 class="nombr">
            <strong><i class="fas fa-wrench"></i> Compra registrada</strong>
        </h1>

    </header>
    <div class="">
        <h4 style="text-align: center;">Registro de compra</h4>

        <div class="panel-body">
            <div class="clien">
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
                    <h4 >Detalle de Compra</h4>
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


        <footer>
            <p>
                <strong> Derechos rersevados</strong>
            </p>

        </footer>

        <script type="text/php">
            if ( isset($pdf) ) {
            $pdf->page_script('
                $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
                $pdf->text(370, 570, "Pág $PAGE_NUM de $PAGE_COUNT", $font, 10);
            ');
        }
    </script>

</body>

</html>
