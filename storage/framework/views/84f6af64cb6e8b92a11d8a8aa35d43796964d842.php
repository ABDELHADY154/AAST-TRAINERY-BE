<?php echo csrf_field(); ?>

<div class="">
    <div class="avatar-upload text-center mb-3" <?php echo e(isset($trainingAdvisor)? "data-image=\"".asset('storage/images/advisorsLogo/'. $trainingAdvisor->advisor_image)."\"":""); ?>>
        <img class="avatar-preview" id="output" src="<?php echo e(isset($trainingAdvisor)?asset('storage/images/advisorsLogo/'. $trainingAdvisor->advisor_image):""); ?>">
    </div>
    <div class=" row text-center justify-content-center">
        <div class="col-xl-8">
            <div class="form-group mb-3">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFile" onchange="loadFile(event)" name="advisor_image" value="<?php echo e(old('advisor_image')); ?>">
                    <label class="custom-file-label" for="customFile" id="labelIMG">Upload Your Image</label>
                </div>
                <?php $__errorArgs = ['advisor_image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="text-danger" role="alert">
                    <strong><?php echo e($message); ?></strong>
                </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>
    </div>
</div>


<div class="form-group">
    <label for="name">Advisor Name</label>
    <input type="text" name="advisor_name" id="advisor_name" class="form-control" value="<?php echo e(isset($trainingAdvisor)?$trainingAdvisor->advisor_name : old('advisor_name')); ?>">
    <?php if($errors->first('advisor_name')): ?>
    <span class="text-danger">
        <?php echo e($errors->first('advisor_name')); ?>

    </span>
    <?php endif; ?>
</div>
<div class="form-group">
    <label for="name">Advisor Email</label>
    <input type="text" name="advisor_email" id="advisor_email" class="form-control" value="<?php echo e(isset($trainingAdvisor)? $trainingAdvisor->advisor_email : old('advisor_email')); ?>">
    <?php if($errors->first('advisor_email')): ?>
    <span class="text-danger">
        <?php echo e($errors->first('advisor_email')); ?>

    </span>
    <?php endif; ?>
</div>
<div class="form-group">
    <label for="name">Advisor Title</label>
    <input type="text" name="advisor_title" id="advisor_title" class="form-control" value="<?php echo e(isset($trainingAdvisor)?$trainingAdvisor->advisor_title : old('advisor_title')); ?>">
    <?php if($errors->first('advisor_title')): ?>
    <span class="text-danger">
        <?php echo e($errors->first('advisor_title')); ?>

    </span>
    <?php endif; ?>
</div>
<div class="form-group">
    <label for="name">Choose Department</label>
    <select name="department_id" id="department_id" class="form-control">

        <option value="0">Not Set</option>
        <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dep): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($trainingAdvisor->department_id == $dep->id): ?>
        <option value="<?php echo e($dep->id); ?>" selected><?php echo e($dep->department_name); ?></option>
        <?php endif; ?>
        <option value="<?php echo e($dep->id); ?>"><?php echo e($dep->department_name); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </select>
    <?php if($errors->first('department_id')): ?>
    <span class="text-danger">
        <?php echo e($errors->first('department_id')); ?>

    </span>
    <?php endif; ?>
</div>
<div class="form-group">
    <label for="desc">Advisor Bio</label>
    <textarea name="advisor_bio" id="advisor_bio" cols="30" rows="4" class="form-control">
    <?php echo e(isset($trainingAdvisor)?$trainingAdvisor->advisor_bio : old('advisor_bio')); ?>

    </textarea>
    <?php if($errors->first('advisor_bio')): ?>
    <span class="text-danger">
        <?php echo e($errors->first('advisor_bio')); ?>

    </span>
    <?php endif; ?>
</div>




<div class="text-center">
    <button type="submit" class="btn btn-success"><?php echo e(isset($trainingAdvisor)? "Save" : "Submit"); ?></button>
</div>
<?php /**PATH E:\graduation\AAST-TRAINERY-BE\AAST-TRAINERY-BE\resources\views/admin/advisor/form.blade.php ENDPATH**/ ?>