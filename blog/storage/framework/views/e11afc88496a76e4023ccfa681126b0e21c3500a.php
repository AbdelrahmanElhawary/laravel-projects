<?php $__env->startSection('content'); ?>
<div class="container">
    <h2><?php echo e($cat->name); ?></h2>
        <?php echo e($user->id); ?>

    <div class="row pt-5">
        <?php $__currentLoopData = $cat->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($pro->quantity>0): ?>
                <div class="col-4 pb-4" >
                    <h3><?php echo e($pro->name); ?> </h3>
                    <img src="/storage/<?php echo e($pro->image); ?>" class="w-100">
                    <div class="d-flex justify-content-between">
                        <div class="pt-3">price = <?php echo e($pro->price); ?>&#36;</div>
                        <div class="pt-3">quantity = <?php echo e($pro->quantity); ?></div>    
                        <div class="pt-2" style="height:10px">
                                <a href="Product/addtocart/<?php echo e($pro->id); ?>"><button class="btn btn-primary">Add to cart</button></a>
                            </div>                        
                    </div>
                </div>

            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\blog\resources\views/usershow.blade.php ENDPATH**/ ?>