
<?php $__env->startSection('title','Lista de Asistencia diaria'); ?>
<?php $__env->startSection('content'); ?>


        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h1 class="text-white title-it"><i class="flaticon-time"></i> Asistencia Diaria</h1>
                       
                        <h5 class="text-white op-7 mb-2"><i class="flaticon-calendar"></i> Control de Asistencia</h5>
                    </div>
                    <div class="ml-md-auto py-2 py-md-0">
                        <?php if($buscarfinal === ''): ?>  
                         <a class="btn btn-primary btn-round ml-auto" data-toggle="tooltip" 
                          data-original-title="Imprimir fecha de hoy    " 
                          target="_blank"href="<?php echo e(route('asistenciadiaria.reporteasistenciadiariahoy')); ?>">
                          <i class="icon-printer"></i> Imprimir</a>
                        <?php else: ?> <a class="btn btn-primary btn-round ml-auto" data-toggle="tooltip" 
                        data-original-title="Fecha: <?php echo e($buscarfinal); ?>" target="_blank"
                         href="<?php echo e(route('asistenciadiaria.reporteasistenciadiaria',$buscarfinal)); ?>">
                         <i class="icon-printer"></i> Imprimir</a>   <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-inner mt--5">
            <div class="row mt--2">
               
                <div class="col-md-12">
                    <div class="card full-height">
                        <div class="card-body">
                            <div class="card-title"><i class="far fa-list-alt"></i> Listado</div>
                            <div class="card-category"><i class="fab fa-creative-commons-nd"></i> Asistencias Registradas diarias</div>
                            <?php echo e(date('l')); ?>

                            <form class="navbar-left navbar-form nav-search mr-md-12">
                                <div class="form-group text">
                                    <ul class="list-inline">
                                      
                                        <li class="list-inline-item">
                                            <time class="date" datetime="9-25"><strong>Fecha:</strong></time>
                                            <input type="date" required id="fechafinal" name="fechafinal"
                                                placeholder="Search ..." value="<?php echo e(old('fechafinal', $buscarfinal)); ?>"
                                                class="form-control">
    
                                        </li>
                                        <li class="list-inline-item">
    
                                            <button type="submit" title="Buscar" class="btn btn-search pr-1">
                                                <i class="fa fa-search search-icon"></i>
                                            </button>
    
                                        </li>
                                    </ul>
                                </div>
                            </form>
                            <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                               
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
                        </div>
                    </div>
                </div>
            </div>
       
        </div>


<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
    <script>
        var fecha = new Date();
        var mes = fecha.getMonth() + 1; //obteniendo mes
        var dia = fecha.getDate(); //obteniendo dia
        var ano = fecha.getFullYear(); //obteniendo año
        var hora = fecha.getHours(); //obteniendo año
        var minut = fecha.getMinutes(); //obteniendo año

        if (dia < 10)
            dia = '0' + dia; //agrega cero si el menor de 10
        if (mes < 10)
            mes = '0' + mes; //agrega cero si el menor de 10
        if (minut < 10)
            minut = '0' + minut; //agrega cero si el menor de 10

        if ("<?php echo e($buscarfinal); ?>" === "") {
            document.getElementById('fechafinal').value = ano + "-" + mes + "-" + dia;
        }

     

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\nuevoxampp\htdocs\app\AppQuantika\resources\views/rrhasistencias/diariaasistencia.blade.php ENDPATH**/ ?>