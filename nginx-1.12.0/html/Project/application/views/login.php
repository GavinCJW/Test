<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
        <meta name="author" content="GeeksLabs">
        <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
        <link rel="shortcut icon" href="/rescource/img/favicon.png">

        <title>Login Page 2 | Creative - Bootstrap 3 Responsive Admin Template</title>

        <!-- Bootstrap CSS -->    
        <link href="/rescource/css/bootstrap.min.css" rel="stylesheet">
        <!-- bootstrap theme -->
        <link href="/rescource/css/bootstrap-theme.css" rel="stylesheet">
        <!--external css-->
        <!-- font icon -->
        <link href="/rescource/css/elegant-icons-style.css" rel="stylesheet" />
        <link href="/rescource/css/font-awesome.css" rel="stylesheet" />
        <!-- Custom styles -->
        <link href="/rescource/css/style.css" rel="stylesheet">
        <link href="/rescource/css/style-responsive.css" rel="stylesheet" />

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
    </head>

    <body class="login-img3-body">

    <div class="container">

      <div class="login-form">        
        <div class="login-wrap">
            <p class="login-img"><i class="icon_lock_alt"></i></p>
            <div class="input-group">
              <span class="input-group-addon"><i class="icon_profile"></i></span>
              <input type="text" class="form-control" id="username" name="username" placeholder="Username" autofocus>
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>
            <div id="error"></div>
            <label class="checkbox">
                <span style="float:left;padding-left:20px;"><input type="checkbox" id="rmb" value="remember-me"> Remember me</span>
                <span class="pull-right"> <a href="#"> Forgot Password?</a></span>
            </label>
            <button class="btn btn-primary btn-lg btn-block" id="check">Login</button>
            <!-- <button class="btn btn-info btn-lg btn-block" type="submit">Signup</button> -->
        </div>
      </div>

    </div>
    </body>
    <script src="/rescource/js/md5.js"></script>
    <script src="/rescource/js/jquery-3.2.1.min.js"></script>
    <script src="/rescource/js/jquery.cookie.js"></script>
    <script type="text/javascript">
        $(function(){
            if ($.cookie("rmb") == "true") {  
                $("#rmb").attr("checked", "checked");  
                $("#username").val($.cookie("username"));  
                //$("#password").val($.cookie("passWord"));  
            }  
        });

        $("#check").click(function(){
            var password= $("#password").val();
            var username= $("#username").val();
            if(password.length == 0  || username.length == 0){
                $("#error").html("用户名和密码不能为空！");
                $("#error").css("color","red");
                return false;   
            }
            $.ajax({  
                url:"/login/signIn",  
                type: "POST",  
                dataType : "json",
                data:{
                    "username":username,
                    "password":hex_md5(password)
                },
                success: function(ret){  
                    if(ret.code != "0000"){
                        $("#error").html(ret.msg);
                        $("#error").css("color","red"); 
                    }else{
                        /*记住我*/
                        if ($("#rmb").is(":checked")) {  
                            $.cookie("rmb", "true", {expires:7}); // 存储一个带7天期限的 cookie  
                            $.cookie("username", username, {expires:7}); 
                            /*$.cookie("password", password, {expires:7}); */ 
                        } else {  
                            $.cookie("rmb", "false", {expires:-1}); // 删除 cookie  
                            $.cookie("username", '', {expires:-1});  
                            /*$.cookie("password", '', {expires:-1}); */ 
                        }  
                        window.location.href = "/";
                    }
                },  
                error: function(){  
                  alert("false");  
                }  
            }); 
        });
    </script>
</html>
