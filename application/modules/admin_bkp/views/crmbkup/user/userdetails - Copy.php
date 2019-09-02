							<!DOCTYPE html>
							<html lang="en">
							<head>
							<meta charset="utf-8">
							<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
							<meta name="description" content="">
							<meta name="author" content="">
							<link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.png" type="image/png">
							<title>Nextra CRM</title>
							<link href="<?php echo base_url(); ?>assets/admin/css/style.default.css" rel="stylesheet">
							<link href="<?php echo base_url(); ?>assets/admin/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
							<!-- FontAwesome 4.3.0 -->
							<link href="<?php echo base_url(); ?>assets/admin/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
							<!-- Ionicons 2.0.0 -->
							<link href="<?php echo base_url(); ?>assets/admin/onicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
							<!-- Theme style -->
							<link href="<?php echo base_url(); ?>assets/admin/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
							<!-- AdminLTE Skins. Choose a skin from the css/skins 
							folder instead of downloading all of them to reduce the load. -->
							<link href="<?php echo base_url(); ?>assets/admin/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
							<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
							<!--[if lt IE 9]>
							<script src="<?php echo base_url(); ?>assets/admin/js/html5shiv.js"></script>
							<script src="<?php echo base_url(); ?>assets/admin/js/respond.min.js"></script>
							<![endif]-->
							<script>
							var baseUrl = '<?php echo base_url();?>';
							</script>
							<style>
							.small-box.custom-small-box:hover {
							color:#000 !important;
							}
							.inner h4 {
							padding: 6px 10px;
							background: rgba(0,0,0,0.1);
							}
							.tabspace{
							margin:0 5px;
							}

							</style>
							</head>
							<body class="skin-blue sidebar-mini">
							<div class="wrapper">
							<?php 
							$urlCont = $this->router->fetch_class();
							$url = $this->router->fetch_class()."/".$this->router->fetch_method();
							//$userType=getCurUserType();
							?>
							<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

							<header class="main-header">
							<!-- Logo -->
							<a href="<?php echo base_url().'admin'; ?>" class="logo">
							<!-- mini logo for sidebar mini 50x50 pixels -->
							<span class="logo-mini"><b>C</b>RM</span>
							<!-- logo for regular state and mobile devices -->
							<span class="logo-lg"><b>Nextra-CRM</b></span>
							</a>
							<!-- Header Navbar: style can be found in header.less -->
							<nav class="navbar navbar-static-top" role="navigation">
							<!-- Sidebar toggle button-->
							<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
							<span class="sr-only">Toggle navigation</span>
							</a> 
							<div class="navbar-custom-menu">
							<ul class="nav navbar-nav">
							<li class="dropdown tasks-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
							<i class="fa fa-history"></i> 
							</a>
							<ul class="dropdown-menu">
							<li class="header"> Last Login : <i class="fa fa-clock-o"></i> <?php //echo empty($last_login) ? "First Time Login" : $last_login; ?></li>
							</ul>
							</li>
							<!-- User Account: style can be found in dropdown.less -->
							<li class="dropdown user user-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<?php ?><img src="images/photos/loggeduser.png" alt="" /><?php ?>  
							<?php $uid = getCurUserID();
							$uDetails = getAdminUserDetailsById($uid);
							//echo ' uid: '.$uid.' == ';pr($uDetails);die;
							$username = isset($uDetails['full_name'])?$uDetails['full_name']:$uDetails['username'];
							echo $username;?>
							</a>
							<ul class="dropdown-menu">
							<!-- User image -->
							<!-- Menu Footer-->
							<li class="user-footer">
							<div class="pull-left">
							<a href="" class="btn btn-default btn-flat"><i class="fa fa-key"></i> Change Password</a>
							</div>
							<div class="pull-right">
							<a href="<?php echo base_url();?>admin/logout" class="btn btn-default btn-flat"><i class="fa fa-sign-out"></i> Sign out</a>
							</div>
							</li>
							</ul>
							</li>
							</ul>
							</div>
							</nav>
							</header>
							<?php $this->load->view('admin/sidebar-menu');?>

							
							<div class="content-wrapper">
							<!-- Content Header (Page header) -->
							<section class="content-header">
							<h3>
							<i class="fa fa-user" aria-hidden="true"></i> User Details Dashboard
							</h3>
							<div class="col-xs-12 text-right">
							<a class="btn btn-primary btn-sm" href="<?php echo base_url(); ?>admin/user/listing"><i class=""></i>Permenent Disconnect</a>
							<a class="btn btn-primary btn-sm" href="<?php echo base_url(); ?>admin/user/listing"><i class=""></i> Users Management List</a>
							</div>
							</section>
							<section class="content">
							<div class="row">
							<div class="col-lg-9 col-xs-19">
							<!-- small box -->
							<div class="small-box bg-green1 custom-small-box">
							<div class="inner tabspace">	
							<h4>User Profile Details<a href="#contact2"  class="btn btn-primary btn-xs pull-right">Basic Information</a><a href="#contact2"  class="btn btn-primary btn-xs pull-right tabspace">Show Password</a><a href="#contact2"  class="btn btn-primary btn-xs pull-right">Change Password</a></h4>
							<div class="block-content collapse in">
							<table class="table table-striped">                 
							<tbody>								 
							<tr>
							<td>User Name</td>
							<td id="text1"><?php echo @$datarows[0]['userfirstname']; ?></td>
							<td>
							<i class="fa fa-pencil-square" title="Edit" id="mod" style="font-size:22px;color:#3c8dbc;"></i>&nbsp;&nbsp;&nbsp;
							<i class="fa fa-save" title="Save" id="sav" style="font-size:22px;color:#3c8dbc;"></i>&nbsp;&nbsp;&nbsp;
							<i class="fa fa-times-circle-o" title="Close" id="close" style="font-size:27px;color:#3c8dbc;"></i>
							</td> 
							<script> 
							$(document).ready(function(){
							$('#mod').click(function(){
							$('#text1').html('<input id="no" size="'+$(this).text().length+'" type="text" value="'+ $('#text1').text() + '">');
							$('#mod').hide();
							$('#sav').show();
							$('#close').show();
							});
							$('#sav').click(function(){
							// here code to save data in database
							});
							$('#close').click(function(){
							$('#mod').show();
							$('#text1').html('<?php echo @$datarows[0]['userfirstname']; ?>');
							});   				
							});    				   
							</script> 								
							</tr>

							<tr>
							<td>CRF No.</td>
							<td></td>
							<td></td>
							</tr>

							<tr>
							<td>User A/c No.</td>
							<td><?php echo $datarows[0]['username']; ?></td>
							<td></td>
							</tr>

							<tr>
							<td>Status</td>
							<td data-title="Title"><button type="button" class="btn btn-danger btn-xs">
							<span class="glyphicon glyphicon-user"></span> In Active
							</button</td>
							<td></td>
							</tr>

							<tr>

							<td>Full Name</td>
							<td id="text6"><?php echo @$datarows[0]['userfirstname']; ?><?php echo @$datarows[0]['userlastname']; ?></td>
							<td>
							<i class="fa fa-pencil-square" id="mod6" style="font-size:22px;color:#3c8dbc;"></i>&nbsp;&nbsp;&nbsp;
							<i class="fa fa-save" id="sav6" style="font-size:22px;color:#3c8dbc;"></i>&nbsp;&nbsp;&nbsp;
							<i class="fa fa-times-circle-o" id="close6" style="font-size:27px;color:#3c8dbc;"></i>
							</td> 
							<script> 
							$(document).ready(function(){
							$('#mod6').click(function(){
							$('#text6').html('<input id="no" size="'+$(this).text().length+'" type="text" value="'+ $('#text6').text() + '">');
							$('#mod6').hide();
							$('#sav6').show();
							$('#close6').show();
							});
							$('#sav6').click(function(){
							// here code to save data in database
							});  
							$('#close6').click(function(){
							$('#mod6').show();
							$('#text6').html('<?php echo @$datarows[0]['userfirstname']; ?><?php echo @$datarows[0]['userlastname']; ?>');
							});   				
							});    
							</script> 							
							</tr>

							<tr>
							<td>Email</td>
							<td id="text2"><?php echo @$datarows[0]['useremail']; ?></td>
							<td>
							<i class="fa fa-pencil-square" id="mod1" style="font-size:22px;color:#3c8dbc;"></i>&nbsp;&nbsp;&nbsp;
							<i class="fa fa-save" id="sav1" style="font-size:22px;color:#3c8dbc;"></i>&nbsp;&nbsp;&nbsp;
							<i class="fa fa-times-circle-o" id="close1" style="font-size:27px;color:#3c8dbc;"></i>
							</td> 
							<script> 
							$(document).ready(function(){
							$('#mod1').click(function(){
							$('#text2').html('<input id="no" size="'+$(this).text().length+'" type="text" value="'+ $('#text2').text() + '">');
							$('#mod1').hide();
							$('#sav1').show();
							$('#close1').show();
							});
							$('#sav1').click(function(){
							// here code to save data in database
							});  
							$('#close1').click(function(){
							$('#mod1').show();
							$('#text2').html('<?php echo @$datarows[0]['useremail']; ?>');
							});   				
							});    
							</script> 								
							</tr>

							<tr>
							<td>Mobile No.</td>
							<td id="text3"><?php echo @$datarows[0]['usermobilephone']; ?></td>
							<td>
							<i class="fa fa-pencil-square" id="mod2" style="font-size:22px;color:#3c8dbc;"></i>&nbsp;&nbsp;&nbsp;
							<i class="fa fa-save" id="sav2" style="font-size:22px;color:#3c8dbc;"></i>&nbsp;&nbsp;&nbsp;
							<i class="fa fa-times-circle-o" id="close2" style="font-size:28px;color:#3c8dbc;"></i>
							</td> 
							<script> 
							$(document).ready(function(){
							$('#mod2').click(function(){
							$('#text3').html('<input id="no" size="'+$(this).text().length+'" type="text" value="'+ $('#text3').text() + '">');
							$('#mod2').hide();
							$('#sav2').show();
							$('#close2').show();
							});
							$('#sav2').click(function(){
							// here code to save data in database
							});  
							$('#close2').click(function(){
							$('#mod2').show();
							$('#text3').html('<?php echo @$datarows[0]['usermobilephone']; ?>');
							});   				
							});    
							</script> 								
							</tr>


							<tr>
							<td>Service Type</td>
							<td id="text4"><?php echo @$datarows[0]['userservicetype']; ?></td>
							<td>
							<i class="fa fa-pencil-square" id="mod3" style="font-size:22px;color:#3c8dbc;"></i>&nbsp;&nbsp;&nbsp;
							<i class="fa fa-save" id="sav3" style="font-size:22px;color:#3c8dbc;"></i>&nbsp;&nbsp;&nbsp;
							<i class="fa fa-times-circle-o" id="close3" style="font-size:27px;color:#3c8dbc;"></i>
							</td> 
							<script> 
							$(document).ready(function(){
							$('#mod3').click(function(){
							$('#text4').html('<input id="no" size="'+$(this).text().length+'" type="text" value="'+ $('#text4').text() + '">');
							$('#mod3').hide();
							$('#sav3').show();
							$('#close3').show();
							});
							$('#sav1').click(function(){
							// here code to save data in database
							});  
							$('#close3').click(function(){
							$('#mod3').show();
							$('#text4').html('<?php echo @$datarows[0]['userservicetype']; ?>');
							});   				
							});    
							</script> 	
							</tr>

							<tr>
							<td>Connection Type</td>
							<td id="text5"><?php echo @$datarows[0]['userconnection_type']; ?></td>
							<td>
							<i class="fa fa-pencil-square" id="mod4" style="font-size:22px;color:#3c8dbc;"></i>&nbsp;&nbsp;&nbsp;
							<i class="fa fa-save" id="sav4" style="font-size:22px;color:#3c8dbc;"></i>&nbsp;&nbsp;&nbsp;
							<i class="fa fa-times-circle-o" id="close4" style="font-size:27px;color:#3c8dbc;"></i>
							</td> 
							<script> 
							$(document).ready(function(){
							$('#mod4').click(function(){
							$('#text5').html('<input id="no" size="'+$(this).text().length+'" type="text" value="'+ $('#text5').text() + '">');
							$('#mod4').hide();
							$('#sav4').show();
							$('#close4').show();
							});
							$('#sav4').click(function(){
							// here code to save data in database
							});  
							$('#close4').click(function(){
							$('#mod4').show();
							$('#text5').html('<?php echo @$datarows[0]['userconnection_type']; ?>');
							});   				
							});    
							</script> 	
							</tr>

							<tr>
							<td>Plan Name</td>
							<td><?php echo getFieldByName(@$datarows[0]['userplan_id'], 'planName', 'billing_plans', 'planName'); ?></td>
							<td></td>
							</tr>

							<tr>
							<td>Running Plan Name</td>
							<td><?php echo getFieldByName(@$datarows[0]['userplan_id'], 'planName', 'billing_plans', 'planName'); ?></td>
							<td></td>
							</tr>

							<tr>
							<td>Balance FUP / Total FUP</td>
							<td></td>
							<td></td>
							</tr>

							</tbody>
							</table>
							</div>        
							</div>
							<div class="icon">
							<i class="ion ion-stats-bars"></i>
							</div>
							</div>
							</div><!-- ./col -->

							
							<div class="col-lg-3 col-xs-5">
							<!-- small box -->
							<div class="small-box bg-aqua1 custom-small-box">
							<div class="inner">
							<h4>User Photo<a href="#contact2" button type="button" class="btn btn-primary btn-xs pull-right">Upload Photo</a></h4>
							<img src="<?php echo base_url().$datarows[0]['image_upload_5']; ?>" width="230" height="200" />
							</div>           
							</div>
							</div><!-- ./col -->


							
							<div class="col-lg-3 col-xs-5">
							<!-- small box -->
							<div class="small-box bg-aqua1 custom-small-box">
							<div class="inner">
							<h4>FUP Meter<a href="#contact2" button type="button" class="btn btn-primary btn-xs pull-right">Add Booster</a></h4>
							<script src="https://code.highcharts.com/highcharts.js"></script>
							<script src="https://code.highcharts.com/highcharts-more.js"></script>
							<script src="https://code.highcharts.com/modules/solid-gauge.js"></script>
							<div id="container-speed" style="width: 230px; height: 200px;"></div>
							<script>
							var gaugeOptions = {

							chart: {
							type: 'solidgauge'
							},

							title: null,

							pane: {
							center: ['50%', '75%'],
							size: '120%',
							startAngle: -90,
							endAngle: 90,
							background: {
							backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || '#337ab7',
							innerRadius: '60%',
							outerRadius: '100%',
							shape: 'arc'
							}
							},

							tooltip: {
							enabled: false
							},

							// the value axis
							yAxis: {
							stops: [
							[0.1, '#55BF3B'], // green
							[0.5, '#DDDF0D'], // yellow
							[0.9, '#DF5353'] // red
							],
							lineWidth: 0,
							minorTickInterval: null,
							tickAmount: 2,
							title: {
							y: -70
							},
							labels: {
							y: 16
							}
							},

							plotOptions: {
							solidgauge: {
							dataLabels: {
							y: 5,
							borderWidth: 0,
							useHTML: true
							}
							}
							}
							};

							// The speed gauge
							var chartSpeed = Highcharts.chart('container-speed', Highcharts.merge(gaugeOptions, {
							yAxis: {
							min: 0,
							max: 500,
							title: {
							text: 'Fup Meter'
							}
							},

							credits: {
							enabled: false
							},

							series: [{
							name: 'Fup Meter',
							data: [250],
							dataLabels: {
							format: '<div style="text-align:center"><span style="font-size:25px;color:' +
							((Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black') + '">{y}</span><br/>' +
							'<span style="font-size:12px;color:silver">Data</span></div>'
							},
							tooltip: {
							valueSuffix: 'Data'
							}
							}]

							}));

							// The RPM gauge
							var chartRpm = Highcharts.chart('container-rpm', Highcharts.merge(gaugeOptions, {
							yAxis: {
							min: 0,
							max: 5,
							title: {
							text: 'RPM'
							}
							},

							series: [{
							name: 'RPM',
							data: [1],
							dataLabels: {
							format: '<div style="text-align:center"><span style="font-size:25px;color:' +
							((Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black') + '">{y:.1f}</span><br/>' +
							'<span style="font-size:12px;color:silver">* 1000 / min</span></div>'
							},
							tooltip: {
							valueSuffix: ' revolutions/min'
							}
							}]

							}));

							// Bring life to the dials
							setInterval(function () {
							// Speed
							var point,
							newVal,
							inc;

							if (chartSpeed) {
							point = chartSpeed.series[0].points[0];
							inc = Math.round((Math.random() - 0.5) * 100);
							newVal = point.y + inc;

							if (newVal < 0 || newVal > 200) {
							newVal = point.y - inc;
							}

							point.update(newVal);
							}

							// RPM
							if (chartRpm) {
							point = chartRpm.series[0].points[0];
							inc = Math.random() - 0.5;
							newVal = point.y + inc;

							if (newVal < 0 || newVal > 5) {
							newVal = point.y - inc;
							}

							point.update(newVal);
							}
							}, 2000);
							</script>
							<br>
							<td>Balance FUP / Total FUP-</td>
							<td>250GB/600GB</td>
							<td></td>
							</div>           
							</div>
							</div><!-- ./col -->

							<div class="col-lg-6 col-xs-12">
							<!-- small box -->
							<div class="small-box bg-yellow1 custom-small-box">
							<div class="inner">
							<h4>User billing Details<a href="#contact2" button type="button" class="btn btn-primary btn-xs pull-right">Package History</a><a href="#contact2" button type="button" class="btn btn-primary btn-xs pull-right tabspace">Renwal History</a><a href='#contact2' button type="button" class="btn btn-primary btn-xs pull-right">Change Plan</a></h4>
							<div class="block-content collapse in">
							<table class="table table-striped">
							<tbody>
							<tr>
							<td>Plan</td>
							<td><?php echo getFieldByName(@$datarows[0]['userplan_id'], 'planName', 'billing_plans', 'planName'); ?></td>
							<td>
							</td>
							</tr>

							<tr>
							<td>Sub Package</td>
							<td><?php echo getFieldByName(@$datarows[0]['userplan_id'], 'planName', 'billing_plans', 'planName'); ?></td>
							<td>
							</td>
							</tr>

							<tr>
							<td>Date Start</td>
							<td></td>
							<td></td>
							</tr>

							<tr>
							<td>Date End</td>
							<td></td>
							<td></td>
							</tr>

							</tbody>
							</table>
							</div>        
							</div>
							</div>
							</div><!-- ./col -->

							<div class="col-lg-6 col-xs-12">
							<!-- small box -->
							<div class="small-box bg-aqua1 custom-small-box">
							<div class="inner">
							<h4>User Payment Details<a href="#contact2" button type="button" class="btn btn-primary btn-xs pull-right">Balance & Credit</a><a href="#contact2" button type="button" class="btn btn-primary btn-xs pull-right tabspace">UnPaid Invoice</a><a href="#contact2" button type="button" class="btn btn-primary btn-xs pull-right">Paid Invoice</a></h4>
							<div class="block-content collapse in">
							<table class="table table-striped">
							<tbody>
							<tr>
							<td>Invoice No.</td>
							<td></td>
							<td>
							</td>
							</tr>

							<tr>
							<td>Renwal Date</td>
							<td></td>
							<td></td>
							</tr>

							<tr>
							<td>Invoice date</td>
							<td></td>
							<td></td>
							</tr>

							<tr>
							<td>Final Amount</td>
							<td><?php echo @$datarows[0]['cash']; ?></td>
							<td>
							</td>
							</tr>

							</tbody>
							</table>
							</div>        
							</div>
							</div>
							</div><!-- ./col -->


							<div class="col-lg-6 col-xs-12">
							<!-- small box -->
							<div class="small-box bg-aqua1 custom-small-box">
							<div class="inner">
							<h4> Network Details<a href="#contact2" button type="button" class="btn btn-primary btn-xs pull-right">MAC Management</a><a href="#contact2" button type="button" class="btn btn-primary btn-xs pull-right tabspace">Connection Properties</a><a href="#contact2" button type="button" class="btn btn-primary btn-xs pull-right tabspace">Auth Log</a></h4>
							<div class="block-content collapse in">
							<table class="table table-striped">
							<tbody>
							<tr>
							<td>MAC</td>
							<td id="text7"><?php echo @$datarows[0]['mac']; ?></td>
							<td>
							<i class="fa fa-pencil-square" id="mod7" style="font-size:22px;color:#3c8dbc;"></i>&nbsp;&nbsp;&nbsp;
							<i class="fa fa-save" id="sav7" style="font-size:22px;color:#3c8dbc;"></i>&nbsp;&nbsp;&nbsp;
							<i class="fa fa-times-circle-o" id="close7" style="font-size:27px;color:#3c8dbc;"></i>
							</td> 
							<script> 
							$(document).ready(function(){
							$('#mod7').click(function(){
							$('#text7').html('<input id="no" size="'+$(this).text().length+'" type="text" value="'+ $('#text7').text() + '">');
							$('#mod7').hide();
							$('#sav7').show();
							$('#close7').show();
							});
							$('#sav7').click(function(){
							// here code to save data in database
							});  
							$('#close7').click(function(){
							$('#mod7').show();
							$('#text7').html('<?php echo @$datarows[0]['mac']; ?>');
							});   				
							});    
							</script> 	
							</tr>

							<tr>
							<td>IP Address</td>
							<td id="text8"><?php echo @$datarows[0]['mac_bind']; ?></td>
							<td>
							<i class="fa fa-pencil-square" id="mod8" style="font-size:22px;color:#3c8dbc;"></i>&nbsp;&nbsp;&nbsp;
							<i class="fa fa-save" id="sav8" style="font-size:22px;color:#3c8dbc;"></i>&nbsp;&nbsp;&nbsp;
							<i class="fa fa-times-circle-o" id="close8" style="font-size:27px;color:#3c8dbc;"></i>
							</td> 
							<script> 
							$(document).ready(function(){
							$('#mod8').click(function(){
							$('#text8').html('<input id="no" size="'+$(this).text().length+'" type="text" value="'+ $('#text8').text() + '">');
							$('#mod8').hide();
							$('#sav8').show();
							$('#close8').show();
							});
							$('#sav8').click(function(){
							// here code to save data in database
							});  
							$('#close8').click(function(){
							$('#mod8').show();
							$('#text8').html('<?php echo @$datarows[0]['mac_bind']; ?>');
							});   				
							});    
							</script> 	

							</tr>

							<tr>
							<td>Static IP Bind</td>
							<td id="text9"><?php echo @$datarows[0]['static_ip']; ?></td>
							<td>
							<i class="fa fa-pencil-square" id="mod9" style="font-size:22px;color:#3c8dbc;"></i>&nbsp;&nbsp;&nbsp;
							<i class="fa fa-save" id="sav9" style="font-size:22px;color:#3c8dbc;"></i>&nbsp;&nbsp;&nbsp;
							<i class="fa fa-times-circle-o" id="close9" style="font-size:27px;color:#3c8dbc;"></i>
							</td> 
							<script> 
							$(document).ready(function(){
							$('#mod9').click(function(){
							$('#text9').html('<input id="no" size="'+$(this).text().length+'" type="text" value="'+ $('#text9').text() + '">');
							$('#mod9').hide();
							$('#sav9').show();
							$('#close9').show();
							});
							$('#sav9').click(function(){
							// here code to save data in database
							});  
							$('#close9').click(function(){
							$('#mod9').show();
							$('#text9').html('<?php echo @$datarows[0]['static_ip']; ?>');
							});   				
							});    
							</script> 	

							</tr>

							<tr>
							<td>Nas Port Bind</td>
							<td id="text10"><?php echo @$datarows[0]['nasport_bind']; ?></td>
							<td>
							<i class="fa fa-pencil-square" id="mod10" style="font-size:22px;color:#3c8dbc;"></i>&nbsp;&nbsp;&nbsp;
							<i class="fa fa-save" id="sav10" style="font-size:22px;color:#3c8dbc;"></i>&nbsp;&nbsp;&nbsp;
							<i class="fa fa-times-circle-o" id="close10" style="font-size:27px;color:#3c8dbc;"></i>
							</td> 
							<script> 
							$(document).ready(function(){
							$('#mod10').click(function(){
							$('#text10').html('<input id="no" size="'+$(this).text().length+'" type="text" value="'+ $('#text10').text() + '">');
							$('#mod10').hide();
							$('#sav10').show();
							$('#close10').show();
							});
							$('#sav10').click(function(){
							// here code to save data in database
							});  
							$('#close10').click(function(){
							$('#mod10').show();
							$('#text10').html('<?php echo @$datarows[0]['nasport_bind']; ?>');
							});   				
							});    
							</script> 	

							</tr>

							<tr>
							<td>Option 82 Bind</td>
							<td id="text11"><?php echo @$datarows[0]['option82_bind']; ?></td>
							<td>
							<i class="fa fa-pencil-square" id="mod11" style="font-size:22px;color:#3c8dbc;"></i>&nbsp;&nbsp;&nbsp;
							<i class="fa fa-save" id="sav11" style="font-size:22px;color:#3c8dbc;"></i>&nbsp;&nbsp;&nbsp;
							<i class="fa fa-times-circle-o" id="close11" style="font-size:27px;color:#3c8dbc;"></i>
							</td> 
							<script> 
							$(document).ready(function(){
							$('#mod11').click(function(){
							$('#text11').html('<input id="no" size="'+$(this).text().length+'" type="text" value="'+ $('#text11').text() + '">');
							$('#mod11').hide();
							$('#sav11').show();
							$('#close11').show();
							});
							$('#sav11').click(function(){
							// here code to save data in database
							});  
							$('#close11').click(function(){
							$('#mod11').show();
							$('#text11').html('<?php echo @$datarows[0]['userconnection_type']; ?>');
							});   				
							});    
							</script> 	

							</tr>

							</table>
							</div>        
							</div>
							</div>
							</div><!-- ./col -->

							<div class="col-lg-6 col-xs-2">
							<!-- small box -->
							<div class="small-box bg-aqua1 custom-small-box">
							<div class="inner">
							<h4>User Docoment Details</h4>
							<div class="block-content collapse in">
							<table class="table table-striped">
							<tbody>
							<tr>
							<td>Address Proof No.</td>
							<td id="text12"><?php echo @$datarows[0]['address_proof_type']; ?></td>
							<td>
							<i class="fa fa-pencil-square" id="mod12" style="font-size:22px;color:#3c8dbc;"></i>&nbsp;&nbsp;&nbsp;
							<i class="fa fa-save" id="sav12" style="font-size:22px;color:#3c8dbc;"></i>&nbsp;&nbsp;&nbsp;
							<i class="fa fa-times-circle-o" id="close12" style="font-size:27px;color:#3c8dbc;"></i>
							</td> 
							<script> 
							$(document).ready(function(){
							$('#mod12').click(function(){
							$('#text12').html('<input id="no" size="'+$(this).text().length+'" type="text" value="'+ $('#text12').text() + '">');
							$('#mod12').hide();
							$('#sav12').show();
							$('#close12').show();
							});
							$('#sav12').click(function(){
							// here code to save data in database
							});  
							$('#close12').click(function(){
							$('#mod12').show();
							$('#text12').html('<?php echo @$datarows[0]['address_proof_type']; ?>');
							});   				
							});    
							</script> 	
							</tr>

							<tr>
							<td>identy Proof No.</td>
							<td id="text13"><?php echo @$datarows[0]['id_proof_type']; ?></td>
							<td>
							<i class="fa fa-pencil-square" id="mod13" style="font-size:22px;color:#3c8dbc;"></i>&nbsp;&nbsp;&nbsp;
							<i class="fa fa-save" id="sav13" style="font-size:22px;color:#3c8dbc;"></i>&nbsp;&nbsp;&nbsp;
							<i class="fa fa-times-circle-o" id="close13" style="font-size:27px;color:#3c8dbc;"></i>
							</td> 
							<script> 
							$(document).ready(function(){
							$('#mod13').click(function(){
							$('#text13').html('<input id="no" size="'+$(this).text().length+'" type="text" value="'+ $('#text13').text() + '">');
							$('#mod13').hide();
							$('#sav13').show();
							$('#close13').show();
							});
							$('#sav13').click(function(){
							// here code to save data in database
							});  
							$('#close13').click(function(){
							$('#mod13').show();
							$('#text13').html('<?php echo @$datarows[0]['id_proof_type']; ?>');
							});   				
							});    
							</script> 	
							</tr>

							<tr>
							<td>Upload Customer Acquisition No.</td>
							<td id="text14"><?php echo @$datarows[0]['upload_customer_acquisition']; ?></td>
							<td>
							<i class="fa fa-pencil-square" id="mod14" style="font-size:22px;color:#3c8dbc;"></i>&nbsp;&nbsp;&nbsp;
							<i class="fa fa-save" id="sav14" style="font-size:22px;color:#3c8dbc;"></i>&nbsp;&nbsp;&nbsp;
							<i class="fa fa-times-circle-o" id="close14" style="font-size:27px;color:#3c8dbc;"></i>
							</td> 
							<script> 
							$(document).ready(function(){
							$('#mod14').click(function(){
							$('#text14').html('<input id="no" size="'+$(this).text().length+'" type="text" value="'+ $('#text14').text() + '">');
							$('#mod14').hide();
							$('#sav14').show();
							$('#close14').show();
							});
							$('#sav14').click(function(){
							// here code to save data in database
							});  
							$('#close14').click(function(){
							$('#mod14').show();
							$('#text14').html('<?php echo @$datarows[0]['upload_customer_acquisition']; ?>');
							});   				
							});    
							</script> 	
							</tr>

							<tr>
							<td>Upload Installation ReportNo.</td>
							<td id="text15"><?php echo @$datarows[0]['upload_installation_report']; ?></td>
							<td>
							<i class="fa fa-pencil-square" id="mod15" style="font-size:22px;color:#3c8dbc;"></i>&nbsp;&nbsp;&nbsp;
							<i class="fa fa-save" id="sav15" style="font-size:22px;color:#3c8dbc;"></i>&nbsp;&nbsp;&nbsp;
							<i class="fa fa-times-circle-o" id="close15" style="font-size:27px;color:#3c8dbc;"></i>
							</td> 
							<script> 
							$(document).ready(function(){
							$('#mod15').click(function(){
							$('#text15').html('<input id="no" size="'+$(this).text().length+'" type="text" value="'+ $('#text15').text() + '">');
							$('#mod15').hide();
							$('#sav15').show();
							$('#close15').show();
							});
							$('#sav15').click(function(){
							// here code to save data in database
							});  
							$('#close15').click(function(){
							$('#mod15').show();
							$('#text15').html('<?php echo @$datarows[0]['upload_installation_report']; ?>');
							// here code to save data in database
							});   				
							});    
							</script> 	
							</tr>

							</tbody>
							</table>
							</div>        
							</div>
							</div>
							</div><!-- ./col -->

							<div class="col-lg-6 col-xs-12">
							<!-- small box -->
							<div class="small-box bg-aqua1 custom-small-box">
							<div class="inner">
							<h4>User Address Details</h4>
							<div class="block-content collapse in">
							<table class="table table-striped">
							<tbody>
							<tr>
							<td>Country</td>
							<td></td>
							<td></td>												
							</tr>

							<tr>
							<td>State</td>
							<td></td>
							<td></td>
							</tr>

							<tr>
							<td>City</td>
							<td></td>
							<td></td>
							</tr>

							<tr>
							<td>Billing Address</td>
							<td id="text16"><?php echo @$datarows[0]['address']; ?></td>
							<td>
							<i class="fa fa-pencil-square" id="mod15" style="font-size:22px;color:#3c8dbc;"></i>&nbsp;&nbsp;&nbsp;
							<i class="fa fa-save" id="sav16" style="font-size:22px;color:#3c8dbc;"></i>&nbsp;&nbsp;&nbsp;
							<i class="fa fa-times-circle-o" id="close16" style="font-size:27px;color:#3c8dbc;"></i>
							</td> 
							<script> 
							$(document).ready(function(){
							$('#mod16').click(function(){
							$('#text16').html('<input id="no" size="'+$(this).text().length+'" type="text" value="'+ $('#text16').text() + '">');
							$('#mod16').hide();
							$('#sav16').show();
							$('#close16').show();
							});
							$('#sav16').click(function(){
							// here code to save data in database
							});  
							$('#close16').click(function(){
							$('#mod16').show();
							$('#text16').html('<?php echo @$datarows[0]['address']; ?>');
							// here code to save data in database
							});   				
							});    
							</script> 	
							</tr>

							<tr>
							<td>Installation Address</td>
							<td id="text17"><?php echo @$datarows[0]['address']; ?></td>
							<td>
							<i class="fa fa-pencil-square" id="mod17" style="font-size:22px;color:#3c8dbc;"></i>&nbsp;&nbsp;&nbsp;
							<i class="fa fa-save" id="sav17" style="font-size:22px;color:#3c8dbc;"></i>&nbsp;&nbsp;&nbsp;
							<i class="fa fa-times-circle-o" id="close17" style="font-size:27px;color:#3c8dbc;"></i>
							</td> 
							<script> 
							$(document).ready(function(){
							$('#mod17').click(function(){
							$('#text17').html('<input id="no" size="'+$(this).text().length+'" type="text" value="'+ $('#text17').text() + '">');
							$('#mod17').hide();
							$('#sav17').show();
							$('#close17').show();
							});
							$('#sav17').click(function(){
							// here code to save data in database
							});  
							$('#close17').click(function(){
							$('#mod17').show();
							$('#text17').html('<?php echo @$datarows[0]['userconnection_type']; ?>');
							// here code to save data in database
							});   				
							});    
							</script> 	
							</tr>

							</tbody>
							</table>
							</div>        
							</div>
							</div>
							</div><!-- ./col -->  

							<script>
							$(document).ready(function() {
							$(".btnusersave").change(function(){
							var userid=$(this).val();
							$.ajax({
							type:"POST",
							async:false,
							url: '<?php echo base_url(); ?>ajax/updateUserDetails',
							data: {id:userid},
							success: function(output){
							$('#state').empty();
							var arroutput = JSON.parse(output);
							//console.log(arroutput);
							var $select = $('#state');
							$('<option>').val('').text('Select State').appendTo($select);
							$.each(arroutput, function(key, value) {
							if(key){
							$('<option>').val(key).text(value).appendTo($select);
							}
							});
							}
							});

							});
							});
							</script>
							
							