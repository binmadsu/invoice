<!DOCTYPE html>

<html lang="en">

<head>

  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <meta name="description" content="">

  <meta name="author" content="">

  <link rel="shortcut icon" href="http://localhost/nextraInventory/images/favicon.png" type="image/png">

  <title>Nextra Inventory</title>

  <link href="http://localhost/nextraInventory/assets/admin/css/style.default.css" rel="stylesheet">

  <link href="http://localhost/nextraInventory/assets/admin/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
    <!-- FontAwesome 4.3.0 -->
    <link href="http://localhost/nextraInventory/assets/admin/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="http://localhost/nextraInventory/assets/admin/onicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="http://localhost/nextraInventory/assets/admin/dist/css/AdminLTE.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="http://localhost/nextraInventory/assets/admin/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />


  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

  <!--[if lt IE 9]>

  <script src="http://localhost/nextraInventory/assets/admin/js/html5shiv.js"></script>

  <script src="http://localhost/nextraInventory/assets/admin/js/respond.min.js"></script>

  <![endif]-->

  <script>

    var baseUrl = 'http://localhost/nextraInventory/';

  </script>

</head>

<body class="skin-blue sidebar-mini">
<div class="wrapper"><style>
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
        <a href="http://localhost/nextraInventory/admin" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>I</b>MS</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Nextra-Inventory</b></span>
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
                  <li class="header"> Last Login : <i class="fa fa-clock-o"></i> </li>
                </ul>
              </li>
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                   <img src="images/photos/loggeduser.png" alt="" />
                Nextra Super Admin                 </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="" class="btn btn-default btn-flat"><i class="fa fa-key"></i> Change Password</a>
                    </div>
                    <div class="pull-right">
                      <a href="http://localhost/nextraInventory/admin/logout" class="btn btn-default btn-flat"><i class="fa fa-sign-out"></i> Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
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
			<h3><span class="fa fa-dashboard"><a href="http://localhost/nextraInventory/admin"></span>Dashboard</a></li></h3>
		</li>
		
			
		
	    <li class="">
		<h3><span class="fa fa-users"></span>Administrator</h3>
		<ul>
        <li><a href="http://localhost/nextraInventory/admin/permission">Role Permissions</a></li>
        <li><a href="http://localhost/nextraInventory/admin/role">Create New Role</a></li>
        <li><a href="http://localhost/nextraInventory/admin/role/listing">List Role</a></li>
        <li><a href="http://localhost/nextraInventory/admin/adminuser">Create New Admin</a></li>
        <li><a href="http://localhost/nextraInventory/admin/adminuser/listing">List Admin</a></li>
			</ul>
		</li>
	
	 
		
	<li class="">
			<h3><span class="fa fa-bank"></span>Inventory</h3>
			<ul>
				<li><a href="http://localhost/nextraInventory/admin/company/listing">Company</a></li>
				<li><a href="http://localhost/nextraInventory/admin/warehouse/listing">Ware House</a></li>
				<li><a href="http://localhost/nextraInventory/admin/item/listing">Item</a></li>
				<li><a href="http://localhost/nextraInventory/admin/supplier/listing">Supplier</a></li>
				<li><a href="http://localhost/nextraInventory/admin/purchase">Purchase Order</a></li>
				<li><a href="http://localhost/nextraInventory/admin/recivedstock/listing">Received Item</a></li>
				<li><a href="http://localhost/nextraInventory/admin/stock/listing">Stock</a></li>
				<li><a href="http://localhost/nextraInventory/admin/transferorder/listing">Transfer Order</a></li>
				<li><a href="http://localhost/nextraInventory/admin/sales/listing">Sales</a></li>
				<li><a href="http://localhost/nextraInventory/admin/returnitem">Return</a></li>
				<li><a href="http://localhost/nextraInventory/admin/report/listing">Report</a></li>
			</ul>
		</li>
		
			
	<li class="">
			<h3><span class="fa fa-cog fa-fw"></span>Setting</h3>
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


	  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    
          
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i>Return Management
        <!--<small>Add New Purchase </small>-->
      </h1>
    </section>
	<!--<div class="col-xs-8 text-right">
			<div class="form-group">
				<a class="btn btn-primary" href="admin/purchase/listing"><i class=""></i> Purchase Book</a>
			</div>
		</div>	
    <br>-->
    <section class="content">
   
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements --> 
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Return Item </h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    
                    <form role="form" id="return" action="" method="post" role="form">
                        <div class="box-body">
						
                           <div class="row">
						   
								<div class="col-md-4">
                                    <div class="form-group">
                                        <label for="po-number">Purchase Order Number </label>
                                         <input type="text" class="form-control" value="" name="po_number" id="ponum" />
										 <ul class="dropdown-menu txtcountry" style="margin-left:15px;margin-right:0px;" role="menu" aria-labelledby="dropdownMenu"  id="DropdownPonum"></ul>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
										<label for="type_return"> Select One </label>
										<select name="return_type" class="required form-control" id="return-type">
											<option value="">Select Type</option>
											<option value="return">Return</option>
											<option value="repair">Repair</option>
											<option value="faulty">Faulty</option>
										</select>
									</div>
								</div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="po-number">Quantity </label>
                                         <input type="text" required class="form-control" value="" name="po_qty" id="qty" />
                                    </div>
                                </div>
                            </div>
							
                             <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cpassword">Reason</label>
                                        <textarea class="form-control" rows="3" cols="50" name="reason" ></textarea>
                                    </div>
                                </div>
                            </div>
                      <br>
    
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Submit" id="sub_btn"/>
                            <input type="reset" class="btn btn-default" value="Reset" />
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                                                
                <div class="row">
                    <div class="col-md-12">
                                            </div>
                </div>
            </div>
        </div>    
    </section>   
