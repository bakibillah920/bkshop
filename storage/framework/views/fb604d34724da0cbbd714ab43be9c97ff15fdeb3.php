

    <?php echo $__env->make('frontend.layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


        
        <?php echo $__env->make('frontend.partials.notification', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        

        <!-- Navbar Start -->
        <?php echo $__env->make('frontend.partials.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Navbar End -->
        <div class="toastr-div">
        </div>

        <?php echo $__env->yieldContent('page_conent'); ?>

        <?php echo $__env->make('frontend.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </body>
</html>
<?php /**PATH E:\xampp82\htdocs\bkshop\resources\views/frontend/layouts/app.blade.php ENDPATH**/ ?>