<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?php echo e($title); ?></h1>

    <div class="card shadow mb-3">
        <div class="card-header">
            Report Information
        </div>
        <div class="card-body">
            <form action="<?php echo e(route('technician.updateStatus', ['id' => $report->id])); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="form-group mt-0">
                    <label for="reporting_id">Reporting ID</label>
                    <input class="form-control" type="text" id="reporting_id" name="reporting_id" value="<?php echo e($report->reporting_id); ?>" readonly>
                </div>

                <div class="form-group mt-2">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status">
                        <option value="" disabled selected>Please Select</option>
                        <option value="not process yet" <?php echo e($report->status === 'not process yet' ? 'selected' : ''); ?>>Not Process Yet</option>
                        <option value="in progress" <?php echo e($report->status === 'in progress' ? 'selected' : ''); ?>>In Progress</option>
                        <option value="completed" <?php echo e($report->status === 'completed' ? 'selected' : ''); ?>>Completed</option>
                    </select>
                    <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <small class="text-danger pl-3"><?php echo e($message); ?></small>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="form-group mt-2">
                    <label for="remark">Remark</label>
                    <textarea class="form-control" id="remark" name="remark" placeholder="Remark" rows="3"><?php echo e(old('remark')); ?></textarea>
                    <?php $__errorArgs = ['remark'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <small class="text-danger pl-3"><?php echo e($message); ?></small>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="form-group mt-3">
                    <label for="file">Attachment</label>
                    <input class="form-control-file" type="file" id="file" name="file" />
                    <?php $__errorArgs = ['file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="invalid-feedback">
                        <?php echo e($message); ?>

                    </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="d-flex justify-content-end mb-3">
                    <form action="<?php echo e(route('technician.updateStatus', ['id' => $report->id])); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="btn btn-info">Submit</button>
                    </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.technician', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\fypproject\kictfix-main\resources\views/technician/reportStatus.blade.php ENDPATH**/ ?>