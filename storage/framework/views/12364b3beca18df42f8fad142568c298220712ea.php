
<?php $__env->startSection('title', 'Editar promoción'); ?>
<?php $__env->startSection('content'); ?>
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h1 class="text-white title-it"> <i class="icon-present"></i>
                        EDITAR PROMOCIÓN</h1>
                    <h5 class="text-white op-7 mb-2"><i class="icon-globe"></i> PROMOCIÓN</h5>
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
                        <div class="card-title"><i class="fas fa-align-justify"></i> CREAR</div>
                        <div class="card-category"><i class="fas fa-server"></i> Registro</div>
                        <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                            <form action="<?php echo e(route('promocion.update',$promocion->id)); ?>" method="POST" class="form-control form-createe">
                                <!--estogenera el token de validacion  -->
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('put'); ?>
                                
                                
                                <div class="col-md-12">
                                    <div class="card full-height">
                                        <div class="card-header">
                                            <div class="card-title">
                                                <i class="icon-present"> Promociones </i>
                                            </div>
                                        </div>

                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12 col-md-12">
                                                    <ol class="activity-feed">
                                                        <li class="feed-item feed-item-success">
                                                            <div class="row">

                                                                <time class="date" datetime="9-25">Título</time>
                                                                <input type="text" name="titulo"
                                                                    onKeyPress="return sololetrascoma(event)"
                                                                    class="form-control input-border-bottom"
                                                                    placeholder="Nombre: requerido" required
                                                                    value="<?php echo e($promocion->titulo); ?>">
                                                                <?php $__errorArgs = ['titulo'];
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
                                                        </li>


                                                        <li class="feed-item feed-item-primary">
                                                            
                                                            <div class="row">
                                                                <time class="date" datetime="9-25">Descripción</time>
                                                                <textarea class="form-control" required aria-label="With textarea" name="descripcion"><?php echo e($promocion->descripcion); ?>

                                                                </textarea>
                                                                <?php $__errorArgs = ['descripcion'];
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
                                                        </li>
                                                    </ol>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-md-12">
                                                    <ol class="activity-feed">
                                                        <li class="feed-item feed-item-secondary">
                                                            <div class="row">
                                                                <time class="date" datetime="9-25">Servicio por Radio o
                                                                    fibra</time>
                                                                <select class="chosen-select form-control" required name="servicio"
                                                                    data-placeholder="Sucursal">
                                                                    <option value="<?php echo e($promocion->servicio); ?>">
                                                                        <?php if($promocion->servicio === 1): ?>
    
                                                                            <span class="badge badge-success"> Seleccionado:
                                                                                Radio</span>
                                                                        <?php else: ?>
                                                                            <span class="badge badge-danger"> Seleccionado:
                                                                                Fibra</span>
                                                                        <?php endif; ?>
                                                                    </option>
                                                                    <option value="1">Radio</option>
                                                                    <option value="0">Fibra</option>
                                                                </select>
                                                                <?php $__errorArgs = ['servicio'];
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
                                                        </li>
                                                            <li class="feed-item feed-item-secondary"> 
                                                                <time class="date" datetime="9-25">
                                                                <strong>Fecha de Hoy</strong> </time>
                                                                <input type="date" disabled onKeyPress="return validar(event)" name="fechainicio"  id="fechainicial" placeholder="Search ..."
                                                                 value="<?php echo e($promocion->fechainicio); ?>" class="form-control"> 
                                                            </li> 
                                                            <li class="feed-item feed-item-secondary"> 
                                                                <time class="date" datetime="9-25"><strong>Hasta fecha</strong> </time> 
                                                                <input type="date" required id="fechafinal" name="fechafinal" placeholder="Search ..."  value="<?php echo e($promocion->fechafinal); ?>" class="form-control">
                                                            </li>
                                                       
                                                    </ol>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="ml-md-auto py-2 py-md-0">
                                    <a href="javascript: history.go(-1)" class="btn btn-danger btn-border btn-round mr-2"><i
                                            class="fas fa-reply"></i>
                                        Volver</a>
                                    <button class="btn btn-success btn-border btn-round mr-2" id="Dato" type="submit"><i
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
        //document.getElementById('fechainicial').value = ano + "-" + mes + "-" + dia;
        $('#Dato').click(function(){
            $("input").prop('disabled', false);
        });
            $('#fechafinal').change(function() {
                if ($('#fechafinal').val() < $('#fechainicial').val()) {
                    $('#fechafinal').val('');
                    swal("Información!", "Ingresar fecha final mayor a fecha inicial", {
                        icon: "info",
                        buttons: {
                            confirm: {
                                className: 'btn btn-info'
                            }
                        },
                    });
                }
            });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\nuevoxampp\htdocs\app\AppQuantika\resources\views/promocions/edit.blade.php ENDPATH**/ ?>