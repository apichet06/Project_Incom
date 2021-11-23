<?php
require_once '../conndb/conn.php';

$condition  = $_POST['condition'];
  $c_id  = @$_POST['c_id']; //เรียก c_id
$pa_id  = @$_POST['pa_id'];

if ($condition == "customer") {

    $sql = mysqli_query($conn, "SELECT customer_id FROM customer Where c_id = '$c_id' ");
    $rs = mysqli_fetch_array($sql);

    $customer_id = $rs['customer_id'];

    $data = array('customer_id' => $customer_id);
    echo json_encode($data);

} else if ($condition == "part") {

   $sql = mysqli_query($conn,"SELECT * FROM part a 
    inner join color b 
    on a.color_id =b.color_id
    inner join thickness c 
    on a.thickness_id = c.thickness_id
    inner join baking d 
    on a.baking_id = d.baking_id
    Where pa_id = '$pa_id' ");
   $rs =mysqli_fetch_array($sql);
 
   $pa_no         = $rs['pa_no'];
   $pa_name       = $rs['pa_name'];
   $pa_spec       = $rs['pa_spec'];
   $pa_color      = $rs['color_name'];
   $pa_thickness  = $rs['thickness_name'];
   $pa_img        = $rs['pa_img'];
   $baking        = $rs['baking_name'];
   $data = array('pa_no' => $pa_no,'pa_name' => $pa_name,'pa_spec' => $pa_spec,'pa_color' => $pa_color,'pa_thickness' => $pa_thickness,'pa_img' => $pa_img,'baking'=>$baking);
   echo json_encode($data);


}
