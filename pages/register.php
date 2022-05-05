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
    <?php include('common/navbar.php') ?>
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 col-lg-8 col-xl-6">
                    <div class="row">
                        <div class="col text-center">
                            <h1>Register</h1>
                        </div>
                    </div>
                    <?php if (isset($msg)) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong><?= $msg ?></strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>
                    <form action="<?= $_SERVER['REQUEST_URI'] ?>" method="post">
                        <div class="row align-items-center">
                            <div class="col mt-4">
                                <input type="text" class="form-control" placeholder="Name" name="name">
                            </div>
                        </div>
                        <div class="row align-items-center mt-4">
                            <div class="col">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-inline" name="role" value="1">User
                                </label>
                            </div>
                            <div class="col">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-inline" name="role" value="2">Coach
                                </label>
                            </div>
                        </div>
                        <div class="row align-items-center mt-4">
                            <div class="col">
                                <input type="email" class="form-control" placeholder="Email" name="email">
                            </div>
                        </div>
                        <div class="row align-items-center mt-4">
                            <div class="col">
                                <input type="password" class="form-control" placeholder="Password" name="password">
                            </div>
                            <div class="col">
                                <input type="password" class="form-control" placeholder="Confirm Password" name="confirm_password">
                            </div>
                        </div>
                        <div class="row justify-content-start mt-4">
                            <div class="col">
                                <button class="btn btn-primary mt-4" type="submit">Register</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
<?php include('common/footer.php') ?>