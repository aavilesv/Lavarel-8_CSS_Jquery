
<?php $__env->startSection('title', 'Modificar Novedades'); ?>
<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.1.1/css/dataTables.dateTime.min.css">


    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h1 class="text-white title-it"> <i class="fas fa-phone-square"></i>
                        MODIFICAR NOVEDADES</h1>

                    <h5 class="text-white op-7 mb-2"><i class="icon-globe"></i> RECEPCIÓN</h5>
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
                        <div class="card-title"><i class="fas fa-align-justify"></i> Novedades Registradas</div>
                        <div class="card-category"><i class="fas fa-server"></i> Datos</div>
                        <table border="0" cellspacing="5" cellpadding="5">
                            <tbody><tr>
                                <td>Fecha minima:</td>
                                <td><input type="text" class="min" name="min"></td>
                            </tr>
                            <tr>
                                <td>Fecha maxima:</td>
                                <td><input type="text" class="max" name="max"></td>
                            </tr>
                        </tbody></table>
                        <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                            <div class="table-responsive">
                                <table class="display table table-striped table-hover add-rowww">
                                    <thead>
                                        <tr>
                                            <th style="width: 10%">Action</th>
                                            <th scope="col">#</th>
                                            <th scope="col">Servicio</th>
                                            <th scope="col">Cliente</th>
                                            <th scope="col">Hora de percance</th>
                                            <th scope="col">Fecha de visita</th>
                                            <th scope="col">Hora de visita</th>
                                            <th scope="col">Novedad de parcance</th>
                                            <th scope="col">Especificar</th>
                                            <th scope="col">Estado</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                            <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header no-bd">
                                            <h3 class="modal-title">
                                                <span class="fw-mediumbold">
                                                </span>
                                                <label class="badge badge-warning">Anular Novedad</label>
                                                <span class="fw-light">

                                                </span>
                                            </h3>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="small">Estas seguro que quieres eliminar novedad ?</p>
                                            <form method="POST" action="<?php echo e(route('novedads.destroy', 0)); ?>">
                                                <div class="row">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('delete'); ?>
                                                    <input type="hidden" name="id" id="cidd" value="">
                                                    <div class="col-sm-12">
                                                        <div class="form-group form-group-default">
                                                            <label>Nombre Y Apellido</label>
                                                            <input id="descripcion" type="text" disabled
                                                                class="form-control" placeholder="Nombre Apellidos">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 pr-0">
                                                        <div class="form-group form-group-default">
                                                            <label>Hora de parcance</label>

                                                            <input type="text" name="cedula" id="ccedula" disabled
                                                                class="form-control" placeholder="Cedula">
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="modal-footer no-bd">

                                                    <button type="button" class="btn btn-success"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" id="addRowButton"
                                                        class="btn btn-warning">Eliminar</button>

                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
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
         var date = new Date( data[5] );
  
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
    minDate = new DateTime($('.min'), {
        format: 'MMMM Do YYYY'
    });
    maxDate = new DateTime($('.max'), {
        format: 'MMMM Do YYYY'
    });
 
    // DataTables initialisation
    var table = $('.add-rowww').DataTable();
 
    // Refilter the table
    $('.min, .max').on('change', function () {
        table.draw();
    });

        

             table = $('.add-rowww').DataTable({
                orderCellsTop: true,
                fixedHeader: true,
                "pageLength": 10,
                "destroy": true,
                "ajax": "<?php echo e(route('novedadsdatabase.listarcobro')); ?>",
                "data": {
                    "opselect": "opselect"
                },
                "type": 'get',
                "columns": [{
                        data: 'btn'
                    }, {
                        data: 'id'
                    },
                    {
                        data: 'servicio'
                    },
                    {
                        data: 'nombres'
                    },
                    {
                        data: 'horainciar'
                    },
                    {
                        data: 'fechavisita'
                    },
                    {
                        data: 'horavisita'
                    },
                    {
                        data: 'novedadopercance'
                    },
                    {
                        data: 'especificar'
                    },
                    {
                        data: 'eliminar',
                        searchable: false
                    }
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
        
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\AppQuantika\resources\views/novedadsmodificar/index.blade.php ENDPATH**/ ?>