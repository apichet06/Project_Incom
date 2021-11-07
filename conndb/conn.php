<?php

error_reporting(~E_NOTICE);
 
$servername = "localhost";
$username = "root";
//$password = "spz@password";
$password = "4744";
$database = "spz";
 
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);


// Check connection
//  if (!$conn) {
//   die("Connection failed: " . mysqli_connect_error());
// }
// echo "Connected successfully"; 
 
########################### parameter ##############################
 
$save   = "<i class=\"fas fa-save\"></i> บันทึก";
$edit   = "<i class=\"far fa-edit\"></i>"; //แก้ไข
$del    = "<i class=\"far fa-trash-alt\"></i>"; //ลบ
$close  = "<i class=\"far fa-times-circle\"></i> ปิด";
$plus   = "<i class=\"far fa-plus-square\"></i> เพิ่ม";
$order  = "<i class=\"fas fa-file-alt\"></i> ใบจัดทำงานใหม่";
$reset  = "<i class=\"fas fa-eraser\"></i> เคลียร์";
$approve  = "<i class=\"far fa-thumbs-up\"> อนุมัติ</i>";
$reject = "<i class=\"fas fa-file-signature\"> ไม่อนุมัติ</i>";
$uturn  = "<i class=\"fas fa-reply-all fa-2x\"></i>";

$success_insert = "บันทึกข้อมูลสำเร็จ";
$success_update = "แก้ไขข้อมูลสำเร็จ";
$success_delete = "ลบข้อมูลสำเร็จ";
$already_have   = "รหัสนี้มีอยู่แล้ว";
$session        = "Session หมดอายุ กลับหน้าล็อกอิน";
 
$failed         = "มีข้อผิดพลาด";

#####################################################################

?>

