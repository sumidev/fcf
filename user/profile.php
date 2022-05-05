<?php
require_once('../classes/User.php');
$fcf = new User();
if ($_SERVER["REQUEST_METHOD"] == "POST") :
    $msg = $fcf->set_profile($_POST);
endif;
?>
<?php include('common/header.php') ?>
<?php include('common/navbar.php') ?>
    <section>
        <div class="container">
            <div class="row justify-content-center mt-5">
                <div class="col-12 col-md-8 col-lg-8 col-xl-6">
                    <div class="row">
                        <div class="col text-center">
                            <h1>Complete Profile</h1>
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
                        <div class="form-group">
                            <label for="age"> Age : </label>
                            <select class="form-control" id="age" name="age">
                                <option selected disabled>Choose Age</option>
                                <?php for ($i = 10; $i < 70; $i++) : ?>
                                    <option value="<?= $i ?>"><?= $i ?></option>
                                <?php endfor ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="gender"> Gender : </label>
                            <select class="form-control" id="gender" name="gender">
                                <option selected disabled>Choose Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        <div class="row align-items-center mt-4">
                            <div class="col">
                                <input type="number" class="form-control" placeholder="weight" name="weight" minimum='0'>
                            </div>
                        </div>
                        <div class="row align-items-center mt-4">
                            <div class="col">
                                <input type="number" class="form-control" placeholder="height" name="height" minimum='0'>
                            </div>
                        </div>
                        <div class="row align-items-center mt-4">
                            <div class="col">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="requirements[]" id="inlineCheckbox1" value="cardio">
                                    <label class="form-check-label" for="inlineCheckbox1">Cardio</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="requirements[]" id="inlineCheckbox2" value="weight gain">
                                    <label class="form-check-label" for="inlineCheckbox2">Weight Gain</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="requirements[]" id="inlineCheckbox3" value="muscles tone">
                                    <label class="form-check-label" for="inlineCheckbox3">Muscles Tone</label>
                                </div>
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