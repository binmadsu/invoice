<!-- Header -->
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.bg-lightgray
{
    background-color:#3c8dbc;
}
.black-btn {
	background-color: #333 !important;
    border-color: #333 !important;
}
.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  display: block;
  color: #fff;
  text-align: center;
  padding: 10px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.active {
  background-color: #4CAF50;
  color: white;
}

.topnav .icon {
  display: none;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
}
.black-heading {
	color:#111;
}
.contentpanel {
	background:url(../images/mail.jpg) no-repeat center top;
	background-size:cover;
}
.bg-white {
    background: #333 !important;
}
.clr{
	color: #fff;
}
.logo img {
	width:170px;
}
.logo1 img {
	width:170px;
}
.login-page,
.register-page {
  background: #054367 !important;
    min-height: 100vh;
}
</style>
</head>
<body>
<div class="topnav" id="myTopnav">
  <a href="" class=""></a>
  <a href="#" class="logo"><img src="<?php echo base_url()?>images/logomain1.png"  /></a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>
<div style="padding-left:15px"> 
</div>
<script>
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
</script>
</body>
</html>
<!-- Header -->
<!-- Login Panel -->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>NextraOne| Admin System Log in</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="login-page">
<?php $this->load->view('admin/header');?>
<div class="contentpanel">
<div class="row">
<div class="col-md-4" style="margin-left: auto; margin-right: 80px; float: none; margin-top:30px;">
<?php echo form_open('admin/login/check',array('class' => 'form-login','id'=>'login-form')); ?>
<div class="panel panel-default">
<div class="panel-heading">
<a href="#" class="logo1"><center><img src="<?php echo base_url()?>images/logomain1.png" /><center><br></a>
</div>
<div class="login-box-body">
<h3 class="panel-title">Login</h3>
</div>
<div class="panel-body">
<div align="center" class=""><?php 
echo showerrormsg($this->session->flashdata('error_msg'));
	?></div>
	<div class="form-group">
		<div class="col-sm-12">
			<input type="text" name="username" required value="<?php if(isset($username)){ echo $username;} ?>" class="form-control" 
			placeholder="Username" autofocus>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-12">
			<input type="hidden" name="abc" value="12344" >
			<input type="password" name="password" required value="<?php if(isset($password)){ echo $password;} ?>" class="form-control" 
			placeholder="Password">
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-12">
			<span><input type="checkbox"  name="remember" value="on" <?php if(isset($remember) && $remember=="on" ){ echo "checked = checked"; } ?> /> Remember me</span>
		</div>
	</div>
	  <!-- Modal -->
	  <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
		  <div class="modal-dialog">

			  <div class="modal-content">

				  <div class="modal-header">

					  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
     	              <h4 class="modal-title">Forgot Password ?</h4>

				  </div>

				  <div class="modal-body">

					  <p>Enter your e-mail address below to reset your password.</p>
					  <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
				  </div>
				  <div class="modal-footer">
					  <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
					  <button class="btn btn-theme" type="button">Submit</button>
				  </div>
			  </div>
		  </div>
	  </div>

	  <!-- modal -->

	</div><!-- panel-body -->
	<div class="panel-footer">
	  <div class="row">
	  <br>
		<div class="col-sm-12">
		  <button class="btn btn-primary black-btn"  style="width:100%" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
		</div>	
	  </div>
	</div>
	</div>
</form>	  	
</div>
</div>
</div>
<?php 
$this->load->view('admin/footer');
?>
<script type="text/javascript">
jQuery(document).ready(function(){
jQuery("#form-login").validate({
highlight: function(element) {
jQuery(element).closest('.form-group').removeClass('has-success').addClass('has-error');
},
success: function(element) {
jQuery(element).closest('.form-group').removeClass('has-error');
}
});
});
</script>
<!-- Login Panel -->
<!-- Footer -->
<footer class="container-fluid text-center bg-white">
        <div class="copyrights" style="margin-top:15px;">           
            <p class="clr">NextraOne © 2018, All Rights Reserved Version-1.0</p><a class="clr" href="https://www.nextraone.com" target="_blank">NextraOne  <i class="glyphicon glyphicon-envelope" aria-hidden="true"></i> </a></p>
        </div>
</footer>
<!--Footer -->