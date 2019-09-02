<!-- Left side column. contains the logo and sidebar -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <!-- <li class="header">MAIN NAVIGATION</li> -->        
 <div id="accordian">
	   <ul>
	     <li>
			<h3><span class="fa fa-dashboard"><a href="<?php echo base_url(); ?>admin"></span>Dashboard</a></li></h3>
		</li>
		
	
		
	    <li class="active">
		<h3><span class="fa fa-user"></span>User General Infomation</h3>
		<ul>
        <li><a href="">Renew History</a></li>
        <li><a href="">Add Topup</a></li>
        <li><a href="">Change Password</a></li>
        <li><a href="">Comments</a></li>
        <li><a href="">wallet History</a></li>
        <li><a href="">Renew History</a></li>
        <li><a href="">Invoice</a></li>
		<li><a href="">Payment</a></li>
		<li><a href="">Renewal Schedules</a></li>
		<li><a href="">Data Balance</a></li>
		<li><a href="">Package History</a></li>
		<li><a href="">Complaints</a></li>
		<li><a href="">Session History</a></li>
		<li><a href="">Permanent Disconnect</a></li>
			</ul>
		</li>
	
	
	
    <li class="">
		<h3><span class="fa fa-pencil-square-o"></span>User Account Details</h3>
		<ul>
		<li><a href="#">Templete</a></li>
         <li><a href="#">Alert</a></li>
	    </ul>
		</li>
		
	<li class="">
			<h3><span class="fa fa-university"></span>User Billing details</h3>
			<ul>
		    <li><a href="#">Templete</a></li>
             <li><a href="#">Alert</a></li>
			</ul>
		</li>
	
	
	
	<li class="">
			<h3><span class="fa fa-money"></span>User payment Details</h3>
			<ul>
				<li><a href="#">Templete</a></li>
                <li><a href="#">Alert</a></li>
			</ul>
		</li>
		
	
	
	<li class="">
			<h3><span class="fa fa-wifi"></span>User Network Details</h3>
			<ul>
		     <li><a href="#">Templete</a></li>
             <li><a href="#">Alert</a></li>
			</ul>
		</li>
		
		
		<li class="">
			<h3><span class="fa fa-line-chart"></span>User FUP Details</h3>
			<ul>
		    <li><a href="#">Templete</a></li>
             <li><a href="#">Alert</a></li>
			</ul>
		</li>
	
	
	</ul>
</div>

<!-- prefix free to deal with vendor prefixes -->
<script src="http://thecodeplayer.com/uploads/js/prefixfree-1.0.7.js" type="text/javascript" type="text/javascript"></script>
<script src="http://thecodeplayer.com/uploads/js/jquery-1.7.1.min.js" type="text/javascript"></script>
<style>
* {margin: 0; padding: 0;}

body {
	
	font-family: Nunito, arial, verdana;
}
#accordian {
	background:#222d32;
	width: 210px;
	margin: 2px auto 0 auto;
	color: white;
	/*Some cool shadow and glow effect*/
	box-shadow: 
		0 5px 15px 1px rgba(0, 0, 0, 0.6), 
		0 0 200px 1px rgba(255, 255, 255, 0.5);
}
/*heading styles*/
#accordian h3 {
	font-size: 12px;
	line-height: 34px;
	padding: 0 10px;
	cursor: pointer;
	/*fallback for browsers not supporting gradients*/
	background: #003040; 
	background: linear-gradient(#222d32, #222d32);  
}
/*heading hover effect*/
#accordian h3:hover {
	text-shadow: 0 0 1px rgba(255, 255, 255, 0.7);
}
/*iconfont styles*/
#accordian h3 span {
	font-size: 16px;
	margin-right: 10px;
}
/*list items*/
#accordian li {
	list-style-type: none;
}
/*links*/
#accordian ul ul li a {
	color: white;
	text-decoration: none;
	font-size: 11px;
	line-height: 27px;
	display: block;
	padding: 0 15px;
	/*transition for smooth hover animation*/
	transition: all 0.15s;
}
/*hover effect on links*/
#accordian  ul ul li a:hover {
	background: #003545;
	border-left: 5px solid lightgreen;
}
/*Lets hide the non active LIs by default*/
#accordian ul ul {
	display: none;
}
#accordian li.active ul {
	display: block;
}
</style>
<script>
$(document).ready(function(){
	$("#accordian h3").click(function(){
		//slide up all the link lists
		$("#accordian ul ul").slideUp();
		//slide down the link list below the h3 clicked - only if its closed
		if(!$(this).next().is(":visible"))
		{
			$(this).next().slideDown();
		}
	})
})
</script>
 </section>
  <!-- /.sidebar -->
</aside>


