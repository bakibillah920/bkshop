<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <ul class="navbar-nav ml-auto">

        
        <li class="nav-item">
            <a href="<?php echo e(route('optimize')); ?>" class="nav-link" title='Optimize the app'>
                <i class="fas fa-sync"></i>
            </a>
        </li>
        
        <li class="nav-item">
            <a href="<?php echo e(route('optimize-clear')); ?>" class="nav-link">
                <i class="fas fa-cog"></i>
                Cache Clear
            </a>
        </li>

        
        

        
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <img src="<?php if(isset(Auth::user()->image)): ?> <?php echo e(asset(Auth::user()->image)); ?><?php else: ?><?php echo e(asset('/images/default/human.webp')); ?> <?php endif; ?>"
                    class="user-image img-circle elevation-2" alt="">
                <span class="d-none d-md-inline"><?php echo e(Auth::user()->name); ?></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <!-- User image -->
                <li class="user-header bg-primary">
                    <img src="<?php if(isset(Auth::user()->image)): ?> <?php echo e(asset(Auth::user()->image)); ?><?php else: ?><?php echo e(asset('/images/default/human.webp')); ?> <?php endif; ?>"
                        class="img-circle elevation-2" alt="">
                    <p>
                        <?php echo e(Auth::user()->name); ?>


                        
                    </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                    <a href="#" class="btn btn-default btn-flat float-right"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Sign out
                    </a>
                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                        <?php echo csrf_field(); ?>
                    </form>
                </li>
            </ul>
        </li>
    </ul>
</nav>
<?php /**PATH E:\xampp82\htdocs\bkshop\resources\views/backend/partial/nav.blade.php ENDPATH**/ ?>