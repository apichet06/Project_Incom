$("#plus").click(function (e) {
    e.preventDefault();
    $("#alert").html("");
    $("#show_txt").text("เพิ่ม Part");

    $("#pa_id").val("");
    $("#pa_no").val("");
    $("#pa_name").val("");
    $("#pa_spec").val("");
    $("#pa_color").val("");
    $("#pa_thickness").val("");
    $("#pa_img").val("");
});

$(".edit").click(function (e) {
    e.preventDefault();
    $("#alert").html("");
    $("#show_txt").text("แก้ไข Part");

    var pa_id = $(this).data('pa_id');
    var pa_no = $(this).data('pa_no');
    var pa_name = $(this).data('pa_name');
    var pa_spec = $(this).data('pa_spec');
    var pa_color = $(this).data('pa_color');
    var pa_thickness = $(this).data('pa_thickness');

    $("#pa_id").val(pa_id);
    $("#pa_no").val(pa_no);
    $("#pa_name").val(pa_name);
    $("#pa_spec").val(pa_spec);
    $("#pa_color").val(pa_color);
    $("#pa_thickness").val(pa_thickness);
 
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