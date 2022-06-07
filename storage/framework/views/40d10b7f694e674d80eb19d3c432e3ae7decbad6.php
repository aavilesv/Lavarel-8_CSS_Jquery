
<?php $__env->startSection('title', 'Listado de Novedades'); ?>
<?php $__env->startSection('content'); ?>


    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h1 class="text-white title-it"> <i class="fas fa-phone-square"></i>
                        NOVEDADES</h1>

                    <h5 class="text-white op-7 mb-2"><i class="icon-globe"></i> RECEPCIÓN</h5>
                </div>
                <div class="ml-md-auto py-2 py-md-0">
                    <a class="btn btn-primary btn-round ml-auto" data-toggle="tooltip"
                        data-original-title="Imprimir todos los registros" target="_blank"
                        href="<?php echo e(route('pdfnovedad.novedadall')); ?>"><i class="icon-printer"></i> Imprimir</a>

                    <a class="btn btn-success btn-round ml-auto" data-toggle="tooltip" data-original-title="Ver"
                        href="<?php echo e(route('novedads.create')); ?>"><i class="fa fa-plus"></i> Ingresar</a>
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="row mt--2">
            <div class="col-md-12">
                <div class="card full-height">
                    <div class="card-body">
                        <div class="card-title"><i class="fas fa-align-justify"></i> Novedades Registradas</div>
                        <div class="card-category"><i class="fas fa-server"></i> Datos</div>
                        <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                            <div class="table-responsive">
                                <table id="add-row" cellspacing="0"
                                    class="display table table-striped table-hover add-row nowrap">

                                    <thead>
                                        <tr>
                                            <th style="width: 10%">Action</th>
                                            <th scope="col">#</th>
                                            <th scope="col">Servicio</th>
                                            <th scope="col">Cliente</th>
                                            <th scope="col">Hora de percance</th>
                                            <th scope="col">Fecha de visita</th>
                                            <th scope="col">Hora de visita</th>
                                            <th scope="col">Novedad de parcance</th>
                                            <th scope="col">Especificar</th>
                                            <th scope="col">Estado</th>

                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $novedads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $novedad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                            <tr data-id="<?php echo e($novedad->id); ?>">
                                                
                                                <td>
                                                    <div class="form-button-action">
                                                        <a class="btn btn-link btn-info btn-lg" data-toggle="tooltip"
                                                            data-original-title="Imprimir registro" target="_blank"
                                                            href="<?php echo e(route('pdfnovedad.novedadgetone', $novedad->id)); ?>"><i
                                                                class="icon-printer"></i></a>
                                                                <a class="btn btn-link btn-warning btn-eliminar" 
                                                data-toggle="tooltip" data-original-title="Eliminar Novedad"
                                                data-json='{"id":"<?php echo e($novedad->id); ?>"}' 
                                                rel="action"
                                            ><i class="fas fa-times"></i></a>

                                                    </div>
                                                </td>
                                                <td><?php echo e($novedad->id); ?></td>
                                                <td>
                                                    <?php if($novedad->cclicontratocliente->servicio == 1): ?>

                                                                        <span class="badge badge-success"> 
                                                                            Radio</span>
                                                                    <?php else: ?>
                                                                        <span class="badge badge-danger">
                                                                            Fibra</span>
                                                                    <?php endif; ?>
                                                </td>
                                                <td><?php echo e($novedad->cclicontratocliente->cliente->nombre); ?> <?php echo e($novedad->cclicontratocliente->cliente->apellido); ?></td>
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
                                                        <span class="badge badge-info">Sin servicio</span>
                                                    <?php elseif($novedad->novedadopercance === 10): ?>
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
                            <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header no-bd">
                                            <h3 class="modal-title">
                                                <span class="fw-mediumbold">
                                                </span> 
                                                <label class="badge badge-warning">Anular Novedad</label>
                                                <span class="fw-light">
                                                        
                                                </span>
                                            </h3>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="small">Estas seguro que quieres eliminar novedad ?</p>
                                            <form method="POST" action="<?php echo e(route('novedads.destroy',0)); ?>">
                                                <div class="row">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('delete'); ?>
                                                    <input type="hidden" name="id" id="cidd" value="">
                                                    <div class="col-sm-12">
                                                        <div class="form-group form-group-default">
                                                            <label>Nombre Y Apellido</label>
                                                            <input id="descripcion"  type="text"  disabled class="form-control" placeholder="Nombre Apellidos">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 pr-0">
                                                        <div class="form-group form-group-default">
                                                            <label>Hora de parcance</label>
                                                         
                                                            <input type="text" name="cedula" id="ccedula"  disabled class="form-control" placeholder="Cedula">
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                <div class="modal-footer no-bd">
                                            
                                                    <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                                                    <button type="submit" id="addRowButton" class="btn btn-warning">Eliminar</button>
                                                
                                                </div>
                                            </form>
                                        </div>
                                        
                                    </div>
                                </div>
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


$(document).ready(function(){ 

$('.conteinerr').on('click', 'a[rel="action"]',function(){

    var data = $(this).data('json'),
    action = data.action,
    id = data.id;

    var nombreapellido = $(this).parents('tr').children('td').eq(3).html();
    var cedula = $(this).parents('tr').children('td').eq(4).html();
    var direccion = $(this).parents('tr').children('td').eq(10).html();
                    $('#descripcion').val(nombreapellido);
                    $('#cidd').val(id);
                    $('#ccedula').val(cedula);
                    $('#cdireccion').val(direccion);
                   
    $('#addRowModal').modal();

   
    
});
     });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\nuevoxampp\htdocs\app\AppQuantika\resources\views/novedads/index.blade.php ENDPATH**/ ?>