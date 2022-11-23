<?php
class LogoutController{
    public function logout(){
        session_start();
        session_destroy();
        header("location: signin.php");
    }
    
}
?>