<?php
    session_start();
    include "../conndb/conn.php";
    $frm_customer_id = $_POST['frm_customer_id'];
    $frm_customer_name = $_POST['frm_customer_name'];

$sql = mysqli_query($conn,"SELECT * FROM customer Where customer_id ='$frm_customer_id' ");

    if(mysqli_num_rows($sql) >= 1){
        $show = 11;
        $alert = $already_have;
        echo "<script type='text/javascript'>
            alert('รหัสลูกค้าซ้ำซ้อนในระบบกรุณาเปลี่ยนรหัสลูกค้าใหม่');
            window.location.href = 'index.php';
        </script>";
    }else{
        $sql02="INSERT INTO customer (customer_id,customer_name) VALUES ('$frm_customer_id','$frm_customer_name') ";
        $result2= mysqli_query($conn,$sql02);
            if($result2){
                echo "<script type='text/javascript'>
                    alert('บันทึกข้อมูลสำเร็จ');
                    window.location.href = 'index.php';
                </script>";
            }else{
                echo "<script type='text/javascript'>
                    alert('บันทึกข้อมูลไม่สำเร็จ');
                    window.location.href = 'index.php';
                </script>";
            }
    }
?>