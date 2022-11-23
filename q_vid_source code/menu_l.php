<!-- Main Sidebar Container -->
<!-- http://fordev22.com/ -->
<aside class="main-sidebar sidebar-light-navy elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link bg-navy">
      <img src="assets/dist/img/AdminLTELogo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Q-VID</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="assets/dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="http://devtai.com/" target="_bank" class="d-block">ไม่บอกอ่ะจะทำไม</a>
        </div>
      </div>

       


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <!-- nav-compact -->
        <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header">MENU</li>



      
          <li class="nav-item" >
            <a href="index.php" class="nav-link <?php if($menu=="index"){echo "active";} ?> ">
              <i class="nav-icon fas fa-chart-bar"></i>
              <p>Dashboard</p>
            </a>
          </li>



          <li class="nav-item">
            <a href="newcase.php" class="nav-link <?php if($menu=="newcase"){echo "active";} ?> ">
            <i class="nav-icon fas fa-list-alt"></i>
              <p>ผู้ป่วยใหม่</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="followup.php" class="nav-link <?php if($menu=="followup"){echo "active";} ?> ">
            <i class="nav-icon fas fa-tasks"></i>
              <p>ผู้ป่วยติดตามอาการ</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="history.php" class="nav-link <?php if($menu=="history"){echo "active";} ?> ">
            <i class="nav-icon fas fa-box"></i>
              <p>ประวัติการรักษา</p>
            </a>
          </li>

            
      <div class="user-panel mt-2 pb-3 mb-2 d-flex">
  
      </div>
          <li class="nav-item">
            <a href="http://fordev22.com/" class="nav-link text-danger">
              <i class="nav-icon fas fa-power-off"></i>
              <p>ออกจากระบบ</p>
            </a>
          </li>
  


          
        </ul>
      </nav>
      
      <!-- /.sidebar-menu -->
      <!-- http://fordev22.com/ -->
    </div>
    <!-- /.sidebar -->
  </aside>