<?php
include 'dataConnection.php';

interface StrategyOrder
{
    public function OrderASC();
    public function OrderDESC();
}

class FollowUPOrder_Timestamp implements StrategyOrder
{
    private $connectDB;
    private $dataOrderASC;
    private $dataOrderDESC;
    private $SSID;
    public function __construct($SSID)
    {
        $this->SSID = $SSID;
        $this->reset();
    }
    public function reset()
    {
        $this->connectDB = new dataConnection();
    }

    public function getSSID()
    {
        return $this->SSID;
    }

    public function OrderASC()
    {
        $this->dataOrderASC = "SELECT * FROM tbl_followup AS F,tbl_patients AS P 
        WHERE F.p_SSID = P.p_id AND P.p_id=$this->SSID ORDER BY F.p_timestamp ASC";
        $result = $this->connectDB->ConnectDB()->query($this->dataOrderASC);
        $result->fetch_all();
        if ($result->num_rows > 0) {
            return $result;
        } else {
            $this->reset();
        }
    }
    public function OrderDESC()
    {
        $this->dataOrderDESC = "SELECT * FROM tbl_followup AS F ,tbl_patients AS P 
        WHERE F.p_SSID = P.p_id AND P.p_id=$this->SSID ORDER BY F.p_timestamp DESC";
        $result = $this->connectDB->ConnectDB()->query($this->dataOrderDESC);
        $result->fetch_all();
        if ($result->num_rows > 0) {
            return $result;
        } else {
            $this->reset();
        }
    }
}

class FollowUPOrder_ID implements StrategyOrder
{
    private $connectDB;
    private $dataOrderASC;
    private $dataOrderDESC;
    private $SSID;

    public function __construct($SSID)
    {
        $this->SSID = $SSID;
        $this->reset();
    }
    public function reset()
    {
        $this->connectDB = new dataConnection();
    }

    public function OrderASC()
    {
        $this->dataOrderASC = "SELECT * FROM tbl_followup AS F ,tbl_patients AS P 
        WHERE p_SSID = P.p_id AND P.p_id=$this->SSID ORDER BY F.p_id DESC";
        $result = $this->connectDB->ConnectDB()->query($this->dataOrderASC);
        $result->fetch_all();
        if ($result->num_rows > 0) {
            return $result;
        } else {
            $this->reset();
        }
    }
    public function OrderDESC()
    {
        $this->dataOrderDESC = "SELECT * FROM tbl_followup AS F ,tbl_patients AS P 
        WHERE p_SSID = P.p_id AND P.p_id=$this->SSID ORDER BY F.p_id ASC";
        $result = $this->connectDB->ConnectDB()->query($this->dataOrderDESC);
        $result->fetch_all();
        if ($result->num_rows > 0) {
            return $result;
        } else {
            $this->reset();
        }
    }
}

class FollowUPOrder_Score implements StrategyOrder
{
    private $connectDB;
    private $dataOrderASC;
    private $dataOrderDESC;
    private $SSID;

    public function __construct($SSID)
    {
        $this->SSID = $SSID;
        $this->reset();
    }
    public function reset()
    {
        $this->connectDB = new dataConnection();
    }

    public function OrderASC()
    {
        $this->dataOrderASC = "SELECT * FROM tbl_followup AS F ,tbl_patients AS P 
        WHERE p_SSID = P.p_id AND P.p_id=$this->SSID ORDER BY F.p_score DESC";
        $result = $this->connectDB->ConnectDB()->query($this->dataOrderASC);
        $result->fetch_all();
        if ($result->num_rows > 0) {
            return $result;
        } else {
            $this->reset();
        }
    }
    public function OrderDESC()
    {
        $this->dataOrderDESC = "SELECT * FROM tbl_followup AS F ,tbl_patients AS P 
        WHERE p_SSID = P.p_id AND P.p_id=$this->SSID ORDER BY F.p_score ASC";
        $result = $this->connectDB->ConnectDB()->query($this->dataOrderDESC);
        $result->fetch_all();
        if ($result->num_rows > 0) {
            return $result;
        } else {
            $this->reset();
        }
    }
}

class FollowUPALLOrder_Timestamp implements StrategyOrder
{
    private $connectDB;
    private $data;
    private $dataOrderASC;
    private $dataOrderDESC;

