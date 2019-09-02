<?php $this->load->view('admin/header');$this->load->view('admin/dasboardheader');?>      <style type="text/css">#accountForm {    margin-top: 25px;	}ul.nav.nav-tabs.tab-border {    background-color: #3c8dbc;}.nav>li.disabled>a {    color: #fcfcfc;}.box-footer {    border-top-left-radius: 0;    border-top-right-radius: 0;    border-bottom-right-radius: 3px;    border-bottom-left-radius: 3px;    border-top: 1px solid #3c8dbc;    padding: 10px;    background-color: #ccdcea;}.form-control {    border-radius: 0px !important;    box-shadow: none;    border-color: #99999991;}</style>     <!-- Content Header (Page header) -->    <section class="content-header">      <h1>        <i class="fa fa-users"></i>Tranfer Order        <small>Edit Tranfer Order </small>      </h1>    </section>    <br>    <section class="content">           <div class="row">            <!-- left column -->            <div class="col-md-8">              <!-- general form elements -->                 <div class="box box-primary">                    <div class="box-header">                        <h3 class="box-title">Edit Tranfer Order </h3>                    </div><!-- /.box-header -->                    <!-- form start -->                                        <form role="form" id="transfer" action="" method="post" role="form">                        <div class="box-body">						                            <div class="row">                                <div class="col-md-4">                                                                    <div class="form-group">                                        <label for="fname">Transfer Order</label>                                       <input type="text" class="form-control" value="<?php echo   @$datarows[0]['purchase_order']; ?>" name="purchase_order" />                                    </div>                                    </div>                                                               <div class="col-md-4">                                    <div class="form-group">                                        <label for="password">Date</label>                                         <input type="date" class="form-control" value="<?php echo   @$datarows[0]['purchase_date']; ?>" name="purchase_date" />                                    </div>                                </div>																<div class="col-md-4">                                    <div class="form-group">                                        <label for="cpassword">Reason </label>                                        <textarea class="form-control" rows="3" cols="30" name="reason" ><?php echo   @$datarows[0]['reason']; ?></textarea>                                    </div>                                </div>                            </div>							                            <div class="row">                                 <div class="col-md-6">										<div class="form-group">											 <label for="role">Source Warehouse</label>												<?php $selectwarehose = (!isset($datarows[0]['warehouse_id']))?0:$datarows[0]['warehouse_id'];?>												<?php $js = 'class="required form-control" id="warehousename"'; ?>												<?php echo form_dropdown('warehousename',$warehousename,$selectwarehose,$js);?>										</div>				                    </div>								                                 <div class="col-md-6">										<div class="form-group">											 <label for="role">Destination Warehouse</label>										<?php $selectwarehose = (!isset($datarows[0]['destination_whm_id']))?0:$datarows[0]['destination_whm_id'];?>										<?php $js = 'class="required form-control" id="destination"'; ?>										<?php echo form_dropdown('destination',$destination,$selectwarehose,$js);?>								        </div>				                    </div>                            </div>														<div class="row">                                <div class="col-md-6">                                    <div class="form-group">                                        <label for="password">Supplier Name</label>											<?php $selectsupplier = (!isset($datarows[0]['supplier_id']))?0:$datarows[0]['supplier_id'];?>											<?php $js = 'class="required form-control" id="suppliername"'; ?>											<?php echo form_dropdown('suppliername',$suppliername,$selectsupplier,$js);?>                                    </div>                                </div>								                                <div class="col-md-6">                                    <div class="form-group">                                        <label for="cpassword">Item Name</label>										<?php $selectitem = (!isset($datarows[0]['item_id']))?0:$datarows[0]['item_id'];?>										<?php $js = 'class="required form-control" id="itemname"'; ?>										<?php echo form_dropdown('itemname',$itemname,$selectitem,$js);?>                                    </div>                                </div>                            </div>														<div class="row">                                <div class="col-md-6">                                    <div class="form-group">                                        <label for="cpassword">Transfer Quantity</label>                                        <input type="text"  class="form-control" value="<?php echo   @$datarows[0]['quinty']; ?>" name="quinty" />                                    </div>                                </div> </div>																                      <br>                            <div class="box-footer">                            <input type="submit" class="btn btn-primary" value="Submit" />                            <input type="reset" class="btn btn-default" value="Reset" />                        </div>                    </form>                </div>            </div>            <div class="col-md-4">                <?php                    $this->load->helper('form');                    $error = $this->session->flashdata('error');                    if($error)                    {                ?>                <div class="alert alert-danger alert-dismissable">                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>                    <?php echo $this->session->flashdata('error'); ?>                                    </div>                <?php } ?>                <?php                      $success = $this->session->flashdata('success');                    if($success)                    {                ?>                <div class="alert alert-success alert-dismissable">                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>                    <?php echo $this->session->flashdata('success'); ?>                </div>                <?php } ?>                                <div class="row">                    <div class="col-md-12">                        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>                    </div>                </div>            </div>        </div>        </section>   </div>			<!--main content end-->			<?php 			$this->load->view('admin/footer');			?>			<script type="text/javascript" src="<?php echo base_url();?>assets/admin/js/jquery.validate.min.js"></script><script>$(document).ready(function() {    $("#transfer").validate({            rules: {                order_no :{required: true},                //email_id :{required: true,email: true},                //phone:{required: true,digits: true,minlength: 10,maxlength: 10},                //landline:{digits: true,minlength: 10,maxlength: 15},                transfer_date :{required: true},                source_whm_id :{required: true},                destination_whm_id :{required: true},				supplier_id :{required: true},				item_id :{required: true},				tansfer_qty :{required: true},				            },            messages: {              order_no : "order no is required.",              transfer_date : "Select transfer_date",              source_whm_id : "Select source_whm.",              destination_whm_id : "Select destination.",			  supplier_id : "Select suppliere.",			  item_id : "Select item.",			  tansfer_qty : "Select tansfer qtye.",			             }        });});</script>