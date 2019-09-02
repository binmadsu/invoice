<!-- Left side column. contains the logo and sidebar -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<aside class="main-sidebar">
   <section class="sidebar">
    <ul class="sidebar-menu">
      <!-- <li class="header">MAIN NAVIGATION</li> -->        
 <div id="accordian">
	   <ul>
	     <li>
			<h3><span class="fa fa-dashboard"><a href="<?php echo base_url(); ?>admin"></span>Dashboard</a></li></h3>
		</li>
		
		<?php if(getAdminUserRole() == '1' || getAdminUserRole() == '2'){?>	
		
	    <li class="">
		<h3><span class="fa fa-users"></span>Administrator</h3>
		<ul>
        <!-- <li><a href="<?php //echo base_url(); ?>admin/permission">Role Permissions</a></li> -->
        <!-- <li><a href="<?php// echo base_url(); ?>admin/role">Create New Role</a></li> -->
        <!-- <li><a href="<?php //echo base_url(); ?>admin/role/listing">List Role</a></li> -->
        <li><a href="<?php echo base_url(); ?>admin/adminuser">Create New Admin</a></li>
        <li><a href="<?php echo base_url(); ?>admin/adminuser/listing">List Admin</a></li>
		</ul>
		</li>
	
	<?php }?> 
	<?php if(getAdminUserRole() != '') {?>
	
	    <li class="">
			<h3><span class="fa fa-building"></span>Diesel</h3>
			<ul>
				<li><a href="<?php echo base_url(); ?>admin/company/listing">Diesel</a></li>
			</ul>
		</li>
		
		
		<!-- <li class="">
			<h3><span class="fa fa-home"></span>Ware House</h3>
			<ul>
				<li><a href="<?php echo base_url(); ?>admin/warehouse/listing">Ware House</a></li>
			</ul>
		</li>
		
		
		<li class="">
			<h3><span class= "fa fa-archive"></span>Item</h3>
			<ul>
				<li><a href="<?php echo base_url(); ?>admin/item/listing">Item</a></li>
			</ul>
		</li>
		
		<li class="">
			<h3><span class="fa fa-male"></span>Supplier</h3>
			<ul>
				<li><a href="<?php echo base_url(); ?>admin/supplier/listing">Supplier</a></li>
			</ul>
		</li>
		
		
		<li class="">
			<h3><span class="fa fa-briefcase"></span>Purchase Order</h3>
			<ul>
				<li><a href="<?php echo base_url(); ?>admin/purchase">Purchase Order</a></li>
				<li><a href="<?php echo base_url(); ?>admin/purchase/listing">Purchase Book</a></li>
			</ul>
		</li>
		
		
		<li class="">
			<h3><span class="fa fa-truck"></span>Transfer Order</h3>
			<ul>
				<li><a href="<?php echo base_url(); ?>admin/transferorder/listing">Transfer Order List</a></li>
				<li><a href="<?php echo base_url(); ?>admin/transferorder">Transfer Order</a></li>
			</ul>
		</li>
		 
		
		
		<li class="">
			<h3><span class="fa fa-cube"></span>Received/Return</h3>
			<ul>
				<li><a href="<?php echo base_url(); ?>admin/recivedstock/listing">Received Item</a></li>
				<li><a href="<?php echo base_url(); ?>admin/returnitem">Return</a></li>
			</ul>
		</li>
		
		
		
		<li class="">
			<h3><span class="fa fa-institution"></span>Stock</h3>
			<ul>
				<li><a href="<?php echo base_url(); ?>admin/stock/listing">Stock</a></li>
			</ul>
		</li>
		
		
		<li class="">
			<h3><span class="fa fa-external-link"></span>Sales</h3>
			<ul>
				<li><a href="<?php echo base_url(); ?>admin/sales/listing">Sales</a></li>
			</ul>
		</li>
		
		<li class="">
			<h3><span class="fa fa-cubes"></span>Report</h3>
			<ul>
				<li><a href="<?php echo base_url(); ?>admin/report/listing">Report</a></li>
			</ul>
		</li>-->
		
	<?php }?>
	<?php if(getAdminUserRole() != '') {?>
	
	    <!-- <li class="">
			<h3><span class="fa fa-cog fa-fw"></span>Setting</h3>
			<ul>
		    <li><a href="#">Templete</a></li>
             <li><a href="#">Alert</a></li>
			</ul>
		</li> -->
		
	<?php }?>
	
	</ul>
</div>

<!-- prefix free to deal with vendor prefixes -->
<script src="http://thecodeplayer.com/uploads/js/prefixfree-1.0.7.js" type="text/javascript"></script>
<script src="http://thecodeplayer.com/uploads/js/jquery-1.7.1.min.js" type="text/javascript"></script>
<style>
* {margin: 0; padding: 0;}

body {
	
	font-family: Nunito, arial, verdana;
}
#accordian {
	background:#222d32;
	width: 217px;
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


