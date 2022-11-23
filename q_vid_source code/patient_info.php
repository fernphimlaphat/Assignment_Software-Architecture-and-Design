<?php
    include_once('functions.php');
    $updatedata = new UpdateToFollowup();
    if (isset($_POST['updated'])) {
        $id = $_GET['p_id'];
        $p_level = $_POST['p_level'];

        $sql = $updatedata->updated($p_level, $id);
        if ($sql) {
            echo "<script>alert('Updated Successfully');</script>";
            echo "<script>window.location.href='newcase.php'</script>";
        } else {
            echo "<script>alert('Something went wrong! Please try again');</script>";
            echo "<script>window.location.href='patient_info.php'</script>";
        }
    }
    $menu = "newcase";

?>
<?php include("header.php"); ?>
<?php
                    include_once('functions.php');
                    $id = $_GET['p_id'];
                    $updatepatient = new Fetchonerecord();
                    $sql = $updatepatient->fetchonerecord($id);
                    while($row = mysqli_fetch_array($sql)) {
                ?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <h1>ผู้ป่วยใหม่</h1>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

          <div class="card">
            <div class="card-header bg-navy">
              <h2 class="card-title"><?php echo $row['p_name']; ?></h2>
            </div>
            <br>
            <div class="card-body p-1">

              <div class="row">
                <div class="col-md-1">
                  
                </div>


                <div class="col-md-12">

                <h5>ข้อมูลส่วนตัว</h5>
                <table id="mytable" class="table table-bordered table-striped">
            <thread>
                <th>เลขบัตรประชาชน</th>
                <th>ชื่อ-นามสกุล</th>
                <th>เพศ</th>
                <th>วันเกิด</th>
                <th>อายุ</th>
                <th>วันที่ป่วย</th>
                <th>ระดับอาการ</th>
                <th>สถานะผู้ป่วย</th>
            </thread>

            <tbody>  
                    <tr>
                        <td><?php echo $row['p_id']; ?></td>
                        <td><?php echo $row['p_name']; ?></td>
                        <td><?php echo $row['p_gender']; ?></td>
                        <td><?php echo $row['p_dob']; ?></td>
                        <td><?php echo $row['p_age']; ?></td>
                        <td><?php echo $row['s_date']; ?></td>
                        <td><?php echo $row['status_name']; ?></td>
                        <td><?php echo $row['level_name']; ?></td>
                    </tr>
            </tbody>
        </table>
        <table id="mytable" class="table table-bordered table-striped">
            <thread>
              <th>คณะ</th>
              <th>สาขา/ภาควิชา</th>
              <th>ชั้นปี</th>
              <th>ที่อยู่</th>
              <th>เบอร์โทร</th>
              <th>ID LINE</th>
            </thread>
            <tbody>  
                    <tr>
                        <td><?php echo $row['p_faculty']; ?></td>
                        <td><?php echo $row['p_major']; ?></td>
                        <td><?php echo $row['p_year']; ?></td>
                        <td><?php echo $row['p_addr']; ?></td>
                        <td><?php echo $row['p_phone']; ?></td>
                        <td><?php echo $row['p_line']; ?></td>
                    </tr>
            </tbody>
        </table>
        <br>
        <h5>โรคประจำตัวและประวัติการฉีดวัคซีน</h5>
        <table id="mytable" class="table table-bordered table-striped">
            <thread>
              <th>โรคประจำตัว	</th>
              <th>วัคซีนเข็มที่1	</th>
              <th>วัคซีนเข็มที่2	</th>
              <th>วัคซีนเข็มที่3	</th>
              <th>วัคซีนเข็มที่4</th>
            </thread>
            <tbody>  
                    <tr>
                        <td><?php echo $row['congenital disease']; ?></td>
                        <td><?php echo $row['vaccine1']; ?></td>
                        <td><?php echo $row['vaccine2']; ?></td>
                        <td><?php echo $row['vaccine3']; ?></td>
                        <td><?php echo $row['vaccine4']; ?></td>
                      </tr>
            </tbody>
        </table>
        <br>
        <h5>อาการต่างๆ</h5>
        <table id="mytable" class="table table-bordered table-striped">
            <thread>
              <th>ไอ</th>
              <th>เจ็บคอ</th>
              <th>มีไข้</th>
              <th>มีน้ำมูก</th>
              <th>จมูกไม่ได้กลิ่น</th>
              <th>ลิ้นไม่รับรส</th>
              <th>ตาแดง</th>
              <th>มีผื่น</th>
            </thread>
            <tbody>  
                    <tr>
                        <td><?php echo $row['cough']; ?></td>
                        <td><?php echo $row['sore_throat']; ?></td>
                        <td><?php echo $row['flu_375']; ?></td>
                        <td><?php echo $row['Snot']; ?></td>
                        <td><?php echo $row['smell']; ?></td>
                        <td><?php echo $row['taste']; ?></td>
                        <td><?php echo $row['conjunctivitis']; ?></td>
                        <td><?php echo $row['rash']; ?></td>
                      </tr>
            </tbody>
        </table>
        <table id="mytable" class="table table-bordered table-striped">
            <thread>
              <th>ถ่ายเหลวน้อยกว่า 3 ครั้ง</th>
              <th>ถ่ายเหลวมากกว่า 3 ครั้ง</th>
              <th>หน้ามืด</th>
              <th>หายใจไม่สะดวก</th>
              <th>หอบเหนื่อย</th>
              <th>แน่นหน้าอกบางครั้ง</th>
              <th>แน่นหน้าอกตลอดเวลา</th>
              <th>ซึม</th>
            </thread>
            <tbody>  
                    <tr>
                        <td><?php echo $row['liquidless3']; ?></td>
                        <td><?php echo $row['liquidmore3']; ?></td>
                        <td><?php echo $row['dizzy']; ?></td>
                        <td><?php echo $row['shortnessbreath']; ?></td>
                        <td><?php echo $row['exhausted']; ?></td>
                        <td><?php echo $row['sometimesangina']; ?></td>
                        <td><?php echo $row['alwaysangina']; ?></td>
                        <td><?php echo $row['depressed']; ?></td>
                      </tr>
            </tbody>
        </table>

         <form action="" method="post">
                        <input type="checkbox" id="p_level" name="p_level" value="2">
                        <label for="p_level" required>วินิจฉัยสำเร็จ</label><br>
                <?php
                    }
                ?>
        <button type="submit" name="updated" class="btn btn-success">ยืนยัน</button>
         </form>
    </div>
      
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
