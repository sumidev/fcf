<?php
require_once('../classes/User.php');
$fcf = new User();
$coach_list = $fcf->get_added_coach();
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
                            <h4 class="page-title">Added Coaches</h4>
                        </div>
                        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                            <ol class="breadcrumb">
                                <li><a href="#">Dashboard</a></li>
                                <li class="active">Added Coaches</li>
                            </ol>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <?php if($coach_list): ?>
                    <!-- .row -->
                    <div class="row el-element-overlay m-b-40">
                        <?php foreach ($coach_list as $list) : ?>
                        <!-- /.usercard -->
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="white-box">
                                <div class="el-card-item">
                                    <div class="el-card-avatar el-overlay-1"> <img src="<?= $list['profile_pic'] ?>" />
                                    </div>
                                    <div class="el-card-content">
                                        <h3 class="box-title"><?= ucfirst($list['name']) ?> -
                                            [<?= ucfirst($list['gender']) ?>]</h3>
                                        <h5>Expertise :
                                            <?= ucwords($list['expertise']) ?></h5>
                                        <h5> Experience :
                                            <?= ucwords($list['experience']) ?> yr</h5>
                                        <br />
                                    </div>
                                    <div class="el-card-content">
                                        <a href="view_coach_profile.php?id=<?=$list['user_id']?>"
                                            class="btn btn-info">view profile</a>
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