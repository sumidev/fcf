<?php
require_once('../classes/User.php');
$id = $_GET['id'];
$fcf = new User();
$user_data = $fcf->get_user_data($id,2);
?>
<?php include('common/header.php') ?>
<?php include('common/navbar.php') ?>
<?php if (isset($msg)) : ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong><?= $msg ?></strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>
<h2>Welcome to the User dashboard</h2>
<h4>Name : <?= $user_data['name']; ?></h4>
<h5>Expertise : <?= $user_data['expertise']; ?></h5>
<h5>Experience : <?= $user_data['experience']; ?></h5>
<h5>age : <?= $user_data['age']; ?></h5>

<?php include('common/footer.php') ?>