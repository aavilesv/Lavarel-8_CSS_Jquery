
<?php $__env->startSection('title', 'Reporte de radio'); ?>
<?php $__env->startSection('content'); ?>


    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h1 class="text-white title-it"><i class="fas fa-golf-ball"></i> REPORTE DE RADIO
                    </h1>

                    <h5 class="text-white op-7 mb-2"><i class="far fa-building"></i> Soporte Tecnico</h5>
                </div>
                <div class="ml-md-auto py-2 py-md-0">

                    
                    <?php if($novedadopercance != ''): ?>
                        <a class="btn btn-primary btn-round ml-auto" data-toggle="tooltip"
                            data-original-title="Imprimir solo <?php echo e($novedadopercance); ?>" target="_blank"
                            href="<?php echo e(route('pdffreporteradionovedad.soporteallgetoneradionovedad',$novedad)); ?>">
                            
                            <i class="icon-printer"></i> Imprimir</a>

                    <?php elseif($buscarincial === ''): ?>
                    <a class="btn btn-primary btn-round ml-auto" data-toggle="tooltip"
                    data-original-title="Imprimir todos los registros" target="_blank"
                    href="<?php echo e(route('pdffreporteradio.soporteallradio')); ?>">
                  
                     <i class="icon-printer"></i> Imprimir</a>
                   <?php else: ?> <a class="btn btn-primary btn-round ml-auto" data-toggle="tooltip" 
                   data-original-title="Desde <?php echo e($buscarincial); ?>  hasta <?php echo e($buscarfinal); ?>" target="_blank"
                    href="<?php echo e(route('pdfffehcareporteradio.soporteallgetfecharadio',[$buscarincial, $buscarfinal])); ?>">
                    <i class="icon-printer"></i> Imprimir</a>   <?php endif; ?>

                  
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
                        <div class="card-category"><i class="fab fa-creative-commons-nd"></i> Reportes Registrados</div>
                      
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

                        <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                            <div class="container m-10">
                                <div class="form-button-action">
                                    <div class="row">
                                        <div <?php if($novedadopercance != '' or $buscarincial != ''): ?> class="col-md-10"  <?php else: ?> class="col-md-12" <?php endif; ?>>
                                            <form class="navbar-left navbar-form nav-search mr-md-3">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <button type="submit" title="Click para Buscar"
                                                            class="btn btn-search pr-1">
                                                            <i class="fa fa-search search-icon"></i>
                                                        </button>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="hidden" name="novedad" value="yo">
                                                        <label for="novedadopercance">Novedad o Percance:</label>
                                                        <select class="chosen-select form-control" name="novedadopercance" data-placeholder="Sucursal">
                                                           
                                                            <?php if($novedadopercance != ''): ?>
                                                            we
                                                            <option value="<?php echo e($novedadopercance); ?>">Seleccionado :<?php echo e($novedadopercance); ?></option>
                                                            <?php else: ?> 
                                                            <option value="" selected disabled hidden>Seleccione alguna Novedad</option>
                                                            <?php endif; ?>
                                                            <option value="1">Instalación</option>
                                                            <option value="2">Retiro de Equipo</option>
                                                            <option value="3">Reinstalación</option>
                                                            <option value="4">Intermitente</option>
                                                            <option value="5">Lento</option>
                                                            <option value="6">Desconf. Router</option>
                                                            <option value="7">Cable. Dañado</option>
                                                            <option value="8">Problema Equipos</option>
                                                            <option value="9">Sin servicio</option>
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
                                                </div>
                                            </form>
                                        </div>
                                        <?php if($novedadopercance != '' or $buscarincial != ''): ?>
                                            <div class="col-md-2">
                                                <a href="<?php echo e(route('reporteradio.index')); ?>" data-toggle="tooltip"
                                                    data-original-title="Recargar Pagina" class="btn btn-success btn-round">
                                                    <i class="icon-reload"> Recargar</i>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="table-responsive">
                                <table id="add-row" cellspacing="0" width="100%"
                                    class="display table table-striped table-hover add-row nowrap">
                                    <thead>
                                        <tr>
                                            <th style="width: 10%">Action</th>
                                            <th scope="col">#</th>
                                            <th scope="col">Cliente:</th>
                                            <th scope="col">Novedad:</th>
                                            <th scope="col">Técnico:</th>
                                            <th scope="col">Cedula:</th>
                                            <th scope="col">Fecha</th>
                                            <th scope="col">Hora de llegada</th>
                                            <th scope="col">Hora de salida</th>
                                            <th scope="col">Antena -Configuración</th>
                                            <th scope="col">Router -Configuración</th>
                                            <th scope="col">Cambio clave wifi -Configuración</th>
                                            <th scope="col">Frecuencias-Configuración</th>
                                            <th scope="col">IP -Configuración</th>
                                            <th scope="col">RED -Configuración</th>
                                            <th scope="col">AP -Configuración</th>
                                            <th scope="col">Antena -Actualización</th>
                                            <th scope="col">Router -Actualización</th>
                                            <th scope="col">CCQ -Actualización</th>
                                            <th scope="col">SEÑAL -Actualización</th>
                                            <th scope="col">Conectores -Instalación</th>
                                            <th scope="col">Router -Instalación</th>
                                            <th scope="col">POE -Instalación</th>
                                            <th scope="col">N° Conectores</th>
                                            <th scope="col">N° y marca del Router</th>
                                            <th scope="col">Atena Anterior -Instalación</th>
                                            <th scope="col">Antena nueva -Instalación</th>
                                            <th scope="col">Tubo Galvanizado -Instalación</th>
                                            <th scope="col">Cable -Instalación</th>
                                            <th scope="col">Adiciono Caña -Instalación</th>
                                            <th scope="col">Tubo Aluminio -Instalación</th>
                                            <th scope="col">Metros de Cable -Instalación</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $soportefibraradioo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fibr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr data-id="<?php echo e($fibr->id); ?>">
                                                <td>
                                                    <div class="form-button-action">

                                                        <a class="btn btn-link btn-info btn-lg" data-toggle="tooltip"
                                                            data-original-title="Imprimir registro" target="_blank"
                                                            href="<?php echo e(route('pdffreporteradio.soporteallgetoneradio', $fibr->id)); ?>"><i
                                                                class="icon-printer"></i></a>
                                                    </div>
                                                </td>
                                                <td><?php echo e($fibr->id); ?>


                                                </td>

                                                <td> <?php echo e($fibr->novedad->cclicontratocliente->cliente->nombre); ?>-<?php echo e($fibr->novedad->cclicontratocliente->cliente->apellido); ?>

                                                </td>
                                                <td>
                                                    <?php if($fibr->novedad->novedadopercance === 1): ?>

                                                        <span class="badge badge-success">Instalaci贸n</span>
                                                    <?php elseif($fibr->novedad->novedadopercance === 2): ?>
                                                        <span class="badge badge-info">Retiro de Equipo</span>
                                                    <?php elseif($fibr->novedad->novedadopercance === 3): ?>
                                                        <span class="badge badge-warning">Reinstalaci贸n</span>
                                                    <?php elseif($fibr->novedad->novedadopercance === 4): ?>
                                                        <span class="badge badge-danger">Intermitente</span>
                                                    <?php elseif($fibr->novedad->novedadopercance === 5): ?>
                                                        <span class="badge badge-info">Lento</span>
                                                    <?php elseif($fibr->novedad->novedadopercance === 6): ?>
                                                        <span class="badge badge-warning">Desconf. Router</span>
                                                    <?php elseif($fibr->novedad->novedadopercance === 7): ?>
                                                        <span class="badge badge-warning">Cable. Da帽ado</span>
                                                    <?php elseif($fibr->novedad->novedadopercance === 8): ?>
                                                        <span class="badge badge-info">Problema de Equipos</span>
                                                    <?php elseif($fibr->novedad->novedadopercance === 9): ?>
                                                        <span class="badge badge-info">Sin servicio</span>
                                                    <?php elseif($fibr->novedad->novedadopercance === 10): ?>
                                                        <span class="badge badge-info">Otros</span>
                                                    <?php endif; ?>
                                                </td>
                                                
                                                <td> <?php echo e($fibr->usuario); ?>

                                                </td>
                                                <td> <?php echo e($fibr->novedad->cclicontratocliente->cliente->cedula); ?>

                                                </td>
                                                <td><?php echo e($fibr->fecha); ?></td>
                                                <td><?php echo e($fibr->horallegada); ?></td>
                                                <td><?php echo e($fibr->horasalida); ?></td>
                                                <td style="text-align: center;">
                                                    <?php if($fibr->cantena == 1): ?>
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="flexCheckChecked"
                                                            style="background-color: blue; background: blue;" checked
                                                            disabled>
                                                    <?php endif; ?>


                                                </td>
                                                <td style="text-align: center;">
                                                    <?php if($fibr->crouter == 1): ?>
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="flexCheckChecked"
                                                            style="background-color: blue; background: blue;" checked
                                                            disabled>
                                                    <?php endif; ?>
                                                </td>
                                                <td style="text-align: center;">
                                                    <?php if($fibr->ccambiowiffi == 1): ?>
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="flexCheckChecked"
                                                            style="background-color: blue; background: blue;" checked
                                                            disabled>
                                                    <?php endif; ?>
                                                </td>
                                                <td style="text-align: center;">
                                                    <?php if($fibr->cfrecuencias == 1): ?>
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="flexCheckChecked"
                                                            style="background-color: blue; background: blue;" checked
                                                            disabled>
                                                    <?php endif; ?>
                                                </td>
                                                <td style="text-align: center;"><?php echo e($fibr->cip); ?></td>
                                                <td style="text-align: center;"><?php echo e($fibr->cred); ?></td>
                                                <td style="text-align: center;"><?php echo e($fibr->cap); ?></td>



                                                <td style="text-align: center;">
                                                    <?php if($fibr->aanterior == 1): ?>
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="flexCheckChecked"
                                                            style="background-color: blue; background: blue;" checked
                                                            disabled>
                                                    <?php endif; ?>
                                                </td>



                                                <td style="text-align: center;">
                                                    <?php if($fibr->arouter == 1): ?>
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="flexCheckChecked"
                                                            style="background-color: blue; background: blue;" checked
                                                            disabled>
                                                    <?php endif; ?>
                                                </td>

                                                <td style="text-align: center;">
                                                    <?php echo e($fibr->accq); ?>

                                                </td>
                                                <td style="text-align: center;">
                                                    <?php echo e($fibr->aseñal); ?>

                                                </td>
                                                <td style="text-align: center;">
                                                    <?php if($fibr->iconectores == 1): ?>
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="flexCheckChecked"
                                                            style="background-color: blue; background: blue;" checked
                                                            disabled>
                                                    <?php endif; ?>
                                                </td>
                                                <td style="text-align: center;">
                                                    <?php if($fibr->irouter == 1): ?>
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="flexCheckChecked"
                                                            style="background-color: blue; background: blue;" checked
                                                            disabled>
                                                    <?php endif; ?>
                                                </td>
                                                <td style="text-align: center;">
                                                    <?php if($fibr->ipoe == 1): ?>
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="flexCheckChecked"
                                                            style="background-color: blue; background: blue;" checked
                                                            disabled>
                                                    <?php endif; ?>
                                                </td>
                                                <td style="text-align: center;"><?php echo e($fibr->inconectores); ?></td>
                                                <td style="text-align: center;"><?php echo e($fibr->imarcadelrouter); ?></td>
                                                <td style="text-align: center;"><?php echo e($fibr->iantenaanterior); ?></td>
                                                <td style="text-align: center;"><?php echo e($fibr->iantenanueva); ?></td>
                                                <td style="text-align: center;">
                                                    <?php if($fibr->itubogalvanizado == 1): ?>
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="flexCheckChecked"
                                                            style="background-color: blue; background: blue;" checked
                                                            disabled>
                                                    <?php endif; ?>
                                                </td>
                                                <td style="text-align: center;">
                                                    <?php if($fibr->icable == 1): ?>
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="flexCheckChecked"
                                                            style="background-color: blue; background: blue;" checked
                                                            disabled>
                                                    <?php endif; ?>
                                                </td>
                                                <td style="text-align: center;">
                                                    <?php if($fibr->iadicionocaña == 1): ?>
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="flexCheckChecked"
                                                            style="background-color: blue; background: blue;" checked
                                                            disabled>
                                                    <?php endif; ?>
                                                </td>
                                                <td style="text-align: center;">
                                                    <?php if($fibr->ituboaluminio == 1): ?>
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="flexCheckChecked"
                                                            style="background-color: blue; background: blue;" checked
                                                            disabled>
                                                    <?php endif; ?>
                                                </td>
                                                <td style="text-align: center;">
                                                    <?php echo e($fibr->imetroscable); ?>

                                                </td>




                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </tbody>
                                </table>
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
<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\AppQuantika\resources\views/soportes/reporteradio.blade.php ENDPATH**/ ?>