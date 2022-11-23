<?php
    // define('DB_SERVER','localhost');
    // define('DB_USER','root');
    // define('DB_PASS','');
    // define('DB_NAME','oop');

    class DB_con {
        function __construct(){
            $conn = mysqli_connect('sql12.freemysqlhosting.net', 'sql12577814', 'P8TnDH1sbH', 'sql12577814');
            $this->dbcon = $conn;

            if (mysqli_connect_errno()) {
                echo "Failed to connect to mysql : " . mysql_connect_error();
            }else{
                echo "success";
            }
        }
        
    }

    
?>