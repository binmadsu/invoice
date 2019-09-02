<?php 
$this->load->view('admin/header');
$this->load->view('admin/dasboardheader');
$item_id = $this->input->get('item'); 
$warehouse = $this->input->get('ware'); 

if (strpos($details_transfer[0]['purchase_order'], 'TO') !== false) {
    $qty = $details_transfer[0]['quinty'];
} else{
    $qty = 0;
}
if (strpos($details_transfer[0]['purchase_order'], 'PO') !== false) {
    $invoice = $details_transfer[0]['invoice_no'];
} else{
    $invoice = 0;
}
//echo "<pre>"; print_r($details_transfer);
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
        <i class="fa fa-users"></i>Received Stock Management       
      </h1>
    </section>
    <br>
    <section class="content">
   
        <div class="row">
		
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements --> 
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Received New Stock </h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                 <form role="form" id="recived" action="" method="post" role="form">
                        <div class="box-body">					 
                            <div class="row">
                               <div class="col-md-6">
								<div class="form-group">
                                <input type="hidden" value="<?php echo $item_id ?>" id="pr_item_id" />
                                <input type="hidden" value="<?php echo $warehouse ?>" id="pr_ware_id" />
									<label for="password">Accept Date</label>
									<input type="date" id="accept-date"  class="form-control" value="<?php echo  $this->input->post('Accepte_date'); ?>" name="Accepte_date"  />
								</div>
                            </div>
                                
                               <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">Quantity</label>
                                        <?php if($qty!=0){ ?>
                                            <input type="text" id="rec_qty" class="form-control" value="<?php echo  $qty; ?>" name="quantity" readonly />
                                        <?php } else { ?>
                                            <input type="text" id="rec_qty" class="form-control" value="<?php echo  $this->input->post('quantity'); ?>" name="quantity"  />
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
							
							<div class="row">
                               <div class="col-md-6">
								<div class="form-group">
									<label for="password">Gate No.</label>
									<input type="text" id="gate_no" class="form-control" value="<?php echo  $this->input->post('gate_no'); ?>" name="gate_no"  />
								</div>
                            </div>
								
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cpassword">Challan No.</label>
                                        <input type="text" id="challan_no" class="form-control" value="<?php echo  $this->input->post('challan_no'); ?>" name="challan_no" />
                                    </div>
                                </div>
                            </div>
							
							<div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">Handover To</label>
                                         <input type="text" id="hand_over" class="form-control" value="<?php echo  $this->input->post('handover_to'); ?>" name="handover_to" />
                                    </div></div>
                                
								<?php if($invoice!=0){ ?>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">Invoice No.</label>
                                        <input type="text" id="rect_no" class="form-control" value="<?php echo  $invoice; ?>" name="recipt_no" />
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
				           <input type="hidden" name="purchase_id" id="po" value="<?php echo @$purchase_id; ?>" />
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
    $("#recived").validate({
            rules: {
                Accepte_date :{required: true},
                quantity :{required: true},
                handover_to :{required: true},
                purchase_id :{required: true},
				recipt_no :{required: true},
				purchase_date :{required: true},
				
            },
            messages: {
              Accepte_date : "Accept date is required.",
              quantity : "Select Quantity",
              handover_to : "Select handover to.",
              purchase_id : "Select purchase.",
			  recipt_no : "Select recipt no.",
			  purchase_date : "Select purchase_date.",
			  
            }
        });

});
</script>
<script type="text/javascript" >
	
		$("#sub_btn").click(function () {
			//alert("ghy");
			var purchase_id = $("#po").val();
			var accceptdate = $("#accept-date").val();
			var recv_qty = $("#rec_qty").val();
			var gate_no = $("#gate_no").val();
			var challan_no = $("#challan_no").val();
			var hand_over = $("#hand_over").val();
			var rec_no = $("#rect_no").val();
			
			if(accceptdate!='' && recv_qty!='' && hand_over!=''){
				$.ajax({
					url: '<?php echo base_url(); ?>admin/recivedstock/recive_log',
					type: 'post',
					data: {	
							pur_id		:purchase_id,
							accceptdate	:accceptdate,
							recv_qty	:recv_qty,
							gate_no		:gate_no,
							challan_no	:challan_no,
							hand_over	:hand_over,
							rec_no		:rec_no
							},
					dataType: 'json',
					success: function(json) {
						

							
						}

									
				});

                var item_name = $('#pr_item_id').val();
                var warehousename = $('#pr_ware_id').val();
                           
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
                            //var qty = $("#qty").val();
                        // window.setTimeout(function(){window.location.reload()}, 6000);
                            //alert(po_type);
                           
                                $.ajax({
                                    url: '<?php echo base_url(); ?>admin/transferorder/stock_update',
                                    type: 'post',
                                    data: {puror_num:ponum,pur_qty:recv_qty},
                                    dataType: 'json',
                                    success: function(json) {
                                    
                                    }
                            
                                });
                            
                        }
                
                    });
			}
			
		});
	
</script>