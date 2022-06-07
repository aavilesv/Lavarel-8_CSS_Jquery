
<?php $__env->startSection('title','Listado de Tipo de Contrato'); ?>
<?php $__env->startSection('content'); ?>


        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h1 class="text-white title-it"><i class="far fa-file-alt"></i> Tipo de Contrato</h1>
                       
                        <h5 class="text-white op-7 mb-2"><i class="fas fa-folder-open"></i> Contratos Clientes</h5>
                    </div>
                    <div class="ml-md-auto py-2 py-md-0">
                   
                        <a class="btn btn-success btn-round ml-auto" data-toggle="tooltip" 
                        data-original-title="Ingresar" 
                        href="<?php echo e(route('tipocontrato.create')); ?>"><i class="fa fa-plus"></i> Ingresar</a>
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
                            <div class="card-category"><i class="fab fa-creative-commons-nd"></i> Tipo de Contratos Registrados</div>
                            <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                               
                                <div class="table-responsive">
                                    <table id="add-row" class="display table table-striped table-hover add-row" >
                                        <thead>
                                            <tr>
                                                <th>#Cod</th>
                                                <th>Nombre</th>
                                                <th  style="width: 10%">Action</th>
                                            </tr>
                                        </thead>
                       
                                        <tbody>
                                                                
                    
                                            <?php $__currentLoopData = $tipocontrato; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipocontrat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                              <td><?php echo e($tipocontrat->id); ?></td>
                                              <td><?php echo e($tipocontrat->descripcion); ?></td>
                             
                                              <td>
                                                <div class="form-button-action">
                                                    <a class="btn btn-link btn-primary btn-lg" data-toggle="tooltip"
                                                     data-original-title="Editar" 
                                                    href="<?php echo e(route('tipocontrato.edit',$tipocontrat->id)); ?>"><i class="fa fa-edit"></i></a>
                                                    
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


<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\nuevoxampp\htdocs\app\AppQuantika\resources\views/cclicontratotipoclientes/index.blade.php ENDPATH**/ ?>