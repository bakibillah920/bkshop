<?php if(check('Home')): ?>
    <li class="nav-item">
        <a href="<?php echo e(route('admin')); ?>" class="nav-link <?php echo e(Request::is('admin/dashboard') ? 'active' : ''); ?>">
            <i class="nav-icon fas fa-home"></i>
            <p>Home</p>
        </a>
    </li>
<?php endif; ?>
 <?php if($n = check('Store')): ?>
    <li class="nav-item">
         <?php if($n->show): ?>
        <a href="<?php echo e(route('merchant.store.index')); ?>" class="nav-link <?php echo e(Request::is('merchant/store-index') ? 'active' : ''); ?>">
            <i class="nav-icon far fa-circle"></i>
            <p>Store List</p>
        </a>
        <?php endif; ?>
    </li>
     <?php endif; ?>
    <?php if($n = check('Category')): ?>
    <li class="nav-item">
         <?php if($n->show): ?>
        <a href="<?php echo e(route('merchant.category.index')); ?>"
            class="nav-link <?php echo e(Request::is('merchant/category-index') ? 'active' : ''); ?>">
            <i class="nav-icon far fa-circle"></i>
            <p>Category List</p>
        </a>
          <?php endif; ?>
    </li>
    <?php endif; ?>
 <?php if($n = check('Category')): ?>
    <li class="nav-item">
         <?php if($n->show): ?>
        <a href="<?php echo e(route('merchant.product.index')); ?>" class="nav-link <?php echo e(Request::is('merchant/product-index') ? 'active' : ''); ?>">
            <i class="nav-icon far fa-circle"></i>
            <p>Product List</p>
        </a>
          <?php endif; ?>
    </li>
    <?php endif; ?>

<?php /**PATH E:\xampp82\htdocs\bkshop\resources\views/backend/partial/menu.blade.php ENDPATH**/ ?>