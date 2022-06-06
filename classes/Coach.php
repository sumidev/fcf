<?php
require_once 'Fcf.php';

class Coach extends Fcf{

    function __construct(){
        parent::__construct();
        if($_SESSION['role'] !== '2'){
            header("Location: /fcf/pages/login.php");
        }
    }

    function set_profile($request){
        // echo "<pre>";
        // print_r($request);
        // print_r($_FILES);
        // die();
        $profile_pic = $this->set_profile_pic($_FILES['photo']);
        $certificate = $this->upload_certificate($_FILES['certificate']);
        if($profile_pic && $certificate):
            $sql = "insert into coach_profile (user_id,profile_pic,age,gender,expertise,summary,experience,certificate) values ('" . $_SESSION['id'] . "','" . $profile_pic . "','" . $request['age'] . "','" . $request['gender'] . "','" . $request['expertise'] . "','" . $request['summary'] . "','" .$request['experience'].  "','".$certificate."')";
            if ($this->conn->query($sql) === TRUE) :
                $msg = $this->profile_completed($_SESSION['id']);
                header("Location: /fcf/coach/?msg=$msg");
            else :
                return "Something went wrong";
            endif;
        else:
            return "Uploaded File Error";
        endif;
    }


    function upload_certificate($request){
        $target_dir = "../uploads/certificates/";
        $target_file = $target_dir .time().basename($request["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        if($request["size"] > 1000000){
            $uploadOk = 0;
        }
        if($imageFileType != "pdf") {
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

    /* check add requests */
    // function check_requests(){
    //     $sql = "select * from requests where coach_id = ".$_SESSION['id'];
    //     $result = $this->conn->query($sql);
    //     return $result->fetch_all(MYSQLI_ASSOC);
    // }

    function check_requests(){
        $data = array();
        $sql = "select users.*,user_profile.*,requests.created_at from user_profile JOIN users on  user_profile.user_id = users.id JOIN requests on users.id = requests.user_id where requests.coach_id='".$_SESSION['id']."'";
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

    function user_request($request){
        if($request['add']):
            $sql = "insert into orders (user_id,coach_id) values('" . $request['id'] . "','" . $_SESSION['id'] . "')";
            if ($this->conn->query($sql) != TRUE) :
                return "Something went wrong";
            endif;
        endif; 
        $sql = "delete from requests where user_id = '".$request['id']."' AND coach_id = '".$_SESSION['id']."'"; 
        if ($this->conn->query($sql) === TRUE) :
            header("Location: requests.php");
        endif;
    }

    function get_added_users(){
        $data = array();
        $sql = "select users.*,user_profile.*,orders.created_at from user_profile JOIN users on  user_profile.user_id = users.id JOIN orders on users.id = orders.user_id where orders.coach_id='".$_SESSION['id']."'";
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
?>