<?php $__env->startSection('content'); ?>
<div class="container">
    <h3>Dashboard</h3>
    <?php echo e($user->id); ?>


    <div class="row pt-5">
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-4 pb-4" >
                <a href="/home/<?php echo e($rw->name); ?>" style="text-decoration: none">
                    <h3><?php echo e($rw->name); ?> </h3>
                    <img src="/storage/<?php echo e($rw->image); ?>" class="w-100">
                </a>
                <div >products : <?php echo e($rw->products->where('quantity','>',0)->count()); ?></div>
                                
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\blog\resources\views/home.blade.php ENDPATH**/ ?>