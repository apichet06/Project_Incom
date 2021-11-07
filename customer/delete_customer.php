<?php
    session_start();
    include "../conndb/conn.php";
    $id = $_POST['id']; //ค่าตัวแปร sell_id

$sql02="DELETE FROM customer WHERE c_id = '$id' ";
$result2= mysqli_query($conn,$sql02);
    if($result2){
        echo "<script type='text/javascript'>
            alert('ลบข้อมูลสำเร็จ');
            window.location.href = 'index.php';
        </script>";
    }else{
        echo "<script type='text/javascript'>
            alert('ลบข้อมูลไม่สำเร็จ');
            window.location.href = 'index.php';
        </script>";
    }
?>