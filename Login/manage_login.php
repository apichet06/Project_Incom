<?php 
session_start();
 require_once '../conndb/conn.php';
$login  = @($_POST['login']);
$logout = @($_POST['logout']);
$user   = @($_POST['username']); 
$pass   = @($_POST['password']);

if($login == "login"){

    $sql=mysqli_query($conn,"SELECT * FROM user  WHERE  u_username='".$user."'  AND  u_password='".$pass."' ");
 

    if(mysqli_num_rows($sql)==1){
        $row = mysqli_fetch_array($sql);

        $_SESSION["u_id"] = $row["u_id"]; // รหัสพนักงาน
        $_SESSION["p_id"] = $row["p_id"]; // ตำแหน่ง

        if($_SESSION["p_id"]=="1"){ 

            $show = "dashboard/index.php";

        }elseif($_SESSION["p_id"]=="2"){

            $show = "dashboard/index.php";

        }elseif($_SESSION["p_id"]=="3"){

            $show = "dashboard/index.php";

        }elseif($_SESSION["p_id"]=="4"){

            $show = "dashboard/index.php";

        }elseif($_SESSION["p_id"]=="5"){

            $show = "dashboard/index.php";
        }
   
    }else{
       
        $show = "0";
    }

    $data = array('data' => $show); 
    echo json_encode($data);
} 

if($logout == "logout"){
    //session_start();
    session_destroy();
}


?>