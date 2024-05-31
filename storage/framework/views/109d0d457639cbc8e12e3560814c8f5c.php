<?php $__env->startSection('content'); ?>

 <!-- Dashboard content -->
 <div class="container">
    <div class="card border-0 shadow my-5">
        <div class="card-header bg-light">
            <h3 class="h5 pt-2">Welcome</h3>
        </div>
        <div class="card-body">
            You are logged in !
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>

<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.technician', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\fypproject\kictfix-main\resources\views/technician/dashboard.blade.php ENDPATH**/ ?>