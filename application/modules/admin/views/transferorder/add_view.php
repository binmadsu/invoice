<?php 
$this->load->view('admin/header');
$this->load->view('admin/dasboardheader');
?>
     <style type="text/css">
#accountForm {
    margin-top: 25px;
	
}

ul.nav.nav-tabs.tab-border {
    background-color: #3c8dbc;
}
.nav>li.disabled>a {
    color: #fcfcfc;
}
.box-footer {
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
    border-top: 1px solid #3c8dbc;
    padding: 10px;
    background-color: #ccdcea;
}
.form-control {
    border-radius: 0px !important;
    box-shadow: none;
    border-color: #99999991;
}
</style>  
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i>Tranfer Order
        <small>Add New Tranfer Order </small>
      </h1>
    </section>
    <br>
	<div class="col-xs-8 text-right">
			<div class="form-group">
				<a class="btn btn-primary" href="<?php echo base_url(); ?>admin/transferorder/listing"><i class=""></i> Transfer Order List</a>
			</div>
		</div>	
    <section class="content">
   
        <div class="row">
            <!-- left column -->
            
            <div class="col-md-8">
            <?php echo showmsg($this->session->flashdata('msg'));?>
              <!-- general form elements --> 
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Add New Tranfer Order </h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    
                    <form role="form" id="transfer" action="" method="post" role="form">
                        <div class="box-body">
						
                            <div class="row">
                                <div class="col-md-4">                                
                                    <div class="form-group">
                                        <label for="fname">Transfer Order No.</label>
                                       <input type="text" class="form-control" value="<?php echo  "TO-".$trnsfer_number; ?>" readonly name="purchase_order" />
                                    </div>
                                    </div>
                                
                               <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="password">Tranfer Date</label>
                                         <input type="date"  class="form-control" value="<?php echo  $this->input->post('purchase_date'); ?>" name="purchase_date" />
                                    </div>
                                </div>
								
								<div class="col-md-4">
                                    <div class="form-group">
                                        <label for="cpassword">Reason </label>
                                        <textarea class="form-control" rows="3" cols="30" name="reason" ><?php echo  $this->input->post('reason'); ?></textarea>
                                    </div>
                                </div>
                            </div>
							
                            <div class="row">
								<div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cpassword">Item Name</label>
										<?php  $selectitem = (!isset($itemid))?0:$itemid; ?>
										<?php $js = 'class="required form-control" id="itemname"'; ?>
										<?php echo form_dropdown('itemname',$itemname,$selectitem,$js);?>
                                    </div>
                                </div>
								<div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">Supplier Name</label>
										<?php $selectsupplier = (!isset($supplierid))?0:$supplierid;?>
										<?php $js = 'class="required form-control" id="suppliername"'; ?>
										<?php echo form_dropdown('suppliername',$suppliername,$selectsupplier,$js);?>
                                    </div>
                                </div>
                                 
								
                                 
                            </div>
							
							<div class="row">
                                <div class="col-md-6">
									<div class="form-group">
										<label for="role">Source Warehouse</label>
										<select name="warehousename" class="required form-control" id="warehousename">
											<option value="" selected="selected">Select Warehouse*</option>
										</select>
										<?php //$selectwarehose = (!isset($warehoseid))?0:$warehoseid;?>
										<?php //$js = 'class="required form-control" id="warehousename"'; ?>
										<?php //echo form_dropdown('warehousename',$warehousename,$selectwarehose,$js);?>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										 <label for="role">Destination Warehouse</label>
											<?php $selectwarehose = (!isset($warehoseid))?0:$warehoseid;?>
											<?php $js = 'class="required form-control" id="destination"'; ?>
											<?php echo form_dropdown('destination',$destination,$selectwarehose,$js);?>
									</div>
								</div>
                                
                            </div>
							<input type="hidden" value="" id="purchase_order_number" name="purchase_number" >
							<!--<div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cpassword">Transfer Quantity</label>
                                        <input type="text" class="form-control" value="<?php echo  $this->input->post('tansfer_qty'); ?>" name="tansfer_qty" />
                                    </div>	
                                </div></div>-->
								
								<div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="cpassword">Transfer Quantity</label>
                                        <input type="text" id="qty" class="form-control" value="<?php echo  $this->input->post('quinty'); ?>" name="quinty" />
                                    </div>
                                    </div>
                                </div>
							
                      <br>
    
                        <div class="box-footer">
                            <input type="submit" id="sub_btn" class="btn btn-primary" value="Submit" />
                            <input type="reset" class="btn btn-default" value="Reset" />
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <?php
                    $this->load->helper('form');
                    $error = $this->session->flashdata('error');
                    if($error)
                    {
                ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('error'); ?>                    
                </div>
                <?php } ?>
                <?php  
                    $success = $this->session->flashdata('success');
                    if($success)
                    {
                ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php } ?>
                
                <div class="row">
                    <div class="col-md-12">
                        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                    </div>
                </div>
            </div>
        </div>    
    </section>   
