<?php echo csrf_field(); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    function addNewReq() {
        const rowId = Date.now();
        const productRow = `
            <tr id="product-${rowId}">

                <td>
                    <input type="text"
                    name="reqs[${rowId}]"

                    row-id="product-${rowId}"
                    class="form-control input-product-quantity">
                </td>

                <td>
                    <button id="product-${rowId}"  type="button" class="btn btn-danger row-delete" row-id="product-${rowId}">-</button>
                </td>
            </tr>
            `;
        $('#products-list').append(productRow);
    }

    function addNewTagRow() {
        const rowId = Date.now();
        const productRow = `
            <tr id="product-${rowId}">
                <td>
                    <select name="deps[${rowId}]" class="form-control input-product-product_id"  row-id="product-${rowId}">
                        <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dep): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($dep->id); ?>">
                            <?php echo e($dep->department_name); ?>

                        </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </td>
                <td>
                    <button id="product-${rowId}"  type="button" class="btn btn-danger row-delete" row-id="product-${rowId}">-</button>
                </td>
            </tr>
            `;
        $('#deps-list').append(productRow);
    }
    $(document).on('click', '.row-delete', function() {
        const rowId = '#' + $(this).attr('row-id');
        $(rowId).remove();
    });

</script>


<div class="form-group">
    <label for="company_id">Company</label>
    <select name="company_id" id="company_id" class="form-control">
        <option value="0">Not set</option>
        <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
        
        
        <option value="<?php echo e($company->id); ?>"><?php echo e($company->company_name); ?></option>
        
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <?php if($errors->first('company_id')): ?>
    <span class="text-danger">
        <?php echo e($errors->first('company_id')); ?>

    </span>
    <?php endif; ?>
</div>
<div class="form-group">
    <label for="name">Internship Title</label>
    <input type="text" name="internship_title" id="internship_title" class="form-control" value="<?php echo e(isset($companyInternshipPost)?$companyInternshipPost->internship_title : old('internship_title')); ?>">
    <?php if($errors->first('internship_title')): ?>
    <span class="text-danger">
        <?php echo e($errors->first('internship_title')); ?>

    </span>
    <?php endif; ?>
</div>
<div class="form-group">
    <label for="gender">Gender</label>
    <select name="gender" id="gender" class="form-control">
        <option value="0">Not set</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
        <option value="Both">Both</option>
    </select>
    <?php if($errors->first('gender')): ?>
    <span class="text-danger">
        <?php echo e($errors->first('gender')); ?>

    </span>
    <?php endif; ?>
</div>
<div class="form-group">
    <label for="type">Type</label>
    <select name="type" id="type" class="form-control">
        <option value="0">Not set</option>
        <option value="Full Time">Full Time</option>
        <option value="Part Time">Part Time</option>

    </select>
    <?php if($errors->first('type')): ?>
    <span class="text-danger">
        <?php echo e($errors->first('type')); ?>

    </span>
    <?php endif; ?>
</div>
<div class="form-group">
    <label for="salary">Payment</label>
    <select name="salary" id="salary" class="form-control">
        <option value="0">Not set</option>
        <option value="Paid">Paid</option>
        <option value="Un Paid">Un Paid</option>
    </select>
    <?php if($errors->first('salary')): ?>
    <span class="text-danger">
        <?php echo e($errors->first('salary')); ?>

    </span>
    <?php endif; ?>
</div>
<div class="form-group">
    <label for="application_deadline">Application Deadline</label>
    <input type="date" name="application_deadline" id="application_deadline" class="form-control">
    <?php if($errors->first('application_deadline')): ?>
    <span class=" text-danger">
        <?php echo e($errors->first('application_deadline')); ?>

    </span>
    <?php endif; ?>
</div>
<div class="form-group">
    <label for="desc">Internship Description</label>
    <textarea name="desc" id="desc" cols="30" rows="4" class="form-control">
    
    </textarea>
    <?php if($errors->first('desc')): ?>
    <span class="text-danger">
        <?php echo e($errors->first('desc')); ?>

    </span>
    <?php endif; ?>
</div>
<div class="form-group">
    <label for="location">Location</label>
    <input type="text" name="location" id="location" class="form-control">
    <?php if($errors->first('location')): ?>
    <span class=" text-danger">
        <?php echo e($errors->first('location')); ?>

    </span>
    <?php endif; ?>
</div>
<div class="form-group">
    <label for="location_url">Location URL</label>
    <input type="text" name="location_url" id="location_url" class="form-control">
    <?php if($errors->first('location_url')): ?>
    <span class=" text-danger">
        <?php echo e($errors->first('location_url')); ?>

    </span>
    <?php endif; ?>
</div>
<div class="form-group">
    <label for="vacancy">Vacancies Availble</label>
    <input type="number" name="vacancy" id="vacancy" class="form-control">
    <?php if($errors->first('vacancy')): ?>
    <span class=" text-danger">
        <?php echo e($errors->first('vacancy')); ?>

    </span>
    <?php endif; ?>
</div>
<div class="row">
    <div class="col">
        <label>Internship Requirements
            <?php if($errors->first('reqs')): ?>
            <span class="text-danger">
                <?php echo e($errors->first('reqs')); ?>

            </span>
            <?php endif; ?>

        </label>

        <button type="button" onclick="addNewReq()" class="btn btn-info">Add Requirement</button>
    </div>
    <table class="table mt-3">

        <tbody id="products-list">

            <?php if(old('reqs')): ?>
            <?php $__currentLoopData = old('reqs'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rowId => $rowProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr id="product-${rowId}">
                <td>
                    <input type="text" name="reqs[${rowId}]" row-id="product-${rowId}" class="form-control input-product-quantity">
                </td>

                <td>
                    <button id="product-${rowId}" type="button" class="btn btn-danger row-delete" row-id="product-${rowId}">-</button>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
            
            <?php endif; ?>

        </tbody>

    </table>
</div>
<div class="row">
    <div class="col">
        <label>Related Departments
            <?php if($errors->first('deps')): ?>
            <span class="text-danger">
                <?php echo e($errors->first('deps')); ?>

            </span>
            <?php endif; ?>

        </label>

        <button type="button" onclick="addNewTagRow()" class="btn btn-info">Add Department</button>
    </div>
    <table class="table mt-3">

        <tbody id="deps-list">

            <?php if(old('deps')): ?>
            <?php $__currentLoopData = old('deps'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rowId => $rowProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr id="product-${rowId}">

                <td>
                    <select name="products[<?php echo e($rowId); ?>]" class="form-control input-product-product_id" row-id="product-<?php echo e($rowId); ?>">
                        <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dep): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($dep->id); ?>">
                            <?php echo e($dep->department_name); ?>

                        </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>

                    <?php if($errors->first('products.' . $rowId )): ?>
                    <span class="text-danger">
                        <?php echo e($errors->first('products.' . $rowId )); ?>

                    </span>
                    <?php endif; ?>
                </td>

                <td>
                    <button id="product-${rowId}" type="button" class="btn btn-danger row-delete" row-id="product-${rowId}">-</button>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
            <tr id="product-1">
                
            </tr>
            <?php endif; ?>

        </tbody>

    </table>
</div>

<div class="text-center">
    <button type="submit" class="btn btn-success"><?php echo e(isset($companyInternshipPost)? "Save" : "Submit"); ?></button>
</div>
<?php /**PATH E:\graduation\AAST-TRAINERY-BE\AAST-TRAINERY-BE\resources\views/admin/compnayPost/form.blade.php ENDPATH**/ ?>