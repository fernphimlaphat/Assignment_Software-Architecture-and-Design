<?php
include('DbConnect.php');

class SigninController extends DB_con
{
    public function signin($uname,$password){
        $signinquery = mysqli_query($this->dbcon, "SELECT id, fullname,urole FROM tbl_users 
        WHERE username = '$uname' AND password = '$password'");
        return $signinquery;
    }
}
?>