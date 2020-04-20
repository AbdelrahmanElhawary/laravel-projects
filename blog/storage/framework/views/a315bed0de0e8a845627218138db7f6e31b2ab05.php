<?php $__env->startSection('content'); ?>
<div class="container">
    <form action="/Category/<?php echo e($cat->id); ?>" enctype="multipart/form-data" method="post">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PATCH'); ?>;
        <div class="row">
            <h3>Edit Category</h3>
        </div>
        <div class="row">
            <div class="col-8 ">
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label">Category Name</label>
                        <input id="name" type="text" 
                        class="form-control <?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                        name="name" value="<?php echo e(old('name')??$cat->name); ?>"
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
                <label for="image"class="col-mid-4 col-form-label">Category Image</label>
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
            <button class="btn btn-primary">Edit category</button>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\blog\resources\views/admin/Category/edit.blade.php ENDPATH**/ ?>