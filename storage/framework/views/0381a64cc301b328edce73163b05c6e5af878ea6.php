

<?php $__env->startPush('css'); ?>
    <style>
        .h25px{
            height: 25px;
        }
        .star-rating{
            color: #f39c12;
            width: 1.2rem;
        }
        .rating-div{
            column-gap: 0.5rem;
            margin-bottom: 0.5rem;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('page_conent'); ?>

   
<div class="container mt-5">
        <h1 class="mb-4">Shop One - Store Wise Categories & Products</h1>

        <?php $__currentLoopData = $stores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $store): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h2><?php echo e($store->name); ?></h2>
                </div>
                <div class="card-body">
                    <?php $__currentLoopData = $store->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <h4 class="mt-3"><?php echo e($category->name); ?></h4>
                        <ul class="list-group mb-3">
                            <?php $__currentLoopData = $category->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="list-group-item"><?php echo e($product->name); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp82\htdocs\bkshop\resources\views/frontend/pages/index.blade.php ENDPATH**/ ?>