<?php 
$urlCont = $this->router->fetch_class();
$url = $this->router->fetch_class()."/".$this->router->fetch_method();
//$userType=getCurUserType();
?>
 <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
 <style>
.skin-blue .main-header .logo {
    background-color: #222d32;
    color: #fff;
    border-bottom: 0 solid transparent;
}
.skin-blue .main-header .navbar {
    background-color:#222d32;
}

 .table-striped > tbody > tr:nth-child(2n+1) > td, .table-striped > tbody > tr:nth-child(2n+1) > th {
    background-color: #ddd;
}
.small-box h4 {
    font-size: 18px;
	font-weight: bold;
    color: black;
}

.small-box h5 {
    font-size: 15px;
	font-weight: bold;
    color: #333333db;
}

.small-box:hover {
    text-decoration: none;
   
}
.small-box h2 {
    font-size: 28px;
	color: white;
    font-weight: bold;
    margin: 0 0 10px 0;
    white-space: nowrap;
    padding: 0;
}
</style>   
 
      <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo base_url().'admin'; ?>" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>M</b>CC</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Maa Choti Chandika</b></span>
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
                $alldata = getAllAdmin();
                //echo "<pre>"; print_r($alldata);
                //echo ' uid: '.$uid.' == ';pr($alldata);die;
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
      <h1>
        <i class="fa fa-tachometer" aria-hidden="true"></i> MCC Dashboard
      </h1>
    </section>

    <!-- Inventory Dashboard-CRM -->
<?php if(getAdminUserRole() != '') {?>
 <section class="content">
        <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3>150</h3>
                  <p>Total No. of Costomer</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
			
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>53<sup style="font-size: 20px">%</sup></h3>
                  <p>Total Item</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
			
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>100</h3>
                  <p>Item To Be Recived</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
			
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
			  <div class="small-box bg-green">
                <div class="inner">
                  <h3>55</h3>
                  <p>Total Item</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
          </div>		  
<?php }?>
	
    <?php if(getAdminUserRole() == '1' || getAdminUserRole() == '2') {?>
    <section class="content">
        <div class="row">
			
			<div class="col-lg-4 col-xs-8">
			<!-- small box -->
			<div class="small-box  bg-black custom-small-box">
			<div class="inner">
			<center><h2>Login User Details 
			</h2></center>
			<div class="block-content collapse in">
			<table class="table table-striped">
			<tbody>

			<tr>
			<td><h4>Name-<h4></td>
			<td><h5><?php $uid = getCurUserID();
                $uDetails = getAdminUserDetailsById($uid);
                $alldata = getAllAdmin();
                $username = isset($uDetails['full_name'])?$uDetails['full_name']:$uDetails['username'];
                echo $username;?><h5></td>
			</tr>

			<tr>
			<td><h4>Email-<h4></td>
			<td><h5><?php $uid = getCurUserID();
                $uDetails = getAdminUserDetailsById($uid);
                $alldata = getAllAdmin();
                $username = isset($uDetails['email'])?$uDetails['email']:$uDetails['username'];
                echo $username;?><h5></td>
			</tr>
			
			<tr>
			<td><h4>Mobile No.-<h4></td>
			<td><h5><?php $uid = getCurUserID();
                $uDetails = getAdminUserDetailsById($uid);
                $alldata = getAllAdmin();
                $username = isset($uDetails['mobile_no'])?$uDetails['mobile_no']:$uDetails['username'];
                echo $username;?><h5></td>
			</tr>
			
			<tr>
			<td><h4>Status-<h4></td>
			<td><h5><?php $uid = getCurUserID();
                $uDetails = getAdminUserDetailsById($uid);
                $alldata = getAllAdmin();
                $username = isset($uDetails['is_active'])?$uDetails['is_active']:$uDetails['username'];
                ?><?php if($uDetails['is_active'] =='1' ){?>
						<a class="btn btn-success btn-xs" <?php echo base_url(); ?><?php echo $uDetails['is_active'];?>><i class="fa fa-user"> Active</i></a>
						<?php }else {?>
						<a class="btn btn-danger btn-xs" <?php echo base_url(); ?><?php echo $uDetails['is_active'];?>><i class="fa fa-user"> Inactive</i></a>
			<?php }?><h5></td>
				
				
			</tr>
            
			<!-- <tr>
			<td><h4>Depeartment-<h4></td>
			<td><h5><?php //$uid = getCurUserID();
                //$uDetails = getAdminUserDetailsById($uid);
                //$alldata = getAllAdmin();
                //$username = isset($uDetails['depeartment'])?$uDetails['depeartment']:$uDetails['username'];
                //echo $username;?><h5></td>
			</tr>
			
			<tr>
			<td><h4>Company-<h4></td>
			<td><h5><?php //$uid = getCurUserID();
                //$uDetails = getAdminUserDetailsById($uid);
                //$alldata = getAllAdmin();
                //$username = isset($uDetails['company'])?$uDetails['company']:$uDetails['username'];
                //echo $username;?><h5></td>
			</tr> -->
			
			
			</tbody>
			</table>
			</div>        
			</div>
			</div>
			</div><!-- ./col -->				
			
          </div>
<?php
$allstock = getAllstock();
$dataPoints = array();
//echo "<pre>"; print_r($allstock);
foreach($allstock as $data){
    $total = $data['quantity'] + $data['out_stock_qty'] + $data['faulty'];
    $dataPoints[] = array(
                      "label"=>  getFieldByName(@$data['warehouse_id'], 'name', 'tbl_warehouse', 'name'),
                      "y" => number_format(($data['out_stock_qty']/$total)*100,2)
                    );
}
?>
<!DOCTYPE HTML>
<html>
<head>
<div id="chartContainer" style="height: 370px; width: 100%;">
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<?php }?>


</head>
<body>


                     