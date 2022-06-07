<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Pdf Novedad</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo e(asset('css/estilopdf.css')); ?>">
</head>
<body>
    <header>
        <div class="logo">
            <img src="<?php echo e(asset('img/quantika.png')); ?>" alt="navbar brand" class="navbar-brand">
        </div>
        
        <h1 class="nombr">
            <strong><i class="fas fa-wrench"></i> Novedad registrada</strong>
        </h1>
     
    </header>
 
        <h4 style="text-align: center;">Novedad</h4>
        <h1><?php if($novedad->cclicontratocliente->servicio == 1): ?>

            <span class="badge badge-success">
                Radio</span>
        <?php else: ?>
            <span class="badge badge-danger">
                Fibra</span>
        <?php endif; ?></h1>
        <table class="display table table-striped table-hover add-row nowrap">
            <tr>
                <th><h1> #<?php echo e($novedad->id); ?></h1></th>
                <th colspan="4"> Novedad Registrada por: <?php echo e($novedad->tecnico); ?></th>
               </tr>
            <tr>
                <th> Cliente:</th>
                <td colspan="2"><?php echo e($novedad->cclicontratocliente->cliente->nombre); ?>-<?php echo e($novedad->cclicontratocliente->cliente->apellido); ?></td>
                <th> Hora de novedad:</th>
                <td colspan="2"><?php echo e($novedad->horainciar); ?></td>
            </tr>
            
            <tr>
                <th> Fecha de visita:</th>
                <td colspan="2"><?php echo e($novedad->fechavisita); ?></td>
                <th> Hora de visita:</th>
                <td colspan="2"><?php echo e($novedad->horavisita); ?></td>
            </tr>
            <tr>
                <th>Contacto 1:</th>
                <td><?php echo e($novedad->cclicontratocliente->contacto); ?></td>
                <th><strong>Contacto 2:</strong></th>
                <td> <?php echo e($novedad->cclicontratocliente->contacto1); ?></td>
                <th><strong>Correo electronico:</strong></th>
                <td> <?php echo e($novedad->cclicontratocliente->cliente->email); ?></td>
            </tr>
            <tr>
                <th>Novedad o percance:</th>
                <td colspan="1">
                    <?php if($novedad->novedadopercance === 1): ?>
                        <span class="badge badge-success">Instalación</span>
                    <?php elseif($novedad->novedadopercance === 2): ?>
                        <span class="badge badge-info">Retiro de Equipo</span>
                    <?php elseif($novedad->novedadopercance === 3): ?>
                        <span class="badge badge-warning">Reinstalación</span>
                    <?php elseif($novedad->novedadopercance === 4): ?>
                        <span class="badge badge-danger">Intermitente</span>
                    <?php elseif($novedad->novedadopercance === 5): ?>
                        <span class="badge badge-info">Lento</span>
                    <?php elseif($novedad->novedadopercance === 6): ?>
                        <span class="badge badge-warning">Desconf. Router</span>
                    <?php elseif($novedad->novedadopercance === 7): ?>
                        <span class="badge badge-warning">Cable. Dañado</span>
                    <?php elseif($novedad->novedadopercance === 8): ?>
                        <span class="badge badge-info">Problema de Equipos</span>
            
                                    
                        <?php elseif($novedad->novedadopercance === 9): ?>
                        <span class="badge badge-info">Sin servicio</span>
                        <?php elseif($novedad->novedadopercance === 10): ?>
                        <span class="badge badge-info">Otros</span>

                    <?php endif; ?>
                </td>
                <th>Provincia-Cantón:</th>
                <td><?php echo e($novedad->cclicontratocliente->canton->provincia->name); ?>-<?php echo e($novedad->cclicontratocliente->canton->name); ?>

                </td>
                <th>Cdla o Recinto:</th>
                <td><?php echo e($novedad->cclicontratocliente->cdaorecinto); ?></td>
            </tr>
            <tr>
                <th>
                    GPS:
                </th>
                <td>
                    <a class="" data-toggle="tooltip"
                        data-original-title="Abrir Ubicación del cliente GPS" target="_blank"
                        href="<?php echo e($novedad->cclicontratocliente->gps); ?>"><i class="fas fa-external-link-alt"></i> Abrir
                        Ubicación</a>
                </td>
                <th>
                    Dirección:
                </th>
                <td colspan="3">
                    <?php echo e($novedad->cclicontratocliente->direccion); ?>

                </td>
            </tr>
            <tr>
                <th>
                    Especificar:
                </th>
                <td colspan="5">
                    <?php echo e($novedad->especificar); ?>

                </td>
            </tr>
        </table>
        <div class="table-responsive">
            <table class="display table table-striped table-hover nowrap" >
                
                <thead>
                    <tr>
                        <th style="text-align: center;" colspan="4">
                            <h1>Referencias Familiares para visita de soporte en casa</h1></th>
                    </tr>
                    <tr>
                        <th>Nombre</th>
                        <th>Parantesco</th>
                        <th>Celular</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                      <td>    <?php echo e($novedad->nombre); ?></td>
                      <td>    <?php echo e($novedad->parentesco); ?></td>
                      <td>    <?php echo e($novedad->celular); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
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
                      <td>    <?php echo e($novedad->cclicontratocliente->rnombre); ?></td>
                      <td>    <?php echo e($novedad->cclicontratocliente->rapellido); ?></td>
                      <td>    <?php echo e($novedad->cclicontratocliente->rparantesco); ?></td>
                      <td>    <?php echo e($novedad->cclicontratocliente->rcelular); ?> </td>
                    
                    </tr>
                    <tr>
                        <td>    <?php echo e($novedad->cclicontratocliente->nombre); ?></td>
                        <td>    <?php echo e($novedad->cclicontratocliente->apellido); ?></td>
                        <td>    <?php echo e($novedad->cclicontratocliente->parantesco); ?></td>
                        <td>    <?php echo e($novedad->cclicontratocliente->celular); ?> </td>
                      
                      </tr>
                
                </tbody>
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
</html><?php /**PATH C:\xampp\htdocs\AppQuantika\resources\views/novedads/novedadgetone.blade.php ENDPATH**/ ?>