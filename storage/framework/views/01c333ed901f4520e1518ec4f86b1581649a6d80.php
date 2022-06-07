
<?php $__env->startSection('title', 'Listado de Cantones'); ?>
<?php $__env->startSection('content'); ?>



    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h1 class="text-white title-it"><i class="fas fa-map-signs"></i> Cantones</h1>

                    <h5 class="text-white op-7 mb-2"><i class="far fa-building"></i> Recursos Humanos</h5>
                </div>
                <div class="ml-md-auto py-2 py-md-0">

                    <a class="btn btn-success btn-round ml-auto" data-toggle="tooltip" data-original-title="Ingresar"
                        href="<?php echo e(route('cantons.create')); ?>"><i class="fa fa-plus"></i> Ingresar</a>
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
                        <div class="card-category"><i class="fab fa-creative-commons-nd"></i> Cantones Registrados</div>
                        <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                            <div class="table-responsive">
                                <table id="add-row" cellspacing="0" width="100%"
                                    class="display table table-striped table-hover add-roww">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Catón</th>
                                            <th scope="col">Provincia</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                    </thead>

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
            $('.add-roww').DataTable({
                "pageLength": 5
                ,"destroy":true,
                "ajax": "<?php echo e(route('cantons.listarcanton')); ?>",
                "columns": [{  data: 'id'},
                    { data: 'name' },
                    { data: 'provincia_id' }/*,
                    {
                        data: 'created_at'
                    }*/,
                    {
                        data: 'btn'
                    }
                ]
            });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\AppQuantika\resources\views/cantons/cantonlistar.blade.php ENDPATH**/ ?>