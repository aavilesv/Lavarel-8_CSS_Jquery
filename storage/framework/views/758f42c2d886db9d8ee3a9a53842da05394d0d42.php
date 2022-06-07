
<?php $__env->startSection('title', 'Crear Contrato'); ?>
<?php $__env->startSection('content'); ?>
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h1 class="text-white title-it"><i class="far fa-file-alt"></i> Crear Contrato de Cliente</h1>

                    <h5 class="text-white op-7 mb-2"><i class="fas fa-folder-open"></i> Recursos Humanos</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="row mt--2">
            <div class="col-md-12">
                <div class="card full-height">
                    <div class="card-body">
                        <div class="card-title"> <i class="far fa-file-alt"> Formulario</i></div>
                        <div class="card-category"><i class="fas fa-align-justify"></i> Registar</div>
                        <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">

                            <form action="<?php echo e(route('contratoclientes.store')); ?>" method="POST"
                                class="form-control form-createe" enctype="multipart/form-data">
                                <!--estogenera el token de validacion  -->
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card full-height">
                                            <div class="card-header">
                                                <div class="card-title">
                                                    <i class="fas fa-pen-alt"></i> Relizar Contrato
                                                </div>
                                                
                                            </div>
                                            <div class="card-body">
                                                <ol class="activity-feed">
                                                    <li class="feed-item feed-item-success">
                                                        <div class="row">
                                                            <time class="date col-12" datetime="9-25">Tipo de
                                                                Contrato</time>
                                                            <div class="col-md-9">
                                                                <select class="chosen-select form-control roundss"
                                                                    id="cclicontratotipocliente_id"
                                                                    name="cclicontratotipocliente_id"
                                                                    data-placeholder="Profesión">

                                                                    <option value="" selected disabled hidden>Seleccione
                                                                        un Tipo
                                                                    </option>


                                                                    <?php $__currentLoopData = $tipocontrato; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipocontrat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <option value="<?php echo e($tipocontrat->id); ?>">
                                                                            <?php echo e($tipocontrat->descripcion); ?>

                                                                        </option>
                                                                        
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                                </select>
                                                                <?php $__errorArgs = ['cclicontratotipocliente_id'];
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
                                                            <div class="col-md-3">
                                                                <a data-toggle="tooltip"
                                                                    data-original-title="Ingresar Tipo de Contrato"
                                                                    class="btn btn-success btn-sm rounded-circle"
                                                                    href="<?php echo e(route('tipocontrato.create')); ?>"
                                                                    rel="action">
                                                                    <i class="fa fa-plus"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="feed-item feed-item-secondary">
                                                        <div class="row">
                                                            <time class="date col-12"
                                                                datetime="9-25">Cantón:Provincia</time>
                                                            <div class="col-md-9">
                                                                <select class="chosen-select form-control" id="canton_id"
                                                                    name="canton_id" data-placeholder="Sucursal">
                                                                    <option value="" selected disabled hidden>Seleccione
                                                                        un Cantón-Provincia</option>
                                                                    <?php $__currentLoopData = $cantons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $canton): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <option value="<?php echo e($canton->id); ?>">
                                                                            <?php echo e($canton->name); ?>-<?php echo e($canton->provincia->name); ?>

                                                                        </option>
                                                                        s
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </select>
                                                                <?php $__errorArgs = ['canton_id'];
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
                                                            <div class="col-md-3">
                                                                <a data-toggle="tooltip"
                                                                    data-original-title="Ingresar Ciudad"
                                                                    class="btn btn-success btn-sm rounded-circle"
                                                                    href="<?php echo e(route('cantons.create')); ?>" rel="action">
                                                                    <i class="fa fa-plus"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </li>

                                                    <li class="feed-item feed-item-success">
                                                        <div class="row">
                                                            <time class="date col-12" datetime="9-25">Clientes</time>
                                                            <div class="col-md-9">
                                                                <select
                                                                    class="chosen-select form-control input-border-bottom cliente_id"
                                                                    id="cliente_idd" name="cliente_id"
                                                                    data-placeholder="Cliente">
                                                                    <option value="" selected disabled hidden>Seleccione
                                                                        un Nombre-Cedula</option>
                                                                    <?php $__currentLoopData = $clientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cliente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <option value="<?php echo e($cliente->id); ?>" data-cjson='{"cedula":"<?php echo e($cliente->cedula); ?>"
                                                                                            ,"contacto":"<?php echo e($cliente->contacto); ?>","apellido":"<?php echo e($cliente->apellido); ?>","nombre":"<?php echo e($cliente->nombre); ?>"}'>
                                                                            <?php echo e($cliente->nombre); ?>

                                                                            <?php echo e($cliente->apellido); ?> :
                                                                            <?php echo e($cliente->cedula); ?>

                                                                        </option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </select>
                                                                <?php $__errorArgs = ['cliente_id'];
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
                                                            <div class="col-md-3">
                                                                <a data-toggle="tooltip"
                                                                    data-original-title="Ingresar Cliente"
                                                                    class="btn btn-success btn-sm rounded-circle"
                                                                    href="<?php echo e(route('clientes.create')); ?>" rel="action">
                                                                    <i class="fa fa-plus"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </li>

                                                    <li class="feed-item feed-item-secondary">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Nombre</time>
                                                            <input type="text" id="cnombre"
                                                                class="form-control input-border-bottom"
                                                                placeholder="Descirpción: requerido">
                                                        </div>
                                                    </li>
                                                    <li class="feed-item feed-item-success">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Apellido</time>
                                                            <input type="text" id="capellido"
                                                                class="form-control input-border-bottom"
                                                                placeholder="Descirpción: requerido">
                                                        </div>
                                                    </li>
                                                    <li class="feed-item feed-item-secondary">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Cedula</time>
                                                            <input type="text" id="ccedula"
                                                                class="form-control input-border-bottom"
                                                                placeholder="Descirpción: requerido">
                                                        </div>
                                                    </li>
                                                    <li class="feed-item feed-item-success">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Dirección</time>
                                                            <input type="text" name="direccion"
                                                                class="form-control input-border-bottom"
                                                                placeholder="Dirección: requerido"
                                                                value="Actualizar<?php echo e(old('direccion')); ?>">
                                                            <?php $__errorArgs = ['direccion'];
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
                                                            <time class="date" datetime="9-25">Cdla o Recinto</time>
                                                            <input type="text" name="cdaorecinto"
                                                                class="form-control input-border-bottom"
                                                                placeholder="Cdla o Recinto: requerido"
                                                                value="Actualizar<?php echo e(old('cdaorecinto')); ?>">
                                                            <?php $__errorArgs = ['cdaorecinto'];
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
                                                            <time class="date" datetime="9-25">Sector</time>
                                                            <input type="text" name="sector"
                                                                class="form-control input-border-bottom"
                                                                placeholder="Sector: requerido"
                                                                value="Actualizar<?php echo e(old('sector')); ?>">
                                                            <?php $__errorArgs = ['sector'];
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
                                                            <time class="date" datetime="9-25">Tipo de vivienda</time>
                                                            <input type="text" name="tipodevivienda"
                                                                class="form-control input-border-bottom"
                                                                placeholder="Tipo de vivienda: requerido"
                                                                value="Actualizar<?php echo e(old('tipodevivienda')); ?>">
                                                            <?php $__errorArgs = ['tipodevivienda'];
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
                                                            <time class="date" datetime="9-25">Contacto</time>
                                                            <input type="text" name="contacto"
                                                                class="form-control input-border-bottom"
                                                                placeholder="Contacto: requerido"
                                                                onKeyPress="return soloNumeros(event)" maxlength="10"
                                                                value="0000000">
                                                            <?php $__errorArgs = ['contacto'];
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
                                                            <time class="date" datetime="9-25">contacto 2</time>
                                                            <input type="text" name="contacto1"
                                                                class="form-control input-border-bottom"
                                                                placeholder="No requerido"
                                                                onKeyPress="return soloNumeros(event)" maxlength="10"
                                                                value="0000000">
                                                            <?php $__errorArgs = ['contacto1'];
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
                                                    <i class="icon-speedometer"> Servicios</i>
                                                </div>
                                            </div>

                                            <div class="card-body">
                                                <ol class="activity-feed">
                                                    <li class="feed-item feed-item-success">
                                                        <div class="row">

                                                            <time class="date" datetime="9-25">#Contrato</time>
                                                            <input type="text" name="contratocodigo"
                                                                class="form-control input-border-bottom"
                                                                placeholder="Ingreso Codigo de contrato"
                                                                value="000000<?php echo e(old('contratocodigo')); ?>">
                                                            <?php $__errorArgs = ['contratocodigo'];
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

                                                            <time class="date" datetime="9-25">#Codigo de Documento</time>
                                                            <input type="text" name="documentocodigo"
                                                            onKeyPress="return soloNumeros(event)"
                                                                class="form-control input-border-bottom"
                                                                placeholder="Ingreso Codigo de documentocodigo"
                                                                value="0000<?php echo e(old('documentocodigo')); ?>">
                                                            <?php $__errorArgs = ['documentocodigo'];
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
                                                            <time class="date" datetime="9-25">Tipo de servicio</time>
                                                            <select class="chosen-select form-control" name="tipodeservicio"
                                                                data-placeholder="Sucursal">
                                                                <option value="Domestico">Domestico</option>
                                                                <option value="Dedicado">Dedicado</option>
                                                                <option value="Cyber">Cyber</option>
                                                            </select>
                                                            <?php $__errorArgs = ['tipodeservicio'];
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
                                                            <time class="date" datetime="9-25">Ancho de banda</time>
                                                            <input type="text" name="anchodebanda"
                                                                class="form-control input-border-bottom"
                                                                placeholder="Ancho de banda : Requerido" required
                                                                value="<?php echo e(old('anchodebanda')); ?>">
                                                            <?php $__errorArgs = ['anchodebanda'];
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
                                                            <time class="date" datetime="9-25">Modalidad de Equipo</time>
                                                            <select class="chosen-select form-control"
                                                                name="modalidadequipo" data-placeholder="Sucursal">
                                                                <option value="Alquiler">Alquiler</option>
                                                                <option value="Propio">Propio</option>
                                                            </select>
                                                            <?php $__errorArgs = ['modalidadequipo'];
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
                                                            <time class="date" datetime="9-25">Comportación</time>
                                                            <input type="text" name="comportacion"
                                                                class="form-control input-border-bottom"
                                                                placeholder="Comportacion : Requerido"
                                                                value="<?php echo e(old('comportacion')); ?>">
                                                            <?php $__errorArgs = ['comportacion'];
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
                                                            <time class="date" datetime="9-25">Servicio por Radio o
                                                                fibra</time>
                                                            <select class="chosen-select form-control" id="servicioo" name="servicio"
                                                                data-placeholder="Sucursal">
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
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">GPS</time>
                                                            <input type="text" name="gps"
                                                                class="form-control input-border-bottom" placeholder="GPS"
                                                                value="Actualizar<?php echo e(old('gps')); ?>">
                                                            <?php $__errorArgs = ['gps'];
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
                                                            <time class="date" datetime="9-25">Latitud</time>
                                                            <input type="text" name="latitud"
                                                                class="form-control input-border-bottom"
                                                                placeholder="Ingresa los numeros por favor de google maps"
                                                                value="Actualizar<?php echo e(old('latitud')); ?>" value="2">
                                                            <?php $__errorArgs = ['latitud'];
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
                                                            <time class="date" datetime="9-25">Longitud</time>

                                                            <input type="text" name="longitud"
                                                                class="form-control input-border-bottom"
                                                                placeholder="Ingresa los numeros por favor de google maps"
                                                                value="Actualizar<?php echo e(old('longitud')); ?>">
                                                            <?php $__errorArgs = ['longitud'];
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
                                                            <time class="date" datetime="9-25">Tarifa ($)</time>

                                                            <input type="text" name="tarifa"
                                                                class="form-control input-border-bottom"
                                                                onKeyPress="return soloNumeros(event)"
                                                                placeholder="Ingresa valor mensual a pagar"
                                                                value="<?php echo e(old('tarifa')); ?>">
                                                                <?php $__errorArgs = ['tarifa'];
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
                                                            <time class="date" datetime="9-25">Archivo</time>
                                                            <input type="file" name="archivo"
                                                                class="form-control validarpdf"
                                                                placeholder="Archivo Contrato"
                                                                value="<?php echo e(old('archivo')); ?>">
                                                            <?php $__errorArgs = ['archivo'];
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
                                                            <time class="date" datetime="9-25">Foto de Vivienda</time>
                                                            <input type="file" name="ffoto" accept="image/*"
                                                                class="form-control imagejs" placeholder="Archivo Contrato"
                                                                value="<?php echo e(old('ffoto')); ?>">
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
                                                </ol>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card full-height">
                                        <div class="card-header">
                                            <div class="card-title">
                                                <i class="fas fa-list-ul"> Referencias Familiares</i>
                                            </div>
                                        </div>

                                        <div class="card-body">
                                            <time class="date" datetime="9-25">1)</time>
                                            <hr>
                                            <div class="row">
                                                <div class="col-12 col-md-6">
                                                    <ol class="activity-feed">
                                                        <li class="feed-item feed-item-success">
                                                            <div class="row">

                                                                <time class="date" datetime="9-25">Nombre</time>
                                                                <input type="text" name="rnombre"
                                                                    onKeyPress="return sololetrascoma(event)"
                                                                    class="form-control input-border-bottom"
                                                                    placeholder="Nombre: no requerido"
                                                                    value="<?php echo e(old('rnombre')); ?>">
                                                                <?php $__errorArgs = ['rnombre'];
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
                                                                <time class="date" datetime="9-25">Parantesco</time>
                                                                <input type="text" name="rparantesco"
                                                                    class="form-control input-border-bottom"
                                                                    placeholder="Parantesco: no requerido"
                                                                    value="<?php echo e(old('rparantesco')); ?>">
                                                                <?php $__errorArgs = ['rparantesco'];
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
                                                <div class="col-12 col-md-6">
                                                    <ol class="activity-feed">

                                                        <li class="feed-item feed-item-secondary">
                                                            <div class="row">
                                                                <time class="date" datetime="9-25">Apellido</time>
                                                                <input type="text" name="rapellido"
                                                                    onKeyPress="return sololetrascoma(event)"
                                                                    class="form-control input-border-bottom"
                                                                    placeholder="Apellido: no requerido"
                                                                    value="<?php echo e(old('rapellido')); ?>">
                                                                <?php $__errorArgs = ['rapellido'];
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
                                                                <time class="date" datetime="9-25">Celular</time>
                                                                <input type="text" name="rcelular"
                                                                    class="form-control input-border-bottom"
                                                                    placeholder="Contacto: no requerido "
                                                                    value="<?php echo e(old('rcelular')); ?>"
                                                                    onKeyPress="return soloNumeros(event)" minlength="10"
                                                                    maxlength="10">
                                                                <?php $__errorArgs = ['rcelular'];
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
                                            <time class="date" datetime="9-25">2)</time>
                                            <hr>

                                            <div class="row">
                                                <div class="col-12 col-md-6">
                                                    <ol class="activity-feed">
                                                        <li class="feed-item feed-item-success">
                                                            <div class="row">

                                                                <time class="date" datetime="9-25">Nombre</time>
                                                                <input type="text" name="nombre"
                                                                    onKeyPress="return sololetrascoma(event)"
                                                                    class="form-control input-border-bottom"
                                                                    placeholder="Nombre: no requerido"
                                                                    value="<?php echo e(old('nombre')); ?>">
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


                                                        <li class="feed-item feed-item-primary">
                                                            <div class="row">
                                                                <time class="date" datetime="9-25">Parantesco</time>
                                                                <input type="text" name="parantesco"
                                                                    class="form-control input-border-bottom"
                                                                    placeholder="Parantesco: no requerido"
                                                                    value="<?php echo e(old('parantesco')); ?>">
                                                                <?php $__errorArgs = ['parantesco'];
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
                                                <div class="col-12 col-md-6">
                                                    <ol class="activity-feed">

                                                        <li class="feed-item feed-item-secondary">
                                                            <div class="row">
                                                                <time class="date" datetime="9-25">Apellido</time>
                                                                <input type="text" name="apellido"
                                                                    onKeyPress="return sololetrascoma(event)"
                                                                    class="form-control input-border-bottom"
                                                                    placeholder="Apellido: no requerido"
                                                                    value="<?php echo e(old('apellido')); ?>">
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

                                                        <li class="feed-item feed-item-secondary">
                                                            <div class="row">
                                                                <time class="date" datetime="9-25">Celular</time>
                                                                <input type="text" name="celular"
                                                                    class="form-control input-border-bottom"
                                                                    placeholder="Contacto: no requerido "
                                                                    value="<?php echo e(old('celular')); ?>"
                                                                    onKeyPress="return soloNumeros(event)" minlength="10"
                                                                    maxlength="10">
                                                                <?php $__errorArgs = ['rcelular'];
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
                                    <div class="col-md-12">
                                        <div class="card full-height">
                                            <div class="card-header">
                                                <div class="card-title">
                                                    
                                                    <div class="row">
                                                        <div class="col-md-6"> 
                                                            <i class="fas fa-list-ul"> Promociones</i>
                                                        </div>
                                                        <div class="col-md-6"> 
                                                            

                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    
                                                                    <input  type="checkbox" name="promocion" id="promocionnn" value="1" class="promocion" aria-label="Checkbox for following text input">
                                                                    <label  style="margin-left: 8%;" for="promocion"> Promoción</label><br>
                                                                </div>
                                                              </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="table-mostrar">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- aqui sale-->
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
        $('#cliente_idd').change(function() {
            var cliente = $('#cliente_idd option:selected').data('cjson');
            $('#cnombre').val(cliente.nombre);
            $('#capellido').val(cliente.apellido);
            $('#ccedula').val(cliente.cedula);
        });

        $('#servicioo').change(function() {

            var isChecked = document.getElementById('promocionnn').checked;
            if(isChecked){
                tablecargar();
            }
            
            

                   
                
                //tablecargar();
                
            
        });
        $('#Dato').click(function(){
            $("input").prop('disabled', false);
            
        });
        $('.promocion').change(function(){
            
            if(this.checked) {
                /*
                var table='<div class="input-group mb-3"><div class="input-group-prepend"><span class="input-group-text" id="inputGroup-sizing-default">Titulo</span></div><input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default"></div><div class="input-group"><div class="input-group-prepend"><span class="input-group-text">Descripción</span></div><textarea class="form-control" aria-label="With textarea"></textarea></div><br> <ul class="list-inline"> <li class="list-inline-item"> <time class="date" datetime="9-25"><strong>Fecha de Hoy</strong> </time> <input type="date" disabled onKeyPress="return validar(event)" name="fechainicial" id="fechainicial" placeholder="Search ..." value="" class="form-control"> </li> <li class="list-inline-item"> <time class="date" datetime="9-25"><strong>Hasta</strong></time> <input type="date" required id="fechafinal" name="fechafinal" placeholder="Search ..." value="" class="form-control"> </li></ul>';
                $('.table-mostrar').append(table);*/
                tablecargar();
                
                
            }else {
                $('.table-mostrar').html('');
            }
        });

        function tablecargar() {
            
            $.ajax({
                type: "GET",
                url: '<?php echo e(route('promociondetalle.index')); ?>',
                data: {
                    id: $('#servicioo').val()
                },
                dataType: 'json',
                success: function(data) {
                    $('.table-mostrar').html('');
                    var servicio=$('#servicioo').val();
                    var servi="";
                    
                    if(servicio==1){
                        servi="Inalámbrico";
                    }else{
                        servi="Fibra";
                    }
            //+" Servicio:"+promo.servicio
                    var select ='<label class="form-control" for="promocion_id"> Promociones en '+servi+'</label><br><select class="chosen-select form-control input-border-bottom promot"  name="promocion_id" id="promocion_id" require>';
                        //alert(data.respuesta);
                        select +='</select>';
                    $('.table-mostrar').append(select);
                    $('.promot').html('');
                    var promos='<option value="" selected disabled hidden>Seleccione una Promoción</option>';
                    $('.promot').append(promos);
                    data.promocion.forEach(function(promo, index) {
                        $('.promot').append('<option value="'+promo.id+'">Nombre:'+promo.titulo+" -Descripción:"+promo.descripcion+" -Fecha de Inicio:"+promo.fechainicio+" -Caduca Promoción:"+promo.fechafinal+' </option>');
                    });
                    $('.chosen-select').chosen();

                }
            });
        }
        
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\nuevoxampp\htdocs\app\AppQuantika\resources\views/cclicontratoclientes/create.blade.php ENDPATH**/ ?>