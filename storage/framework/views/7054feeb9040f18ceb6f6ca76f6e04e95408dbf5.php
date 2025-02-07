
<select class="form-control" name="category_id" id="category_id">
   <option value="0" >--Select Category--</option>
    <?php $__currentLoopData = $categoryList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $catId=>$catname): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <option value="<?php echo e($catId); ?>" ><?php echo e($catname); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
                                       <?php /**PATH E:\xampp82\htdocs\bkshop\resources\views/backend/pages/product/getcategory.blade.php ENDPATH**/ ?>