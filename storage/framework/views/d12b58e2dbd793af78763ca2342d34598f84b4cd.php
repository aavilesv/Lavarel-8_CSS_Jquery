<div class="form-button-action">
    <a class="btn btn-link btn-info btn-lg" data-toggle="tooltip" data-original-title="Imprimir registro" target="_blank"
        href="<?php echo e(route('pdfnovedad.novedadgetone', $id)); ?>"><i class="icon-printer"></i></a>
    <a class="btn btn-link btn-primary btn-lg" data-toggle="tooltip" data-original-title="Editar"
        href="<?php echo e(route('novedadupdatecontroller.edit', $id)); ?>"><i class="fa fa-edit"></i></a>
    <?php if($eliminar == 1): ?>
        <a class="btn btn-link btn-warning btn-eliminar" data-toggle="tooltip" data-original-title="Eliminar Novedad"
            data-json='{"id":"<?php echo e($id); ?>"}' rel="action"><i class="fas fa-times"></i></a>
    <?php endif; ?>

</div>
<?php /**PATH C:\xampp\htdocs\AppQuantika\resources\views/novedadsmodificar/btn.blade.php ENDPATH**/ ?>