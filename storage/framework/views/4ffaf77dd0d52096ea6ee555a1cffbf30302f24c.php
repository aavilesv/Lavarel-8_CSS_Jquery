
<?php $__env->startSection('title', 'Listado de Diarios'); ?>
<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.1.1/css/dataTables.dateTime.min.css">

    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h1 class="text-white title-it"><i class="flaticon-list"></i> Cobros Diarios</h1>

                    <h5 class="text-white op-7 mb-2"><i class="fas fa-money-bill-wave"></i> Cobros a Clientes</h5>
                </div>
                <div class="ml-md-auto py-2 py-md-0">
                    <a class="btn btn-success btn-round ml-auto" data-toggle="tooltip" data-original-title="Ingresar"
                        href="<?php echo e(route('cuentasporcobrar.create')); ?>"><i class="fa fa-plus"></i> Ingresar</a>
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
                        <?php echo e(date('l')); ?><!--
                        <table border="0" cellspacing="5" cellpadding="5">
                            <tbody><tr>
                                <td>Minimum date:</td>
                                <td><input type="text" id="min" name="min"></td>
                            </tr>
                            <tr>
                                <td>Maximum date:</td>
                                <td><input type="text" id="max" name="max"></td>
                            </tr>
                        </tbody></table>
                        <div class="navbar-left navbar-form nav-search mr-md-12">
                            <div class="form-group text">
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <time class="date" datetime="9-25"><strong>Desde</strong> </time>
                                        <input type="date" required name="fechainicial" id="min"
                                            placeholder="Search ..." value="<?php echo e(old('fechainicial')); ?>">
                                    </li>
                                    <li class="list-inline-item">
                                        <time class="date" datetime="9-25"><strong>Hasta</strong></time>
                                        <input type="date" required id="max" name="opselect" placeholder="Search ..."
                                            value="<?php echo e(old('fechafinal')); ?>">

                                    </li>
                                    <li class="list-inline-item">

                                        <button type="submit" id="clickbuscador" title="Buscar" class="btn btn-search pr-1">
                                            <i class="fa fa-search search-icon"></i>
                                        </button>

                                    </li>
                                </ul>
                            </div>
                        </div>-->
                        <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">


                            <div class="table-responsive">
                                <table class="display table table-striped table-hover nowrap add-rowww">
                                    <thead>
                                        <tr>
                                            <th style="width: 10%">Action</th>
                                            <th>#Cod</th>
                                            <th>Cliente</th>
                                            <th>Cédula</th>
                                            <th>#Fecha de pago</th>
                                            <th>Tarifa</th>
                                            <th>Total cancelado en caja</th>
                                            <th>Saldo</th>
                                            <th>Abonado</th>
                                            <th>Estado</th>
                                            <th>Caja</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header no-bd">
                    <h3 class="modal-title">
                        <span class="fw-mediumbold">
                        </span>
                        <label class="badge badge-warning">Registrar</label>
                        <span class="fw-light">

                        </span>
                    </h3>

                </div>
                <div class="modal-body">
                    <p class="small">Registrar inicial en caja diario.</p>
                    <form method="POST" action="<?php echo e(route('diariacobro.store')); ?>" class="form-createe">
                        <div class="row">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="id" id="cid" value="">
                            <div class="col-sm-12">
                                <div class="form-group form-group-default">
                                    <label>Valores en Caja</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group form-group-default">
                                    <label>Total en Caja $</label>

                                    <input type="tele" name="saldocaja" id="saldocaja" value="0" required minlength="0"
                                        min="1" class="form-control" placeholder="Total en Caja">

                                </div>
                            </div>

                        </div>
                        <div class="modal-footer no-bd">
                            <button type="submit" id="addRowButton" class="btn btn-success">Registrar</button>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade" id="deletecobro" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header no-bd">
                    <h3 class="modal-title">
                        <span class="fw-mediumbold">
                        </span>
                        <label class="badge badge-warning">Eliminar</label>
                        <span class="fw-light">
                        </span>
                    </h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="small">Eliminar cobro realizo a cliente.</p>
                    <form method="POST" action="<?php echo e(route('cuentasporcobrar.destroy', 0)); ?>" class="form-createe">
                        <div class="row">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('delete'); ?>
                            <input type="hidden" name="id" id="cidd" value="">
                            <div class="col-sm-12">
                                <div class="form-group form-group-default">
                                    <label>Nombre del cliente</label>
                                    <input type="text" id="inputcliente" value="0" minlength="0" min="1"
                                        class="form-control" placeholder="Nombre del cliente">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group form-group-default">
                                    <label>Total pagado$</label>
                                    <input type="tele" name="totalsumar" id="totalsumar" min="1" class="form-control"
                                        placeholder="Total en pagado">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer no-bd">
                            <button type="button" class="btn btn-success" data-dismiss="modal">Salir</button>
                            <button type="submit" id="addRowButton" class="btn btn-danger">Eliminar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="https://cdn.datatables.net/datetime/1.1.1/js/dataTables.dateTime.min.js"></script>
    <script>
       
         	
