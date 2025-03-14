<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KICTFix</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        .left-column {
            background-color: #051744;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2rem;
        }

        .left-column img {
            max-width: 100%;
            height: auto;
        }

        .right-column {
            background-color: white;
            padding: 2rem;
        }
    </style>
</head>
<body class="bg-light">
    <section class="vh-100 d-flex">
        <div class="container my-auto">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10">
                    <div class="card border-0 rounded-4 overflow-hidden">
                        <div class="row g-0">
                            <div class="col-md-5 left-column">
                                <div class="text-center">
                                    <img src="/KICTFix.png" alt="Logo">
                                </div>
                            </div>
                            <div class="col-md-7 right-column">
                                <div class="card-body p-4">
                                    <div class="row">
                                        <div class="col-12">
                                            <?php if(Session::has('success')): ?>
                                                <div class="alert alert-success"><?php echo e(Session::get('success')); ?></div>
                                            <?php endif; ?>

                                            <?php if(Session::has('error')): ?>
                                                <div class="alert alert-danger"><?php echo e(Session::get('error')); ?></div>
                                            <?php endif; ?>

                                            <div class="mb-5">
                                                <h4 class="text-center">Login Here</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <form action="<?php echo e(route('admin.authenticate')); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <div class="row gy-3 overflow-hidden">
                                            <div class="col-12">
                                                <div class="form-floating mb-3">
                                                    <input type="text" value="<?php echo e(old('email')); ?>" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" id="email" placeholder="name@example.com" required>
                                                    <label for="email" class="form-label">Email</label>
                                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <p class="invalid-feedback"><?php echo e($message); ?></p>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-floating mb-3">
                                                    <input type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" id="password" placeholder="Password" required>
                                                    <label for="password" class="form-label">Password</label>
                                                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <p class="invalid-feedback"><?php echo e($message); ?></p>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button class="btn bsb-btn-xl btn-primary py-3" type="submit">Log in now</button>
                                                </div>
                                            </div>
                                        </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- .row -->
                    </div> <!-- .card -->
                </div> <!-- .col-12 -->
            </div> <!-- .row -->
        </div> <!-- .container -->
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
<?php /**PATH C:\fypproject\kictfix-main\resources\views/admin/login.blade.php ENDPATH**/ ?>