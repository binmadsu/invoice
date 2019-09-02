<?php 
/*
// For logged in user only
$uid = getMemberUserID();
if(!empty($uid)){ ?>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/jquery.tokeninput.js"></script>
<?php }*/
$urlCont =$this->router->fetch_class();
$url =$this->router->fetch_class()."/".$this->router->fetch_method();
?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/owl.carousel.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/owl.theme.default.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/animate.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/main.css">
<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/frontend/images/favicon.png">
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/jquery.min.js"></script>