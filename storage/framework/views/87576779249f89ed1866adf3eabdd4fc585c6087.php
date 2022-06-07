
<?php $__env->startSection('title', 'Recepción de Novedades'); ?>
<?php $__env->startSection('content'); ?>


    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h1 class="text-white title-it"> <i class="fas fa-phone-square"></i>
                        CREAR NOVEDAD</h1>

                    <h5 class="text-white op-7 mb-2"><i class="icon-globe"></i> RECEPCIÓN</h5>
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
                        <div class="card-title"><i class="fas fa-align-justify"></i> Novedad</div>
                        <div class="card-category"><i class="fas fa-server"></i> Registro</div>
                        <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">


                            <form action="<?php echo e(route('novedads.store')); ?>" method="POST" class="form-control form-createe">
                                <!--estogenera el token de validacion  -->
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="cliente_id">Nombre-Apellido-Cedula-Contrato:</label>
                                            <select class="chosen-select form-control" id="cclicontratocliente_idddd"
                                                name="cclicontratocliente_id" data-placeholder="Sucursal">
                                                <option value="" selected disabled hidden>Seleccione Los datos del cliente
                                                </option>
                                                <?php $__currentLoopData = $clientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cliente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($cliente->id); ?>"
                                                        data-cjson='{"cedula":"<?php echo e($cliente->cliente->cedula); ?>"
                                                                            ,"contacto":"<?php echo e($cliente->contacto); ?>"
                                                                            ,"cdaorecinto":
                                                                            "<?php echo e($cliente->canton->provincia->name); ?>:<?php echo e($cliente->canton->name); ?>:<?php echo e($cliente->cdaorecinto); ?>:<?php echo e($cliente->direccion); ?>"
                                                                            ,"contacto1":"<?php echo e($cliente->contacto1); ?>" 
                                                                            ,"email":"<?php echo e($cliente->cliente->email); ?>"
                                                                            ,"servicio":
                                                                            <?php if($cliente->servicio == 1): ?> "Radio" <?php else: ?> "Fibra" <?php endif; ?>
                                                                            ,"nombre":"<?php echo e($cliente->cliente->nombre); ?>"}'>
                                                        <?php echo e($cliente->cliente->nombre); ?>

                                                        <?php echo e($cliente->cliente->apellido); ?> :
                                                        <?php echo e($cliente->cliente->cedula); ?> <?php echo e($cliente->contratocodigo); ?>


                                                        
                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            </select>
                                            <?php $__errorArgs = ['cclicontratocliente_id'];
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
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="servicio">Servicio:</label>
                                            <input type="text" name="servicio" id="servicio" class="form-control" disabled
                                                placeholder="GPS" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="cedula">Cantacto 1:</label>
                                            <input type="text" name="contacto" disabled id="contacto"
                                                onKeyPress="return soloNumeros(event)" class="form-control"
                                                placeholder="Contacto 1" value="">

                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="cedula">Cantacto 2:</label>
                                            <input type="text" name="contacto1" disabled id="contacto1"
                                                onKeyPress="return soloNumeros(event)" class="form-control"
                                                placeholder="Contacto 2" value="">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="cedula">Correo Electronico:</label>
                                            <input type="email" name="email" id="email" disabled class="form-control"
                                                placeholder="Correo Electronico" value="">

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group">
                                            <label for="cedula">Provincia-Cantón: Cdla o Recinto - Dirección:</label>

                                            <input type="text" name="cdaorecinto" id="cdaorecinto" disabled
                                                class="form-control" placeholder="Cdla o Recinto-Dirección" value="">

                                        </div>
                                    </div>
                                    <div class="col-md-4">


                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="fechavisita">Fecha de visita:</label>
                                            <input type="date" name="fechavisita" id="fechavisita" class="form-control"
                                                placeholder="Correo Electronico" value="">

                                            <?php $__errorArgs = ['fechavisita'];
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
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="horavisita">Hora de visita:</label>
                                            <input type="time" name="horavisita" id="horavisita" class="form-control"
                                                placeholder="Correo Electronico" value="">

                                            <?php $__errorArgs = ['horavisita'];
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
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="novedadopercance">Novedad o Percance:</label>
                                    <select class="chosen-select form-control" name="novedadopercance"
                                        data-placeholder="Sucursal">
                                        <option value="" selected disabled hidden>Seleccione alguna Novedad</option>

                                        <option value="1">Instalación</option>
                                        <option value="2">Retiro de Equipo</option>
                                        <option value="3">Reinstalación</option>
                                        <option value="4">Intermitente</option>
                                        <option value="5">Lento</option>
                                        <option value="6">Desconf. Router</option>
                                        <option value="7">Cable. Dañado</option>
                                        <option value="8">Problema Equipos</option>
                                        <option value="9">Sin servicio</option>
                                        <option value="10">Otros</option>
                                    </select>
                                    <?php $__errorArgs = ['novedadopercance'];
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
                                    <label for="especificar">Especificar:</label>
                                    <textarea rows="5" class="form-control" name="especificar"
                                        placeholder="Si elige otros por favor especificar">Sin especificar</textarea>
                                    <?php $__errorArgs = ['especificar'];
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
                                                                <input type="text" name="nombre"
                                                                    onKeyPress="return sololetrascoma(event)"
                                                                    class="form-control input-border-bottom"
                                                                    placeholder="Nombre: no requerido"
                                                                    value="<?php echo e(old('nombre')); ?>">
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
                                                                <input type="text" name="parentesco"
                                                                    class="form-control input-border-bottom"
                                                                    placeholder="Parantesco: no requerido"
                                                                    value="<?php echo e(old('parentesco')); ?>">
                                                                <?php $__errorArgs = ['parentesco'];
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
                                                                <time class="date" datetime="9-25">Celular</time>
                                                                <input type="text" name="celular"
                                                                    class="form-control input-border-bottom"
                                                                    placeholder="Contacto: no requerido "
                                                                    value="<?php echo e(old('celular')); ?>"
                                                                    onKeyPress="return soloNumeros(event)" minlength="10"
                                                                    maxlength="10">
                                                                <?php $__errorArgs = ['celular'];
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
        var fecha = new Date();
        var mes = fecha.getMonth() + 1; //obteniendo mes
        var dia = fecha.getDate(); //obteniendo dia
        var ano = fecha.getFullYear(); //obteniendo año
        var hora = fecha.getHours(); //obteniendo año
        var minut = fecha.getMinutes(); //obteniendo año

        if (dia < 10)
            dia = '0' + dia; //agrega cero si el menor de 10
        if (mes < 10)
            mes = '0' + mes //agrega cero si el menor de 10
        if (minut < 10)
            minut = '0' + minut; //agrega cero si el menor de 10
        var fechaactualversion = ano + "-" + mes + "-" + dia;
        document.getElementById('fechavisita').value = ano + "-" + mes + "-" + dia;
        document.getElementById('horavisita').value = hora + ":" + minut;

        $('#fechavisita').change(function() {
            if ($('#fechavisita').val() < fechaactualversion) {
                swal("Información!", "Ingresar fecha correcta para la visita", {
                    icon: "info",
                    buttons: {
                        confirm: {
                            className: 'btn btn-info'
                        }
                    },
                });
                document.getElementById('fechavisita').value = ano + "-" + mes + "-" + dia;


            }
        });

        $('#alert_demo_7').click(function(e) {
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                buttons: {
                    confirm: {
                        text: 'Yes, delete it!',
                        className: 'btn btn-success'
                    },
                    cancel: {
                        visible: true,
                        className: 'btn btn-danger'
                    }
                }
            }).then((Delete) => {
                if (Delete) {
                    swal({
                        title: 'Deleted!',
                        text: 'Your file has been deleted.',
                        type: 'success',
                        buttons: {
                            confirm: {
                                className: 'btn btn-success'
                            }
                        }
                    });
                } else {
                    swal.close();
                }
            });
        });

        $('#cclicontratocliente_idddd').change(function() {
            var cliente = $('#cclicontratocliente_idddd option:selected').data('cjson');
            $('#contacto').val(cliente.contacto);
            //           $('#direccion').val(cliente.direc);

            $('#email').val(cliente.email);

            $('#servicio').val(cliente.servicio);
            $('#contacto1').val(cliente.contacto1);
            $('#cdaorecinto').val(cliente.cdaorecinto);

        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\nuevoxampp\htdocs\app\AppQuantika\resources\views/novedads/create.blade.php ENDPATH**/ ?>