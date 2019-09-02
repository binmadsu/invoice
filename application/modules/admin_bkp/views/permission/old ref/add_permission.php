<?php $this->load->view('admin/header');
      $this->load->view('admin/right-sidebar');
?>  

 <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Add User Permissions</h3>
          	
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12"> 
                  <div class="form-panel">
							<?php $attributes = array('class' => 'form-horizontal style-form input_from_custom', 'id' => 'permission-form', 'name' => 'feedback-form'); ?>
							<?php echo form_open(current_url(), $attributes ); ?>
							<?php if(validation_errors()!=''){ ?>
							<div class="alert alert-danger">
							<?php if( isset($error)) print($error); ?>
							   <?php echo validation_errors(); ?>
							</div>
						<?php } ?>
						 <h4 class="mb"><i class="fa fa-angle-right"></i> General Information</h4>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Select Module<span class="red_asterisk">*</span></label>
								<div class="col-sm-10">
									<?php $js = 'class="required form-control"'; ?>
									<?php 
									//pr($modulelist);
										//echo form_dropdown('user_role',$role,$this->input->post('user_role'),$js);
										echo form_dropdown('module_id',$module,1,$js);
									?>
								</div>
							</div>
						
						  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Module Name<span class="red_asterisk">*</span></label>
                              <div class="col-sm-10">
                                  <input type="text" class="required form-control" value="<?php echo  $this->input->post('module_name'); ?>"  name="module_name" >
                              </div>
                          </div>
											
						  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Controller Name<span class="red_asterisk">*</span></label>
                              <div class="col-sm-10">
                                  <input type="text" class="required form-control" value="<?php echo  $this->input->post('controller_name'); ?>"  name="controller_name" >
                              </div>
                          </div>
												
						  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Action Name<span class="red_asterisk">*</span></label>
                              <div class="col-sm-10">
                                  <input type="text" class="required form-control" value="<?php echo  $this->input->post('method_name'); ?>"  name="method_name" >
                              </div>
                          </div>
										
						<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Description<span class="red_asterisk">*</span></label>
                              <div class="col-sm-10">
                                  <input type="text" class="required form-control" value="<?php echo  $this->input->post('desc'); ?>"  name="desc" >
                              </div>
                          </div>
																				
						<div class="form-group">
						  <label class="col-sm-2 col-sm-2 control-label"></label>
						  <div class="col-sm-10">
							  <button class="btn btn-theme custom_blue_btn" type="submit">Save</button>
						  </div>
						</div>
                      </form>
                  </div>
          		</div><!-- col-lg-12-->      	
          	</div><!-- /row -->
          
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->


<!--main content end-->
<?php 
	$this->load->view('admin/footer');
?>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/common/jquery.validate.js"></script>
<script>
	$().ready(function() {
		// validate signup form on keyup and submit
			$("#permission-form").validate({
		});
	});
</script>