
<?php $__env->startSection('title', 'Listado de Novedades'); ?>
<?php $__env->startSection('content'); ?>


    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h1 class="text-white title-it"> <i class="icon-present"></i> PROMOCIONES</h1>
                    <h5 class="text-white op-7 mb-2"><i class="icon-globe"></i> PROMOCIONES Y SORTEOS</h5>
                </div>
                <div class="ml-md-auto py-2 py-md-0">
                
                    <a class="btn btn-success btn-round ml-auto" data-toggle="tooltip" 
                    data-original-title="Ingresar" 
                    href="<?php echo e(route('promocion.create')); ?>"><i class="fa fa-plus"></i> Ingresar promoción</a>
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="row mt--2">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        
                        <h4 class="card-title"></h4>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-pills nav-secondary nav-pills-no-bd" id="pills-tab-without-border" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-home-tab-nobd" data-toggle="pill" href="#pills-home-nobd" role="tab" aria-controls="pills-home-nobd" aria-selected="true">Promociones</a>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link" id="pills-contact-tab-nobd" data-toggle="pill" href="#pills-contact-nobd" role="tab" aria-controls="pills-contact-nobd" aria-selected="false">Clientes con promociones</a>
                            </li>
                        </ul>
                        <div class="tab-content mt-2 mb-3" id="pills-without-border-tabContent">
                            <div class="tab-pane fade show active" id="pills-home-nobd" role="tabpanel" aria-labelledby="pills-home-tab-nobd">
                                <div class="table-responsive">
                                    <table id="basic-datatables" class="display table table-striped table-hover add-row" >
                                    <thead>
                                        <tr>
                                            <th style="width: 10%">Action</th>
                                            <th scope="col">#</th>
                                            <th scope="col">Titulo</th>
                                            <th scope="col">Descripción</th>
                                            <th scope="col">Servicio</th>
                                            <th scope="col">Fecha Desde</th>
                                            <th scope="col">Fecha Hasta</th>
                                            <th scope="col">Estado</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $promocion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $promocion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                            <tr data-id="<?php echo e($promocion->id); ?>">
                                                
                                                <td>
                                                    <div class="form-button-action">
                                                        <a class="btn btn-link btn-primary btn-lg" data-toggle="tooltip"
                                                     data-original-title="Editar" 
                                                    href="<?php echo e(route('promocion.edit',$promocion->id)); ?>"><i class="fa fa-edit"></i></a>
                                                                <a class="btn btn-link btn-warning btn-eliminar" 
                                                data-toggle="tooltip" data-original-title="Eliminar Novedad"
                                                data-json='{"id":"<?php echo e($promocion->id); ?>","action":"promocion"}' 
                                                rel="action"
                                            ><i class="fas fa-times"></i></a>
                                            <a class="btn btn-link btn-primary btn-lg" data-toggle="tooltip"
                                                     data-original-title="Editar" 
                                                    

                                                    </div>
                                                </td>
                                                <td><?php echo e($promocion->id); ?></td>
                                                

                                                <td><?php echo e($promocion->titulo); ?></td>
                                                <td><?php echo e($promocion->descripcion); ?></td>
                                                <td>
                                                    <?php if($promocion->servicio === 1): ?>

                                                        <span class="badge badge-success">Radio</span>
                                                    <?php else: ?>
                                                        <span class="badge badge-danger">Fibra</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td><?php echo e($promocion->fechainicio); ?></td>

                                                <td><?php echo e($promocion->fechafinal); ?></td>
                                                <td>
                                                    <?php if($promocion->status === 1): ?>

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
                            
                            <div class="tab-pane fade" id="pills-contact-nobd" role="tabpanel" 
                            aria-labelledby="pills-contact-tab-nobd">
                            <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover add-row" >
                                    <thead>
                                        <tr>
                                            <th style="width: 10%">Action</th>
                                            <th scope="col">#</th>
                                            <th scope="col">Contrato</th>
                                            <th scope="col">#CODIGO_DE_DOCUMENTO</th>
                                            <th scope="col">Cliente</th>
                                            <th scope="col">Cédula</th>
                                            <th scope="col">Titulo</th>
                                            <th scope="col">Descripción</th>
                                            <th scope="col">Servicio</th>
                                            <th scope="col">Fecha Desde</th>
                                            <th scope="col">Fecha Hasta</th>
                                            <th scope="col">Estado</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $promocioncliente; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $promocion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                            <tr data-id="<?php echo e($promocion->id); ?>">
                                                
                                                <td>
                                                    <div class="form-button-action">
                                                                <a class="btn btn-link btn-warning btn-eliminar" data-toggle="tooltip" data-original-title="Eliminar Promoción" data-json='{"id":"<?php echo e($promocion->id); ?>","action":"cliente"}' 
                                                                    rel="action"><i class="fas fa-times"></i></a>
                                                    </div>
                                                </td>
                                                <td><?php echo e($promocion->promocion->id); ?></td>
                                                <td><?php echo e($promocion->cclicontratocliente->contratocodigo); ?></td>
                                                <td><?php echo e($promocion->cclicontratocliente->documentocodigo); ?></td>
                                                <td><?php echo e($promocion->cclicontratocliente->cliente->nombre); ?> <?php echo e($promocion->cclicontratocliente->cliente->apellido); ?></td>
                                                <td><?php echo e($promocion->cclicontratocliente->cliente->cedula); ?></td>
                                                <td><?php echo e($promocion->promocion->titulo); ?></td>
                                                <td><?php echo e($promocion->promocion->descripcion); ?></td>
                                                <td>
                                                    <?php if($promocion->promocion->servicio === 1): ?>

                                                        <span class="badge badge-success">Radio</span>
                                                    <?php else: ?>
                                                        <span class="badge badge-danger">Fibra</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td><?php echo e($promocion->promocion->fechainicio); ?></td>

                                                <td><?php echo e($promocion->promocion->fechafinal); ?></td>
                                                <td>
                                                    <?php if($promocion->promocion->status === 1): ?>

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
                            
                            <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header no-bd">
                                            <h3 class="modal-title">
                                                <span class="fw-mediumbold">
                                                </span> 
                                                <label class="badge badge-warning">Anular Promoción</label>
                                                <span class="fw-light">
                                                        
                                                </span>
                                            </h3>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="small">Estas seguro que quieres anular Promoción ?</p>
                                            <form method="POST" action="<?php echo e(route('promocion.destroy',0)); ?>">
                                                <div class="row">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('delete'); ?>
                                                    <input type="hidden" name="id" id="cidd" value="">
                                                    <div class="col-sm-12">
                                                        <div class="form-group form-group-default">
                                                            <label>Nombre</label>
                                                            <input id="descripcion"  type="text"  disabled class="form-control" placeholder="Nombre Apellidos">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 pr-0">
                                                        <div class="form-group form-group-default">
                                                            <label>Descripción</label>
                                                         
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
                            
                            <div class="modal fade" id="addRowModall" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header no-bd">
                                            <h3 class="modal-title">
                                                <span class="fw-mediumbold">
                                                </span> 
                                                <label class="badge badge-warning">Anular Promoción</label>
                                                <span class="fw-light">
                                                        
                                                </span>
                                            </h3>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="small">Estas seguro que quieres eliminar Promocion ?</p>
                                            <form method="POST" action="<?php echo e(route('promociondetalle.destroy',0)); ?>">
                                                <div class="row">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('delete'); ?>
                                                    <input type="hidden" name="id" class="cidd" value="">
                                                    <div class="col-sm-12">
                                                        <div class="form-group form-group-default">
                                                            <label>Nombre Y Apellido</label>
                                                            <input type="text"  disabled class="form-control descripcion"
                                                            placeholder="Nombre Apellidos">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 pr-0">
                                                        <div class="form-group form-group-default">
                                                            <label>Cedula</label>
                                                         
                                                            <input type="text" name="cedula"   disabled class="form-control ccedula" placeholder="Cedula">
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

if(action ==='cliente'){
    var nombreapellido = $(this).parents('tr').children('td').eq(2).html();
    var cedula = $(this).parents('tr').children('td').eq(3).html();
    var direccion = $(this).parents('tr').children('td').eq(10).html();
                    $('.descripcion').val(nombreapellido);
                    $('.cidd').val(id);
                    $('.ccedula').val(cedula);
                    $('.cdireccion').val(direccion);
                   
    $('#addRowModall').modal();
    
}else {
    var nombreapellido = $(this).parents('tr').children('td').eq(2).html();
    var cedula = $(this).parents('tr').children('td').eq(3).html();
    var direccion = $(this).parents('tr').children('td').eq(10).html();
                    $('#descripcion').val(nombreapellido);
                    $('#cidd').val(id);
                    $('#ccedula').val(cedula);
                    $('#cdireccion').val(direccion);
                   
    $('#addRowModal').modal();
}
    
   
    
});
     });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\nuevoxampp\htdocs\app\AppQuantika\resources\views/promocions/index.blade.php ENDPATH**/ ?>