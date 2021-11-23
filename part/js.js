$("#plus").click(function (e) {
    e.preventDefault();
    $("#alert").html("");
    $("#show_txt").text("เพิ่ม Part");

    $("#pa_id").val("");
    $("#pa_no").val("");
    $("#pa_name").val("");
    $("#pa_spec").val("");
    $("#color_id").val("");
    $("#thickness_id").val("");
    $("#pa_img").val("");

    $("#production_line_id").val("");
    $("#production_line_id").val("");
    $("#type_id").val("");
    $("#baking_id").val("");
  
     
    
});

$(".edit").click(function (e) {
    e.preventDefault();
    $("#alert").html("");
    $("#show_txt").text("แก้ไข Part");

    var pa_id = $(this).data('pa_id');
    var pa_no = $(this).data('pa_no');
    var pa_name = $(this).data('pa_name');
    var pa_spec = $(this).data('pa_spec');
    var color_id = $(this).data('color_id');
    var thickness_id = $(this).data('thickness_id');
    var production_line_id = $(this).data('production_line_id');
    var special_control_id = $(this).data('special_control_id');
    var type_id = $(this).data('type_id');
    var baking_id = $(this).data('baking_id');

    $("#pa_id").val(pa_id);
    $("#pa_no").val(pa_no);
    $("#pa_name").val(pa_name);
    $("#pa_spec").val(pa_spec);
    $("#color_id").val(color_id);
    $("#thickness_id").val(thickness_id);
    $("#production_line_id").val(production_line_id);
    $("#special_control_id").val(special_control_id);
    $("#type_id").val(type_id);
    $("#baking_id").val(baking_id);
 
});

$(function () {
    bsCustomFileInput.init();
});


$("#insert_update").submit(function (e) {
    e.preventDefault();
    $("#alert").html("");
    var insert_update = "insert_update";
    var formData = new FormData(this);
    formData.append('insert_update', insert_update);
    $.ajax({
        type: "post",
        url: "manages.php",
        data: formData,
        processData: false,
        contentType: false,
        dataType: "json",
        success: function (response) {
            if (response.data == 11) {
                setTimeout(() => {
                    $("#alert").html(
                        "<div class=\"alert alert-warning fade text-center btn-sm show\" role=\"alert\"><strong>\
                        <i class=\"fa fa-exclamation-triangle\"> </i> </strong> " + response.alert + "</div>"
                    );
                }, 500);
            } else if (response.data == 1) {
                Swal.fire({
                    icon: "success",
                    title: response.alert,
                    showConfirmButton: false,
                });
                $("#add_edit").modal("hide");
                setTimeout(() => {
                    window.location.reload();
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
                    confirmButtonText: 'ตลลง',
                }).then((result) => {
                  
                    if (result.isConfirmed) {
                        window.location.reload();
                    }
                })

            }
        },
    });
});

  

  $(".delete").click(function (e) {
    e.preventDefault();
    var pa_id = $(this).data("pa_id");

    Swal.fire({
        title: delete_title,
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: ok,
        cancelButtonText: cancle,
    }).then((result) => {
        if (result.isConfirmed) {
            var del = "del";

            $.ajax({
                type: "post",
                url: "manages.php",
                data: { pa_id: pa_id, del: del },
                dataType: "json",
                success: function (response) {
                    Swal.fire({
                        icon: "success",
                        title: response.alert,
                        showConfirmButton: false,
                    });

                    setTimeout(() => {
                        window.location.reload();
                    }, 1000);
                },
            });
        }
    });
});


 $(function() {
    $('.pop').on('click', function() {
        $('.imagepreview').attr('src', $(this).find('img').attr('src'));
        $('#imagemodal').modal('show');   
    });     
});


$(document).ready(function() {
    $('#data').DataTable({
        "pagingType": "full_numbers"
    });
} );