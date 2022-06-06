<?php
require_once '../config/Connection.php';

class Fcf extends Connection{
    
    function __construct(){
        parent::__construct();
        session_start();
        if(isset($_GET['logout']) && $_GET['logout'] == "true"):
            $this->logout();
        endif;
    }

    function guest(){
        if(isset($_SESSION['role'])):
            if($_SESSION['role'] == '3'):
                header("Location: ../admin/");
            elseif($_SESSION['role'] == '2'):
                header("Location: ../coach/");
            else:
                header("Location: ../user/");
            endif;
        endif;
    }

    function login($request){
        $sql = "select id,role from users where email = '".$request['email']."' AND password = '".$request['password']."' AND is_activated = '1' ";
        $result = $this->conn->query($sql);
        if ($row = $result->fetch_assoc()):
            $_SESSION['name'] = $row['name'];
            $_SESSION['id'] =$row['id']; 
            $_SESSION['role']= $row['role'];
            if($row['role'] == '3'):
                header("Location: ../admin/");
            elseif($row['role'] == '2'):
                header("Location: ../coach/");
            else:
                header("Location: ../user/");
            endif;
        else :
           return "Something went wrong";
        endif;

    }

    function register($request){

        $sql = "insert into users (name,email,password,role) values ('".$request['name']."','".$request['email']."','".$request['password']."','".$request['role']."')";
        if($this->conn->query($sql) === TRUE) :
            $this->login(['email'=> $request['email'],'password' => $request['password']]);
        else :
           return "Something went wrong";
        endif;
    }

    function profile_completed($id){
        $sql = "update users set is_profile_completed = '1' where id = '$id'"; 
        if($this->conn->query($sql) === TRUE) :
            return "Profile successfully updated";
         else :
            return false;
         endif;
    }

    function logout(){
        session_destroy();
        header("Refresh:0");
    }

    function get_user_data($id,$role){
        if($role == '3'):
            $sql = "select users.* , admin_profile.* from users left join admin_profile on users.id = admin_profile.user_id where users.id = '$id'";
        elseif($role == '2'):
            $sql = "select users.* , coach_profile.* from users left join coach_profile on users.id = coach_profile.user_id where users.id = '$id'";
        else:
            $sql = "select users.* , user_profile.* from users left join user_profile on users.id = user_profile.user_id where users.id = '$id'";
        endif;
        $result = $this->conn->query($sql);
        return $result->fetch_assoc();
    }

    function set_profile_pic($request){
        $target_dir = "../uploads/profile_pics/";
        $target_file = $target_dir .time().basename($request["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        if($request["size"] > 1000000){
            $uploadOk = 0;
        }
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            $uploadOk = 0;
        }
        if ($uploadOk == 0) {
            return 0;
        } else {
            if (move_uploaded_file($request["tmp_name"], $target_file)) {
                return $target_file;
            } else {
                return 0;
            }
        }
    }

    function get_friends($request){

    }
}
?>