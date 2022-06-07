  <?php if($message= Session::get("success")): ?>
  <script src="<?php echo e(asset('js/plugin/sweetalert/sweetalert.min.js')); ?>"></script>
  <script>
    swal("Info!", "<?php echo e($message); ?>!", {
                    icon: "info",
                    buttons: {
                        confirm: {
                            className: 'btn btn-success'
                        }
                    },
                });
  </script>
  <?php endif; ?>
  <?php if($message= Session::get("error")): ?>
  <script src="<?php echo e(asset('js/plugin/sweetalert/sweetalert.min.js')); ?>"></script>
  <script>
    swal("Error!", "<?php echo e($message); ?>!", {
                    icon: "error",
                    buttons: {
                        confirm: {
                            className: 'btn btn-danger'
                        }
                    },
                });
  </script>
  <?php endif; ?><?php /**PATH C:\nuevoxampp\htdocs\app\AppQuantika\resources\views/components/alert.blade.php ENDPATH**/ ?>