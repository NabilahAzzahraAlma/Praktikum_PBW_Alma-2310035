<?php
    session_start();
    if(isset($_SESSION['login'])){
        header("Location: notes.php");
        exit;
    }else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SiCatet | Forgot Pass</title>
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
</head>

<body>
    <p>
        <?php if (isset($_GET['msg'])):
            echo "<script>
                alert('" . $_GET['msg'] . "');
                </script>";
        endif ?>
    </p>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                <img src="./public/img/icon.png" alt="logo">
                            </div>
                            <h4>Lupa Password?</h4>
                            <h6 class="fw-light">Don't worry! We got you covered.</h6>
                            <form class="pt-3" method="POST" action="proses-forgot.php">
                                <div class="form-group">
                                    <input type="text" name="username" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username" required>
                                </div>
                                <div class="form-group">
                                    <select name="question" id="question" class="form-control-lg form-select">
                                        <option value="" hidden disabled selected>Pilih Pertanyaan Keamanan</option>
                                        <?php include 'proses-quest.php';
                                        while ($row = $result->fetch_assoc()): ?>
                                            <option value="<?= $row['ques_idxxx'] ?>"><?= htmlspecialchars($row["ques_namex"]) ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="answer" class="form-control form-control-lg" id="answer" placeholder="Jawaban Pertanyaan Keamanan" required>
                                </div>
                                <div class="mt-3">
                                    <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">SUBMIT</button>
                                </div>
                                <?php if (!empty($error)): ?>
                                    <p style="color:red;"><?= htmlspecialchars($error) ?></p>
                                <?php endif; ?>
                                <div class="text-center mt-4 fw-light">
                                    Sudah punya akun? <a href="./login.php" class="text-primary">Login</a>
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
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../../vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="./public/js/off-canvas.js"></script>
    <script src="./public/js/hoverable-collapse.js"></script>
    <script src="./public/js/template.js"></script>
    <script src="./public/js/settings.js"></script>
    <script src="./public/js/todolist.js"></script>
    <!-- endinject -->
</body>
</html>
<?php
    }
?>