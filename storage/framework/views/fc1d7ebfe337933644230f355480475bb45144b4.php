

<?php $__env->startSection('title', 'Product Management'); ?>

<?php $__env->startPush('third_party_stylesheets'); ?>
    <link href="<?php echo e(asset('assets/backend/js/DataTable/datatables.min.css')); ?>" rel="stylesheet">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('page_css'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <span class="float-left">
                            <h4>View Product</h4>
                        </span>
                        <span class="float-right <?php if(!check('Product')->add): ?> d-none <?php endif; ?>">
                            <a href="<?php echo e(route('merchant.product.create')); ?>" class="btn btn-info">Add new Product</a>
                        </span>
                    </div>
                    <div class="card-body">
                        <?php echo $__env->make('backend.partial.flush-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <div class="table-responsive">
                            <table id="table" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Store Name</th>
                                        <th>Category Name</th>
                                        <th>Product Name</th>
                                        <th>Product Status</th>
                                        <th class="<?php if(!check('Product')->edit && !check('Product')->delete): ?> d-none <?php endif; ?>"
                                            id="action">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td><?php echo e($key + 1); ?></td>
                                            <td><?php echo e($value->store->name); ?></td>
                                            <td><?php echo e($value->category->name); ?></td>
                                            <td><?php echo e($value->name); ?></td>
                                            <td><?php echo e($value->status); ?></td>
                                            <td class="text-middle py-0 align-middle <?php if(!check('Product')->edit && !check('Product')->delete): ?> d-none <?php endif; ?>">
                                                <div class="btn-group">
                                                    <a href="<?php echo e(route('merchant.product.edit', $value->id)); ?>"
                                                        class="btn btn-dark btnEdit <?php if(!check('Product')->edit): ?> d-none <?php endif; ?>"><i class="fas fa-edit"></i></a>
                                                    
                                                    
                                                    <a href="<?php echo e(route('merchant.product.destroy', $value->id)); ?>"
                                                        class="btn btn-danger btnDelete <?php if(!check('Product')->delete): ?> d-none <?php endif; ?>"><i class="fas fa-trash"></i></a>
                                                    
                                                </div>
                                            </td>
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

<?php $__env->stopSection(); ?>



<?php $__env->startPush('third_party_scripts'); ?>
    <script src="<?php echo e(asset('assets/backend/js/DataTable/datatables.min.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('page_scripts'); ?>
    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'pdfHtml5',
                        title: 'Product Management',
                        download: 'open',
                        orientation: 'potrait',
                        pagesize: 'LETTER',
                        exportOptions: {
                            columns: [0, 1, 2]
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [0, 1, 2]
                        }
                    }, 'pageLength'
                ]
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp82\htdocs\bkshop\resources\views/backend/pages/product/index.blade.php ENDPATH**/ ?>