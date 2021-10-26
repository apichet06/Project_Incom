<?php 
require_once "../conndb/conn.php";

$insert_update  = @($_POST['insert_update']);
$u_id           = @($_POST['u_id']);
$u_username     = @($_POST['u_username']);
$u_password     = @($_POST['u_password']);
$u_name         = @($_POST['u_name']);
$u_sur          = @($_POST['u_sur']);
$p_id           = @($_POST['p_id']);
$d_id           = @($_POST['d_id']);
 
$date           = date("y-m-d");
 
if($insert_update == "insert_update"){

if($u_id ==""){
 
   $sql = mysqli_query($conn,"SELECT * FROM user Where u_username ='$u_username' ");

   if(mysqli_num_rows($sql) >= 1){
        $show = 11;
        $alert = $already_have;
    }else{
  
  $sql =mysqli_query($conn,"INSERT INTO user (
    u_username,
    u_password,
    u_name,
    u_sur,
    p_id,
    d_id,
    u_date)VALUES ('$u_username','$u_password','$u_name','$u_sur','$p_id','$d_id','$date')") or die(mysqli_error($conn));

    if($sql){
       $show = 1;
       $alert = $success_insert;

    }else{
        $show = 0;
        $alert = $failed;
    }
}

}else if($u_id != ""){

    $sql0 = mysqli_query($conn,"SELECT * FROM user Where u_username ='$u_username' and u_id !='$u_id' "); 

    if(mysqli_num_rows($sql0) >= 1){
        $show = 11;
        $alert = $already_have;
    }else{

  $sql = mysqli_query($conn,"UPDATE user SET  
  u_username = '$u_username',
  u_password = '$u_password',
  u_name = '$u_name',
  u_sur = '$u_sur',
  p_id = '$p_id',
  d_id = '$d_id' Where u_id = '$u_id' ") or die(mysqli_error($conn));

if($sql){
    
    $show = 1;
    $alert = $success_update;
 
     }else{
         $show = 0;
         $alert = $failed;
     }
    }

}
 
    $data = array('data' => $show,'alert'=> $alert );
    echo json_encode($data);
}

 
$del = @($_POST['del']);

if($del == "del"){

  $sql = mysqli_query($conn,"DELETE FROM user Where u_id = '$u_id'") or die(mysqli_error($conn));
 
  if($sql){

       $show = '1';
       $alert = $success_delete;

   }else{

       $show = '0';
       $alert =$failed;
   }

   $data = array('data' => $show,'alert'=> $alert );
   echo json_encode($data);
}