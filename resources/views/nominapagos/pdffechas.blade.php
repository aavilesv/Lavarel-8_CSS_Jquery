<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Pdf Nomina de pago</title>
    
    <link rel="stylesheet" href="{{ asset('css/estilopdf.css') }}">
</head>

<body>

    <header>
        <div class="logo">
            <img src="{{ asset('img/quantika.png') }}" alt="navbar brand" class="navbar-brand">
        </div>

        <h1 class="nombr">
            <strong><i class="fas fa-wrench"></i> Roles registrados</strong>
        </h1>

    </header>
    <div class="">
        <h4 style="text-align: center;">Registro de todos los roles de pago</h4>
        <h5 style="text-align: center;"><small> Desde {{ $fechainicial }}  hasta {{ $fechafinal }}</small></h5>
        @foreach ($nominas as $nomina)
            <table class="display table table-striped table-hover add-row nowrap">
                <tr>
                    <th colspan="2"> Rol de pago #{{ $nomina->id }}</th>
                    <th>Días Laborales</th>
                    <td colspan="1"> {{ $nomina->dialaborales }}</td>

                </tr>
                <tr>

                    <th>Empleado</th>
                    <td colspan="1"> {{ $nomina->rrhempleado->nombre }}</td>


                    <th>Apellidos</th>
                    <td colspan="2"> {{ $nomina->rrhempleado->apellido }}</td>
                    </td>
                </tr>
                <tr>

                    <th><strong>Cedula:</strong></th>
                    <td> {{ $nomina->rrhempleado->cedula }}</td>
                    <th><strong>Profesión:</strong></th>
                    <td> {{ $nomina->rrhempleado->rrhprofesion->descripcion }}</td>
                </tr>
                <tr>
                    <th><strong>Area:</strong></th>
                    <td> {{ $nomina->rrhempleado->rrharea->nombre }}</td>
                    <th><strong>Cargo:</strong></th>
                    <td> {{ $nomina->rrhempleado->rrhcargo->nombre }}</td>
                </tr>
                <tr>
                    <th><strong>Sueldo:</strong></th>
                    <td> ${{ $nomina->sueldo }}</td>
                    <th><strong>Prestamos quirogra iess:</strong></th>
                    <td> ${{ $nomina->prestamosquirogramaiess }}</td>

                </tr>
                <tr>
                    <th><strong>Horas Extras:</strong></th>
                    <td> ${{ $nomina->horasextras }}</td>
                    <th><strong>Aporte al IESS:</strong></th>
                    <td> ${{ $nomina->aporteiess }}</td>
                </tr>
                <tr>
                    <th><strong>Comisiones:</strong></th>
                    <td>${{ $nomina->comisiones }}</td>
                    <th><strong>Prestamos y Anticipos:</strong></th>
                    <td>${{ $nomina->prestamosyanticipos }}</td>
                </tr>
                <tr>
                    <th><strong>Liquido a Recibir:</strong></th>
                    <td> ${{ $nomina->liquido }}</td>
                    <th><strong>Total de Descuentos:</strong></th>
                    <td> ${{ $nomina->totaldescuentos }}</td>
                </tr>
                <br>


            </table>
        @endforeach
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
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Pdf Nomina de pago</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/estilopdf.css') }}">
</head>

<body>

    <header>
        <div class="logo">
            <img src="{{ asset('img/quantika.png') }}" alt="navbar brand" class="navbar-brand">
        </div>

        <h1 class="nombr">
            <strong><i class="fas fa-wrench"></i> Roles registrados</strong>
        </h1>

    </header>
    <div class="">
        <h4 style="text-align: center;">Registro de todos los roles de pago</h4>
        @foreach ($nominas as $nomina)
            <table class="display table table-striped table-hover add-row nowrap">
                <tr>
                    <th colspan="2"> Rol de pago #{{ $nomina->id }}</th>
                    <th>Días Laborales</th>
                    <td colspan="1"> {{ $nomina->dialaborales }}</td>

                </tr>
                <tr>

                    <th>Empleado</th>
                    <td colspan="1"> {{ $nomina->rrhempleado->nombre }}</td>


                    <th>Apellidos</th>
                    <td colspan="2"> {{ $nomina->rrhempleado->apellido }}</td>
                    </td>
                </tr>
                <tr>

                    <th><strong>Cedula:</strong></th>
                    <td> {{ $nomina->rrhempleado->cedula }}</td>
                    <th><strong>Profesión:</strong></th>
                    <td> {{ $nomina->rrhempleado->rrhprofesion->descripcion }}</td>
                </tr>
                <tr>
                    <th><strong>Area:</strong></th>
                    <td> {{ $nomina->rrhempleado->rrharea->nombre }}</td>
                    <th><strong>Cargo:</strong></th>
                    <td> {{ $nomina->rrhempleado->rrhcargo->nombre }}</td>
                </tr>
                <tr>
                    <th><strong>Sueldo:</strong></th>
                    <td> ${{ $nomina->sueldo }}</td>
                    <th><strong>Prestamos quirogra iess:</strong></th>
                    <td> ${{ $nomina->prestamosquirogramaiess }}</td>

                </tr>
                <tr>
                    <th><strong>Horas Extras:</strong></th>
                    <td> ${{ $nomina->horasextras }}</td>
                    <th><strong>Aporte al IESS:</strong></th>
                    <td> ${{ $nomina->aporteiess }}</td>
                </tr>
                <tr>
                    <th><strong>Comisiones:</strong></th>
                    <td>${{ $nomina->comisiones }}</td>
                    <th><strong>Prestamos y Anticipos:</strong></th>
                    <td>${{ $nomina->prestamosyanticipos }}</td>
                </tr>
                <tr>
                    <th><strong>Liquido a Recibir:</strong></th>
                    <td> ${{ $nomina->liquido }}</td>
                    <th><strong>Total de Descuentos:</strong></th>
                    <td> ${{ $nomina->totaldescuentos }}</td>
                </tr>
                <br>


            </table>
        @endforeach
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
