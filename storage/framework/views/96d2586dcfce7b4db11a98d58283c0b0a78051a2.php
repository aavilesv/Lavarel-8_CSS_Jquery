
<?php $__env->startSection('title', 'Registro de Cantón'); ?>
<?php $__env->startSection('content'); ?>
<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h1 class="text-white title-it"><i class="fas fa-map-signs"></i> Crear CANTÓN</h1>
                <h5 class="text-white op-7 mb-2"><i class="far fa-building"></i> Recursos Humanos</h5>
            </div>
        </div>
    </div>
</div>
<div class="page-inner mt--5">
    <div class="row mt--2">
        <div class="col-md-12">
            <div class="card full-height">
                <div class="card-body">
                    <div class="card-title"> <i class="fab fa-creative-commons-nd"></i> Formulario</i></div>
                    <div class="card-category"><i class="fas fa-align-justify"></i> Registar</div>
                    <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                      
                        <form action="<?php echo e(route('cantons.ingresar')); ?>" method="POST" class="form-control form-createe">
                            <!--estogenera el token de validacion  -->
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label for="provincia_id">Provincia:</label>
                                <select class="chosen-select form-control" id="provincia_id" name="provincia_id"
                                    data-placeholder="Sucursal">
                                        <option value="" selected disabled hidden>Seleccione una provincia</option>
                                        <?php $__currentLoopData = $provincia; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pronvi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($pronvi->id); ?>"><?php echo e($pronvi->name); ?></option>
                                            s
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['provincia_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="alert alert-danger" role="alert">
                                        <small><?php echo e($message); ?></small>
                                    </div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-group">
                                <label for="name">Nombre:</label>
                                <input type="text" name="name" onKeyPress="return sololetrascoma(event)" class="form-control"
                                    placeholder="Nombre" value="<?php echo e(old('name')); ?>">
                                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="alert alert-danger" role="alert">
                                        <small><?php echo e($message); ?></small>
                                    </div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="ml-md-auto py-2 py-md-0">
                                <a href="javascript: history.go(-1)" class="btn btn-danger btn-border btn-round mr-2"><i
                                    class="fas fa-reply"></i>
                                Volver</a>
                                <button class="btn btn-success btn-border btn-round mr-2" type="submit"><i
                                        class="fas fa-save"></i> Ingresar</button>
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
        $('.form-createe').submit(function(e) {
            e.preventDefault();
            swal({
                title: 'Esta seguro?',
                text: "Enviar Datos!",
                type: 'info',
                icon:'info',
                buttons: {
                    cancel: {
                        visible: true,
                        text: 'No, cancelar!',
                        className: 'btn btn-danger'
                    },
                    confirm: {
                        text: 'Si, Enviar datos!',
                        className: 'btn btn-success'
                    }
                }
            }).then((willDelete) => {
                if (willDelete) {
                    this.submit();
                } else {

                }
            });
        });

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\nuevoxampp\htdocs\app\AppQuantika\resources\views/cantons/create.blade.php ENDPATH**/ ?>