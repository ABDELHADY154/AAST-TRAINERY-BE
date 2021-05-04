<?php $__env->startSection('title', 'Create Company'); ?>

<?php $__env->startSection('content'); ?>

<?php $__env->startSection('js'); ?>
<script>
    var loadFile = function(event) {
        var output = document.getElementById('output');
        var imgInput = document.getElementById('customFile');
        var label = document.getElementById('labelIMG');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src)
        }
        label.innerHTML = imgInput.value;

    };

</script>
<?php $__env->stopSection(); ?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6 d-flex">
                <h1 class="m-0 text-dark">Student</h1>

            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="<?php echo e(route('student.index')); ?>">Student</a></li>
                    <li class="breadcrumb-item active">Create Student</li>
                </ol>

            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="card card-body">
                <form action="<?php echo e(route('student.store')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo $__env->make('admin.student.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </form>

            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->


<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\graduation\AAST-TRAINERY-BE\AAST-TRAINERY-BE\resources\views/admin/student/create.blade.php ENDPATH**/ ?>