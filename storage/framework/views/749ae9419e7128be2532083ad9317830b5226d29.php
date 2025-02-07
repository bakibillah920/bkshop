<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <?php
        $company_info = App\Models\CompanyInfo::first();
    ?>
    <a href="#" target="blank" class="brand-link">
        <img src="<?php if(isset($company_info->logo)): ?> <?php echo e(asset($company_info->logo)); ?><?php else: ?><?php echo e(asset('assets/images/default/site-logo.png')); ?> <?php endif; ?>"
            alt="" class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light">
            <?php if(isset($company_info->name)): ?>
                <?php echo e($company_info->name); ?> <?php else: ?><?php echo e('Ecommerce Website'); ?>

            <?php endif; ?>

        </span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <?php echo $__env->make('backend.partial.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </ul>
        </nav>
    </div>

</aside>
<?php /**PATH E:\xampp82\htdocs\bkshop\resources\views/backend/partial/sidebar.blade.php ENDPATH**/ ?>