
<?php $__env->startSection('title', 'Listado de Nominas de Pago'); ?>
<?php $__env->startSection('content'); ?>
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h1 class="text-white title-it"><i class="flaticon-agenda-1"></i> Nomina de Pagos</h1>
                    <h5 class="text-white op-7 mb-2"><i class="far fa-calendar-alt"></i> Nomina</h5>
                </div>
                <div class="ml-md-auto py-2 py-md-0">
                    <?php if($buscarincial === ''): ?>  
                     <a class="btn btn-primary btn-round ml-auto" data-toggle="tooltip" 
                      data-original-title="Imprimir todos los registros" 
                      target="_blank"href="<?php echo e(route('pdfnominatotal.nominapdfall')); ?>">
                      <i class="icon-printer"></i> Imprimir</a>
                    <?php else: ?> <a class="btn btn-primary btn-round ml-auto" data-toggle="tooltip" 
                    data-original-title="Desde <?php echo e($buscarincial); ?> hasta <?php echo e($buscarfinal); ?>" target="_blank"
                     href="<?php echo e(route('pdfnominalista.nominapdlista',[$buscarincial, $buscarfinal])); ?>">
                     <i class="icon-printer"></i> Imprimir</a>   <?php endif; ?>
                    <a class="btn btn-success btn-round ml-auto" data-toggle="tooltip" data-original-title="Ingresar" href="<?php echo e(route('nominapago.create')); ?>"><i class="fa fa-plus"></i> Ingresar</a>
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="row mt--2">
            <div class="col-md-12">
                <div class="card full-height">
                    <div class="card-body">
                        <div class="card-title"><i class="far fa-list-alt"></i> Roles</div>
                        <div class="card-category"><i class="fab fa-creative-commons-nd"></i> Roles de pagos de Empleados
                            Registrados</div>
                        <form class="navbar-left navbar-form nav-search mr-md-12">
                            <div class="form-group text">
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <time class="date" datetime="9-25"><strong>Desde</strong> </time>
                                        <input type="date" required name="fechainicial" id="fechainicial"
                                            placeholder="Search ..." value="<?php echo e(old('fechainicial', $buscarincial)); ?>"
                                            class="form-control">
                                    </li>
                                    <li class="list-inline-item">
                                        <time class="date" datetime="9-25"><strong>Hasta</strong></time>
                                        <input type="date" required id="fechafinal" name="fechafinal"
                                            placeholder="Search ..." value="<?php echo e(old('fechafinal', $buscarfinal)); ?>"
                                            class="form-control">

                                    </li>
                                    <li class="list-inline-item">

                                        <button type="submit" title="Buscar" class="btn btn-search pr-1">
                                            <i class="fa fa-search search-icon"></i>
                                        </button>

                                    </li>
                                </ul>
                            </div>
                        </form>

                        <div class="collapse" id="search-nav">
                            <form class="navbar-left navbar-form nav-search mr-md-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <button type="submit" class="btn btn-search pr-1">
                                            <i class="fa fa-search search-icon"></i>
                                        </button>
                                    </div>
                                    <input type="text" placeholder="Buscar por Apellido" name="apellido"
                                        class="form-control">
                                </div>
                            </form>
                        </div>
                        <?php if($buscarincial != ''): ?>  
                        <br>
                        <a class="btn btn-success btn-round ml-auto" data-toggle="tooltip" data-original-title="Refrescar" href="<?php echo e(route('nominapago.index')); ?>"><i class="fa fa-plus"></i> Recargar pagina</a>
                        <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                            <div class="table-responsive"> 
                                <div class="alert alert-primary" role="alert">
                                  Busquedad      <h5 style="text-align: center;">
                                     Desde <?php echo e($buscarincial); ?>  hasta
                                         <?php echo e($buscarfinal); ?></h5>

                                  </div>
                                <table cellspacing="0" width="100%" class="display table table-striped table-hover 
                                        table-head-bg-info  nowrap">

                                    <thead>
                                        <tr>
                                            <th width="100%">#</th>
                                            <th width="100%">Empleado</th>
                                            <th scope="col">Sueldo</th>
                                            <th scope="col">Horas extras</th>
                                            <th scope="col">Comisionees</th>
                                            <th scope="col">Días Laborales</th>
                                            <th scope="col">Líquido </th>
                                            <th scope="col">Prestamos quirogra iess</th>
                                            <th scope="col">Descuentos de internet</th>
                                            <th scope="col">Aporte al IESS</th>
                                            <th scope="col">Prestamos y Anticipos</th>
                                            <th scope="col">Total Descuentos</th>
                                            <th scope="col">Fecha-Hora</th>
                                            <th scope="col">Archivo</th>

                                            <th style="width: 10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $nominas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $provincia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr data-id="<?php echo e($provincia->id); ?>">
                                                <td><?php echo e($provincia->id); ?></td>
                                                <td width="100%"><?php echo e($provincia->rrhempleado->nombre); ?>

                                                    <?php echo e($provincia->rrhempleado->apellido); ?></td>
                                                <td><?php echo e($provincia->sueldo); ?></td>
                                                <td><?php echo e($provincia->horasextras); ?></td>
                                                <td><?php echo e($provincia->comisiones); ?></td>
                                                <td><?php echo e($provincia->dialaborales); ?></td>
                                                <td><?php echo e($provincia->liquido); ?></td>
                                                <td><?php echo e($provincia->prestamosquirogramaiess); ?></td>
                                                <td><?php echo e($provincia->descuentosinternet); ?></td>

                                                <td><?php echo e($provincia->aporteiess); ?></td>
                                                <td><?php echo e($provincia->prestamosyanticipos); ?></td>
                                                <td><?php echo e($provincia->totaldescuentos); ?></td>
                                                <td><?php echo e($provincia->created_at); ?></td>
                                                <td>
                                                    <a class="btn btn-link btn-primary btn-lg" target="_blank"
                                                        data-toggle="tooltip" data-original-title="Ver"
                                                        href="<?php echo e(asset($provincia->archivo)); ?>"><i
                                                            class="fas fa-file-alt"></i></a>
                                                </td>
                                                <td>


                                                    <div class="form-button-action">
                                                        <a class="btn btn-link btn-info btn-lg" data-toggle="tooltip"
                                                            data-original-title="Imprimir registro" target="_blank"
                                                            href="<?php echo e(route('pdfnominaone.nominaone', $provincia->id)); ?>"><i
                                                                class="icon-printer"></i></a>
                                                        <a class="btn btn-link btn-primary btn-lg" data-toggle="tooltip"
                                                            data-original-title="Editar"
                                                            href="<?php echo e(route('nominapago.edit', $provincia->id)); ?>"><i
                                                                class="fa fa-edit"></i></a>


                                                    </div>
                                                </td>

                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </tbody>
                                </table>
                                <?php echo e($nominas->links()); ?>



                            </div>
                        </div>
                        <?php endif; ?>
                        
                        <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                            <div class="table-responsive">
                                <table cellspacing="0" width="100%" class="display table table-striped table-hover 
                                        table-head-bg-primary  nowrap">

                                    <thead>
                                        <tr>
                                            <th width="100%">#</th>
                                            <th width="100%">Empleado</th>
                                            <th scope="col">Sueldo</th>
                                            <th scope="col">Horas extras</th>
                                            <th scope="col">Comisionees</th>
                                            <th scope="col">Días Laborales</th>
                                            <th scope="col">Líquido </th>
                                            <th scope="col">Prestamos quirogra iess</th>
                                            <th scope="col">Descuentos de internet</th>
                                            <th scope="col">Aporte al IESS</th>
                                            <th scope="col">Prestamos y Anticipos</th>
                                            <th scope="col">Total Descuentos</th>
                                            <th scope="col">Fecha-Hora</th>
                                            <th scope="col">Archivo</th>

                                            <th style="width: 10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $nominass; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $provincia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr data-id="<?php echo e($provincia->id); ?>">
                                                <td><?php echo e($provincia->id); ?></td>
                                                <td width="100%"><?php echo e($provincia->rrhempleado->nombre); ?>

                                                    <?php echo e($provincia->rrhempleado->apellido); ?></td>
                                                <td><?php echo e($provincia->sueldo); ?></td>
                                                <td><?php echo e($provincia->horasextras); ?></td>
                                                <td><?php echo e($provincia->comisiones); ?></td>
                                                <td><?php echo e($provincia->dialaborales); ?></td>
                                                <td><?php echo e($provincia->liquido); ?></td>
                                                <td><?php echo e($provincia->prestamosquirogramaiess); ?></td>
                                                <td><?php echo e($provincia->descuentosinternet); ?></td>

                                                <td><?php echo e($provincia->aporteiess); ?></td>
                                                <td><?php echo e($provincia->prestamosyanticipos); ?></td>
                                                <td><?php echo e($provincia->totaldescuentos); ?></td>
                                                <td><?php echo e($provincia->created_at); ?></td>
                                                <td>
                                                    <a class="btn btn-link btn-primary btn-lg" target="_blank"
                                                        data-toggle="tooltip" data-original-title="Ver"
                                                        href="<?php echo e(asset($provincia->archivo)); ?>"><i
                                                            class="fas fa-file-alt"></i></a>
                                                </td>
                                                <td>


                                                    <div class="form-button-action">
                                                        <a class="btn btn-link btn-info btn-lg" data-toggle="tooltip"
                                                            data-original-title="Imprimir registro" target="_blank"
                                                            href="<?php echo e(route('pdfnominaone.nominaone', $provincia->id)); ?>"><i
                                                                class="icon-printer"></i></a>
                                                        <a class="btn btn-link btn-primary btn-lg" data-toggle="tooltip"
                                                            data-original-title="Editar"
                                                            href="<?php echo e(route('nominapago.edit', $provincia->id)); ?>"><i
                                                                class="fa fa-edit"></i></a>


                                                    </div>
                                                </td>

                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </tbody>
                                </table>
                                <?php echo e($nominass->links()); ?>


                            </div>
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
            mes = '0' + mes; //agrega cero si el menor de 10
        if (minut < 10)
            minut = '0' + minut; //agrega cero si el menor de 10

        if ("<?php echo e($buscarfinal); ?>" === "") {
            document.getElementById('fechafinal').value = ano + "-" + mes + "-" + dia;
        }

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
        $('#fechainicial').change(function() {
            if ($('#fechafinal').val() < $('#fechainicial').val()) {
                $('#fechainicial').val('');
                swal("Información!", "Ingresar fecha inicial menor a fecha final", {
                    icon: "info",

                    buttons: {
                        confirm: {
                            className: 'btn btn-info'
                        }
                    },
                });
            }
            //$('#cdaorecinto').val(cliente.cdaorecinto);

        });

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\nuevoxampp\htdocs\app\AppQuantika\resources\views/nominapagos/index.blade.php ENDPATH**/ ?>