    public function __construct()
    {
        $this->reset();
    }
    public function reset()
    {
        $this->connectDB = new dataConnection();
    }

    public function queryDBAll()
    {
        $this->data = "SELECT * FROM tbl_followup AS F,tbl_patients AS P WHERE F.p_SSID = P.p_id";
        // echo gettype($this->data);
        $result = $this->connectDB->ConnectDB()->query($this->data);
        $result->fetch_all();
        if ($result->num_rows > 0) {
            return $result;
        } else {
            $this->reset();
        }
    }

    public function OrderASC()
    {
        $this->dataOrderASC = "SELECT * FROM tbl_followup AS F, tbl_patients AS P 
        WHERE F.p_SSID = P.p_id ORDER BY F.p_timestamp ASC";
        // echo gettype($this->data);
        $result = $this->connectDB->ConnectDB()->query($this->dataOrderASC);
        $result->fetch_all();
        if ($result->num_rows > 0) {
            return $result;
        } else {
            $this->reset();
        }
    }
    public function OrderDESC()
    {
        $this->dataOrderDESC = "SELECT * FROM tbl_followup AS F, tbl_patients AS P 
        WHERE F.p_SSID = P.p_id ORDER BY F.p_timestamp DESC";
        // echo gettype($this->data);
        $result = $this->connectDB->ConnectDB()->query($this->dataOrderDESC);
        $result->fetch_all();
        if ($result->num_rows > 0) {
            return $result;
        } else {
            $this->reset();
        }
    }
}

class FollowUPALLOrder_ID implements StrategyOrder
{
    private $connectDB;
    private $data;
    private $dataOrderASC;
    private $dataOrderDESC;

    public function __construct()
    {
        $this->reset();
    }
    public function reset()
    {
        $this->connectDB = new dataConnection();
    }

    public function queryDBAll()
    {
        $this->data = "SELECT * FROM tbl_followup AS F ,tbl_patients AS P WHERE F.p_SSID = P.p_id";
        // echo gettype($this->data);
        $result = $this->connectDB->ConnectDB()->query($this->data);
        $result->fetch_all();
        if ($result->num_rows > 0) {
            return $result;
        } else {
            $this->reset();
        }
    }

    public function OrderASC()
    {
        $this->dataOrderASC = "SELECT * FROM tbl_followup AS F ,tbl_patients AS P WHERE F.p_SSID = P.p_id ORDER BY F.p_id ASC";
        // echo gettype($this->data);
        $result = $this->connectDB->ConnectDB()->query($this->dataOrderASC);
        $result->fetch_all();
        if ($result->num_rows > 0) {
            return $result;
        } else {
            $this->reset();
        }
    }
    public function OrderDESC()
    {
        $this->dataOrderDESC = "SELECT * FROM tbl_followup AS F ,tbl_patients AS P WHERE F.p_SSID = P.p_id ORDER BY F.p_id DESC";
        // echo gettype($this->data);
        $result = $this->connectDB->ConnectDB()->query($this->dataOrderDESC);
        $result->fetch_all();
        if ($result->num_rows > 0) {
            return $result;
        } else {
            $this->reset();
        }
    }
}

class FollowUPALLOrder_Score implements StrategyOrder
{
    private $connectDB;
    private $data;
    private $dataOrderASC;
    private $dataOrderDESC;

    public function __construct()
    {
        $this->reset();
    }
    public function reset()
    {
        $this->connectDB = new dataConnection();
    }

    public function queryDBAll()
    {
        $this->data = "SELECT * FROM tbl_followup AS F ,tbl_patients AS P WHERE F.p_SSID = P.p_id";
        // echo gettype($this->data);
        $result = $this->connectDB->ConnectDB()->query($this->data);
        $result->fetch_all();
        if ($result->num_rows > 0) {
            return $result;
        } else {
            $this->reset();
        }
    }

