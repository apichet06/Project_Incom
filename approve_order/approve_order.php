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
         <?php
          $n_id = $_GET['n_id'];
          $sql = mysqli_query($conn,"SELECT  * FROM new_order a 
          left join customer b 
          on a.c_id = b.c_id 
          left join part c 
          on a.pa_id = c.pa_id
          Where a.n_id = '$n_id' ")or die(mysqli_error($conn)); 
          $rs = mysqli_fetch_array($sql);
         
         ?>
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
                                    <div class="row">
                                        <div class="col-10">
                                            <h3 class="card-title">
                                        <i class="fas fa-file-alt mr-1"></i> สร้างใบงานใหม่</h3>
                                    </div>
                                        <div class="col-2 text-right"><a href="index.php"><?=$uturn?></a></div>
                                    </div>
                                     
                                </div>
                                <div class="card-body">
                                    <form action="" id="approve">
                                        <div class="row align-items-center">
                                            <div class="col-md-10 "></div>
                                            <div class="col-md-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="n_customerStatus" id="n_customerStatus1" value="ลูกค้าใหม่" <?=$rs['n_customerStatus']=="ลูกค้าใหม่" ? "checked" :"" ?>>
                                                    <label class="form-check-label">
                                                        ลูกค้าใหม่
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="n_customerStatus" id="n_customerStatus2" value="ลูกค้าเดิม"<?=$rs['n_customerStatus']=="ลูกค้าเดิม" ? "checked" :"" ?>>
                                                    <label class="form-check-label">
                                                        ลูกค้าเดิม 
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="row mb-0">
                                                    <label class="col-5 col-form-label">วันที่ออกใบจัดงานใหม่</label>
                                                    <div class="col-7">
                                                        <input type="text" class="form-control form-control-sm datetimepicker-input" id="n_datejob" name="n_datejob" value="<?=$rs['n_datejob']?>" data-toggle="datetimepicker" data-target="#n_datejob" placeholder="วันที่ออกใบจัดงานใหม่" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 ">
                                                <div class="row mb-0">
                                                    <label class="col-3 col-form-label">เลขที่</label>
                                                    <div class="col-9">
                                                        <input type="text" class="form-control form-control-sm" id="n_number" name="n_number" placeholder="เลขที่" value="<?=$rs['n_number']?>" disabled>
                                                        <input type="hidden" class="form-control form-control-sm" name="n_id" placeholder="เลขที่" value="<?=$rs['n_id']?>" >  
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2 ">
                                                <div class="form-check-inline">
                                                    <input class="form-check-input" type="radio" name="n_specstatus" id="n_specstatus1" value="ชั่วคราว" <?=$rs['n_specstatus']=="ชั่วคราว" ? "checked" :"" ?>  >
                                                    <label class="form-check-label">
                                                        เปลี่ยน Spac ชั่วคราว
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2 ">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="n_specstatus" id="n_specstatus2" value="ถาวร" <?=$rs['n_specstatus']=="ถาวร" ? "checked" :"" ?>>
                                                    <label class="form-check-label"></label>
                                                    เปลี่ยน Spac ถาวร
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="row mb-0 align-items-center">
                                                    <div class="col-md-8 ">
                                                        <div class="row mb-0 align-items-center">
                                                            <div class="col-md-7">
                                                                <div class="row mb-0 ">
                                                                    <label class="col-3 col-form-label">ชื่อลูกค้า</label>
                                                                    <div class="col-9">
                                                                        <?php
                                                                        $sql = mysqli_query($conn, "SELECT c_id,customer_name FROM customer");
                                                                        ?>
                                                                        <select name="c_id" id="c_id" class="form-control form-control-sm  " required>
                                                                            <option value="">ชื่อลูกค้า</option>
                                                                            <?php while ($rs0 = mysqli_fetch_array($sql)) { ?>
                                                                                <option value="<?= $rs0['c_id'] ?>"<?=$rs0['c_id']==$rs['c_id']?"selected":"" ?>><?= $rs0['customer_name'] ?></option>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                     
                                                                </div>
                                                            </div>
                                                            <div class="col-md-5">
                                                                <div class="row mb-0 ">
                                                                    <label class="col-4 col-form-label">รหัสลูกค้า</label>
                                                                    <div class="col-8">
                                                                        <input type="text" class="form-control-plaintext form-control-sm" name="customer_id" id="customer_id" placeholder="รหัสลูกค้า" value="<?=$rs['customer_id']?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="row mb-0 ">
                                                                    <label class="col-2 col-form-label">PART NO.</label>
                                                                    <div class="col-10">
                                                                        <?php
                                                                        $sql = mysqli_query($conn, "SELECT pa_id,pa_name FROM part");
                                                                        ?>
                                                                        <select name="pa_id" id="pa_id" class="form-control form-control-sm" required>
                                                                            <option value="">PART NO.</option>
                                                                            <?php while ($rs0 = mysqli_fetch_array($sql)) { ?>
                                                                                <option value="<?= $rs0['pa_id'] ?>"<?= $rs0['pa_id'] == $rs['pa_id'] ? "selected":"" ?>><?= $rs0['pa_name'] ?></option>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 ">
                                                                <div class="row mb-0 ">
                                                                    <label class="col-2 col-form-label">PART NAME.</label>
                                                                    <div class="col-10">
                                                                        <input type="text" class="form-control-plaintext form-control-sm" id="pa_name" name="pa_name" placeholder="PART NAME."  value="<?=$rs['pa_name']?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 ">
                                                                <div class="row mb-0 ">
                                                                    <label class="col-3 col-form-label">Space ชุบ</label>
                                                                    <div class="col-9">
                                                                        <input type="text" class="form-control-plaintext form-control-sm" id="pa_spec" name="pa_spec" placeholder="Space ชุบ" value="<?=$rs['pa_spec']?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 ">
                                                                <div class="row mb-0 ">
                                                                    <label class="col-2 col-form-label">สีชุบ</label>
                                                                    <div class="col-10">
                                                                        <input type="text" class="form-control-plaintext form-control-sm" id="pa_color" name="pa_color" placeholder="สีชุบ" value="<?=$rs['pa_color']?>">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 ">
                                                                <div class="row mb-0 ">
                                                                    <label class="col-3 col-form-label">ความหนา</label>
                                                                    <div class="col-9">
                                                                        <input type="text" class="form-control-plaintext form-control-sm" id="pa_thickness" placeholder="ความหนา" value="<?=$rs['pa_thickness']?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 ">
                                                                <div class="row mb-0 ">
                                                                    <label class="col-2 col-form-label">Lot NO.</label>
                                                                    <div class="col-10">
                                                                        <input type="text" class="form-control form-control-sm" id="n_lot" name="n_lot" placeholder="Lot NO." value="<?=$rs['n_lot']?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 ">
                                                                <div class="row mb-0">
                                                                    <label class="col-3 col-form-label">วันที่รับเข้า</label>
                                                                    <div class="col-9">
                                                                        <input type="text" class="form-control form-control-sm datetimepicker-input" name="n_admissiondate" id="n_admissiondate" data-toggle="datetimepicker" data-target="#n_admissiondate" placeholder="วันที่รับเข้า" value="<?=$rs['n_admissiondate']?>"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 ">
                                                                <div class="row mb-0">
                                                                    <label class="col-4 col-form-label">วันที่ต้องการ</label>
                                                                    <div class="col-8">
                                                                        <input type="text" class="form-control form-control-sm datetimepicker-input" name="n_desired" id="n_desired" data-toggle="datetimepicker" data-target="#n_desired" placeholder="วันที่ต้องการ" value="<?=$rs['n_desired']?>"/>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="card mb-2">
                                                            <div class="card-body text-center">
                                                                <?php if($rs['pa_img'] == ""){ ?>
                                                                    <img src="../img/no-image.jpg" id="pa_img" style="height:190px;" class="img-thumbnail">
                                                                <?php }else{ ?>
                                                                    <img src="../part/image/<?=$rs['pa_img']?>" id="pa_img" style="height:190px;" class="img-thumbnail">
                                                                <?php } ?>
                                                               
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
                                                    <input class="form-check-input" type="radio" name="n_line" id="n_line1" value="ALZ" <?=$rs['n_line']=="ALZ"? "checked":""?>>
                                                    <label class="form-check-label">
                                                        ALZ &nbsp;
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="n_line" id="n_line2" value="ZnFe"  <?=$rs['n_line']=="ZnFe"? "checked":""?>>
                                                    <label class="form-check-label">
                                                        ZnFe &nbsp;
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="n_line" id="n_line3" value="PP"  <?=$rs['n_line']=="PP"? "checked":""?>>
                                                    <label class="form-check-label">
                                                        PP &nbsp;
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="row mb-0">
                                                    <label class="col-3 col-form-label">Barel</label>
                                                    <div class="col-9">
                                                        <input type="text" value="<?=$rs['n_barel']?>" class="form-control form-control-sm" id="n_barel" name="n_barel" placeholder="KG/Barel" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="row mb-0">
                                                    <label class="col-3 col-form-label">Rack</label>
                                                    <div class="col-9">
                                                        <input type="text" value="<?=$rs['n_rack']?>" class="form-control form-control-sm" id="n_rack" name="n_rack" placeholder="ตัว/JIG">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ############################# -->

                                            <div class="col-md-2">
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        Baking &nbsp;
                                                    </label>
                                                    <input class="form-check-input" type="radio" name="n_baking" id="n_baking1" value="Yes"  <?=$rs['n_baking']=="Yes"? "checked":""?>>
                                                    <label class="form-check-label">
                                                        Yes &nbsp;
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="n_baking" id="n_baking2" value="No" <?=$rs['n_baking']=="No"? "checked":""?>>
                                                    <label class="form-check-label">
                                                        No &nbsp;
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="row">
                                                    <label class="col-4 col-form-label">ความปลอดภัยด้านผลิตภัณฑ์(ถ้ามี)</label>
                                                    <div class="col-8">
                                                        <input type="text" value="<?=$rs['n_product_safety']?>" class="form-control form-control-sm" id="n_product_safety" name="n_product_safety" placeholder="...">
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
                                                        <input type="text" value="<?=$rs['n_white_rust']?>" class="form-control form-control-sm" id="n_white_rust" name="n_white_rust" placeholder="ชม.">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="row mb-0 ">
                                                    <label class="col-5 col-form-label">สนิมแดง</label>
                                                    <div class="col-7">
                                                        <input type="text" value="<?=$rs['n_red_rust']?>" class="form-control form-control-sm" id="n_red_rust" name="n_red_rust" placeholder="ชม.">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 ">
                                                <div class=" form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="n_customeritem" id="n_customeritem1" value="ลูกค้าต้องการ" <?=$rs['n_customeritem']=="ลูกค้าต้องการ"? "checked":""?>>
                                                    <label class="form-check-label">
                                                        ลูกค้าต้องการ &nbsp;
                                                    </label>
                                                    <input type="text" value="<?=$rs['n_item']?>" class="form-control form-control-sm col-7" name="n_item" id="n_item" placeholder="ชิ้น">
                                                </div>
                                            </div>
                                            <div class="col-md-3 ">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="n_customeritem" id="n_customeritem2" value="ลูกค้าไม่ต้องการ" <?=$rs['n_customeritem']=="ลูกค้าไม่ต้องการ"? "checked":""?>>
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
                                                    <input class="form-check-input" type="radio" name="n_producgroup" id="n_producgroup1" value="Screw_Bolt" <?=$rs['n_producgroup']=="Screw_Bolt"? "checked":""?>>
                                                    <label class="form-check-label">
                                                        Screw/Bolt
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-1 mb-1">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="n_producgroup" id="n_producgroup2" value="Spring" <?=$rs['n_producgroup']=="Spring"? "checked":""?>>
                                                    <label class="form-check-label">
                                                        Spring
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-1  mb-1">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="n_producgroup" id="n_producgroup3" value="Washer" <?=$rs['n_producgroup']=="Washer"? "checked":""?>>
                                                    <label class="form-check-label">
                                                        Washer
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-1  mb-1">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="n_producgroup" id="n_producgroup4" value="Clip_Clamp" <?=$rs['n_producgroup']=="Clip_Clamp"? "checked":""?>>
                                                    <label class="form-check-label">
                                                        Clip/Clamp
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-1  mb-1">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="n_producgroup" id="n_producgroup5" value="Stamping" <?=$rs['n_producgroup']=="Stamping"? "checked":""?>>
                                                    <label class="form-check-label">
                                                        Stamping
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-1  mb-1">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="n_producgroup" id="n_producgroup6" value="Assy" <?=$rs['n_producgroup']=="Assy"? "checked":""?>>
                                                    <label class="form-check-label">
                                                        Assy
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-1  mb-1">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="n_producgroup" id="n_producgroup7" value="Stud" <?=$rs['n_producgroup']=="Stud"? "checked":""?>>
                                                    <label class="form-check-label">
                                                        Stud
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-1">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="n_producgroup" id="n_producgroup8" value="อื่นๆ" <?=$rs['n_producgroup']=="อื่นๆ"? "checked":""?>>
                                                    <label class="form-check-label col-3">
                                                        อื่นๆ &nbsp;
                                                    </label>
                                                    <input type="text" value="<?=$rs['n_producgroupother']?>" class="form-control form-control-sm col-9" name="n_producgroupother" id="n_producgroupother" placeholder="...">
                                                </div>
                                            </div>


                                            <div class="col-md-3 ">
                                                <div class="row mb-0 ">
                                                    <label class="col-6 col-form-label">ยานยนต์ประเภท</label>
                                                    <div class="col-6">
                                                        <input type="text" value="<?=$rs['n_automotivetype']?>" class="form-control form-control-sm " id="n_automotivetype" name="n_automotivetype" placeholder="...">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 ">
                                                <div class="row mb-0 ">
                                                    <label class="col-3 col-form-label">ค่ายรถ</label>
                                                    <div class="col-9">
                                                        <input type="text" value="<?=$rs['n_carcamp']?>" class="form-control form-control-sm " id="n_carcamp" name="n_carcamp" placeholder="...">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2 ">
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        กลุ่มงาน &nbsp;
                                                    </label>
                                                    <input class="form-check-input" type="radio" name="n_workgroup" id="n_workgroup1" value="2ล้อ" <?=$rs['n_workgroup']=="2ล้อ"? "checked":""?>>
                                                    <label class="form-check-label">
                                                        2 ล้อ
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4 ">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="n_workgroup" id="n_workgroup2" value="4ล้อ" <?=$rs['n_workgroup']=="4ล้อ"? "checked":""?>>
                                                    <label class="form-check-label">4 ล้อ</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="n_workgroup" id="n_workgroup3" value="Electonic" <?=$rs['n_workgroup']=="Electonic"? "checked":""?>>
                                                    <label class="form-check-label">Electonic</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="n_workgroup" id="n_workgroup3" value="อื่นๆ" <?=$rs['n_workgroup']=="อื่นๆ"? "checked":""?>>
                                                    <label class="form-check-label">อื่นๆ</label>
                                                </div>
                                            </div>

                                            <div class="col-md-4 ">
                                                <div class="row mb-0 ">
                                                    <label class="col-3 col-form-label">น้ำหนัก/ตัว</label>
                                                    <div class="col-9">
                                                        <input type="text" value="<?=$rs['n_weight']?>" class="form-control form-control-sm" id="n_weight" name="n_weight" placeholder="Grum.">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 ">
                                                <div class="row mb-0 ">
                                                    <label class="col-4 col-form-label">model Life</label>
                                                    <div class="col-8">
                                                        <input type="text" value="<?=$rs['n_madel']?>" class="form-control form-control-sm" id="n_madel" name="n_madel" placeholder="ปี">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 ">
                                                <div class="row mb-0 ">
                                                    <label class="col-4 col-form-label">จุดระวังพิเศษ</label>
                                                    <div class="col-8">
                                                        <input type="text" value="<?=$rs['n_remark']?>" class="form-control form-control-sm" id="n_remark" name="n_remark" placeholder="...">
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
                                                        <input type="text" value="<?=$rs['n_amount_mk']?>" class="form-control form-control-sm" id="n_amount_mk" name="n_amount_mk" placeholder="กก.">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 ">
                                                <div class="row mb-0 ">
                                                    <label class="col-4 col-form-label">ปริมาณ/ปี</label>
                                                    <div class="col-8">
                                                        <input type="text" value="<?=$rs['n_amount_yk']?>" class="form-control form-control-sm" id="n_amount_yk" name="n_amount_yk" placeholder="กก.">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4"></div>
                                            <div class="col-md-4">
                                                <div class="row mb-0 ">
                                                    <label class="col-4 col-form-label">ปริมาณ/เดือน</label>
                                                    <div class="col-8">
                                                        <input type="text" value="<?=$rs['n_amount_mitem']?>" class="form-control form-control-sm " id="n_amount_mitem" name="n_amount_mitem" placeholder="ชิ้น">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 ">
                                                <div class="row mb-0 ">
                                                    <label class="col-4 col-form-label">ปริมาณ/ปี</label>
                                                    <div class="col-8">
                                                        <input type="text" value="<?=$rs['n_amount_yitem']?>" class="form-control form-control-sm " id="n_amount_yitem" name="n_amount_yitem" placeholder="ชิ้น">
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
                                                    <input class="form-check-input" type="radio" name="n_thickness" id="n_thickness1" value="X-ray" <?=$rs['n_thickness']=="X-ray"? "checked":""?>>
                                                    <label class="form-check-label">
                                                        X-ray
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-1 mb-1">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="n_thickness" id="n_thickness2" value="Thickness" <?=$rs['n_thickness']=="Thickness"? "checked":""?>>
                                                    <label class="form-check-label">
                                                        Thickness
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2 mb-1">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="n_thickness" id="n_thickness3" value="เครื่องชั่ง" <?=$rs['n_thickness']=="เครื่องชั่ง"? "checked":""?>>
                                                    <label class="form-check-label">
                                                        เครื่องชั่ง
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-1 mb-1">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="n_thickness" id="n_thickness4" value="ไม่ระบุ" <?=$rs['n_thickness']=="ไม่ระบุ"? "checked":""?>>
                                                    <label class="form-check-label">
                                                        ไม่ระบุ
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2 mb-1">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="n_thickness" id="n_thickness5" value="ลูกค้ากำหนด" <?=$rs['n_thickness']=="ลูกค้ากำหนด"? "checked":""?>>
                                                    <label class="form-check-label">
                                                        ลูกค้ากำหนด
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2 mb-1">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="n_thickness" id="n_thickness6" value="Spzกำหนด" <?=$rs['n_thickness']=="Spzกำหนด"? "checked":""?>>
                                                    <label class="form-check-label col-md-7">
                                                        Spz กำหนด
                                                    </label>
                                                    <input type="text" value="<?=$rs['n_thickness_other']?>" class="form-control form-control-sm col-md-7" name="n_thickness_other" id="n_thickness_other" placeholder="...">
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
                                                    <input class="form-check-input" type="radio" name="n_examine" id="n_examine1" value="สุ่มตรวจสอบไม่เกิน" <?=$rs['n_examine']=="สุ่มตรวจสอบไม่เกิน"? "checked":""?>>
                                                    <label class="form-check-label">
                                                        สุ่มตรวจสอบไม่เกิน &nbsp;
                                                    </label>
                                                    <input type="text" value="<?=$rs['n_examine_percen']?>" class="form-control form-control-sm col-4" id="n_examine_percen" name="n_examine_percen" placeholder="%">
                                                </div>
                                            </div>
                                            <div class="col-md-7 mb-1">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="n_examine" id="n_examine2" value="ตรวจสอบ100" <?=$rs['n_examine']=="ตรวจสอบ100"? "checked":""?>>
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
                                                <input type="text" value="<?=$rs['']?>" class="form-control form-control-sm col-4" id="" name="" placeholder="ชิ้น"> &nbsp;
                                                <input type="text" value="<?=$rs['']?>" class="form-control form-control-sm col-4" id="" name="" placeholder="กก.">
                                            </div>
                                        </div>
                                        <div class="col-md-7 mb-1">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="" id="" value="">
                                                <label class="form-check-label">
                                                    ภาชนะบรรจุ &nbsp;
                                                </label>
                                                <input type="text" value="<?=$rs['']?>" class="form-control form-control-sm col-4" id="" name="" placeholder="ชิ้น"> &nbsp;
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
                                                    <input class="form-check-input" type="radio" name="n_box" id="n_box1" value="ใส่ Box ลูกค้า" <?=$rs['n_box']=="ใส่ Box ลูกค้า"? "checked":""?>>
                                                    <label class="form-check-label">
                                                        ใส่ Box ลูกค้า &nbsp;
                                                    </label>
                                                    <input type="text" value="<?=$rs['n_boxk']?>" class="form-control form-control-sm col-4" id="n_boxk" name="n_boxk" placeholder="กก./ชิ้น" <?=$rs['n_box']=="กก./ชิ้น"? "checked":""?>>
                                                </div>
                                            </div>
                                            <div class="col-md-2 mb-1">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="n_box" id="n_box2" value="ใส่ถุงละ"<?=$rs['n_box']=="ใส่ถุงละ"? "checked":""?>>
                                                    <label class="form-check-label">
                                                        ใส่ถุงละ &nbsp;
                                                    </label>
                                                    <input type="text" value="<?=$rs['n_itembag']?>" class="form-control form-control-sm col-6" id="n_itembag" name="n_itembag" placeholder="ชิ้น">
                                                </div>
                                            </div>
                                            <div class="col-md-2 mb-1">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="n_box" id="n_box3" value="customer_ref" <?=$rs['n_box']=="customer_ref"? "checked":""?>>
                                                    <label class="form-check-label">
                                                        customer ref &nbsp;
                                                    </label> 
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-1">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="n_box" id="n_box4" value="spz_ref" <?=$rs['n_box']=="spz_ref"? "checked":""?>>
                                                    <label class="form-check-label">
                                                        spz ref &nbsp;
                                                    </label>
                                                    <input type="text" value="<?=$rs['ref']?>" class="form-control form-control-sm col-8" id="ref" name="ref" placeholder="เลขที่อ้างอิง">
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
                                                    <input class="form-check-input" type="radio" name="n_inout_procuct" id="n_inout_procuct1" value="ลูกค้า" <?=$rs['n_inout_procuct']=="ลูกค้า"? "checked":""?>>
                                                    <label class="form-check-label">
                                                        ลูกค้า
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2 mb-1">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="n_inout_procuct" id="n_inout_procuct2" value="S.P.ZINC" <?=$rs['n_inout_procuct']=="S.P.ZINC"? "checked":""?>>
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
                                                    <input class="form-check-input" type="radio" name="n_inout_procuct" id="n_inout_procuct4" value="อื่นๆ" <?=$rs['n_inout_procuct']=="อื่นๆ"? "checked":""?>>
                                                    <label class="form-check-label col-4">
                                                        หมายเหตุ &nbsp;
                                                    </label>
                                                    <input type="text" value="<?=$rs['n_inout_other']?>" class="form-control form-control-sm col-8" name="n_inout_other" id="n_inout_other" placeholder="...">
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
                                                    <input class="form-check-input" type="radio" name="n_open_fly" id="n_open_fly1" value="ฟรี" <?=$rs['n_open_fly']=="ฟรี"? "checked":""?>>
                                                    <label class="form-check-label">
                                                        ฟรี
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-1 mb-1">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="n_open_fly" id="n_open_fly2" value="คิดเงิน" <?=$rs['n_open_fly']=="คิดเงิน"? "checked":""?>>
                                                    <label class="form-check-label">
                                                        คิดเงิน
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-1">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="n_open_fly" id="n_open_fly3" value="คิดเหมา" <?=$rs['n_open_fly']=="คิดเหมา"? "checked":""?>>
                                                    <label class="form-check-label col-4">
                                                        คิดเหมา &nbsp;
                                                    </label>
                                                    <input type="text" value="<?=$rs['n_open_flythink']?>" class="form-control form-control-sm col-7" name="n_open_flythink" id="n_open_flythink" placeholder="...">
                                                </div>
                                            </div>
                                            <div class="col-md-2 mb-1">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="n_open_fly" id="n_open_fly4" value="บิลชั่วคราว" <?=$rs['n_open_fly']=="บิลชั่วคราว"? "checked":""?>>
                                                    <label class="form-check-label">
                                                        บิลชั่วคราว
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-1">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="n_open_fly" id="n_open_fly5" value="ใบกำกับภาษี" <?=$rs['n_open_fly']=="ใบกำกับภาษี"? "checked":""?>>
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
                                                        <input type="text" value="<?=$rs['n_bin_number']?>" class="form-control form-control-sm" id="n_bin_number" name="n_bin_number" placeholder="เลขที่บิล">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="row mb-0 ">
                                                    <label class="col-3 col-form-label">ผู้เปิดบิล</label>
                                                    <div class="col-9">
                                                        <input type="text" value="<?=$rs['n_userbin_name']?>" class="form-control form-control-sm" id="n_userbin_name" name="n_userbin_name" placeholder="ผู้เปิดบิล">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="row mb-0 ">
                                                    <label class="col-2 col-form-label">วันที่</label>
                                                    <div class="col-10">
                                                        <input type="text" value="<?=$rs['n_bindate']?>" class="form-control form-control-sm datetimepicker-input" id="n_bindate" name="n_bindate" data-toggle="datetimepicker" data-target="#n_bindate" placeholder="วันที่ออกใบจัดงานใหม่" />
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- ปิด -->

                                            <div class="col-md-3">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="n_approve_data" id="n_approve_data" value="อนุมัติเพิ่มในฐานระบบ" <?=$rs['n_approve_data']=="อนุมัติเพิ่มในฐานระบบ"? "checked":""?>>
                                                    <label class="form-check-label col-form-lable">
                                                        อนุมัติเพิ่มในฐานระบบ
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="row mb-0 ">
                                                    <label class="col-5 col-form-label">รหัสสินค้าในระบบ ECACC</label>
                                                    <div class="col-6">
                                                        <input type="text" value="<?=$rs['n_id_ecacc']?>" class="form-control form-control-sm" id="n_id_ecacc" name="n_id_ecacc">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <div class="col-md-4">
                                                <div class="row mb-0 ">
                                                    <label class="col-3 col-form-label">ผู้อนุมัติ</label>
                                                    <div class="col-9">
                                                        <input type="text" value="<?=$rs['']?>" class="form-control form-control-sm" id="" name="" placeholder="ผู้อนุมัติ">
                                                    </div>
                                                </div>
                                            </div> -->

                                            <!-- ปิด -->

                                            <div class="col-md-5">
                                                <div class="row mb-0 ">
                                                    <label class="col-5 col-form-label">อ้างอิงใบเสนอราคาเลขที่</label>
                                                    <div class="col-6">
                                                        <input type="text" value="<?=$rs['n_nuote_nuote']?>" class="form-control form-control-sm" id="n_nuote_nuote" name="n_nuote_nuote">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="row mb-0 ">
                                                    <label class="col-4 col-form-label">วันที่เสนอราคา</label>
                                                    <div class="col-8">
                                                        <input type="text" value="<?=$rs['n_bid_date']?>" class="form-control form-control-sm datetimepicker-input" id="n_bid_date" name="n_bid_date" data-toggle="datetimepicker" data-target="#n_bid_date" placeholder="วันที่ออกใบจัดงานใหม่" />
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ปิด -->

                                            <div class="col-md-1">
                                                <div class="row mb-1">
                                                    <button type="submit" class="btn btn-sm btn-info"><?=$approve?></button>
                                                </div>
                                            </div>
                                            <div class="col-md-1"> 
                                                <div class="row mb-1">
                                                    <button type="button" class="btn btn-sm btn-secondary reject"
                                                     data-n_id= "<?=$rs['n_id'];?>" 
                                                     data-toggle="modal"
                                                     data-target="#reject" ><?=$reject?></button>
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
        require_once 'modal.php';
        require_once '../footer/footer.html'; ?>
    </div>
    <?php require_once '../header/js.php' ?>

    <script src="js.js"></script>
</body>

</html>