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
	label, input { display:block; }
	input.text { margin-bottom:25px; width:95%; padding: .4em; }
	fieldset { padding:0; border:0; margin-top:25px; }
	h1 { font-size: 1.2em; margin: .6em 0; }
	div#users-contain { width: 350px; margin: 20px 0; }
	div#users-contain table { margin: 1em 0; border-collapse: collapse; width: 100%; }
	div#users-contain table td, div#users-contain table th { border: 1px solid #eee; padding: .6em 10px; text-align: left; }
	.ui-dialog .ui-state-error { padding: .3em; }
	.validateTips { border: 1px solid transparent; padding: 0.3em; }
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
		<h4>User Profile Details<a href="#contact2"  class="btn btn-primary btn-xs pull-right">Basic Information</a><a href="#contact2"  class="btn btn-primary btn-xs pull-right tabspace">Show Password</a><a href="#contact2" id="opener" class="btn btn-primary btn-xs pull-right">Change Password</a></h4>
		<div class="block-content collapse in">
		<table class="table table-striped">                 
		<tbody>	

			<tr>
			<td>User Name</td>
			<td id="text6"><?php echo @$datarows[0]['userfirstname']; ?>&nbsp;<?php echo @$datarows[0]['userlastname']; ?></td>
			<td></td>
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
			 <td>First Name</td>
			 <td class="lblarea"><?php echo @$datarows[0]['userfirstname']; ?></td>
			<td class="txtarea" style='display:none;'>
				<input class='fieldvalue'  type='textbox' value='<?php echo @$datarows[0]['userfirstname']; ?>' />
			</td>
			<td>
				<a class="btnEdit"><i class="fa fa-pencil-square" title="Edit"  style="font-size:22px;color:#3c8dbc;"></i>&nbsp;&nbsp;&nbsp;</a>
				<a class="btnSave" rel="<?php echo @$datarows[0]['userid']; ?>" rev="userfirstname"><i class="fa fa-save" title="Save" style="font-size:25px;color:#3c8dbc;"></i>&nbsp;&nbsp;&nbsp;</a>
				<a class="btnClose"><i class="fa fa-times-circle-o" title="Close" style="font-size:30px;color:red;"></i></a>
			</td>
		 </tr>


			<tr>
				<td>Last Name</td>
				<td class="lblarea"><?php echo @$datarows[0]['userlastname']; ?></td>
			<td class="txtarea" style='display:none;'>
				<input class='fieldvalue' type='textbox' value='<?php echo @$datarows[0]['userlastname']; ?>' />
			</td>
				<td>
					<a class="btnEdit"><i class="fa fa-pencil-square" title="Edit"  style="font-size:22px;color:#3c8dbc;"></i>&nbsp;&nbsp;&nbsp;</a>
					<a class="btnSave" rel="<?php echo @$datarows[0]['userid']; ?>" rev="userlastname"><i class="fa fa-save" title="Save" style="font-size:22px;color:#3c8dbc;"></i>&nbsp;&nbsp;&nbsp;</a>
					<a class="btnClose"><i class="fa fa-times-circle-o" title="Close" style="font-size:27px;color:#3c8dbc;"></i></a>
				</td>
				</tr>

				<tr>
				<td>Email</td>
				<td class="lblarea"><?php echo @$datarows[0]['useremail']; ?></td>
				<td class="txtarea" style='display:none;'>
					<input class='fieldvalue' type='textbox' value='<?php echo @$datarows[0]['useremail']; ?>' />
				</td>
				<td>
					<a class="btnEdit"><i class="fa fa-pencil-square" title="Edit"  style="font-size:22px;color:#3c8dbc;"></i>&nbsp;&nbsp;&nbsp;</a>
					<a class="btnSave" rel="<?php echo @$datarows[0]['userid']; ?>" rev="useremail"><i class="fa fa-save" title="Save" style="font-size:22px;color:#3c8dbc;"></i>&nbsp;&nbsp;&nbsp;</a>
					<a class="btnClose"><i class="fa fa-times-circle-o" title="Close" style="font-size:27px;color:#3c8dbc;"></i></a>
				</td>				
				</tr>

			<tr>
			<td>Mobile No.</td>
			<td class="lblarea"><?php echo @$datarows[0]['usermobilephone']; ?></td>
			<td class="txtarea" style='display:none;'>
				<input class='fieldvalue' type='textbox' value='<?php echo @$datarows[0]['usermobilephone']; ?>' />
			</td>
			<td>
				<a class="btnEdit"><i class="fa fa-pencil-square" title="Edit"  style="font-size:22px;color:#3c8dbc;"></i>&nbsp;&nbsp;&nbsp;</a>
				<a class="btnSave" rel="<?php echo @$datarows[0]['userid']; ?>" rev="usermobilephone"><i class="fa fa-save" title="Save" style="font-size:22px;color:#3c8dbc;"></i>&nbsp;&nbsp;&nbsp;</a>
				<a class="btnClose"><i class="fa fa-times-circle-o" title="Close" style="font-size:27px;color:#3c8dbc;"></i></a>
			</td>													
			</tr>


		<tr>
		<td>Service Type</td>
		<td class="lblarea"><?php echo @$datarows[0]['userservicetype']; ?></td>
			<td class="txtarea" style='display:none;'>
				 <select class='fieldvalue' class="form-control" type='textbox' value='<?php echo @$datarows[0]['usermobilephone']; ?>' >
						<option value="">Select a Type</option>
						<option value="EOC PostPaid">EOC PostPaid</option>
						<option value="EOC PrePaid">Eoc PrePaid</option>
						<option value="Fiber PostPaid">Fiber PostPaid</option>
						<option value="Fiber PrePaid">Fiber PrePaid</option>
						<option value="ILL's PostPaid">ILL's PostPaid</option>
						<option value="ILL's PrePaid">ILL's PrePaid</option>
						<option value="Initia's PostPaid">Initia's PostPaid</option>
						<option value="Initia's PrePaid">Initia's PrePaid</option>
						<option value="other">Other</option>
					  </select>
			</td>
			<td>
				<a class="btnEdit"><i class="fa fa-pencil-square" title="Edit"  style="font-size:22px;color:#3c8dbc;"></i>&nbsp;&nbsp;&nbsp;</a>
				<a class="btnSave" rel="<?php echo @$datarows[0]['userid']; ?>" rev="userservicetype"><i class="fa fa-save" title="Save" style="font-size:22px;color:#3c8dbc;"></i>&nbsp;&nbsp;&nbsp;</a>
				<a class="btnClose"><i class="fa fa-times-circle-o" title="Close" style="font-size:27px;color:#3c8dbc;"></i></a>
			</td>							
		</tr>

		<tr>
		<td>Connection Type</td>
		<td id="text5"><?php echo @$datarows[0]['userconnection_type']; ?></td>
		<td></td> 
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
		<script src="<?php echo base_url(); ?>assets/admin/js/highcharts.js"></script>
		<script src="<?php echo base_url(); ?>assets/admin/js/highcharts-more.js"></script>
		<script src="<?php echo base_url(); ?>assets/admin/js/solid-gauge.js"></script>
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
		<td class="lblarea"><?php echo @$datarows[0]['mac']; ?></td>
		<td class="txtarea" style='display:none;'>
			<input class='fieldvalue' type='textbox' value='<?php echo @$datarows[0]['mac']; ?>' />
		</td>
		<td>
			<a class="btnEdit"><i class="fa fa-pencil-square" title="Edit"  style="font-size:22px;color:#3c8dbc;"></i>&nbsp;&nbsp;&nbsp;</a>
			<a class="btnSave" rel="<?php echo @$datarows[0]['userid']; ?>" rev="mac"><i class="fa fa-save" title="Save" style="font-size:22px;color:#3c8dbc;"></i>&nbsp;&nbsp;&nbsp;</a>
			<a class="btnClose"><i class="fa fa-times-circle-o" title="Close" style="font-size:27px;color:#3c8dbc;"></i></a>
		</td>	
		</tr>

		<tr>
		<td>IP Address</td>
		<td class="lblarea"><?php echo @$datarows[0]['static_ip']; ?></td>
		<td class="txtarea" style='display:none;'>
			<input class='fieldvalue' type='textbox' value='<?php echo @$datarows[0]['static_ip']; ?>' />
		</td>
		<td>
			<a class="btnEdit"><i class="fa fa-pencil-square" title="Edit"  style="font-size:22px;color:#3c8dbc;"></i>&nbsp;&nbsp;&nbsp;</a>
			<a class="btnSave" rel="<?php echo @$datarows[0]['userid']; ?>" rev="static_ip"><i class="fa fa-save" title="Save" style="font-size:22px;color:#3c8dbc;"></i>&nbsp;&nbsp;&nbsp;</a>
			<a class="btnClose"><i class="fa fa-times-circle-o" title="Close" style="font-size:27px;color:#3c8dbc;"></i></a>
		</td>	
		</tr>

		<tr>
		<td>Static IP Bind</td>
		<td class="lblarea"><?php echo @$datarows[0]['static_ip']; ?></td>
		<td class="txtarea" style='display:none;'>
			<input class='fieldvalue' type='textbox' value='<?php echo @$datarows[0]['static_ip']; ?>' />
		</td>
		<td>
			<a class="btnEdit"><i class="fa fa-pencil-square" title="Edit"  style="font-size:22px;color:#3c8dbc;"></i>&nbsp;&nbsp;&nbsp;</a>
			<a class="btnSave" rel="<?php echo @$datarows[0]['userid']; ?>" rev="static_ip"><i class="fa fa-save" title="Save" style="font-size:22px;color:#3c8dbc;"></i>&nbsp;&nbsp;&nbsp;</a>
			<a class="btnClose"><i class="fa fa-times-circle-o" title="Close" style="font-size:27px;color:#3c8dbc;"></i></a>
		</td>	
		</tr>

		<tr>
		<td>Nas Port Bind</td>
		<td class="lblarea"><?php echo @$datarows[0]['nasport_bind']; ?></td>
		<td class="txtarea" style='display:none;'>
			<input class='fieldvalue' type='textbox' value='<?php echo @$datarows[0]['nasport_bind']; ?>' />
		</td>
		<td>
			<a class="btnEdit"><i class="fa fa-pencil-square" title="Edit"  style="font-size:22px;color:#3c8dbc;"></i>&nbsp;&nbsp;&nbsp;</a>
			<a class="btnSave" rel="<?php echo @$datarows[0]['userid']; ?>" rev="nasport_bind"><i class="fa fa-save" title="Save" style="font-size:22px;color:#3c8dbc;"></i>&nbsp;&nbsp;&nbsp;</a>
			<a class="btnClose"><i class="fa fa-times-circle-o" title="Close" style="font-size:27px;color:#3c8dbc;"></i></a>
		</td>	
		</tr>

		<tr>
		<td>Option 82 Bind</td>
		<td class="lblarea"><?php echo @$datarows[0]['option82_bind']; ?></td>
		<td class="txtarea" style='display:none;'>
			<input class='fieldvalue' type='textbox' value='<?php echo @$datarows[0]['option82_bind']; ?>' />
		</td>
		<td>
			<a class="btnEdit"><i class="fa fa-pencil-square" title="Edit"  style="font-size:22px;color:#3c8dbc;"></i>&nbsp;&nbsp;&nbsp;</a>
			<a class="btnSave" rel="<?php echo @$datarows[0]['userid']; ?>" rev="option82_bind"><i class="fa fa-save" title="Save" style="font-size:22px;color:#3c8dbc;"></i>&nbsp;&nbsp;&nbsp;</a>
			<a class="btnClose"><i class="fa fa-times-circle-o" title="Close" style="font-size:27px;color:#3c8dbc;"></i></a>
		</td>	
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
			<td></td> 
			</tr>

			<tr>
			<td>identy Proof No.</td>
			<td id="text13"><?php echo @$datarows[0]['id_proof_type']; ?></td>
			<td></td> 
			</tr>

			<tr>
			<td>Upload Customer Acquisition No.</td>
			<td id="text14"><?php echo @$datarows[0]['upload_customer_acquisition']; ?></td>
			<td></td> 
			</tr>

			<tr>
			<td>Upload Installation ReportNo.</td>
			<td id="text15"><?php echo @$datarows[0]['upload_installation_report']; ?></td>
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
			<td class="lblarea"><?php echo @$datarows[0]['address']; ?></td>
			<td class="txtarea" style='display:none;'>
				<input class='fieldvalue' type='textbox' value='<?php echo @$datarows[0]['useraddress']; ?>' />
			</td>
			<td>
				<a class="btnEdit"><i class="fa fa-pencil-square" title="Edit"  style="font-size:22px;color:#3c8dbc;"></i>&nbsp;&nbsp;&nbsp;</a>
				<a class="btnSave" rel="<?php echo @$datarows[0]['userid']; ?>" rev="address"><i class="fa fa-save" title="Save" style="font-size:22px;color:#3c8dbc;"></i>&nbsp;&nbsp;&nbsp;</a>
				<a class="btnClose"><i class="fa fa-times-circle-o" title="Close" style="font-size:27px;color:#3c8dbc;"></i></a>
			</td>	
			</tr>

			<tr>
			<td>Installation Address</td>
			<td class="lblarea"><?php echo @$datarows[0]['address']; ?></td>
			<td class="txtarea" style='display:none;'>
				<input class='fieldvalue' type='textbox' value='<?php echo @$datarows[0]['address']; ?>' />
			</td>
			<td>
				<a class="btnEdit"><i class="fa fa-pencil-square" title="Edit"  style="font-size:22px;color:#3c8dbc;"></i>&nbsp;&nbsp;&nbsp;</a>
				<a class="btnSave" rel="<?php echo @$datarows[0]['userid']; ?>" rev="address"><i class="fa fa-save" title="Save" style="font-size:22px;color:#3c8dbc;"></i>&nbsp;&nbsp;&nbsp;</a>
				<a class="btnClose"><i class="fa fa-times-circle-o" title="Close" style="font-size:27px;color:#3c8dbc;"></i></a>
			</td>	
			</tr>

			</tbody>
			</table>
			</div>        
			</div>
			</div>
			</div><!-- ./col -->  


