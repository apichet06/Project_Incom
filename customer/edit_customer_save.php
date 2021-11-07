<?php include "../conndb/conn.php"; ?>
<main class="app-content">
    <?php
//สร้างตัวแปร
$frm_edit_id = $_POST['frm_edit_id'];
$frm_edit_customer_id = $_POST['frm_edit_customer_id'];
$frm_edit_customer_name = $_POST['frm_edit_customer_name'];

//แก้ไขข้อมูล
$sql = " UPDATE customer SET
customer_id = '$frm_edit_customer_id', 
customer_name = '$frm_edit_customer_name'
WHERE c_id = '$frm_edit_id' ";
$rs = mysqli_query($conn,$sql);
    if($rs){
        echo "<script type='text/javascript'>
            alert('แก้ไขข้อมูลสำเร็จ');
            window.location.href = 'index.php';
        </script>";
    }else{
        echo "<script type='text/javascript'>
            alert('เกิดข้อผิดพลาด');
            window.location.href = 'index.php';
        </script>";
    }
?>
    </main>
    
