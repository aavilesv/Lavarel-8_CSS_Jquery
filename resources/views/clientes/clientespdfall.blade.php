<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Pdf Clientes</title>
    
    <link rel="stylesheet" href="{{ asset('css/estilopdf.css') }}">
</head>
<body>
               
    <header>
        <div class="logo">
            <img src="{{ asset('img/quantika.png') }}" alt="navbar brand" class="navbar-brand">
        </div>
        
        <h1 class="nombr">
            <strong><i class="fas fa-wrench"></i> Clientes Regristrados</strong>
        </h1>
       
    </header>
    <div class="">
        <h4 style="text-align: center;">Registro de todos los clientes</h4>
        @foreach ($clientes as $cliente)
        <table class="display table table-striped table-hover add-row nowrap">
           <tr>
            <th> Cliente #{{ $cliente->id }}</th>
           </tr>
            <tr>
               
                <th>Nombres</th>
                <td colspan="2">{{ $cliente->nombre }}</td>
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
                <th><strong>Genero:</strong></th>
                <td>                     @if ($cliente->sexo === 1)

                    <span class="badge badge-success">Masculino</span>
                @else
                    <span class="badge badge-primary">Femenino</span>
                @endif</td>
                <th><strong>Estado Civil:</strong></th>
                <td>     @if ($cliente->estadocivil === 1)
                    <span class="badge badge-info">Casado</span>
                @elseif($cliente->estadocivil === 2)
                    <span class="badge badge-primary">Soltero</span>
                @else
                    <span class="badge badge-info">Divorciado</span>
                @endif</td>
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