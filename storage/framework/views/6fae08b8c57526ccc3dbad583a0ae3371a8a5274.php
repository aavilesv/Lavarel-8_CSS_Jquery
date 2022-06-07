<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Pdf Asistencia De Hoy</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo e(asset('css/estilopdf.css')); ?>">
</head>

<body>

    <header>
        <div class="logo">
            <img src="<?php echo e(asset('img/quantika.png')); ?>" alt="navbar brand" class="navbar-brand">
        </div>

        <h1 class="nombr">
            <strong><i class="fas fa-wrench"></i>Asistencia de Hoy</strong>
        </h1>

    </header>
    <div class="">
        <h4 style="text-align: center;">Registro de hoy día de asisteencia</h4>
     

       
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
                                        

                    <?php $__currentLoopData = $asistencia; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cargo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td><?php echo e($cargo->created_at->format('l jS \\of F Y')); ?> </td>
                      <td><?php echo e($cargo->rrhempleado->nombre); ?> <?php echo e($cargo->rrhempleado->apellido); ?></td>
                      <td>
                        <?php echo e($cargo->horaentrada); ?>

                    </td>
                    <td>
                        <?php echo e($cargo->horasalidaalmuerzo); ?>

                    </td>
                    <td>
                        <?php echo e($cargo->horaentralmuezo); ?>

                    </td>
                    <td>
                        <?php echo e($cargo->horasalida); ?>

                    </td>
                      <td>
                        <?php echo e($cargo->totalhoras); ?>

                    </td>
                     
                    </tr>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php /**PATH C:\nuevoxampp\htdocs\app\AppQuantika\resources\views/rrhasistencias/pdfdiariaasistenciahoy.blade.php ENDPATH**/ ?>