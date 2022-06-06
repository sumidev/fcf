<?php
require_once('../classes/fcf.php');
$fcf = new Fcf();
if ($_SERVER["REQUEST_METHOD"] == "POST") :
    if ($_POST['role'] == '1' || $_POST['role'] == '2') :
        $msg = $fcf->register($_POST);
    endif;
endif;
?>
<?php include('common/header.php') ?>
<?php include('common/preloader.php') ?>

<section id="wrapper" class="login-register">
    <div class="login-box">
        <div class="white-box">
            <a href="javascript:void(0)" class="text-center db"><img
                    src="../assets/plugins/images/eliteadmin-logo-dark.png" alt="Home"></a>
            <?php if (isset($msg)) : ?>
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><?= $msg ?>
            </div>
            <?php endif; ?>
            <form class="form-horizontal form-material" id="loginform" action="<?= $_SERVER['REQUEST_URI'] ?>"
                method="post">
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input type="text" class="form-control" placeholder="Name" name="name" required="required">
                    </div>
                </div>
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input type="email" class="form-control" placeholder="Email" name="email" required="required">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <div class="radio-list">
                            <label class="radio-inline">
                                <input type="radio" name="role" value="1" checked="checked">User</label>
                            <label class="radio-inline">
                                <input type="radio" name="role" value="2">Coach
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input type="password" class="form-control" placeholder="Password" name="password"
                            required="required">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input type="password" class="form-control" placeholder="Confirm password"
                            name="confirm_password" required="required">
                    </div>
                </div>
                <div class="form-group text-center m-t-20">
                    <div class="col-xs-12">
                        <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light"
                            type="submit">Sign Up</button>
                    </div>
                </div>
                <div class="form-group m-b-0">
                    <div class="col-sm-12 text-center">
                        <p>Don't have an account? <a href="login.php" class="text-primary m-l-5"><b>Log In</b></a>
                        </p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<?php include('common/footer.php') ?>