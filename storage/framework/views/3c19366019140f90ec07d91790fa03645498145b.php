
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
                                        <td colspan="2"> <?php echo e($cuentacobrar->cclicontratocliente->cliente->nombre); ?> <?php echo e($cuentacobrar->cclicontratocliente->cliente->apellido); ?>  </td>
                
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
                                        <td><?php echo e($cuentacobrar->fecha); ?></td>
                                        <td colspan="">Abonado:</td>
                                        <td>$<?php echo e($cuentacobrar->abonado); ?></td>
                                        <td colspan="">Saldo pendiente:</td>
                                        <td>$<?php echo e($cuentacobrar->saldo); ?></td>
                                        
                                    </tr>
                                    <tr>
                                        <td colspan="4"><strong>Usuario quien realizo el cobro:</strong></td>
                                        <td><?php echo e($cuentacobrar->usuariocreador); ?></td>
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
                                            <th scope="col">Documento</th>
                                            <th scope="col">Fecha de posito</th>
                                            <th scope="col">Valor Pagado</th>
                                            <th scope="col">Persona que realizó el pago</th>
                                            <th scope="col">Archivo</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>  <?php $__empty_1 = true; $__currentLoopData = $detallecuentascobrar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detallecuentascobr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                          <td><?php echo e($detallecuentascobr->recibo); ?></td>
                                          <td><?php echo e($detallecuentascobr->online); ?></td>
                                          <td><?php echo e($detallecuentascobr->factura); ?></td>
                                          <td><?php echo e($detallecuentascobr->observacion); ?></td>
                                          <td><?php echo e($detallecuentascobr->banco); ?></td>
                                          <td><?php echo e($detallecuentascobr->documento); ?></td>
                                          <td><?php echo e($detallecuentascobr->created_at); ?></td>
                                          <td><?php echo e($detallecuentascobr->valorpagado); ?></td>
                                          <td><?php echo e($detallecuentascobr->parentezco); ?></td>
                                          
                                          <td>
                                            <center> <a href="<?php echo e(asset($detallecuentascobr->archivo)); ?>"
                                                data-lightbox="mygallery"
                                                data-title="Archivo">
                                                <img src="<?php echo e(asset($detallecuentascobr->archivo)); ?>" title="ver imagen"
                                                    class="img-fluid center" alt="Responsive image"
                                                    style="width:100px; height:100px;"></a> </center>
                                                </td>
                                         
                                         
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                                        <tr>
                                            <td colspan="10"> <center>No existen registros</center></td>
                                        </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                              
                                     

                                        <!--<a href="javascript:history.back()"> Volver Atrás</a>-->

                        </div>
                    </div>
                    
                    <div class="">
                        <a href="javascript: history.go(-1)" class="btn btn-primary btn-border btn-round mr-2"><i
                            class="fas fa-reply"></i>
                        Volver</a>
                    </div>
                    <br>
                </div>
            </div>
        </div>

    </div>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\nuevoxampp\htdocs\app\AppQuantika\resources\views/cuentasporcobrars/show.blade.php ENDPATH**/ ?>