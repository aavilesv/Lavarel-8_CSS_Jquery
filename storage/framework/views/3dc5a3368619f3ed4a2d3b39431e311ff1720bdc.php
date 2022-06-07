
<?php $__env->startSection('title', 'Planes ingresos'); ?>
<?php $__env->startSection('content'); ?>
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h1 class="text-white title-it"><i class="fas fa-warehouse"></i>  Quien somos Pagina</h1>
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
                        <div class="card-title"><i class="far fa-list-alt"></i> Listado</div>
                        <div class="card-category"><i class="fab fa-creative-commons-nd"></i> Ingresar </div>
                        <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                            <form action="<?php echo e(route('quiensomos.store')); ?>" method="POST" class="form-control form-createe"
                                enctype="multipart/form-data">
                                <!--estogenera el token de validacion  -->
                                <?php echo csrf_field(); ?>
                                <div class="card full-height">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <i class="fas fa-chalkboard-teacher"></i> 
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <ol class="activity-feed">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <li class="feed-item feed-item-success">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Descripción:</time>
                                                            
                                                             <textarea class="form-control" required aria-label="With textarea" 
                                                             name="descripcion"></textarea>
                                                        </div>
                                                    </li>
                                                </div>
                                                <div class="col-md-6">
                                                    <li class="feed-item feed-item-success">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Misión:</time>
                                                            <input type="text" name="mision" maxlength="200"
                                                            class="form-control input-border-bottom decimales"
                                                             required placeholder="Ejemplo: Plan de 40 Megas,Plan de 20 Megas">
                                                        </div>
                                                    </li>
                                                </div>
                                                <div class="col-md-6">
                                                    <li class="feed-item feed-item-success">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Visión:</time>
                                                            <input type="text" name="vision" maxlength="200"
                                                            class="form-control input-border-bottom decimales"
                                                             required placeholder="Ejemplo: Plan de 40 Megas,Plan de 20 Megas">
                                                        </div>
                                                    </li>
                                                </div>
                                                <div class="col-md-6">
                                                    <li class="feed-item feed-item-success">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Objetivos:</time>
                                                            <input type="text" name="objetivos" maxlength="200"
                                                            class="form-control input-border-bottom decimales"
                                                             required placeholder="Ejemplo: Plan de 40 Megas,Plan de 20 Megas">
                                                        </div>
                                                    </li>
                                                </div>
                                                
                                                <div class="col-sm-6 col-md-6">
                                                    <li class="feed-item feed-item-primary">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Foto</time>
                                                            <input type="file" id="archivo" name="foto"
                                                                class="form-control input-border-bottom imagejs"
                                                                required
                                                                accept="image/*" oncut="return false" oncopy="return false"
                                                                onpaste="return false" placeholder="requerido" value="sd">
                                                        </div>
                                                    </li>
                                                </div>
                                            </div>
                                        </ol>
                                        

                                        <div class="ml-md-auto py-2 py-md-0">
                                            <a href="javascript: history.go(-1)" class="btn btn-danger btn-border btn-round mr-2"><i class="fas fa-reply"></i> Volver</a>
                                            <button id="btn-registrar" class="btn btn-success btn-border btn-round mr-2" type="submit"><i class="fas fa-save"></i> Ingresar</button>
                                        </div>


                                        <!--<a href="javascript:history.back()"> Volver Atrás</a>-->




                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>

    <script>
        $('.chosen-selectt').select2();
        
        $(".recibo").numeric({
            negative: false,
            decimalPlaces: 2
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\AppQuantika\resources\views/pagequiensomos/create.blade.php ENDPATH**/ ?>