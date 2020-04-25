<?php $__env->startSection('content'); ?>
<div class="container">
    <?php if($cat->products->where('quantity','>',0)->count()): ?>
    <h2><?php echo e($cat->name); ?></h2>
    <div class="row pt-5">
        <?php $__currentLoopData = $cat->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($pro->quantity>0): ?>
                <div class="col-4 pb-4" >
                    <h3><?php echo e($pro->name); ?> </h3>
                    <img src="/storage/<?php echo e($pro->image); ?>" class="w-100">
                    <div class="d-flex justify-content-between">
                        <div>price = <?php echo e($pro->price); ?>&#36;</div>
                        <div>quantity = <?php echo e($pro->quantity); ?></div>
                        <a href="/Product/<?php echo e($pro->id); ?>/delete"style="text-decoration: none">remove</a>
                        <a href="/Product/<?php echo e($pro->id); ?>/edit"style="text-decoration: none">Edit</a>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <?php else: ?>
    <div class="d-flex justify-content-center pt-5"><h2>There is no products in <?php echo e($cat->name); ?></h2></div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\blog\resources\views/admin/show.blade.php ENDPATH**/ ?>