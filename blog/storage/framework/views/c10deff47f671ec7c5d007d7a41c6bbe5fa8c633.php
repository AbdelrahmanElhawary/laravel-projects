<?php $__env->startSection('content'); ?>
<div class="container">
    <?php if($data->count()): ?>
    <h3>dashboard</h3>
    <div class="row pt-5">
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-4 pb-4" >
                <a href="/Category/<?php echo e($rw->name); ?>" style="text-decoration: none">
                    <h3><?php echo e($rw->name); ?> </h3>
                    <img src="/storage/<?php echo e($rw->image); ?>" class="w-100">
                </a>
                <div class="d-flex justify-content-between pt-2" >
                <div >products : <?php echo e($rw->products->where('quantity','>',0)->count()); ?></div>
                <a href="/Category/<?php echo e($rw->id); ?>/delete"style="text-decoration: none">remove</a>
                <a href="/Category/<?php echo e($rw->id); ?>/edit"style="text-decoration: none">Edit</a>
                </div>
                
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <?php else: ?>
    <div class="d-flex justify-content-center pt-5"><h2>There is no categories</h2></div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\blog\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>