</div>


			<!--main content end-->


			<?php 
			$this->load->view('admin/footer');
			?>
			<script type="text/javascript" src="<?php echo base_url();?>assets/admin/js/jquery.validate.min.js"></script>
<script>
$(document).ready(function() {
    $("#transfer").validate({
            rules: {
                order_no :{required: true},
                //email_id :{required: true,email: true},
                //phone:{required: true,digits: true,minlength: 10,maxlength: 10},
                //landline:{digits: true,minlength: 10,maxlength: 15},
                transfer_date :{required: true},
                source_whm_id :{required: true},
                destination_whm_id :{required: true},
				supplier_id :{required: true},
				item_id :{required: true},
				quinty :{required: true},
				
            },
            messages: {
              order_no : "order no is required.",
              transfer_date : "Select transfer_date",
              source_whm_id : "Select source_whm.",
              destination_whm_id : "Select destination.",
			  supplier_id : "Select suppliere.",
			  item_id : "Select item.",
			  quinty : "Select tansfer quantity.",
			 
            }
        });

});
</script>
<script type="text/javascript" >

// start code for source warehouse accrding to select item.
	$(document).ready(function () {
		$("#itemname").change(function () {
			//alert("ghy");
			var itemid = $('#itemname :selected').val();
			var i=0;
				$.ajax({
					url: '<?php echo base_url(); ?>admin/transferorder/ware_house_item',
					type: 'post',
					data: {item_id:itemid},
					dataType: 'json',
					success: function(json) {
						//console.log(json);
						$('#warehousename').empty();
					var selOpts = "";
					selOpts += "<option value='' selected='selected'>Select Warehouse*</option>";
					 for (i=0;i<json.length;i++)
					 {
							var id = json[i]['value'];
							var val = json[i]['name'];
						 selOpts += "<option value='"+id+"'>"+val+"</option>";
					 }
					  $('#warehousename').append(selOpts);
					//console.log(json);	
					}
	
				});
			
		});
	});
// end code for source warehouse accrding to select item.

// start code for fetching the purchase order
	$(document).ready(function () {
		$("#sub_btn").click(function () {
			var item_name = $('#itemname :selected').val();
			var warehousename = $('#warehousename :selected').val();
			var destination = $('#destination :selected').val();
		
				$.ajax({
					url: '<?php echo base_url(); ?>admin/transferorder/get_purchase_order',
					type: 'post',
					data: {item_id:item_name,warehouse_name:warehousename},
					dataType: 'json',
                    async: false,
					success: function(json) {
						//console.log(json);
                        //alert(json[0]['purchase_order']);
						$('#purchase_order_number').val(json[0]['purchase_order']);
						var ponum = json[0]['purchase_order'];
						/*var qty = $("#qty").val();
                       // window.setTimeout(function(){window.location.reload()}, 6000);
						//alert(po_type);
						if(item_name!='' && warehousename!='' && qty!='' && destination!=''){
							$.ajax({
								url: '<?php echo base_url(); ?>admin/transferorder/stock_update',
								type: 'post',
								data: {puror_num:ponum,pur_qty:qty},
								dataType: 'json',
								success: function(json) {
                                   
								}
						
							});
                        }*/
					}
			
				});
			
		});
	});
// end code for fetching the purchase order


</script>