<?php $__env->startSection('content'); ?>
<!DOCTYPE html>
<html>
<head>
<!-- Begin Page Content -->
<div class="container-fluid">

     <!-- Page Heading -->
     <h1 class="h3 mb-4 text-gray-800"><?php echo e($title); ?></h1>

     <div class="row">
        <div class="col-md-6">
            <?php echo e(session('message')); ?>

         </div>
    </div>

     <div id="main-content">
        <div class="row">
            <div class="col-md-6">
                <div class="card shadow h-100 py-2">
                    <div class="card-body">

                          <!-- Profile photo -->
                          <img src="<?php echo e($user->profile_image ? asset($user->profile_image) : '/profile.png'); ?>" alt="Profile Photo" width="100" height="120" class="mx-auto d-block mb-3">

                             <div>
                                <p>Name: <?php echo e($user->name); ?></p>
                                <p>Matric ID: <?php echo e($user->matric_id); ?></p>
                                <p>Email: <?php echo e($user->email); ?></p>
                                <p>Phone Number: <?php echo e($user->phone_number); ?></p>
                            </div>
                       </div>
                  </div>
             </div>
         </div>
    </div>
</div>
</div>
<!-- /.container-fluid -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\fypproject\kictfix-main\resources\views/profile.blade.php ENDPATH**/ ?>