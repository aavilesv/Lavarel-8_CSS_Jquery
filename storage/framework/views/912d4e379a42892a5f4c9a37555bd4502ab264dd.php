
<?php $__env->startSection('title', 'Cuentas por cobrar'); ?>
<?php $__env->startSection('content'); ?>
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h1 class="text-white title-it"><i class="flaticon-list"></i> Pago mensual</h1>

                    <h5 class="text-white op-7 mb-2"><i class="fas fa-money-bill-wave"></i> Cobros a Clientes</h5>
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
                        <div class="card-category"><i class="fab fa-creative-commons-nd"></i> Pago registrado
                        </div>
                        <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">

                            <div class="table-responsive">
                                <div class="card-title">
                                    <i class="fas fa-user"></i> Datos del Cliente
                                </div>
                                <hr>
                                <table class="display table table-striped table-hover table-head-bg-primary">
                                    <tr class="thh">
                                        <th> Nombres y Apellidos:</th>
                                        <td colspan="2"> <?php echo e($cuentacobrar->cclicontratocliente->cliente->nombre); ?>

                                            <?php echo e($cuentacobrar->cclicontratocliente->cliente->apellido); ?> </td>

                                        <th>Tarifa:</th>
                                        <td colspan="2">$ <?php echo e($cuentacobrar->cclicontratocliente->tarifa); ?></td>
                                    </tr>
                                    <tr class="thh">
                                        <th> Documento de Código:</th>
                                        <td colspan="2">
                                            <?php echo e($cuentacobrar->cclicontratocliente->documentocodigo); ?>

                                        </td>

                                        <th>Contrato Código:</th>
                                        <td colspan="2"><?php echo e($cuentacobrar->cclicontratocliente->contratocodigo); ?></td>
                                    </tr>
                                    <tr class="thh">
                                        <th>Fecha de pago:</th>
                                        <td><?php echo e($cuentacobrar->cclicontratocliente->fecha); ?></td>
                                        <td colspan="2">Saldo pendiente $:</td>
                                        <td><?php echo e($cuentacobrar->saldo); ?></td>
                                    </tr>
                                </table>
                            </div>


                            <div class="table-responsive">
                                <div class="card-title">


                                    <i class="fas fa-money-bill-wave"></i> Datos del Pago
                                </div>
                                <hr>
                                <table class="display table table-striped table-bordered add-roww nowrap">
                                    <thead>
                                        <tr class="table-info">
                                            <th scope="col">Recibo</th>
                                            <th scope="col">Online</th>
                                            <th scope="col">Factura</th>
                                            <th scope="col">Observación</th>
                                            <th scope="col">Banco</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__empty_1 = true; $__currentLoopData = $detallecuentascobrar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detallecuentascobr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <tr>
                                                <td><?php echo e($detallecuentascobr->recibo); ?></td>
                                                <td><?php echo e($detallecuentascobr->online); ?></td>
                                                <td><?php echo e($detallecuentascobr->factura); ?></td>
                                                <td><?php echo e($detallecuentascobr->observacion); ?></td>
                                                <td><?php echo e($detallecuentascobr->banco); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                                            <tr>
                                                <td colspan="10">
                                                    <center>No existen registros</center>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                            
                            <div class="table-responsive">
                                <table class="display table table-striped table-bordered add-roww nowrap">
                                    <thead>
                                        <tr class="table-info">
                                            <th scope="col">Documento</th>
                                            <th scope="col">Fecha de posito</th>
                                            <th scope="col">Valor Pagado</th>
                                            <th scope="col">Persona que realizó el pago</th>
                                            <th scope="col">Archivo</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__empty_1 = true; $__currentLoopData = $detallecuentascobrar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detallecuentascobr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <tr>
                                                <td><?php echo e($detallecuentascobr->documento); ?></td>
                                                <td><?php echo e($detallecuentascobr->created_at); ?></td>
                                                <td>$<?php echo e($detallecuentascobr->valorpagado); ?></td>
                                                <td><?php echo e($detallecuentascobr->parentezco); ?></td>

                                                <td>
                                                    <center> <a href="<?php echo e(asset($detallecuentascobr->archivo)); ?>"
                                                            data-lightbox="mygallery" data-title="Archivo">
                                                            <img src="<?php echo e(asset($detallecuentascobr->archivo)); ?>"
                                                                title="ver imagen" class="img-fluid center"
                                                                alt="Responsive image"
                                                                style="width:100px; height:100px;"></a> </center>
                                                </td>


                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                                            <tr>
                                                <td colspan="10">
                                                    <center>No existen registros</center>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                            <hr>
                            <form action="<?php echo e(route('cuentasporcobrar.update',$cuentacobrar->id)); ?>" method="POST"
                                class="form-control form-createe" enctype="multipart/form-data">
                                <!--estogenera el token de validacion  -->
                                <?php echo method_field('put'); ?>
                                <?php echo csrf_field(); ?>
                                <div class="card-title">
                                    <i class="fas fa-money-bill-wave"></i> Realizar Pago
                                </div>
                                <hr>
                                <ol class="activity-feed">
                                    <div class="row">

                                        <div class="col-sm-6 col-md-3">
                                            <li class="feed-item feed-item-success">
                                                <div class="row">
                                                    <time class="date" datetime="9-25">#Recibo</time>
                                                    <input type="text" id="recibo" name="recibo"
                                                        class="form-control input-border-bottom decimales"
                                                        oncopy="return false" onpaste="return false" placeholder="requerido"
                                                        required>
                                                </div>
                                            </li>
                                        </div>
                                        <div class="col-sm-6 col-md-3">
                                            <li class="feed-item feed-item-primary">
                                                <div class="row">
                                                    <time class="date" datetime="9-25">Monto a pagar $</time>
                                                    <input type="text" id="valorpagado" name="valorpagado"
                                                        class="form-control input-border-bottom decimales"
                                                        oncopy="return false" onpaste="return false" placeholder="requerido"
                                                        value="0">
                                                </div>
                                            </li>
                                        </div>

                                        <div class="col-sm-6 col-md-3">
                                            <li class="feed-item feed-item-info">
                                                <div class="row">
                                                    <time class="date" datetime="9-25">Saldo $</time>
                                                    <input type="text" id="saldo" name="saldo"
                                                        onKeyPress="return validar(event)" onpaste="return false"
                                                        class="form-control input-border-bottom"
                                                        placeholder="Automatico requerido">
                                                </div>
                                            </li>
                                        </div>
                                    </div>
                                </ol>

                                <div class="card-title">
                                    <i class="fas fa-money-check-alt"></i> Otras formas de pago
                                </div>
                                <hr>

                                <ol class="activity-feed">
                                    <div class="row">


                                        <div class="col-sm-6 col-md-3">
                                            <li class="feed-item feed-item-success">
                                                <div class="row">
                                                    <time class="date" datetime="9-25">Online</time>
                                                    <input type="text" id="online" name="online"
                                                        class="form-control input-border-bottom" oncut="return false"
                                                        oncopy="return false" onpaste="return false"
                                                        placeholder="No requerido">
                                                </div>
                                            </li>
                                        </div>
                                        <div class="col-sm-6 col-md-3">
                                            <li class="feed-item feed-item-primary">
                                                <div class="row">
                                                    <time class="date" datetime="9-25">Factura</time>
                                                    <input type="text" id="factura" name="factura"
                                                        class="form-control input-border-bottom" oncut="return false"
                                                        oncopy="return false" onpaste="return false"
                                                        placeholder="requerido">
                                                </div>
                                            </li>
                                        </div>

                                        <div class="col-sm-6 col-md-6">
                                            <li class="feed-item feed-item-info">
                                                <div class="row">
                                                    <time class="date" datetime="9-25">Observación</time>
                                                    <input type="text" id="observacion" name="observacion"
                                                        onpaste="return false" class="form-control input-border-bottom"
                                                        placeholder="Automatico requerido">
                                                </div>
                                            </li>
                                        </div>

                                        <div class="col-sm-6 col-md-3">
                                            <li class="feed-item feed-item-success">
                                                <div class="row">
                                                    <time class="date" datetime="9-25">Documento</time>
                                                    <input type="text" id="documento" name="documento"
                                                        class="form-control input-border-bottom" oncut="return false"
                                                        oncopy="return false" onpaste="return false"
                                                        placeholder="No requerido">
                                                </div>
                                            </li>
                                        </div>
                                        <div class="col-sm-6 col-md-3">
                                            <li class="feed-item feed-item-primary">
                                                <div class="row">
                                                    <time class="date" datetime="9-25">Banco</time>
                                                    <input type="text" id="banco" name="banco"
                                                        class="form-control input-border-bottom" oncut="return false"
                                                        oncopy="return false" onpaste="return false"
                                                        placeholder="requerido">
                                                </div>
                                            </li>
                                        </div>

                                        <div class="col-sm-6 col-md-3">
                                            <li class="feed-item feed-item-primary">
                                                <div class="row">
                                                    <time class="date" datetime="9-25">Fecha del Deposito</time>
                                                    <input type="date" id="fechadeposito" name="fechadeposito"
                                                        class="form-control input-border-bottom" oncut="return false"
                                                        oncopy="return false" onpaste="return false"
                                                        placeholder="requerido">
                                                </div>
                                            </li>
                                        </div>

                                        <div class="col-sm-6 col-md-6">
                                            <li class="feed-item feed-item-primary">
                                                <div class="row">
                                                    <time class="date" datetime="9-25">Archivo</time>
                                                    <input type="file" id="archivo" name="archivo"
                                                        class="form-control input-border-bottom imagejs" accept="image/*"
                                                        oncut="return false" oncopy="return false" onpaste="return false"
                                                        placeholder="requerido" value="sd">
                                                </div>
                                            </li>
                                        </div>

                                        <div class="col-sm-6 col-md-6">
                                            <li class="feed-item feed-item-primary">
                                                <div class="row">
                                                    <time class="date" datetime="9-25">Parentezco</time>
                                                    <input type="text" id="parentezco" name="parentezco"
                                                        class="form-control input-border-bottom" oncut="return false"
                                                        oncopy="return false" onpaste="return false" placeholder="requerido"
                                                        value="">
                                                </div>
                                            </li>
                                        </div>

                                    </div>
                                </ol>

                                <div class="ml-md-auto py-2 py-md-0">
                                    <a href="javascript: history.go(-1)" class="btn btn-danger btn-border btn-round mr-2"><i
                                            class="fas fa-reply"></i>
                                        Volver</a>
                                    <button id="btn-registrar" class="btn btn-success btn-border btn-round mr-2"
                                        type="submit"><i class="fas fa-save"></i>
                                        Ingresar</button>
                                </div>


                                <!--<a href="javascript:history.back()"> Volver Atrás</a>-->




                        </div>
                    </div>
                    </form>



                    <!--<a href="javascript:history.back()"> Volver Atrás</a>-->

                </div>
            </div>
        </div>
    </div>
    

    


