<!DOCTYPE html>
<!-- <html lang="<?##= $lang->getLang(); ?>" data-layout="vertical" data-topbar="dark" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="enable"> -->
<html data-layout="vertical" data-topbar="dark" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none"
    data-preloader="enable">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($lang->get('login_title'), ENT_QUOTES, 'UTF-8') ?></title>
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/app.min.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/custom.min.css" rel="stylesheet" type="text/css">
</head>

<body>

    <div class="auth-page-wrapper pt-5">
        <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
            <div class="bg-overlay"></div>
            <div class="shape">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120">
                    <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
                </svg>
            </div>
        </div>

        <div class="auth-page-content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mt-4">
                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <h5 class="text-primary"><?= $lang->get('login_title') ?></h5>
                                    <p class="text-muted"><?= $lang->get('login_subtitle') ?? '' ?></p>
                                </div>

                                <?php if (session_status() === PHP_SESSION_NONE) {
    session_start();
}?>
                                <?php if (isset($_SESSION['error'])): ?>
                                <div class="alert alert-danger mt-3">
                                    <?= $lang->get($_SESSION['error']) ?>
                                    <?php unset($_SESSION['error']); ?>
                                </div>
                                <?php endif; ?>

                                <div class="p-2 mt-4">
                                    <form action="/login" method="POST">

                                        <div class="mb-3">
                                            <label for="email" class="form-label"><?= $lang->get('email') ?></label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                placeholder="<?= $lang->get('email') ?>" required autofocus>
                                        </div>

                                        <div class="mb-3">
                                            <div class="float-end">
                                                <a href="#"
                                                    class="text-muted"><?= $lang->get('forgot_password') ?? '' ?></a>
                                            </div>
                                            <label class="form-label"
                                                for="password-input"><?= $lang->get('password') ?></label>
                                            <div class="position-relative auth-pass-inputgroup mb-3">
                                                <input type="password" class="form-control pe-5 password-input"
                                                    placeholder="<?= $lang->get('password') ?>" id="password-input"
                                                    name="password" required>
                                                <button
                                                    class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                                                    type="button" id="password-addon">
                                                    <i class="ri-eye-fill align-middle"></i>
                                                </button>
                                            </div>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1"
                                                id="auth-remember-check" name="remember">
                                            <label class="form-check-label"
                                                for="auth-remember-check"><?= $lang->get('remember_me') ?? 'Remember me' ?></label>
                                        </div>

                                        <div class="mt-4">
                                            <button class="btn btn-success w-100"
                                                type="submit"><?= $lang->get('submit') ?></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 text-center">
                            <p class="mb-0"><?= $lang->get('no_account') ?? 'Don\'t have an account?' ?>
                                <a href="#"
                                    class="fw-semibold text-primary text-decoration-underline"><?= $lang->get('signup') ?? 'Signup' ?></a>
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">2024 -
                        <script>
                            document.write(new Date().getFullYear());
                        </script> © Intelboard.
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!-- JAVASCRIPT -->
    <script src="/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="/assets/libs/node-waves/waves.min.js"></script>
    <script src="/assets/libs/feather-icons/feather.min.js"></script>
    <script src="/assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="/assets/js/plugins.js"></script>
    <script src="/assets/libs/particles.js/particles.js"></script>
    <script src="/assets/js/pages/particles.app.js"></script>
    <script src="/assets/js/pages/password-addon.init.js"></script>
</body>

</html>
