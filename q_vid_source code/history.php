<?php

$menu = "history";

?>


<?php include("header.php"); ?>


    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <h1>ประวัติการรักษา</h1>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

          <div class="card">
            <div class="card-header bg-navy">
              <h3 class="card-title"></h3>
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
                                              include_once('functions.php');
                                              $fetchhistory = new Fetchhistory();
                                              $sql = $fetchhistory->fetchhistory();
                                              while($row = mysqli_fetch_array($sql)){
                                          
                                          ?>
                                              <tr>
                                                  <td><?php echo $row['s_date']; ?></td>
                                                  <td><?php echo $row['p_id']; ?></td>
                                                  <td><?php echo $row['p_name']; ?></td>
                                                  <td><?php echo $row['p_gender']; ?></td>
                                                  
                                                  <td><?php echo $row['p_phone']; ?></td>
                                                  <td>
                                                  <a class="btn btn-primary btn-xs" href="history_info.php?p_id=<?php echo $row['p_id']; ?>">
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
