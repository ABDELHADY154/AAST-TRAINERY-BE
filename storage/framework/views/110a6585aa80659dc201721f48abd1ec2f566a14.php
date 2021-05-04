<?php $__env->startSection('title','Training Advisor'); ?>

<?php $__env->startSection('content'); ?>


<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Profile</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="<?php echo e(route('trainingAdvisor.index')); ?>">Training Advisor</a></li>
                    <li class="breadcrumb-item active"><?php echo e($advisor->advisor_name); ?></li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="<?php echo e(asset('storage/images/advisorsLogo/' . $advisor->advisor_image),); ?>" alt="User profile picture">
                        </div>
                        <h3 class="profile-username text-center"><?php echo e($advisor->advisor_name); ?></h3>
                        <p class="text-muted text-center"><?php echo e($advisor->advisor_title); ?></p>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <!-- About Me Box -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">About <?php echo e($advisor->advisor_name); ?></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <strong><i class="far fa-envelope"></i> Email</strong>
                        <p class="text-muted">
                            <a href="mailto:<?php echo e($advisor->advisor_email); ?>" target="_blank"><?php echo e($advisor->advisor_email); ?></a>
                        </p>

                        <hr>
                        <strong><i class="fas fa-university mr-1"></i> Department</strong>
                        <ul>
                            <li>
                                <p class="text-muted"><?php echo e($advisor->department->university->university_name); ?></p>
                            </li>
                            <li>
                                <p class="text-muted"><?php echo e($advisor->department->department_name); ?></p>
                            </li>
                        </ul>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Bio</a></li>
                            <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Internship Posts</a></li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="activity">
                                <!-- Post -->
                                <div class="post">

                                    <p>
                                        <?php echo e($advisor->advisor_bio); ?>

                                    </p>
                                </div>

                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="timeline">
                                <!-- The timeline -->
                                <div class="timeline timeline-inverse">
                                    <!-- timeline time label -->
                                    <?php $__currentLoopData = $advisor->internshipPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="time-label">
                                        <span class="bg-primary">
                                            <?php echo e($post->created_at); ?>

                                        </span>
                                    </div>

                                    <div>
                                        <i class="fas fa-envelope bg-primary"></i>

                                        <div class="timeline-item">

                                            <span class="time"><i class="far fa-clock"></i> <?php echo e($post->application_deadline); ?></span>
                                            <h3 class="timeline-header"><a href="#"><?php echo e($post->internship_title); ?></a></h3>
                                            <div class="timeline-body">
                                                <?php echo e($post->desc); ?>

                                            </div>
                                            <div class="timeline-footer">
                                                <?php $__currentLoopData = $post->studentInterests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $interests): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <a href="#" class="btn btn-danger btn-sm"><?php echo e($interests->interest); ?></a>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                            <hr>
                                            <div class="timeline-footer">
                                                <?php $__currentLoopData = $post->internDepartments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dep): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <a href="#" class="btn btn-primary btn-sm"><?php echo e($dep->department_name); ?></a>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
</section>




<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\graduation\AAST-TRAINERY-BE\AAST-TRAINERY-BE\resources\views/admin/advisor/show.blade.php ENDPATH**/ ?>