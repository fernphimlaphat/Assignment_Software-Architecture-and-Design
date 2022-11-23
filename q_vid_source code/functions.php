<?php
 include_once("builder.php");
 ?>
 <?php
    define('DB_SERVER','sql12.freemysqlhosting.net');
    define('DB_USER','sql12577814');
    define('DB_PASS','P8TnDH1sbH');
    define('DB_NAME','sql12577814');

    class UpdateToFollowup {
        public function updated($p_level, $id) {
            $builder = new QueryBuilder(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
	        $result = $builder
                ->update('tbl_patients','p_level',$p_level)
                ->where('p_id',$id)
                ->fetch();
            // $result = mysqli_query($this->dbcon, "UPDATE tbl_patients SET 
            //     p_level = '$p_level'
            //     WHERE p_id = '$id'
            // ");
            return $result;
        }
    }

    class Fetchonehistory {
        public function fetchonehistory($id){
            $builder = new QueryBuilder(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
	        $result = $builder
            ->select('tbl_patients','p')
            ->innerJoin('tbl_sorting','s','p.p_id','s.p_id')
            ->innerJoin('tbl_status','st','s.s_status','st.s_status')
            ->where('p.p_id',$id)
            ->fetch();
            return $result;
            // $result = mysqli_query($this->dbcon, "SELECT * FROM tbl_patients
            // as p 
            // INNER JOIN tbl_sorting AS s ON p.s_id = s.s_id 
            // INNER JOIN tbl_level AS l ON p.p_level = l.l_id
            // WHERE p_id = '$id'
            // ");
        }
    }

    class Fetchonerecord {
        public function fetchonerecord($id){
            $builder = new QueryBuilder(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
	        $result = $builder
            ->select('tbl_patients','p')
            ->innerJoin('tbl_sorting','s','p.p_id','s.p_id')
            ->innerJoin('tbl_status','st','s.s_status','st.s_status')
            ->where('p.p_id',$id)
            ->fetch();
            // $result = mysqli_query($this->dbcon, "SELECT * FROM tbl_sorting as s 
            // INNER JOIN tbl_patients AS p ON s.p_id = p.p_id
            // INNER JOIN tbl_level AS l ON p.p_level = l.l_id
            // INNER JOIN tbl_status AS st ON s.s_status = st.s_status
            // WHERE p.p_id = '$id'
            // ");
            return $result;
        }
    }



    class Fetchhistory {
        public function fetchhistory() {
            $builder = new QueryBuilder(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
            $result = $builder
                ->select('tbl_patients','p')
                ->innerJoin('tbl_sorting','s','p.p_id','s.p_id')
                ->innerJoin('tbl_status','st','s.s_status','st.s_status')
                ->where('p_level','3')
                ->fetch();
            return $result;
            // $result = mysqli_query($this->dbcon, "SELECT * FROM tbl_sorting as s 
            // INNER JOIN tbl_patients AS p ON s.p_id = p.p_id
            // WHERE p_level='3'");
        }
    }
    
    class Allstatus{
        public function allstatus(){
        $builder = new QueryBuilder(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
	    $stmPrdType = $builder
            ->select('tbl_status','st')
            ->fetch();
        return($stmPrdType);
        }   
    }

    class Allmembers{
    public function allmember(){
        $builder = new QueryBuilder(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
	    $stmt = $builder
            ->select('tbl_patients','p')
            ->innerJoin('tbl_sorting','s','p.p_id','s.p_id')
            ->innerJoin('tbl_status','st','s.s_status','st.s_status')
            ->where('p_level','1')
            ->fetch();
        return($stmt);
        // "SELECT * FROM tbl_patients as p 
        // INNER JOIN tbl_sorting AS s ON p.p_id=s.p_id 
        // INNER JOIN tbl_status AS st ON s.s_status = st.s_status
        // WHERE p_level='1'"
    }
}

class Fetchonestatus{
    public function fetchonestatus($status){
        $builder = new QueryBuilder(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
	    $result = $builder
            ->select('tbl_patients','p')
            ->innerJoin('tbl_sorting','s','p.p_id','s.p_id')
            ->innerJoin('tbl_status','st','s.s_status','st.s_status')
            ->where('p_level','1')
            ->and('s.s_status',$status)
            ->fetch();
           
            // $result = mysqli_query($this->dbcon, "SELECT * FROM tbl_sorting as s
            // INNER JOIN tbl_patients AS p ON s.p_id = p.p_id
            // INNER JOIN tbl_level AS l ON p.p_level = l.l_id
            // INNER JOIN tbl_status AS st ON s.s_status = st.s_status
            // WHERE p_level='1' AND status_name = '$status'
            // "); 
            return $result;
    }
}
    






class Allmembers2{
    public function allmember2(){
        $builder = new QueryBuilder(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
	    $stmt = $builder
            ->select('tbl_patients','p')
            ->innerJoin('tbl_sorting','s','p.p_id','s.p_id')
            ->innerJoin('tbl_status','st','s.s_status','st.s_status')
            ->where('p_level','2')
            ->fetch();
        return($stmt);
        // "SELECT * FROM tbl_patients as p 
        // INNER JOIN tbl_sorting AS s ON p.p_id=s.p_id 
        // INNER JOIN tbl_status AS st ON s.s_status = st.s_status
        // WHERE p_level='1'"
    }
}

class Fetchonestatus2{
    public function fetchonestatus2($status){
        $builder = new QueryBuilder(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
	    $result = $builder
            ->select('tbl_patients','p')
            ->innerJoin('tbl_sorting','s','p.p_id','s.p_id')
            ->innerJoin('tbl_status','st','s.s_status','st.s_status')
            ->where('p_level','2')
            ->and('s.s_status',$status)
            ->fetch();
           
            // $result = mysqli_query($this->dbcon, "SELECT * FROM tbl_sorting as s
            // INNER JOIN tbl_patients AS p ON s.p_id = p.p_id
            // INNER JOIN tbl_level AS l ON p.p_level = l.l_id
            // INNER JOIN tbl_status AS st ON s.s_status = st.s_status
            // WHERE p_level='1' AND status_name = '$status'
            // "); 
            return $result;
    }
}



    

?>