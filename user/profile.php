<?php
require_once('../classes/User.php');
$fcf = new User();
if ($_SERVER["REQUEST_METHOD"] == "POST") :
    $msg = $fcf->set_profile($_POST);
endif;
?>
<?php include('common/header.php') ?>
<?php 
if($user_data['is_profile_completed']):
    header("Location: index.php");
endif;
?>
<?php include('common/preloader.php') ?>
<div id="wrapper">
    <?php include('common/top-navbar.php') ?>
    <?php include('common/left-navbar.php') ?>
    <?php include('common/right-navbar.php') ?>
    <!-- Wizard CSS -->
    <link href="../assets/plugins/bower_components/register-steps/steps.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/plugins/bower_components/dropify/dist/css/dropify.min.css">
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <section id="wrapper" class="step-register">
                <div class="register-box">
                    <div class="">
                        <!-- multistep form -->
                        <form action="<?= $_SERVER['REQUEST_URI'] ?>" method="post" id="msform"
                            enctype="multipart/form-data">
                            <!-- progressbar -->
                            <ul id="eliteregister">
                                <li class="active">Profile picture</li>
                                <li>Personal Details</li>
                                <li>Requirements</li>
                            </ul>
                            <!-- fieldsets -->
                            <fieldset>
                                <h2 class="fs-title">Complete your profile</h2>
                                <h3 class="fs-subtitle">Add Profile picture</h3>

                                <div class="form-group">
                                    <input type="file" id="input-file-now-custom-1" class="dropify form-control"
                                        name="photo"
                                         />
                                </div>
                                <input type="button" name="next" class="next action-button" value="Next" />
                            </fieldset>
                            <fieldset>
                                <h2 class="fs-title">Personal Details</h2>
                                <div class="form-group">
                                    <select class="form-control" id="age" name="age">
                                        <option selected disabled>Choose Age</option>
                                        <?php for ($i = 15; $i < 61; $i++) : ?>
                                        <option value="<?= $i ?>"><?= $i ?></option>
                                        <?php endfor ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" id="gender" name="gender">
                                        <option selected disabled>Choose Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input id="tch3_22" type="number"  name="weight" placeholder="Weight in Kg"  minimum='0'>
                                </div>
                                <div class="form-group">
                                    <input id="tch3_22" type="number" name="height" placeholder="height in cm"  minimum='0'>
                                </div>
                                <input type="button" name="previous" class="previous action-button" value="Previous" />
                                <input type="button" name="next" class="next action-button" value="Next" />
                            </fieldset>
                            <fieldset>
                                <h2 class="fs-title">Requirements</h2>
                                <h3 class="fs-subtitle">Add your requirements</h3>
                                <div class="form-group">
                                    <div class="checkbox checkbox-primary">
                                        <input id="checkbox1" type="checkbox" name="requirements[]" value="cardio">
                                        <label for="checkbox1">Cardio</label>
                                    </div>
                                    <div class="checkbox checkbox-primary">
                                        <input id="checkbox2" type="checkbox" name="requirements[]" value="weight gain">
                                        <label for="checkbox2">Weight Gain</label>
                                    </div>
                                    <div class="checkbox checkbox-primary">
                                        <input id="checkbox3" type="checkbox" name="requirements[]"
                                            value="muscles tone">
                                        <label for="checkbox3">Muscles Tone</label>
                                    </div>
                                </div>
                                <input type="button" name="previous" class="previous action-button" value="Previous" />
                                <input type="submit" name="submit" class="submit action-button" value="Submit" />
                            </fieldset>
                        </form>
                        <div class="clear"></div>
                    </div>
                </div>
            </section>
        </div>
        <!-- /.container-fluid -->
        <footer class="footer text-center"> 2022 &copy; FCF Developed by Anshita </footer>
    </div>
    <!-- /#page-wrapper -->
</div>

<?php include('common/footer.php') ?>
<script src="../assets/plugins/bower_components/register-steps/register-init.js"></script>
<!-- jQuery file upload -->
<script src="../assets/plugins/bower_components/dropify/dist/js/dropify.min.js"></script>
<script>
$(document).ready(function() {
    // Basic
    $('.dropify').dropify();
    // Translated
    $('.dropify-fr').dropify({
        messages: {
            default: 'Glissez-déposez un fichier ici ou cliquez',
            replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
            remove: 'Supprimer',
            error: 'Désolé, le fichier trop volumineux'
        }
    });
    // Used events
    var drEvent = $('#input-file-events').dropify();
    drEvent.on('dropify.beforeClear', function(event, element) {
        return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
    });
    drEvent.on('dropify.afterClear', function(event, element) {
        alert('File deleted');
    });
    drEvent.on('dropify.errors', function(event, element) {
        console.log('Has Errors');
    });
    var drDestroy = $('#input-file-to-destroy').dropify();
    drDestroy = drDestroy.data('dropify')
    $('#toggleDropify').on('click', function(e) {
        e.preventDefault();
        if (drDestroy.isDropified()) {
            drDestroy.destroy();
        } else {
            drDestroy.init();
        }
    })
});
</script>
<!--Style Switcher -->