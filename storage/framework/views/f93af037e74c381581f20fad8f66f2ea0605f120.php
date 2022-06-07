
<?php $__env->startSection('title', 'Atención al Cliente'); ?>
<?php $__env->startSection('header'); ?>
   
    <head>
           <?php echo $map['js']; ?>

    </head>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h1 class="text-white title-it"> <i class="fas fa-phone-volume"></i>
                    ATENCIÓN AL CLIENTE</h1>
               
                <h5 class="text-white op-7 mb-2"><i class="icon-globe"></i> Novedades de los Clientes</h5>
            </div>
            <div class="ml-md-auto py-2 py-md-0">
            </div>
        </div>
    </div>
</div>
<div class="page-inner mt--5">
    <div class="row mt--2">
        <div class="col-md-12">
            <div class="card full-height">
                <div class="card-body">
                    <div class="card-title"><i class="fas fa-align-justify"></i> Listado</div>
                    <div class="card-category"><i class="fas fa-server"></i> Registrados para la atención</div>
                    <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                        <div class="table-responsive">
                            <table id="add-row" cellspacing="0" class="display table table-striped table-hover add-row nowrap">

                                <thead>
                                    <tr>
                                        <th style="width: 10%">Action</th>
                                        <th scope="col">Servicio</th>

                                        <th scope="col">#</th>
                                        <th scope="col">Vivienda</th>
                                        <th scope="col">Cliente</th>
                                        <th scope="col">Hora de percance</th>
                                        <th scope="col">Fecha de visita</th>
                                            <th scope="col">Hora de visita</th>
                                        <th scope="col">Novedad de parcance</th>
                                        <th scope="col">Especificado</th>
                                        <th scope="col">Estado</th>
        
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $soportes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $novedad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr data-id="<?php echo e($novedad->id); ?>">
                                            <td>
                                                <div class="form-button-action">
                                                    <a class="btn btn-link btn-primary btn-lg" data-toggle="tooltip"
                                                        data-original-title="Solución"
                                                        href="<?php echo e(route('soportes.edit', $novedad->id)); ?>"><i
                                                            class="fas fa-user-minus"></i></a>
                                                </div>
                                            </td>
                                            <td>
                                                <?php if($novedad->cclicontratocliente->servicio == 1): ?>

                                                                    <span class="badge badge-success"> 
                                                                        Radio</span>
                                                                <?php else: ?>
                                                                    <span class="badge badge-danger">
                                                                        Fibra</span>
                                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e($novedad->id); ?></td>
                                            <td>
                                                <center> <a href="<?php echo e(asset($novedad->cclicontratocliente->ffoto)); ?>" 
                                                    data-lightbox="mygallery"
                                                    data-title="<?php echo e($novedad->cclicontratocliente->cliente->nombre); ?> 
                                                    <?php echo e($novedad->cclicontratocliente->cliente->apellido); ?>">
                                            <img  src="<?php echo e(asset($novedad->cclicontratocliente->ffoto)); ?>"
                                             title="ver imagen"
                                                  class="img-fluid center" alt="Responsive image"
                                                  style="width:100px; height:100px;"  ></a> </center>
                                            </td>
                                            <td><?php echo e($novedad->cclicontratocliente->cliente->nombre); ?>

                                                 <?php echo e($novedad->cclicontratocliente->cliente->apellido); ?>

                                                 <?php echo e($novedad->cclicontratocliente->contratocodigo); ?>

                                                 
                                                </td>
                                            <td><?php echo e($novedad->horainciar); ?></td>
                                            <td><?php echo e($novedad->fechavisita); ?></td>
                                                <td><?php echo e($novedad->horavisita); ?></td>
        
                                            <td>
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
                                                    <span class="badge badge-info">Otros</span>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e($novedad->especificar); ?></td>
                                            <td>
                                                <?php if($novedad->estado === 1): ?>
        
                                                    <span class="badge badge-success">Activo</span>
                                                <?php else: ?>
                                                    <span class="badge badge-danger">Inactivo</span>
                                                <?php endif; ?>
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
        <div class="col-md-12">
            <div class="card full-height">
                <div class="card-body">
                    <div class="card-title"><i class="fas fa-map-marker-alt"></i> Google Maps</div>
                    <div class="card-category">Ubicación de Clientes con Novedad</div>
                    <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                        <?php echo $map['html']; ?>

                     
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\nuevoxampp\htdocs\app\AppQuantika\resources\views/soportes/index.blade.php ENDPATH**/ ?>