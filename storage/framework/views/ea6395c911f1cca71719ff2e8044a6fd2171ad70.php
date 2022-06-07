<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title> Pdf Informe de Radio</title>
    
</head>

<body>
    <header>
        <div class="logo">
            
        </div>
        
        <h1 class="nombr">
            <strong><i class="fas fa-wrench"></i> Reporte Soporte Técnico</strong>
        </h1>
      
    </header>
    
    <h4 style="text-align: center;">Informe de soportes en Radio</h4>
    <?php $__currentLoopData = $informeradio; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $informeradio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <table class="display table table-striped table-hover add-row nowrap">
            <tr>
                <th> #<?php echo e($informeradio->id); ?></th>
                <th>Fecha de novedad:</th>
                <td><?php echo e($informeradio->novedad->created_at); ?></td>
                <th>Fecha de visita:</th>
                <td><?php echo e($informeradio->fecha); ?></td>

                <th>Técnico:</th>
                <td colspan="3"><?php echo e($informeradio->usuario); ?></td>
            </tr>
            <tr>
                <th> Cliente:</th>
                <td colspan="2">
                    <?php echo e($informeradio->novedad->cclicontratocliente->cliente->nombre); ?>-
                    <?php echo e($informeradio->novedad->cclicontratocliente->cliente->apellido); ?>

                    -<?php echo e($informeradio->novedad->cclicontratocliente->contratocodigo); ?>

                </td>
                <th> Hora de Llegada:</th>
                <td><?php echo e($informeradio->horallegada); ?></td>
                <th> Hora de Salida:</th>
                <td><?php echo e($informeradio->horasalida); ?></td>
            </tr>

            <tr>
                <th>Novedad o percance:</th>
                <td colspan="1">
                    <?php if($informeradio->novedad->novedadopercance === 1): ?>
                        <span class="badge badge-success">Instalación</span>
                    <?php elseif($informeradio->novedad->novedadopercance === 2): ?>
                        <span class="badge badge-info">Retiro de Equipo</span>
                    <?php elseif($informeradio->novedad->novedadopercance === 3): ?>
                        <span class="badge badge-warning">Reinstalación</span>
                    <?php elseif($informeradio->novedad->novedadopercance === 4): ?>
                        <span class="badge badge-danger">Intermitente</span>
                    <?php elseif($informeradio->novedad->novedadopercance === 5): ?>
                        <span class="badge badge-info">Lento</span>
                    <?php elseif($informeradio->novedad->novedadopercance === 6): ?>
                        <span class="badge badge-warning">Desconf. Router</span>
                    <?php elseif($informeradio->novedad->novedadopercance === 7): ?>
                        <span class="badge badge-warning">Cable. Dañado</span>
                    <?php elseif($informeradio->novedad->novedadopercance === 8): ?>
                        <span class="badge badge-info">Problema de Equipos</span>
                        <?php elseif($informeradio->novedad->novedadopercance === 9): ?>
                        <span class="badge badge-info">Sin servicio</span>
                        <?php elseif($informeradio->novedad->novedadopercance === 10): ?>
                        <span class="badge badge-info">Otros</span>
                    <?php endif; ?>
                </td>
                <th>Provincia-Cantón:</th>
                <td><?php echo e($informeradio->novedad->cclicontratocliente->canton->provincia->name); ?>-<?php echo e($informeradio->novedad->cclicontratocliente->canton->name); ?>

                </td>
                <th>Cdla o Recinto:</th>
                <td colspan="2"><?php echo e($informeradio->novedad->cclicontratocliente->cdaorecinto); ?></td>
            </tr>
            <tr>
                <th>
                    Dirección:
                </th>
                <td colspan="3">
                    <?php echo e($informeradio->novedad->cclicontratocliente->direccion); ?>

                </td>
                <th>
                    Especificar:
                </th>
                <td colspan="4">
                    <?php echo e($informeradio->novedad->especificar); ?>

                </td>
            </tr>
            <tr>
                <th>Contacto 1:</th>
                <td><?php echo e($informeradio->novedad->cclicontratocliente->contacto); ?></td>
                <th><strong>Contacto 2:</strong></th>
                <td> <?php echo e($informeradio->novedad->cclicontratocliente->contacto1); ?></td>
                <th colspan="2"><strong>Correo electronico:</strong></th>
                <td> <?php echo e($informeradio->novedad->cclicontratocliente->cliente->email); ?></td>
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
                      <td>    <?php echo e($informeradio->novedad->cclicontratocliente->rnombre); ?></td>
                      <td>    <?php echo e($informeradio->novedad->cclicontratocliente->rapellido); ?></td>
                      <td>    <?php echo e($informeradio->novedad->cclicontratocliente->rparantesco); ?></td>
                      <td>    <?php echo e($informeradio->novedad->cclicontratocliente->rcelular); ?> </td>
                    
                    </tr>
                    <tr>
                        <td>    <?php echo e($informeradio->novedad->cclicontratocliente->nombre); ?></td>
                        <td>    <?php echo e($informeradio->novedad->cclicontratocliente->apellido); ?></td>
                        <td>    <?php echo e($informeradio->novedad->cclicontratocliente->parantesco); ?></td>
                        <td>    <?php echo e($informeradio->novedad->cclicontratocliente->celular); ?> </td>
                      
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
                        <?php if($informeradio->cantena==1): ?>
                        <input  type="checkbox" value="" 
                        id="flexCheckChecked" checked> 
                        <?php else: ?> 
                        <input type="checkbox" value="" 
                        id="flexCheckChecked"> 
                        <?php endif; ?>
                        <label for="conu">Antena</label><br>
                       
                        <?php if($informeradio->ccambiowiffi==1): ?>
                        <input  type="checkbox" value="" 
                        id="flexCheckChecked" checked> 
                        <?php else: ?> 
                        <input type="checkbox" value="" 
                        id="flexCheckChecked"> 
                        <?php endif; ?>
                        <label for="ccambiowiffi"> Cambio de Clave Wifi</label><br>
                    </div>
                      
                </th>
                <th colspan="2">
                    <?php if($informeradio->crouter==1): ?>
                    <input  type="checkbox" value="" 
                    id="flexCheckChecked" checked> 
                    <?php else: ?> 
                    <input type="checkbox" value="" 
                    id="flexCheckChecked"> 
                    <?php endif; ?>
                    <label for="crouter"> Router</label><br>
                     
                    <?php if($informeradio->cfrecuencias==1): ?>
                    <input  type="checkbox" value="" 
                    id="flexCheckChecked" checked> 
                    <?php else: ?> 
                    <input type="checkbox" value="" 
                    id="flexCheckChecked"> 
                    <?php endif; ?>
                    <label for="ccambiowiffi">Frecuencias</label><br>

                </th>
                <th colspan="3">
                   IP: <?php echo e($informeradio->cip); ?><br>
                   RED: <?php echo e($informeradio->cred); ?><br>
                   AP: <?php echo e($informeradio->cap); ?><br>
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
                        <?php if($informeradio->aanterior==1): ?>
                        <input  type="checkbox" value="" 
                        id="flexCheckChecked" checked> 
                        <?php else: ?> 
                        <input type="checkbox" value="" 
                        id="flexCheckChecked"> 
                        <?php endif; ?>
                        <label for="conu">Antena</label><br>
                    </div>
                      
                </th>
                <th colspan="2">
                    <?php if($informeradio->arouter==1): ?>
                    <input  type="checkbox" value="" 
                    id="flexCheckChecked" checked> 
                    <?php else: ?> 
                    <input type="checkbox" value="" 
                    id="flexCheckChecked"> 
                    <?php endif; ?>
                    <label for="crouter"> Router</label><br>

                </th>
                <th colspan="4">
                   CCQ: <?php echo e($informeradio->accq); ?><br>
                   SEÑAL: <?php echo e($informeradio->aseñal); ?><br>
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
                        <?php if($informeradio->iconectores==1): ?>
                        <input  type="checkbox" value="" 
                        id="flexCheckChecked" checked> 
                        <?php else: ?> 
                        <input type="checkbox" value="" 
                        id="flexCheckChecked"> 
                        <?php endif; ?>
                        <label for="conu">Conectores</label><br>
                       
                        <?php if($informeradio->irouter==1): ?>
                        <input  type="checkbox" value="" 
                        id="flexCheckChecked" checked> 
                        <?php else: ?> 
                        <input type="checkbox" value="" 
                        id="flexCheckChecked"> 
                        <?php endif; ?>
                        <label for="ccambiowiffi"> Router</label><br>
                        <?php if($informeradio->ipoe==1): ?>
                        <input  type="checkbox" value="" 
                        id="flexCheckChecked" checked> 
                        <?php else: ?> 
                        <input type="checkbox" value="" 
                        id="flexCheckChecked"> 
                        <?php endif; ?>
                        <label for="ccambiowiffi"> Poe</label><br>
                    </div>
                      
                </th>
                <th colspan="2">
                    <?php if($informeradio->itubogalvanizado==1): ?>
                    <input  type="checkbox" value="" 
                    id="flexCheckChecked" checked> 
                    <?php else: ?> 
                    <input type="checkbox" value="" 
                    id="flexCheckChecked"> 
                    <?php endif; ?>
                    <label for="crouter">Tubo Galvanizado</label><br>
                     
                    <?php if($informeradio->icable==1): ?>
                    <input  type="checkbox" value="" 
                    id="flexCheckChecked" checked> 
                    <?php else: ?> 
                    <input type="checkbox" value="" 
                    id="flexCheckChecked"> 
                    <?php endif; ?>
                    <label for="ccambiowiffi">Cable</label><br>
                    <?php if($informeradio->iadicionocaña==1): ?>
                    <input  type="checkbox" value="" 
                    id="flexCheckChecked" checked> 
                    <?php else: ?> 
                    <input type="checkbox" value="" 
                    id="flexCheckChecked"> 
                    <?php endif; ?>
                    <label for="ccambiowiffi">Adiciono Caña</label><br>
                    <?php if($informeradio->ituboaluminio==1): ?>
                    <input  type="checkbox" value="" 
                    id="flexCheckChecked" checked> 
                    <?php else: ?> 
                    <input type="checkbox" value="" 
                    id="flexCheckChecked"> 
                    <?php endif; ?>
                    <label for="ccambiowiffi">Tubo Aluminio</label><br>
                </th>
                <th colspan="3">
                   N° Conectores: <?php echo e($informeradio->inconectores); ?><br>
                   N° y Marca Del router: <?php echo e($informeradio->imarcadelrouter); ?><br>
                   Metros de Cable: <?php echo e($informeradio->imetroscable); ?><br>
                   Antena Anterior: <?php echo e($informeradio->iantenaanterior); ?><br>
                   Antena Nueva: <?php echo e($informeradio->iantenanueva); ?><br>
                </th>
                    </th>
            </tr>
            <tr>
                <th colspan="1">Observaciones</th>
                <td colspan="6"> <?php echo e($informeradio->observaciones); ?></td>
            </tr>
            <tr>
                
                <th><strong>Nombre del que firma:</strong></th>
                <td> <?php echo e($informeradio->nombreresponsable); ?></td>
                <th colspan="2"><strong>Parentesco con el Cliente:</strong></th>
                <td> <?php echo e($informeradio->parentescoresponsable); ?></td>
            </tr>
        </table>
    

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php /**PATH C:\xampp\htdocs\AppQuantika\resources\views/soportes/soporteallradio.blade.php ENDPATH**/ ?>