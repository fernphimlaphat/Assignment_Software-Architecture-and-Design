<?php

$menu = "followup";

?>

<?php
    session_start();
    include_once("functions.php");
    
    
    if (isset($_GET['s_status'])) {
        //คิวรี่ข้อมูลสินค้าตามประเภท
        //$stmt = $conn->prepare("SELECT* FROM tbl_patients WHERE role_iid=?");
        $status = $_GET['s_status'];
        $userdata = new Fetchonestatus2();
        $result = $userdata->fetchonestatus2($status);
    }else{
        //คิวรี่ข้อมูลสินค้าทุกรายการ
       //  $stmt = $conn->prepare("SELECT* FROM tbl_patients");
       $userdata = new Allmembers2();
        $result = $userdata->allmember2();
    }
    $userdata = new Allstatus();
    $resultPrdType = $userdata->allstatus();
    
?>
<?php include("header.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  
</head>
<body>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <h1 style="display:inline-block">ผู้ป่วยใหม่ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h1>
        <button type="button" class="btn btn-primary">เลือกระดับอาการ</button>
          <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"></button>
          <div class="dropdown-menu">
            <a href="followup.php" class="list-group-item list-group-item-action">ผู้ป่วยติดตามอาการ</a> 
            <?php foreach($resultPrdType as $rowPrdType) {  ?>
            <a href="followup.php?s_status=<?= $rowPrdType['s_status'];?>&name=<?= $rowPrdType['status_name'];?>"  
            class="list-group-item list-group-item-action"> <?= $rowPrdType['status_name'];?>
            </a> 
            <?php } ?>
          </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

          <div class="card">
            <div class="card-header bg-navy">
              
            </div>
            <br>
            <div class="card-body p-1">
                
              <div class="row">
                <div class="col-md-1">
                  
                </div>
                

                <div class="col-md-12">
                  

                  <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                    <thead>
                                        <tr role="row" class="info">
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 7%;">วันที่ป่วย</th>
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">เลขบัตรประชาชน</th>
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">ชื่อ-นามสกุล</th>
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 3%;">เพศ</th>
                                            
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 7%;">เบอร์โทรศัพท์</th>
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 3%;">ดูอาการ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         <?php
                                              if(isset($_GET['name'])){
                                                echo '<h5 align=center style="color:navy"> ประเภทผู้ป่วย: ' .$_GET['name'] .'</h5><hr>';
                                                
                                                }else {
                                                echo '<h5 align=center style="color:navy"> ประเภทผู้ป่วย: ผู้ป่วยติดตามอาการ</h5><hr>';
                                                }
                                                        
                                                foreach($result as $row) 
                                                {  ?>
                                              <tr>
                                                  <td><?php echo $row['s_date']; ?></td>
                                                  <td><?php echo $row['p_id']; ?></td>
                                                  <td><?php echo $row['p_name']; ?></td>
                                                  <td><?php echo $row['p_gender']; ?></td>
                                                  
                                                  <td><?php echo $row['p_phone']; ?></td>
                                                  <td>
                                                  <a class="btn btn-primary btn-xs" href="following.php?p_id=<?php echo $row['p_id']; ?>">
                                                  <i class="fas fa-folder">
                                                  </i>
                                                  View
                                              </a>
                                                </td>
                                              </tr>
                                          <?php
                                              }
                                          ?>
                                      </tbody>
                  </table>
      
                </div>


                <div class="col-md-1">
                  
                </div>

              </div>

            </div>
              
          </div>

          
        

          


        </div>
        <!-- /.col -->
      </div>

      

    </section>
    <!-- /.content -->

    
<?php include('footer.php'); ?>

<script>
  $(function () {
    $(".datatable").DataTable();
    // $('#example2').DataTable({
    //   "paging": true,
    //   "lengthChange": false,
    //   "searching": false,
    // http://fordev22.com/
    //   "ordering": true,
    //   "info": true,
    //   "autoWidth": false,
    // });
  });
</script>
  
</body>
</html>
