<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-topbar="dark" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="enable">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle ?? 'Homepage', ENT_QUOTES, 'UTF-8') ?></title>
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="./assets/css/app.min.css" rel="stylesheet" type="text/css">
    <link href="./assets/css/custom.min.css" rel="stylesheet" type="text/css">
    <script src="./assets/js/pages/remix-icons-listing.js"></script>
</head>

<body>
    <!-- Include topbar -->
    <?php include __DIR__ . '/../includes/topbar.php'; ?>

    <!-- Include sidebar -->
    <?php include __DIR__ . '/../includes/sidebar.php'; ?>

    <!-- Main Content -->
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <!-- Include header -->
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Drivers</h4>
                    <div class="page-title-right text-end text-sm-start">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">
                                <!-- Buttons with Label -->
                                <button id="add-driver" type="button" class="btn btn-primary btn-label waves-effect waves-light"><i
                                        class="ri-add-line label-icon align-middle fs-16 me-2"></i> Add Driver</button>
                            </li>
                        </ol>
                    </div>
                </div>

                <!-- Content goes here -->
                <div class="content-area">
                    <h1><?= htmlspecialchars($message ?? 'Welcome to Intelboard!', ENT_QUOTES, 'UTF-8') ?></h1>

                    <!-- Add Driver Form -->
                    <form action="/addDriver" method="POST" class="mt-4">
                        <div class="mb-3">
                            <label for="full_name" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="full_name" name="full_name" required>
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" required>
                        </div>
                        <div class="mb-3">
                            <label for="driver_id" class="form-label">Driver ID</label>
                            <input type="text" class="form-control" id="driver_id" name="driver_id" required>
                        </div>
                                                <div class="mb-3">
                            <label for="nas" class="form-label">NAS</label>
                            <input type="text" class="form-control" id="nas" name="nas" required>
                        </div>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
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
    <?php include __DIR__ . '/../includes/footer.php'; ?>
</body>

</html>