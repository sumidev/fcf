<?php
require_once('../classes/User.php');
$fcf = new User();
$coach_list = $fcf->requests_sent();
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
                            <h4 class="page-title">Sent Requests</h4>
                        </div>
                        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                            <ol class="breadcrumb">
                                <li><a href="#">Dashboard</a></li>
                                <li class="active">Sent Requests</li>
                            </ol>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <?php if($coach_list): ?>
                    <div class="white-box">
                        <h3 class="box-title">Sent Requests</h3>
                        <div class="row">
                            <?php foreach ($coach_list as $list) : ?>
                            <div class="col-md-3 mb-5 mt-5">
                                <div class="card">
                                    <img class="card-img-top" src="<?= $list['profile_pic'] ?>" alt="Card image cap"
                                        style="width: 100%;object-fit: contain;height:200px;object-position:top">
                                    <div class="card-block">
                                        <h4 class="card-title"><?= ucfirst($list['name']) ?> -
                                            [<?= ucfirst($list['expertise']) ?>]</h4>
                                        <p class="card-text"><?= substr($list['summary'], 0, 120) ?> ...</p>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Age : <?= $list['age'] ?></li>
                                        <li class="list-group-item">Gender : <?= ucfirst($list['gender']) ?></li>
                                        <li class="list-group-item">Exp : <?= $list['experience'] ?> </li>
                                    </ul>
                                    <div class="card-block">
                                        <a href="view_coach_profile.php?id=<?= $list['user_id'] ?>"
                                            class="btn btn-info">view
                                            profile</a>
                                        <a class="btn btn-success disabled">Request Sent</a>
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