<?php $__env->startSection('title','Company'); ?>


<?php $__env->startSection('css'); ?>




<?php $__env->stopSection(); ?>

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
                    <li class="breadcrumb-item active"><a href="<?php echo e(route('student.index')); ?>">Student</a></li>
                    <li class="breadcrumb-item active"><?php echo e($student->name); ?></li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="page-content">
            <div class="container">
                <div class="cover shadow-lg bg-white">
                    <div class="cover-bg p-3 p-lg-4 text-white">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                <div class="avatar hover-effect bg-white  p-1 border-none">
                                    <img src="<?php echo e(asset('storage/images/avatars/' . $student->image)); ?>" width="200" height="200" />
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-7 text-center text-md-start" style="color: #1E4274">
                                <h2 class="h1 mt-2" data-aos="fade-left" data-aos-delay="0">
                                    <?php echo e($student->name); ?>

                                </h2>
                                <p data-aos="fade-left" data-aos-delay="100">
                                    <?php echo e($student->studentDepartment->department_name); ?>

                                </p>
                                
                            </div>
                        </div>
                    </div>
                    <div class="about-section pt-4 px-3 px-lg-4 mt-1">
                        <div class="row">
                            <div class="col-md-6">
                                <h2 class="h3 mb-3">About</h2>
                                <div class="row mt-2 ml-2">
                                    <div class="col-sm-4">
                                        <div class="pb-1">Date Of Birth</div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="pb-1 text-secondary"><?php echo e($student->date_of_birth); ?></div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="pb-1">Email</div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="pb-1 text-secondary"><?php echo e($student->email); ?></div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="pb-1">Phone</div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="pb-1 text-secondary"><?php echo e($student->phone_number); ?></div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="pb-1">Address</div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="pb-1 text-secondary">
                                            <?php echo e($student->city); ?> ,<?php echo e($student->country); ?>

                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="pb-1">GPA</div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="pb-1 text-secondary">
                                            <?php echo e($student->gpa); ?>

                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="pb-1">period</div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="pb-1 text-secondary">
                                            <?php echo e($student->period); ?>

                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="col-md-5 offset-md-1">

                            </div>
                        </div>
                    </div>
                    <hr class="d-print-none" />
                    <div class="page-break"></div>
                    <div class="education-section px-3 px-lg-4 pb-4">
                        <h2 class="h3 mb-4">Education</h2>
                        <div class="timeline">
                            <?php $__currentLoopData = $student->studentEducations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $edu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="timeline-card timeline-card-success card shadow-sm">
                                <div class="card-body">
                                    <div class="h5 mb-1">
                                        <?php echo e($edu->school_name); ?>

                                        
                                    </div>
                                    <div class="text-muted text-small mb-2"><?php echo e($edu->from); ?> | <?php echo e($edu->from); ?></div>
                                    
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                        </div>
                    </div>
                    <hr class="d-print-none" />

                    <div class="work-experience-section px-3 px-lg-4">
                        <h2 class="h3 mb-4">Work Experience</h2>
                        <div class="timeline">
                            <?php $__currentLoopData = $student->studentExperience; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <div class="timeline-card timeline-card-primary card shadow-sm">
                                <div class="card-body">
                                    <div class="h5 mb-1">
                                        <?php echo e($exp->job_title); ?>

                                        <span class="text-muted h6">at <?php echo e($exp->company_name); ?> | <?php echo e($exp->experience_type); ?></span>
                                    </div>
                                    <div class="text-muted text-small mb-2">
                                        <?php echo e($exp->from); ?> - <?php echo e($exp->to); ?>

                                    </div>
                                    
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>
                    </div>
                    <hr class="d-print-none" />
                    <div class="skills-section px-3 px-lg-4">
                        <h2 class="h3 mb-3">Language</h2>
                        <div class="row">
                            <?php $__currentLoopData = $student->studentLanguages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-4">
                                <div class="mb-2">
                                    <span><?php echo e($lang->language); ?></span>
                                    <div class="progress my-1">
                                        <div class="progress-bar" role="progressbar" style="width: <?php echo e($lang->level*20); ?>%" aria-valuenow="<?php echo e($lang->level*20); ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>
                    </div>
                    



                </div>
            </div>
        </div>
</section>




<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\graduation\AAST-TRAINERY-BE\AAST-TRAINERY-BE\resources\views/admin/student/show.blade.php ENDPATH**/ ?>