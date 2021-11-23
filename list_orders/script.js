$(".data").DataTable();


$('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
  localStorage.setItem('activeTab', $(e.target).attr('href'));
});
var activeTab = localStorage.getItem('activeTab');
if (activeTab) {
  $('a[href="' + activeTab + '"]').tab('show');
}
 

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
      $("#pa_no").val(data.pa_no);
      $("#pa_name").val(data.pa_name);
      $("#pa_spec").val(data.pa_spec);
      $("#pa_color").val(data.pa_color);
      $("#pa_thickness").val(data.pa_thickness);
      $('input[name^="n_baking"][value="'+data.baking+'"').prop('checked',true);
      if (data.pa_img !== null) {
        $("#pa_img").attr("src", "../part/image/" + data.pa_img);
      } else {
        $("#pa_img").attr("src", "../img/no-image.jpg");
      }
    },
  });
});

 

$("#edit_neworder").submit(function (e) {
  e.preventDefault();
  var edit_neworder = "edit_neworder";
  Swal.fire({
    title: 'ยืนยันการแก้ไขส่งไปอนุมัติ',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'ตกลง',
    cancelButtonText: 'ยกเลิก',
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "post",
        url: "manages.php",
        data: $(this).serialize() + "&edit_neworder=" + edit_neworder,
        dataType: "json",
        success: function (response) {
          if (response.data == 1) {
            Swal.fire({
              icon: "success",
              title: response.alert,
              showConfirmButton: false,
            });
            setTimeout(() => {
              window.location.href = "index.php";
            }, 1000);
          } else if (response.data == 0) {
            Swal.fire({
              icon: "error",
              title: response.alert,
            });
          } else if (response.data == 3) {
            Swal.fire({
              icon: "error",
              title: response.alert,
              showDenyButton: false,
              showCancelButton: false,
              confirmButtonText: "ตลลง",
            }).then((result) => {
              if (result.isConfirmed) {
                window.location.reload();
              }
            });
          }
        },
      });
    }
  });



});
