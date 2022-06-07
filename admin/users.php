<?php
require_once('../classes/Admin.php');
$fcf = new Admin();
if (isset($_GET['id']) && isset($_GET['role'])) :
    $msg = $fcf->delete_user($_GET['id'],$_GET['role']);
endif;
$users = $fcf->get_users();   
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
                    <h4 class="page-title">Users</h4>
                </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href="#">Dashboard</a></li>
                        <li class="active">Users</li>
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

            <!-- .row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="white-box">
                        <h3 class="box-title m-b-0">All Users</h3>
                        <p class="text-muted m-b-20">You can Edit/Delete the Users</p>
                        <div class="table-responsive">
                            <?php if($users) :?>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Profile</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($users as $u) : ?>
                                    <tr>
                                        <td><a href="javascript:void(0)"><?= $u['name'] ?></a></td>
                                        <td><?= $u['email'] ?></td>
                                        <td>
                                            <?php if($u['role'] == '1'): ?>
                                            <div class="label label-table label-primary">User</div>
                                            <?php else : ?>
                                            <div class="label label-table label-info">Coach</div>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if($u['is_profile_completed'] == '1'): ?>
                                            <div class="label label-table label-success">Completed</div>
                                            <?php else : ?>
                                            <div class="label label-table label-danger">Pending</div>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if($u['is_activated'] == '1'): ?>
                                            <div class="label label-table label-success">Active</div>
                                            <?php else : ?>
                                            <div class="label label-table label-danger">Disabled</div>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-nowrap">
                                            <a href="<?=($u['role'] == '1') ? 'user_profile.php?id='.$u['id'] : 'coach_profile.php?id='.$u['id'] ?>" data-toggle="tooltip" data-original-title="Edit"> <i
                                                    class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                            <a onclick="delete_user(<?=$u['id']?>,<?=$u['role']?>)" data-toggle="tooltip" data-original-title="Close"> <i
                                                    class="fa fa-close text-danger"></i> </a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->


            <?php include('common/right-navbar.php') ?>

        </div>
        <!-- /.container-fluid -->
        <footer class="footer text-center"> 2022 &copy; FCF Developed by Anshita </footer>
    </div>
    <!-- /#page-wrapper -->
</div>
<?php include('common/footer.php') ?>