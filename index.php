<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Hili Truck Mailk Group</title>
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="ionicons-2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <link href="plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
        <link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
        <link href="login/animator.css" rel="stylesheet">
    </head>
    <body class="login-page">
        <div class="login-box" >
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <img src="customimage/Hili Trucklogo.png" class="img-circle center-block">
                    <h1 class="panel-title" align="center"><font color="#FF0000"><strong>Hili Truck Mailk Group</strong> </font></h1>
                    <br>
                    <h3 class="panel-title">Please Sign In</h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="post" id="form1">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="User Id" name="userid" id="email" type="text" >
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="userpass" id="password" type="password" value="">
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                </label>
                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            <input type="button" name="submit1" id="btnsubmit" value="Login" class="btn btn-lg btn-success btn-block">
                        </fieldset>
                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                    </form>
                </div>
            </div>
        </div>
    </body>
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script> 
    <script>
        $("#btnsubmit").click(function () {
            var user_name = $("#email").val();
            var user_pass = $("#password").val();
            if (user_name == '')
            {
                formError();
                submitMSG(false, "Error in input");
                //alert("Please enter the user name");
                //return false;
                //$errorMSG = "Name is required ";
            } else if (user_pass == '')
            {
                formError();
                submitMSG(false, "Error in input");
                //alert("Please enter the password");
                //return false;
                //$errorMSG = "Password is required ";
            } else
            {
                $.post("login_chk.php", {userid: user_name, userpass: user_pass},
                        function (data)
                        {
                            if (data == 1)
                            {
                                formSuccess();

                                window.location.href = "home.php";

                            } else
                            {
                                //window.location.href ="index.php";
                                formError();
                                submitMSG(false, "Error in input");
                            }
                        });

            }

        });

        function pausecomp(millis)
        {
            var date = new Date();
            var curDate = null;

            do {
                curDate = new Date();
            } while (curDate - date < millis);
        }

        function formSuccess() {
            $("#form1")[0].reset();
            submitMSG(true, "Login Successful");
        }

        function formError() {
            $("#form1").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
                $(this).removeClass();
            });
        }

        function submitMSG(valid, msg) {
            var msgClasses;
            if (valid) {
                msgClasses = "h3 text-center tada animated text-success";
            } else {
                msgClasses = "h3 text-center text-danger";
            }
            $("#msgSubmit").removeClass().addClass(msgClasses).text(msg);
            if (valid)
            {
                pausecomp(2000);
            }
        }

    </script>
    <script src="login/validator.js"></script>
</body>
</html>
