<?php 
$this->load->view('admin/header');
$this->load->view('admin/dasboardheader');
?>
<h1>
	<h3><i class="fa fa-users"></i> Return, Repair and Faulty Details List</h3>
</h1>
<link href="<?php echo base_url(); ?>assets/css/table-responsive.css" rel="stylesheet">
	<div class="row">

     <br>
<div class="contentpanel">
		<div class="panel panel-default">
			<div class="panel-heading" >
				<a href="<?php echo base_url(); ?>admin/purchase"><i class="fa fa-caret-right"></i>Add Purchase</a>		
			<div class="panel-body">
			<?php echo showmsg($this->session->flashdata('msg'));?>
		  	<div class="table-responsive">
			<table id="tbl_results" class="table mb30">
                  <thead class="cf">
	                  <tr>
							<th>SL</th>
							<th>Purchase Order</th>
							<th>Type</th>
							<th>Quantity</th>
							<th>Reason</th>
							<th>Date</th>
	                  </tr>
                  </thead>
				  <?php if(is_array($datarows)){$i=++$page;?>
                  <tbody>
			      <?php 
			      foreach($datarows as $row){ ?>
					<tr>
						<td data-title="SL#"><?php echo $i;?></td>
						<td data-title="Title"><a class="btn btn-info btn-xs" ><i class=""><?php echo @$row['purchase_order'];?></td>
						<td data-title="Title"><a class="btn btn-warning btn-xs" ><i class=""><?php echo @$row['return_type']; ?></td>					
						<td data-title="Title"><a class="btn btn-primary btn-xs" ><i class=""><?php echo @$row['qty']; ?></td>
						<td data-title="Title"><?php echo @$row['reason']; ?></td>
						<td data-title="Title"><a class="btn btn-default btn-xs" ><i class=""><?php echo @$row['created_on']; ?></td>
											
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
							<a  href=""><i class="fa fa-file-excel-o" style="font-size:20px;color:green"></i>Return, Repair and Faulty Details Download</a>
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