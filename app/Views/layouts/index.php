<!DOCTYPE html>
<html lang="en">

<head>

    <?php

    use \App\Models\ConfigModel;

    $this->configModel = new ConfigModel();
    $config = $this->configModel->get();

    $navigasi = getNavigasi();
    $user = getUser();
    $request = \Config\Services::request();
    $url = $request->uri->getSegment(1);
    $url2 = $request->uri->getSegment(2);
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
    <link href="/assets/plugins/quill/quill.snow.css" rel="stylesheet">
    <link href="/assets/plugins/quill/quill.bubble.css" rel="stylesheet">
    <link href="/assets/plugins/remixicon/remixicon.css" rel="stylesheet">
    <link href="/assets/plugins/datatables-bs5/dataTables.bootstrap5.min.css" rel="stylesheet">
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

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center">
                <img src="/assets/img/<?= $config['logo']; ?>" alt="">
                <span class="d-none d-lg-block"><?= $config['appname']; ?></span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <img src="/assets/img/<?= $user['foto'] ? $user['foto'] : 'noprofil.png'; ?>" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2"><?= $user['nama']; ?></span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6><?= $user['nama']; ?></h6>
                            <span><?= $user['profil']; ?></span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="/dashboard/profil">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="/dashboard/changeprofil">
                                <i class="bi bi-gear"></i>
                                <span>Change Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="/dashboard/changepassword">
                                <i class="bi bi-question-circle"></i>
                                <span>Change Password</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header>
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <?php foreach ($navigasi as $row) : ?>
                <li class="nav-item">
                    <a class="nav-link  <?= $url == $row['url'] ? '' : 'collapsed'; ?>" href="/<?= $row['url']; ?>">
                        <i class="<?= $row['icon']; ?>"></i>
                        <span><?= $row['navigasi']; ?></span>
                    </a>
                </li>
            <?php endforeach ?>


        </ul>

    </aside>
    <!-- End Sidebar-->

    <!-- #main -->
    <main id="main" class="main mb-5">

        <!-- Page Title -->
        <div class="pagetitle card p-4">
            <h1><?= $title; ?></h1>
        </div>
        <!-- End Page Title -->

        <section class="section">
            <div class="<?= $url != 'dashboard' || $url2 != '' ? 'card p-4' : ''; ?>">
                <?= $this->renderSection('content'); ?>
            </div>
        </section>

    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer bg-white fixed-bottom">
        <div class="copyright">
            <?= $config['copyright']; ?>
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </footer>
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <?= $this->renderSection('modal'); ?>

    <!-- modal logout -->
    <div class="modal fade" id="logoutModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Logout</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Anda yakin ingin logout dari sistem</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <a type="button" class="btn btn-primary" href="/login/logout">Yes</a>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal logout -->

    <script src="/assets/plugins/jquery/jquery-3.6.1.min.js"></script>
    <!-- plugins JS Files -->
    <script src="/assets/plugins/apexcharts/apexcharts.min.js"></script>
    <script src="/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/plugins/chart.js/chart.min.js"></script>
    <script src="/assets/plugins/echarts/echarts.min.js"></script>
    <script src="/assets/plugins/quill/quill.min.js"></script>

    <script src="/assets/plugins/datatables-bs5/jquery.dataTables.min.js"></script>
    <script src="/assets/plugins/datatables-bs5/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>

    <script src="/assets/plugins/tinymce/tinymce.min.js"></script>
    <script src="/assets/plugins/php-email-form/validate.js"></script>
    <script src="/assets/plugins/sweetalert2/sweetalert2.min.js"></script>

    <!-- Template Main JS File -->
    <script src="/assets/js/main.js"></script>
    <script src="/assets/js/script.js"></script>

    <?= $this->renderSection('script'); ?>

</body>

</html>