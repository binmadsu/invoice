<?php $this->load->view('admin/header');
	  $this->load->view('admin/right-sidebar');
?>
 <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Set User Permissions</h3>
          	
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12"> 
                  <div class="form-panel">
							<?php $attributes = array('class' => 'form-horizontal style-form input_from_custom', 'id' => 'permission-form', 'name' => 'permission-form'); ?>
							<?php echo form_open(current_url(), $attributes ); ?>
							<?php if(validation_errors()!=''){ ?>
							<div class="alert alert-danger">
							<?php if( isset($error)) print($error); ?>
							   <?php echo validation_errors(); ?>
							</div>
						<?php } ?>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">Role<span class="red_asterisk">*</span></label>
							<div class="col-sm-10">
							<?php	?>
							
								<?php $js = 'class="required form-control"'; ?>
								<?php 
									//echo form_dropdown('user_role',$role,$this->input->post('user_role'),$js);
									echo form_dropdown('user_role',$role,1,$js);
								?>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">Permission<span class="red_asterisk">*</span></label>
							<div class="col-sm-10">
									<?php //print_r($permissions); ?>
									<ol type='A'>
										<?php
										
									
																		
										if(!empty($permissions) and count($permissions) > 0)
										{
											
											foreach($permissions as $val)
											{
											
											?>
											
											<li>
												<input type="checkbox" name="<?php echo $val['m_id'];  ?>" value="" /><?php echo $val['moduleName']; ?><br>
											<?php if(is_array($val['arr']) && (count($val['arr'])>0)) {
											
											?> <ol>
											
											<?php

											foreach($val['arr'] as 	$mvc)
											{
												
													
													//echo $mvc['moduleName'];
													//echo $mvc['Label'];
													//echo $mvc['controllerName'];
													//echo $mvc['actionName'];
													//echo $mvc['m_id'];
													
												
												?>
													
													
														<li><input type="checkbox" name="<?php echo $mvc['moduleName']; ?>" value="" /> <?php  echo $mvc['Label']; ?></li>
													
												
												<?php } ?>
												</ol>
												<?php  } ?>
												</li>
											
										
											<?php
											
												//echo $val['m_id'];
												//pr($val);
											}
											
											
											
											/*for($i=1;$i<=count($permissions);$i++)
											{
											
												foreach($permissions[$i] as $val)
												{
												
													
												
												?>
												
												<li>
												<input type="checkbox" name="<?php  ?>" value="" /><?php //echo $moduleName; ?><br>
													<ol>
														<li><input type="checkbox" name="<?php //echo $moduleName; ?>" value="" /> <?php // echo $Label; ?></li>
													</ol>
												</li>
												
												<?php
												
												
												}
												
											}*/

											//pr($permissions);
												
												
											
											/*foreach($permissions as $mvc)
											{
												
												foreach($mvc as $key => $value){
													
													echo $key.' : '.$value.'</br>';
													$m_id = 0;
													$moduleName = $Label = $controllerName = $actionName = '';
													if($key == 'm_id')
														$m_id = $value;
													if($key == 'moduleName')
														$moduleName = $value;
													if($key == 'Label')
														$Label = $value;
													if($key == 'controllerName')
														$controllerName = $value;
													if($key == 'actionName')
														$actionName = $value;
														
													echo 'key-'.$m_id.'moduleName-'.$moduleName;
														
										?>
												
										<?php
										} // mvc loop
												
												
												
												
										}*/

										} ?>
									</ol>
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
          
		</section><!--/wrapper -->
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