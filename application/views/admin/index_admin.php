<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin OneClick</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/iCheck/square/blue.css">
    <style>
      .error
      {
        color: red; 
      }
      #login_error
      {
        color: red;
        padding: 60px;
        font-size: 17px;
      }
    </style>
  </head>
  
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="<?php echo base_url(); ?>"><b>Admin</b>&nbsp;OneClick</a>
      </div><!-- /.login-logo -->
      <span id="login_error"></span>
      <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p> 
        
        <form method="POST" id="form_save" >
          <div class="form-group has-feedback">
            <input type="text" class="form-control" id="email_address" placeholder="Email" name="email_address">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            <span class="error" id="email_error"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" id="password" placeholder="Password" name="password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            <span class="error" id="password_error"></span>
          </div>
          <div class="row">
            <div class="col-xs-8"> 
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" id="admin_form" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div><!-- /.col -->
          </div>
        </form>
      
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

  </body>

  <!-- jQuery 2.1.4 -->
  <script src="<?php echo base_url(); ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
  <!-- Bootstrap 3.3.5 -->
  <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
  <!-- iCheck -->
  <script src="<?php echo base_url(); ?>plugins/iCheck/icheck.min.js"></script>
  <script>
    $(function () {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' // optional
      });
    });
  </script>

  <!-- Admin Login Form validation & Submission -->
  <script>
    $(function() {
      
      $("#admin_form").click(function(){

        $(".error").html('');
        
        if($("#email_address").val() == '')
        {
          $("#email_address").focus().val('');
          $("#email_error").html("Enter Email");
          return false;
        }

        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        if(!(emailReg.test($("#email_address").val())))
        {
          $("#email_address").focus().val('');
          $("#email_error").html("Invalid Email");
          return false;
        }

        if($("#password").val() == '')
        {
          $("#password").focus().val('');
          $("#password_error").html("Password required");
          return false;
        }

        var email_address = $("#email_address").val();
        var password = $("#password").val();

        var data = {email_address:email_address,password:password};
        
        $.ajax({
          
          type:"POST",
          url:"<?php echo base_url(); ?>admin/admin/signin_form",
          data:data,
          success:function(result)
          {
            if(result == 2)
            {
              //alert("valid");
              $("#login_error").html("Username or password is invalid");
            }
            else if(result == 1)
            {
              window.location="<?php echo base_url(); ?>admin/admin/index";
            }
          }
        });
        return false;
      });
    });
  </script>
  <!-- End Admin Login -->
</html>