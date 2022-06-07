
<?php $__env->startSection('title', 'Editar Contrato'); ?>
<?php $__env->startSection('content'); ?>
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h1 class="text-white title-it"><i class="far fa-file-alt"></i> Editar Contrato de Cliente</h1>

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

                            <form action="<?php echo e(route('contratoclientes.update',$Cclicontratocliente)); ?>" method="POST"
                                class="form-control form-createe" enctype="multipart/form-data">
                                <!--estogenera el token de validacion  -->
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('put'); ?>
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


                                                                    <option
                                                                        value="<?php echo e($Cclicontratocliente->cclicontratotipocliente->id); ?>">
                                                                        Seleccionado
                                                                        <?php echo e($Cclicontratocliente->cclicontratotipocliente->descripcion); ?>

                                                                    </option>

                                                                    <?php $__currentLoopData = $tipocontrato; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipocontrat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <option value="<?php echo e($tipocontrat->id); ?>">
                                                                            <?php echo e($tipocontrat->descripcion); ?>

                                                                        </option>
                                                                        s
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
                                                                    <option
                                                                        value="<?php echo e($Cclicontratocliente->canton->id); ?>">
                                                                        Seleccionado

                                                                        <?php echo e($Cclicontratocliente->canton->name); ?>-<?php echo e($Cclicontratocliente->canton->provincia->name); ?>

                                                                    </option>
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
                                                            <time class="date col-12" datetime="9-25">Clientes:Cedula</time>
                                                            <div class="col-md-9">
                                                                <select
                                                                    class="chosen-select form-control input-border-bottom cliente_id"
                                                                    id="cliente_idd" name="cliente_id"
                                                                    data-placeholder="Cliente">
                                                                    <option
                                                                        value="<?php echo e($Cclicontratocliente->cliente->id); ?>">
                                                                        Seleccionado
                                                                        <?php echo e($Cclicontratocliente->cliente->nombre); ?>

                                                                        <?php echo e($Cclicontratocliente->cliente->apellido); ?> :
                                                                        <?php echo e($Cclicontratocliente->cliente->cedula); ?>

                                                                    </option>
                                                                    <?php $__currentLoopData = $clientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cliente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <option value="<?php echo e($cliente->id); ?>" data-cjson='{"cedula":"<?php echo e($cliente->cedula); ?>"
                                                                                            ,"contacto":"<?php echo e($cliente->contacto); ?>",
                                                "apellido":"<?php echo e($cliente->apellido); ?>"
                                                ,"nombre":"<?php echo e($cliente->nombre); ?>"}'>
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
                                                                placeholder="Descirpción: requerido"
                                                                value="<?php echo e(old('direccion', $Cclicontratocliente->cliente->nombre)); ?>">
                                                        </div>
                                                    </li>
                                                    <li class="feed-item feed-item-success">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Apellido</time>
                                                            <input type="text" id="capellido"
                                                                class="form-control input-border-bottom"
                                                                placeholder="Descirpción: requerido"
                                                                value="<?php echo e(old('direccion', $Cclicontratocliente->cliente->apellido)); ?>">
                                                        </div>
                                                    </li>
                                                    <li class="feed-item feed-item-secondary">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Cedula</time>
                                                            <input type="text" id="ccedula"
                                                                class="form-control input-border-bottom"
                                                                placeholder="Descirpción: requerido"
                                                                value="<?php echo e(old('direccion', $Cclicontratocliente->cliente->cedula)); ?>">
                                                        </div>
                                                    </li>
                                                    <li class="feed-item feed-item-success">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Dirección</time>
                                                            <input type="text" name="direccion"
                                                                class="form-control input-border-bottom"
                                                                placeholder="Dirección: requerido"
                                                                value="<?php echo e(old('direccion', $Cclicontratocliente->direccion)); ?>">
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
                                                                value="<?php echo e(old('cdaorecinto', $Cclicontratocliente->cdaorecinto)); ?>">
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
                                                                value="<?php echo e(old('sector', $Cclicontratocliente->sector)); ?>">
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
                                                                value="<?php echo e(old('tipodevivienda', $Cclicontratocliente->tipodevivienda)); ?>">
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
                                                                value="<?php echo e(old('contacto', $Cclicontratocliente->contacto)); ?>">
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
                                                                value="<?php echo e(old('contacto1', $Cclicontratocliente->contacto1)); ?>">
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
                                                            onKeyPress="return soloNumeros(event)"
                                                                class="form-control input-border-bottom"
                                                                placeholder="Ingreso Codigo de contrato"
                                                                value="<?php echo e(old('contratocodigo', $Cclicontratocliente->contratocodigo)); ?>">
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
                                                                value="<?php echo e(old('documentocodigo', $Cclicontratocliente->documentocodigo)); ?>">
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
                                                                <option
                                                                    value="<?php echo e($Cclicontratocliente->tipodeservicio); ?>">
                                                                    Seleccionado:
                                                                    <?php echo e($Cclicontratocliente->tipodeservicio); ?></option>
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
                                                                placeholder="Ancho de banda : Requerido"
                                                                value="<?php echo e(old('anchodebanda', $Cclicontratocliente->anchodebanda)); ?>">
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
                                                                <option
                                                                    value="<?php echo e($Cclicontratocliente->modalidadequipo); ?>">
                                                                    Seleccionado:
                                                                    <?php echo e($Cclicontratocliente->modalidadequipo); ?></option>
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
                                                                value="<?php echo e(old('comportacion', $Cclicontratocliente->comportacion)); ?>">
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
                                                            <select class="chosen-select form-control" name="servicio"
                                                                data-placeholder="Sucursal">
                                                                <option value="<?php echo e($Cclicontratocliente->servicio); ?>">
                                                                    <?php if($Cclicontratocliente->servicio === 1): ?>

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
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">GPS</time>
                                                            <input type="text" name="gps"
                                                                class="form-control input-border-bottom" placeholder="GPS"
                                                                value="<?php echo e(old('gps', $Cclicontratocliente->gps)); ?>">
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
                                                                value="<?php echo e(old('latitud', $Cclicontratocliente->latitud)); ?>"
                                                                value="2">
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
                                                                value="<?php echo e(old('longitud', $Cclicontratocliente->longitud)); ?>">
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
                                                                value="<?php echo e(old('tarifa', $Cclicontratocliente->tarifa)); ?>">
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
                                                    <li class="feed-item feed-item-success">
                                                        <div class="row">
                                                            <div class="form-group">
                                                                <label for="nombres">Archivo:</label>
                                                                <br>
                                                                <a class="btn btn-link btn-primary btn-lg" target="_blank"
                                                                    data-toggle="tooltip" data-original-title="Ver"
                                                                    href="<?php echo e(asset($Cclicontratocliente->archivo)); ?>"><i
                                                                        class="fas fa-file-alt"> Archivo</i></a>
                                                            </div>
                                                            <input type="file" name="archivo"
                                                                class="form-control validarpdf"
                                                                placeholder="Archivo Contrato"
                                                                value="<?php echo e(old('archivo')); ?>">
                                                            <input type="text" onKeyPress="return nadasindatos(event)"
                                                                class="form-control input-border-bottom"
                                                                placeholder="Descirpción: requerido"
                                                                value="<?php echo e(old('direccion', $Cclicontratocliente->archivo)); ?>">
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
                                                            <div class="form-group">
                                                                <label for="nombres">Foto de Vivienda:</label>

                                                                <center> <a
                                                                        href="<?php echo e(asset($Cclicontratocliente->ffoto)); ?>"
                                                                        data-lightbox="mygallery"
                                                                        data-title="<?php echo e($Cclicontratocliente->cliente->nombre); ?> <?php echo e($Cclicontratocliente->cliente->apellido); ?>">
                                                                        <img src="<?php echo e(asset($Cclicontratocliente->ffoto)); ?>"
                                                                            title="ver imagen" class="img-fluid center"
                                                                            alt="Responsive image"
                                                                            style="width:100px; height:100px;"></a>
                                                                </center>

                                                            </div>
                                                            <input type="file" name="ffoto" accept="image/*"
                                                                class="form-control imagejs" placeholder="Archivo Contrato"
                                                                value="<?php echo e(old('ffoto')); ?>">
                                                            <input type="text" onKeyPress="return nadasindatos(event)"
                                                                class="form-control input-border-bottom"
                                                                placeholder="Descirpción: requerido"
                                                                value="<?php echo e(old('direccion', $Cclicontratocliente->ffoto)); ?>">
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
                                                                    value="<?php echo e(old('rnombre', $Cclicontratocliente->rnombre)); ?>">
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
                                                                    value="<?php echo e(old('rparantesco', $Cclicontratocliente->rparantesco)); ?>">
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
                                                                    value="<?php echo e(old('rapellido', $Cclicontratocliente->rapellido)); ?>">
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
                                                                    value="<?php echo e(old('rcelular', $Cclicontratocliente->rcelular)); ?>"
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
                                                                    value="<?php echo e(old('nombre', $Cclicontratocliente->nombre)); ?>">
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
                                                                    value="<?php echo e(old('parantesco', $Cclicontratocliente->parantesco)); ?>">
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
                                                                    value="<?php echo e(old('apellido', $Cclicontratocliente->apellido)); ?>">
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
                                                                    value="<?php echo e(old('celular', $Cclicontratocliente->celular)); ?>"
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
                                </div>
                                <!-- aqui sale-->
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
        $('#cliente_idd').change(function() {

            var cliente = $('#cliente_idd option:selected').data('cjson');

            //           $('#direccion').val(cliente.direc);
            $('#cnombre').val(cliente.nombre);
            $('#capellido').val(cliente.apellido);
            $('#ccedula').val(cliente.cedula);
            //$('#gps').val(cliente.gps);
            //$('#contacto1').val(cliente.contacto1);
            //$('#cdaorecinto').val(cliente.cdaorecinto);

        });

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\AppQuantika\resources\views/cclicontratoclientes/edit.blade.php ENDPATH**/ ?>