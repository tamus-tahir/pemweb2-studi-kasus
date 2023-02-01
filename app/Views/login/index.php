<!DOCTYPE html>
<html lang="en">

<head>
    <?php

    use \App\Models\ConfigModel;

    $this->configModel = new ConfigModel();
    $config = $this->configModel->get();
    ?>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?= $title; ?></title>
    <meta content="<?= $config['description']; ?>" name="description">
    <meta content="<?= $config['keywords']; ?>" name="keywords">
    <meta content="<?= $config['author']; ?>" name="author">

    <!-- Favicons -->
    <link href="/assets/img/<?= $config['logo']; ?>" rel="icon">
    <link href="/assets/img/<?= $config['logo']; ?>" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- plugins CSS Files -->
    <link href="/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/plugins/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/assets/plugins/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/assets/plugins/remixicon/remixicon.css" rel="stylesheet">

    <link href="/assets/plugins/sweetalert2/sweetalert2.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="/assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin - v2.4.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <div class="flash-success" data-flashdata="<?= session()->getFlashdata('success'); ?>"></div>
    <div class="flash-error" data-flashdata="<?= session()->getFlashdata('error'); ?>"></div>

    <main>
        <div class="container">

            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-4">
                                <a href="index.html" class="logo d-flex align-items-center w-auto">
                                    <img src="/assets/img/<?= $config['logo']; ?>" alt="">
                                    <span class="d-none d-lg-block"><?= $config['appname']; ?></span>
                                </a>
                            </div><!-- End Logo -->

                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                                        <p class="text-center small">Enter your username & password to login</p>
                                    </div>

                                    <form class="row g-3 needs-validation" novalidate action="/login/process" method="post">

                                        <div class="col-12">
                                            <label for="yourUsername" class="form-label">Username</label>
                                            <div class="input-group has-validation">
                                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                                <input type="text" name="username" class="form-control" id="yourUsername" required>
                                                <div class="invalid-feedback">Please enter your username.</div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourPassword" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control" id="yourPassword" required>
                                            <div class="invalid-feedback">Please enter your password!</div>
                                        </div>

                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit">Login</button>
                                        </div>
                                    </form>

                                </div>
                            </div>

                            <div class="credits"><?= $config['copyright']; ?></div>

                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <script src="/assets/plugins/jquery/jquery-3.6.1.min.js"></script>
    <!-- plugins JS Files -->
    <script src="/assets/plugins/apexcharts/apexcharts.min.js"></script>
    <script src="/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/plugins/tinymce/tinymce.min.js"></script>
    <script src="/assets/plugins/php-email-form/validate.js"></script>

    <script src="/assets/plugins/sweetalert2/sweetalert2.min.js"></script>

    <!-- Template Main JS File -->
    <script src="/assets/js/main.js"></script>
    <script src="/assets/js/script.js"></script>

</body>

</html>