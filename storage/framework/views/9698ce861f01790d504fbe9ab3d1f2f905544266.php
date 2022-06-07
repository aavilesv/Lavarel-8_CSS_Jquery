
<?php $__env->startSection('title', 'Listado de Promociones pagina'); ?>
<?php $__env->startSection('content'); ?>
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h1 class="text-white title-it"> <i class="fas fa-archive"></i> Promoción de Pagina</h1>
                    <h5 class="text-white op-7 mb-2"><i class="icon-globe"></i> Ingreso de la pagina</h5>
                </div>
                <div class="ml-md-auto py-2 py-md-0">
                    <a class="btn btn-success btn-round ml-auto" data-toggle="tooltip" data-original-title="Ingresar"
                        href="<?php echo e(route('pagepromocion.create')); ?>"><i class="fa fa-plus"></i> promoción</a>
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
                        <div class="tab-content mt-2 mb-3" id="pills-without-border-tabContent">
                            <div class="tab-pane fade show active" id="pills-home-nobd" role="tabpanel"
                                aria-labelledby="pills-home-tab-nobd">
                                <div class="table-responsive">
                                    <table id="basic-datatables" class="display table table-striped table-hover add-row">
                                        <thead>
                                            <tr>
                                                <th style="width: 10%">Action</th>
                                                <th scope="col">#Cod</th>
                                                <th scope="col">Imagén</th>
                                                <th scope="col">Fecha</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $promocion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr data-id="<?php echo e($plan->id); ?>">
                                                    <td>
                                                        <div class="form-button-action">
                                                            <a class="btn btn-link btn-primary btn-lg"
                                                             data-toggle="tooltip"
                                                                data-original-title="Editar"
                                                                href="<?php echo e(route('planes.edit', $plan->id)); ?>"><i
                                                                    class="fa fa-edit"></i></a>
                                                            <a class="btn btn-link btn-warning btn-eliminar"
                                                                data-toggle="tooltip" data-original-title="Eliminar Novedad"
                                                                data-json='{"id":"<?php echo e($plan->id); ?>","action":"plan"}'
                                                                rel="action"><i class="fas fa-times"></i></a>
                                                            <a class="btn btn-link btn-primary btn-lg" data-toggle="tooltip"
                                                                data-original-title="Editar"></a>
                                                        </div>
                                                    </td>
                                                    <td><?php echo e($plan->id); ?></td>
                                                    
                                                    <td>
                                                        <center> <a href="<?php echo e(asset($plan->foto)); ?>"
                                                                data-lightbox="mygallery"
                                                                data-title="">
                                                                <img src="<?php echo e(asset($plan->foto)); ?>" title="ver imagen"
                                                                    class="img-fluid center" alt="Responsive image"
                                                                    style="width:100px; height:100px;"></a> </center>
                                                    </td>
                                                    <td><?php echo e($plan->created_at); ?></td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </tbody>
                                    </table>
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
                                            <form method="POST" action="<?php echo e(route('promociondetalle.destroy', 0)); ?>">
                                                <div class="row">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('delete'); ?>
                                                    <input type="hidden" name="id" class="cidd" value="">
                                                    <div class="col-sm-12">
                                                        <div class="form-group form-group-default">
                                                            <label>Nombre Y Apellido</label>
                                                            <input type="text" disabled class="form-control descripcion"
                                                                placeholder="Nombre Apellidos">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 pr-0">
                                                        <div class="form-group form-group-default">
                                                            <label>Cedula</label>

                                                            <input type="text" name="cedula" disabled
                                                                class="form-control ccedula" placeholder="Cedula">
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="modal-footer no-bd">

                                                    <button type="button" class="btn btn-success"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" id="addRowButton"
                                                        class="btn btn-warning">Eliminar</button>

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
        $(document).ready(function() {

            $('.conteinerr').on('click', 'a[rel="action"]', function() {

                var data = $(this).data('json'),
                    action = data.action,
                    id = data.id;

                if (action === 'cliente') {
                    var nombreapellido = $(this).parents('tr').children('td').eq(2).html();
                    var cedula = $(this).parents('tr').children('td').eq(3).html();
                    var direccion = $(this).parents('tr').children('td').eq(10).html();
                    $('.descripcion').val(nombreapellido);
                    $('.cidd').val(id);
                    $('.ccedula').val(cedula);
                    $('.cdireccion').val(direccion);

                    $('#addRowModall').modal();

                } else {
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

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\AppQuantika\resources\views/pagepromociones/index.blade.php ENDPATH**/ ?>