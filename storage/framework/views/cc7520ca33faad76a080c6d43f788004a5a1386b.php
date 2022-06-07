
<?php $__env->startSection('title', 'Diario de Caja'); ?>
<?php $__env->startSection('content'); ?>
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h1 class="text-white title-it"><i class="fas fa-inbox"></i> Control Diario de Caja</h1>

                    <h5 class="text-white op-7 mb-2"><i class="fas fa-archive"></i> Caja y Cobros</h5>
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
                        <!--<div class="card-title"><i class="far fa-list-alt"></i> Listado</div>
                        <div class="card-category"><i class="fab fa-creative-commons-nd"></i> Datos diario
                        </div>-->
                        <div class="d-flex flex-wrap justify-content-around pb-2 pt-4" style="font-weight: bold;">
                           
                            <div class="form-control">
                                <div class="card full-height">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    
                                                </div>
                                                <div class="col-md-4" style="font-weight: bold; font-size: 23px;">
                                                    Fecha: <?php echo e($cajaa->fecha); ?>

                                                </div>
                                                <br><br>
                                                <div class="col-md-5">
                                                    <i class="fas fa-caret-square-up"></i> Control en Caja 
                                                </div>
                                                <div class="col-md-7">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <time class="date" datetime="9-25">Inicio en Caja</time>
                                                <input type="text" id="fechadeposito" name="fechadeposito"
                                                    class="form-control input-border-bottom"
                                                    value="$<?php echo e($cajaa->cajaprincipal); ?>"
                                                    onKeyPress="return validar(event)"
                                                   oncut="return false" oncopy="return false" onpaste="return false" 
                                                   placeholder="requerido" >
                                            </div>
                                            
                                            <div class="col-md-3">
                                                <time class="date" datetime="9-25">Dinero entrago al gerente al final del día:</time>
                                                <input type="text" id="fechadeposito" name="fechadeposito"
                                                    class="form-control input-border-bottom"
                                                    value="$<?php echo e($cajaa->saldoingeniero); ?>"
                                                    onKeyPress="return validar(event)"
                                                   oncut="return false" oncopy="return false" onpaste="return false" 
                                                   placeholder="requerido" >
                                            </div>
                                            <div class="col-md-3">
                                                <time class="date" datetime="9-25">Total en caja sin restar gerencia</time>
                                                <input type="text" id="fechadeposito" name="fechadeposito"
                                                    class="form-control input-border-bottom"
                                                    value="$<?php echo e($cajaa->cajafinal); ?>"
                                                    onKeyPress="return validar(event)"
                                                   oncut="return false" oncopy="return false" onpaste="return false" 
                                                   placeholder="requerido" >
                                            </div>
                                            <div class="col-md-3">
                                                <time class="date" datetime="9-25">Total en Caja</time>
                                                <input type="text" id="fechadeposito" name="fechadeposito"
                                                    class="form-control input-border-bottom"
                                                    value="$<?php echo e($cajaa->saldocaja); ?>"
                                                    onKeyPress="return validar(event)"
                                                   oncut="return false" oncopy="return false" onpaste="return false" 
                                                   placeholder="requerido" >
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table id=""
                                    class="display table table-bordered table-head-bg-info table-bordered-bd-info mt-4 add-row">
                                    <thead>
                                        <tr class="table-info">
                                            <th>Cliente</th>
                                            <th>Fecha de servicio de </th>
                                            <th>Fecha de servicio hasta</th>
                                            <th>Monto</th>
                                            <th>Abonado</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $caja; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $caj): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($caj->cuentasporcobrar->cclicontratocliente->cliente->nombre); ?>

                                                    <?php echo e($caj->cuentasporcobrar->cclicontratocliente->cliente->apellido); ?></td>
                                                <td><?php echo e($caj->fechainicio); ?></td>
                                                <td><?php echo e($caj->fechafinal); ?></td>
                                                <td>$<?php echo e($caj->monto); ?></td>
                                                <td>$<?php echo e($caj->abonado); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                            
                            <div class="form-control">
                                <div class="card full-height">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <i class="fas fa-caret-square-up"></i> Control de Gastos
                                        </div>
                                    </div>
                                    <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <button onclick="myFunction('<?php echo e(route('reportecaja.edit',  $cajaa->id )); ?>')"
                                                            href="#mdsucur" rel="action"
                                                            data-toggle="modal" title="Ingresar" data-backdrop="static" data-keyboard="false"
                                                            class="btn btn-success btn-border btn-round ml-auto">
                                                            <i class="fas fa-calendar-minus"> Ingresar Gasto</i>
                                                        </button>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <time class="date" datetime="9-25">Total en Gasto</time>
                                                        <input type="text" id="gasto" name="gasto"
                                                            class="form-control input-border-bottom"
                                                            onKeyPress="return validar(event)"
                                                            <?php if($totalgasto): ?>
                                                            value="$<?php echo e($totalgasto->total_sales); ?>"    
                                                            <?php else: ?>
                                                            value="$0"    
                                                            <?php endif; ?>
                                                           oncut="return false" oncopy="return false" onpaste="return false" 
                                                           placeholder="requerido" >
                                                    </div>
                                                </div>
                                            
                                                <div class="table-responsive">
                                                    <table id=""
                                                        class="display table table-bordered table-head-bg-info table-bordered-bd-info mt-4 add-row nowrap">
                                                        <thead>
                                                            <tr class="table-info">
                                                                <th>Nombre</th>
                                                                <th>Descripción</th>
                                                                <th>Monto</th>
                                                                <th>Observacion</th>
                                                                <th>Soporte</th>
                                                                <th>Factura</th>
                                                                <th>Archivo</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $__currentLoopData = $gasto; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $gast): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <tr>
                                                                    <td><?php echo e($gast->nombre); ?></td>
                                                                    <td><?php echo e($gast->descripcion); ?></td>
                                                                    <td>$<?php echo e($gast->monto); ?></td>
                                                                    <td><?php echo e($gast->observacion); ?></td>
                                                                    <td><?php echo e($gast->soporte); ?></td>
                                                                    <td><?php echo e($gast->factura); ?></td>
                                                                    <td><center> <a href="<?php echo e(asset($gast->image)); ?>" data-lightbox="mygallery" data-title=""><img src="<?php echo e(asset($gast->image)); ?>" title="ver imagen" class="img-fluid center" alt="Responsive image" style="width:100px; height:50px;"></a> </center></td>
                                                                </tr>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-control">
                                <div class="card full-height">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <i class="fas fa-box"></i> Cobros extras
                                        </div>
                                    </div>
                                    <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-hover table-head-bg-info table-bordered-bd-info mt-4 add-row display nowrap">
                                                        <thead>
                                                            <tr>
                                                                <th>Nombre</th>
                                                                <th>Descripción</th>
                                                                <th>Ingresado_por</th>
                                                                <th>#Fecha_de_caja</th>
                                                                <th>Monto</th>
                                                                <th>Observacion</th>
                                                                <th>Factura</th>
                                                                <th>recibo</th>
                                                                <th>online</th>
                                                                <th>Foto</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $__currentLoopData = $cobroextra; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cobroextr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <tr>
                                                                    <td><?php echo e($cobroextr->nombre); ?></td>
                                                                    <td><?php echo e($cobroextr->descripcion); ?></td>
                                                                    <td><?php echo e($cobroextr->ingresapor); ?></td>
                                                                    <td><?php echo e($cobroextr->caja->fecha); ?></td>
                                                                    <td>$<?php echo e($cobroextr->monto); ?></td>
                                                                    <td><?php echo e($cobroextr->observacion); ?></td>
                                                                    <td><?php echo e($cobroextr->factura); ?></td>
                                                                    <td><?php echo e($cobroextr->recibo); ?></td>
                                                                    <td><?php echo e($cobroextr->online); ?></td>
                                                                    
                                                                   
                                                                    <td><center> <a href="<?php echo e(asset($cobroextr->image)); ?>" data-lightbox="mygallery" data-title=""><img src="<?php echo e(asset($cobroextr->image)); ?>" title="ver imagen" class="img-fluid center" alt="Responsive image" style="width:100px; height:50px;"></a> </center></td>
                    
                    
                                                                </tr>
                                                            
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                    </div>
                                </div>
                            </div>
                                        <!--<a href="javascript:history.back()"> Volver Atrás</a>-->

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="modal face animated rotateIn" id="mdsucur" role="dialog">
    </div>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script>
    function myFunction(url) {
        $('#mdsucur').load(url, function() {
            $('#mdsucur').modal({
                backdrop: 'static',
                keyboard: false,
                show: true,
                remote: false
            });
        });
        return false;
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\nuevoxampp\htdocs\app\AppQuantika\resources\views/cajareporte/show.blade.php ENDPATH**/ ?>