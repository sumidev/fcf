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
            <div class="row">
                <div class="col-md-12">
                    <div class="white-box">
                        <h3 class="box-title">Suggested Clients</h3>
                        <div class="row">
                            <?php $user_list = $fcf->client_suggestion($coach_data);
                            foreach ($user_list as $list) : ?>
                            <div class="col-md-3 mb-5 mt-5">
                                <div class="card">
                                    <img class="card-img-top image-responsive" src="<?= $list['profile_pic'] ?>"
                                        alt="Card image cap" style="width: 100%;object-fit: contain;height:200px;object-position:top">
                                    <div class="card-block text-center">
                                        <h4 class="card-title"><?= ucfirst($list['name']) ?> - [<?= ucfirst($list['gender']) ?>]</h4>
                                        <h5 class="pt-3 pb-3">[<?= implode(', ',json_decode($list['requirement'])) ?>]</h5>
                                        <a href="view_user_profile.php?id=<?= $list['user_id'] ?>" class="btn btn-info">view profile</a>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>
            </div>
            <?php include('common/right-navbar.php') ?>

        </div>
        <!-- /.container-fluid -->
        <footer class="footer text-center"> 2022 &copy; FCF Developed by Anshita </footer>
    </div>
    <!-- /#page-wrapper -->
</div>
<?php include('common/footer.php') ?>
