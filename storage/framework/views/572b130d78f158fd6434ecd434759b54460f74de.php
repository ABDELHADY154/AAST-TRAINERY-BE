<?php echo csrf_field(); ?>

<div class="">
    
    <div class="avatar-upload text-center mb-3" <?php echo e(isset($company)? "data-image=\"".asset('storage/images/companyLogo/'. $company->image)."\"":""); ?>>
        <img class="avatar-preview" id="output" src="<?php echo e(isset($company)?asset('storage/images/companyLogo/'. $company->image):""); ?>">
    </div>
    <div class=" row text-center justify-content-center">
        <div class="col-xl-8">
            <div class="form-group mb-3">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFile" onchange="loadFile(event)" name="company_logo" value="<?php echo e(old('company_logo')); ?>">
                    <label class="custom-file-label" for="customFile" id="labelIMG">Upload Company Logo</label>
                </div>
                <?php $__errorArgs = ['company_logo'];
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
    <label for="name">Company Name</label>
    <input type="text" name="company_name" id="company_name" class="form-control" value="<?php echo e(isset($company)?$company->company_name : old('company_name')); ?>">
    <?php if($errors->first('company_name')): ?>
    <span class="text-danger">
        <?php echo e($errors->first('company_name')); ?>

    </span>
    <?php endif; ?>
</div>

<div class="form-group">
    <label for="name">Company Field</label>
    <input type="text" name="company_field" id="company_field" class="form-control" value="<?php echo e(isset($company)?$company->company_field : old('company_field')); ?>">
    <?php if($errors->first('company_field')): ?>
    <span class="text-danger">
        <?php echo e($errors->first('company_field')); ?>

    </span>
    <?php endif; ?>
</div>
<div class="form-group">
    <label for="desc">Company Description</label>
    <textarea name="desc" id="desc" cols="30" rows="4" class="form-control">
    <?php echo e(isset($company)?$company->company_desc : old('desc')); ?>

    </textarea>
    <?php if($errors->first('desc')): ?>
    <span class="text-danger">
        <?php echo e($errors->first('desc')); ?>

    </span>
    <?php endif; ?>
</div>
<div class="form-group">
    <label for="name">Company Phone Number</label>
    <input type="text" name="phone_number" id="phone_number" class="form-control" value="<?php echo e(isset($company)? $company->phone_number : old('phone_number')); ?>">
    <?php if($errors->first('phone_number')): ?>
    <span class="text-danger">
        <?php echo e($errors->first('phone_number')); ?>

    </span>
    <?php endif; ?>
</div>
<div class="form-group">
    <label for="name">Company Address</label>
    <input type="text" name="address" id="address" class="form-control" value="<?php echo e(isset($company)? $company->address : old('address')); ?>">
    <?php if($errors->first('address')): ?>
    <span class="text-danger">
        <?php echo e($errors->first('address')); ?>

    </span>
    <?php endif; ?>
</div>
<div class="form-group">
    <label for="name">Company Website</label>
    <input type="text" name="website" id="website" class="form-control" value="<?php echo e(isset($company)? $company->website : old('website')); ?>">
    <?php if($errors->first('website')): ?>
    <span class="text-danger">
        <?php echo e($errors->first('website')); ?>

    </span>
    <?php endif; ?>
</div>
<div class="form-group">
    <label for="name">Company Email</label>
    <input type="text" name="email" id="email" class="form-control" value="<?php echo e(isset($company)? $company->email : old('email')); ?>">
    <?php if($errors->first('email')): ?>
    <span class="text-danger">
        <?php echo e($errors->first('email')); ?>

    </span>
    <?php endif; ?>
</div>
<div class="text-center">
    <button type="submit" class="btn btn-success"><?php echo e(isset($company)? "Save" : "Submit"); ?></button>
</div>
<?php /**PATH E:\graduation\AAST-TRAINERY-BE\AAST-TRAINERY-BE\resources\views/admin/student/form.blade.php ENDPATH**/ ?>