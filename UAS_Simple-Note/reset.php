<?php
    session_start();
    if(isset($_SESSION['login'])){
        header("Location: note.php");
        exit;
    }else if(isset($_SESSION['id'])){
        header("Location: login.php?msg=" . urlencode("Method invalid!"));
        exit;
    }
    else{
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SiCatet | Reset Password</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="./public/vendors/feather/feather.css">
    <link rel="stylesheet" href="./public/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="./public/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="./public/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="./public/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="./public/vendors/css/vendor.bundle.base.css">
    <!-- inject:css -->
    <link rel="stylesheet" href="./public/css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="./public/img/icon.png" />
</head> 
<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                <img src="./public/img/icon.png" alt="logo">
                            </div>
                            <h4>Reset Password</h4>
                            <h6 class="fw-light">Masukkan password baru Anda di bawah ini.</h6>

                            <?php if (isset($_GET['msg'])): ?>
                                <div class="alert alert-danger mt-2 mb-3">
                                    <?= htmlspecialchars($_GET['msg']) ?>
                                </div>
                            <?php endif; ?>

                            <form class="pt-3" method="POST" action="proses-reset.php">
                                <div class="form-group">
                                    <input type="password" name="pass" class="form-control form-control-lg" id="pass" placeholder="Password Baru" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="conf_pass" class="form-control form-control-lg" id="conf_pass" placeholder="Konfirmasi Password" required>
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                                        KONFIRMASI
                                    </button>
                                </div>
                                <div class="text-center mt-4 fw-light">
                                    Kembali ke halaman <a href="./login.php" class="text-primary">Login</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- plugins:js -->
    <script src="./public/vendors/js/vendor.bundle.base.js"></script>
    <!-- Plugin js for this page -->
    <script src="./public/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!-- inject:js -->
    <script src="./public/js/off-canvas.js"></script>
    <script src="./public/js/hoverable-collapse.js"></script>
    <script src="./public/js/template.js"></script>
    <script src="./public/js/settings.js"></script>
    <script src="./public/js/todolist.js"></script>
</body>
</html>
<?php
    }
    ?>