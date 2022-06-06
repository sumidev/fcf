<?php
require_once 'Fcf.php';

class User extends Fcf{

    function __construct(){
        parent::__construct();
        if ($_SESSION['role'] !== '1') {
            header("Location: /fcf/pages/login.php");
        }
    }

    function set_profile($request){
        $profile_pic = $this->set_profile_pic($_FILES['photo']);
        $sql = "insert into user_profile (user_id,profile_pic,age,gender,weight,height,requirement) values ('" . $_SESSION['id'] . "','" . $profile_pic . "','" . $request['age'] . "','" . $request['gender'] . "','" . $request['weight'] . "','" . $request['height'] . "','" . json_encode($request['requirements']) . "')";
        echo $sql."<br>";
        if ($this->conn->query($sql) === TRUE) :
            $msg = $this->profile_completed($_SESSION['id']);
            header("Location: /fcf/user/?msg=$msg");
        else :
            return "Something went wrong";
        endif;
    }

    function coach_suggestion($user){
        $data = array();
        if(isset($user['requirement'])){
            $req = implode("' OR coach_profile.expertise = '", json_decode($user['requirement']));
        $sql = "select users.* , coach_profile.* from users INNER JOIN coach_profile on users.id = coach_profile.user_id LEFT JOIN orders on coach_profile.user_id = orders.coach_id where (coach_profile.expertise = '$req') AND users.is_activated = '1' AND (orders.coach_id is NULL OR orders.user_id is NULL)";
        echo $sql;
        }else{
            $sql = "select users.* , coach_profile.* from users inner join coach_profile on users.id = coach_profile.user_id where users.is_activated = '1'";
        }
        
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) :
            while ($row = $result->fetch_assoc()) {
                array_push($data, $row);
            }
        endif;
        return $data;
    }

    /* coach_check() check whether coach is already add or not */
    function coach_check($id){
        $sql = "select * from requests where user_id = ".$_SESSION['id']." AND coach_id = '$id' ";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            return 0;
        }else{
            return 1;
        }
    }

    function coach_add($request){
        $msg = false;
        if($request['add']){
            $sql = "insert into requests (user_id,coach_id,requestTo,requestFrom) values ('".$_SESSION['id']."','".$request['id']."','2','1')";
            $msg = "Request Sent";
        }else{
            $sql = "delete from requests where user_id = ".$_SESSION['id']." AND coach_id = ".$request['id'];
            $msg= "Coach Removed";
        }
        if($this->conn->query($sql) === TRUE) :
            header("Location: view_coach_profile.php?id=".$request['id']."");
        endif;
    }

    function requests_sent(){
        $data = array();
        $sql = "select users.*,coach_profile.* from coach_profile JOIN users on  coach_profile.user_id = users.id JOIN requests on users.id = requests.coach_id where requests.user_id='".$_SESSION['id']."'";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($data, $row);
            }
        }else{
            return 0;
        }
        return $data;
    }
}