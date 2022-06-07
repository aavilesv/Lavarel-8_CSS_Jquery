
<?php $__env->startSection('title','Listado de Contratos'); ?>
<?php $__env->startSection('content'); ?>


        <div class="panel-header bg-primary-gradient">
            
            
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h1 class="text-white title-it"><i class="fas fa-phone-volume"></i> Actualizar datos Clientes</h1>
                       
                        <h5 class="text-white op-7 mb-2"><i class="icon-globe"></i> Contratos</h5>
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
                            <div class="card-category"><i class="fab fa-creative-commons-nd"></i> Clientes Registrados con contratos</div>
                            <?php echo e(date('l')); ?>

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
                                <br>
                                <div class="container">
                                    <div class="form-button-action">
                                        <div class="row">
                                            <div    <?php if($buscador != '' or $buscarincial !=''): ?> class="col-md-10"  <?php else: ?> class="col-md-12"  <?php endif; ?>>
                                                <form class="navbar-left navbar-form nav-search mr-md-3">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <button type="submit" title="Click para Buscar"  class="btn btn-search pr-1">
                                                                <i class="fa fa-search search-icon"></i>
                                                            </button>
                                                        </div>
                                                        <input type="text" placeholder="Buscador" title="Escribe para buscar"  name="buscador"
                                                        value="<?php echo e($buscador); ?>"
                                                            class="form-control">
                                                    </div>
                                                </form>  
                                            </div>
                                            <?php if($buscador != '' or $buscarincial !=''): ?>  
                                            <div class="col-md-2">
                                                <a href="<?php echo e(route('contratoclientes.index')); ?>"
                                                data-toggle="tooltip" data-original-title="Recargar Pagina" 
                                                 class="btn btn-success btn-round">
                                                    <i class="icon-reload"> Recargar</i>
                                                </a>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                    
                                       
                                    </div>
                                    <div class="collapse" id="search-nav">
                                        
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="display table table-striped table-hover nowrap" >
                                        <thead>
                                            <tr>
                                                <th>#Cod</th>
                                                <th>Foto de vivienda</th>
                                                <th>Cliente</th>
                                                <th>Cédula</th>
                                                <th>Cantón</th>
                                                <th>Provincia</th>
                                                <th>Dirección</th>
                                                <th>Celular</th>
                                                <th>Correo</th>
                                                <th  style="width: 10%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__empty_1 = true; $__currentLoopData = $rrhcontrato; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rrhprofesion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <tr>
                                              <td><?php echo e($rrhprofesion->id); ?></td>
                                              <td>
                                                <center> <a href="<?php echo e(asset($rrhprofesion->ffoto)); ?>"
                                                    data-lightbox="mygallery"
                                                    data-title="<?php echo e($rrhprofesion->cliente->nombre); ?> <?php echo e($rrhprofesion->cliente->apellido); ?>">
                                                    <img src="<?php echo e(asset($rrhprofesion->ffoto)); ?>" title="ver imagen"
                                                        class="img-fluid center" alt="Responsive image"
                                                        style="width:100px; height:100px;"></a> </center>
                                                    </td>
                                              <td><?php echo e($rrhprofesion->cliente->nombre); ?> <?php echo e($rrhprofesion->cliente->apellido); ?></td>
                                              <td><?php echo e($rrhprofesion->cliente->cedula); ?></td>
                                              <td><?php echo e($rrhprofesion->canton->name); ?></td>
                                              <td><?php echo e($rrhprofesion->canton->provincia->name); ?></td>
                                              <td><?php echo e($rrhprofesion->direccion); ?></td>
                                              <td><?php echo e($rrhprofesion->contacto); ?></td>
                                              <td><?php echo e($rrhprofesion->cliente->email); ?></td>
                                              
                                              <td>
                                                <div class="form-button-action">
                                                    <a class="btn btn-link btn-primary btn-lg" data-toggle="tooltip"
                                                     data-original-title="Editar" 
                                                    href="<?php echo e(route('clientesagregar.edit',$rrhprofesion->id)); ?>"><i class="fa fa-edit"></i></a>
                                                      
                                                </div>
                                            </td>
                                             
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
   
                                            <tr>
                                                <td colspan="10"> <center>No existen registros</center></td>
                                            </tr>
                                                                                <?php endif; ?>
                                        </tbody>
                                    </table>
                                    <?php echo e($rrhcontrato->appends(['buscador' => $buscador,'buscarincial' => $buscarincial,'buscarfinal' => $buscarfinal])->links()); ?>

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


<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\nuevoxampp\htdocs\app\AppQuantika\resources\views/clientesagregar/index.blade.php ENDPATH**/ ?>