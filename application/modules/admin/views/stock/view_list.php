<?php 
$this->load->view('admin/header');
$this->load->view('admin/dasboardheader');
?>
<h1>
	<h3><i class="fa fa-users"></i> Stock Management List</h3>
</h1>
<link href="<?php echo base_url(); ?>assets/css/table-responsive.css" rel="stylesheet">
	
     <br>
<div class="contentpanel">
		<div class="panel panel-default">
			<div class="panel-heading" >
				<!-- <h3 class='panel-title'><i class="fa"></i>Action</h3> -->
								   
			<div class="panel-body">
			<?php echo showmsg($this->session->flashdata('msg'));?>
		  	<div class="table-responsive">
			<table id="tbl_results" class="table mb30">
                  <thead class="cf">
	                  <tr>
	                      <th>SL</th>
						  <th>PO</th>
						  <th>Com. Name</th>
	                      <th>WH Name</th>
						  <th>Supplier Name</th>
						  <th>Item Name</th>
						  <th>Faulty</th>
						  <th>Repair</th>
						  <th>Pending</th>
						  <th>In Stock</th>
						  <th>Out Stock</th>
						  <th>Total Items</th>
						  <th>Handover To</th>
						  <th>Recieved Date</th>
						
	                  </tr>
                  </thead>
				  <?php if(is_array($datarows)){$i=++$page;?>
                  <tbody>
			      <?php 
				  $total = '';
			      foreach($datarows as $row){
					  $in_stock=0;$total_qty=0;
					  $in_stock = @$row['quantity'] - @$row['faulty'];
					 // echo @$row['quantity']."<br/>";echo @$row['faulty']."<br/>";echo @$row['out_stock_qty']."<br/>";
					  $total_qty =@$row['quantity'] + @$row['out_stock_qty'] + @$row['faulty'];
					  //echo "<pre>"; print_r($row); 
					  ?>
					<tr>
						<td data-title="SL#"><?php echo $i;?></td>
						<td data-title="Title"><a class="btn btn-info btn-xs" ><i class=""><?php echo @$row['purchase_order']; ?></td>
						<td data-title="Title"><?php echo getFieldByName(@$row['company_id'], 'company_name', 'tbl_company', 'company_name'); ?></td>
						<td data-title="Title"><a class="btn btn-warning btn-xs" ><?php echo getFieldByName(@$row['warehouse_id'], 'name', 'tbl_warehouse', 'name'); ?></td>
						<td data-title="Title"><?php echo getFieldByName(@$row['supplier_id'], 'supplier_name', 'tbl_supplier', 'supplier_name'); ?></td>
						<td data-title="Title"><a class="btn btn-success btn-xs" ><i class=""><?php echo getFieldByName(@$row['item_id'], 'item_name', 'tbl_item', 'item_name'); ?></td>
						<td data-title="Title"><?php echo @$row['faulty']; ?></td>
						<td data-title="Title"><?php echo @$row['repair']; ?></td>
						<!--<td data-title="Title"><a class="btn btn-sm btn-info" href="<?php echo base_url() . "admin/stock/repair_return/".$row['purchase_id'];?>" onclick="return confirm('Are you sure you want to edit?');" title="Edit"><i class="fa fa-check "></i></a></td>-->
						<td data-title="Title"><?php echo  @$row['quinty']; ?></td>
						<td data-title="Title"><a class="btn btn-primary btn-xs" ><i class=""><?php echo @$row['quantity']; ?></td>
						<td data-title="Title"><a class="btn btn-primary btn-xs" ><i class=""><?php echo @$row['out_stock_qty']; ?></td>
						<td data-title="Title"><a class="btn btn-success btn-xs" ><i class=""><?php echo @$total_qty; ?></td>
						<td data-title="Title"><?php echo @$row['handover_to']; ?></td>
						<td data-title="Title"><a class="btn btn-default btn-xs" ><i class=""><?php echo @$row['Accepte_date']; ?></td>
											
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
							<a  href=""><i class="fa fa-file-excel-o" style="font-size:20px;color:green"></i>Stock Details Download</a>
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