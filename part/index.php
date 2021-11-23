<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once '../header/css.php' ?>
</head>

<body class="hold-transition  accent-darksidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed text-sm">
    <div class="wrapper">

        <?php require_once '../header/menu_header.php' ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">ระบบจัดการ Part</h1>
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
                <div class="container-fluid">
                    <!-- Info boxes -->
                    <div class="row">
                        <!-- fix for small devices only -->
                        <div class="clearfix hidden-md-up"></div>
                        <div class="col-md-12">
                            <div class="card card-outline card-info">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fas fa-drum-steelpan mr-1"></i>
                                        ระบบจัดการ Part
                                    </h3>
                                    <div class="card-tools">
                                        <ul class="nav nav-pills ml-auto">
                                            <li class="nav-item">
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_edit" id="plus">
                                                    <?= $plus ?>
                                                </button>
                                            </li>
                                            <li class="nav-item">
                                                &nbsp; <a href="../new_order/index.php" class="btn btn-info"><?= $order ?></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table class="table table-striped text-secondary table-responsive-sm text-nowrap" id="data">
                                        <thead class="align-middle ">
                                            <tr>
                                                <th>#</th>
                                                <th>Part No</th>
                                                <th>Part name</th>
                                                <th>Line ผลิต(Runcard)</th>
                                                <th>Spec ชุบ</th>
                                                <th>สีชุบ</th>
                                                <th>ความหนา</th>
                                                <th>จุดควบคุมพิเศษ</th>
                                                <th>ชนิด</th> 
                                                <th>Baking</th>
                                                <th>รูป Part</th>
                                                <th>เวลาบึนทึก</th>
                                                <th class="text-center">แก้ไข</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            $sql = mysqli_query($conn, "SELECT * FROM part a
                                            LEFT JOIN  production_line b
                                            on a.production_line_id = b.production_line_id
                                            LEFT JOIN color c
                                            on a.color_id = c.color_id 
                                            LEFT JOIN special_control d 
                                            on a.special_control_id = d.special_control_id
                                            LEFT JOIN var_type e 
                                            on a.type_id = e.type_id
                                            LEFT JOIN thickness f
                                            on a.thickness_id = f.thickness_id
                                            LEFT JOIN baking g
                                            on a.baking_id = g.baking_id
                                            order by a.pa_date asc
                                            ") or die(mysqli_error($conn));
                                            while ($rs = mysqli_fetch_array($sql)) {
                                            ?>
                                                <tr>
                                                    <td><?= $i++; ?></td>
                                                    <td><?= $rs['pa_no']; ?></td>
                                                    <td><?= $rs['pa_name']; ?></td>
                                                    <td><?= $rs['production_line_name']; ?></td>
                                                    <td><?= $rs['pa_spec']; ?></td>
                                                    <td><?= $rs['color_name']; ?></td>
                                                    <td><?= $rs['thickness_name']; ?></td>
                                                    <td><?= $rs["special_control_name"] ?></td>
                                                    <td><?= $rs['type_name']; ?></td>
                                                    <td><?= $rs['baking_name']; ?></td>
                                                    <td><a href="#" class="pop"> <img class="imageresource" src="image/<?= $rs['pa_img']; ?>" hidden> <u>รูป Part</u></a>
                                                    </td>
                                                    <td> <?= $rs['pa_date']; ?></td>
                                                    <td class="text-center">
                                                        <a href="#" type="button" class="edit btn btn-warning btn-sm" id="<?= $rs['u_id'] ?>" 
                                                        data-toggle="modal"
                                                         data-target="#add_edit"
                                                          data-pa_id="<?= $rs['pa_id']; ?>"
                                                           data-pa_no="<?= $rs['pa_no']; ?>"
                                                            data-pa_name="<?= $rs['pa_name']; ?>"
                                                             data-pa_spec="<?= $rs['pa_spec']; ?>"
                                                              data-color_id="<?= $rs['color_id']; ?>"
                                                               data-thickness_id="<?= $rs['thickness_id']?>"
                                                               data-production_line_id="<?= $rs['production_line_id']?>"
                                                               data-special_control_id="<?= $rs['special_control_id']?>"
                                                               data-type_id="<?= $rs['type_id']?>"
                                                               data-baking_id="<?= $rs['baking_id']?>"><?= $edit ?></a>
                                                        &nbsp;
                                                        <a href="#" type="button" class="delete btn btn-danger btn-sm" data-pa_id="<?= $rs['pa_id'] ?>"><?= $del ?></a>

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
        require_once '../footer/footer.html' ?>
    </div>
    <?php require_once '../header/js.php' ?>

    <script src="js.js"></script>
</body>

</html>