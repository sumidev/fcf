<?php
require_once 'Fcf.php';

class Admin extends Fcf{

    function __construct(){
        parent::__construct();
        if($_SESSION['role'] !== '3'){
            header("Location: /fcf/pages/login.php");
        }
    }
    
    function set_profile(){
        
    }

    function get_all_users(){
        $data = array();
        $sql="Select * from users where role != 3 order by id DESC";
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

    function get_users(){
        $data = array();
        $sql="Select * from users where role != 3 AND role != 2 order by id DESC";
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

    function get_coaches(){
        $data = array();
        $sql="Select * from users where role != 3 AND role != 1 order by id DESC";
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

    function total_users_count(){
        $sql = "select count(id) as count from users where role != '3'";
        $result = $this->conn->query($sql);
        $row = $result->fetch_assoc();
        return $row['count'];
    }

    function coaches_count(){
        $sql = "select count(id) as count from users where role = '2'";
        $result = $this->conn->query($sql);
        $row = $result->fetch_assoc();
        return $row['count'];
    }

    function users_count(){
        $sql = "select count(id) as count from users where role = '1'";
        $result = $this->conn->query($sql);
        $row = $result->fetch_assoc();
        return $row['count'];
    }


    function update_user_profile($request){
        $sql= "update users set name = '" . $request['name'] . "' where id = '" . $request['id'] . "'";
        if ($this->conn->query($sql) === TRUE) :
            $sql = "update user_profile set age = '" . $request['age'] . "',gender='" . $request['gender'] . "',weight='" . $request['weight'] . "',height='" . $request['height'] . "',requirement='" . json_encode($request['requirements']) . "' where user_id = '" . $request['id']. "'";
            if ($this->conn->query($sql) === TRUE) :
                return "Profile Updated Successfully";
            endif;
        endif;
        return "Something went wrong";
    }

    function update_coach_profile($request){
        $sql= "update users set name = '" . $request['name'] . "' where id = '" . $request['id'] . "'";
        if ($this->conn->query($sql) === TRUE) :
            $sql = 'update coach_profile set age = "' . $request['age'] . '",gender="' . $request['gender'] . '",experience="' . $request['experience'] . '",summary="' . $request['summary'] .'" where user_id = "' . $request['id']. '"';
            if ($this->conn->query($sql) === TRUE) :
                return "Profile Updated Successfully";
            endif;
        endif;

        return "Something went wrong";
    }

    function delete_user($id,$role){
        $sql= "delete from users where id = '$id' ";
        if ($this->conn->query($sql) === TRUE) :
            if($role = '1'):
                $sql= "delete from user_profile where user_id = '$id' ";
            else:
                $sql= "delete from coache_profile where user_id = '$id' ";
            endif;
            if ($this->conn->query($sql) === TRUE) :
                return "User deleted Successfully";
            endif;
        endif;
        return "Something went wrong";
    }
}
?>