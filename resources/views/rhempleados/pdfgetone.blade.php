<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Pdf Empleado</title>
    
    <link rel="stylesheet" href="{{ asset('css/estilopdf.css') }}">
</head>

<body>

    <header>
        <div class="logo">
            <img src="{{ asset('img/quantika.png') }}" alt="navbar brand" class="navbar-brand">
        </div>

        <h1 class="nombr">
            <strong><i class="fas fa-wrench"></i> Empleados Regristrado</strong>
        </h1>

    </header>
    <div class="">
        <h4 style="text-align: center;">Registro del Empleado</h4>
      
            <table class="display table table-striped table-hover add-row nowrap">
                <tr>
                    <th> Empleado #{{ $cliente->id }}</th>
                </tr>
                <tr>

                    <th>Nombres</th>
                    <td colspan="1">{{ $cliente->nombre }}</td>
                    <th>Apellidos</th>
                    <td colspan="2">{{ $cliente->apellido }}</td>
                    </td>
                </tr>
                <tr>
                    <th><strong>Correo electronico:</strong></th>
                    <td> {{ $cliente->email }}</td>
                    <th><strong>Cedula:</strong></th>
                    <td> {{ $cliente->cedula }}</td>
                </tr>
                <tr>
                    <th><strong>Cdla o Recinto:</strong></th>
                    <td> {{ $cliente->cdaorecinto }}</td>
                    <th><strong>Contacto:</strong></th>
                    <td> {{ $cliente->contacto }}</td>
                </tr>
                <tr>
                    <th><strong>Contacto 2:</strong></th>
                    <td> {{ $cliente->contacto1 }}</td>
                    <th><strong>Fecha de nacimiento:</strong></th>
                    <td> {{ $cliente->fechanacimiento }}</td>
                </tr>

                <tr>
                    <th><strong>Licencia:</strong></th>
                    <td> {{ $cliente->licencia }}</td>
                    <th><strong>Fecha de ingreso:</strong></th>
                    <td> {{ $cliente->fechaingreso }}</td>
                </tr>
                <tr>
                    <th><strong>Sueldo:</strong></th>
                    <td> {{ $cliente->sueldo }}</td>
                    <th><strong>Cantón-Provincia:</strong></th>
                    <td> {{ $cliente->canton->name }}-{{ $cliente->canton->provincia->name }}</td>
                </tr>

                <tr>
                    <th><strong>Area:</strong></th>
                    <td> {{ $cliente->rrharea->nombre }}</td>
                    <th><strong>Cargo:</strong></th>
                    <td> {{ $cliente->rrhcargo->nombre }}</td>
                </tr>
                <tr>
                    <th><strong>Profesión:</strong></th>
                    <td> {{ $cliente->rrhprofesion->descripcion }}</td>
                    <th><strong>Sexo:</strong></th>
                    <td>                      @if ($cliente->sexo === 1)

                        <span class="badge badge-success">Masculino</span>
                    @else
                        <span class="badge badge-primary">Femenino</span>
                    @endif</td>
                </tr>
                <br>


            </table>
       
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
