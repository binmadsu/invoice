<?php $this->load->view('admin/header');$this->load->view('admin/dasboardheader');?>    <style type="text/css">#accountForm {    margin-top: 25px;	}ul.nav.nav-tabs.tab-border {    background-color: #3c8dbc;}.nav>li.disabled>a {    color: #fcfcfc;}.box-footer {    border-top-left-radius: 0;    border-top-right-radius: 0;    border-bottom-right-radius: 3px;    border-bottom-left-radius: 3px;    border-top: 1px solid #3c8dbc;    padding: 10px;    background-color: #ccdcea;}.form-control {    border-radius: 0px !important;    box-shadow: none;    border-color: #99999991;}</style>       <!-- Content Header (Page header) -->    <section class="content-header">      <h1>        <i class="fa fa-users"></i>Item Management             </h1>    </section>    <br>    <section class="content">           <div class="row">            <!-- left column -->            <div class="col-md-8">              <!-- general form elements -->                 <div class="box box-primary">                    <div class="box-header">                        <h3 class="box-title">Edit Item </h3>                    </div><!-- /.box-header -->                    <!-- form start -->                                     <form role="form" id="item" action="" method="post" role="form" enctype="multipart/form-data">                        <div class="box-body">						                            <div class="row">                                <div class="col-md-6">                                                                    <div class="form-group">                                        <label for="fname">Item Name</label>                                       <input type="text" class="form-control" value="<?php echo @$datarows[0]['item_name']; ?>" name="item_name" />                                    </div>                                    </div>                                                               <div class="col-md-6">                                    <div class="form-group">                                        <label for="password">Item Code</label>                                         <input type="text" class="form-control" value="<?php echo @$datarows[0]['item_code']; ?>" name="item_code" />                                    </div>                                </div>                            </div>													<div class="row">                                <div class="col-md-4">                                    <div class="form-group">                                        <label for="password">SKU</label>                                        <input type="text" class="form-control" value="<?php echo @$datarows[0]['sku']; ?>" name="sku" />                                    </div>                                </div>								                                <div class="col-md-4">                                    <div class="form-group">                                        <label for="cpassword">Item Price</label>                                        <input type="text" class="form-control" value="<?php echo @$datarows[0]['item_price']; ?>" name="item_price" />                                    </div>                                </div>																<div class="col-md-4">                                    <div class="form-group">                                        <label for="cpassword">Manufacturer</label>                                        <input type="text" class="form-control" value="<?php echo @$datarows[0]['manufacturer']; ?>" name="manufacturer" />										                                    </div>                                </div>                            </div>														<div class="row">                                <div class="col-md-4">                                    <div class="form-group">                                        <label for="password">Brand</label>                                        <input type="text" class="form-control" value="<?php echo @$datarows[0]['brand']; ?>" name="brand" />                                    </div>                                </div>																<div class="col-md-4">                                    <div class="form-group">                                        <label for="password">Serial No.</label>                                        <input type="text" class="form-control" value="<?php echo @$datarows[0]['serial_no']; ?>" name="serial_no" />                                    </div>                                </div>								                                <div class="col-md-4">                                    <div class="form-group">                                        <label for="cpassword">MPN</label>                                        <input type="text" class="form-control" value="<?php echo @$datarows[0]['mpn']; ?>" name="mpn" />                                    </div>                                </div>                            </div>																					<div class="row">                                <div class="col-md-4">                                    <div class="form-group">                                        <label for="password">Minimum Quantity</label>                                        <input type="text" class="form-control" value="<?php echo @$datarows[0]['minimum_quantity']; ?>" name="minimum_quantity" />                                    </div>                                </div>																<div class="col-md-4">                                    <div class="form-group">                                        <label for="password">Minimum Threshold</label>                                        <input type="text" class="form-control" value="<?php echo @$datarows[0]['minimum_threshold']; ?>" name="minimum_threshold" />                                    </div>                                </div>																<div class="col-md-4">                                    <div class="form-group">                                        <label for="password">Warranty</label>                                        <input type="text" class="form-control" value="<?php echo @$datarows[0]['warranty']; ?>" name="warranty" />                                    </div>                                </div>									                                <div class="col-md-4">                                    <div class="form-group">                                        <label for="cpassword">Distription</label>                                         <textarea class="form-control" rows="2" cols="25" name="distription" ><?php echo @$datarows[0]['distription']; ?></textarea>                                    </div>                                </div>                            </div>																					  <!--<div class="row">                                <div class="col-md-6">                                    <div class="form-group">									<label for="password">Ware House Name</label>									<?php $selectwarehose = (!isset($datarows[0]['whm_id']))?0:$datarows[0]['whm_id'];?>									<?php $js = 'class="required form-control" id="warehousename"'; ?>									<?php echo form_dropdown('warehousename',$warehousename,$selectwarehose,$js);?>								</div>                                </div>                                							<!--<div class="col-md-6">                                    <div class="form-group">                                        <label for="cpassword">Quantity</label>                                        <input type="text" class="form-control" value=" <?php /* echo   @$datarows[0]['quinty']; */ ?>" name="quinty" />                                    </div>                                </div>                            </div>														<div class="row">                                <div class="col-md-6">                                                                    <div class="form-group">                                        <label for="fname">Received Date</label>                                       <input type="date" class="form-control" value="<?php /* echo   @$datarows[0]['recive_date']; */ ?>" name="recive_date" />                                    </div>                                    </div>                                                               <div class="col-md-6">                                    <div class="form-group">                                        <label for="password">Status</label>                                         <input type="text" class="form-control"value="<?php echo   @$datarows[0]['status']; ?>" name="status" />                                    </div>                                </div>                            </div>														<div class="row">                               <div class="col-md-6">                                                                    <div class="form-group">                                        <label for="fname">Rates</label>                                       <input type="text" class="form-control" value="<?php /* echo   @$datarows[0]['rate'];  */?>" name="rate" />                                    </div>                                    </div>                                                               <div class="col-md-6">                                    <div class="form-group">                                        <label for="password">Discount</label>                                         <input type="text" class="form-control"value="<?php echo   @$datarows[0]['discount']; ?>" name="discount" />                                    </div>                                </div>                            </div>--->														 <div class="row">							 <div class="col-md-4">                                    <div class="form-group">                                        <label for="cpassword">Notes</label>                                         <textarea class="form-control" rows="3" cols="30" name="note" ><?php echo  @$datarows[0]['note']; ?></textarea>                                    </div>                                </div>								                                <div class="col-md-4">                                    <div class="form-group">									<label for="password">Item Category</label>									<?php $Selectitem = (!isset($datarows[0]['item_id']))?0:$datarows[0]['item_id'];?>									<?php $js = 'class="required form-control" id="itemname"'; ?>									<?php echo form_dropdown('itemname',$itemname,$Selectitem,$js);?>							   </div>							</div>					                             <div class="form-group">								<label class="control-label col-sm-2">Item Upload Pic:</label>								<div class="col-xs-3">								<img src="<?php echo base_url().@$datarows[0]['image_upload']; ?>" width="100" height="100" />								<input type="file"  class="form-control" value="<?php echo  @$datarows[0]['profilepic']; ?>"  name="profilepic" >								</div>							</div>	                            </div>													  						  					                                                       <!--- <div class="col-md-4">                                <div class="form-group">									<label for="password">Supplier Name</label>									<?php /* $SelectSupplier = (!isset($datarows[0]['supplier_id']))?0:$datarows[0]['supplier_id'];?>									<?php $js = 'class="required form-control" id="suppliername"'; ?>									<?php echo form_dropdown('suppliername',$suppliername,$SelectSupplier,$js); */?>								</div>                                </div>--->   							                              							                      <br>                        <div class="box-footer">                            <input type="submit" class="btn btn-primary" value="Submit" />                            <input type="reset" class="btn btn-default" value="Reset" />                        </div>                    </form>                </div>            </div>            <div class="col-md-4">                <?php                    $this->load->helper('form');                    $error = $this->session->flashdata('error');                    if($error)                    {                ?>                <div class="alert alert-danger alert-dismissable">                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>                    <?php echo $this->session->flashdata('error'); ?>                                    </div>                <?php } ?>                <?php                      $success = $this->session->flashdata('success');                    if($success)                    {                ?>                <div class="alert alert-success alert-dismissable">                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>                    <?php echo $this->session->flashdata('success'); ?>                </div>                <?php } ?>                                <div class="row">                    <div class="col-md-12">                        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>                    </div>                </div>            </div>        </div>        </section>   </div>			<!--main content end-->			<?php 			$this->load->view('admin/footer');			?>			<script type="text/javascript" src="<?php echo base_url();?>assets/admin/js/jquery.validate.min.js"></script><script>$(document).ready(function() {    $("#item").validate({            rules: {                item_name :{required: true},                //email_id :{required: true,email: true},                //phone:{required: true,digits: true,minlength: 10,maxlength: 10},                //landline:{digits: true,minlength: 10,maxlength: 15},                sku :{required: true},                item_price :{required: true},                whm_id :{required: true},				mpn :{required: true},				supplier_id :{required: true},				image_upload :{required: true},				            },            messages: {              item_name : "item_name Name is required.",             // phone: {               // required: "Please enter your mobile.",               // digits: "Please enter digits."             // },              //landline: {               // required: "Please enter your landline.",               // digits: "Please enter digits."             // },             // email_id : "Please enter a valid email address.",              sku : "Select sku.",              item_price : "Select item price.",              whm_id : "Select whm.",			  mpn : "Select mpn.",			  supplier_id : "Select supplier.",              image_upload : "Select image_upload.",            }        });});</script>