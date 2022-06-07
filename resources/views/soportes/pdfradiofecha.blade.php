<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Pdf Informe de Radio</title>
        <link rel="stylesheet" href="{{ asset('css/estilopdf.css') }}">
    
</head>

<body>
    <header>
        <div class="logo">
            <img src="{{ asset('img/quantika.png') }}" alt="navbar brand" class="navbar-brand">
        </div>
        
        <h1 class="nombr">
            <strong><i class="fas fa-wrench"></i> Reporte Soporte Técnico</strong>
        </h1>
      
    </header>
    
    <h4 style="text-align: center;">Informe de soportes en Radio</h4>
    <h5 style="text-align: center;"><small> Desde {{ $fechainicial }}  hasta {{ $fechafinal }}</small></h5>
    @foreach ($informeradio as $informeradio)
        <table class="display table table-striped table-hover add-row nowrap">
            <tr>
                <th> #{{ $informeradio->id }}</th>
                <th>Fecha de novedad:</th>
                <td>{{ $informeradio->novedad->created_at }}</td>
                <th>Fecha de visita:</th>
                <td>{{ $informeradio->fecha }}</td>

                <th>Técnico:</th>
                <td colspan="3">{{ $informeradio->usuario }}</td>
            </tr>
            <tr>
                <th> Cliente:</th>
                <td colspan="2">
                    {{ $informeradio->novedad->cclicontratocliente->cliente->nombre }}-
                    {{ $informeradio->novedad->cclicontratocliente->cliente->apellido }}
                    -{{ $informeradio->novedad->cclicontratocliente->contratocodigo }}
                </td>
                <th> Hora de Llegada:</th>
                <td>{{ $informeradio->horallegada }}</td>
                <th> Hora de Salida:</th>
                <td>{{ $informeradio->horasalida }}</td>
            </tr>

            <tr>
                <th>Novedad o percance:</th>
                <td colspan="1">
                    @if ($informeradio->novedad->novedadopercance === 1)
                        <span class="badge badge-success">Instalación</span>
                    @elseif($informeradio->novedad->novedadopercance === 2)
                        <span class="badge badge-info">Retiro de Equipo</span>
                    @elseif($informeradio->novedad->novedadopercance === 3)
                        <span class="badge badge-warning">Reinstalación</span>
                    @elseif($informeradio->novedad->novedadopercance === 4)
                        <span class="badge badge-danger">Intermitente</span>
                    @elseif($informeradio->novedad->novedadopercance === 5)
                        <span class="badge badge-info">Lento</span>
                    @elseif($informeradio->novedad->novedadopercance === 6)
                        <span class="badge badge-warning">Desconf. Router</span>
                    @elseif($informeradio->novedad->novedadopercance === 7)
                        <span class="badge badge-warning">Cable. Dañado</span>
                    @elseif($informeradio->novedad->novedadopercance === 8)
                        <span class="badge badge-info">Problema de Equipos</span>
                        @elseif($informeradio->novedad->novedadopercance === 9)
                        <span class="badge badge-info">Sin servicio</span>
                        @elseif($informeradio->novedad->novedadopercance === 10)
                        <span class="badge badge-info">Otros</span>
                    @endif
                </td>
                <th>Provincia-Cantón:</th>
                <td>{{ $informeradio->novedad->cclicontratocliente->canton->provincia->name }}-{{ $informeradio->novedad->cclicontratocliente->canton->name }}
                </td>
                <th>Cdla o Recinto:</th>
                <td colspan="2">{{ $informeradio->novedad->cclicontratocliente->cdaorecinto }}</td>
            </tr>
            <tr>
                <th>
                    Dirección:
                </th>
                <td colspan="3">
                    {{ $informeradio->novedad->cclicontratocliente->direccion }}
                </td>
                <th>
                    Especificar:
                </th>
                <td colspan="4">
                    {{ $informeradio->novedad->especificar }}
                </td>
            </tr>
            <tr>
                <th>Contacto 1:</th>
                <td>{{ $informeradio->novedad->cclicontratocliente->contacto }}</td>
                <th><strong>Contacto 2:</strong></th>
                <td> {{ $informeradio->novedad->cclicontratocliente->contacto1 }}</td>
                <th colspan="2"><strong>Correo electronico:</strong></th>
                <td> {{ $informeradio->novedad->cclicontratocliente->cliente->email }}</td>
            </tr>
        </table>

        <div class="table-responsive">
            <table class="display table table-striped table-hover nowrap" >
                
                <thead>
                    <tr>
                        <th style="text-align: center;" colspan="4">
                            <h1>Referencias Familiares </h1></th>
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
                      <td>    {{ $informeradio->novedad->cclicontratocliente->rnombre }}</td>
                      <td>    {{ $informeradio->novedad->cclicontratocliente->rapellido }}</td>
                      <td>    {{ $informeradio->novedad->cclicontratocliente->rparantesco }}</td>
                      <td>    {{ $informeradio->novedad->cclicontratocliente->rcelular }} </td>
                    
                    </tr>
                    <tr>
                        <td>    {{ $informeradio->novedad->cclicontratocliente->nombre }}</td>
                        <td>    {{ $informeradio->novedad->cclicontratocliente->apellido }}</td>
                        <td>    {{ $informeradio->novedad->cclicontratocliente->parantesco }}</td>
                        <td>    {{ $informeradio->novedad->cclicontratocliente->celular }} </td>
                      
                      </tr>
                
                </tbody>
            </table>
        </div>


        <table class="display table table-striped table-hover add-row nowrap">

            <tr>
                <th colspan="7" style="text-align: center;">Configuración</th>
                
            </tr>
            <tr>
                <th colspan="1">
                    <div class="form-group">
                        @if ($informeradio->cantena==1)
                        <input  type="checkbox" value="" 
                        id="flexCheckChecked" checked> 
                        @else 
                        <input type="checkbox" value="" 
                        id="flexCheckChecked"> 
                        @endif
                        <label for="conu">Antena</label><br>
                       
                        @if ($informeradio->ccambiowiffi==1)
                        <input  type="checkbox" value="" 
                        id="flexCheckChecked" checked> 
                        @else 
                        <input type="checkbox" value="" 
                        id="flexCheckChecked"> 
                        @endif
                        <label for="ccambiowiffi"> Cambio de Clave Wifi</label><br>
                    </div>
                      
                </th>
                <th colspan="2">
                    @if ($informeradio->crouter==1)
                    <input  type="checkbox" value="" 
                    id="flexCheckChecked" checked> 
                    @else 
                    <input type="checkbox" value="" 
                    id="flexCheckChecked"> 
                    @endif
                    <label for="crouter"> Router</label><br>
                     
                    @if ($informeradio->cfrecuencias==1)
                    <input  type="checkbox" value="" 
                    id="flexCheckChecked" checked> 
                    @else 
                    <input type="checkbox" value="" 
                    id="flexCheckChecked"> 
                    @endif
                    <label for="ccambiowiffi">Frecuencias</label><br>

                </th>
                <th colspan="3">
                   IP: {{ $informeradio->cip }}<br>
                   RED: {{ $informeradio->cred }}<br>
                   AP: {{ $informeradio->cap }}<br>
                </th>
                    </th>
            </tr>
        </table>
        
        <table class="display table table-striped table-hover add-row nowrap">

            <tr>
                <th colspan="7" style="text-align: center;">Actualización</th>
                
            </tr>
            <tr>
                <th colspan="1">
                    <div class="form-group">
                        @if ($informeradio->aanterior==1)
                        <input  type="checkbox" value="" 
                        id="flexCheckChecked" checked> 
                        @else 
                        <input type="checkbox" value="" 
                        id="flexCheckChecked"> 
                        @endif
                        <label for="conu">Antena</label><br>
                    </div>
                      
                </th>
                <th colspan="2">
                    @if ($informeradio->arouter==1)
                    <input  type="checkbox" value="" 
                    id="flexCheckChecked" checked> 
                    @else 
                    <input type="checkbox" value="" 
                    id="flexCheckChecked"> 
                    @endif
                    <label for="crouter"> Router</label><br>

                </th>
                <th colspan="4">
                   CCQ: {{ $informeradio->accq }}<br>
                   SEÑAL: {{ $informeradio->aseñal }}<br>
                </th>
                    </th>
            </tr>
        </table>

        <table class="display table table-striped table-hover add-row nowrap">

            <tr>
                <th colspan="7" style="text-align: center;">Instalación o Cambio de Equipos</th>
                
            </tr>
            <tr>
                <th colspan="1">
                    <div class="form-group">
                        @if ($informeradio->iconectores==1)
                        <input  type="checkbox" value="" 
                        id="flexCheckChecked" checked> 
                        @else 
                        <input type="checkbox" value="" 
                        id="flexCheckChecked"> 
                        @endif
                        <label for="conu">Conectores</label><br>
                       
                        @if ($informeradio->irouter==1)
                        <input  type="checkbox" value="" 
                        id="flexCheckChecked" checked> 
                        @else 
                        <input type="checkbox" value="" 
                        id="flexCheckChecked"> 
                        @endif
                        <label for="ccambiowiffi"> Router</label><br>
                        @if ($informeradio->ipoe==1)
                        <input  type="checkbox" value="" 
                        id="flexCheckChecked" checked> 
                        @else 
                        <input type="checkbox" value="" 
                        id="flexCheckChecked"> 
                        @endif
                        <label for="ccambiowiffi"> Poe</label><br>
                    </div>
                      
                </th>
                <th colspan="2">
                    @if ($informeradio->itubogalvanizado==1)
                    <input  type="checkbox" value="" 
                    id="flexCheckChecked" checked> 
                    @else 
                    <input type="checkbox" value="" 
                    id="flexCheckChecked"> 
                    @endif
                    <label for="crouter">Tubo Galvanizado</label><br>
                     
                    @if ($informeradio->icable==1)
                    <input  type="checkbox" value="" 
                    id="flexCheckChecked" checked> 
                    @else 
                    <input type="checkbox" value="" 
                    id="flexCheckChecked"> 
                    @endif
                    <label for="ccambiowiffi">Cable</label><br>
                    @if ($informeradio->iadicionocaña==1)
                    <input  type="checkbox" value="" 
                    id="flexCheckChecked" checked> 
                    @else 
                    <input type="checkbox" value="" 
                    id="flexCheckChecked"> 
                    @endif
                    <label for="ccambiowiffi">Adiciono Caña</label><br>
                    @if ($informeradio->ituboaluminio==1)
                    <input  type="checkbox" value="" 
                    id="flexCheckChecked" checked> 
                    @else 
                    <input type="checkbox" value="" 
                    id="flexCheckChecked"> 
                    @endif
                    <label for="ccambiowiffi">Tubo Aluminio</label><br>
                </th>
                <th colspan="3">
                   N° Conectores: {{ $informeradio->inconectores }}<br>
                   N° y Marca Del router: {{ $informeradio->imarcadelrouter }}<br>
                   Metros de Cable: {{ $informeradio->imetroscable }}<br>
                   Antena Anterior: {{ $informeradio->iantenaanterior }}<br>
                   Antena Nueva: {{ $informeradio->iantenanueva }}<br>
                </th>
                    </th>
            </tr>
            <tr>
                <th colspan="1">Observaciones</th>
                <td colspan="6"> {{ $informeradio->observaciones }}</td>
            </tr>
            <tr>
                
                <th><strong>Nombre del que firma:</strong></th>
                <td> {{ $informeradio->nombreresponsable }}</td>
                <th colspan="2"><strong>Parentesco con el Cliente:</strong></th>
                <td> {{ $informeradio->parentescoresponsable }}</td>
            </tr>
        </table>
    

        @endforeach
    <footer>
        <p>
            <strong> Internet para hogares</strong>
        </p>

    </footer>

    <script type="text/php">
        if ( isset($pdf) ) {
            $pdf->page_script('
                $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
                $pdf->text(370, 570, "$PAGE_NUM de $PAGE_COUNT", $font, 10);
            ');
        }
    </script>

</body>

</html>
