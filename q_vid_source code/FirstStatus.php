<?php
include_once('AbstractFirst.php');
class FirstStatus implements AbstractFirst
{
    public $id;
    public function __construct(){
        $conn = mysqli_connect('sql12.freemysqlhosting.net', 'sql12577814', 'P8TnDH1sbH', 'sql12577814');
        $this->dbcon = $conn;

        if (mysqli_connect_errno()) {
            echo "Failed to connect to mysql : " . mysql_connect_error();
        }else{
            // echo "success";
        }
    }

    public function getAmountFirst($id): string
    {
        $this->id = $id;
        $sql = "SELECT * FROM tbl_patients as p 
        INNER JOIN tbl_sorting AS s ON p.p_id=s.p_id 
        WHERE s_status=$this->id"; //$id = (1)เขียว (2)เหลือง (3)แดง
        $result = mysqli_query($this->dbcon,$sql);
        $count = mysqli_num_rows($result);
        return $count; 
        // return "The result of the product เขียว.";
    }
}

?>