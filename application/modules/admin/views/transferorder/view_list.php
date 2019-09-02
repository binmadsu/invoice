<?php 
$this->load->view('admin/header');
$this->load->view('admin/dasboardheader');
?>
<h1>
	<h3><i class="fa fa-users"></i> Transfer Order Details List</h3>
</h1>
<link href="<?php echo base_url(); ?>assets/css/table-responsive.css" rel="stylesheet">
	<div class="row">
		<div class="col-xs-12 text-right">
			<div class="form-group">
				<a class="btn btn-primary" href="<?php echo base_url(); ?>admin/transferorder"><i class="fa fa-plus"></i> Add Transfer Order</a>
			</div>
		</div>
     <br>
<div class="contentpanel">
		<div class="panel panel-default">
			<div class="panel-heading" >
				<!-- <h3 class='panel-title'><i class="fa"></i>Action</h3> -->
				<a href="<?php echo base_url(); ?>admin/transferorder"><i class="fa fa-caret-right"></i>Add Transfer Order</a>     
			<div class="panel-body">
			<?php echo showmsg($this->session->flashdata('msg'));?>
		  	<div class="table-responsive">
			<table id="tbl_results" class="table mb30">
                  <thead class="cf">
	                  <tr>
						<th>SL</th>
						<th>Status</th>
						<th>Purchase Date</th>
						<th>Source Warehouse Name</th>
						<th>Destination Warehouse Name</th>
						<th>Supplier Name</th>
						<th>Item Name</th>
						<th>Quantity</th>
                        <th>Status</th>							
	                      <!-- <th>Order By</th> -->
					      <th><i class=" fa fa-edit"></i> Action</th>
	                  </tr>
                  </thead>
				  <?php if(is_array($datarows)){$i=++$page;?>
                  <tbody>
			      <?php 
			      foreach($datarows as $row){?>
					<tr>
						<td data-title="SL#"><input name="checkbox[]" class="checkbox1" type="checkbox" id="checkbox-<?php echo $row['id']; ?>" value="<?php echo $row['id']; ?>"></td>
						<td data-title="Title"><?php if(@$row['is_active'] =='1' ){?>
						<a class="btn btn-success btn-xs" <?php echo base_url(); ?><?php echo @$row['is_active'];?>><i class="fa fa-user"> Active</i></a>
						<?php }else {?>
						<a class="btn btn-danger btn-xs" <?php echo base_url(); ?><?php echo @$row['is_active'];?>><i class="fa fa-user"> Inactive</i></a>
						<?php }?></td>
						<td data-title="Title"><?php echo @$row['created_on']; ?></td>
						<td data-title="Title"><a class="btn btn-info btn-xs" ><i class=""><?php echo getFieldByName(@$row['warehouse_id'], 'name', 'tbl_warehouse', 'name'); ?></td>
						<td data-title="Title"><a class="btn btn-warning btn-xs" ><i class=""><?php echo getFieldByName(@$row['destination_whm_id'], 'name', 'tbl_warehouse', 'name'); ?></td>
						<td data-title="Title"><?php echo getFieldByName(@$row['supplier_id'], 'supplier_name', 'tbl_supplier', 'supplier_name'); ?></td>
						<td data-title="Title"><?php echo getFieldByName(@$row['item_id'], 'item_name', 'tbl_item', 'item_name'); ?></td>		
						<td data-title="Title"><a class="btn btn-primary btn-xs" ><i class=""><?php echo @$row['quinty']; ?></td>
					
						<td data-title="Title"><?php if(@$row['status'] =='0' ){?>
						<a class="btn btn-success btn-xs" <?php echo base_url(); ?><?php echo @$row['status'];?>><i class="fa fa-user"> To Be Delivered</i></a>
						<?php }else {?>
						<a class="btn btn-danger btn-xs" <?php echo base_url(); ?><?php echo @$row['status'];?>><i class="fa fa-user"> Received</i></a>
						<?php }?></td>
				
						<td data-title="Action">
						
						<!--- status -->
						<?php  if($row['is_active'] == '0'){?>
						<a href="<?php echo base_url() . "admin/transferorder/status/".$row['id']."/1";?>" class="btn"  title="Enable">
						<i class="fa fa-toggle-off" style="font-size:20px;color:red"></i></a>
						<?php } else { ?>        
						<a class="btn" href="<?php echo base_url() . "admin/transferorder/status/".$row['id']."/0";?>"  title="Disable">
						<i class="fa fa-toggle-on" style="font-size:20px;color:green"></i></a>
						<?php } ?> 
						<!-- end status -->
						
						
						<!--- edit banner -->
						<a class="btn btn-xs btn-primary"  href="<?php echo base_url() . "admin/transferorder/edit/".$row['id']; ?>" 
							onclick="return confirm('Are you sure you want to edit?');" title="Edit" ><i class="fa fa-pencil"></i></a>
						<!--- end edit banner -->
						<?php ?>
					
						<?php ?>
						</td>
                    </tr>
			      <?php $i++; } ?>
                  </tbody>
				  <?php }else{?>
				<tr>
					<td colspan="15">Record not available.</td>
				</tr>
				<?php  }?>
			        	</table>
						<div class="col-xs-12 text-left">
			                <div class="form-group">
							<th><input id="selecctall" name='selecctall' type="checkbox">&nbsp;<span for='selecctall'>Select All</span></th>
							 &nbsp;
						      <a href="" class="btn btn-xs btn-danger deleteUser" id="del_all" title="Delete">
						      <i class="fa fa-trash-o"> Permanent Delete </i></a>
							&nbsp;&nbsp;&nbsp;&nbsp;
							<a  href=""><i class="fa fa-file-excel-o" style="font-size:20px;color:green"></i>WareHouse Details Download</a>
		                 </div>
		               </div>
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


/* select all checkbox functionality */
   	resetcheckbox();
	$('#selecctall').click(function(event) {  //on click
		if (this.checked) { // check select status
			$('.checkbox1').each(function() { //loop through each checkbox
				this.checked = true;  //select all checkboxes with class "checkbox1"              
			});
		} else {
			$('.checkbox1').each(function() { //loop through each checkbox
				this.checked = false; //deselect all checkboxes with class "checkbox1"                      
			});
		}
	});

	$("#del_all").on('click', function(e) {
		e.preventDefault();
		var checkValues = $('.checkbox1:checked').map(function()
		{
			return $(this).val();
		}).get();
		console.log(checkValues);
		$.each( checkValues, function( i, key ) {
			$.ajax({
				url: '<?php echo base_url() ?>admin/transferorder/ajaxDelete',
				type: 'post',
				data: 'id=' + key
			}).done(function(data) {
				window.location = '<?php echo base_url() ?>admin/transferorder/listing';
				/*$("#respose").html(data);
				$('#selecctall').attr('checked', false);*/
			});
		});
		
	});

	function  resetcheckbox(){
		$('input:checkbox').each(function() { //loop through each checkbox
			this.checked = false; //deselect all checkboxes with class "checkbox1"                      
		});
	}
</script>