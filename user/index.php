<?php
require_once('../classes/User.php');
if (isset($_GET['msg'])) :
    $msg = $_GET['msg'];
endif;
$fcf = new User();
$user_data = $fcf->get_user_data($_SESSION['id'], $_SESSION['role']);
$added_coach = $fcf->
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
<h4>Email : <?= $user_data['email']; ?></h4>
<?php if (!$user_data['is_profile_completed']) : ?>
    <h3><a href="profile.php">complete your profile</a></h3>
<?php else : ?>
    <div class="row mt-5">
        <?php $coach_list = $fcf->coach_suggestion($user_data);
            foreach ($coach_list as $list) : ?>
            <div class="col-sm-3">
                <div class="card border-secondary mb-3" style="max-width: 18rem;">
                    <div class="card-header"><?= $list['name'] ?></div>
                    <div class="card-body text-secondary">
                        <h6 class="card-title">Expertise : <?= $list['expertise'] ?></h6>
                        <p class="card-text"><?= substr($list['summary'], 0, 120) ?> ...</p>
                        <a href="view_coach_profile.php?id=<?= $list['user_id'] ?>"/>view profile</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
<?php include('common/footer.php') ?>