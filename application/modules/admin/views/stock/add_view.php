<?php 
$this->load->view('admin/header');
$this->load->view('admin/dasboardheader');
//echo current_url();exit;

?>
       
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i>Stock Management       
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
                        <h3 class="box-title">Add New Stock </h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    
                 <form role="form" id="addUser" action="" method="post" role="form">
                        <div class="box-body">
						
                            <div class="row">
                               <div class="col-md-6">
								<div class="form-group">
									<label for="password">Vendor</label>
									<?php $selectvendor = (!isset($vendorid))?0:$vendorid;?>
									<?php $js = 'class="required form-control" id="supplier"'; ?>
									<?php echo form_dropdown('supplier',$supplier,$selectvendor,$js);?>
								</div>
                            </div>
                                
                               <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">Location</label>
                                         <input type="text" class="form-control" value="<?php echo  $this->input->post('location'); ?>" name="location"  />
                                    </div>
                                </div>
                            </div>
							
							<div class="row">
                               <div class="col-md-6">
								<div class="form-group">
									<label for="password">Item</label>
									<?php $selectitem = (!isset($itemid))?0:$itemid;?>
									<?php $js = 'class="required form-control" id="itemname"'; ?>
									<?php echo form_dropdown('itemname',$itemname,$selectvendor,$js);?>
								</div>
                            </div>
								
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cpassword">Serial No</label>
                                        <input type="text" class="form-control" value="<?php echo  $this->input->post('serial_no'); ?>" name="serial_no" />
                                    </div>
                                </div>
                            </div>
							
							<div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">Mac</label>
                                         <input type="text" required class="form-control" value="<?php echo  $this->input->post('mac'); ?>" name="mac" />
                                    </div>
                                </div>
								
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">Status</label>
                                        <input type="text" class="form-control" value="<?php echo  $this->input->post('status'); ?>" name="status" />
                                    </div>
                                </div>
								</div>
							
							
                            <div class="row">
							<div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cpassword">Notes</label>
                                         <textarea class="form-control" rows="4" cols="50" name="comments" ><?php echo $this->input->post('comments'); ?></textarea>
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
			<script type="text/javascript" src="<?php echo base_url();?>assets/js/common/jquery.validate.js"></script>
			<script>
			$().ready(function() {

			$("#user-form").validate({

			});
			});
			</script>
