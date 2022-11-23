<?php //connect Database
define("servername", "sql12.freemysqlhosting.net");
define("username", "sql12577814");
define("password", "P8TnDH1sbH");
define("dbName", "sql12577814");

class dataConnection
{
    private $connectDB;
    public function __construct()
    {
        $conn = new mysqli(servername, username, password, dbName);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        } else {
            // echo "Connected successfully";
        }
        mysqli_query($conn, "set character set utf8");
        $this->connectDB = $conn;
        // echo gettype($this->connectDB);
    }
    public function ConnectDB()
    {
        return $this->connectDB;
    }
}