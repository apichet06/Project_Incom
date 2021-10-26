<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once '../header/css.php' ?>
</head>

<body class="hold-transition  accent-darksidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed text-sm">
    <div class="wrapper">

        <?php require_once '../header/menu_header.php';  ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">รายการรออนุมัติ</h1>
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
                                        <i class="fas fa-drum-steelpan mr-1"></i>
                                        รายการรออนุมัติ
                                    </h3>

                                </div>
                                <div class="card-body">
                                    <table class="table table-striped text-secondary table-responsive-sm text-nowrap" id="data">
                                        <thead class="align-middle ">
                                            <tr>
                                                <th>#</th>
                                                <th>เลขที่</th>
                                                <th>ลูกค้า</th>
                                                <th>รหัสลูกค้า</th>
                                                <th>ชื่อลูกค้า</th>
                                                <th>PART NO.</th>
                                                <th>วันที่ต้องการ</th>
                                                <th class="text-center">ตรวจสอบอนุมัติ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            $sql = mysqli_query($conn, "SELECT * FROM new_order a 
                                            inner join customer b 
                                            on a.c_id = b.c_id 
                                            Where a.n_flac_status = 'Y'
                                            order by a.n_id desc");
                                            while ($rs = mysqli_fetch_array($sql)) {
                                            ?>
                                                <tr>
                                                    <td><?= $i++; ?></td>
                                                    <td><?= $rs['n_number']; ?></td>
                                                    <td><?= $rs['n_customerStatus']; ?></td>
                                                    <td><?= $rs['customer_id']; ?></td>
                                                    <td><?= $rs['customer_name']; ?></td>
                                                    <td><?= $rs['pa_id']; ?></td>
                                                    <td><?= $rs['n_desired']; ?></td>
                                                    <td class="text-center"><a href="approve_order.php?n_id=<?=$rs['n_id']?>" target="_black" type="button">คลิก</a></td>
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

        require_once '../footer/footer.html' ?>
    </div>
    <?php require_once '../header/js.php' ?>

    <script src="js.js"></script>
</body>

</html>