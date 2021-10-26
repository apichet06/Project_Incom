<?php  
session_start(); 
require_once '../conndb/conn.php';
 
if($_SESSION['u_id']){

    $pa_id      = @$_POST['pa_id'];
    $pa_no      = @$_POST['pa_no'];
    $pa_name    = @$_POST['pa_name'];
    $pa_spec    = @$_POST['pa_spec'];
    $pa_color   = @$_POST['pa_color'];
    $pa_thickness   = @$_POST['pa_thickness']; 
    $pa_date        = date("y-m-d");
    $insert_update  = @$_POST['insert_update'];
    $u_id           = @$_SESSION['u_id'];

    if($insert_update == "insert_update"){
        
        if ($_FILES['pa_img']['name']){

            $RandomNum        = $pa_no;
            $Tmp_name         = $_FILES['pa_img']['tmp_name'];
            $ImageName        = str_replace(' ','-',strtolower($_FILES['pa_img']['name']));
            $ImageType        = $_FILES['pa_img']['type']; 
            $ImageExt       = substr($ImageName, strrpos($ImageName, '.'));
            $ImageExt       = str_replace('.','',$ImageExt); 
            $pa_img         = $RandomNum.'.'.$ImageExt;
            $folder         = "image/".$pa_img;  
            move_uploaded_file($Tmp_name,$folder);
        }

   if($pa_id == ""){

            
    $sql = mysqli_query($conn,"SELECT * FROM part Where pa_no ='$pa_no' ");

    if(mysqli_num_rows($sql) >= 1){
        $show = 11;
        $alert = $already_have;
    }else{
    
            $sql = mysqli_query($conn,"INSERT INTO part(pa_no,pa_name,pa_spec,pa_color,pa_thickness,pa_img,pa_date,u_upload)
            VALUES
            ('$pa_no','$pa_name','$pa_spec','$pa_color','$pa_thickness','$pa_img','$pa_date','$u_id')");

        if($sql){
            $show  = 1;
            $alert = $success_insert;

        }else{
            $show  = 0;
            $alert = $failed;
        }
    }
  
        }else{

            $sql0 = mysqli_query($conn,"SELECT * FROM part Where pa_no ='$pa_no' and pa_id !='$pa_id' "); 

            if(mysqli_num_rows($sql0) >= 1){
                $show = 11;
                $alert = $already_have;
            }else{
      
                if($_FILES['pa_img']['name']){
                    $sql = mysqli_query($conn,"UPDATE part SET  
                    pa_no='$pa_no'
                    ,pa_name='$pa_name'
                    ,pa_spec='$pa_spec'
                    ,pa_color='$pa_color'
                    ,pa_thickness='$pa_thickness'
                    ,pa_img='$pa_img'
                    ,u_upload = '$u_id'
                    Where pa_id = '$pa_id' ");
                }else{
                    $sql = mysqli_query($conn,"UPDATE part SET  
                    pa_no='$pa_no'
                    ,pa_name='$pa_name'
                    ,pa_spec='$pa_spec'
                    ,pa_color='$pa_color'
                    ,pa_thickness='$pa_thickness' 
                    ,u_upload = '$u_id'
                    Where pa_id = '$pa_id' ");
                }
            

            if($sql){
            
            $show = 1;
            $alert = $success_update;
        
            }else{
                $show  = 0;
                $alert = $failed;
            }
             
        }
    }
    $data = array('data' => $show,'alert'=> $alert );
    echo json_encode($data);

    } //ปิด insert update

  $del = @($_POST['del']);
    if($del == "del"){
        $sql0 = mysqli_query($conn,"SELECT pa_img FROM part WHERE pa_id = '$pa_id' ");
        $rs = mysqli_fetch_array($sql0); 
        @unlink('image/'.$rs['pa_img']);
        $sql = mysqli_query($conn,"DELETE FROM part WHERE pa_id = '$pa_id' "); 

        if($sql){ 

         $show  = 1;
         $alert = $success_delete;
         
        }else{
            
            $show  = 0;
            $alert = $failed;

        }
        $data = array('data' => $show,'alert'=> $alert );
        echo json_encode($data);

    }


}else{

    $show = 3;
    $alert = $session;

    $data = array('data' => $show,'alert'=> $alert );
    echo json_encode($data);

} 
?>