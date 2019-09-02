<?php 
$this->load->view('admin/header');
$this->load->view('admin/dasboardheader');
?>
<style>
.dataTables_filter input{
	width: 215px;
	height: 30px;
}

table {
  width: 300px;
  margin: 20px auto;
  background: #fafafa;
  box-sizing: border-box;
  box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
}

table thead {
  border: 1px solid #222;
  border-right: 0;
  background: #222d32;
}

table thead tr th {
  color: #fff;
  padding: 10px;
  border-right: 1px solid #222;
}

table tbody {
  border-left: 1px solid #ccc;
}

table tbody tr {
  border-bottom: 1px solid #ccc;
}

table tbody tr td {
  padding: 10px;
  border-right: 1px solid #ccc;
}
.dataTable thead > tr > th{
	color:#FFF;
}
</style>
<h1>
	<h3><i class="fa fa-users"></i>Users Management</h3>
</h1>
<link href="<?php echo base_url(); ?>assets/css/table-responsive.css" rel="stylesheet">
	<div class="row">
		<div class="col-xs-12 text-right">
			<div class="form-group">
				<a class="btn btn-primary" href="<?php echo base_url(); ?>admin/adminuser"><i class="fa fa-plus"></i> Add New User</a>
			</div>
		</div>
     <br>
<div class="contentpanel">
		<div class="panel panel-default">
			<div class="panel-heading" >
				<!-- <h3 class='panel-title'><i class="fa"></i>Action</h3> -->
				<a href="<?php echo base_url(); ?>admin/adminuser"><i class="fa fa-caret-right"></i>Add New User</a>
				 <form action="" method="POST" id="searchList">  
			<div class="panel-body">
			<?php echo showmsg($this->session->flashdata('msg'));?>
		  	<div class="table-responsive">
			<table id="tbl_results" class="table mb30">
                  <thead class="cf">
	                  <tr>
	                      <th>SL</th>
						   <th>Status</th>
	                	   <th>Name</th>
						    <!-- <th>Company</th> -->
							<!-- <th>Depeartment</th> -->
							   <th>Email</th>
                                <th>Phone</th>
                                 <!-- <th>Role</th>										  -->
	                      
	                      <!-- <th>Order By</th> -->
					      <th><i class=" fa fa-edit"></i> Action</th>
	                  </tr>
                  </thead>
				  <?php if(is_array($datarows)){$i=++$page;?>
                  <tbody>
			      <?php 
			      foreach($datarows as $row){?>
		<!-- <th>Admin</th> -->
		<?php //if(@$row['is_admin'] =='0' ){?>
		<!-- <th>admin</th> -->
					<tr>
						<td data-title="SL#"><?php echo $i;?></td>
						<td data-title="Title"><?php if(@$row['is_active'] =='1' ){?>
							<a class="btn btn-success btn-xs" <?php echo base_url(); ?><?php echo @$row['is_active'];?>><i class="fa fa-user"> Active</i></a>
						<?php }else {?>
							<a class="btn btn-danger btn-xs" <?php echo base_url(); ?><?php echo @$row['is_active'];?>><i class="fa fa-user"> Inactive</i></a>
						<?php }?></td>
						<td data-title="Title"><?php echo @$row['username']; ?></td>
				    	<!-- <td data-title="Title"><?php //echo @$row['company']; ?></td> -->
						<!-- <td data-title="Title"><?php //echo @$row['depeartment']; ?></td> -->
						<td data-title="Title"><?php echo @$row['email']; ?></td>
						<td data-title="Title"><?php echo @$row['mobile_no']; ?></td>
						<!-- <td data-title="Title"><?php //echo getFieldByName(@$row['role_id'], 'role_name', 'tbl_roles', 'role_name'); ?></td>					 -->
											
						<td data-title="Action">
						
						<!--- edit banner -->
						<a class="btn btn-xs btn-primary"  href="<?php echo base_url() . "admin/adminuser/edit/".$row['id']; ?>" 
							onclick="return confirm('Are you sure you want to edit?');" title="Edit" ><i class="fa fa-pencil"></i></a>
						<!--- end edit banner -->
						<?php ?>
						<!--- status -->
						<?php  if($row['is_active'] == '0'){?>
						<a href="<?php echo base_url() . "admin/adminuser/status/".$row['id']."/1";?>" class="btn"  title="Enable">
						<i class="fa fa-toggle-off" style="font-size:20px;color:red"></i></a>
						<?php } else { ?>        
						<a class="btn" href="<?php echo base_url() . "admin/adminuser/status/".$row['id']."/0";?>"  title="Disable">
						<i class="fa fa-toggle-on" style="font-size:20px;color:green"></i></a>
						<?php } ?> 
						<!-- delete -->
						<a class="btn btn-xs btn-danger deleteUser" href="<?php echo base_url() . "admin/adminuser/delete/".$row['id'];?>" onclick="return confirm('Are you sure you want to remove?');" title="Remove"><i class="fa fa-trash-o "></i></a>
						<!-- end delete -->
						<?php ?>
						</td>
                    </tr>
					<!-- <th>admin</th> -->  				 
		             <?php //}?>
		            <!-- <th>admin</th> -->
			      <?php $i++; } ?>
                  </tbody>
				<tr>
					<td colspan="15">
                     <div class="btn-toolbar">
                    <div class="btn-group"><?php echo $links; ?></div></div>
					</td>
				</tr>
				  <?php }else{?>
				<tr>
					<td colspan="15">Record not available.</td>
				</tr>
				<?php  }?>
			        	</table>
			        </div>
				</div>
			</div>
      </div>
<?php $this->load->view('admin/footer');?>
<script type="text/javascript">
function updatepriority(id,val)
{
	//alert(val);
	var xmlhttp;
	if(navigator.appName=="Microsoft Internet Explorer")
	{
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	else
	{
		xmlhttp = new XMLHttpRequest();
	}
	xmlhttp.onreadystatechange = function() {
	    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
	    }
	}
	xmlhttp.open("GET", baseUrl+"admin/role/priority/?p="+val+"&id="+id, true);
	xmlhttp.send();
}

jQuery(document).ready(function() {
	"use strict";
	jQuery('#tbl_results').dataTable();
});
</script>