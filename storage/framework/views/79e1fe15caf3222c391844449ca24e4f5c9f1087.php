<div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <div class="text">
                <ul class="list-inline">
                    <li class="list-inline-item"> <i class="fab fa-ioxhost"></i>
                    </li>
                    <li class="list-inline-item">
                        <h3> <strong class="card-title">Nuevo Gasto </strong></h3>
                    </li>
                </ul>
            </div>
            <button type="button" class="close" title="Salir" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form  action="<?php echo e(route('reportecaja.update',$id)); ?>" 
             method="POST" class="form-control form-createe" enctype="multipart/form-data">
             <?php echo method_field('put'); ?>   
             <?php echo csrf_field(); ?>
                <input type="hidden" name="caja_id" value="<?php echo e($id); ?>">
                <div class="form-group">
                    <label for="nombre">Partida:</label>
                    <input name="nombre" maxlength="200" class="form-control" required placeholder="Ejemplo: VEHICULO,SUMINISTROS DE OFICINA,etc.">
                </div>
                
                <div class="form-group">
                    <label for="descripcion">Descripción:</label>
                    <textarea name="descripcion" maxlength="200" class="form-control" required placeholder="Ejemplo: AGUA CHICOS,FLETE,etc."></textarea>                    
                </div>
                <div class="form-group">
                    <label for="observacion">Observacion:</label>
                    <textarea name="observacion" maxlength="200" class="form-control" placeholder="Ejemplo: CUMPLEAÑOS DE VICTOR,ANTENA Y FIBRA"></textarea>                    
                </div>
                <div class="form-group">
                    <label for="monto">Monto:</label>
                    <input type="text" name="monto" required class="form-control decimal-2-places" placeholder="Ejemplo: $5,$1,etc." value="">
                </div>
                <div class="form-group">
                    <label for="soporte">Soporte:</label>
                    <input name="soporte" maxlength="200" class="form-control" onKeyPress="return sololetrascoma(event)" placeholder="Ejemplo: RECIBO,FACTURA,BCO GYE,etc.">
                </div>
                <div class="form-group">
                    <label for="factura">factura:</label>
                    <input name="factura" maxlength="200" class="form-control positive" placeholder="Ejemplo: 086013,20808809,etc.">
                </div>
                <div class="form-group">
                    <label for="image">Imagén:</label>
                    <input type="file" name="image" accept="image/*" class="form-control imagejs" placeholder="Foto Empleado" value="">
                </div>
                <div class="ml-md-auto py-2 py-md-0">
                    <button id="btn-registrar" class="btn btn-success btn-border btn-round mr-2" type="submit"><i class="fas fa-save"></i> Ingresar</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    $(".positive").numeric({ negative: false }); 
$(".decimal-2-places").numeric({ decimalPlaces: 2 });

    $('.form-createe').submit(function(e) {
            e.preventDefault();
            swal({
                title: 'Esta seguro?',
                text: "Enviar Datos!",
                type: 'info',
                icon: 'info',
                buttons: {
                    cancel: {
                        visible: true,
                        text: 'No, cancelar!',
                        className: 'btn btn-danger'
                    },
                    confirm: {
                        text: 'Si, Enviar datos!',
                        className: 'btn btn-success'
                    }
                }
            }).then((willDelete) => {
                if (willDelete) {
                    this.submit();
                } else {

                }
            });
        });
</script>
<?php /**PATH C:\nuevoxampp\htdocs\app\AppQuantika\resources\views/cajareporte/gasto.blade.php ENDPATH**/ ?>