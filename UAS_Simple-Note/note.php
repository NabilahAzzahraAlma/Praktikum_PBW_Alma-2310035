<?php include 'proses-notes.php'; 
    if(!isset($_SESSION['login'])){
        header("Location: login.php?msg=" . urlencode("Silahkan login terlebih dahulu!"));
        exit;
    }else{
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>SiCatet</title>
        <!-- plugins:css -->
        <link rel="stylesheet" href="./public/vendors/feather/feather.css">
        <link rel="stylesheet" href="./public/vendors/mdi/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="./public/vendors/ti-icons/css/themify-icons.css">
        <link rel="stylesheet" href="./public/vendors/typicons/typicons.css">
        <link rel="stylesheet" href="./public/vendors/simple-line-icons/css/simple-line-icons.css">
        <link rel="stylesheet" href="./public/vendors/css/vendor.bundle.base.css">
        <!-- endinject -->
        <!-- inject:css -->
        <link rel="stylesheet" href="./public/css/vertical-layout-light/style.css">
        <!-- endinject -->
        <link rel="shortcut icon" href="./public/img/icon.png" />
        <!-- Style -->
        <style>
            .page-body-wrapper,
            .main-panel,
            .content-wrapper {
                width: 100% !important;
                margin: 0 !important;
            }

            .navbar .navbar-menu-wrapper {
                width: 100% !important;
                margin: 0 !important;
            }
        </style>

    </head>

    <body>
        <div class="container-scroller">
            <!-- partial:partials/_navbar.html -->
            <nav class="flex-row p-0 navbar default-layout col-lg-12 col-12 fixed-top d-flex align-items-top">
                <div class="navbar-menu-wrapper d-flex">
                    <ul class="navbar-nav">
                        <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
                            <h1 class="welcome-text text-black fw-bold">Selamat datang di SiCatet!</h1>
                            <h3 class="welcome-sub-text">Catatan digital, akses di mana saja</h3>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <form class="search-form" action="" method="GET">
                                <i class="icon-search"></i>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Cari Berdasarkan Judul" value="<?= htmlspecialchars($search_title ?? '') ?>" title="Search here">
                            </form>
                        </li>
                        <li>
                            <button type="submit" class="btn btn-primary ms-2 pt-2 pb-2">Cari</button>
                        </li>
                        <li>
                            <a href="note.php" class="btn btn-secondary ms-2 pt-2 pb-2">Reset</a>
                        </li>
                        <li class="nav-item dropdown d-none d-lg-block user-dropdown">
                            <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                                </svg></a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                                <a href="proses-logout.php" class="dropdown-item"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out</a>
                            </div>
                        </li>
                    </ul>
                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
                        <span class="mdi mdi-menu"></span>
                    </button>
                </div>
            </nav>
            <!-- partial -->
            <div class="container-fluid page-body-wrapper">
                <!-- partial:partials/_settings-panel.html -->
                <div class="theme-setting-wrapper">
                    <div id="settings-trigger"><i class="ti-settings"></i></div>
                    <div id="theme-settings" class="settings-panel">
                        <i class="settings-close ti-close"></i>
                        <p class="settings-heading">SIDEBAR SKINS</p>
                        <div class="sidebar-bg-options selected" id="sidebar-light-theme">
                            <div class="border img-ss rounded-circle bg-light me-3"></div>Light
                        </div>
                        <div class="sidebar-bg-options" id="sidebar-dark-theme">
                            <div class="border img-ss rounded-circle bg-dark me-3"></div>Dark
                        </div>
                        <p class="mt-2 settings-heading">HEADER SKINS</p>
                        <div class="px-4 mx-0 color-tiles">
                            <div class="tiles success"></div>
                            <div class="tiles warning"></div>
                            <div class="tiles danger"></div>
                            <div class="tiles info"></div>
                            <div class="tiles dark"></div>
                            <div class="tiles default"></div>
                        </div>
                    </div>
                </div>
                <div class="main-panel">
                    <div class="content-wrapper">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="home-tab">
                                    <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                                        <div>
                                            <div class="btn-wrapper">
                                                <a href="add-note.php" class="text-white btn btn-primary me-0"><i class="icon-download"></i> Tambah Catatan</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-content tab-content-basic">
                                        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3">
                                                    <?php foreach ($notes as $note) : ?>
                                                        <div class="col">
                                                            <div class="card bg-primary card-rounded" style="min-height: 180px;">
                                                                <div class="card-body d-flex flex-column justify-content-between h-100">
                                                                    <div>
                                                                        <h4 class="text-white mb-1"><?= htmlspecialchars($note['note_title']) ?></h4>
                                                                        <p class="text-white-50 mb-2"><?= htmlspecialchars($note['note_tagxx']) ?></p>
                                                                    </div>
                                                                    <div class="d-flex justify-content-between align-items-center">
                                                                        <h5 class="text-info mb-0"><?= htmlspecialchars($note['note_times']) ?></h5>
                                                                        <a href="detail-note.php?id=<?= htmlspecialchars($note['note_idxxx']) ?>" class="btn btn-sm btn-light text-primary">Views</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- content-wrapper ends -->
                    <!-- partial:partials/_footer.html -->
                    <footer class="footer">
                        <div class="d-sm-flex justify-content-center justify-content-sm-between">
                            <span class="text-center text-muted text-sm-left d-block d-sm-inline-block">Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash.</span>
                            <span class="float-none mt-1 text-center float-sm-right d-block mt-sm-0">Copyright © 2021. All rights reserved.</span>
                        </div>
                    </footer>
                    <!-- partial -->
                </div>
                <!-- main-panel ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->

        <!-- plugins:js -->
        <script src="./public/vendors/js/vendor.bundle.base.js"></script>
        <!-- endinject -->
        <!-- Plugin js for this page -->
        <script src="./public/vendors/chart.js/Chart.min.js"></script>
        <script src="./public/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
        <script src="./public/vendors/progressbar.js/progressbar.min.js"></script>

        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script src="./public/js/off-canvas.js"></script>
        <script src="./public/js/hoverable-collapse.js"></script>
        <script src="./public/js/template.js"></script>
        <script src="./public/js/settings.js"></script>
        <script src="./public/js/todolist.js"></script>
        <!-- endinject -->
        <!-- Custom js for this page-->
        <script src="./public/js/jquery.cookie.js" type="text/javascript"></script>
        <script src="./public/js/dashboard.js"></script>
        <script src="./public/js/Chart.roundedBarCharts.js"></script>
        <!-- End custom js for this page-->
</body>
</html>
<?php
    }
?>