var minDate, maxDate;
 
 // Custom filtering function which will search data in column four between two values
 $.fn.dataTable.ext.search.push(
     function( settings, data, dataIndex ) {
         var min = minDate.val();
         var max = maxDate.val();
         var date = new Date( data[4] );
  
         if (
             ( min === null && max === null ) ||
             ( min === null && date <= max ) ||
             ( min <= date   && max === null ) ||
             ( min <= date   && date <= max )
         ) {
             return true;
         }
         return false;
     }
 );

    // Create date inputs
    minDate = new DateTime($('#min'), {
        format: 'MMMM Do YYYY'
    });
    maxDate = new DateTime($('#max'), {
        format: 'MMMM Do YYYY'
    });
 
    // DataTables initialisation
    var table = $('.add-rowww').DataTable();
 
    // Refilter the table
    $('#min, #max').on('change', function () {
        table.draw();
    });

         table = $('.add-rowww').DataTable({
            orderCellsTop: true,
            fixedHeader: true,
            "pageLength": 10,
            "destroy": true,
            "ajax": "<?php echo e(route('datablecuentas.listarcuentacobrar')); ?>",
            "data": {
                "opselect": "opselect"
            },
            "type": 'get',
            "columns": [
                {data: 'btn'}, { data: 'id'},
                {data: 'nombres'},
                {data: 'cedula'},
                {data: 'created_at'},
                {data: 'tarifa'},
                {data: 'sumatotal'},
                {data: 'saldo',searchable: false},
                {data: 'abonado'},
                {data: 'status'},
                {data: 'eliminar'}
            ],
            
        });
        //Creamos una fila en el head de la tabla y lo clonamos para cada columna
        $('.add-rowww thead tr').clone(true).appendTo('.add-rowww thead');
        $('.add-rowww thead tr:eq(1) th').each(function(i) {
            var title = $(this).text(); //es el nombre de la columna
            $(this).html('<input type="text" placeholder="Buscar...' + title + '" />');
            $('input', this).on('keyup change', function() {
                if (table.column(i).search() !== this.value) {
                    table
                        .column(i)
                        .search(this.value)
                        .draw();
                }
            });
        });
  

        if ("<?php echo e($caja); ?>" === "") {
            $(document).ready(function() {
                $('#myModal').modal({
                    backdrop: 'static',
                    keyboard: false,
                    show: true,
                    remote: false
                });
            });
        }
        $('.conteinerr').on('click', 'a[rel="action"]', function() {

            var data = $(this).data('json'),
                action = data.action,
                id = data.id;

            var nombreapellido = $(this).parents('tr').children('td').eq(2).html();
            var totalsumar = $(this).parents('tr').children('td').eq(6).html();
            $('#inputcliente').val(nombreapellido);
            $('#cidd').val(id);
            $('#totalsumar').val(totalsumar);

            $('#deletecobro').modal();




        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\xampp\htdocs\AppQuantika\resources\views/cuentasporcobrars/index.blade.php ENDPATH**/ ?>