<?php
include('DbConnect.php');

class RegisterController extends DB_con
{
    public function usernameavailable($uname){
        $checkuser = mysqli_query($this->dbcon, "SELECT username FROM tbl_users 
        WHERE username ='$uname'");
        return $checkuser;
    }

    public function registration($fname,$uname, $uemail, $password,$urole){
        $reg = mysqli_query($this->dbcon, "INSERT INTO tbl_users(fullname, username, useremail, password ,urole) 
        VALUES('$fname', '$uname', '$uemail','$password','$urole')");
        return $reg;
    }   
}
?>