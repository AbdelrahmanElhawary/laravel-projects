<?php $__env->startSection('content'); ?>
<div class="container">
    <?php ($user=Auth::user()); ?>
    <?php if($user->records->count()): ?>
        <div class="row pt-5">
            <?php $__currentLoopData = $user->records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php ($pro=$rec->product); ?>
                <div class="col-4 pb-4" >
                    <h3><?php echo e($pro->name); ?> </h3>
                    <img src="/storage/<?php echo e($pro->image); ?>" class="w-100">
                    <div class="d-flex justify-content-between">
                        <div class="pt-3">price = <?php echo e($pro->price); ?>&#36;</div>
                        <div class="pt-3">quantity = <?php echo e($rec->quantity); ?></div>                     
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php else: ?>
        <div class="d-flex justify-content-center pt-5">
            <h2>No records yet</h2>
        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\blog\resources\views/history.blade.php ENDPATH**/ ?>