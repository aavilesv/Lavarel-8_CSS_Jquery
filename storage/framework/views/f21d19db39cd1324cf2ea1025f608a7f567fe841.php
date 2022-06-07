<div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <div class="text">
                <ul class="list-inline">
                    <li class="list-inline-item"> <i class="fab fa-ioxhost"></i>
                    </li>
                    <li class="list-inline-item">
                        <h3> <strong class="card-title">Dinero Entrago al gerente</strong></h3>
                    </li>
                </ul>
            </div>
            <button type="button" class="close" title="Salir" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form  action="<?php echo e(route('gerente.update',$id)); ?>" 
             method="POST" class="form-control form-createe" enctype="multipart/form-data">
             <?php echo method_field('put'); ?>   
             <?php echo csrf_field(); ?>

                <input type="hidden" name="caja_id" value="<?php echo e($id); ?>">
                <div class="form-group">
                    <label for="saldoingeniero">Monto:$</label>
                    <input type="text" name="saldoingeniero"  
                    required class="form-control decimal-2-places" 
                    placeholder="Monto" value="">
                </div>
                
                
                
                <div class="ml-md-auto py-2 py-md-0">
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
<?php /**PATH C:\nuevoxampp\htdocs\app\AppQuantika\resources\views/cobro/gerente.blade.php ENDPATH**/ ?>