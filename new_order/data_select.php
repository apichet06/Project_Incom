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

   $sql = mysqli_query($conn,"SELECT * FROM part Where pa_id = '$pa_id' ");
   $rs =mysqli_fetch_array($sql);
 
   $pa_no         = $rs['pa_no'];
   $pa_name       = $rs['pa_name'];
   $pa_spec       = $rs['pa_spec'];
   $pa_color      = $rs['pa_color'];
   $pa_thickness  = $rs['pa_thickness'];
   $pa_img        = $rs['pa_img'];
 
   $data = array('pa_no' => $pa_no,'pa_name' => $pa_name,'pa_spec' => $pa_spec,'pa_color' => $pa_color,'pa_thickness' => $pa_thickness,'pa_img' => $pa_img);
   echo json_encode($data);


}
