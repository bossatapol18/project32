<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<?php include('./include/css.php'); ?>
<?php include('./date.php'); ?>
<?php include('./include/head.php'); ?>
<?php include('../connection/connection.php'); ?>
<?php if(isset($_SESSION['user_login']) && !empty($_SESSION['user_login'])):?>
<body>
    <?php include('./include/header.php'); ?>

    <?php include('./include/sec.php'); ?>

    <main id="main">

        <section id="services " class="services font-mirt">
            <div class="container">
            <div class="pd-t">
            <?php
                if (!isset($_GET['page']) && empty($_GET['page'])) {
                    include('dashboard/index.php');
                } elseif (isset($_GET['page']) && $_GET['page'] == 'dash') {
                    include('dashboard/index.php');
                } elseif (isset($_GET['page']) && $_GET['page'] == 'report') {
                    include('report.php');
                } elseif (isset($_GET['page']) && $_GET['page'] == 'report_status1') {
                    include('report_status1.php');
                }elseif (isset($_GET['page']) && $_GET['page'] == 'report_list1') {
                include('report_list1.php');
                }elseif (isset($_GET['page']) && $_GET['page'] == 'report_date2') {
                include('report_date3.php');
                }elseif (isset($_GET['page']) && $_GET['page'] == 'report_number1') {
                include('report_number1.php');
                }elseif (isset($_GET['page']) && $_GET['page'] == 'report_agency1') {
                include('report_agency1.php');
                }elseif (isset($_GET['page']) && $_GET['page'] == 'logout') {
                include('../logout/index.php');
                }
                ?>
                                        </div>
    <?php include('./include/footer.php'); ?>

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <?php include('./include/script.php'); ?>

</body>

</html>
<script src="extend\jquery-3.6.0.min.js"></script>

<?php else : ?>
<?php include('../login/index.php') ?>
<?php endif; ?>