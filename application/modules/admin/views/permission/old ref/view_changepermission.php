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
							<?php $selectrole=(!isset($databyrole))?0:$databyrole[0]['role_id'];	?>
							
							<?php 
								
						
								$findpermission=isset($databyrole)?$databyrole[0]['permission']:'';
							
									
							?>
							
							
								<?php $js = 'class="required form-control" id="roleid"'; ?>
								<?php 
										echo form_dropdown('user_role',$role,$selectrole,$js);
								?>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">Permission<span class="red_asterisk">*</span></label>
							<div class="col-sm-10">
									<?php //print_r($permissions); ?>
									<ol type='A'>
										<?php
										//print_r($permissions);
									
																		
										if(!empty($permissions) and count($permissions) > 0)
										{
											
											//pr($permissions);
											
											foreach($permissions as $val)
											{
											
											?>
											
											<li>
												<input type="checkbox" name="<?php echo $val['moduleName']; ?>[module]" value="<?php echo $val['m_id'];  ?>" class="module" id="module-<?php echo $val['m_id'];  ?>" /><?php echo ucwords($val['moduleName']); ?><br>
											<?php if(is_array($val['arr']) && (count($val['arr'])>0)) {
											
											?><ol type="i">
											
											<?php
											
											foreach($val['arr'] as 	$mvc)
											{
												
													$action=($mvc['actionName']=='index')?'Add':$mvc['actionName'];
												
												?>
													
									<?php  $modulename =Strtolower($mvc['moduleName'].'_'.$mvc['actionName']); ?>	
								<li><input type="checkbox" <?php checkuserrole($modulename,$findpermission); ?> name="<?php echo $mvc['moduleName']; ?>[<?php echo $action; ?>]" value="<?php echo $modulename; ?>" class="sub-module-<?php echo $val['m_id'];  ?>" /> <?php  echo $mvc['Label']; ?></li>
													
												
												<?php } ?>
												</ol>
												<?php  } ?>
												</li>
											
										
											<?php
											
											
											}
											
										} 
										?>
									</ol>
							</div>
						</div>
						
						<div class="form-group">
						  <label class="col-sm-2 col-sm-2 control-label"></label>
						  <div class="col-sm-10">
							  <button class="btn btn-theme custom_blue_btn"  name="save" type="submit">Save</button>
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
	
		$('.module').click(function(event) {
				var id=$(this).attr('id');
				
				 if ($('#'+id).is(':checked')) {
							$('.sub-'+id).each(function(){
							this.checked = true;
					});
				
				} else {
						$('.sub-'+id).each(function(){
						this.checked = false;
					});
				
				}
				
			});
	
		$( document ).on( 'change','#roleid', function (e,i) {
	
				$('#permission-form').submit();
			
	});
	
		// validate signup form on keyup and submit
			$("#permission-form").validate({
		});
	});
</script>