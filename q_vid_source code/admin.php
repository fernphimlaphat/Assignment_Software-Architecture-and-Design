<?php
    session_start();
    include_once("functions.php");
    $userdata = new Status();
    
    if (isset($_GET['name'])) {
        //คิวรี่ข้อมูลผู้ป่วยตามประเภท
        $statusName = $_GET['name'];
        $result = $userdata->fetchonerecord($statusName);
    }else{
        //คิวรี่ผู้ป่วยทุกรายการ
        $result = $userdata->allmember();
    }
    //แสดงทุกกสถานะ ไม่ใช้แสดงผู้ป่วยนะ
    $resultPrdType = $userdata->allstatus();
    
    if($_SESSION['id']==""){
        header("location: signin.php");
    }else{
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>Welcome Page</title>
</head>
<body>
  <div class="container">
    <h1 class="mt-5">Welcome admin,<?php echo $_SESSION['fname']; ?></h1>
    <a href="logout.php" class="btn btn-danger">Logout</a>
    <div class="row">
      <div class="col-md-12">
        <div class="alert alert-primary" role="alert">
          <b> รายการผู้ป่วย  :: แสดงรายการผู้ป่วยแยกตามระดับอาการ  </b>
        </div>
      </div>
    </div>
    <div class="row">
      <!-- <div class="col-md-3">
        <div class="list-group">
          <a href="admin.php" class="list-group-item list-group-item-action active" aria-current="true">
            รายชื่อผู้ป่วยตามระดับอาการ
          </a>
          <?php foreach($resultPrdType as $rowPrdType) {  ?>
          <a href="admin.php?s_status=<?= $rowPrdType['s_status'];?>&name=<?= $rowPrdType['status_name'];?>"  
          class="list-group-item list-group-item-action"> <?= $rowPrdType['status_name'];?>
          </a> 
          <?php } ?>
        </div>
      </div> -->
      <div class="col-md-9">
      <div class="row">
        <div class="btn-group col-md-4">
          <button type="button" class="btn btn-primary">เลือกระดับอาการ</button>
          <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"></button>
          <div class="dropdown-menu">
            <a href="admin.php" class="list-group-item list-group-item-action">ผู้ป่วยทุกระดับทั้งหมด</a> 
            <?php foreach($resultPrdType as $rowPrdType) {  ?>
            <a href="admin.php?s_status=<?= $rowPrdType['s_status'];?>&name=<?= $rowPrdType['status_name'];?>"  
            class="list-group-item list-group-item-action"> <?= $rowPrdType['status_name'];?>
            </a> 
            <?php } ?>
          </div>
        </div>
      </div>
      <div class="row" >
        <table class="table table-striped table-bordered table-hover">
          <thead>
            <tr>
              <th>เลขบัตรประชาชน</th>
              <th>ชื่อ-นามสกุล</th>
              <th>ระดับอาการ</th>
            </tr>
          </thead>
          <?php 
                //ถ้ามีการคลิกเลือกประเภทสินค้า     
          if(isset($_GET['name'])){
          echo '<h4 style="color:red"> ประเภทผู้ป่วย ' .$_GET['name'] .'</h4>';
          }
                  
          foreach($result as $row) 
          {  ?>
            <tr>
              <td><?php echo $row["p_id"]; ?></td>
              <td><?php echo $row["p_name"]; ?></td>
              <td><?php echo $row["s_status"]; ?></td>
            </tr>
          <?php } ?>
        </table>
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>
<?php
}
?>