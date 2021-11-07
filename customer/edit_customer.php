<?php include "../conndb/conn.php";
$id = $_POST['id'];
$sql = "SELECT * FROM customer WHERE c_id = '$id' ";
$rs = mysqli_query($conn,$sql);
$rows = mysqli_fetch_array($rs);

?>
<div class="modal-body">
    <form id="edit_list2" method="POST" name="frm_edit" action="edit_customer_save.php">
        <table width="100%" class="text-center">
            <tr>
                <td>CID : </td>
                <td>
                    <input class="form-control text-center" type="text" autocomplete="off" placeholder="CID" disabled value="<?=$rows['c_id'];?>">
                    <input class="form-control text-center" name="frm_edit_id" type="hidden" autocomplete="off" placeholder="CID" value="<?=$rows['c_id'];?>">
                </td>
            </tr>
            <tr height="10px"></tr>
            <tr>
                <td>รหัสลูกค้า</td>
                <td>
                    <input class="form-control text-center" name="frm_edit_customer_id" type="text" autocomplete="off" placeholder="customer_id" value="<?=$rows['customer_id'];?>">
                </td>
            </tr>
                <tr height="10px"></tr>
            <tr>
                <td>ชื่อลูกค้า</td>
                <td>
                    <input class="form-control text-center" name="frm_edit_customer_name" type="text" autocomplete="off" placeholder="ชื่อลูกค้า" value="<?=$rows['customer_name'];?>">
                </td>
            </tr>
        </table>
        <div class="modal-body text-right">
            <button class="btn btn-primary mr-3" type="submit">แก้ไข</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
    </form>
</div>
<script type="text/javascript">
    // the selector will match all input controls of type :checkbox
    // and attach a click event handler 
    $("input:checkbox").on('click', function() {
    // in the handler, 'this' refers to the box clicked on
    var $box = $(this);
    if ($box.is(":checked")) {
        // the name of the box is retrieved using the .attr() method
        // as it is assumed and expected to be immutable
        var group = "input:checkbox[name='" + $box.attr("name") + "']";
        // the checked state of the group/box on the other hand will change
        // and the current value is retrieved using .prop() method
        $(group).prop("checked", false);
        $box.prop("checked", true);
    } else {
        $box.prop("checked", false);
    }
    });
    </script>