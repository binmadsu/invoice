<?php $this->load->view('admin/header');
$this->load->view('admin/left-sidebar');
?>
<link href="<?php echo base_url(); ?>assets/css/table-responsive.css" rel="stylesheet">
<div class="contentpanel">

		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class='panel-title'><i class="fa"></i>Press Images</h3>
			</div>
			<div class="panel-body">
			<?php echo showmsg($this->session->flashdata('msg'));?>
		  	<div class="table-responsive">
			<table id="tbl_results" class="table mb30">
                  <thead class="cf">
	                  <tr>
	                      <th>SL#</th>
	                      <th>Image</th>
	                      <th>Order By</th>
					      <th><i class=" fa fa-edit"></i> Action</th>
	                  </tr>
                  </thead>
				  <?php 
				  	if(is_array($banners)){
				  ?>
    			  <?php $i=++$page;?>
                  <tbody>
			      <?php 
			      foreach($banners as $row){?>
					<tr>
						<td data-title="SL#"><?php echo $i ; ?></td>
						<td data-title="Image"><img src="<?php echo base_url().$row['banner_image']; ?>" width="100" height="100" /></td>
						<td data-title="Order By">
						<input type="text" name="priority" id="priority" value="<?php echo $row['priority'] ; ?>" size="5" style="text-align:center;" OnChange="updatepriority('<?php echo $row['id'] ; ?>',this.value);" /></td>
						<td data-title="Action">
						<!--- edit banner -->
						<a class="btn btn-primary btn-xs"  href="<?php echo base_url() . "admin/media/edit/".$row['id']; ?>" 
							onclick="return confirm('Are you sure you want to edit banner?');" title="Edit" ><i class="fa fa-pencil"></i></a>
						<!--- end edit banner -->
						<!--- status -->
						<?php /* if($row['is_active']==1){?>
						<a href="<?php echo base_url() . "admin/media/status/".$row['id']."/0";?>" class="btn btn-success btn-xs"  title="Enable" onclick="return confirm('Are you sure you want to disable banner?');">
						<i class="fa fa-check"></i></a>
						<?php } else { ?>
						<a class="btn btn-warning btn-xs" href="<?php echo base_url() . "admin/media/status/".$row['id']."/1";?>"  title="Disable" onclick="return confirm('Are you sure you want to enable banner?');"> 
						<i class="fa fa-check"></i></a>
						<?php } */?> <!-- end status -->
						
						<!-- delete -->
						<a class="btn btn-danger btn-xs" href="<?php echo base_url() . "admin/media/delete/".$row['id'];  ?>" onclick="return confirm('Are you sure you want to remove this banner?');" title="Remove"><i class="fa fa-trash-o "></i></a>
						<!-- end delete -->
						</td>
					</tr>
					<?php $i++; } ?>
					</tbody>
						<tr>
							<td colspan="15"><div class="pagination custom_pagination"><?php echo $links; ?></div>
							</td>
						</tr>
					<?php }else{ ?>
						<tr>
							<td colspan="15">Record not available.</td>
						</tr>
					<?php  } ?>
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
	xmlhttp.open("GET", baseUrl+"admin/media/priority/?p="+val+"&id="+id, true);
	xmlhttp.send();
}
jQuery(document).ready(function() {
	"use strict";
	//jQuery('#tbl_results').dataTable();
});
</script>