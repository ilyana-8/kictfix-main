<?php $__env->startSection('content'); ?>
<head>
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
</head>
<div class="container">
        <h1 class="h3 mb-4 text-gray-800"><?php echo e($title); ?></h1>
        <div class="col-md-12">
            <?php echo e(session('message')); ?>


    <div class="container-fluid">
    <table class="table">
        <thead>
            <tr class="table-header-row">
                <th style="width: 25%;">Reporting ID</th>
                <th style="width: 25%;">Report Date</th>
                <th style="width: 25%;">Status</th>
                <th style="width: 25%;">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($report->reporting_id); ?></td>
                <td><?php echo e($report->created_at->format('Y-m-d')); ?></td>
                <td>
                    <?php if($report->status === 'not process yet'): ?>
                        <span class="badge text-bg-primary"><?php echo e($report->status); ?></span>
                    <?php elseif($report->status === 'in progress'): ?>
                        <span class="badge text-bg-warning"><?php echo e($report->status); ?></span>
                    <?php elseif($report->status === 'not forwarded'): ?>
                        <span class="badge text-bg-danger"><?php echo e($report->status); ?></span>
                    <?php elseif($report->status === 'completed'): ?>
                        <span class="badge text-bg-success"><?php echo e($report->status); ?></span>
                    <?php endif; ?>
                </td>
                <td><a href="<?php echo e(route('account.reportDetail', ['id' => $report->id])); ?>" class="btn btn-link">View Detail</a></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\fypproject\kictfix-main\resources\views/reportHistory.blade.php ENDPATH**/ ?>