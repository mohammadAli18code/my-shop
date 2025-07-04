<!DOCTYPE html>
<html lang="en">

<head>
    <title>ورود</title>
    <?php require_once(BASE_PATH . '/views/auth/layouts/head-tag.php') ?>
</head>


<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="<?= asset('public/auth/assets/images/img-01.png') ?>" alt="IMG">
                </div>

                <form method="post" action="<?= url('check-admin') ?>" class="login100-form validate-form">
                    <span class="login100-form-title">
                        Admin Login
                    </span>

                    <?php
                    $message = flash('adminLogin_error');
                    if (!empty($message)) {
                        ?>

                        <div class="mb-2 alert alert-danger"> <small class="form-text text-danger">
                                <?= $message ?>
                            </small> </div>

                        <?php
                    } ?>

                    <div class="wrap-input100 validate-input" data-validate="code is required: 0-9">
                        <input class="input100" type="text" name="id" placeholder="admin code">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-key" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="email" placeholder="Email">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="password" placeholder="Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn">
                            Login
                        </button>
                    </div>

                    <div class="text-center p-t-12">
                        <span class="txt1">
                            Forgot
                        </span>
                        <a class="txt2" href="<?= asset('forgot') ?>">
                            Username / Password?
                        </a>
                    </div>

                    <div class="text-center p-t-136">
                        <a class="txt2" href="<?= url('login/customer') ?>">
                            login as user
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a><br>
                        <a class="txt2" href="<?= url('register') ?>">
                            Create your Account
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>




    <?php require_once(BASE_PATH . '/template/auth/layouts/scripts.php') ?>



</body>

</html>