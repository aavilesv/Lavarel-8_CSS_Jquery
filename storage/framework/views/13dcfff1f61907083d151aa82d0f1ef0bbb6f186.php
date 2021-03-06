



<?php $__env->startSection('title','Listado Usuario'); ?>

<?php $__env->startSection('content'); ?>


<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h1 class="text-white title-it"><i class="fas fa-user-friends"></i> Usuarios</h1>
               
                <h5 class="text-white op-7 mb-2"><i class="far fa-building"></i> </h5>
            </div>
            <div class="ml-md-auto py-2 py-md-0">
           
                <a class="btn btn-success btn-round ml-auto" data-toggle="tooltip" 
                data-original-title="Ingresar" 
                href="<?php echo e(route('users.create')); ?>"><i class="fa fa-plus"></i> Ingresar</a>
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
                    <div class="card-category"><i class="fab fa-creative-commons-nd"></i> Usuarios Registrados</div>
                    <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                         <!-- Modal -->
                            <!-- Modal -->
                            <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header no-bd">
                                            <h3 class="modal-title">
                                                <span class="fw-mediumbold">
                                                </span> 
                                                <label class="badge badge-warning">Eliminar</label>
                                                <span class="fw-light">
                                                        
                                                </span>
                                            </h3>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="small">Estas seguro que quieres eliminar?</p>
                                            <form method="POST" action="<?php echo e(route('users.destroy',0)); ?>">
                                                <div class="row">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('delete'); ?>
                                                    <input type="hidden" name="id" id="cid" value="">
                                                    <div class="col-sm-12">
                                                        <div class="form-group form-group-default">
                                                            <label>Nombre Y Apellido</label>
                                                            <input id="descripcion"  type="text"  disabled class="form-control" placeholder="Nombre Apellidos">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 pr-0">
                                                        <div class="form-group form-group-default">
                                                            <label>Cedula</label>
                                                         
                                                            <input 
                                                            type="text" name="cedula" id="ccedula"  disabled
                                                            class="form-control" placeholder="Cedula">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-group-default">
                                                            <label>Direcci??n</label>
                                                            <input id="cdireccion" type="text"  disabled class="form-control" placeholder="fill office">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer no-bd">
                                            
                                                    <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                                                    <button type="submit" id="addRowButton" class="btn btn-danger">Eliminar</button>
                                                
                                                </div>
                                            </form>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>

            <div class="table-responsive">
                <table id="add-row" class="display table table-striped table-hover table-head-bg-primary add-row nowrap" >
                    <thead>
                        <tr>
                            <th>#Cod</th>
                            <th>Foto</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Rol</th>
                            <th  style="width: 10%">Action</th>
                        </tr>
                    </thead>
   
                    <tbody>
                                            

                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td><?php echo e(++$i); ?></td>
                          <td>
                            <center> <a href="<?php echo e(asset($user->image)); ?>"
                                data-lightbox="mygallery"
                                data-title="<?php echo e($user->nombre); ?> <?php echo e($user->apellido); ?>">
                                <img src="<?php echo e(asset($user->image)); ?>" title="ver imagen"
                                    class="img-fluid center" alt="Responsive image"
                                    style="width:100px; height:100px;"></a> </center>
                          </td>
                          <td><?php echo e($user->nombre); ?> <?php echo e($user->apellido); ?></td>
                          <td><?php echo e($user->email); ?></td>
                          <td>
                            <?php if(!empty($user->getRoleNames())): ?>
                              <?php $__currentLoopData = $user->getRoleNames(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <label class="badge badge-success"><?php echo e($v); ?></label>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                          </td>
                          <td>

                           
                            <div class="form-button-action">
                               
                                <a class="btn btn-link btn-primary btn-lg" data-toggle="tooltip" data-original-title="Editar" 
                                href="<?php echo e(route('users.edit',$user->id)); ?>"><i class="fa fa-edit"></i></a>
                            
                                <?php if(!empty($user->getRoleNames())): ?>
                                <?php $__currentLoopData = $user->getRoleNames(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($v === 'Gerente' or $v === 'Administrativo'): ?>
                              
                                <?php else: ?>

                                <a class="btn btn-link btn-danger btn-eliminar"
                                data-toggle="tooltip" data-original-title="Eliminar"
                                data-json='{"id":"<?php echo e($user->id); ?>"}' rel="action"><i
                                    class="fa fa-times"></i></a>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              <?php endif; ?>
                                

                             
                            </div>
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
     
     $(document).ready(function(){ 

$('.conteinerr').on('click', 'a[rel="action"]',function(){

    var data = $(this).data('json'),
    action = data.action,
    id = data.id;

    var nombreapellido = $(this).parents('tr').children('td').eq(2).html();
    var cedula = $(this).parents('tr').children('td').eq(3).html();
    var direccion = $(this).parents('tr').children('td').eq(9).html();
                    $('#descripcion').val(nombreapellido);
                    $('#cid').val(id);
                    $('#ccedula').val(cedula);
                    $('#cdireccion').val(direccion);
                   
    $('#addRowModal').modal();

   
    
});
     });
  
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\nuevoxampp\htdocs\app\AppQuantika\resources\views/users/index.blade.php ENDPATH**/ ?>