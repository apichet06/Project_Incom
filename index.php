<?php
    session_start();
    require_once('connect_db.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login SPZ</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="login/images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="login/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="login/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="login/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="login/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="login/css/util.css">
    <link rel="stylesheet" type="text/css" href="login/css/main.css">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100" style="background-image: url('login/images/img-01.jpg');">
            <div class="wrap-login100 p-t-190 p-b-30">
                <form class="login100-form validate-form" id="login">
                    <div class="login100-form-avatar">
                        <img src="img/logo.png" alt="AVATAR">
                    </div>

                    <span class="login100-form-title p-t-20 p-b-45">
                        S.P.Zinc Metal
                    </span> 
                    <div id="alert" class="wrap-input100"></div>
                    <div class="wrap-input100 validate-input m-b-10" data-validate="กรุณากรอกชื่อผู้ใช้งาน">
                        <input class="input100" type="text" name="username" placeholder="ชื่อผู้ใช้" autocomplete="off"  >
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-10" data-validate="กรุณากรอกรหัสผ่าน">
                        <input class="input100" type="password" name="password" placeholder="รหัสผ่าน" autocomplete="off" >
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock"></i> 
                        </span>
                    </div>

                    <div class="container-login100-form-btn p-t-10">
                        <button class="login100-form-btn" type="submit">
                            <b style="font-size: 20px;">เข้าสู่ระบบ</b>
                        </button>
                    </div>

                    <div class="text-center w-full p-t-25 p-b-230">
                        <!-- <a href="#" class="txt1">
							ลืมชื่อผู้ใช้งาน / รหัสผ่าน ?
						</a> -->
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--===============================================================================================-->
    <script src="login/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="login/vendor/bootstrap/js/popper.js"></script>
    <script src="login/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="login/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="login/js/main.js"></script>




    <script>

    $("#login").submit(function(e) {
        e.preventDefault();
		$("#alert").html(""); 
      var username = document.getElementsByName("username")[0].value;
	  var password = document.getElementsByName("password")[0].value;
	   if(username !="" && password !=""){
 
        var login = "login";
        $.ajax({
            type: "post",
            url: "Login/manage_login.php",
            data: $(this).serialize() + "&login=" + login,
			dataType: "json", 
            success: function(response) {
			 
                if (response.data==0) {
					$("#alert").html("<div class=\"alert alert-danger fade text-center show\" role=\"alert\"><strong>\
					<i class=\"fa fa-exclamation-triangle\"> </i> </strong> ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง.</div>"); 
                } else { 
					//console.log(response.data);
                  window.location.href = response.data;

                }

            }
        });
 }
    });
    
    </script>

</body>

</html>