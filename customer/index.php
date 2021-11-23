<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../header/css.php' ?>
</head>

<body class="hold-transition  accent-darksidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed text-sm">
    <div class="wrapper">

        <?php  include '../header/menu_header.php' ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">จัดการฐานข้อมูลลูกค้า</h1>
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
                        <div class="col-md-10">
                            <div class="card card-outline card-info">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fas fa-users mr-1"></i>
                                        จัดการฐานข้อมูลลูกค้า
                                    </h3>
                                    <div class="card-tools">
                                        <ul class="nav nav-pills ml-auto">
                                            <li class="nav-item">
                                                <a href="#" type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_exampleModal" data-whatever="add_modal"><?=$plus?></a>
                                            </li>
                                            <li class="nav-item">
                                                &nbsp; <a href="../new_order/index.php" class="btn btn-info"><?=$order?></a>
                                            </li>
                                        </ul>
                                    </div> 
                                </div>
                                <div class="card-body">
                                    <table class="table table-striped text-secondary table-responsive-sm text-nowrap" id="data">
                                        <thead class="align-middle ">
                                            <tr>
                                                <th>#</th>
                                                <th>รหัสลูกค้า</th>
                                                <th>ชื่อลูกค้า</th>
                                                <th class="text-center">แก้ไข</th>
                                            </tr>
                                        </thead>
                                        <tbody> 
                                    <?php
                                        $i = 1;
                                        $sql = mysqli_query($conn,"SELECT * FROM customer");
                                        while($rows = mysqli_fetch_array($sql)){ 
                                    ?>
                                            <tr>
                                                <td><?=$i++;?></td>
                                                <td><?=$rows['customer_id'];?></td>
                                                <td><?=$rows['customer_name'];?></td>
                                                <td class="text-center">
                                                    <a href="#" type="button" class="edit btn btn-warning btn-sm" id="<?=$rows['c_id']?>" data-toggle="modal" data-target="#exampleModal" data-whatever="edit_modal"><?=$edit?></a>
                                                    <a href="#" type="button" class="del btn btn-danger  btn-sm" id="<?=$rows['c_id']?>"><?=$del?></a>
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
        /* include 'edit_customer.php'; */
        include '../footer/footer.html'?>
    </div>
    <?php include '../header/js.php'?>


    <!-- ADD Modal -->
    <div class="modal fade" id="add_exampleModal" tabindex="-1" role="dialog" aria-labelledby="add_exampleModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">แก้ไขข้อมูลสินค้า</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" name="frm_edit" action="add_customer.php">
                            <table width="100%" class="text-center">
                                <tr>
                                    <td>รหัสลูกค้า</td>
                                    <td>
                                        <input class="form-control text-center" name="frm_customer_id" type="text" autocomplete="off" placeholder="กรุณากรอกรหัสลูกค้า">
                                    </td>
                                </tr>
                                    <tr height="10px"></tr>
                                <tr>
                                    <td>ชื่อลูกค้า</td>
                                    <td>
                                        <input class="form-control text-center" name="frm_customer_name" type="text" autocomplete="off" placeholder="กรุณากรอกชื่อลูกค้า">
                                    </td>
                                </tr>
                            </table>
                            <div class="modal-body text-right">
                                <button class="btn btn-primary mr-3" type="submit">บันทึก</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">แก้ไขข้อมูลสินค้า</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div id="edit_list2"></div>

                    </div>
                </div>
            </div>
        </div>


<script type="text/javascript">  

    $('.del').click(function(){
            var uid=$(this).attr("id");
            var status = confirm("ยืนยันการลบข้อมูล ??");
                if (status) {
                    $.ajax({
                        url:"delete_customer.php",
                        method:"post",
                        data:{id:uid},
                        success:function(data){
                        location.reload();
                    }
                });
            }
        });
        // Delete Row ------------------------------------------- -------------------------------------------       
    $('.edit').click(function(){
        var uid=$(this).attr("id");
        $.ajax({
            url:"edit_customer.php",
            method:"post",
            data:{id:uid},
            success:function(data){
                $('#edit_list2').html(data);
                $('#edit_list').modal('show');
            }
        });
    });

    $(document).ready(function() {
    $('#data').DataTable({
        "pagingType": "full_numbers"
    });
} );
</script>

</body>

</html>