<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>

    <script>
        $("#saldo").numeric({
            decimalPlaces: 2
        });
        
        $("#valorpagado").numeric({
            decimalPlaces: 2
        });
        $("#recibo").numeric({ decimal: false, negative: false }, function() { alert("Positive integers only"); this.value = ""; this.focus(); });


        $('#saldo').val(stocktotal(parseInt('<?php echo e($cuentacobrar->saldo); ?>'), $('#valorpagado').val()));

        $("#valorpagado").mouseleave(function(e) {
            
                if (parseInt('<?php echo e($cuentacobrar->saldo); ?>') >= parseInt($('#valorpagado').val()) 
                && $('#valorpagado').val()
                    .length != 0) {
                    $('#saldo').val(stocktotal(parseInt('<?php echo e($cuentacobrar->saldo); ?>'), $('#valorpagado').val()));
                } else {
                    $('#saldo').val(stocktotal(parseInt('<?php echo e($cuentacobrar->saldo); ?>'), 0));
                    $('#valorpagado').val(0);
                    swal("Monto ingresado es mayor al saldo pendiente!", {
                        icon: "info",
                        buttons: {
                            confirm: {
                                className: 'btn btn-warning'
                            }
                        },
                    });
                }

        });
        $('#valorpagado').mouseenter(function(event) {
            
                if (parseInt('<?php echo e($cuentacobrar->saldo); ?>') >= parseInt($('#valorpagado').val())
                 && $('#valorpagado').val()
                    .length != 0) {
                    $('#saldo').val(stocktotal(parseInt('<?php echo e($cuentacobrar->saldo); ?>'), $('#valorpagado').val()));
                } else {
                    $('#saldo').val(stocktotal(parseInt('<?php echo e($cuentacobrar->saldo); ?>'), 0));
                    $('#valorpagado').val(0);
                    swal("Monto ingresado es mayor al saldo pendiente!", {
                        icon: "info",
                        buttons: {
                            confirm: {
                                className: 'btn btn-warning'
                            }
                        },
                    });
                }
            
        });

        function stocktotal(number, nuevo) {
            return number - nuevo;


        }

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\nuevoxampp\htdocs\app\AppQuantika\resources\views/cuentasporcobrars/pendiente.blade.php ENDPATH**/ ?>