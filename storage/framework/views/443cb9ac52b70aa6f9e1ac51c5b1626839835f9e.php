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
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form  action="<?php echo e(route('diariacobro.update',$id)); ?>" 
             method="POST" class="form-control form-createe" enctype="multipart/form-data">
             <?php echo method_field('put'); ?>   
             <?php echo csrf_field(); ?>

                <input type="hidden" name="caja_id" value="<?php echo e($id); ?>">
                <div class="form-group">
                    <label for="nombre">Descripción:</label>

                        <textarea name="nombre" maxlength="200" class="form-control" required
                            placeholder="Nombre del Gasto"></textarea>
                    
                </div>
                <div class="form-group">
                    <label for="monto">Monto:</label>
                    <input type="text" name="monto"  
                    required class="form-control decimal-2-places" 
                    placeholder="Monto" value="">
                </div>
                
                <div class="form-group">
                    <label for="image">Imagén:</label>
                    <input type="file" name="image" accept="image/*" class="form-control imagejs"
                        placeholder="Foto Empleado" value="">
                </div>
                
                <div class="ml-md-auto py-2 py-md-0">
                    <a href="javascript: history.go(-1)" class="btn btn-danger btn-border btn-round mr-2"><i
                        class="fas fa-reply"></i>
                    Volver</a>
                    <button id="btn-registrar" class="btn btn-success btn-border btn-round mr-2" type="submit"><i
                            class="fas fa-save"></i>
                        Ingresar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
$(".decimal-2-places").numeric({ decimalPlaces: 2 });

</script>
<script>
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
<?php /**PATH C:\nuevoxampp\htdocs\app\AppQuantika\resources\views/cuentasporcobrars/registroencja.blade.php ENDPATH**/ ?>