    public function OrderASC()
    {
        $this->dataOrderASC = "SELECT * FROM tbl_followup AS F ,tbl_patients AS P WHERE F.p_SSID = P.p_id ORDER BY F.p_score ASC";
        // echo gettype($this->data);
        $result = $this->connectDB->ConnectDB()->query($this->dataOrderASC);
        $result->fetch_all();
        if ($result->num_rows > 0) {
            return $result;
        } else {
            $this->reset();
        }
    }
    public function OrderDESC()
    {
        $this->dataOrderDESC = "SELECT * FROM tbl_followup AS F ,tbl_patients AS P WHERE F.p_SSID = P.p_id ORDER BY F.p_score DESC";
        // echo gettype($this->data);
        $result = $this->connectDB->ConnectDB()->query($this->dataOrderDESC);
        $result->fetch_all();
        if ($result->num_rows > 0) {
            return $result;
        } else {
            $this->reset();
        }
    }
}

class DataFollowUP
{
    private StrategyOrder $Strategy;
    private $dataHeader;
    private $data;
    public function __construct(StrategyOrder $Strategy)
    {
        $this->Strategy = $Strategy;
    }
    public function setStrategy(StrategyOrder $Strategy)
    {
        $this->Strategy = $Strategy;
    }

    public function printHeader($SSID)
    {
        $this->dataHeader = $this->Strategy->OrderDESC($SSID);
        if ($this->dataHeader->num_rows > 0) {
            $row = $this->dataHeader->fetch_assoc();
            foreach ($this->dataHeader as $row) {
                echo "<h5>" . "เลขบัตรประชาชน " . $row["p_SSID"] . "</h5>" .
                    "<h6>" . "ชื่อ " . $row["p_name"] . "</h6>" .
                    "<h6>" . "คะแนน : " . $row["p_score"] . "</h6>" .
                    "<h6>" . "โรคประจำตัว : " . $row["congenital disease"] . "</h6><br>";
                break;
            }
        } else {
            echo "no data";
        }
    }

    public function printData($SSID)
    {
        $this->data =  $this->Strategy->OrderDESC($SSID);
?> <table id="example1" class="table table-bordered table-striped dataTable">
    <thead>
        <tr role="row" class="info">
            <th tabindex="0" rowspan="1" colspan="1" style="width: 20%;" class="text-center">วันที่</th>
            <th tabindex="0" rowspan="1" colspan="2" style="width: 60%; " class="text-center">อาการ</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($this->data as $row_dm) { ?>
        <tr>
            <td class="text-center">
                <?php echo $row_dm['p_timestamp']; ?>
            </td>
            <td>

                <?php
                            echo "ไอ : " . $row_dm['cough'] . "<br>";
                            echo "เจ็บคอ : " . $row_dm['sore_throat'] . "<br>";
                            echo "มีไข้ อุณหภูมิร่างกายมากว่า 37.5° : " . $row_dm['flu_375'] . "<br>";
                            echo "มีน้ำมูก : " . $row_dm['Snot'] . "<br>";
                            echo "จมูกไม่ได้กลิ่น : " . $row_dm['smell'] . "<br>";
                            echo "ลิ้นไม่รับรส : " . $row_dm['taste'] . "<br>";
                            echo "ตาแดง : " . $row_dm['conjunctivitis'] . "<br>";
                            echo "มีผื่นขึ้นตามร่างกาย : " . $row_dm['rash'] . "<br>";
                            ?>
            </td>
            <td>
                <?php
                            echo "ถ่ายเหลวน้อยกว่า 3 ครั้งต่อวัน : " . $row_dm['liquidless3'] . "<br>";
                            echo "ถ่ายเหลวมากกว่า 3 ครั้งต่อวัน : " . $row_dm['liquidmore3'] . "<br>";
                            echo "หน้ามืด วิงเวียนศรีษะ อ่อนเพลีย : " . $row_dm['dizzy'] . "<br>";
                            echo "หายใจไม่สะดวกขณะทำกิจวัตรปกติ : " . $row_dm['shortnessbreath'] . "<br>";
                            echo "หอบเหนื่อย พูดไม่เป็นประโยค : " . $row_dm['exhausted'] . "<br>";
                            echo "แน่นหน้าอก บางครั้ง : " . $row_dm['sometimesangina'] . "<br>";
                            echo "แน่นหน้าอกตลอดเวลา หายใจแล้วเจ็บหน้าอก : " . $row_dm['alwaysangina'] . "<br>";
                            echo "ซึม เรียกไม่รู้สึกตัว ตอบสนองช้า : " . $row_dm['depressed'] . "<br>";
                            ?>
            </td>
            <?php } ?>
        </tr>
    </tbody>
</table>
<?php
    }
}
?>