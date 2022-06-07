
<?php $__env->startSection('title', 'Cobros extras'); ?>
<?php $__env->startSection('content'); ?>
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h1 class="text-white title-it"><i class="fas fa-money-bill-wave"></i> Cobro Extras</h1>
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
                        <div class="card-category"><i class="fab fa-creative-commons-nd"></i> Cargas Familiares Registradas
                        </div>
                        <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">

                            <form action="<?php echo e(route('cobroextra.store')); ?>" method="POST" class="form-control form-createe"
                                enctype="multipart/form-data">
                                <!--estogenera el token de validacion  -->
                                <?php echo csrf_field(); ?>
                                <div class="card full-height">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <i class="fas fa-user"></i> Datos del Cliente
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <ol class="activity-feed">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <li class="feed-item feed-item-success">
                                                        <time class="date col-12" datetime="9-25">Clientes</time>
                                                        <select
                                                            class="chosen-selectt form-control input-border-bottom cliente_id"
                                                            required id="cclicontratocliente_idd"
                                                            name="nombre" data-placeholder="Cliente">
                                                            <option value="" selected disabled hidden>Seleccione un
                                                                Nombre-Cedula</option>
                                                            <option value="S-R">S-R</option>
                                                            <option value="N/A">N/A</option>
                                                            <option value="S-N">S-N</option>
                                                            <?php $__currentLoopData = $contratocliente; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cliente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($cliente->cliente->nombre); ?><?php echo e($cliente->cliente->apellido); ?>"> <?php echo e($cliente->cliente->nombre); ?><?php echo e($cliente->cliente->apellido); ?>:<?php echo e($cliente->cliente->cedula); ?> </option>
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
                                                    </li>
                                                </div>
                                                
                                                <input type="hidden" name="caja_id" value="<?php echo e($caja->id); ?>">
                                                <div class="col-md-6">
                                                    <li class="feed-item feed-item-success">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Ingresado por:</time>
                                                            <input type="text" name="ingresapor" maxlength="200"
                                                            class="form-control input-border-bottom decimales"
                                                             required placeholder="Ejemplo: INSTALACION,VTA ACCESORIOS,REINSTALACION,ETC.">
                                                        </div>
                                                    </li>
                                                </div>
                                                <div class="col-md-6">
                                                    <li class="feed-item feed-item-success">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Motivo</time>
                                                            <textarea name="descripcion" maxlength="200"
                                                                class="form-control" required
                                                                placeholder="Ejemplo: PAGO 3 CUOTAS,ROUTER,GRATIS NARANJITO 18 MESES"></textarea>
                                                        </div>
                                                    </li>
                                                </div>
                                            </div>
                                        </ol>
                                        <div class="card-title">
                                            <i class="fas fa-money-bill-wave"></i> Detalle de Pago
                                        </div>
                                        <hr>
                                        <ol class="activity-feed">
                                            <div class="row">
                                                <div class="col-sm-6 col-md-3">
                                                    <li class="feed-item feed-item-success">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">#Recibo</time>
                                                            <input type="text" id="recibo" name="recibo" class="form-control input-border-bottom decimales" oncopy="return false" onpaste="return false" placeholder="requerido">
                                                        </div>
                                                    </li>
                                                </div>
                                                <div class="col-sm-6 col-md-3">
                                                    <li class="feed-item feed-item-primary">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Factura</time>
                                                            <input type="text" id="factura" name="factura"
                                                                class="form-control input-border-bottom"
                                                                oncut="return false" oncopy="return false"
                                                                onpaste="return false" placeholder="">
                                                        </div>
                                                    </li>
                                                </div>
                                                <div class="col-sm-6 col-md-3">
                                                    <li class="feed-item feed-item-primary">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Monto a pagar $</time>
                                                            <input type="text" id="valorpagado" name="monto"
                                                                class="form-control input-border-bottom decimales"
                                                                oncopy="return false" onpaste="return false"
                                                                placeholder="" value="0">
                                                        </div>
                                                    </li>
                                                </div>

                                                <div class="col-sm-6 col-md-3">
                                                    <li class="feed-item feed-item-success">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Online</time>
                                                            <input type="text" id="online" name="online"
                                                                class="form-control input-border-bottom"
                                                                oncut="return false" oncopy="return false"
                                                                onpaste="return false" placeholder="No requerido">
                                                        </div>
                                                    </li>
                                                </div>
                                                
                                                <div class="col-sm-6 col-md-6">
                                                    <li class="feed-item feed-item-info">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Observación</time>
                                                            <input type="text" id="observacion" name="observacion"
                                                                onpaste="return false"
                                                                class="form-control input-border-bottom"
                                                                placeholder="Automatico requerido">
                                                        </div>
                                                    </li>
                                                </div>
                                                <div class="col-sm-6 col-md-6">
                                                    <li class="feed-item feed-item-primary">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Foto</time>
                                                            <input type="file" id="archivo" name="image"
                                                                class="form-control input-border-bottom imagejs"
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
        $('#btn-registrar').click(function() {
            if ($('#cclicontratocliente_idd').val()) {

                return true;
            } else {
                swal({
                    title: "Información!",
                    text: 'Ingresar Cliente',
                    icon: "info",
                    buttons: {
                        confirm: {
                            text: "Confirmar",
                            value: true,
                            visible: true,
                            className: "btn btn-success",
                            closeModal: true
                        }
                    }
                });
                return false;
            }
        });



        $("#abanado").numeric({
            negative: false,
            decimalPlaces: 2
        });


        $("#valorpagado").numeric({
            negative: false,
            decimalPlaces: 2
        });
        $("#recibo").numeric({
            decimal: false,
            negative: false
        }, function() {
            alert("Positive integers only");
            this.value = "";
            this.focus();
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\nuevoxampp\htdocs\app\AppQuantika\resources\views/cobroextras/save.blade.php ENDPATH**/ ?>