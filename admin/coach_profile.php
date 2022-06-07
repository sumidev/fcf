<?php
require_once('../classes/Admin.php');
$fcf = new Admin();
if ($_SERVER["REQUEST_METHOD"] == "POST") :
    $msg = $fcf->update_coach_profile($_POST);
endif;

$coach_data = $fcf->get_user_data($_GET['id'],'2'); 
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
                    <h4 class="page-title">Coach Profile</h4>
                </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href="#">Dashboard</a></li>
                        <li class="active">Coach Profile</li>
                    </ol>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <?php if(isset($msg)): ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-primary alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <?= $msg ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <!--.row-->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">Profile Details</div>
                        <div class="panel-wrapper collapse in" aria-expanded="true">
                            <div class="panel-body">
                                <form action="<?= $_SERVER['REQUEST_URI'] ?>" method="post" id="msform"
                                    enctype="multipart/form-data">
                                    <div class="form-body">
                                        <div class="row">
                                        <input type="hidden" name="id" value="<?=$coach_data['user_id']?>" ?>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Name</label>
                                                    <input type="text" id="name" class="form-control"
                                                        placeholder="Enter your name" name="name"
                                                        value="<?= $coach_data['name'] ?>">
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Email</label>
                                                    <input type="email" id="email" class="form-control"
                                                        placeholder="Enter your name"
                                                        value="<?= $coach_data['email'] ?>" readonly>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Gender</label>
                                                    <select class="form-control" id="gender" name="gender">
                                                        <option selected disabled>Choose Age</option>
                                                        <option value="male"
                                                            <?=($coach_data['gender']=="male")?"selected":"" ?>>Male
                                                        </option>
                                                        <option value="female"
                                                            <?=($coach_data['gender']=="female")?"selected":"" ?>>Female
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Age</label>
                                                    <select class="form-control" id="age" name="age">
                                                        <option selected disabled>Choose Age</option>
                                                        <?php for ($i = 15; $i < 61; $i++) : ?>
                                                        <option value="<?= $i ?>"
                                                            <?=($coach_data['age']==$i)?"selected":"" ?>><?= $i ?>
                                                        </option>
                                                        <?php endfor ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Expertise</label>
                                                    <input type="text" id="expertise" class="form-control"
                                                        placeholder="Enter your name"
                                                        value="<?= $coach_data['expertise'] ?>" readonly>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Experience</label>
                                                    <select class="form-control" id="experience" name="experience">
                                                        <option selected disabled>Choose Experience</option>
                                                        <?php for ($i = 1; $i < 30; $i++) : ?>
                                                        <option value="<?= $i ?>"
                                                            <?=($coach_data['experience']==$i)?"selected":"" ?>>
                                                            <?= $i ?> yr
                                                        </option>
                                                        <?php endfor ?>
                                                        <option value="30"
                                                            <?=($coach_data['experience']==30)?"selected":"" ?>>30+ yr
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->

                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-md-12">Summary</label>
                                                    <textarea class="form-control" rows="5" name="summary"><?= $coach_data['summary'] ?></textarea>        
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-info"> <i class="fa fa-check"></i>
                                            Save</button>
                                        <button type="button" class="btn btn-default">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--./row-->

            <?php include('common/right-navbar.php') ?>

        </div>
        <!-- /.container-fluid -->
        <footer class="footer text-center"> 2022 &copy; FCF Developed by Anshita </footer>
    </div>
    <!-- /#page-wrapper -->
</div>
<?php include('common/footer.php') ?>