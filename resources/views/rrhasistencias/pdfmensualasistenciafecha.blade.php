<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Pdf Asistencia  mensual</title>
    
    <link rel="stylesheet" href="{{ asset('css/estilopdf.css') }}">
</head>

<body>

    <header>
        <div class="logo">
            <img src="{{ asset('img/quantika.png') }}" alt="navbar brand" class="navbar-brand">
        </div>

        <h1 class="nombr">
            <strong><i class="fas fa-wrench"></i> Asistencia registradas</strong>
        </h1>

    </header>
    <div class="">
        <h4 style="text-align: center;">Registro de Asistencia por fecha Mensual</h4>
        <h5 style="text-align: center;"><small> Desde {{ $fechainicial }}  hasta {{ $fechafinal }}</small></h5>
      
        <div class="table-responsive">
            <table id="add-row" class="display table table-striped table-hover table-head-bg-primary add-row nowrap" >
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Empleado</th>
                        <th>Hora de Entrada</th>
                        <th>Hora de Salida de Almuerzo</th>
                        <th>Hora de Entrada del Almuerzo</th>
                        <th>Hora de Salida del Trabajo</th>
                        <th  style="width: 10%">Total de Horas trabajadas y Minutos</th>
                    </tr>
                </thead>

                <tbody>
                                        

                    @foreach ($asistencia as $key => $cargo)
                    <tr>
                      <td>{{ $cargo->created_at->format('l jS \\of F Y') }} </td>
                      <td>{{ $cargo->rrhempleado->nombre }} {{ $cargo->rrhempleado->apellido }}</td>
                      <td>
                        {{ $cargo->horaentrada }}
                    </td>
                    <td>
                        {{ $cargo->horasalidaalmuerzo }}
                    </td>
                    <td>
                        {{ $cargo->horaentralmuezo }}
                    </td>
                    <td>
                        {{ $cargo->horasalida }}
                    </td>
                      <td>
                        {{ $cargo->totalhoras }}
                    </td>
                     
                    </tr>
                   @endforeach
                </tbody>
            </table>
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
