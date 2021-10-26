$('#data').DataTable();

$(document).ready(function () {
    $(document).find("input:checked[type='radio']").addClass("bounce");
    $("input[type='radio']").click(function () {
      $(this).prop("checked", false);
      $(this).toggleClass("bounce");
  
      if ($(this).hasClass("bounce")) {
        $(this).prop("checked", true);
        $(document)
          .find("input:not(:checked)[type='radio']")
          .removeClass("bounce");
      }
    });
  });
  
  $(function () {
    $(
      "#n_datejob,#n_bid_date,#n_admissiondate,#n_desired,#n_bindate"
    ).datetimepicker({
      format: "L",
      format: "YYYY-MM-DD",
    });
  });
  
  $("#pa_id,#c_id").select2();
  
  $("#c_id").change(function (e) {
    e.preventDefault();
    var c_id = $("#c_id").val();
    var condition = "customer";
    $.ajax({
      type: "post",
      url: "../new_order/data_select.php",
      data: { c_id: c_id, condition: condition },
      dataType: "json",
      success: function (data) {
        $("#customer_id").val(data.customer_id);
  
      },
    });
  });
  
  $("#pa_id").change(function (e) {
    e.preventDefault();
    var pa_id = $("#pa_id").val();
    var condition = "part";
    $.ajax({
      type: "post",
      url: "../new_order/data_select.php",
      data: { pa_id: pa_id, condition: condition },
      dataType: "json",
      success: function (data) {
        $('#pa_no').val(data.pa_no)
        $('#pa_name').val(data.pa_name)
        $('#pa_spec').val(data.pa_spec)
        $('#pa_color').val(data.pa_color)
        $('#pa_thickness').val(data.pa_thickness)
        if (data.pa_img !== null) {
          $('#pa_img').attr("src", "../part/image/" + data.pa_img)
        } else {
          $('#pa_img').attr("src", "../img/no-image.jpg")
  
        }
  
      },
    });
  });