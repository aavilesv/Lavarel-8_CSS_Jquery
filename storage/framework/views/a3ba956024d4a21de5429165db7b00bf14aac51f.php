
<?php $__env->startSection('title', 'Listado de Articulos'); ?>
<?php $__env->startSection('content'); ?>


    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h1 class="text-white title-it"><i class="flaticon-list"></i> Árticulos</h1>

                    <h5 class="text-white op-7 mb-2"><i class="fas fa-shopping-cart"></i> Compras</h5>
                </div>
                <div class="ml-md-auto py-2 py-md-0">
                    <button onclick="myFunction('<?php echo e(route('articulo.create')); ?>')" href="#mdsucur" rel="action"
                        data-toggle="modal" title="Ingresar" data-backdrop="static" data-keyboard="false"
                        class="btn btn-success btn-round ml-auto">
                        <i class="fa fa-plus">Ingresar</i>
                    </button>

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
                        <div class="card-category"><i class="fab fa-creative-commons-nd"></i> Árticulos Registrados</div>
                        <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">

                            <div class="table-responsive">
                                <table id="add-row"
                                    class="display table table-striped table-hover table-head-bg-primary add-row">
                                    <thead>
                                        <tr>
                                            <th>#Cod</th>
                                            <th>Imagén</th>
                                            <th>Marca</th>
                                            <th>Nombre</th>
                                            <th>Descripción</th>
                                            <th>#Caja</th>
                                            <th>Total-C.:U.</th>
                                            <th>Total en Almacen</th>
                                            <th>Precio</th>
                                            <th>Estado</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>


                                        <?php $__currentLoopData = $articulo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $articul): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($articul->id); ?></td>
                                                <td>
                                                    <center> <a href="<?php echo e(asset($articul->image)); ?>"
                                                            data-lightbox="mygallery"
                                                            data-title="<?php echo e($articul->nombres); ?>">
                                                            <img src="<?php echo e(asset($articul->image)); ?>" title="ver imagen"
                                                                class="img-fluid center" alt="Responsive image"
                                                                style="width:100px; height:100px;"></a> </center>
                                                </td>
                                                <td><?php echo e($articul->marca->nombres); ?></td>
                                                <td><?php echo e($articul->nombres); ?></td>
                                                <td><?php echo e($articul->descripcion); ?></td>
                                                <td><?php echo e($articul->cajanumero); ?></td>
                                                <td><?php echo e($articul->cajaunidad); ?></td>
                                                <td><?php echo e($articul->sotck); ?></td>
                                                <td>$<?php echo e($articul->precio); ?></td>
                                                <td>
                                                    <?php if($articul->status === 1): ?>

                                                        <span class="badge badge-success">Activo</span>
                                                    <?php else: ?>
                                                        <span class="badge badge-danger">Inactivo</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <div class="form-button-action">
                                                        <button
                                                            onclick="myFunction('<?php echo e(route('articulo.edit', $articul->id)); ?>')"
                                                            href="#mdsucur" rel="action" data-toggle="modal"
                                                            title="Editar" data-backdrop="static"
                                                            data-keyboard="false" class="btn btn-link btn-primary btn-lg">
                                                            <i class="fa fa-edit"></i>
                                                        </button>

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
    <div class="modal face animated rotateIn" id="mdsucur" role="dialog">
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('modal'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>
        function myFunction(url) {
            $('#mdsucur').load(url, function() {
                $('#mdsucur').modal({
                    backdrop: 'static',
                    keyboard: false,
                    show: true,
                    remote: false
                });
            });
            return false;
        }
        $(document).ready(function() {

            $('.conteinerr').on('click', 'a[rel="action"]', function() {

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

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\nuevoxampp\htdocs\app\AppQuantika\resources\views/articulos/index.blade.php ENDPATH**/ ?>