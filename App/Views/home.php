<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-topbar="dark" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="enable">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle ?? 'Homepage', ENT_QUOTES, 'UTF-8') ?></title>
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/app.min.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/custom.min.css" rel="stylesheet" type="text/css">
</head>
<body>
    <!-- Include topbar -->
    <?php include __DIR__ . '/includes/topbar.php'; ?>
    
    <!-- Include sidebar -->
    <?php include __DIR__ . '/includes/sidebar.php'; ?>

    <!-- Main Content -->
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <!-- Include header -->
                <?php include __DIR__ . '/includes/header.php'; ?>

                <!-- Content goes here -->
                <div class="content-area">
                    <h1><?= htmlspecialchars($message ?? 'Welcome to Intelboard!', ENT_QUOTES, 'UTF-8') ?></h1>
                </div>
            </div>
        </div>

        <!-- Footer -->
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

<!-- Include footer -->
    <?php include __DIR__ . '/includes/footer.php'; ?>