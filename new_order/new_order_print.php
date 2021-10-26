<?php
    session_start();
    require_once '../conndb/conn.php';
    $n_number = @$_GET['n_number'];
    $sql01 = "SELECT * FROM new_order WHERE n_number = '$n_number'";
    $rs01 = mysqli_query($conn,$sql01);
    $rows01 = mysqli_fetch_array($rs01);

    $sql02 = "SELECT * FROM customer WHERE c_id = '".$rows01['c_id']."' ";
    $rs02 = mysqli_query($conn,$sql02);
    $rows02=mysqli_fetch_array($rs02);

    $sql03 = "SELECT * FROM part WHERE pa_id = '".$rows01['pa_id']."' ";
    $rs03 = mysqli_query($conn,$sql03);
    $rows03=mysqli_fetch_array($rs03)

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <?php require_once '../header/css.php';?>
    <title>Document</title>
    <style>
        body {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            background-color: #FAFAFA;
        }
        * {
            box-sizing: border-box;
            -moz-box-sizing: border-box;
        }
        .page {
            width: 210mm;
            min-height: 297mm;
            padding: 5mm;
            margin: 5mm auto;
            border: 1px #D3D3D3 solid;
            border-radius: 5px;
            background: white;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }
        .subpage {
            padding: 0cm;
            border: 2px gray solid;
            height: 350mm;
            /* width: 250mm; */
            outline: 0cm;
        }
        
        @page {
            size: A4;
            margin: 0;
        }
        @media print {
            html, body {
                width: 210mm;
                height: 297mm;        
            }
            .page {
                margin: 0;
                border: initial;
                border-radius: initial;
                width: initial;
                min-height: initial;
                box-shadow: initial;
                background: initial;
                page-break-after: always;
            }
        }
    </style>
    <style type="text/css">
        @font-face {
            font-family: 'angsana';
            src: url('fonts/angsana/angsana.eot');
            src: url('fonts/angsana/angsana.eot?#iefix') format('embedded-opentype'),
                url('fonts/angsana/angsana.woff2') format('woff2'),
                url('fonts/angsana/angsana.woff') format('woff'),
                url('fonts/angsana/angsana.ttf') format('truetype');
            font-weight: normal;
            font-style: normal;
        }
    </style>