</div>


			<!--main content end-->


			</div><!-- mainpanel -->
<script type="text/javascript">
	var base_url = 'http://localhost/nextraInventory/';
</script>
<script src="http://localhost/nextraInventory/assets/admin/js/jquery-1.11.1.min.js"></script>
<script src="http://localhost/nextraInventory/assets/admin/js/jquery-migrate-1.2.1.min.js"></script>
<script src="http://localhost/nextraInventory/assets/admin/js/jquery-ui-1.10.3.min.js"></script>
<script src="http://localhost/nextraInventory/assets/admin/js/bootstrap.min.js"></script>
<script src="http://localhost/nextraInventory/assets/admin/js/modernizr.min.js"></script>
<script src="http://localhost/nextraInventory/assets/admin/js/jquery.sparkline.min.js"></script>
<script src="http://localhost/nextraInventory/assets/admin/js/toggles.min.js"></script>
<script src="http://localhost/nextraInventory/assets/admin/js/retina.min.js"></script>
<script src="http://localhost/nextraInventory/assets/admin/js/jquery.cookies.js"></script>
<script src="http://localhost/nextraInventory/assets/admin/js/select2.min.js"></script>
<script src="http://localhost/nextraInventory/assets/admin/js/jquery.validate.min.js"></script>
<link href="http://localhost/nextraInventory/assets/admin/css/jquery.datatables.css" rel="stylesheet">
<script src="http://localhost/nextraInventory/assets/admin/js/jquery.datatables.min.js"></script>
<link rel="stylesheet" href="http://localhost/nextraInventory/assets/admin/css/jquery.datetimepicker.css">
<script src="http://localhost/nextraInventory/assets/admin/js/jquery.datetimepicker.full.js"></script>
<script src="http://localhost/nextraInventory/assets/admin/js/custom.js"></script>
<script src="http://localhost/nextraInventory/assets/admin/js/admin-function.js"></script>

    <script src="http://localhost/nextraInventory/assets/admin/dist/js/app.min.js" type="text/javascript"></script>
    <script src="http://localhost/nextraInventory/assets/admin/js/jquery.validate.js" type="text/javascript"></script>
    <script src="http://localhost/nextraInventory/assets/admin/js/validation.js" type="text/javascript"></script>
    <script type="text/javascript">
        var windowURL = window.location.href;
        pageURL = windowURL.substring(0, windowURL.lastIndexOf('/'));
        var x= $('a[href="'+pageURL+'"]');
            x.addClass('active');
            x.parent().addClass('active');
        var y= $('a[href="'+windowURL+'"]');
            y.addClass('active');
            y.parent().addClass('active');
    </script></body>
</html>			<script type="text/javascript" src="http://localhost/nextraInventory/assets/admin/js/jquery.validate.min.js"></script>
<script>
$(document).ready(function() {
    $("#return").validate({
            rules: {
                po_number :{required: true},
            },
            messages: {
              po_number : "Purchase Item Number is required.",
            }
        });

});
</script>
<script type="text/javascript" >
$(document).ready(function () {
    $("#ponum").keyup(function () {
        $.ajax({
            type: "POST",
            url: "http://localhost/nextraInventory/admin/returnitem/check_po",
            dataType: "json",
            success: function (data) {
				//console.log(data);
                if (data.length > 0) {
                    $('#DropdownPonum').empty();
                    $('#ponum').attr("data-toggle", "dropdown");
                    $('#DropdownPonum').dropdown('toggle');
                }
                else if (data.length == 0) {
                    $('#ponum').attr("data-toggle", "");
                }
                $.each(data, function (key,value) {
                    if (data.length >= 0)
                        $('#DropdownPonum').append('<li role="displayCountries" ><a role="menuitem dropdownCountryli" class="dropdownlivalue">' + value + '</a></li>');
                });
            }
        });
    });
    $('ul.txtcountry').on('click', 'li a', function () {
        $('#ponum').val($(this).text());
    });
});
	/*$(document).ready(function () {
		$("#ponum").blur(function () {
			//var ponum = $("#ponum").val();
				$.ajax({
				   type: "post",
				   url: "http://localhost/nextraInventory/admin/returnitem/check_po",
				   data:'ponum=' + $("#ponum").val(),
				   dataType: 'json',
				   success: function(response){ 
				  
				   		if(response.result != "yes"){
							$("#ponum").parent().next(".error").remove();
							$("#ponum").parent().after('<label class="error">Enter Purchase order not Exit</label>');
							//$('.error').text('Enter Purchase order not Exit');
							
						} else {
							$("#ponum").parent().next(".error").remove();
							
						}
					
				   },
				   
				});
			
		});
	});*/
</script>
<script type="text/javascript" >
	$(document).ready(function () {
		$("#sub_btn").click(function () {
			//alert("ghy");
			var ponum = $("#ponum").val();
			var po_type = $('#return-type :selected').val();
			var poqty = $("#qty").val();
			//alert(po_type);
			//var data = { ponum: ponum, po_type: po_type, poqty: poqty };
			
				$.ajax({
					url: 'http://localhost/nextraInventory/admin/returnitem/deduct',
					type: 'post',
					data: {puror_num:ponum,pur_type:po_type,pur_qty:poqty},
					dataType: 'json',
					success: function(json) {
						

							
						}

									
				});
			
		});
	});
</script>