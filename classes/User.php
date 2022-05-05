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
        $sql = "insert into user_profile (user_id,age,gender,weight,height,requirement) values ('" . $_SESSION['id'] . "','" . $request['age'] . "','" . $request['gender'] . "','" . $request['weight'] . "','" . $request['height'] . "','" . json_encode($request['requirements']) . "')";
        if ($this->conn->query($sql) === TRUE) :
            $msg = $this->profile_completed($_SESSION['id']);
            header("Location: /fcf/user/?msg=$msg");
        else :
            return "Something went wrong";
        endif;
    }

    function coach_suggestion($user){
        $data = array();
        $req = implode("' OR coach_profile.expertise = '", json_decode($user['requirement']));
        $sql = "select users.* , coach_profile.* from users left join coach_profile on users.id = coach_profile.user_id where (coach_profile.expertise = '$req') AND users.is_activated = '1'";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) :
            while ($row = $result->fetch_assoc()) {
                array_push($data, $row);
            }
        endif;
        return $data;
    }
}
