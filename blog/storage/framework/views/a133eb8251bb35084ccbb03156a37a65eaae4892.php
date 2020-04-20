<?php $__env->startSection('content'); ?>
<div class="container">
    <form action="/Product/store" enctype="multipart/form-data" method="post">
        <?php echo csrf_field(); ?>
        <div class="row">
            <h3>Add Product</h3>
        </div>
        <div class="row">
            <div class="col-8 ">
                <div class="form-group row">
                    <label for="category_id" class="col-md-4 col-form-label">Category name</label>
                        <select id="category_id"  
                        class="form-control <?php if ($errors->has('category_id')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('category_id'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                        name="category_id" value="<?php echo e(old('category_id')); ?>"
                            required autocomplete="category_id">
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($cat->id); ?>"><?php echo e($cat->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php if ($errors->has('category_id')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('category_id'); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-8 ">
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label">Product Name</label>
                        <input id="name" type="text" 
                        class="form-control <?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                        name="name" value="<?php echo e(old('name')); ?>"
                            required autocomplete="name">
                        <?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-8 ">
                <div class="form-group row">
                    <label for="price" class="col-md-4 col-form-label">Product Price</label>
                        <input id="price" type="number" step="0.01" min="0.00"
                        class="form-control <?php if ($errors->has('price')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('price'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                        name="price" value="<?php echo e(old('price')); ?>"
                            required autocomplete="price">
                        <?php if ($errors->has('price')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('price'); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-8 ">
                <div class="form-group row">
                    <label for="quantity" class="col-md-4 col-form-label">Product quantity</label>
                        <input id="quantity" type="number"  min="0"
                        class="form-control <?php if ($errors->has('quantity')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('quantity'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                        name="quantity" value="<?php echo e(old('quantity')); ?>"
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
            </div>
        </div>
        <div class="row">
            <div class="col-8 ">
                <label for="image"class="col-mid-4 col-form-label">Product Image</label>
                <input type="file" class="form-control-file" id="image" name="image">    
                <?php if ($errors->has('image')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('image'); ?>
                    <strong><?php echo e($message); ?></strong>
                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>          
            </div>
        </div>
        <div class="row pt-4">
            <button class="btn btn-primary">Add new product</button>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\blog\resources\views/admin/Product/create.blade.php ENDPATH**/ ?>