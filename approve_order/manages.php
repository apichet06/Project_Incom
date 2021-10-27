<?php session_start();
$Session_id = $_SESSION['u_id'];
require_once '../conndb/conn.php';

$n_id               = @$_POST['n_id'];
$n_customerStatus   = @$_POST['n_customerStatus'];
$n_datejob          = @$_POST['n_datejob'];
// $n_number           = @$_POST['n_number'];
$n_specstatus       = @$_POST['n_specstatus'];
$n_lot              = @$_POST['n_lot'];
$c_id               = @$_POST['c_id']; // id ลูกค้า
$customer_id        = @$_POST['customer_id']; // รหัสลูกค้า
$pa_id              = @$_POST['pa_id'];
// $part               = @$_POST['part'];
$pa_name            = @$_POST['pa_name'];
$n_admissiondate    = @$_POST['n_admissiondate'];
$n_desired          = @$_POST['n_desired'];
$n_line             = @$_POST['n_line'];
// $n_znfe             = @$_POST['n_znfe'];
$n_barel            = @$_POST['n_barel'];
$n_rack             = @$_POST['n_rack'];
// $n_lathe            = @$_POST['n_lathe'];
$n_baking           = @$_POST['n_baking'];
$n_product_safety   = @$_POST['n_product_safety'];
$n_white_rust       = @$_POST['n_white_rust'];
$n_red_rust         = @$_POST['n_red_rust'];
$n_customeritem     = @$_POST['n_customeritem'];
$n_item             = @$_POST['n_item'];
$n_producgroup      = @$_POST['n_producgroup'];
$n_producgroupother = @$_POST['n_producgroupother'];
$n_automotivetype   = @$_POST['n_automotivetype'];
$n_carcamp          = @$_POST['n_carcamp'];
$n_workgroup        = @$_POST['n_workgroup'];
$n_weight           = @$_POST['n_weight'];
$n_madel            = @$_POST['n_madel'];
$n_remark           = @$_POST['n_remark'];
$n_volume           = @$_POST['n_volume'];
$n_amount_mk        = @$_POST['n_amount_mk'];
$n_amount_mitem     = @$_POST['n_amount_mitem'];
$n_amount_yk        = @$_POST['n_amount_yk'];
$n_amount_yitem     = @$_POST['n_amount_yitem'];
$n_thickness        = @$_POST['n_thickness'];
$n_thickness_other  = @$_POST['n_thickness_other'];
$n_examine          = @$_POST['n_examine'];
$n_examine_percen   = @$_POST['n_examine_percen'];
//$n_nuantity_input   = @$_POST['n_nuantity_input']; //จำนวนที่รับเข้า
//$n_itemk            = @$_POST['n_itemk']; //ชิ้น กก.
//$n_container        = @$_POST['n_container']; //ภาชนะบรรจุ  
$n_box              = @$_POST['n_box'];
$ref                = @$_POST['ref'];
$n_boxk             = @$_POST['n_boxk'];
$n_itembag          = @$_POST['n_itembag'];
$n_inout_procuct    = @$_POST['n_inout_procuct'];
$n_inout_other      = @$_POST['n_inout_other'];
$n_open_fly         = @$_POST['n_open_fly'];
$n_open_flythink    = @$_POST['n_open_flythink'];
$n_bin_number       = @$_POST['n_bin_number'];
$n_userbin_name     = @$_POST['n_userbin_name'];
$n_bindate          = @$_POST['n_bindate'];
$n_approve_data     = @$_POST['n_approve_data'];
$n_id_ecacc         = @$_POST['n_id_ecacc'];
//$n_user_approve     = @$_POST['n_user_approve'];
$u_username         = @$_POST['u_username'];
$date               = date('Y-m-d');
$n_nuote_nuote      = @$_POST['n_nuote_nuote'];
$n_bid_date         = @$_POST['n_bid_date'];

$reject = @$_POST['reject'];
$n_reject = @$_POST['n_reject'];
$approve = @$_POST['approve'];

if($_SESSION['u_id']){
 
      if ($reject =="reject") {
      
         $sql = mysqli_query($conn, "UPDATE new_order SET n_reject='$n_reject',n_reject_date='$date' Where  n_id = '$n_id' ");
         
         if ($sql) {
            $show  = 1;
            $alert = $success_insert;
         } else {
            $show  = 0;
            $alert = $failed;
         }
         $data = array('data' => $show, 'alert' => $alert);
         echo json_encode($data);

      }

      if($approve == "approve"){

            $sql = mysqli_query($conn, "UPDATE new_order SET   
               n_id              ='$n_id',
               n_customerStatus  ='$n_customerStatus',
               n_datejob         ='$n_datejob',
               n_specstatus      ='$n_specstatus',
               n_lot             ='$n_lot',
               c_id              ='$c_id', 
               customer_id       ='$customer_id', 
               pa_id             ='$pa_id',
               pa_name           ='$pa_name',
               n_admissiondate   ='$n_admissiondate',
               n_desired         ='$n_desired',
               n_line            ='$n_line',
               n_barel           ='$n_barel',
               n_rack            ='$n_rack',
               n_baking          ='$n_baking',
               n_product_safety  ='$n_product_safety',
               n_white_rust      ='$n_white_rust',
               n_red_rust        ='$n_red_rust',
               n_customeritem    ='$n_customeritem',
               n_item            ='$n_item',
               n_producgroup     ='$n_producgroup',
               n_producgroupother='$n_producgroupother',
               n_automotivetype  ='$n_automotivetype',
               n_carcamp         ='$n_carcamp',
               n_workgroup       ='$n_workgroup',
               n_weight          ='$n_weight',
               n_madel           ='$n_madel',
               n_remark          ='$n_remark',
               n_volume          ='$n_volume',
               n_amount_mk       ='$n_amount_mk',
               n_amount_mitem    ='$n_amount_mitem',
               n_amount_yk       ='$n_amount_yk',
               n_amount_yitem    ='$n_amount_yitem',
               n_thickness       ='$n_thickness',
               n_thickness_other ='$n_thickness_other',
               n_examine         ='$n_examine',
               n_examine_percen  ='$n_examine_percen',
               n_box             ='$n_box',
               ref               ='$ref',
               n_boxk            ='$n_boxk',
               n_itembag         ='$n_itembag',
               n_inout_procuct   ='$n_inout_procuct',
               n_inout_other     ='$n_inout_other',
               n_open_fly        ='$n_open_fly',
               n_open_flythink   ='$n_open_flythink',
               n_bin_number      ='$n_bin_number',
               n_userbin_name    ='$n_userbin_name',
               n_bindate         ='$n_bindate',
               n_approve_data    ='$n_approve_data',
               n_id_ecacc        ='$n_id_ecacc',
               n_user_approve    ='$Session_id', 
               n_approve_date    ='$date',
               n_nuote_nuote     ='$n_nuote_nuote',
               n_bid_date        ='$n_bid_date' WHERE n_id = '$n_id'") or die(mysqli_error($conn));

            if ($sql) {
               $show  = 1;
               $alert = $success_insert;
            } else {
               $show  = 0;
               $alert = $failed;
            }

            $data = array('data' => $show, 'alert' => $alert);
            echo json_encode($data);

      }

} else {
   $show = 3;
   $alert = $session;

   $data = array('data' => $show, 'alert' => $alert);
   echo json_encode($data);
}


?>