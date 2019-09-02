<?php 
$this->load->view('admin/header');
$this->load->view('admin/dasboardheader');

?>
<h1>
	<h3><i class="fa fa-users"></i> Received Stock List</h3>
</h1>
<link href="<?php echo base_url(); ?>assets/css/table-responsive.css" rel="stylesheet">
	<div class="row">
		<div class="col-xs-12 text-right">
			 <div class="form-group">
			</div>
		</div>
     <br>
<div class="contentpanel">
		<div class="panel panel-default">
			<div class="panel-heading" >
			<div class="panel-body" id="msg_err">
			<?php 
				$err_message = '';
				$err_message = $this->session->flashdata('msg');
				//echo $_GET['err_msg'];
				if(isset($err_message)!=""){
			?>
					<?php if(isset($_GET['err_msg'])){ ?>
						<script>
							$(document).ready(function() {
								$('#msg_err').prepend('<div class="alert alert-fail"><?php echo $this->session->flashdata('msg'); ?></div>');
							});
						</script>
					<?php } else { ?>
						<?php echo showmsg($this->session->flashdata('msg'));?>
					<?php } ?>
			<?php } ?>
		  	<div class="table-responsive">
			<table id="tbl_results" class="table mb30">
                  <thead class="cf">
	                  <tr>
	                    <th>SL</th>
	                    <th>Item Name</th>
						<th>Source Warehouse</th>
						<th>Destination Warehouse</th>
						<th>Pending Qty</th>
						<th>Purchase Date</th>
						<th>Status</th>
						<th><i class=" fa fa-edit"></i> Action</th>
	                  </tr>
                  </thead>
				  <?php if(is_array($datarows)){$i=++$page;?>
                  <tbody>
			      <?php 
			      foreach($datarows as $row){?>
					<tr>
						<td data-title="SL#"><?php echo $i;?></td>
						<td data-title="Title"><a class="btn btn-info btn-xs" ><i class=""><?php echo getFieldByName(@$row['item_id'], 'item_name', 'tbl_item', 'item_name'); ?></td>
						<td data-title="Title"><a class="btn btn-warning btn-xs" ><i class=""><?php echo getFieldByName(@$row['warehouse_id'], 'name', 'tbl_warehouse', 'name'); ?></td>
						<td data-title="Title"><a class="btn btn-success btn-xs" ><i class=""><?php echo getFieldByName(@$row['destination_whm_id'], 'name', 'tbl_warehouse', 'name'); ?></td>
						<td data-title="Title"><a class="btn btn-primary btn-xs" ><i class=""><?php echo @$row['quinty']; ?></td>
						<td data-title="Title"><?php echo @$row['purchase_date']; ?></td>
						
						<td data-title="Title"><?php if(@$row['quinty'] != 0 ){?>
						<a class="btn btn-success btn-xs" <?php echo base_url(); ?><?php echo @$row['quinty'];?>><i class="fa fa-user"> Waiting for Accept</i></a>
						<?php }else {?>
						<a class="btn btn-danger btn-xs" <?php echo base_url(); ?><?php echo @$row['quinty'];?>><i class="fa fa-user"> Handovered</i></a>
						<?php }?></td>
						
						
						<td data-title="Action">
						
						<?php $this->session->set_userdata('session_qty',$row['quinty']);?>
						<?php if($row['quinty']==0){?>
							<a class="btn btn-xs btn-success deleteUser" href="#"><i class=""></i>Recieved</a>
						<?php }else{
							$url_link = "?&item=".$row['item_id']."&ware=".$row['warehouse_id'];
							?>
							<a class="btn btn-primary btn-xs" href="<?php echo base_url(); ?>admin/recivedstock/<?php echo @$row['id'];echo $url_link;?>"><i class=""></i>Accept</a>
						<?php }?>
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
							<a  href=""><i class="fa fa-file-excel-o" style="font-size:20px;color:green"></i>Recived Details Download</a>
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
</script>