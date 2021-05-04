<?php $__env->startSection('title','Company'); ?>

<?php $__env->startSection('content'); ?>


<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Internship Post</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="<?php echo e(route('companyInternshipPost.index')); ?>">Internship Posts</a></li>
                    <li class="breadcrumb-item active"><?php echo e($intern->internship_title); ?></li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>


<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card">

        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                    <div class="row">
                        <div class="col-12 col-sm-4">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">Total Accepted Students</span>
                                    <span class="info-box-number text-center text-muted mb-0"><?php echo e(count($intern->appliedStudents()->where('application_status','accepted')->get())); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">Total Applied Students</span>
                                    <span class="info-box-number text-center text-muted mb-0"><?php echo e($intern->appliedStudents()->count()); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">Total Rejected Students</span>
                                    <span class="info-box-number text-center text-muted mb-0"><?php echo e($intern->appliedStudents()->where('application_status','rejected')->count()); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <table class="table table-striped">
                            <thead class="">
                                <tr>
                                    <th scope="col">#ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php $__currentLoopData = $intern->appliedStudents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <th scope="row"><?php echo e($student->id); ?></th>
                                    <td><a href="<?php echo e(route('student.show',$student->id)); ?>"><?php echo e($student->name); ?></a></td>
                                    <td><?php echo e($student->email); ?></td>
                                    
                                    <td>
                                        <?php if($student->pivot->application_status == 'applied'): ?>
                                        <a href="<?php echo e(route('accept.student', ['s'=>$student->id,'p'=>$intern->id])); ?>" class="btn btn-success">Accept</a>
                                        <a href="<?php echo e(route('reject.student',['s'=>$student->id,'p'=>$intern->id])); ?>" class="btn btn-danger">Reject</a>
                                        <?php elseif($student->pivot->application_status == 'accepted'): ?>
                                        
                                        <a href="<?php echo e(route('student.achieved.intern',['s'=>$student->id,'p'=>$intern->id])); ?>" class="btn btn-warning">Accomplished</a>
                                        <a href="<?php echo e(route('reject.student',['s'=>$student->id,'p'=>$intern->id])); ?>" class="btn btn-danger">Reject</a>
                                        <?php elseif($student->pivot->application_status == 'rejected'): ?>
                                        <a href="<?php echo e(route('accept.student', ['s'=>$student->id,'p'=>$intern->id])); ?>" class="btn btn-success ">Accept</a>
                                        <a href="#" class="btn btn-danger disabled">Rejected</a>
                                        <?php elseif($student->pivot->application_status == 'achieved'): ?>
                                        <a href="#" class="btn btn-success disabled">Accomplished</a>
                                        <a href="<?php echo e(route('reject.student',['s'=>$student->id,'p'=>$intern->id])); ?>" class="btn btn-danger">Reject</a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                            </tbody>
                        </table>
                    </div>
                    
                    
                </div>
                <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                    <h3 class="text-primary"><?php echo e($intern->internship_title); ?></h3>
                    <p class="text-muted"><?php echo e($intern->desc); ?></p>
                    <br>
                    <div class="text-muted">
                        <p class="text-sm">Gender
                            <b class="d-block"><?php echo e($intern->gender); ?></b>
                        </p>
                        <p class="text-sm">Internship Type
                            <b class="d-block"><?php echo e($intern->type); ?></b>
                        </p>
                        <p class="text-sm">Internship Salary
                            <b class="d-block"><?php echo e($intern->salary); ?></b>
                        </p>
                        <p class="text-sm">Internship Application Deadline
                            <b class="d-block"><?php echo e($intern->application_deadline); ?></b>
                        </p>
                        <p class="text-sm">Published On
                            <b class="d-block"><?php echo e($intern->published_on); ?></b>
                        </p>
                        <p class="text-sm">Location
                            <b class="d-block"><?php echo e($intern->location); ?></b>
                        </p>
                        <?php if($intern->location_url !== null): ?>
                        <p class="text-sm">Location URL
                            <b class="d-block"><a href="<?php echo e($intern->location_url); ?>" target="_blank"><?php echo e($intern->location_url); ?></a></b>
                        </p>
                        <?php endif; ?>
                    </div>

                    <h5 class="mt-5 text-muted">Internship Related Departments</h5>
                    <ul class="list-group list-group-flush">
                        <?php $__currentLoopData = $intern->internDepartments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dep): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="list-group-item">
                            <?php echo e($dep->department_name); ?>

                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                    <h5 class="mt-5 text-muted">Internship Requirements</h5>
                    <ul class="list-group list-group-flush">
                        <?php $__currentLoopData = $intern->internshipReqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $req): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="list-group-item">
                            <?php echo e($req->req); ?>

                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                    
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</section>




<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\graduation\AAST-TRAINERY-BE\AAST-TRAINERY-BE\resources\views/admin/compnayPost/show.blade.php ENDPATH**/ ?>