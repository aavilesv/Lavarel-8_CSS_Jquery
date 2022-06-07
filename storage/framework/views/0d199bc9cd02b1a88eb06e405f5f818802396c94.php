
<?php $__env->startSection('title', 'Editar Cliente'); ?>
<?php $__env->startSection('content'); ?>


    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h1 class="text-white title-it"> <i class="fas fa-user-alt"></i> EDITAR CLIENTE</h1>

                    <h5 class="text-white op-7 mb-2"><i class="fas fa-align-justify"></i> Registro Cliente</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="row mt--2">
            <div class="col-md-12">
                <div class="card full-height">
                    <div class="card-body">
                        <div class="card-title"> <i class="fas fa-address-card"> Formulario</i></div>
                        <div class="card-category"><i class="far fa-clipboard"></i> Registar</div>
                        <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
<!--onsubmit="return todocedula()" -->
                            <form action="<?php echo e(route('clientes.update', $cliente)); ?>" method="POST" class="form-control form-createe" enctype="multipart/form-data">
                                <!--estogenera el token de validacion  -->
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('put'); ?>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card full-height">
                                            <div class="card-header">
                                                <div class="card-title">

                                                    <i class="fas fa-user"></i> Datos Personales
                                                </div>
                                            </div>

                                            <div class="card-body">
                                                <ol class="activity-feed">
                                                    <li class="feed-item feed-item-success">
                                                        <div class="row">

                                                            <time class="date" datetime="9-25">Nombre</time>
                                                            <input type="text" name="nombre"
                                                                onKeyPress="return sololetrascoma(event)"
                                                                class="form-control roundss" placeholder="Nombres"
                                                                value="<?php echo e(old('nombre', $cliente->nombre)); ?>">
                                                            <?php $__errorArgs = ['nombre'];
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
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Apellido</time>
                                                            <input type="text" name="apellido"
                                                                onKeyPress="return sololetrascoma(event)"
                                                                class="form-control roundss" placeholder="Apellido"
                                                                value="<?php echo e(old('apellido', $cliente->apellido)); ?>">
                                                            <?php $__errorArgs = ['apellido'];
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
                                                    <li class="feed-item feed-item-success">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Cédula</time>
                                                            <input type="text" name="cedula" id="cedula"
                                                                onKeyPress="return soloNumeros(event)" maxlength="13"
                                                                minlength="1"  class="form-control roundss"
                                                                placeholder="Cédula"
                                                                value="<?php echo e(old('cedula', $cliente->cedula)); ?>">
                                                            <?php $__errorArgs = ['cedula'];
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
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Fecha Nacimiento</time>
                                                            <input type="date" name="fechanacimiento"
                                                                class="form-control roundss" placeholder="Fecha Nacimiento"
                                                                value="<?php echo e(old('fechanacimiento', $cliente->fechanacimiento)); ?>">
                                                            <?php $__errorArgs = ['fechanacimiento'];
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
                                                                                                  
                                                    <li class="feed-item feed-item-success">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Email</time>
                                                            <input type="email" name="email" class="form-control roundss"
                                                                placeholder="Correo Electronico : No requerido"
                                                                value="<?php echo e(old('email', $cliente->email)); ?>">
                                                            <?php $__errorArgs = ['email'];
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
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card full-height">
                                            <div class="card-header">
                                                <div class="card-title">

                                                    <i class="flaticon-technology-1"></i> Datos Adicionales


                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <ol class="activity-feed">
                                                    <li class="feed-item feed-item-success">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Genero</time>
                                                            <select class="chosen-select form-control" name="sexo"
                                                                data-placeholder="Sucursal">
                                                                <option value="<?php echo e($cliente->sexo); ?>">
                                                                    <?php if($cliente->sexo === 1): ?>

                                                                    <span class="badge badge-success">Seleccionado: Masculino</span>
                                                                <?php else: ?>
                                                                    <span class="badge badge-primary">Seleccionado: Femenino</span>
                                                                <?php endif; ?>
                                                            </option>
                                                                <option value="1">Masculino</option>
                                                                <option value="0">Femenino</option>
                                                                
                                                            </select>
                                                            <?php $__errorArgs = ['sexo'];
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
                                                    <li class="feed-item feed-item-success">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Estado Civil</time>
                                                            <select class="chosen-select form-control" name="estadocivil"
                                                                data-placeholder="Sucursal">
                                                                <option value="<?php echo e($cliente->estadocivil); ?>">   <?php if($cliente->estadocivil === 1): ?>
                                                                    <span class="badge badge-info">Seleccionado: Casado</span>
                                                                <?php elseif($cliente->estadocivil === 2): ?>
                                                                    <span class="badge badge-primary">Seleccionado: Soltero</span>
                                                                <?php else: ?>
                                                                    <span class="badge badge-info">Seleccionado: Divorciado</span>
                                                                <?php endif; ?></option>
                                                                <option value="1">Casado</option>
                                                                <option value="2">Soltero</option>
                                                                <option value="3">Divorciado</option>
                                                                
                                                            </select>
                                                            <?php $__errorArgs = ['estadocivil'];
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
                                                 
                                                    <li class="feed-item feed-item-success">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Foto de Perfil
                                                                </time>
                                                            <input type="file" name="ffoto" accept="image/*"
                                                                class="form-control imagejs" placeholder="Foto Empleado"
                                                                value="<?php echo e(old('ffoto')); ?>">
                                                                <input type="text" value="<?php echo e($cliente->ffoto); ?>">
                                                            <?php $__errorArgs = ['ffoto'];
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
                                                    <li class="feed-item feed-item-success">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Foto del cliente#2</time>
                                                            <input type="file" name="fotocedula2" accept="image/*"
                                                                class="form-control imagejs" placeholder="Foto Empleado"
                                                                value="<?php echo e(old('fotocedula2')); ?>">
                                                            <?php $__errorArgs = ['fotocedula2'];
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
                                    </div>
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

<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\nuevoxampp\htdocs\app\AppQuantika\resources\views/clientes/edit.blade.php ENDPATH**/ ?>