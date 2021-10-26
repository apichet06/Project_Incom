<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once '../header/css.php' ?>
</head>

<body class="hold-transition  accent-darksidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed text-sm">
    <div class="wrapper">

        <?php  require_once '../header/menu_header.php' ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">ระบบสมาชิก</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>

            <!-- Main content -->
            <section class="content">
                <div class="container ">
                    <!-- Info boxes -->
                    <div class="row"> 
                        <!-- fix for small devices only -->
                        <div class="clearfix hidden-md-up"></div>
                        <div class="col-md-12">
                            <div class="card card-outline card-info">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fas fa-users mr-1"></i>
                                        ระบบจัดการสมาชิก
                                    </h3>
                                    <div class="card-tools">
                                        <ul class="nav nav-pills ml-auto">
                                            <li class="nav-item">
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#add_edit" id="plus"> 
                                                    <?=$plus?>
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table class="table table-striped text-secondary table-responsive-sm text-nowrap">
                                        <thead class="align-middle ">
                                            <tr>
                                                <th>#</th>
                                                <th>ชื่อล็อกอิน</th>
                                                <th>ชื่อ</th>
                                                <th>นามสกุล</th>
                                                <th>ตำแหน่ง</th>
                                                <th>วันที่</th>
                                                <th>ฝ่าย/แผนก</th>
                                                <th>แก้ไข</th>
                                            </tr>
                                        </thead>
                                        <tbody> 
                                    <?php
                                        $i = 1;
                                        $sql = mysqli_query($conn,"SELECT * FROM user a
                                        inner join division b
                                        on a.d_id = b.d_id 
                                        inner join position c
                                        on c.p_id = a.p_id ");
                                        while($rows = mysqli_fetch_array($sql)){ 
                                    ?>
                                            <tr>
                                                <td><?=$i++;?></td>
                                                <td><?=$rows['u_username'];?></td>
                                                <td><?=$rows['u_name'];?></td>
                                                <td><?=$rows['u_sur'];?></td>
                                                <td><?=$rows['p_name'];?></td>
                                                <td><?=$rows['d_name'];?></td>
                                                <td><?=$rows['u_date'];?></td>
                                                <td>
                                                    <a href="#" type="button" class="edit btn btn-warning btn-sm"
                                                        id="<?=$rows['u_id']?>" data-toggle="modal" 
                                                        data-target="#add_edit"
                                                        data-u_id ="<?=$rows['u_id'];?>"
                                                        data-u_username ="<?=$rows['u_username'];?>"
                                                        data-u_password ="<?=$rows['u_password'];?>"
                                                        data-u_name ="<?=$rows['u_name'];?>"
                                                        data-u_sur ="<?=$rows['u_sur'];?>"
                                                        data-p_id ="<?=$rows['p_id'];?>"
                                                        data-d_id ="<?=$rows['d_id'];?>"><?=$edit?></a>
                                                    &nbsp;
                                                    <a href="#" type="button" class="delete btn btn-danger btn-sm"
                                                         data-u_id="<?=$rows['u_id']?>"><?=$del?></a>
                                                  
                                                </td>
                                            </tr>
                                            <?php } ?> 
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
                <hr>
                <!--/. container-fluid -->
            </section>
            <!-- /.content -->
        </div>
 
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
 
        <?php 
        require_once 'modal.php';
        require_once '../footer/footer.html'?>
    </div>
    <?php require_once '../header/js.php'?>

    <script src="js.js"></script>
</body>

</html>