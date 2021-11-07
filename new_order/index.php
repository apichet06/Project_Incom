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
                    <div class="row mb-0">
                        <div class="col-sm-6">
                            <h1 class="">สร้างใบงานใหม่</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row mb-0 -->
                </div><!-- /.container-fluid -->
            </div>

            <!-- Main content -->
            <section class="content">
                <div class="container ">
                    <!-- Info boxes -->
                    <div class="row ">
                        <!-- fix for small devices only -->
                        <div class="clearfix hidden-md-up"></div>
                        <div class="col-md-12">
                            <div class="card card-outline card-info">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fas fa-file-alt mr-1"></i>
                                        สร้างใบงานใหม่
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <form action="" id="insert_update">
                                        <div class="row align-items-center">
                                            <div class="col-md-10 "></div>
                                            <div class="col-md-2">
                                                <div class="form-check" >
                                                    <input class="form-check-input" type="radio" name="n_customerStatus" id="n_customerStatus1" value="ลูกค้าใหม่" required>
                                                    <label class="form-check-label">
                                                        ลูกค้าใหม่
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="n_customerStatus" id="n_customerStatus2" value="ลูกค้าเดิม">
                                                    <label class="form-check-label">
                                                        ลูกค้าเดิม
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="row mb-0">
                                                    <label class="col-5 col-form-label">วันที่ออกใบจัดงานใหม่</label>
                                                    <div class="col-7">
                                                        <input type="text" class="form-control form-control-sm datetimepicker-input" id="n_datejob" name="n_datejob" data-toggle="datetimepicker" required autocomplete="off" data-target="#n_datejob" placeholder="วันที่ออกใบจัดงานใหม่" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 ">
                                                <div class="row mb-0">
                                                    <label class="col-3 col-form-label">เลขที่</label>
                                                    <div class="col-9">
                                                        <input type="text" class="form-control form-control-sm" id="n_number" name="n_number" placeholder="เลขที่" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2 ">
                                                <div class="form-check-inline">
                                                    <input class="form-check-input" type="radio" name="n_specstatus" id="n_specstatus1" value="ชั่วคราว" required>
                                                    <label class="form-check-label">
                                                        เปลี่ยน Spac ชั่วคราว
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2 ">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="n_specstatus" id="n_specstatus2" value="ถาวร" required>
                                                    <label class="form-check-label"></label>
                                                    เปลี่ยน Spac ถาวร
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="row mb-0 align-items-center">
                                                    <div class="col-md-8 ">
                                                        <div class="row mb-0 align-items-center">
                                                            <div class="col-md-8">
                                                                <div class="row mb-0">
                                                                    <label class="col-3 col-form-label">ชื่อลูกค้า</label>
                                                                    <div class="col-7">
                                                                        <?php
                                                                        $sql = mysqli_query($conn, "SELECT c_id,customer_name FROM customer");
                                                                        ?>
                                                                        <select name="c_id" id="c_id" class="form-control form-control-sm  " required>
                                                                            <option value="">ชื่อลูกค้า</option>
                                                                            <?php while ($rs = mysqli_fetch_array($sql)) { ?>
                                                                                <option value="<?= $rs['c_id'] ?>"><?= $rs['customer_name'] ?></option>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-2">
                                                                        <a href="../customer/index.php" class="btn btn-sm btn-info"><?= $plus ?></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="row mb-0 ">
                                                                    <label class="col-4 col-form-label">รหัสลูกค้า</label>
                                                                    <div class="col-8">
                                                                        <input type="text" class="form-control-plaintext form-control-sm" name="customer_id" id="customer_id" placeholder="รหัสลูกค้า">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="row mb-0 ">
                                                                    <label class="col-2 col-form-label">PART NO.</label>
                                                                    <div class="col-8">
                                                                        <?php
                                                                        $sql = mysqli_query($conn, "SELECT pa_id,pa_name FROM part");
                                                                        ?>
                                                                        <select name="pa_id" id="pa_id" class="form-control form-control-sm" required>
                                                                            <option value="">PART NO.</option>
                                                                            <?php while ($rs = mysqli_fetch_array($sql)) { ?>
                                                                                <option value="<?= $rs['pa_id'] ?>"><?= $rs['pa_name'] ?></option>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-2">
                                                                        <a href="../part/index.php" class="btn btn-sm btn-info"><?= $plus ?></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 ">
                                                                <div class="row mb-0 ">
                                                                    <label class="col-2 col-form-label">PART NAME.</label>
                                                                    <div class="col-10">
                                                                        <input type="text" class="form-control-plaintext form-control-sm" id="pa_name" name="pa_name" placeholder="PART NAME.">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 ">
                                                                <div class="row mb-0 ">
                                                                    <label class="col-3 col-form-label">Space ชุบ</label>
                                                                    <div class="col-9">
                                                                        <input type="text" class="form-control-plaintext form-control-sm" id="pa_spec" name="pa_spec" placeholder="Space ชุบ">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 ">
                                                                <div class="row mb-0 ">
                                                                    <label class="col-2 col-form-label">สีชุบ</label>
                                                                    <div class="col-10">
                                                                        <input type="text" class="form-control-plaintext form-control-sm" id="pa_color" name="pa_color" placeholder="สีชุบ">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 ">
                                                                <div class="row mb-0 ">
                                                                    <label class="col-3 col-form-label">ความหนา</label>
                                                                    <div class="col-9">
                                                                        <input type="text" class="form-control-plaintext form-control-sm" id="pa_thickness" placeholder="ความหนา">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 ">
                                                                <div class="row mb-0 ">
                                                                    <label class="col-2 col-form-label">Lot NO.</label>
                                                                    <div class="col-10">
                                                                        <input type="text" class="form-control form-control-sm" id="n_lot" name="n_lot" placeholder="หมายเลข Lot สินค้า" required autocomplete="off">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 ">
                                                                <div class="row mb-0">
                                                                    <label class="col-3 col-form-label">วันที่รับเข้า</label>
                                                                    <div class="col-9">
                                                                        <input type="text" class="form-control form-control-sm datetimepicker-input" name="n_admissiondate" id="n_admissiondate" required autocomplete="off" data-toggle="datetimepicker" data-target="#n_admissiondate" placeholder="วันที่รับเข้า" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 ">
                                                                <div class="row mb-0">
                                                                    <label class="col-4 col-form-label">วันที่ต้องการ</label>
                                                                    <div class="col-8">
                                                                        <input type="text" class="form-control form-control-sm datetimepicker-input" name="n_desired" id="n_desired" required autocomplete="off" data-toggle="datetimepicker" data-target="#n_desired" placeholder="วันที่ต้องการ" />
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="card mb-2">
                                                            <div class="card-body text-center">
                                                                <img src="../img/no-image.jpg" id="pa_img" style="height:190px;" class="img-thumbnail">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ############################# -->
                                            <div class="col-md-2">
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        Line การผลิต &nbsp;
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="n_line" id="n_line1" value="ALZ" required autocomplete="off">
                                                    <label class="form-check-label">
                                                        ALZ &nbsp;
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="n_line" id="n_line2" value="ZnFe">
                                                    <label class="form-check-label">
                                                        ZnFe &nbsp;
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="n_line" id="n_line3" value="PP">
                                                    <label class="form-check-label">
                                                        PP &nbsp;
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="row mb-0">
                                                    <label class="col-3 col-form-label">Barel</label>
                                                    <div class="col-9">
                                                        <input type="text" class="form-control form-control-sm" id="n_barel" name="n_barel" placeholder="KG/Barel" required autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="row mb-0">
                                                    <label class="col-3 col-form-label">Rack</label>
                                                    <div class="col-9">
                                                        <input type="text" class="form-control form-control-sm" id="n_rack" name="n_rack" placeholder="ตัว/JIG" required autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ############################# -->

                                            <div class="col-md-2">
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        Baking &nbsp;
                                                    </label>
                                                    &emsp;&emsp;&emsp;&emsp;
                                                    <input class="form-check-input" type="radio" name="n_baking" id="n_baking1" value="Yes" required autocomplete="off">
                                                    <label class="form-check-label">
                                                        Yes &nbsp;
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="n_baking" id="n_baking2" value="No" required autocomplete="off">
                                                    <label class="form-check-label">
                                                        No &nbsp;
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="row">
                                                    <label class="col-4 col-form-label">ความปลอดภัยด้านผลิตภัณฑ์(ถ้ามี)</label>
                                                    <div class="col-8">
                                                        <input type="text" class="form-control form-control-sm" id="n_product_safety" name="n_product_safety" placeholder="" autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-md-2 mb-1">
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label col-form-lable">
                                                        Salt Spray Test
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="row mb-0 ">
                                                    <label class="col-5 col-form-label">สนิมขาว</label>
                                                    <div class="col-7">
                                                        <input type="text" class="form-control form-control-sm" id="n_white_rust" name="n_white_rust" placeholder="ชม.">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="row mb-0 ">
                                                    <label class="col-5 col-form-label">สนิมแดง</label>
                                                    <div class="col-7">
                                                        <input type="text" class="form-control form-control-sm" id="n_red_rust" name="n_red_rust" placeholder="ชม.">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 ">
                                                <div class=" form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="n_customeritem" id="n_customeritem1" value="ลูกค้าต้องการ" required>
                                                    <label class="form-check-label">
                                                        ลูกค้าต้องการ &nbsp;
                                                    </label>
                                                    <input type="text" class="form-control form-control-sm col-7" name="n_item" id="n_item" placeholder="ชิ้น">
                                                </div>
                                            </div>
                                            <div class="col-md-3 ">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="n_customeritem" id="n_customeritem2" value="ลูกค้าไม่ต้องการ" required>
                                                    <label class="form-check-label">
                                                        ลูกค้าไม่ต้องการ &nbsp;
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-md-2 mb-1">
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label col-form-lable">
                                                        กลุ่มผลิตภัณฑ์ &nbsp;
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="n_producgroup" id="n_producgroup1" value="Screw_Bolt" required >
                                                    <label class="form-check-label">
                                                        Screw/Bolt
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-1 mb-1">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="n_producgroup" id="n_producgroup2" value="Spring">
                                                    <label class="form-check-label">
                                                        Spring
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-1  mb-1">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="n_producgroup" id="n_producgroup3" value="Washer">
                                                    <label class="form-check-label">
                                                        Washer
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-1  mb-1">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="n_producgroup" id="n_producgroup4" value="Clip_Clamp">
                                                    <label class="form-check-label">
                                                        Clip/Clamp
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-1  mb-1">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="n_producgroup" id="n_producgroup5" value="Stamping">
                                                    <label class="form-check-label">
                                                        Stamping
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-1  mb-1">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="n_producgroup" id="n_producgroup6" value="Assy">
                                                    <label class="form-check-label">
                                                        Assy
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-1  mb-1">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="n_producgroup" id="n_producgroup7" value="Stud">
                                                    <label class="form-check-label">
                                                        Stud
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-1">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="n_producgroup" id="n_producgroup8" value="อื่นๆ">
                                                    <label class="form-check-label col-3">
                                                        อื่นๆ &nbsp;
                                                    </label>
                                                    <input type="text" class="form-control form-control-sm col-9" name="n_producgroupother" id="n_producgroupother" placeholder="...">
                                                </div>
                                            </div>


                                            <div class="col-md-3 ">
                                                <div class="row mb-0 ">
                                                    <label class="col-6 col-form-label">ยานยนต์ประเภท</label>
                                                    <div class="col-6">
                                                        <input type="text" class="form-control form-control-sm " id="n_automotivetype" name="n_automotivetype" placeholder="..." required autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 ">
                                                <div class="row mb-0 ">
                                                    <label class="col-3 col-form-label">ค่ายรถ</label>
                                                    <div class="col-9">
                                                        <input type="text" class="form-control form-control-sm " id="n_carcamp" name="n_carcamp" placeholder="..." required autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2 ">
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        กลุ่มงาน &nbsp;
                                                    </label>&emsp;
                                                    <input class="form-check-input" type="radio" name="n_workgroup" id="n_workgroup1" value="2ล้อ" required autocomplete="off">
                                                    <label class="form-check-label">
                                                        2 ล้อ
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4 ">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="n_workgroup" id="n_workgroup2" value="4ล้อ">
                                                    <label class="form-check-label">4 ล้อ</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="n_workgroup" id="n_workgroup3" value="Electonic">
                                                    <label class="form-check-label">Electonic</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="n_workgroup" id="n_workgroup3" value="อื่นๆ">
                                                    <label class="form-check-label">อื่นๆ</label>
                                                </div>
                                            </div>

                                            <div class="col-md-4 ">
                                                <div class="row mb-0 ">
                                                    <label class="col-3 col-form-label">น้ำหนัก/ตัว</label>
                                                    <div class="col-9">
                                                        <input type="text" class="form-control form-control-sm" id="n_weight" name="n_weight" placeholder="Grum." autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 ">
                                                <div class="row mb-0 ">
                                                    <label class="col-4 col-form-label">Model Life</label>
                                                    <div class="col-8">
                                                        <input type="text" class="form-control form-control-sm" id="n_madel" name="n_madel" placeholder="ปี" autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 ">
                                                <div class="row mb-0 ">
                                                    <label class="col-4 col-form-label">จุดระวังพิเศษ</label>
                                                    <div class="col-8">
                                                        <input type="text" class="form-control form-control-sm" id="n_remark" name="n_remark" placeholder="..." autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4 ">
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        Volume : &nbsp;
                                                    </label>
                                                    <input class="form-check-input" type="checkbox" name="n_volume" id="n_volume" value="ลูกค้าไม่แจ้ง">
                                                    <label class="form-check-label">
                                                        ลูกค้าไม่แจ้ง
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4 ">
                                                <div class="row mb-0 ">
                                                    <label class="col-4 col-form-label">ปริมาณ/เดือน</label>
                                                    <div class="col-8">
                                                        <input type="text" class="form-control form-control-sm" id="n_amount_mk" name="n_amount_mk" placeholder="กก." autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 ">
                                                <div class="row mb-0 ">
                                                    <label class="col-4 col-form-label">ปริมาณ/ปี</label>
                                                    <div class="col-8">
                                                        <input type="text" class="form-control form-control-sm" id="n_amount_yk" name="n_amount_yk" placeholder="กก." autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4"></div>
                                            <div class="col-md-4">
                                                <div class="row mb-0 ">
                                                    <label class="col-4 col-form-label">ปริมาณ/เดือน</label>
                                                    <div class="col-8">
                                                        <input type="text" class="form-control form-control-sm " id="n_amount_mitem" name="n_amount_mitem" placeholder="ชิ้น" autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 ">
                                                <div class="row mb-0 ">
                                                    <label class="col-4 col-form-label">ปริมาณ/ปี</label>
                                                    <div class="col-8">
                                                        <input type="text" class="form-control form-control-sm " id="n_amount_yitem" name="n_amount_yitem" placeholder="ชิ้น" autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- exit -->

                                            <div class="col-md-2 mb-1">
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label col-form-lable">
                                                        วัดความหนา
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-1 mb-1">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="n_thickness" id="n_thickness1" value="X-ray" required>
                                                    <label class="form-check-label">
                                                        X-ray
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-1 mb-1">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="n_thickness" id="n_thickness2" value="Thickness">
                                                    <label class="form-check-label">
                                                        Thickness
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2 mb-1">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="n_thickness" id="n_thickness3" value="เครื่องชั่ง">
                                                    <label class="form-check-label">
                                                        เครื่องชั่ง
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-1 mb-1">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="n_thickness" id="n_thickness4" value="ไม่ระบุ">
                                                    <label class="form-check-label">
                                                        ไม่ระบุ
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2 mb-1">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="n_thickness" id="n_thickness5" value="ลูกค้ากำหนด">
                                                    <label class="form-check-label">
                                                        ลูกค้ากำหนด
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2 mb-1">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="n_thickness" id="n_thickness6" value="SPZกำหนด">
                                                    <label class="form-check-label  col-md-7">
                                                        Spz กำหนด
                                                    </label>
                                                    <input type="text" class="form-control form-control-sm  col-11" name="n_thickness_other" id="n_thickness_other" placeholder="..." autocomplete="off">
                                                </div>
                                            </div>
                                            <!-- ปิด -->

                                            <div class="col-md-2 mb-1">
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label col-form-lable">
                                                        การตรวจสอบ
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-1">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="n_examine" id="n_examine1" value="สุ่มตรวจสอบไม่เกิน" required>
                                                    <label class="form-check-label">
                                                        สุ่มตรวจสอบไม่เกิน &nbsp;
                                                    </label>
                                                    <input type="text" class="form-control form-control-sm col-4" id="n_examine_percen" name="n_examine_percen" placeholder="%" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="col-md-7 mb-1">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="n_examine" id="n_examine2" value="ตรวจสอบ100">
                                                    <label class="form-check-label">
                                                        ตรวจสอบ 100%
                                                    </label>
                                                </div>
                                            </div>

                                            <!-- ปิด -->

                                            <!-- <div class="col-md-5 mb-1">
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label col-form-lable">
                                                    จำนวนที่รับเข้า &nbsp;
                                                </label>
                                                <input type="text" class="form-control form-control-sm col-4" id="" name="" placeholder="ชิ้น"> &nbsp;
                                                <input type="text" class="form-control form-control-sm col-4" id="" name="" placeholder="กก.">
                                            </div>
                                        </div>
                                        <div class="col-md-7 mb-1">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="" id="" value="">
                                                <label class="form-check-label">
                                                    ภาชนะบรรจุ &nbsp;
                                                </label>
                                                <input type="text" class="form-control form-control-sm col-4" id="" name="" placeholder="ชิ้น"> &nbsp;
                                                <label class="form-check-label col-form-lable">
                                                    Box / ถุง / กล่อง
                                                </label>
                                            </div>
                                        </div> -->

                                            <!-- ปิด -->
                                            <div class="col-md-2 mb-1">
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label col-form-lable">
                                                        มาตรฐานการบรรจุ
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-1">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="n_box" id="n_box1" value="ใส่ Box ลูกค้า" required autocomplete="off">
                                                    <label class="form-check-label">
                                                        ใส่ Box ลูกค้า &nbsp;
                                                    </label>
                                                    <input type="text" class="form-control form-control-sm col-4" id="n_boxk" name="n_boxk" placeholder="กก./ชิ้น" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="col-md-2 mb-1">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="n_box" id="n_box2" value="ใส่ถุงละ" autocomplete="off">
                                                    <label class="form-check-label">
                                                        ใส่ถุงละ &nbsp;
                                                    </label>
                                                    <input type="text" class="form-control form-control-sm col-6" id="n_itembag" name="n_itembag" placeholder="ชิ้น" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="col-md-2 mb-1">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="n_box" id="n_box3" value="customer_ref" autocomplete="off">
                                                    <label class="form-check-label">
                                                        Customer Ref &nbsp;
                                                    </label> 
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-1">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="n_box" id="n_box4" value="spz_ref" autocomplete="off">
                                                    <label class="form-check-label">
                                                        SPZ REF &nbsp;
                                                    </label>
                                                    <input type="text" class="form-control form-control-sm col-8" id="ref" name="ref" placeholder="เลขที่อ้างอิง" autocomplete="off">
                                                </div>
                                            </div>

                                            <!-- ปิด -->

                                            <div class="col-md-2 mb-1">
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label col-form-lable">
                                                        การรับ-ส่งสินค้า
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-1 mb-1">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="n_inout_procuct" id="n_inout_procuct1" value="ลูกค้า" required autocomplete="off">
                                                    <label class="form-check-label">
                                                        ลูกค้า
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2 mb-1">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="n_inout_procuct" id="n_inout_procuct2" value="S.P.ZINC" autocomplete="off">
                                                    <label class="form-check-label">
                                                        S.P.ZINC
                                                    </label>
                                                </div>
                                            </div>
                                            <!-- <div class="col-md-2 mb-1">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="n_inout_procuct" id="n_inout_procuct3" value="การตลากฃด">
                                                    <label class="form-check-label">
                                                        การตลากฃด
                                                    </label>
                                                </div>
                                            </div> -->
                                            <div class="col-md-7 mb-1">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="n_inout_procuct" id="n_inout_procuct4" value="อื่นๆ" autocomplete="off">
                                                    <label class="form-check-label col-4">
                                                        หมายเหตุ &nbsp;
                                                    </label>
                                                    <input type="text" class="form-control form-control-sm col-8" name="n_inout_other" id="n_inout_other" placeholder="..." autocomplete="off">
                                                </div>
                                            </div>

                                            <!-- ปิด -->


                                            <div class="col-md-2 mb-1">
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label col-form-lable">
                                                        การเปิดบิลตัวอย่าง
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-1 mb-1">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="n_open_fly" id="n_open_fly1" value="ฟรี" required autocomplete="off">
                                                    <label class="form-check-label">
                                                        ฟรี
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-1 mb-1">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="n_open_fly" id="n_open_fly2" value="คิดเงิน" autocomplete="off">
                                                    <label class="form-check-label">
                                                        คิดเงิน
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-1">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="n_open_fly" id="n_open_fly3" value="คิดเหมา" autocomplete="off">
                                                    <label class="form-check-label col-4">
                                                        คิดเหมา &nbsp;
                                                    </label>
                                                    <input type="text" class="form-control form-control-sm col-7" name="n_open_flythink" id="n_open_flythink" placeholder="..." autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="col-md-2 mb-1">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="n_open_fly" id="n_open_fly4" value="บิลชั่วคราว" autocomplete="off">
                                                    <label class="form-check-label">
                                                        บิลชั่วคราว
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-1">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="n_open_fly" id="n_open_fly5" value="ใบกำกับภาษี" autocomplete="off">
                                                    <label class="form-check-label">
                                                        ใบกำกับภาษี
                                                    </label>
                                                </div>
                                            </div>
                                            <!-- ปิด -->

                                            <div class="col-md-4">
                                                <div class="row mb-0 ">
                                                    <label class="col-3 col-form-label">เลขที่บิล</label>
                                                    <div class="col-9">
                                                        <input type="text" class="form-control form-control-sm" id="n_bin_number" name="n_bin_number" placeholder="เลขที่บิล" autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="row mb-0 ">
                                                    <label class="col-3 col-form-label">ผู้เปิดบิล</label>
                                                    <div class="col-9">
                                                        <input type="text" class="form-control form-control-sm" id="n_userbin_name" name="n_userbin_name" placeholder="ผู้เปิดบิล" autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="row mb-0 ">
                                                    <label class="col-2 col-form-label">วันที่</label>
                                                    <div class="col-10">
                                                        <input type="text" class="form-control form-control-sm datetimepicker-input" id="n_bindate" name="n_bindate" data-toggle="datetimepicker" autocomplete="off" data-target="#n_bindate" placeholder="วันที่ออกใบจัดงานใหม่" />
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- ปิด -->

                                            <div class="col-md-3">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="n_approve_data" id="n_approve_data" value="อนุมัติเพิ่มในฐานระบบ" autocomplete="off">
                                                    <label class="form-check-label col-form-lable">
                                                        อนุมัติเพิ่มในฐานระบบ
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="row mb-0 ">
                                                    <label class="col-5 col-form-label">รหัสสินค้าในระบบ ECACC</label>
                                                    <div class="col-6">
                                                        <input type="text" class="form-control form-control-sm" id="n_id_ecacc" name="n_id_ecacc" autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <div class="col-md-4">
                                                <div class="row mb-0 ">
                                                    <label class="col-3 col-form-label">ผู้อนุมัติ</label>
                                                    <div class="col-9">
                                                        <input type="text" class="form-control form-control-sm" id="" name="" placeholder="ผู้อนุมัติ">
                                                    </div>
                                                </div>
                                            </div> -->

                                            <!-- ปิด -->

                                            <div class="col-md-5">
                                                <div class="row mb-0 ">
                                                    <label class="col-5 col-form-label">อ้างอิงใบเสนอราคาเลขที่</label>
                                                    <div class="col-6">
                                                        <input type="text" class="form-control form-control-sm" id="n_nuote_nuote" name="n_nuote_nuote" autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="row mb-0 ">
                                                    <label class="col-4 col-form-label">วันที่เสนอราคา</label>
                                                    <div class="col-8">
                                                        <input type="text" class="form-control form-control-sm datetimepicker-input" id="n_bid_date" name="n_bid_date" required autocomplete="off" data-toggle="datetimepicker" data-target="#n_bid_date" placeholder="วันที่ออกใบจัดงานใหม่" />
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ปิด -->

                                            <div class="col-md-1">
                                                <div class="row mb-1">
                                                    <button type="submit" class="btn btn-sm btn-info"><?= $save ?></button>
                                                </div>
                                            </div>
                                            <div class="col-md-1">

                                                <div class="row mb-1">
                                                    <button type="reset" class="btn btn-sm btn-secondary"><?= $reset  ?></button>
                                                </div>
                                            </div>
                                        </div>

                                    </form>

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
        // require_once 'modal.php';
        require_once '../footer/footer.html' ?>
    </div>
    <?php require_once '../header/js.php' ?>

    <script src="js.js"></script>
</body>

</html>