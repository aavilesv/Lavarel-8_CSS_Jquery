
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

                    <?php if($buscarincial === ''): ?>  
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

                        <?php if($buscarincial != ''): ?>  
                        <br>
                        <a class="btn btn-success btn-round ml-auto" data-toggle="tooltip" data-original-title="Refrescar" href="<?php echo e(route('reporteradio.index')); ?>"><i class="fa fa-plus"></i> Recargar pagina</a>
                        <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                            <div class="table-responsive"> 
                                <div class="alert alert-primary" role="alert">
                                  Busquedad      <h5 style="text-align: center;">
                                     Desde <?php echo e($buscarincial); ?>  hasta
                                         <?php echo e($buscarfinal); ?></h5>

                                  </div>
                                  <table id="add-row" cellspacing="0" width="100%"
                                  class="display table table-striped table-hover add-row nowrap">
                                  <thead>
                                      <tr>
                                          <th style="width: 10%">Action</th>
                                          <th scope="col">#</th>
                                          <th scope="col">Cliente:</th>
                                          <th scope="col">T??cnico:</th>
                                          <th scope="col">Cedula:</th>
                                          <th scope="col">Fecha</th>
                                          <th scope="col">Hora de llegada</th>
                                          <th scope="col">Hora de salida</th>
                                          <th scope="col">Antena -Configuraci??n</th>
                                          <th scope="col">Router -Configuraci??n</th>
                                          <th scope="col">Cambio clave wifi -Configuraci??n</th>
                                          <th scope="col">Frecuencias-Configuraci??n</th>
                                          <th scope="col">IP -Configuraci??n</th>
                                          <th scope="col">RED -Configuraci??n</th>
                                          <th scope="col">AP -Configuraci??n</th>
                                          <th scope="col">Antena -Actualizaci??n</th>
                                          <th scope="col">Router -Actualizaci??n</th>
                                          <th scope="col">CCQ -Actualizaci??n</th>
                                          <th scope="col">SE??AL -Actualizaci??n</th>
                                          <th scope="col">Conectores -Instalaci??n</th>
                                          <th scope="col">Router -Instalaci??n</th>
                                          <th scope="col">POE -Instalaci??n</th>
                                          <th scope="col">N?? Conectores</th>
                                          <th scope="col">N?? y marca del Router</th>
                                          <th scope="col">Atena Anterior -Instalaci??n</th>
                                          <th scope="col">Antena nueva -Instalaci??n</th>
                                          <th scope="col">Tubo Galvanizado -Instalaci??n</th>
                                          <th scope="col">Cable -Instalaci??n</th>
                                          <th scope="col">Adiciono Ca??a -Instalaci??n</th>
                                          <th scope="col">Tubo Aluminio -Instalaci??n</th>
                                          <th scope="col">Metros de Cable -Instalaci??n</th>


                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php $__currentLoopData = $soportefibraradio; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fibr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                                  <?php echo e($fibr->ase??al); ?>

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
                                                  <?php if($fibr->iadicionoca??a == 1): ?>
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
                                <?php echo e($soportefibraradio->links()); ?>



                            </div>
                        </div>
                        <?php endif; ?>
                        <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                            <div class="table-responsive">
                                <table id="add-row" cellspacing="0" width="100%"
                                    class="display table table-striped table-hover add-row nowrap">
                                    <thead>
                                        <tr>
                                            <th style="width: 10%">Action</th>
                                            <th scope="col">#</th>
                                            <th scope="col">Cliente:</th>
                                            <th scope="col">T??cnico:</th>
                                            <th scope="col">Cedula:</th>
                                            <th scope="col">Fecha</th>
                                            <th scope="col">Hora de llegada</th>
                                            <th scope="col">Hora de salida</th>
                                            <th scope="col">Antena -Configuraci??n</th>
                                            <th scope="col">Router -Configuraci??n</th>
                                            <th scope="col">Cambio clave wifi -Configuraci??n</th>
                                            <th scope="col">Frecuencias-Configuraci??n</th>
                                            <th scope="col">IP -Configuraci??n</th>
                                            <th scope="col">RED -Configuraci??n</th>
                                            <th scope="col">AP -Configuraci??n</th>
                                            <th scope="col">Antena -Actualizaci??n</th>
                                            <th scope="col">Router -Actualizaci??n</th>
                                            <th scope="col">CCQ -Actualizaci??n</th>
                                            <th scope="col">SE??AL -Actualizaci??n</th>
                                            <th scope="col">Conectores -Instalaci??n</th>
                                            <th scope="col">Router -Instalaci??n</th>
                                            <th scope="col">POE -Instalaci??n</th>
                                            <th scope="col">N?? Conectores</th>
                                            <th scope="col">N?? y marca del Router</th>
                                            <th scope="col">Atena Anterior -Instalaci??n</th>
                                            <th scope="col">Antena nueva -Instalaci??n</th>
                                            <th scope="col">Tubo Galvanizado -Instalaci??n</th>
                                            <th scope="col">Cable -Instalaci??n</th>
                                            <th scope="col">Adiciono Ca??a -Instalaci??n</th>
                                            <th scope="col">Tubo Aluminio -Instalaci??n</th>
                                            <th scope="col">Metros de Cable -Instalaci??n</th>


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
                                                    <?php echo e($fibr->ase??al); ?>

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
                                                    <?php if($fibr->iadicionoca??a == 1): ?>
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
        var ano = fecha.getFullYear(); //obteniendo a??o
        var hora = fecha.getHours(); //obteniendo a??o
        var minut = fecha.getMinutes(); //obteniendo a??o

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
                swal("Informaci??n!", "Ingresar fecha final mayor a fecha inicial", {
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
                swal("Informaci??n!", "Ingresar fecha inicial menor a fecha final", {
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
<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\nuevoxampp\htdocs\app\AppQuantika\resources\views/soportes/reporteradio.blade.php ENDPATH**/ ?>