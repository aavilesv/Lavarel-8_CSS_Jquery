<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Pdf Informe de fibra</title>
    <link rel="stylesheet" href="<?php echo e(asset('fonts/bootstrap.min.css')); ?>"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo e(asset('css/estilopdf.css')); ?>">
</head>

<body>
    <header>
        <div class="logo">
            <img src="<?php echo e(asset('img/quantika.png')); ?>" alt="navbar brand" class="navbar-brand">
        </div>
        
        <h1 class="nombr">
            <strong><i class="fas fa-wrench"></i> Reporte Soporte Técnico</strong>
        </h1>
    </header>
    <h4 style="text-align: center;">Informe de soportes en fibra</h4>
    <?php $__currentLoopData = $informefibra; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $informefibra): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <table class="display table table-striped table-hover add-row nowrap">
            <tr>
                <th> #<?php echo e($informefibra->id); ?></th>
                <th>Fecha:</th>
                <td><?php echo e($informefibra->fecha); ?></td>
                <th>Técnico:</th>
                <td  colspan="3"><?php echo e($informefibra->usuario); ?></td>
            </tr>
            <tr>
                <th> Cliente:</th>
                <td colspan="2">
                    <?php echo e($informefibra->novedad->cclicontratocliente->cliente->nombre); ?>-<?php echo e($informefibra->novedad->cclicontratocliente->cliente->apellido); ?>

                </td>
                <th> Hora de Llegada:</th>
                <td><?php echo e($informefibra->horallegada); ?></td>
                <th> Hora de Salida:</th>
                <td><?php echo e($informefibra->horasalida); ?></td>
            </tr>

            <tr>
                <th>Novedad o percance:</th>
                <td colspan="1">
                    <?php if($informefibra->novedad->novedadopercance === 1): ?>
                        <span class="badge badge-success">Instalación</span>
                    <?php elseif($informefibra->novedad->novedadopercance === 2): ?>
                        <span class="badge badge-info">Retiro de Equipo</span>
                    <?php elseif($informefibra->novedad->novedadopercance === 3): ?>
                        <span class="badge badge-warning">Reinstalación</span>
                    <?php elseif($informefibra->novedad->novedadopercance === 4): ?>
                        <span class="badge badge-danger">Intermitente</span>
                    <?php elseif($informefibra->novedad->novedadopercance === 5): ?>
                        <span class="badge badge-info">Lento</span>
                    <?php elseif($informefibra->novedad->novedadopercance === 6): ?>
                        <span class="badge badge-warning">Desconf. Router</span>
                    <?php elseif($informefibra->novedad->novedadopercance === 7): ?>
                        <span class="badge badge-warning">Cable. Dañado</span>
                    <?php elseif($informefibra->novedad->novedadopercance === 8): ?>
                        <span class="badge badge-info">Problema de Equipos</span>
                   
                        <?php elseif($informefibra->novedad->novedadopercance === 9): ?>
                        <span class="badge badge-info">Sin servicio</span>
                        <?php elseif($informefibra->novedad->novedadopercance === 10): ?>
                        <span class="badge badge-info">Otros</span>
                    <?php endif; ?>
                </td>
                <th>Provincia-Cantón:</th>
                <td><?php echo e($informefibra->novedad->cclicontratocliente->canton->provincia->name); ?>-
                    <?php echo e($informefibra->novedad->cclicontratocliente->canton->name); ?>

                </td>
                <th>Cdla o Recinto:</th>
                <td colspan="2"><?php echo e($informefibra->novedad->cclicontratocliente->cdaorecinto); ?></td>
            </tr>
            <tr>
                <th>
                    Dirección:
                </th>
                <td colspan="3">
                    <?php echo e($informefibra->novedad->cclicontratocliente->direccion); ?>

                </td>
                <th>
                    Especificar:
                </th>
                <td colspan="4">
                    <?php echo e($informefibra->novedad->especificar); ?>

                </td>
            </tr>
            <tr>
                <th>Contacto 1:</th>
                <td><?php echo e($informefibra->novedad->cclicontratocliente->contacto); ?></td>
                <th><strong>Contacto 2:</strong></th>
                <td> <?php echo e($informefibra->novedad->cclicontratocliente->contacto1); ?></td>
                <th colspan="2"><strong>Correo electronico:</strong></th>
                <td> <?php echo e($informefibra->novedad->cclicontratocliente->cliente->email); ?></td>
            </tr>
        </table>



        <table class="display table table-striped table-hover add-row nowrap">

            <tr>
                <th colspan="4" style="text-align: center;">Configuración</th>
                <th colspan="3" style="text-align: center;">Actualización</th>
            </tr>
            <tr>
                <th colspan="2">
                    <div class="form-group">
                        <?php if($informefibra->conu==1): ?>
                        <input  type="checkbox" value="" 
                        id="flexCheckChecked" checked> 
                        <?php else: ?> 
                        <input type="checkbox" value="" 
                        id="flexCheckChecked"> 
                        <?php endif; ?>
                        <label for="conu">Onu</label><br>
                       
                        <?php if($informefibra->ccambiowiffi==1): ?>
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
                    <?php if($informefibra->crouter==1): ?>
                    <input  type="checkbox" value="" 
                    id="flexCheckChecked" checked> 
                    <?php else: ?> 
                    <input type="checkbox" value="" 
                    id="flexCheckChecked"> 
                    <?php endif; ?>
                    <label for="crouter"> Router</label><br>

                </th>
                
                <th colspan="3">
                    <div class="form-group">
                       
                        <?php if($informefibra->arouter==1): ?>
                        <input  type="checkbox" value="" 
                        id="flexCheckChecked" checked> 
                        <?php else: ?> 
                        <input type="checkbox" value="" 
                        id="flexCheckChecked"> 
                        <?php endif; ?>
                        <label for="arouter"> Router</label><br>
                    </div>
                    </th>
            </tr>
        </table>
        
        <table class="display table table-striped table-hover add-row nowrap">

            <tr>
                <th colspan="7" style="text-align: center;">Instalación o Cambio de Equipos</th>
            </tr>
            <tr>
                <th>
                    DBM
                </th>
                <td colspan="3"><?php echo e($informefibra->idbm); ?></td>
                <th>
                    APC
                </th>
                <td colspan="4"><?php echo e($informefibra->iapc); ?></td>
            </tr>
            <tr>
                <th>
                    UPC
                </th>
                <td colspan="3"><?php echo e($informefibra->iupc); ?></td>
                <th>
                    ODB
                </th>
                <td colspan="4"><?php echo e($informefibra->iodb); ?></td>
            </tr>

            <tr>
                <th colspan="2">   <div class="form-group">
                    <?php if($informefibra->iconectores==1): ?>
                    <input  type="checkbox" value="" 
                    id="flexCheckChecked" checked> 
                    <?php else: ?> 
                    <input type="checkbox" value="" 
                    id="flexCheckChecked"> 
                    <?php endif; ?>
                    <label for="conu">Conectores</label><br>
                   
                    <?php if($informefibra->irouter==1): ?>
                    <input  type="checkbox" value="" 
                    id="flexCheckChecked" checked> 
                    <?php else: ?> 
                    <input type="checkbox" value="" 
                    id="flexCheckChecked"> 
                    <?php endif; ?>
                    <label for="ccambiowiffi"> Router</label><br>
                </div></th>
                <th colspan="2">   <div class="form-group">
                    <?php if($informefibra->icablered==1): ?>
                    <input  type="checkbox" value="" 
                    id="flexCheckChecked" checked> 
                    <?php else: ?> 
                    <input type="checkbox" value="" 
                    id="flexCheckChecked"> 
                    <?php endif; ?>
                    <label for="conu">Cable de Red</label><br>
                </div></th>
                <th>
                    N° Conectores
                </th>
                <td colspan="4"><?php echo e($informefibra->inconectores); ?></td>
            </tr>

            
            <tr>
                <th colspan="2">ONU Anterior:<?php echo e($informefibra->ionuanterior); ?></th>
                <th colspan="3">N° y Marca del router:<?php echo e($informefibra->inmarcadelrouter); ?></th>
                <th colspan="2">ONU Nueva: <?php echo e($informefibra->ionuanterior); ?></th>
              
             
            </tr>
            <tr>
                <th colspan="3">  
                    
                    <div class="form-group">
                    <?php if($informefibra->icablefibra==1): ?>
                    <input  type="checkbox" value="" 
                    id="flexCheckChecked" checked> 
                    <?php else: ?> 
                    <input type="checkbox" value="" 
                    id="flexCheckChecked"> 
                    <?php endif; ?>
                    <label for="ccambiowiffi"> Cable Fibra</label><br>
                </div></th>
               
                <th>
                Metros de Cable Fibra:
                </th>
                <td colspan="4"><?php echo e($informefibra->imetroscable); ?></td>
            </tr>
            <tr>
                <th colspan="1">Observaciones</th>
                <td colspan="6"> <?php echo e($informefibra->observaciones); ?></td>
            </tr>
            <tr>
                <th><strong>Nombre del que firma:</strong></th>
                <td> <?php echo e($informefibra->nombreresponsable); ?></td>
                <th colspan="2"><strong>Parentesco con el Cliente:</strong></th>
                <td> <?php echo e($informefibra->parentescoresponsable); ?></td>
            </tr>
        </table>
        <br>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



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
<?php /**PATH C:\nuevoxampp\htdocs\app\AppQuantika\resources\views/soportes/reportefibra.blade.php ENDPATH**/ ?>