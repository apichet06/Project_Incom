$("#plus").click(function (e) {
    e.preventDefault();
    $("#alert").html("");
    $("#show_txt").text("เพิ่มสมาชิกใหม่"); 

    $("#u_id").val("");
    $("#u_username").val("");
    $("#u_password").val("");
    $("#u_name").val("");
    $("#u_sur").val("");
    $("#p_id").val("");
    $("#d_id").val("");
});

$("#insert_update").submit(function (e) {
    e.preventDefault();
    $("#alert").html("");
    var insert_update = "insert_update";
    $.ajax({
        type: "post",
        url: "manages.php",
        data: $(this).serialize() + "&insert_update=" + insert_update,
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
            } else {
                Swal.fire({
                    icon: "error",
                    title: response.alert,
                });
            }
        },
    });
});

$(".edit").click(function (e) {
    e.preventDefault();
    $("#alert").html("");
    $("#show_txt").text("แก้ไขสมาขิก");
    var u_id = $(this).data("u_id");
    var u_username = $(this).data("u_username");
    var u_password = $(this).data("u_password");
    var u_name = $(this).data("u_name");
    var u_sur = $(this).data("u_sur");
    var p_id = $(this).data("p_id");
    var d_id = $(this).data("d_id");

    $("#u_id").val(u_id);
    $("#u_username").val(u_username);
    $("#u_password").val(u_password);
    $("#u_name").val(u_name);
    $("#u_sur").val(u_sur);
    $("#p_id").val(p_id);
    $("#d_id").val(d_id);
});

$(".delete").click(function (e) {
    e.preventDefault();
    var u_id = $(this).data("u_id");

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
                data: { u_id: u_id, del: del },
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
