<?php if(session('success')): ?>
<div class="alert alert-success text-center mt-1 alert-dismissible fade show" role="alert">
    <?php echo e(session('success')); ?>

    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php elseif(session('error')): ?>
<div class="alert alert-success text-center mt-1 alert-dismissible fade show" role="alert">
    <?php echo e(session('error')); ?>

    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php endif; ?>
<?php /**PATH E:\xampp82\htdocs\bkshop\resources\views/backend/partial/flush-message.blade.php ENDPATH**/ ?>