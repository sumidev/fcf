<?php
require_once('../classes/Admin.php');
$fcf = new Admin();
if ($_SERVER["REQUEST_METHOD"] == "POST") :
    $msg = $fcf->update_user_profile($_POST);
endif;
$user_data = $fcf->get_user_data($_GET['id'],'1'); 
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
                    <h4 class="page-title">User Profile</h4>
                </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href="#">Dashboard</a></li>
                        <li class="active">User Profile</li>
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
                                        <input type="hidden" name="id" value="<?=$user_data['user_id']?>" ?>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Name</label>
                                                    <input type="text" id="name" class="form-control"
                                                        placeholder="Enter your name" name="name"
                                                        value="<?= $user_data['name'] ?>">
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Email</label>
                                                    <input type="email" id="email" class="form-control"
                                                        placeholder="Enter your name" value="<?= $user_data['email'] ?>"
                                                        readonly>
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
                                                            <?=($user_data['gender']=="male")?"selected":"" ?>>Male
                                                        </option>
                                                        <option value="female"
                                                            <?=($user_data['gender']=="female")?"selected":"" ?>>Female
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
                                                            <?=($user_data['age']==$i)?"selected":"" ?>><?= $i ?>
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
                                                    <label class="control-label">Height</label>
                                                    <input type="number" id="height" class="form-control"
                                                        placeholder="Height in cm" name="height"
                                                        value="<?= $user_data['height'] ?>" minimum="0">
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Weight</label>
                                                    <input type="number" id="weight" class="form-control"
                                                        placeholder="Weight in kg" name="weight"
                                                        value="<?= $user_data['weight'] ?>" minimum="0">
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Requirements</label>
                                                    <div class="checkbox checkbox-primary">
                                                        <input id="checkbox1" type="checkbox" name="requirements[]"
                                                            value="cardio"
                                                            <?= (strpos($user_data['requirement'], "cardio") !== FALSE)?"checked":"" ?>>
                                                        <label for="checkbox1">Cardio</label>
                                                    </div>
                                                    <div class="checkbox checkbox-primary">
                                                        <input id="checkbox2" type="checkbox" name="requirements[]"
                                                            value="weight gain"
                                                            <?= (strpos($user_data['requirement'], "weight gain") !== FALSE)?"checked":"" ?>>
                                                        <label for="checkbox2">Weight Gain</label>
                                                    </div>
                                                    <div class="checkbox checkbox-primary">
                                                        <input id="checkbox3" type="checkbox" name="requirements[]"
                                                            value="muscles tone"
                                                            <?= (strpos($user_data['requirement'], "muscles tone") !== FALSE)?"checked":"" ?>>
                                                        <label for="checkbox3">Muscles Tone</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/row-->
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