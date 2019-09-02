<?php $urlCont = $this->router->fetch_class();
$url = $this->router->fetch_class()."/".$this->router->fetch_method();
//$userType=getCurUserType();
?>
<style>
.skin-blue .main-header .logo {
    background-color: #222d32;
    color: #fff;
    border-bottom: 0 solid transparent;
}
.skin-blue .main-header .navbar {
    background-color:#222d32;
}
</style>  
      <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo base_url().'admin'; ?>" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>I</b>MS</span>
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

                //echo ' uid: '.$uid.' == ';pr($uDetails);die;

                $username = isset($uDetails['full_name'])?$uDetails['full_name']:$uDetails['username'];

                echo $username; ?>
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
    
   