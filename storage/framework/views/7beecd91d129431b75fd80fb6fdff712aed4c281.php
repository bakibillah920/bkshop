<?php
    $site_info = App\Models\CompanyInfo::first();
    $site_contact_info = App\Models\CompanyContact::first();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title> <?php echo $__env->yieldContent('title', $site_info->title); ?> </title>

    <!-- Favicon-->
    <link rel="icon" href="<?php echo e(asset($site_info->logo)); ?>" type="image/png">

    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/style.css')); ?>">
    <?php echo $__env->yieldPushContent('third_party_stylesheets'); ?>
    <?php echo $__env->yieldPushContent('page_css'); ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Main Header -->
        <?php echo $__env->make('backend.partial.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Left side column. contains the logo and sidebar -->
        <?php echo $__env->make('backend.partial.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper  py-md-5 px-md-5">
            <?php echo $__env->yieldContent('content'); ?>
        </div>

        <!-- Main Footer -->
        <?php echo $__env->make('backend.partial.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
    

    
    <?php echo $__env->yieldPushContent('third_party_scripts'); ?>

    <?php echo $__env->yieldPushContent('page_scripts'); ?>
</body>

</html>
<?php /**PATH E:\xampp82\htdocs\bkshop\resources\views/backend/layouts/app.blade.php ENDPATH**/ ?>