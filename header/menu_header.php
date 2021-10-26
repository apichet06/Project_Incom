<?php session_start(); 
 include '../conndb/conn.php';
// select ตรวจสอบ Session ได้เลย
   $sql = mysqli_query($conn,"SELECT * FROM user a
   inner join division b
   on a.d_id = b.d_id 
   inner join position c
   on c.p_id = a.p_id 
   WHERE  a.u_id = '".$_SESSION['u_id']."'");
   $rs = mysqli_fetch_array($sql);


   $d_ssion = $rs['d_id'];
   
  ## 1 ตรวจรับสินค้า
  ## 3 ฝ่ายผลิต 
  ## 4 ตรวจสอบสินค้า
  ## 5 ขนส่ง
  ## 6 ทรัพยากรบุคคล
  ## 7 บัญชี/การเงิน
  ## 8 Admin

   if($_SESSION['u_id'] ==""){

    header("Location: ../index.php ");	
   }

?>


<!--######### Preloader โหลด โชว์ icon ###########-->
<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="../img/logo.png" height="60" width="60">
</div>

<!-- ########################### menuber บน ################################# -->
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="index3.html" class="nav-link">-</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">-</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->


<!-- ########################### menu ซ้าย ################################# -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-info elevation-4">
    <!-- Brand Logo -->
    <a href="../dashboard/index.php" class="brand-link">
        <img src="../img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">SPZinc Metal</span>
    </a>
 
    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex"> 
                    <div class="image" style="padding:8px 0px 0px 10px">
                        <img src="../img/user.png" class="img-circle elevation-2">
                    </div> 
                    <div class="info">
                        <a href="#" class="d-block text-white"><?=$rs['u_name'].' '.$rs['u_sur']?> <br>
                            <?=$rs['p_name'].' '.$rs['d_name']?></a>
                    </div>
               
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
           
            

            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header">ระบบงานภายใน</li>
                <?php if($d_ssion == 8 ){?> 
                <li class="nav-item">
                    <a href="../dashboard/index.php" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            หน้าหลัก
                        </p>
                    </a>
                </li>
                <?php } if($d_ssion == 8 ){ ?>  
                <li class="nav-item">
                    <a href="../new_order/index.php" class="nav-link">
                        <i class="nav-icon far fa-plus-square"></i>
                        <p>
                            1.ใบจัดทำงานใหม่
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../approve_order/index.php" class="nav-link">
                        <i class="nav-icon far fa-plus-square"></i>
                        <p>
                            รายการรออนุมัติ
                        </p>
                    </a>
                </li>

                <?php } if($d_ssion == 8 || $d_ssion == 3){ ?> 

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-building"></i>
                        <p>
                            2.ระบบงานผลิต
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="assign_job.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>มอบหมายงานผลิต</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="assign_check.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ตรวจสอบงาน</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php } if($d_ssion == 8 || $d_ssion == 4){ ?> 
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-calendar-check"></i>
                        <p>
                            3.ระบบงาน QC
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="assign_job.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ตรวจสอบคุณภาพสินค้า</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="stock_all.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ประวัติงาน</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php } if($d_ssion == 8 or $d_ssion == 5){ ?> 
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-clock"></i>
                        <p>
                            4.ระบบงาน Packing
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="assign_job.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ตรวจสอบคุณภาพสินค้า</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="stock_all.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ประวัติงาน</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <?php } if($d_ssion == 8 || $d_ssion == 6){ ?> 

                <li class="nav-header">การตั้งค่า</li>

                <li class="nav-item">
                    <a href="../member/member.php" class="nav-link">
                        <i class="nav-icon fas fa-user-tag"></i>  
                        <p>
                            ระบบสมาชิก
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../customer/index.php" class="nav-link"> 
                        <i class="nav-icon fas fa-user-plus"></i>
                        <p>
                            ลูกค้า
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="../part/index.php" class="nav-link"> 
                     <i class="nav-icon fas fa-drum-steelpan"></i> 
                        <p>
                           Part
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>

            <?php if($d_ssion != 6){ ?>
                <li class="nav-item">
                    <a href="/phpmyadmin" target="_new" class="nav-link">
                    <i class="nav-icon fas fa-database"> </i>
                        <p>
                            ฐานข้อมูล
                        </p>
                    </a>
                </li>
                 <?php } } ?>

                <li class="nav-item">
                    <a href="" id="log_out"  target="_new" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt text-danger"></i>
                        <p class="text-danger">
                            ออกจากระบบ
                        </p>
                    </a>
                </li> 
            </ul>
         
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>