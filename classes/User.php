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
        if ($this->conn->query($sql) === TRUE) :
            $msg = $this->profile_completed($_SESSION['id']);
            header("Location: /fcf/user/?msg=$msg");
        else :
            return "Something went wrong";
        endif;
    }

    function coach_suggestion($user){
        $data = array();
        $added_coach = "";
        if(isset($user['requirement'])){
            $req = implode("' OR coach_profile.expertise = '", json_decode($user['requirement']));
            $sql="select coach_id from orders where user_id='".$_SESSION['id']."'";
            $result = $this->conn->query($sql);
            if ($result->num_rows > 0) :
                while ($row = $result->fetch_assoc()) {
                    array_push($data, $row['coach_id']);
                }
                $added_coach = "AND coach_profile.user_id NOT IN (".implode(',',$data).")";
            endif;
        $sql = "select users.* , coach_profile.* from users INNER JOIN coach_profile on users.id = coach_profile.user_id  where (coach_profile.expertise = '$req') AND users.is_activated = '1' $added_coach";
        }else{
            $sql = "select users.* , coach_profile.* from users inner join coach_profile on users.id = coach_profile.user_id where users.is_activated = '1'";
        }
        unset($data);
        $data = array();
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

    function is_added_coach_check($id){
        $sql = "select * from orders where user_id = ".$_SESSION['id']." AND coach_id = '$id' ";
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

    // count coach cilent
    function cilent_count($id){
        $sql = "select count(coach_id) as count from orders where coach_id='$id'";
        $result = $this->conn->query($sql);
        $row = $result->fetch_assoc();
        return $row['count'];

    }

    function requests_sent(){
        $data = array();
        $sql = "select users.*,coach_profile.* from coach_profile JOIN users on  coach_profile.user_id = users.id JOIN requests on users.id = requests.coach_id where requests.user_id='".$_SESSION['id']."' AND requests.requestTo = 2 AND requests.requestFrom = 1";
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

    function get_added_coach(){
        $data = array();
        $sql = "select users.*,coach_profile.*,orders.created_at from coach_profile JOIN users on  coach_profile.user_id = users.id JOIN orders on users.id = orders.coach_id where orders.user_id='".$_SESSION['id']."'";
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

    function update_profile($request){
        $sql= "update users set name = '" . $request['name'] . "' where id = '" . $_SESSION['id'] . "'";
        if ($this->conn->query($sql) === TRUE) :
            $sql = "update user_profile set age = '" . $request['age'] . "',gender='" . $request['gender'] . "',weight='" . $request['weight'] . "',height='" . $request['height'] . "',requirement='" . json_encode($request['requirements']) . "' where user_id = '" . $_SESSION['id']. "'";
            if ($this->conn->query($sql) === TRUE) :
                return "Profile Updated Successfully";
            endif;
        endif;

        return "Something went wrong";

    }

    function check_requests(){
        $data = array();
        $sql = "select users.*,coach_profile.*,requests.created_at from coach_profile JOIN users on  coach_profile.user_id = users.id JOIN requests on users.id = requests.coach_id where requests.user_id='".$_SESSION['id']."'  AND requests.requestTo = 1 AND requests.requestFrom = 2";
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

    function coach_request($request){
        if($request['add']):
            $sql = "insert into orders (coach_id,user_id) values('" . $request['id'] . "','" . $_SESSION['id'] . "')";
            if ($this->conn->query($sql) != TRUE) :
                return "Something went wrong";
            endif;
        endif; 
        $sql = "delete from requests where coach_id = '".$request['id']."' AND user_id = '".$_SESSION['id']."'"; 
        if ($this->conn->query($sql) === TRUE) :
            header("Location: coach_requests.php");
        endif;
    }
}