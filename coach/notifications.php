<?php 
    require_once('../classes/Coach.php');
    $fcf = new Coach();
    $notifications = $fcf->check_requests(); 
?>
<?php 
if($notifications):
foreach($notifications as $n): ?>
<a href="#">
    <div class="user-img"> <img src="<?= $n['profile_pic'] ?>" alt="user" class="img-circle"> <span
            class="profile-status online pull-right"></span>
    </div>
    <div class="mail-contnet">
        <h5><?= $n['name'] ?></h5> <span class="mail-desc">wants to connect with you</span> <span
            class="time"><?= date_format(date_create($n['created_at']),"d M h:i a") ?></span>
    </div>
</a>
<?php endforeach; 
endif;
?>
<a class="text-center">No Notification Found.</a>
