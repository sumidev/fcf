<?php
require_once('../classes/Coach.php');
$fcf = new Coach();
if (isset($_GET['msg'])) :
    $msg = $_GET['msg'];
endif;
// $added_coach = $fcf->
?>
<?php include('common/header.php') ?>
<?php include('common/preloader.php') ?>
<div id="wrapper">
    <?php include('common/top-navbar.php') ?>
    <?php include('common/left-navbar.php') ?>
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">Coach Dashboard</h4>
                </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href="#">Dashboard</a></li>
                        <li class="active">Coach Dashboard</li>
                    </ol>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <?php if (!$coach_data['is_profile_completed']) : ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-danger">
                        <a href="profile.php" style="color:white">Complete your profile</a>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <?php include('common/right-navbar.php') ?>

        </div>
        <!-- /.container-fluid -->
        <footer class="footer text-center"> 2022 &copy; FCF Developed by Anshita </footer>
    </div>
    <!-- /#page-wrapper -->
</div>
<?php include('common/footer.php') ?>
