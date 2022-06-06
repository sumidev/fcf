<?php
require_once('../classes/User.php');
$fcf = new User();
$id = $_GET['id'];
if(isset($_GET['add']) && in_array($_GET['add'],array(0,1))){
    $fcf->coach_add(['id' => $id,'add' => $_GET['add']]);
}
$add = $fcf->coach_check($id);
$coach_data = $fcf->get_user_data($id,2);
?>
<?php include('common/header.php') ?>
<?php
    if(!$user_data['is_profile_completed']){
        header("Location: index.php");
    }
?>
<?php include('common/preloader.php') ?>
<div id="wrapper">
    <?php include('common/top-navbar.php') ?>
    <?php include('common/left-navbar.php') ?>

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">Coach Profile</h4>
                </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href="#">Dashboard</a></li>
                        <li class="active">Coach Profile</li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->

            <div class="row mb-4">
                    <div class="col-lg-2 col-sm-4 col-xs-12">
                        <a href="?id=<?= $id ?>&add=<?= $add ?>" class="fcbtn btn btn-danger btn-1b"><?= ($add == 1) ? 'Add Coach' : 'Remove Coach' ?></a>
                    </div>
            </div>

            <!-- .row -->
            <div class="row">
                <div class="col-md-4 col-xs-12">
                    <div class="white-box">
                        <div class="user-bg"> <img width="100%" alt="user" src="<?= $coach_data['profile_pic'] ?>">
                            <div class="overlay-box">
                                <div class="user-content">
                                    <a href="javascript:void(0)"><img src="<?= $coach_data['profile_pic'] ?>"
                                            class="thumb-lg img-circle" alt="img"></a>
                                    <h4 class="text-white"><?= $coach_data['name'] ?></h4>
                                    <h5 class="text-white"><?= $coach_data['email'] ?></h5>
                                </div>
                            </div>
                        </div>
                        <div class="user-btm-box">
                            <div class="col-md-4 col-sm-4 text-center">
                                <p class="text-purple">CLIENTS</i></p>
                                <h2>258</h2>
                            </div>
                            <div class="col-md-4 col-sm-4 text-center">
                                <p class="text-blue">EXP.</p>
                                <h2><?= $coach_data['experience'] ?> yr.</h2>
                            </div>
                            <div class="col-md-4 col-sm-4 text-center">
                                <p class="text-danger">REVIEWS</i></p>
                                <h2><?= ($coach_data['average_review'] == 0)?'N/A':$coach_data['average_review'].'/5'?>
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-xs-12">
                    <div class="white-box">
                        <ul class="nav customtab nav-tabs" role="tablist">
                            <li role="presentation" class="nav-item"><a href="#profile" class="nav-link active"
                                    aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="false"><span
                                        class="visible-xs"><i class="fa fa-user"></i></span> <span
                                        class="hidden-xs">Profile</span></a></li>
                        </ul>
                        <div class="tab-content ">
                            <div class="tab-pane active" id="profile">
                                <div class="row">
                                    <div class="col-md-3 col-xs-6 b-r"> <strong>Name</strong>
                                        <br>
                                        <p class="text-muted"><?= ucwords($coach_data['name']) ?></p>
                                    </div>
                                    <div class="col-md-3 col-xs-6 b-r"> <strong>Mobile</strong>
                                        <br>
                                        <p class="text-muted">(123) 456 7890</p>
                                    </div>
                                    <div class="col-md-3 col-xs-6 b-r"> <strong>Email</strong>
                                        <br>
                                        <p class="text-muted"><?= $coach_data['email'] ?></p>
                                    </div>
                                    <div class="col-md-3 col-xs-6"> <strong>Gender</strong>
                                        <br>
                                        <p class="text-muted"><?= ucwords($coach_data['gender']) ?></p>
                                    </div>
                                </div>
                                <hr>
                                <p class="m-t-30"><?= $coach_data['summary'] ?></p>
                                <h4 class="font-bold m-t-30">Expertise</h4>
                                <hr>
                                <h5><?= ucwords($coach_data['expertise']) ?><span class="pull-right">100%</span>
                                </h5>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80"
                                        aria-valuemin="0" aria-valuemax="100" style="width:100%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <?php include('common/right-navbar.php') ?>
        </div>
        <!-- /.container-fluid -->
        <footer class="footer text-center"> 2022 &copy; FCF Developed by Anshita </footer>
    </div>
    <!-- /#page-wrapper -->
</div>
<?php include('common/footer.php') ?>