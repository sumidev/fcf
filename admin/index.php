<?php 
require_once('../classes/Admin.php');
$fcf = new Admin();
    $admin_data = $fcf->get_user_data($_SESSION['id'],$_SESSION['role']); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>


<h2>Welcome to the Admin dashboard</h2>
<h4>Name : <?= $admin_data['name']; ?></h4>
<h4>Email : <?= $admin_data['email']; ?></h4>
<h3><a href="?logout=true">logout</a></h3>

    
</body>
</html>