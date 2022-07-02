
<?php $__env->startSection('title', 'Listado de Reportes de Caja'); ?>
<?php $__env->startSection('content'); ?>


    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h1 class="text-white title-it"><i class="flaticon-list"></i> Reporte de Caja</h1>

                    <h5 class="text-white op-7 mb-2"><i class="fas fa-money-bill-wave"></i> Cobros a Clientes</h5>
                </div>
                <div class="ml-md-auto py-2 py-md-0">

                    <a class="btn btn-success btn-round ml-auto" data-toggle="tooltip" data-original-title="Ingresar fecha atrasada en caja"
                        data-json='{"id":"ins"}' rel="action">
                        <i class="fa fa-plus"></i> Ingresar fecha en caja</a>

                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="row mt--2">
            <div class="col-md-12">
                <div class="card full-height">
                    <div class="card-body">
                        <div class="card-title"><i class="far fa-list-alt"></i> Listado de Clientes</div>
                        <div class="card-category"><i class="fab fa-creative-commons-nd"></i> Listado de pagos Diarios
                        </div>
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
                                        <div <?php if($buscador != '' or $buscarincial != ''): ?> class="col-md-10"  <?php else: ?> class="col-md-12" <?php endif; ?>>
                                            <form class="navbar-left navbar-form nav-search mr-md-3">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <button type="submit" title="Click para Buscar"
                                                            class="btn btn-search pr-1">
                                                            <i class="fa fa-search search-icon"></i>
                                                        </button>
                                                    </div>
                                                    <input type="text" placeholder="Buscador" title="Escribe para buscar"
                                                        name="buscador" value="<?php echo e($buscador); ?>" class="form-control">
                                                </div>
                                            </form>
                                        </div>
                                        <?php if($buscador != '' or $buscarincial != ''): ?>
                                            <div class="col-md-2">
                                                <a href="<?php echo e(route('reportecaja.index')); ?>" data-toggle="tooltip"
                                                    data-original-title="Recargar Pagina" class="btn btn-success btn-round">
                                                    <i class="icon-reload"> Recargar</i>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                    </div>


                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="display table table-striped table-hover nowrap">
                                    <thead>
                                        <tr>
                                            <th>#Cod</th>
                                            <th>Fecha_control_dia</th>
                                            <th>Caja_Inicial</th>
                                            <th>Valor_sin_Gerente</th>
                                            <th>Valor_Neto</th>
                                            <th>Valor_entrago_gerente</th>
                                            <th>Fecha_y_Hora_de_caja</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__empty_1 = true; $__currentLoopData = $caja; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $caj): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <tr>
                                                <td class="success"><?php echo e($caj->id); ?></td>
                                                <td><?php echo e($caj->fecha); ?></td>
                                                <td>$<?php echo e($caj->cajaprincipal); ?></td>
                                                <td>$<?php echo e($caj->cajafinal); ?></td>
                                                <td>$<?php echo e($caj->saldocaja); ?></td>
                                                <td>$<?php echo e($caj->saldoingeniero); ?></td>
                                                <td><?php echo e($caj->created_at); ?></td>
                                                <td>
                                                    <div class="form-button-action">
                                                        <a class="btn btn-link btn-success btn-lg" data-toggle="tooltip"
                                                            data-original-title="Ver"
                                                            href="<?php echo e(route('reportecaja.show', $caj->id)); ?>"><i
                                                                class="fa fa-eye"></i></a>

                                                    </div>
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
                                <?php echo e($caja->appends(['buscador' => $buscador, 'buscarincial' => $buscarincial, 'buscarfinal' => $buscarfinal])->links()); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header no-bd">
                    <h3 class="modal-title">
                        <span class="fw-mediumbold">
                        </span>
                        <label class="badge badge-info">Ingresar fecha en caja</label>
                        <span class="fw-light">

                        </span>
                    </h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="small">Opción para ingresar fecha atrasa</p>
                    <form method="POST" action="<?php echo e(route('reportedit.store')); ?>" class="form-createe" >
                        <div class="row">
                            <?php echo csrf_field(); ?>
                            <div class="col-sm-12">
                                <div class="form-group form-group-default">
                                    <label>Fecha de caja</label>
                                    <input id="descripcion" type="date" name="fecha" required class="form-control"
                                        placeholder="Fecha y que no se repita Apellidos">
                                </div>
                            </div>
                            <div class="col-md-12 pr-0">
                                <div class="form-group form-group-default">
                                    <div class="form-group form-group-default">
                                        <label>Total en Caja $</label>
    
                                        <input type="tele" name="saldocaja" id="saldocaja" value="0" required minlength="0"
                                            min="1" class="form-control" placeholder="Total en Caja">
    
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer no-bd">

                            <button type="button" class="btn btn-danger" data-dismiss="modal">Salir</button>
                            <button type="submit" id="addRowButton" class="btn btn-success">Guardar</button>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        $('.conteinerr').on('click', 'a[rel="action"]', function() {

            var data = $(this).data('json'),
                action = data.action,
                id = data.id;

            var nombreapellido = $(this).parents('tr').children('td').eq(3).html();
            var cedula = $(this).parents('tr').children('td').eq(4).html();
            var direccion = $(this).parents('tr').children('td').eq(10).html();
            $('#descripcion').val(nombreapellido);
            $('#cidd').val(id);
            $('#ccedula').val(cedula);
            $('#cdireccion').val(direccion);

            $('#addRowModal').modal();



        });
        $("#saldocaja").numeric({
            negative: false,
            decimalPlaces: 2
        });


        $(document).ready(function() {

            $('.conteinerr').on('click', 'a[rel="action"]', function() {

                var data = $(this).data('json'),
                    action = data.action,
                    id = data.id;

                var nombreapellido = $(this).parents('tr').children('td').eq(2).html();
                var cedula = $(this).parents('tr').children('td').eq(4).html();
                var direccion = $(this).parents('tr').children('td').eq(10).html();
                $('#descripcion').val(nombreapellido);
                $('#cidd').val(id);
                $('#ccedula').val(cedula);
                $('#cdireccion').val(direccion);

                $('#addRowModal').modal();



            });
        });

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
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\xampp\htdocs\AppQuantika\resources\views/cajareporte/index.blade.php ENDPATH**/ ?>