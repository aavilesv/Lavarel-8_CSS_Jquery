<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Pdf Novedades</title>
    
    <link rel="stylesheet" href="{{ asset('css/estilopdf.css') }}">
</head>

<body>
    <header>
        <div class="logo">
            <img src="{{ asset('img/quantika.png') }}" alt="navbar brand" class="navbar-brand">
        </div>

        <h1 class="nombr">
            <strong><i class="fas fa-wrench"></i> Novedades Registradas</strong>
        </h1>
    </header>

    <h4 style="text-align: center;">Registro de todas la novedades</h4>
    @foreach ($novedades as $novedad)
    <h1>@if ($novedad->cclicontratocliente->servicio == 1)

        <span class="badge badge-success">
            Radio</span>
    @else
        <span class="badge badge-danger">
            Fibra</span>
    @endif</h1>
        <table class="display table table-striped table-hover add-row nowrap">
            
            <tr>
                <th>
                    <h1> #{{ $novedad->id }}</h1>
                </th>
                <th colspan="4"> Novedad Registrada por: {{ $novedad->tecnico }}</th>
            </tr>
            <tr>
                <th> Cliente:</th>
                <td colspan="2">
                    {{ $novedad->cclicontratocliente->cliente->nombre }}-{{ $novedad->cclicontratocliente->cliente->apellido }}
                </td>
                <th> Hora de novedad:</th>
                <td colspan="2">{{ $novedad->horainciar }}</td>
            </tr>
            <tr>
                <th> Fecha de visita:</th>
                <td colspan="2">{{ $novedad->fechavisita }}</td>
                <th> Hora de visita:</th>
                <td colspan="2">{{ $novedad->horavisita }}</td>
            </tr>
            <tr>
                <th>Contacto 1:</th>
                <td>{{ $novedad->cclicontratocliente->contacto }}</td>
                <th><strong>Contacto 2:</strong></th>
                <td> {{ $novedad->cclicontratocliente->contacto1 }}</td>
                <th><strong>Correo electronico:</strong></th>
                <td> {{ $novedad->cclicontratocliente->cliente->email }}</td>
            </tr>
            <tr>
                <th>Novedad o percance:</th>
                <td colspan="1">
                    @if ($novedad->novedadopercance === 1)
                        <span class="badge badge-success">Instalación</span>
                    @elseif($novedad->novedadopercance === 2)
                        <span class="badge badge-info">Retiro de Equipo</span>
                    @elseif($novedad->novedadopercance === 3)
                        <span class="badge badge-warning">Reinstalación</span>
                    @elseif($novedad->novedadopercance === 4)
                        <span class="badge badge-danger">Intermitente</span>
                    @elseif($novedad->novedadopercance === 5)
                        <span class="badge badge-info">Lento</span>
                    @elseif($novedad->novedadopercance === 6)
                        <span class="badge badge-warning">Desconf. Router</span>
                    @elseif($novedad->novedadopercance === 7)
                        <span class="badge badge-warning">Cable. Dañado</span>
                    @elseif($novedad->novedadopercance === 8)
                        <span class="badge badge-info">Problema de Equipos</span>


                    @elseif($novedad->novedadopercance === 9)
                        <span class="badge badge-info">Sin servicio</span>
                    @elseif($novedad->novedadopercance === 10)
                        <span class="badge badge-info">Otros</span>

                    @endif
                </td>
                <th>Provincia-Cantón:</th>
                <td>{{ $novedad->cclicontratocliente->canton->provincia->name }}-{{ $novedad->cclicontratocliente->canton->name }}
                </td>
                <th>Cdla o Recinto:</th>
                <td>{{ $novedad->cclicontratocliente->cdaorecinto }}</td>
            </tr>
            <tr>
                <th>
                    GPS:
                </th>
                <td>
                    <a class="" data-toggle="tooltip" data-original-title="Abrir Ubicación del cliente GPS"
                        target="_blank" href="{{ $novedad->cclicontratocliente->gps }}"><i
                            class="fas fa-external-link-alt"></i> Abrir
                        Ubicación</a>
                </td>
                <th>
                    Dirección:
                </th>
                <td colspan="3">
                    {{ $novedad->cclicontratocliente->direccion }}
                </td>
            </tr>
            <tr>
                <th>
                    Especificar:
                </th>
                <td colspan="5">
                    {{ $novedad->especificar }}
                </td>
            </tr>
        </table>
        <div class="table-responsive">
            <table class="display table table-striped table-hover nowrap">
                <thead>
                    <tr>
                        <th style="text-align: center;" colspan="4">
                            <h1>Referencias Familiares para visita de soporte en casa</h1>
                        </th>
                    </tr>
                    <tr>
                        <th>Nombre</th>
                        <th>Parantesco</th>
                        <th>Celular</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td> {{ $novedad->nombre }}</td>
                        <td> {{ $novedad->parentesco }}</td>
                        <td> {{ $novedad->celular }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="table-responsive">
            <table class="display table table-striped table-hover nowrap">
                <thead>
                    <tr>
                        <th style="text-align: center;" colspan="4">
                            <h1>Referencias Familiares en contrato </h1>
                        </th>
                    </tr>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Parantesco</th>
                        <th>Celular</th>
                    </tr>
                </thead>

                <tbody>



                    <tr>
                        <td> {{ $novedad->cclicontratocliente->rnombre }}</td>
                        <td> {{ $novedad->cclicontratocliente->rapellido }}</td>
                        <td> {{ $novedad->cclicontratocliente->rparantesco }}</td>
                        <td> {{ $novedad->cclicontratocliente->rcelular }} </td>

                    </tr>
                    <tr>
                        <td> {{ $novedad->cclicontratocliente->nombre }}</td>
                        <td> {{ $novedad->cclicontratocliente->apellido }}</td>
                        <td> {{ $novedad->cclicontratocliente->parantesco }}</td>
                        <td> {{ $novedad->cclicontratocliente->celular }} </td>

                    </tr>

                </tbody>
            </table>
        </div>
    @endforeach



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
