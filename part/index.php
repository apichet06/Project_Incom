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
                                        ระบบจัดการ Part
                                    </h3>
                                    <div class="card-tools">
                                        <ul class="nav nav-pills ml-auto">
                                            <li class="nav-item">
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#add_edit" id="plus">
                                                    <?=$plus?>
                                                </button>
                                            </li>
                                            <li class="nav-item">
                                                &nbsp; <a href="../new_order/index.php" class="btn btn-info"><?=$order?></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table class="table table-striped text-secondary table-responsive-sm text-nowrap">
                                        <thead class="align-middle ">
                                            <tr>
                                                <th>#</th>
                                                <th>pa_no</th>
                                                <th>pa_name</th>
                                                <th>pa_spec</th>
                                                <th>pa_color</th>
                                                <th>pa_thickness</th>
                                                <th>pa_img</th>
                                                <th>pa_date</th>
                                                <th>แก้ไข</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                        $i = 1;
                                        $sql = mysqli_query($conn,"SELECT * FROM part");
                                        while($rows = mysqli_fetch_array($sql)){ 
                                    ?>
                                            <tr>
                                                <td><?=$i++;?></td>
                                                <td><?=$rows['pa_no'];?></td>
                                                <td><?=$rows['pa_name'];?></td>
                                                <td><?=$rows['pa_spec'];?></td>
                                                <td><?=$rows['pa_color'];?></td>
                                                <td><?=$rows['pa_thickness'];?></td>
                                                <td><a href="#" class="pop"> <img class="imageresource"
                                                            src="image/<?=$rows['pa_img'];?>" hidden> <u>รูป Part</u></a>
                                                </td>
                                                <td> <?=$rows['pa_date'];?></td>
                                                <td>
                                                    <a href="#" type="button" class="edit btn btn-warning btn-sm"
                                                        id="<?=$rows['u_id']?>" data-toggle="modal"
                                                        data-target="#add_edit" data-pa_id="<?=$rows['pa_id'];?>"
                                                        data-pa_no="<?=$rows['pa_no'];?>"
                                                        data-pa_name="<?=$rows['pa_name'];?>"
                                                        data-pa_spec="<?=$rows['pa_spec'];?>"
                                                        data-pa_color="<?=$rows['pa_color'];?>"
                                                        data-pa_thickness="<?=$rows['pa_thickness'];?>"><?=$edit?></a>
                                                    &nbsp;
                                                    <a href="#" type="button" class="delete btn btn-danger btn-sm"
                                                        data-pa_id="<?=$rows['pa_id']?>"><?=$del?></a>

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