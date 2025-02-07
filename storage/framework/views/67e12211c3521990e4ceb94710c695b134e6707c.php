<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo e($site_info->title ?? 'Security Fast'); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

    <style>
        .password{
            position: relative;
        }
        .password .eye {
            position: absolute;
            top: 10px;
            right: 22px;
            font-size: 25px;
        }
    </style>
</head>


<body>


    

    <section class="vh-100" style="background-color: #508bfc;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5">

                            <h1 class="mb-5 text-center">Sign in</h1>
                            <?php if(!empty(request('id'))): ?>
                            <form action="<?php echo e(route('login')); ?>" method="POST" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="role_id" value="<?php echo e(request('id')); ?>" />
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="typeEmailX-2">Email</label>
                                    <input name="email" type="text" id="phone-2"
                                        class="form-control form-control-lg" />
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="typePasswordX-2">Password</label>
                                    <div class="password">
                                        <input name="password" type="password" id="typePasswordX-2"
                                        class="form-control form-control-lg" />
                                        <i class="fa-solid fa-eye eye"></i>
                                        <i class="fa-solid fa-eye-slash eye"></i>
                                    </div>
                                    <a href="<?php echo e(url('forgot-password')); ?>">Forgot-password</a>
                                </div>

                                <!-- Session Status -->
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.auth-session-status','data' => ['class' => 'mb-4','status' => session('status')]]); ?>
<?php $component->withName('auth-session-status'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => 'mb-4','status' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(session('status'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                                <!-- Validation Errors -->
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.auth-validation-errors','data' => ['class' => 'mb-4','errors' => $errors]]); ?>
<?php $component->withName('auth-validation-errors'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => 'mb-4','errors' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
                                <div class="d-flex justify-content-end">
                                    <a href="<?php echo e(url('register')); ?>">Registration</a>
                                </div>
                            </form>
                            <?php else: ?>
                            <div class="d-flex">
                                <a class="btn btn-primary btn-lg" href="<?php echo e(url('login?id=1')); ?>">Admin</a>
                                <a class="btn btn-success btn-lg ms-auto" href="<?php echo e(url('login?id=2')); ?> ">Merchant</a>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    

    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script>
    $('.fa-eye').hide();
    $('.fa-eye-slash').on('click',function(){
        $(this).hide();
        $('.fa-eye').show();
        $('.password input').attr('type','text');
    })
    $('.fa-eye').on('click',function(){
        $(this).hide();
        $('.fa-eye-slash').show();
        $('.password input').attr('type','password');
    })
</script>

</body>

</html>





<?php /**PATH E:\xampp82\htdocs\bkshop\resources\views/auth/login.blade.php ENDPATH**/ ?>