<!-- ./UserDetails Edit and Update Close -->						
		<script>
		$(document).ready(function(){
			$('.btnSave').hide();
			$('.btnClose').hide();
		$('.btnEdit').on('click', function(e){
			$(this).closest('tr').find('.lblarea').hide();
			$(this).closest('tr').find('.txtarea').show();
			$(this).hide();
			$(this).closest('tr').find('.btnSave').show();
			$(this).closest('tr').find('.btnClose').show();
		});	

		$('.btnSave').on('click', function(e){
		// here code to save data in database
			var userid=$(this).attr('rel');
			var fieldname=$(this).attr('rev');
			var fvalue = $(this).closest('tr').find('.fieldvalue').val();
		//alert(userid + fieldname + fvalue);
		$.ajax({
		type:"POST",
		url: '<?php echo base_url(); ?>ajax/updateUserDetails',
		data: {id:userid,fieldname:fieldname, fieldValue:fvalue},
		success: function(res){
			$(this).show();
			$(this).closest('tr').find('.btnSave').hide();
			$(this).closest('tr').find('.btnClose').hide();
		}
		});
		});


		$('.btnClose').on('click', function(e){
		$('.btnEdit').show();
			$(this).closest('tr').find('.btnSave').hide();
			$(this).closest('tr').find('.btnClose').hide();

		});   				
		});
		</script>


<!-- ./Form anamination through -->					
<!-- ./Change  password -->							






