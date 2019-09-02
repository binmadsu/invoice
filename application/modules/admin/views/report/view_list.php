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
a.btn-warning {
	pointer-events: none;
	cursor: default;
}
</style>
<h1>
	<h3><i class="fa fa-users"></i> Out Stock</h3>
</h1>
<link href="<?php echo base_url(); ?>assets/css/table-responsive.css" rel="stylesheet">
	<div class="row">
		<div class="col-xs-12 text-right">
			<div class="form-group">
				<a class="btn btn-info" href="<?php echo base_url(); ?>admin/report/instock"><i class=""></i> In Stock List</a>
				<a class="btn btn-danger" href="<?php echo base_url(); ?>admin/report/listing"><i class=""></i> Out of Stock List</a>
				<a class="btn btn-primary" href="<?php echo base_url(); ?>admin/report/total"><i class=""></i> Total Stock List</a>
				<a class="btn btn-warning" href="<?php echo base_url(); ?>"><i class=""></i> New Stock List</a>
				<a class="btn btn-primary" href="<?php echo base_url(); ?>admin/report/item"><i class=""></i> Search Item Transfer</a>
				<a class="btn btn-success" href="<?php echo base_url(); ?>admin/report"><i class=""></i> Inventory Transaction</a>
				
			</div>
		</div>
     <br>
<div class="contentpanel">
		<div class="panel panel-default">
			<div class="panel-heading" >
				<a href="#"><i class="fa fa-caret-right"></i>Out Stock</a>    
			<div class="panel-body">
			<?php echo showmsg($this->session->flashdata('msg'));?>
		  	<div class="table-responsive">
			<table id="tbl_results" class="table mb30">
                  <thead class="cf">
	                  <tr>
	                     <th>SL</th>
						  <th>Company Name</th>
	                      <th>Ware House Name</th>
						   <th>Supplier Name</th>
						   <th>Item Name</th>
							<th>Out Stock</th>
							<th>Handover To</th>
							<th>Recieved Date</th> 							  
	                      
	                     <!-- <th>Order By</th> -->
	                  </tr>
                  </thead>
				  <?php if(is_array($datarows)){$i=++$page;?>
                  <tbody>
			      <?php 
			      foreach($datarows as $row){ ?>
					<tr>
						<td data-title="SL#"><?php echo $i;?></td>
						<td data-title="Title"><a class="btn btn-info btn-xs" ><i class=""><?php echo getFieldByName(@$row['company_id'], 'company_name', 'tbl_company', 'company_name'); ?></td>
				    	<td data-title="Title"><a class="btn btn-danger btn-xs" ><i class=""><?php echo getFieldByName(@$row['warehouse_id'], 'name', 'tbl_warehouse', 'name'); ?></td>
						<td data-title="Title"><a class="btn btn-warning btn-xs" ><i class=""><?php echo getFieldByName(@$row['supplier_id'], 'supplier_name', 'tbl_supplier', 'supplier_name'); ?></td>
						<td data-title="Title"><?php echo getFieldByName(@$row['item_id'], 'item_name', 'tbl_item', 'item_name'); ?></td>
						<td data-title="Title"><a class="btn btn-info btn-xs" ><i class=""><?php echo @$row['out_stock_qty']; ?></td>
						<td data-title="Title"><?php echo @$row['handover_to']; ?></td>
						<td data-title="Title"><a class="btn btn-default btn-xs" ><?php echo @$row['Accepte_date']; ?></td>
											
						
                    </tr>
			      <?php $i++; } ?>
                  </tbody>
				
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