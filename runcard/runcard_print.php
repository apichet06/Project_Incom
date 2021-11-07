<?php
    session_start();
    include '../conndb/conn.php';
    $id = $_GET['n_id'];
    $sql01 = "SELECT * FROM new_order WHERE n_id = '$id' ";
    $rs01 = mysqli_query($conn,$sql01);
    $rows01 = mysqli_fetch_array($rs);
    $space1 = "................................................................................................................................................................................................................";
    $space2 = "............................................................................................................................................................................................................................";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="bootstrap4/node_modules/bootstrap/dist/css/bootstrap.min.css"></script>
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
            padding: 10mm;
            margin: 10mm auto;
            border: 1px #D3D3D3 solid;
            border-radius: 5px;
            background: white;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }
        .subpage {
            padding: 1cm;
            border: 2px gray solid;
            height: 350mm;
            /* width: 250mm; */
            outline: 2cm;
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
<body style="font-family:angsana;font-size:16px;" onload="window.print()">
    <div class="book">

        <!-- Page 1 -->
        <div class="page">
            <div class="container-fluid text-center">
                <font size="+2"><b>RUN CARD ใบสายการผลิต</b></font><br>
                <font>กระดาษ(สีขาว Cr+3,สีชมพู ฟอสเฟส,สีเขียว ซิงค์เหล็ก,สีเหลือง แขวนออโต้),สีฟ้า ควมคุมพิเศษ</font>
                <table width="100%" border="0" class="mt-2" style="border:1px solid black;" cellpadding="3">
                    <tr>
                        <td width="5%" style="border-right:1px solid black;border-bottom:1px solid black">ลูกค้า</td>
                        <td width="10%" style="border-right:1px solid black;border-bottom:1px solid black">ตัวแปล</td>
                        <td width="10%" style="border-right:1px solid black;border-bottom:1px solid black">น้ำหนัก/ชิ้น</td>
                        <td width="10%" style="border-right:1px solid black;border-bottom:1px solid black">ตัวแปล Kg.</td>
                        <td align="left" width="10%" style="border-bottom:1px solid black"><font size="5px">&nbsp;☐</font> งานรับเข้าปกติ</td>
                    </tr>
                    <tr>
                        <td style="border-right:1px solid black;border-bottom:1px solid black">รหัส</td>
                        <td style="border-right:1px solid black;border-bottom:1px solid black">ตัวแปล</td>
                        <td style="border-right:1px solid black;border-bottom:1px solid black">จำนวนชิ้นงาน</td>
                        <td style="border-right:1px solid black;border-bottom:1px solid black">ตัวแปล ชิ้น</td>
                        <td align="left" style="border-bottom:1px solid black"><font size="5px">&nbsp;☐</font> สินค้าคืนเคลม</td>
                    </tr>
                    <tr>
                        <td style="border-right:1px solid black;border-bottom:1px solid black">Part No.</td>
                        <td style="border-right:1px solid black;border-bottom:1px solid black">ตัวแปล</td>
                        <td style="border-right:1px solid black;border-bottom:1px solid black">น้ำหนักทั้งหมด</td>
                        <td style="border-right:1px solid black;border-bottom:1px solid black">ตัวแปล Kg.</td>
                        <td align="left" style="border-bottom:1px solid black"><font size="5px">&nbsp;☐</font> New Part</td>
                    </tr>
                    <tr>
                        <td style="border-right:1px solid black;border-bottom:1px solid black">Part Name</td>
                        <td style="border-right:1px solid black;border-bottom:1px solid black">ตัวแปล</td>
                        <td style="border-right:1px solid black;border-bottom:1px solid black">จำนวน Box</td>
                        <td style="border-right:1px solid black;border-bottom:1px solid black">ตัวแปล</td>
                        <td align="left" style="border-bottom:1px solid black"><font size="5px">&nbsp;☐</font> ควบคุมพิเศษ</td>
                    </tr>
                    <tr>
                        <td style="border-right:1px solid black;border-bottom:1px solid black">หมายเลขล็อต</td>
                        <td style="border-right:1px solid black;border-bottom:1px solid black">ตัวแปล</td>
                        <td style="border-right:1px solid black;border-bottom:1px solid black">วันที่ส่งมอบ</td>
                        <td colspan="2" style="border-right:1px solid black;border-bottom:1px solid black">ตัวแปล</td>
                    </tr>
                    <tr>
                        <td style="border-left:3px double black;border-top:3px double black;border-right:1px solid black;">ควบคุมพิเศษ</td>
                        <td style="border-right:3px double black;border-top:3px double black;">ตัวแปล</td>
                        <td colspan="2" align="left" >ประทับตรา</td>
                        <td>Line การผลิต</td>
                    </tr>
                    <tr>
                        <td style="border-left:3px double black;border-bottom:3px double black;border-right:1px double black;">ความหนา</td>
                        <td style="border-right:3px double black;border-bottom:3px double black;">ตัวแปล</td>
                        <td colspan="2"></td>
                        <td align="center">ตัวแปล</td>
                    </tr>
                    <tr>
                        <td style="border-right:1px solid black;border-bottom:1px solid black">ชุบสี</td>
                        <td style="border-right:1px solid black;border-bottom:1px solid black">ตัวแปล</td>
                        <td colspan="2"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td style="border-right:1px solid black;border-bottom:1px solid black">Treatment</td>
                        <td style="border-right:1px solid black;border-bottom:1px solid black">ตัวแปล</td>
                        <td colspan="2" align="left" style="border-bottom:1px solid black">วันที่รับงาน &nbsp; ตัวแปล</td>
                        <td align="left" style="border-right:1px solid black;border-bottom:1px solid black">ลงชื่อ &nbsp; ตัวแปล</td>
                    </tr>
                    <tr>
                        <td colspan="5" style="border-top:1px solid black;">ผลการตรวจสอบหลังชุบ Zn (ระบุน้ำหนักหรือจำนวนงาน)</td>
                    </tr>
                    <table width="100%" class="text-center" cellpadding="4">
                        <tr>
                            <td colspan="4" style="border-right:1px solid black;border-left:1px solid black"><u>ตรวจหลังชุบ</u></td>
                            <td colspan="4" style="border-right:1px solid black"><u>แก้ไขครั้งที่ 1</u></td>
                            <td colspan="4" style="border-right:1px solid black"><u>แก้ไขครั้งที่ 2</u></td>
                        </tr>
                        <tr>
                            <td align="left" colspan="4" style="border-right:1px solid black;border-left:1px solid black">&nbsp;&nbsp;<font size="5px">▢</font>&nbsp;Baking แล้ว</td>
                            <td align="left" colspan="4" style="border-right:1px solid black">&nbsp;&nbsp;<font size="5px">▢</font>&nbsp;Baking แล้ว</td>
                            <td align="left" colspan="4" style="border-right:1px solid black">&nbsp;&nbsp;<font size="5px">▢</font>&nbsp;Baking แล้ว</td>
                        </tr>
                        <tr>
                            <td align="left" colspan="4" style="border-right:1px solid black;border-left:1px solid black">&nbsp;&nbsp;วดป..............ลงชื่อ.....................</td>
                            <td align="left" colspan="4" style="border-right:1px solid black">&nbsp;&nbsp;วดป..............ลงชื่อ.....................</td>
                            <td align="left" colspan="4" style="border-right:1px solid black">&nbsp;&nbsp;วดป..............ลงชื่อ.....................</td>
                        </tr>
                        <tr>
                            <td align="left" colspan="4" style="border-right:1px solid black;border-left:1px solid black">&nbsp;&nbsp;<font size="5px">▢</font>&nbsp;ความหนาผ่านแล้ว</td>
                            <td align="left" colspan="4" style="border-right:1px solid black">&nbsp;&nbsp;<font size="5px">▢</font>&nbsp;ความหนาผ่านแล้ว</td>
                            <td align="left" colspan="4" style="border-right:1px solid black">&nbsp;&nbsp;<font size="5px">▢</font>&nbsp;ความหนาผ่านแล้ว</td>
                        </tr>
                        <tr>
                            <td align="left" colspan="4" style="border-right:1px solid black;border-left:1px solid black">&nbsp;&nbsp;วดป..............ลงชื่อ.....................</td>
                            <td align="left" colspan="4" style="border-right:1px solid black">&nbsp;&nbsp;วดป..............ลงชื่อ.....................</td>
                            <td align="left" colspan="4" style="border-right:1px solid black">&nbsp;&nbsp;วดป..............ลงชื่อ.....................</td>
                        </tr>
                        <tr>
                            <td colspan="4" style="border-right:1px solid black;border-left:1px solid black;border-bottom:1px solid black">&nbsp;</td>
                            <td colspan="4" style="border-right:1px solid black;border-left:1px solid black;border-bottom:1px solid black">&nbsp;</td>
                            <td colspan="4" style="border-right:1px solid black;border-left:1px solid black;border-bottom:1px solid black">&nbsp;</td>
                        </tr>
                        <tr>
                            <td align="left" colspan="3" style="border-left:1px solid black;border-bottom:1px solid black">&nbsp;&nbsp;จำนวน OK...............................</td>
                            <td style="border-right:1px solid black;border-bottom:1px solid black">กก/ชิ้น</td>
                            <td align="left" colspan="3" style="border-left:1px solid black;border-bottom:1px solid black">&nbsp;&nbsp;จำนวน OK...............................</td>
                            <td style="border-right:1px solid black;border-bottom:1px solid black">กก/ชิ้น</td>
                            <td align="left" colspan="3" style="border-left:1px solid black;border-bottom:1px solid black">&nbsp;&nbsp;จำนวน OK...............................</td>
                            <td style="border-right:1px solid black;border-bottom:1px solid black">กก/ชิ้น</td>
                        </tr>
                        <tr>
                            <td align="left" colspan="3" style="border-left:1px solid black">&nbsp;&nbsp;<font size="5px">▢</font>&nbsp;ชุดติดไม่ทั่ว.......................</td>
                            <td style="border-right:1px solid black">กก/ชิ้น</td>
                            <td align="left" colspan="3" style="border-left:1px solid black">&nbsp;&nbsp;<font size="5px">▢</font>&nbsp;ชุดติดไม่ทั่ว.......................</td>
                            <td style="border-right:1px solid black">กก/ชิ้น</td>
                            <td align="left" colspan="3" style="border-left:1px solid black">&nbsp;&nbsp;<font size="5px">▢</font>&nbsp;ชุดติดไม่ทั่ว.......................</td>
                            <td style="border-right:1px solid black">กก/ชิ้น</td>
                        </tr>
                        <tr>
                            <td align="left" colspan="3" style="border-left:1px solid black">&nbsp;&nbsp;<font size="5px">▢</font>&nbsp;Spec ไม่ได้........................</td>
                            <td style="border-right:1px solid black">กก/ชิ้น</td>
                            <td align="left" colspan="3" style="border-left:1px solid black">&nbsp;&nbsp;<font size="5px">▢</font>&nbsp;Spec ไม่ได้........................</td>
                            <td style="border-right:1px solid black">กก/ชิ้น</td>
                            <td align="left" colspan="3" style="border-left:1px solid black">&nbsp;&nbsp;<font size="5px">▢</font>&nbsp;Spec ไม่ได้........................</td>
                            <td style="border-right:1px solid black">กก/ชิ้น</td>
                        </tr>
                        <tr>
                            <td align="left" colspan="3" style="border-left:1px solid black">&nbsp;&nbsp;<font size="5px">▢</font>&nbsp;คราบ.................................</td>
                            <td style="border-right:1px solid black">กก/ชิ้น</td>
                            <td align="left" colspan="3" style="border-left:1px solid black">&nbsp;&nbsp;<font size="5px">▢</font>&nbsp;คราบ.................................</td>
                            <td style="border-right:1px solid black">กก/ชิ้น</td>
                            <td align="left" colspan="3" style="border-left:1px solid black">&nbsp;&nbsp;<font size="5px">▢</font>&nbsp;คราบ.................................</td>
                            <td style="border-right:1px solid black">กก/ชิ้น</td>
                        </tr>
                        <tr>
                            <td align="left" colspan="3" style="border-left:1px solid black">&nbsp;&nbsp;<font size="5px">▢</font>&nbsp;ต่อเวลา..............................</td>
                            <td style="border-right:1px solid black">กก/ชิ้น</td>
                            <td align="left" colspan="3" style="border-left:1px solid black">&nbsp;&nbsp;<font size="5px">▢</font>&nbsp;ต่อเวลา..............................</td>
                            <td style="border-right:1px solid black">กก/ชิ้น</td>
                            <td align="left" colspan="3" style="border-left:1px solid black">&nbsp;&nbsp;<font size="5px">▢</font>&nbsp;ต่อเวลา..............................</td>
                            <td style="border-right:1px solid black">กก/ชิ้น</td>
                        </tr>
                        <tr>
                            <td align="left" colspan="3" style="border-left:1px solid black">&nbsp;&nbsp;<font size="5px">▢</font>&nbsp;ทำสีใหม่.............................</td>
                            <td style="border-right:1px solid black">กก/ชิ้น</td>
                            <td align="left" colspan="3" style="border-left:1px solid black">&nbsp;&nbsp;<font size="5px">▢</font>&nbsp;ทำสีใหม่.............................</td>
                            <td style="border-right:1px solid black">กก/ชิ้น</td>
                            <td align="left" colspan="3" style="border-left:1px solid black">&nbsp;&nbsp;<font size="5px">▢</font>&nbsp;ทำสีใหม่.............................</td>
                            <td style="border-right:1px solid black">กก/ชิ้น</td>
                        </tr>
                        <tr>
                            <td align="left" colspan="3" style="border-left:1px solid black">&nbsp;&nbsp;<font size="5px">▢</font>&nbsp;อื่นๆ..</td>
                            <td style="border-right:1px solid black">กก/ชิ้น</td>
                            <td align="left" colspan="3" style="border-left:1px solid black">&nbsp;&nbsp;<font size="5px">▢</font>&nbsp;อื่นๆ..</td>
                            <td style="border-right:1px solid black">กก/ชิ้น</td>
                            <td align="left" colspan="3" style="border-left:1px solid black">&nbsp;&nbsp;<font size="5px">▢</font>&nbsp;อื่นๆ..</td>
                            <td style="border-right:1px solid black">กก/ชิ้น</td>
                        </tr>
                        <tr>
                            <td colspan="4" align="left" style="border-right:1px solid black;border-left:1px solid black;border-bottom:1px solid black">&nbsp;&nbsp;ผู้ตรวจ.................&nbsp;&nbsp;ผู้อนุมัติ.................</td>
                            <td colspan="4" align="left" style="border-right:1px solid black;border-left:1px solid black;border-bottom:1px solid black">&nbsp;&nbsp;ผู้ตรวจ.................&nbsp;&nbsp;ผู้อนุมัติ.................</td>
                            <td colspan="4" align="left" style="border-right:1px solid black;border-left:1px solid black;border-bottom:1px solid black">&nbsp;&nbsp;ผู้ตรวจ.................&nbsp;&nbsp;ผู้อนุมัติ.................</td>
                        </tr>
                        <tr>
                            <td colspan="12" align="left" style="border-left:1px solid black;border-right:1px solid black;"><u>หมายเหตุ</u>:&nbsp;1.กรณีที่มีการซ่อม ครั้งที่2 ห้ามซ่อมให้แจ้งหัวหน้าแผนก QA เพื่อพิจารณา</td>
                        </tr>
                        <tr>
                            <td colspan="12" align="left" style="border-left:1px solid black;border-right:1px solid black;border-bottom:1px solid black;">&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;2................................................................................................................................................................................</td>
                        </tr>
                        <table width="100%" class="text-center" cellpadding="4">
                            <tr>
                                <td colspan="8" style="border-left:1px solid black;border-right:1px solid black;border-bottom:1px solid black;"><b>บ่อชุบ</b></td>
                                <td colspan="4" style="border-left:1px solid black;border-right:1px solid black;border-bottom:1px solid black;"><b>การปิดงาน</b></td>
                            </tr>
                            <tr>
                                <td style="border-left:1px solid black;border-right:1px solid black;"><b>บ่อ1</b></td>
                                <td style="border-left:1px solid black;border-right:1px solid black;"><font size="5px">▢</font></td>

                                <td style="border-left:1px solid black;border-right:1px solid black;"><b>บ่อ7</b></td>
                                <td style="border-left:1px solid black;border-right:1px solid black;"><font size="5px">▢</font></td>

                                <td style="border-left:1px solid black;border-right:1px solid black;"><b>MnPh</b></td>
                                <td colspan="3" style="border-left:1px solid black;border-right:1px solid black;"><font size="5px">▢</font></td>
                                <td colspan="4" style="border-left:1px solid black;border-right:1px solid black;">ผู้อนุมัติปิดงาน</td>
                            </tr>

                            <tr>
                                <td style="border-left:1px solid black;border-right:1px solid black;"><b>บ่อ2</b></td>
                                <td style="border-left:1px solid black;border-right:1px solid black;"><font size="5px">▢</font></td>

                                <td style="border-left:1px solid black;border-right:1px solid black;"><b>กลิ้ง A</b></td>
                                <td style="border-left:1px solid black;border-right:1px solid black;"><font size="5px">▢</font></td>

                                <td style="border-left:1px solid black;border-right:1px solid black;"><b>ZnFe</b></td>
                                <td colspan="3" style="border-left:1px solid black;border-right:1px solid black;"><font size="5px">▢</font></td>

                                <td colspan="4" style="border-left:1px solid black;border-right:1px solid black;">ลงชื่อ .................................... จนท.สโตร์</td>
                            </tr>

                            <tr>
                                <td style="border-left:1px solid black;border-right:1px solid black;"><b>บ่อ5</b></td>
                                <td style="border-left:1px solid black;border-right:1px solid black;"><font size="5px">▢</font></td>

                                <td style="border-left:1px solid black;border-right:1px solid black;"><b>แขวน M</b></td>
                                <td style="border-left:1px solid black;border-right:1px solid black;"><font size="5px">▢</font></td>

                                <td style="border-left:1px solid black;border-right:1px solid black;"><b>แขวน A</b></td>
                                <td colspan="3" style="border-left:1px solid black;border-right:1px solid black;"><font size="5px">▢</font></td>

                                <td colspan="4" style="border-left:1px solid black;border-right:1px solid black;">วัน.........เดือน.........พ.ศ..........</td>
                            </tr>
                            <tr>
                                <td style="border-right:1px solid black;border-left:1px solid black;border-bottom:1px solid black">&nbsp;</td>
                                <td style="border-right:1px solid black;border-left:1px solid black;border-bottom:1px solid black">&nbsp;</td>
                                <td style="border-right:1px solid black;border-left:1px solid black;border-bottom:1px solid black">&nbsp;</td>
                                <td style="border-right:1px solid black;border-left:1px solid black;border-bottom:1px solid black">&nbsp;</td>
                                <td style="border-right:1px solid black;border-left:1px solid black;border-bottom:1px solid black">&nbsp;</td>
                                <td colspan="3" style="border-right:1px solid black;border-left:1px solid black;border-bottom:1px solid black">&nbsp;</td>
                                <td style="border-right:1px solid black;border-left:1px solid black;border-bottom:1px solid black">&nbsp;</td>
                            </tr>
                        </table>
                    </table>
                </table>
                <br><br>
                <div align="right">
                    <font>FRST011-0-010820-PX</font>
                </div>
            </div>   
        </div>


        <!-- Page 2 -->


        <div class="page">
            <div class="container-fluid text-center">
                <div class="row">
                    <font size="+2">&emsp;<b><u>การตรวจรับชิ้นงานของลูกค้า</u></b></font><br>
                </div>
                
                <table width="100%" border="0" class="mt-2" style="border:1px solid black;" cellpadding="8px">
                    <tr>
                        <td width="25%" style="border-right:1px solid black;border-bottom:1px solid black;"><u><b>มาตรฐานการตรวจ</b></u></td>
                        <td style="border-right:1px solid black;border-bottom:1px solid black;"><u><b>วิธีการตรวจ</b></u></td>
                        <td style="border-right:1px solid black;border-bottom:1px solid black;"><u><b>การสุ่มตรวจ</b></u></td>
                        <td colspan="2" style="border-right:1px solid black;border-bottom:1px solid black;"><u><b>ผลการตรวจ</b></u></td>
                    </tr>
                    <tr>
                        <td align="left" style="border-right:1px solid black;border-bottom:1px solid black;">1.PART NO / PART NAME / LOT NO / TAG / KANBAN / PO. ต้องตรงกับชิ้นงานตามใบส่งชุบของลูกค้า</td>
                        <td style="border-right:1px solid black;border-bottom:1px solid black;">สายตา</td>
                        <td style="border-right:1px solid black;border-bottom:1px solid black;">ทุก BOX (ทั้งหมด)</td>
                        <td style="border-bottom:1px solid black;">&nbsp;<font size="+2">☐</font>&nbsp; OK</td>
                        <td style="border-bottom:1px solid black;">&nbsp;<font size="+2">☐</font>&nbsp; NG</td>
                    </tr>

                    <tr>
                        <td align="left" style="border-right:1px solid black;border-bottom:1px solid black;">2.ตำนวนต้องถูกต้องตามใบส่งของ</td>
                        <td style="border-right:1px solid black;border-bottom:1px solid black;">เครื่องชั่งน้ำหนัก</td>
                        <td style="border-right:1px solid black;border-bottom:1px solid black;">ทุก BOX (ทั้งหมด)</td>
                        <td style="border-bottom:1px solid black;">&nbsp;<font size="+2">☐</font>&nbsp; OK</td>
                        <td style="border-bottom:1px solid black;">&nbsp;<font size="+2">☐</font>&nbsp; NG</td>
                    </tr>

                    <tr>
                        <td align="left" style="border-right:1px solid black;border-bottom:1px solid black;">3.ชิ้นงานต้องไม่เป็นสนิม / คราบเขม่า / คราบดำ</td>
                        <td style="border-right:1px solid black;border-bottom:1px solid black;">สายตา</td>
                        <td style="border-right:1px solid black;border-bottom:1px solid black;">5ชิ้น / BOX / LOT</td>
                        <td style="border-bottom:1px solid black;">&nbsp;<font size="+2">☐</font>&nbsp; OK</td>
                        <td style="border-bottom:1px solid black;">&nbsp;<font size="+2">☐</font>&nbsp; NG</td>
                    </tr>

                    <tr>
                        <td align="left" style="border-right:1px solid black;border-bottom:1px solid black;">4.ชิ้นงานต้องไม่มีการบิดโก่ง , โค้งงอ , เสียรูป</td>
                        <td style="border-right:1px solid black;border-bottom:1px solid black;">สายตา</td>
                        <td style="border-right:1px solid black;border-bottom:1px solid black;">5ชิ้น / BOX / LOT</td>
                        <td style="border-bottom:1px solid black;">&nbsp;<font size="+2">☐</font>&nbsp; OK</td>
                        <td style="border-bottom:1px solid black;">&nbsp;<font size="+2">☐</font>&nbsp; NG</td>
                    </tr>

                    <tr>
                        <td align="left" style="border-right:1px solid black;border-bottom:1px solid black;">5.ชิ้นงานต้องไม่มีชิ้นงานลักษณะอื่นปะปนมา</td>
                        <td style="border-right:1px solid black;border-bottom:1px solid black;">สายตา</td>
                        <td style="border-right:1px solid black;border-bottom:1px solid black;">5ชิ้น / BOX / LOT</td>
                        <td style="border-bottom:1px solid black;">&nbsp;<font size="+2">☐</font>&nbsp; OK</td>
                        <td style="border-bottom:1px solid black;">&nbsp;<font size="+2">☐</font>&nbsp; NG</td>
                    </tr>

                    <tr>
                        <td align="left" style="border-right:1px solid black;border-bottom:1px solid black;">6.จำนวนที่สุ่มตรวจ / BOX</td>
                        <td style="border-right:1px solid black;border-bottom:1px solid black;">สายตา</td>
                        <td style="border-right:1px solid black;border-bottom:1px solid black;">5ชิ้น / BOX / LOT</td>
                        <td colspan="2" style="border-bottom:1px solid black;">................. BOX .................</td>
                    </tr>
                </table>
                    <div class="container-fluid">
                        <div class="row" align="left">
                            <font><u>หมายเหตุ</u>&nbsp;:&nbsp;ปัญหาที่พบ คือ</font><br>
                            &emsp;&emsp;&emsp;<?=$space1?>
                            <br><br>
                            <?=$space2?>
                        </div>
                    </div>
                    <br>
                    <div class="row" align="left">
                        <font size="+2">&emsp;<b><u>ใช้เฉพาะบันทึกกรณีงานไม่เป็นไปตามข้อกำหนด</u></b></font><br>
                    </div>

                <table width="100%" border="1" class="mt-2" style="border:1px solid black;font-size:15px;" cellpadding="3">
                    <tr>
                        <td rowspan="2" width="8%">วันที่</td>
                        <td rowspan="2" width="8%">เวลา</td>
                        <td colspan="2" width="5%">งาน</td>
                        <td colspan="5" width="15%">ค่าที่วัดได้ / ชิ้น</td>
                        <td colspan="2" width="5%">CKECK</td>
                        <td colspan="3" width="10%">ประเภทงาน</td>
                        <td rowspan="2" width="7%">ผู้ส่ง</td>
                        <td rowspan="2" width="7%">ผู้ตรวจ</td>
                        <td colspan="3" width="25%">ผลการตรวจสอบ</td>
                    </tr>
                    <tr>
                        <td>ก</td>
                        <td>ล</td>

                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                        <td>5</td>

                        <td>T</td>
                        <td>X</td>

                        <td>ปกติ</td>
                        <td>ซ่อม</td>
                        <td>เคลม</td>

                        <td>NG ต่อเวลา</td>
                        <td>NG ส่งซ่อม</td>
                        <td>ยอมรับได้</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                </table>
                <br>
                <div class="row" align="left">
                    <font size="+1">&emsp;<b><u>การทำสี</u></b></font><br>
                </div>
                <br>
                <div class="row" align="left">
                    <font size="+1">&emsp;<font size="5px">&nbsp;☐</font>&emsp;<b><u>AUTO</u></b></font> &emsp; &emsp;
                    <font size="+1">&emsp;<font size="5px">&nbsp;☐</font> <b><u>MANUAL</u></b></font><br>
                </div>
                    <br><br><br><br><br><br>
                <div class="row" align="left">
                    <font size="5px">&emsp;ลงชื่อ .....................................................</font> &emsp; &emsp;
                </div>
            </div>
            <br><br><br>
            <div align="right">
                <font>FRST011-0-010820-PX</font>
            </div>   
        </div>
    </div>
<script src="bootstrap4/node_modules/jquery/dist/jquery.min.js" ></script>
<script src="bootstrap4/node_modules/popper.js/dist/umd/popper.min.js"></script>
<script src="bootstrap4/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>