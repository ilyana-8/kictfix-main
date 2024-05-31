<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?php echo e($title); ?></h1>
    <div class="col-md-6">
        <?php echo e(session('message')); ?>

    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card shadow h-100 py-2">
                <div class="card-body">

                    <!-- Profile photo -->
                    <img src="<?php echo e(asset('storage/profiles/' . $user->profile_image)); ?>" alt="Profile Photo" width="100" height="100" class="mx-auto d-block mb-3">

                    <!-- Edit profile form -->
                    <form action="<?php echo e(route('technician.updateProfile')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>

                        <!-- Input fields for editing user information -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?php echo e($user->name); ?>">
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo e($user->email); ?>">
                        </div>

                        <div class="mb-3">
                            <label for="phone_number" class="form-label">Phone Number:</label>
                            <input type="text" class="form-control" id="phone_number" name="phone_number" value="<?php echo e($user->phone_number); ?>">
                        </div>

                        <!-- File input for changing profile image -->
                        <div class="mb-3">
                            <label for="profile_image" class="form-label">Profile Image:</label>
                            <input type="file" class="form-control" id="profile_image" name="profile_image">
                        </div>

                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.technician', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\fypproject\kictfix-main\resources\views/technician/editProfile.blade.php ENDPATH**/ ?>