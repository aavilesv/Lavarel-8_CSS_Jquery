<div class="form-button-action">
    
    <?php if($eliminar === 0): ?>
    <a class="btn btn-link btn-success btn-lg" data-toggle="tooltip" data-original-title="Ver"
        href="<?php echo e(route('cuentasporcobrar.show', $id)); ?>"><i class="fa fa-eye"></i></a>
        <a class="btn btn-link btn-danger btn-eliminar" data-toggle="tooltip" data-original-title="Eliminar"
            data-json='{"id":"<?php echo e($id); ?>"}' rel="action"><i class="fa fa-times"></i></a>
    <?php endif; ?>

</div>
<?php /**PATH G:\xampp\htdocs\AppQuantika\resources\views/cuentasporcobrars/btn.blade.php ENDPATH**/ ?>