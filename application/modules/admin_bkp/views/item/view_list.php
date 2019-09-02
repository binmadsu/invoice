<?php $this->load->view('admin/header');$this->load->view('admin/dasboardheader');?><h1>	<h3><i class="fa fa-users"></i> Item List</h3></h1><link href="<?php echo base_url(); ?>assets/css/table-responsive.css" rel="stylesheet">	<div class="row">		<div class="col-xs-12 text-right">			<div class="form-group">				<a class="btn btn-primary" href="<?php echo base_url(); ?>admin/item"><i class="fa fa-plus"></i> Add New Item</a>			</div>		</div>     <br><div class="contentpanel">		<div class="panel panel-default">			<div class="panel-heading" >				<!-- <h3 class='panel-title'><i class="fa"></i>Action</h3> -->				<a href="<?php echo base_url(); ?>admin/item"><i class="fa fa-caret-right"></i>Add New Item</a>				 <form action="" method="POST" id="searchList">				  <div class="input-group">				  <input type="text" name="searchText" value="" class="form-control input-sm pull-right" style="width: 250px;" placeholder="Search"/>				  <div class="input-group-btn">				  <button class="btn btn-sm btn-default searchList"><i class="fa fa-search"></i></button>				   </div>                   </form>			       </div>       			<div class="panel-body">			<?php echo showmsg($this->session->flashdata('msg'));?>		  	<div class="table-responsive">			<table id="tbl_results" class="table mb30">                  <thead class="cf">	                  <tr>	                      <th>SL</th>	                      <th>Item Name</th>				       <!--<th>Item Code</th>-->						   <th>SKU</th>						    <th>Item Group</th>							<th>Item Price</th>							<th>Manufacturer</th>							<th>Brand</th>							<th>MPN</th>							<th>Item Image</th>							<!---<th>Ware House</th>-->							<!--<th>Quantity</th>-->						    <!---<th>Recive Date</th>-->							 <!--<th>Supplier</th>--->														                      <!-- <th>Order By</th> -->					      <th><i class=" fa fa-edit"></i> Action</th>	                  </tr>                  </thead>				  <?php if(is_array($datarows)){$i=++$page;?>                  <tbody>			      <?php 			      foreach($datarows as $row){?>					<tr>						<td data-title="SL#"><?php echo $i;?></td>						<td data-title="Title"><?php echo @$row['item_name']; ?></td>						<!--<td data-title="Title"><?php echo @$row['item_code']; ?></td>-->						<td data-title="Title"><?php echo @$row['sku']; ?></td>						<td data-title="Title"><?php echo getFieldByName(@$row['item_id'], 'item_type', 'tbl_itemtype', 'item_type'); ?></td>						<td data-title="Title"><?php echo @$row['item_price']; ?></td>						<td data-title="Title"><?php echo @$row['manufacturer']; ?></td>						<td data-title="Title"><?php echo @$row['brand']; ?></td>						<td data-title="Title"><?php echo @$row['mpn']; ?></td>						<td data-title="Title"><img src="<?php echo base_url().$row['image_upload']; ?>" width="100" height="100" /></td>						<!--<td data-title="Title"><?php echo getFieldByName(@$row['whm_id'], 'name', 'tbl_warehouse', 'name'); ?></td>-->						<!--<td data-title="Title"><?php echo @$row['quinty']; ?></td>						<td data-title="Title"><?php echo @$row['recive_date']; ?></td>						<td data-title="Title"><?php echo getFieldByName(@$row['supplier_id'], 'supplier_name', 'tbl_supplier', 'supplier_name'); ?></td>-->												<?php /*?><td data-title="Order By">							<input type="text" name="priority" id="priority" value="<?php echo $row['priority'] ; ?>" size="5" style="text-align:center;" OnChange="updatepriority('<?php echo $row['id'] ; ?>',this.value);" /></td> <?php */?>						<td data-title="Action">						<!--- edit banner -->						<a class="btn btn-sm btn-primary"  href="<?php echo base_url() . "admin/item/edit/".$row['id']; ?>" 							onclick="return confirm('Are you sure you want to edit?');" title="Edit" ><i class="fa fa-pencil"></i></a>						<!--- end edit banner -->						<?php ?>						<!--- status -->						<?php  if($row['is_active']==1){?>						<a href="<?php echo base_url() . "admin/item/status/".$row['id']."/0";?>" class="btn btn-sm btn-info"  title="Enable" onclick="return confirm('Are you sure you want to disable?');">						<i class="fa fa-check"></i></a>						<?php } else { ?>						<a class="btn btn-sm btn-info" href="<?php echo base_url() . "admin/item/status/".$row['id']."/1";?>"  title="Disable" onclick="return confirm('Are you sure you want to enable?');">						<i class="fa fa-check"></i></a>						<?php } ?> <!-- end status -->												<!-- delete -->						<a class="btn btn-sm btn-danger deleteUser" href="<?php echo base_url() . "admin/item/delete/".$row['id'];?>" onclick="return confirm('Are you sure you want to remove?');" title="Remove"><i class="fa fa-trash-o "></i></a>						<!-- end delete -->						<?php ?>						</td>                    </tr>			      <?php $i++; } ?>                  </tbody>				<tr>					<td colspan="15">                     <div class="btn-toolbar">                    <div class="btn-group"><?php echo $links; ?></div></div>					</td>				</tr>				  <?php }else{?>				<tr>					<td colspan="15">Record not available.</td>				</tr>				<?php  }?>			        	</table>			        </div>				</div>			</div>      </div><?php $this->load->view('admin/footer');?><script type="text/javascript">function updatepriority(id,val){	//alert(val);	var xmlhttp;	if(navigator.appName=="Microsoft Internet Explorer")	{		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");	}	else	{		xmlhttp = new XMLHttpRequest();	}	xmlhttp.onreadystatechange = function() {	    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {	    }	}	xmlhttp.open("GET", baseUrl+"admin/role/priority/?p="+val+"&id="+id, true);	xmlhttp.send();}jQuery(document).ready(function() {	"use strict";	//jQuery('#tbl_results').dataTable();});</script>