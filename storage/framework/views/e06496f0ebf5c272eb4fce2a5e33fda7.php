<?php $__env->startSection('content'); ?>
<div class="container">
    <h1 class="h3 mb-4 text-gray-800"><?php echo e($title); ?></h1>

    <div class="card shadow mb-3">
        <div class="card-header">
            Report Information
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group mt-0">
                        <label for="reporter_name">Reporter Name</label>
                        <input class="form-control" type="text" id="reporter_name" value="<?php echo e($report->user->name ?? 'N/A'); ?>" readonly>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group mt-0">
                        <label for="reporting_id">Reporting ID</label>
                        <input class="form-control" type="text" id="reporting_id" value="<?php echo e($report->reporting_id); ?>" readonly>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group mt-0">
                        <label for="report_date">Date</label>
                        <input class="form-control" type="text" id="report_date" value="<?php echo e($report->created_at->format('Y-m-d')); ?>" readonly>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mt-0">
                        <label for="report_title">Report Title</label>
                        <input class="form-control" type="text" id="report_title" value="<?php echo e($report->title); ?>" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mt-0">
                        <label for="report_type">Report Type</label>
                        <input class="form-control" type="text" id="report_type" value="<?php echo e($report->type); ?>" readonly>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="report_description">Report Description</label>
                <textarea class="form-control" id="report_description" rows="3" readonly><?php echo e($report->description); ?></textarea>
            </div>
            <div class="form-group mt-3">
                <label for="attachment">Attachment</label>
                <a href="<?php echo e(asset('storage/' . $report->attachment)); ?>" target="_blank" class="btn btn-primary">Download Attachment</a>
            </div>
            <div class="form-group mt-3">
                <label for="forward_to">Action</label>
                <a href="<?php echo e(route('technician.showUpdateStatusForm', ['id' => $report->id])); ?>" class="btn btn-info">Update</a>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-end mb-3">
        <a href="<?php echo e(route('technician.manageReport')); ?>" class="btn btn-primary">Exit</a>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.technician', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\fypproject\kictfix-main\resources\views/technician/reportDetail.blade.php ENDPATH**/ ?>