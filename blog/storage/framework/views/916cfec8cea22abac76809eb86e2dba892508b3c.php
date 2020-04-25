<?php $__env->startSection('content'); ?>
<div class="container">
    <?php if($data->where('quantity','=',0)->count()): ?>
    <h2>Finished products</h2>
    <div class="row pt-5">
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($pro->quantity==0): ?>
                <div class="col-4 pb-4" >
                    <h3><?php echo e($pro->name); ?> </h3>
                    <img src="/storage/<?php echo e($pro->image); ?>" class="w-100">
                    <form action="/Product/add/<?php echo e($pro->id); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="d-flex justify-content-between pt-3">
                            <div class="pt-2">Price = <?php echo e($pro->price); ?>&#36;</div>
                            <div >
                                <input id="quantity" type="number"  min="1" style="width:60%;"
                                class="form-control <?php if ($errors->has('quantity')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('quantity'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                name="quantity" value="<?php echo e(old('quantity')??$pro->quantity); ?>"
                                    required autocomplete="quantity">
                                <?php if ($errors->has('quantity')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('quantity'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                            <div style="height:10px">
                                <button class="btn btn-primary">Add</button>
                            </div>
                        </div>
                    </form>
                </div>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <?php else: ?>
    <div class="d-flex justify-content-center pt-5"><h2>There is no finished products</h2></div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\blog\resources\views/admin/Product/finished.blade.php ENDPATH**/ ?>