</head>
<body style="font-family:angsana;font-size:13px;" onload="window.print(); window.onafterprint = window.close();">
    <div class="book">
        <!-- Page 1 -->
        <div class="page">
            <div class="container-fluid text-center">
                <table width="100%" border="0" cellpadding="5px"><!-- text-decoration:underline;text-decoration-style: dotted; -->
                    <tr>
                        <td width="25%" colspan="3" style="border-left:1px solid;border-top:1px solid;border-right:1px solid;">S.P.ZINC METAL Co.,Ltd</td>
                        <td width="50%" colspan="6" style="border-left:1px solid;border-top:1px solid;border-right:1px solid;border-bottom:1px solid;"rowspan="2"><font size="+2"><b>ใบจัดทำงานใหม่</b></font></td>
                        <td width="25%" colspan="3" style="border-left:1px solid;border-top:1px solid;border-right:1px solid;"align="left">
                            <?php if($rows01['n_customerStatus']=='ลูกค้าใหม่'){ ?>
                                &nbsp;☑&nbsp;ลูกค้าใหม่</td>
                            <?php }else{ ?>
                                &nbsp;▢&nbsp;ลูกค้าใหม่</td>
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" style="border-left:1px solid;border-bottom:1px solid;border-right:1px solid;">แผนกการตลาด</td>
                        <td colspan="2" style="border-left:1px solid;border-bottom:1px solid;border-right:1px solid;" align="left">
                            <?php if($rows01['n_customerStatus']=='ลูกค้าเดิม'){ ?>
                                &nbsp;☑&nbsp;ลูกค้าเดิม</td>
                            <?php }else{ ?>
                                &nbsp;▢&nbsp;ลูกค้าเดิม</td>
                            <?php } ?>
                        </td>
                    </tr>
                    <table width="100%" border="" cellpadding="5px">
                        <tr>
                            <td width="10%" colspan="3" align="left" style="border-left:1px solid;">&nbsp;วันที่จัดทำ</td>
                            <td width="15%" colspan="3" align="left" style="border-bottom:1px dotted;">&emsp;<?=$rows01['n_datejob']?></td>
                            <td width="5%" colspan="3" align="center">เลขที่</td>
                            <td width="15%" colspan="3" align="left" style="border-bottom:1px dotted;">&emsp;<?=$rows01['n_number']?></td>
                            <td width="15%" colspan="3" align="center" style="border-bottom:1px solid;">
                                <?php if($rows01['n_specstatus']=='ชั่วคราว'){ ?>
                                    &nbsp;<font size="+2">☑</font>&nbsp;SPEC ชั่วคราว</td>
                                <?php }else{ ?>
                                    &nbsp;<font size="+2">▢</font>&nbsp;SPEC ชั่วคราว</td>
                                <?php } ?>
                            </td>
                            <td width="15%" colspan="3" align="center" style="border-right:1px solid;border-bottom:1px solid;">
                                <?php if($rows01['n_specstatus']=='ถาวร'){ ?>
                                    &nbsp;<font size="+2">☑</font>&nbsp;SPEC ถาวร</td>
                                <?php }else{ ?>
                                    &nbsp;<font size="+2">▢</font>&nbsp;SPEC ถาวร</td>
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" align="left" style="border-left:1px solid;">&nbsp;ชื่อลูกค้า</td>
                            <td colspan="3" align="left" style="border-bottom:1px dotted;">&emsp;<?=$rows02['customer_name']?></td>
                            <td colspan="3" align="center" >&nbsp;รหัสลูกค้า</td>
                            <td colspan="3" align="left" style="border-bottom:1px dotted;border-right:1px solid;">&emsp;<?=$rows01['customer_id']?></td>
                            <td colspan="6" rowspan="7" style="border-right:1px solid; border-bottom:1px solid;"><img src="../part/image/<?=$rows03['pa_img']?>" width="175"></td>
                        </tr>
                        <!-- <tr>
                            <td colspan="3" align="left" style="border-left:1px solid;">&nbsp;ชื่อลูกค้า</td>
                            <td colspan="9" align="center"style="border-bottom:1px dotted;"><?=$rows02['customer_name']?></td>
                            <td colspan="3" style="border-left:1px solid;"></td>
                            <td colspan="3" style="border-right:1px solid;"></td>
                        </tr> -->
                        <tr>
                            <td colspan="3" align="left" style="border-left:1px solid;">&nbsp;Part No</td>
                            <td colspan="9" align="left"style="border-bottom:1px dotted;border-right:1px solid;">&emsp;<?=$rows01['pa_id']?></td>
                           
                        </tr>
                        <tr>
                            <td colspan="3" align="left" style="border-left:1px solid;">&nbsp;Part Name</td>
                            <td colspan="9" align="left"style="border-bottom:1px dotted;border-right:1px solid;">&emsp;<?=$rows01['pa_name']?></td>
                           
                        </tr>
                        <tr>
                            <td colspan="3" align="left" style="border-left:1px solid;">&nbsp;Spec ชุบ</td>
                            <td colspan="3" align="center"style="border-bottom:1px dotted;"><?=$rows03['pa_spec']?></td>
                            <td colspan="3" align="center" >&nbsp;สีชุบ</td>
                            <td colspan="3" align="center"style="border-bottom:1px dotted;border-right:1px solid;"><?=$rows03['pa_color']?></td>
                           
                        </tr>
                        <tr>
                            <td colspan="3" align="left" style="border-left:1px solid;">&nbsp;ความหนา</td>
                            <td colspan="3" align="center"style="border-bottom:1px dotted;"><?=$rows03['pa_thickness']?></td>
                            <td colspan="3" align="center" >&nbsp;Lot No</td>
                            <td colspan="3" align="center"style="border-bottom:1px dotted;border-right:1px solid;"><?=$rows01['n_lot']?></td>
                     
                        </tr>
                        <tr>
                            <td colspan="3" align="left" style="border-left:1px solid;">&nbsp;วันที่รับเข้า</td>
                            <td colspan="3" align="center"style="border-bottom:1px dotted;"><?=$rows01['n_admissiondate']?></td>
                            <td colspan="3" align="center"  >&nbsp;วันที่ต้องการ</td>
                            <td colspan="3" align="center"style="border-bottom:1px dotted;border-right:1px solid;"><?=$rows01['n_desired']?></td>
                            
                        </tr>
                        <tr>
                            <td colspan="3" align="left" style="border-left:1px solid;">&nbsp;Line ผลิต</td>
                            <td align="left">
                                <?php if($rows01['n_line']=='กลึง'){ ?>
                                    <font size="+1">☑</font> กลึง
                                <?php }else{ ?>
                                    <font size="+1">☐</font> กลึง
                                <?php }?>
                                <td style="border-bottom:1px dotted;">
                                    <?php if($rows01['n_line']=='กลึง'){ ?>
                                        <?=$rows01['n_lathe']?>
                                </td>
                                    <?php }?>
                            </td>
                            <td>
                                <?php if($rows01['n_line']=='RA'){ ?>
                                    <font size="+1">☑</font> RA
                                <?php }else{ ?>
                                    <font size="+1">☐</font> RA
                                <?php }?>
                            </td>
                            <td colspan="2">
                                <?php if($rows01['n_line']=='Znfe'){ ?>
                                    <font size="+1">☑</font> Znfe
                                <?php }else{ ?>
                                    <font size="+1">☐</font> Znfe
                                <?php }?>
                                <td colspan="2" style="border-bottom:1px dotted;">
                                    <?php if($rows01['n_line']=='Znfe'){ ?>
                                        <?=$rows01['n_znfe']?>
                                </td>
                                    <?php }?>
                            </td>
                            <td colspan="2" align="left" style="border-right:1px solid; ">
                                <?php if($rows01['n_line']=='ฟอสเฟส'){ ?>
                                    <font size="+1">☑</font> ฟอสเฟส
                                <?php }else{ ?>
                                    <font size="+1">☐</font> ฟอสเฟส
                                <?php }?>
                            </td>
                             
                        </tr>
                        <tr>
                            <td colspan="3" align="left" style="border-left:1px solid;">&nbsp;Baking</td>
                            <td align="left">
                                <?php if($rows01['n_baking']=='Yes'){ ?>
                                    <font size="+1">☑</font> Yes
                                <?php }else{ ?>
                                    <font size="+1">☐</font> Yes
                                <?php }?>
                            </td>
                            <td>
                                <?php if($rows01['n_baking']=='No'){ ?>
                                    <font size="+1">☑</font> No
                                <?php }else{ ?>
                                    <font size="+1">☐</font> No
                                <?php }?>
                            </td>
                            <td colspan="6">&nbsp;&nbsp;<font size="+1">
                                <?php if($rows01['n_product_safety']!=''){ ?>
                                    <font size="+1">☑</font>
                                <?php }else{ ?>
                                    <font size="+1">☐</font> 
                                <?php }?>
                            </font> ความปลอดภัยผลิตภัณฑ์ (ถ้ามี)</td>
                            <td colspan="6" style="border-bottom:1px dotted;border-right:1px solid; "><?=$rows01['n_product_safety']?></td>
                        </tr>
                        <tr>
                            <td colspan="3" align="left" style="border-left:1px solid;">&nbsp;Salt Spray</td>
                            <td align="left">สนิมขาว<td style="border-bottom:1px dotted;"><?=$rows01['n_white_rust']?></td></td>
                            <td>&nbsp;สนิมแดง<td colspan="3" style="border-bottom:1px dotted;"><?=$rows01['n_red_rust']?></td></td>
                            <td colspan="2">
                                <?php if($rows01['n_customeritem']=='ลูกค้าต้องการ'){ ?>
                                    <font size="+1">☑</font> ลูกค้าต้องการ
                                <?php }else{ ?>
                                    <font size="+1">☐</font> ลูกค้าต้องการ
                                <?php }?>
                                <td style="border-bottom:1px dotted;">
                                    <?php if($rows01['n_customeritem']=='ลูกค้าต้องการ'){ ?>
                                        <?=$rows01['n_customeritem']?>
                                </td>
                                    <?php }?>
                            </td>
                            <td colspan="2">
                            <?php if($rows01['n_customeritem']=='ลูกค้าไม่ต้องการ'){ ?>
                                    <font size="+1">☑</font> ลูกค้าไม่ต้องการ
                                <?php }else{ ?>
                                    <font size="+1">☐</font> ลูกค้าไม่ต้องการ
                                <?php }?>
                            </td>
                            <td colspan="3" style="border-right:1px solid;"></td>
                        </tr>
                        <tr>
                            <td colspan="3" align="left" style="border-left:1px solid;">&nbsp;กลุ่มผลิตภัณฑ์</td>
                            <td colspan="12" align="left">
                                <?php if($rows01['n_producgroup']=='Screw_Bolt'){ ?>
                                    <font size="+1">☑</font> Screw/Bolt
                                <?php }else{ ?>
                                    <font size="+1">☐</font> Screw/Bolt
                                <?php } ?>

                                <?php if($rows01['n_producgroup']=='Spring'){ ?>
                                    &emsp;<font size="+1">☑</font> Spring
                                <?php }else{ ?>
                                    &emsp;<font size="+1">☐</font> Spring
                                <?php } ?>

                                <?php if($rows01['n_producgroup']=='Washer'){ ?>
                                    &emsp;<font size="+1">☑</font> Washer
                                <?php }else{ ?>
                                    &emsp;<font size="+1">☐</font> Washer
                                <?php } ?>

                                <?php if($rows01['n_producgroup']=='Clip_Clamp'){ ?>
                                    &emsp;<font size="+1">☑</font> Clip/Clamp
                                <?php }else{ ?>
                                    &emsp;<font size="+1">☐</font> Clip/Clamp
                                <?php } ?>

                                <?php if($rows01['n_producgroup']=='Stamping'){ ?>
                                    &emsp;<font size="+1">☑</font> Stamping
                                <?php }else{ ?>
                                    &emsp;<font size="+1">☐</font> Stamping
                                <?php } ?>

                                <?php if($rows01['n_producgroup']=='Assy'){ ?>
                                    &emsp;<font size="+1">☑</font> Assy
                                <?php }else{ ?>
                                    &emsp;<font size="+1">☐</font> Assy
                                <?php } ?>

                                <?php if($rows01['n_producgroup']=='Stud'){ ?>
                                    &emsp;<font size="+1">☑</font> Stud
                                <?php }else{ ?>
                                    &emsp;<font size="+1">☐</font> Stud
                                <?php } ?>

                                <?php if($rows01['n_producgroup']=='อื่นๆ'){ ?>
                                    &emsp;<font size="+1">☑</font> อื่นๆ
                                <?php }else{ ?>
                                    &emsp;<font size="+1">☐</font> อื่นๆ
                                <?php } ?>
                            </td>
                            <td style="border-bottom:1px dotted;border-right:1px solid;">
                                <?php if($rows01['n_producgroup']=='อื่นๆ'){ ?>
                                    <?=$rows01['n_producgroupother']?>
                            </td>
                                <?php } ?>
                        </tr>
                        <tr>
                            <td colspan="3" align="left" style="border-left:1px solid;">&nbsp;ยานยนต์</td>
                            <td colspan="2" style="border-bottom:1px dotted;"><?=$rows01['n_automotivetype']?></td>
                            <td>&nbsp;ค่ายรถ</td>
                            <td colspan="2" style="border-bottom:1px dotted;"><?=$rows01['n_carcamp']?></td>
                            <td colspan="2">&nbsp;กลุ่มงาน</td>
                            <td style="border-right:1px solid;" colspan="10" align="left">
                                <?php if($rows01['n_workgroup']=='2ล้อ'){ ?>
                                    &emsp;<font size="+1">☑</font> 2 ล้อ
                                <?php }else{ ?>
                                    &emsp;<font size="+1">☐</font> 2 ล้อ
                                <?php } ?>

                                <?php if($rows01['n_workgroup']=='4ล้อ'){ ?>
                                    &emsp;<font size="+1">☑</font> 4 ล้อ
                                <?php }else{ ?>
                                    &emsp;<font size="+1">☐</font> 4 ล้อ
                                <?php } ?>

                                <?php if($rows01['n_workgroup']=='Electronic'){ ?>
                                    &emsp;<font size="+1">☑</font> Electronic
                                <?php }else{ ?>
                                    &emsp;<font size="+1">☐</font> Electronic
                                <?php } ?>

                                <?php if($rows01['n_workgroup']=='อื่นๆ'){ ?>
                                    &emsp;<font size="+1">☑</font> อื่นๆ
                                <?php }else{ ?>
                                    &emsp;<font size="+1">☐</font> อื่นๆ
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" align="left" style="border-left:1px solid;">&nbsp;น้ำหนัก/ตัว</td>
                            <td colspan="2" style="border-bottom:1px dotted;"><?=$rows01['n_weight']?></td>
                            <td colspan="3" align="right">&nbsp;Grum&emsp;Model Life</td>
                            <td style="border-bottom:1px dotted;"><?=$rows01['n_madel']?></td>
                            <td align="left" colspan="2">ปี&nbsp;จุดระวังพิเศษ</td>
                            <td colspan="6" style="border-bottom:1px dotted;border-right:1px solid;"><?=$rows01['n_remark']?></td>
                        </tr>
                        <tr>
                            <td colspan="3" align="left" style="border-left:1px solid;">&nbsp;Volume</td>
                            <td colspan="2" align="left">
                                <?php if($rows01['n_volume']=='ลูกค้าไม่แจ้ง'){ ?>
                                    <font size="+1">☑</font>&emsp;ลูกค้าไม่แจ้ง
                                <?php }else{ ?>
                                    <font size="+1">☐</font>&emsp;ลูกค้าไม่แจ้ง
                                <?php } ?>
                            </td>
                            <td colspan="2">ปริมาณ/เดือน</td>
                            <td colspan="2"style="border-bottom:1px dotted;">
                                <?php if($rows01['n_volume']=='ลูกค้าแจ้ง'){ ?>
                                    <?=$rows01['n_amount_mk']?>
                                <?php } ?>
                            </td>
                            <td>กก.</td>
                            <td colspan="2">ปริมาณ/ปี</td>
                            <td colspan="2"style="border-bottom:1px dotted;">
                                <?php if($rows01['n_volume']=='ลูกค้าแจ้ง'){ ?>
                                    <?=$rows01['n_amount_yk']?>
                                <?php } ?>
                            </td>
                            <td align="left">กก.</td>
                            <td colspan="2" align="left" style="border-right:1px solid;"></td>
                        </tr>
                        <tr>
                            <td colspan="3" align="left" style="border-left:1px solid;"></td>
                            <td colspan="2" align="left"></td>
                            <td colspan="2">ปริมาณ/เดือน</td>
                            <td colspan="2"style="border-bottom:1px dotted;">
                                <?php if($rows01['n_volume']=='ลูกค้าแจ้ง'){ ?>
                                    <?=$rows01['n_amount_mitem']?>
                                <?php } ?>
                            </td>
                            <td>ชิ้น</td>
                            <td colspan="2">ปริมาณ/ปี</td>
                            <td colspan="2"style="border-bottom:1px dotted;">
                                <?php if($rows01['n_volume']=='ลูกค้าแจ้ง'){ ?>
                                    <?=$rows01['n_amount_yitem']?>
                                <?php } ?>
                            </td>
                            <td align="left">ชิ้น</td>
                            <td colspan="2" align="left" style="border-right:1px solid;"></td>
                        </tr>

                        <table width="100%" border="0" cellpadding="5px">
                            <tr>
                                <td width="12%" align="left" style="border-left:1px solid;">&nbsp;วัดความหนา</td>
                                <td align="left">
                                    <?php if($rows01['n_thickness']=='X-ray'){ ?>
                                         &nbsp;<font size="+1">☑</font> X-Ray
                                    <?php }else{ ?>
                                         &nbsp;<font size="+1">☐</font> X-Ray
                                    <?php } ?>
                                </td>
                                <td align="left">
                                    <?php if($rows01['n_thickness']=='Thickness'){ ?>
                                         &nbsp;<font size="+1">☑</font> Thickness
                                    <?php }else{ ?>
                                         &nbsp;<font size="+1">☐</font> Thickness
                                    <?php } ?>
                                </td>
                                <td align="left">
                                    <?php if($rows01['n_thickness']=='เครื่องชั่ง'){ ?>
                                         &nbsp;<font size="+1">☑</font> เครื่องชั่ง
                                    <?php }else{ ?>
                                         &nbsp;<font size="+1">☐</font> เครื่องชั่ง
                                    <?php } ?>
                                </td>
                                <td align="left">
                                    <?php if($rows01['n_thickness']=='ไม่ระบุ'){ ?>
                                         &nbsp;<font size="+1">☑</font> ไม่ระบุ
                                    <?php }else{ ?>
                                         &nbsp;<font size="+1">☐</font> ไม่ระบุ
                                    <?php } ?>
                                </td>
                                <td align="left">
                                    <?php if($rows01['n_thickness']=='ไม่กำหนดจุดวัด'){ ?>
                                         &nbsp;<font size="+1">☑</font> ไม่กำหนดจุดวัด
                                    <?php }else{ ?>
                                         &nbsp;<font size="+1">☐</font> ไม่กำหนดจุดวัด
                                    <?php } ?>
                                </td>
                                <td align="left">
                                    <?php if($rows01['n_thickness']=='กำหนดจุดวัดระบุ'){ ?>
                                         &nbsp;<font size="+1">☑</font> กำหนดจุดวัดระบุ
                                    <?php }else{ ?>
                                         &nbsp;<font size="+1">☐</font> กำหนดจุดวัดระบุ
                                    <?php } ?>
                                </td>
                                <td width="15%" style="border-bottom:1px dotted;">
                                    <?php if($rows01['n_thickness']=='กำหนดจุดวัดระบุ'){ ?>
                                        <?=$rows01['n_thickness_other']?>
                                    <?php } ?>
                                </td>
                                <td style="border-right:1px solid;"></td>
                            </tr>
                            <tr>
                                <td width="12%" align="left" style="border-left:1px solid;">&nbsp;การตรวจสอบ</td>
                                <td colspan="2" align="left">
                                    <?php if($rows01['n_examine']=='สุ่มตรวจสอบไม่เกิน'){ ?>
                                        &nbsp;<font size="+1">☑</font> สุ่มตรวจสอบ NG ไม่เกิน
                                    <?php }else{ ?>
                                        &nbsp;<font size="+1">☐</font> สุ่มตรวจสอบ NG ไม่เกิน
                                    <?php } ?>
                                </td>
                                <td style="border-bottom:1px dotted;">
                                    <?php if($rows01['n_examine']=='สุ่มตรวจสอบไม่เกิน'){ ?>
                                        <?=$rows01['n_examine_percen']?>
                                    <?php } ?>
                                </td>
                                <td align="left">%</td>
                                <td align="left">
                                    <?php if($rows01['n_examine']=='ตรวจสอบ100'){ ?>
                                        &nbsp;<font size="+1">☑</font> ตรวจสอบ 100%
                                    <?php }else{ ?>
                                        &nbsp;<font size="+1">☐</font> ตรวจสอบ 100%
                                    <?php } ?>
                                </td>
                                <td></td>
                                <td></td>
                                <td style="border-right:1px solid;"></td>
                            </tr>
                            <td width="12%" align="left" style="border-left:1px solid;">&nbsp;จำนวนที่รับเข้า</td>
                                <td style="border-bottom:1px dotted;"></td>
                                <td align="left">&nbsp;<font size="+1">☐</font> ชิ้น</td>
                                <td style="border-bottom:1px dotted;"></td>
                                <td align="left">&nbsp;<font size="+1">☐</font> กก.</td>
                                <td> ภาชนะบรรจุ</td>
                                <td style="border-bottom:1px dotted;"></td>
                                <td> Box / ถุง / กล่อง</td>
                                <td style="border-right:1px solid;"></td>
                            </tr>
                            <tr>
                                <td width="12%" align="left" style="border-left:1px solid;">&nbsp;มาตรฐานบรรจุ</td>
                                <td align="left">
                                    <?php if($rows01['n_box']=='ใส่ Box ลูกค้า'){ ?>
                                        &nbsp;<font size="+1">☑</font> ใส่ Box ลูกค้า
                                    <?php }else{ ?>
                                        &nbsp;<font size="+1">☐</font> ใส่ Box ลูกค้า
                                    <?php } ?>
                                </td>
                                <td style="border-bottom:1px dotted;">
                                    <?php if($rows01['n_box']=='ใส่ Box ลูกค้า'){ ?>
                                        <?=$rows01['n_boxk']?>
                                    <?php } ?>
                                </td>
                                <td align="center">กก./ชิ้น</td>
                                <td align="center">
                                    <?php if($rows01['n_box']=='ใส่ถุงละ'){ ?>
                                        &nbsp;<font size="+1">☑</font> ใส่ถุงละ
                                    <?php }else{ ?>
                                        &nbsp;<font size="+1">☐</font> ใส่ถุงละ
                                    <?php } ?>
                                </td>
                                <td style="border-bottom:1px dotted;">
                                    <?php if($rows01['n_box']=='ใส่ถุงละ'){ ?>
                                        <?=$rows01['n_itembag']?>
                                    <?php } ?>
                                </td>
                                <td align="center">ชิ้น</td>
                                <td colspan="2" style="border-right:1px solid;" align="left">
                                    <?php if($rows01['n_box']=='บรรจุตามมาตรฐานของลูกค้า'){ ?>
                                        &nbsp;<font size="+1">☑</font> มาตรฐานของลูกค้า
                                    <?php }else{ ?>
                                        &nbsp;<font size="+1">☐</font> มาตรฐานของลูกค้า
                                    <?php } ?>
                                </td>
                            </tr>
                            <tr>
                                <td width="12%" align="left" style="border-left:1px solid;">&nbsp;การรับ-ส่งสินค้า</td>
                                <td align="left">
                                    <?php if($rows01['n_inout_procuct']=='ลูกค้า'){ ?>
                                        &nbsp;<font size="+1">☑</font> ลูกค้า
                                    <?php }else{ ?>
                                        &nbsp;<font size="+1">☐</font> ลูกค้า
                                    <?php } ?>
                                </td>
                                <td align="left">
                                    <?php if($rows01['n_inout_procuct']=='S.P.ZINC'){ ?>
                                        &nbsp;<font size="+1">☑</font> S.P.ZINC
                                    <?php }else{ ?>
                                        &nbsp;<font size="+1">☐</font> S.P.ZINC
                                    <?php } ?>
                                </td>
                                <td align="left">
                                    <?php if($rows01['n_inout_procuct']=='การตลาด'){ ?>
                                        &nbsp;<font size="+1">☑</font> การตลาด
                                    <?php }else{ ?>
                                        &nbsp;<font size="+1">☐</font> การตลาด
                                    <?php } ?>
                                </td>
                                <td align="left">
                                    <?php if($rows01['n_inout_procuct']=='อื่นๆ'){ ?>
                                        &nbsp;<font size="+1">☑</font> อื่นๆ
                                    <?php }else{ ?>
                                        &nbsp;<font size="+1">☐</font> อื่นๆ
                                    <?php } ?>
                                </td>
                                <td align="left" style="border-bottom:1px dotted;">
                                    <?php if($rows01['n_inout_procuct']=='อื่นๆ'){ ?>
                                        <?=$rows01['n_inout_other']?>
                                    <?php } ?>
                                </td>
                                <td style="border-bottom:1px dotted;"></td>
                                <td style="border-bottom:1px dotted;"></td>
                                <td style="border-right:1px solid;"></td>
                            </tr>
                            <tr>
                                <td width="12%" align="left" style="border-left:1px solid;">&nbsp;การเปิดบิล</td>
                                <td align="left">
                                    <?php if($rows01['n_open_fly']=='ฟรี'){ ?>
                                        &nbsp;<font size="+1">☑</font> ฟรี
                                    <?php }else{ ?>
                                        &nbsp;<font size="+1">☐</font> ฟรี
                                    <?php } ?>
                                </td>
                                <td align="left">
                                    <?php if($rows01['n_open_fly']=='คิดเงิน'){ ?>
                                        &nbsp;<font size="+1">☑</font> คิดเงิน
                                    <?php }else{ ?>
                                        &nbsp;<font size="+1">☐</font> คิดเงิน
                                    <?php } ?>
                                </td>
                                <td align="left">
                                    <?php if($rows01['n_open_fly']=='คิดเหมา'){ ?>
                                        &nbsp;<font size="+1">☑</font> คิดเหมา
                                    <?php }else{ ?>
                                        &nbsp;<font size="+1">☐</font> คิดเหมา
                                    <?php } ?>
                                </td>
                                <td style="border-bottom:1px dotted;">
                                    <?php if($rows01['n_open_fly']=='คิดเหมา'){ ?>
                                        <?=$rows01['n_open_flythink']?>
                                    <?php } ?>
                                </td>
                                <td align="left">
                                    <?php if($rows01['n_open_fly']=='บิลชั่วคราว'){ ?>
                                        &nbsp;<font size="+1">☑</font> บิลชั่วคราว
                                    <?php }else{ ?>
                                        &nbsp;<font size="+1">☐</font> บิลชั่วคราว
                                    <?php } ?>
                                </td>
                                <td align="left">
                                    <?php if($rows01['n_open_fly']=='ใบกำกับภาษี'){ ?>
                                        &nbsp;<font size="+1">☑</font> ใบกำกับภาษี
                                    <?php }else{ ?>
                                        &nbsp;<font size="+1">☐</font> ใบกำกับภาษี
                                    <?php } ?>
                                </td>
                                <td></td>
                                <td style="border-right:1px solid;"></td>
                            </tr>
                            <tr>
                                <td width="12%" align="left" style="border-left:1px solid;">&nbsp;เลขที่บิล</td>
                                <td style="border-bottom:1px dotted;"><?=$rows01['n_bin_number']?></td>
                                <td align="left">&nbsp;ผู้เปิดบิล</td>
                                <td style="border-bottom:1px dotted;"><?=$rows01['n_userbin_name']?></td>
                                <td align="center">&nbsp;วันที่</td>
                                <td style="border-bottom:1px dotted;"><?=$rows01['n_bindate']?></td>
                                <td></td>
                                <td></td>
                                <td style="border-right:1px solid;"></td>
                            </tr>
                            <tr>
                                <td colspan="2" style="border-left:1px solid;" align="left">
                                    <?php if($rows01['n_approve_data']=='อนุมัติเพิ่มในฐานระบบ'){ ?>
                                        &nbsp;<font size="+1">☑</font> อนุมัติเพิ่มในฐานระบบ
                                    <?php }else{ ?>
                                        &nbsp;<font size="+1">☐</font> อนุมัติเพิ่มในฐานระบบ
                                    <?php } ?>
                                </td>
                                <td colspan="2" align="center">&nbsp;รหัสสินค้าในระบบ ECACC</td>
                                <td style="border-bottom:1px dotted;">
                                    <?php if($rows01['n_approve_data']=='อนุมัติเพิ่มในฐานระบบ'){ ?>
                                        <?=$rows01['n_id_ecacc']?>
                                    <?php } ?>
                                </td>
                                <td align="center">&nbsp;ผู้อนุมัติ</td>
                                <td style="border-bottom:1px dotted;">
                                    <?php if($rows01['n_approve_data']=='อนุมัติเพิ่มในฐานระบบ'){ ?>
                                        <?=$rows01['n_user_approve']?>
                                    <?php } ?>
                                </td>
                                <td></td>
                                <td style="border-right:1px solid;"></td>
                            </tr>
                            <tr>
                                <td colspan="2" style="border-left:1px solid;" align="left">&nbsp;อ้างอิงใบเสนอราคาเลขที่</td>
                                <td colspan="2" style="border-bottom:1px dotted;">
                                    <?=$rows01['n_nuote_nuote']?>
                                </td>
                                <td align="center">วันเสนอราคา</td>
                                <td style="border-bottom:1px dotted;"><?=$rows01['n_bid_date']?></td>
                                <td style="border-bottom:1px dotted;"></td>
                                <td></td>
                                <td style="border-right:1px solid;"></td>
                            </tr>
                            <tr><td colspan="9" style="border-left:1px solid;border-right:1px solid;"></td></tr>
                            <table width="100%" border="1" cellpadding="3px">
                                <tr>
                                    <td colspan="6"><b>ผู้ทบทวนความต้องการของลูกค้า โดย MULTIDISCIPLINARY TEAM</b></td>
                                </tr>
                                <tr>
                                    <td width="16.6%">Lead. Team Multi</td>
                                    <td width="16.6%">Marketing</td>
                                    <td width="16.6%">Production</td>
                                    <td width="16.6%">QC</td>
                                    <td width="16.6%">QA</td>
                                    <td width="16.6%">Incoming/Packing</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Transport</td>
                                    <td>Accounting</td>
                                    <td>อื่นๆ</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </table>

                            <tr><td>&nbsp;</td></tr>

                            <table width="100%" border="1" cellpadding="3px">
                                <tr>
                                    <td align="left" width="70%"><b>ข้อมูลเพิ่มเติมของแต่ละหน่วยงาน (ถ้ามี)</b></td>
                                    <td width="10%">แผนก</td>
                                    <td width="10%">ลงชื่อ</td>
                                    <td width="10%">วันที่</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </table>
                            
                            <tr><td>&nbsp;</td></tr>

                            <table width="100%" border="0" align="center">
                                <tr>
                                    <td width="10%" align="left">&nbsp; ผู้ให้ข้อมูล</td>
                                    <td style="border-bottom:1px dotted;"></td>
                                    <td width="10%" align="center">&nbsp; ผู้ตรวจสอบ</td>
                                    <td style="border-bottom:1px dotted;"></td>
                                    <td width="10%" align="center">&nbsp; ผู้อนุมัติ</td>
                                    <td style="border-bottom:1px dotted;"></td>
                                </tr>
                                <tr><td>&nbsp;</td></tr>
                                <tr>
                                    <td></td>
                                    <td>............./............./.............</td>
                                    <td></td>
                                    <td>............./............./.............</td>
                                    <td></td>
                                    <td>............./............./.............</td>
                                    <td></td>
                                </tr>
                            </table>
                        </table>
                    </table>
                </table>
            </div>   
        </div>
    </div>
<!-- <script src="bootstrap4/node_modules/jquery/dist/jquery.min.js" ></script> -->
<!-- <script src="bootstrap4/node_modules/popper.js/dist/umd/popper.min.js"></script> -->
<!-- <script src="bootstrap4/node_modules/bootstrap/dist/js/bootstrap.min.js"></script> -->
</body>
</html>