<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=0,">
    <title>KICTFix</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css">
</head>
<body class="bg-light">


     <!-- Include the header -->
     <main class="col-md-9 ms-sm-auto col-lg-10 px-md-3">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>

        <?php echo $__env->make('technician.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <!-- Include the sidebar -->
            <?php echo $__env->make('technician.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


                <!-- Content section -->
                <?php echo $__env->yieldContent('content'); ?>



                </div>
            </main>
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\fypproject\kictfix-main\resources\views/layouts/technician.blade.php ENDPATH**/ ?>