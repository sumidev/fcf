<?php
require_once('../classes/Coach.php');
$fcf = new Coach();
if(isset($_GET['add']) && in_array($_GET['add'],array(0,1))){
   $fcf->user_request(['id' => $_GET['id'],'add' => $_GET['add']]);
}
$user_list = $fcf->check_requests();
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
                            <h4 class="page-title">Client's Requests</h4>
                        </div>
                        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                            <ol class="breadcrumb">
                                <li><a href="#">Dashboard</a></li>
                                <li class="active">Client's Requests</li>
                            </ol>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <?php if($user_list): ?>
                    <div class="white-box">
                        <h3 class="box-title">Client's Requests</h3>
                        <div class="row">
                            <?php foreach ($user_list as $list) : ?>
                            <div class="col-md-3 mb-5 mt-5">
                                <div class="card">
                                    <img class="card-img-top" src="<?= $list['profile_pic'] ?>" alt="Card image cap"
                                        style="width: 100%;object-fit: contain;height:200px;object-position:top">
                                    <div class="card-block">
                                        <h4 class="card-title"><?= ucfirst($list['name']) ?> -
                                            [<?= ucfirst($list['gender']) ?>]</h4>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                    <li class="list-group-item"> Requirements : [<?= ucwords(implode(', ',json_decode($list['requirement']))) ?>]</li>
                                        <li class="list-group-item">Age : <?= $list['age'] ?></li>
                                        <li class="list-group-item">Weight : <?= $list['weight'] ?> Kg</li>
                                        <li class="list-group-item">Height : <?= $list['height'] ?> cm</li>
                                    </ul>
                                    <div class="card-block">
                                        <a href="view_coach_profile.php?id=<?= $list['user_id'] ?>"
                                            class="btn btn-primary">view
                                            profile</a>
                                        <a href="?id=<?=$list['user_id']?>&add=1" class="btn btn-success">Accept</a>
                                        <a href="?id=<?=$list['user_id']?>&add=0" class="btn btn-danger">Reject</a>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>

                        </div>
                    </div>
                    <?php else : ?>
                    <div class="alert alert-primary mt-4">
                        <a style="color:white">No Sent Request !</a>
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