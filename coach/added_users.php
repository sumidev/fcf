<?php
require_once('../classes/Coach.php');
$fcf = new Coach();
$user_list = $fcf->get_added_users();

?>
<?php include('common/header.php') ?>

<?php include('common/preloader.php') ?>
<div id="wrapper">
    <?php include('common/top-navbar.php') ?>
    <?php include('common/left-navbar.php') ?>

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="row bg-title">
                        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                            <h4 class="page-title">Added Clients</h4>
                        </div>
                        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                            <ol class="breadcrumb">
                                <li><a href="#">Dashboard</a></li>
                                <li class="active">Added Clients</li>
                            </ol>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <?php if($user_list): ?>
                    <!-- .row -->
                    <div class="row el-element-overlay m-b-40">
                        <div class="col-md-12">
                        </div>
                        <?php foreach ($user_list as $list) : ?>
                        <!-- /.usercard -->
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="white-box">
                                <div class="el-card-item">
                                    <div class="el-card-avatar el-overlay-1"> <img src="<?= $list['profile_pic'] ?>" />
                                    </div>
                                    <div class="el-card-content">
                                        <h3 class="box-title"><?= ucfirst($list['name']) ?> -
                                            [<?= ucfirst($list['gender']) ?>]</h3> <small>Requirements :
                                            [<?= ucwords(implode(', ',json_decode($list['requirement']))) ?>]</small>
                                        <br />
                                    </div>
                                    <div class="el-card-content">
                                        <a href="view_coach_profile.php?id=42" class="btn btn-primary">view profile</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- /.usercard-->
                        <?php endforeach; ?>

                    </div>
                    <!-- /.row -->
                    <?php else : ?>
                    <div class="alert alert-primary mt-4">
                        <a style="color:white">No Client Added !</a>
                    </div>
                    <?php endif; ?>
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