

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
     
        <?php if($user->role_id == 1): ?>
        <div class="container-fluid">
            <div class="row justify-content-center">
            <div class="col-md-10 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <span class="float-left">
                            <h4>Merchant</h4>
                        </span>
                    </div>
                    <div class="card-body">
                        <?php echo $__env->make('backend.partial.flush-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <div class="table-responsive">
                            <table id="table" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th> Merchant Name</th>
                                        <th> Merchant Email</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $merchentUser; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td><?php echo e($key + 1); ?></td>
                                            <td><?php echo e($value->name); ?></td>
                                            <td><?php echo e($value->email); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp82\htdocs\bkshop\resources\views/backend/pages/index.blade.php ENDPATH**/ ?>