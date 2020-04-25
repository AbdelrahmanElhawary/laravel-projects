<?php $__env->startSection('content'); ?>
<div class="container">
    <?php ($id=Auth::user()->id); ?>
    <?php ($cart=session($id)); ?>
    <?php if(session('changes')): ?>
            <div class="alert alert-danger" role="alert">
                <h4>Sorry, we do not have enough products in stock to fulfil your order</h4>
                <h4>Your cart has been updated with what is available</h4>
            </div>
    <?php endif; ?>
    <?php if($cart&&$cart->ItemsQuntity>0): ?>
        <div class="d-flex justify-content-between">
            <div>
                <h4>Items Quntity = <?php echo e($cart->ItemsQuntity??0); ?></h4>
                <h4>Items total cost = <?php echo e($cart->ItemsCost??0); ?>&#36;</h4>
            </div>
            <?php if($cart->ItemsQuntity>0): ?>
            <div class="pt-2" style="height:10px">
                <a href="Product/buycart"><button class="btn btn-primary">Buy all</button></a>
            </div>   
            <?php endif; ?>
        </div>
        <div class="row pt-5">
            <?php $__currentLoopData = $cart->Items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $ItemInfo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php ($pro=\App\product::find($key)); ?>
                <?php if($pro): ?>
                <div class="col-4 pb-4">
                    <h3><?php echo e($pro->name); ?></h3>
                    <img src="/storage/<?php echo e($pro->image); ?>" class="w-100">
                    <div class="d-flex justify-content-between">
                        <div class="pt-3">price = <?php echo e($pro->price); ?>&#36;</div>
                        <div class="pt-3">quantity = <?php echo e($ItemInfo['qty']); ?></div>
                        <div class="pt-2" style="height:10px">
                            <a href="Product/removefromcart/<?php echo e($pro->id); ?>"><button class="btn btn-primary">remove from cart</button></a>
                        </div>                                
                    </div>
                </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php else: ?>
        <div class="d-flex justify-content-center pt-5"><h2>The Cart Is Empty</h2></div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\blog\resources\views/cart.blade.php ENDPATH**/ ?>