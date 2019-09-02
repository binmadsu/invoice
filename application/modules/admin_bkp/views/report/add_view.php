<?php $this->load->view('admin/header');$this->load->view('admin/dasboardheader');?>           <!-- Content Header (Page header) -->    <section class="content-header">      <h1>        <i class="fa fa-bank"></i> Inventory Transaction Report         </h1>    </section>	<div class="col-xs-8 text-right">			<div class="form-group">				<a class="btn btn-primary" href="<?php echo base_url(); ?>admin/report/listing"><i class="fa fa-bank"></i> Report list</a>			</div>		</div>	    <br>    <section class="content">           <div class="row">            <!-- left column -->            <div class="col-md-8">              <!-- general form elements -->                 <div class="box box-primary">                    <div class="box-header">                        <h3 class="box-title">Inventory Transaction Report </h3>                    </div><!-- /.box-header -->                    <!-- form start -->                                     <form role="form" id="company" action="" method="post" role="form">                        <div class="box-body">						                           <div class="row">                                <div class="col-md-3">                                    <div class="form-group">									<label for="password">Company Name</label>									<?php $selectcompany = (!isset($companyid))?0:$companyid;?>									<?php $js = 'class="required form-control" id="companyname"'; ?>									<?php echo form_dropdown('companyname',$companies,$selectcompany,$js);?>								</div></div>                                                                <div class="col-md-3">                                    <div class="form-group">									<label for="password">Ware House Name</label>									<?php $selectwarehose = (!isset($warehoseid))?0:$warehoseid;?>									<?php $js = 'class="required form-control" id="warehousename"'; ?>									<?php echo form_dropdown('warehousename',$warehousename,$selectwarehose,$js);?>								</div></div>                           							                             <div class="col-md-3">                                    <div class="form-group">                                        <label for="password">From Date</label>                                        <input type="date" class="form-control" value="" name="contact_person"  />                                    </div>                                </div>								                                <div class="col-md-3">                                    <div class="form-group">                                        <label for="cpassword">To Date</label>                                        <input type="date" class="form-control" value="" name="phone" />                                    </div>                                </div>                            </div></div>				                      <br>                        <div class="box-footer">                            <input type="submit" class="btn btn-primary" value="Search" />                        </div>                    </form>                </div>            </div>            <div class="col-md-4">                <?php                    $this->load->helper('form');                    $error = $this->session->flashdata('error');                    if($error)                    {                ?>                <div class="alert alert-danger alert-dismissable">                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>                    <?php echo $this->session->flashdata('error'); ?>                                    </div>                <?php } ?>                <?php                      $success = $this->session->flashdata('success');                    if($success)                    {                ?>                <div class="alert alert-success alert-dismissable">                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>                    <?php echo $this->session->flashdata('success'); ?>                </div>                <?php } ?>                                <div class="row">                    <div class="col-md-12">                        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>                    </div>                </div>            </div>        </div>        </section>   </div><!--main content end--><?php $this->load->view('admin/footer');?><script type="text/javascript" src="<?php echo base_url();?>assets/admin/js/jquery.validate.min.js"></script><script>$(document).ready(function() {    $("#company").validate({            rules: {                company_name :{required: true},              },            messages: {              company_name : " Company Name is required.",            }        });});</script>