<?php $this->load->view('admin/header');
     $this->load->view('admin/dasboardheader');
?>  

 <!--main content start-->
      <section id="main-content">
         
          	<h3><i class="fa fa-angle-right"></i> Update Profile</h3>
          	
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">
                   <div class="form-panel"> 
                  	  
			  <?php $attributes = array('class' => 'form-horizontal style-form input_from_custom', 'id' => 'user-form', 'name' => 'user-form'); ?>
                         <?php echo form_open('admin/user/update_profile/', $attributes ); ?>
		      <?php if(validation_errors()!=''){ ?> 
		<div class="alert alert-danger">
			<?php if( isset($error)) print($error); ?>
                       <?php echo validation_errors(); ?>
                  </div>
		<?php } ?>
		<?php if(isset($msg)){ echo'<div style="color:green">'.$msg.'</div>';}?>
                     <h4 class="mb"><i class="fa fa-angle-right"></i> General Information</h4>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">First Name<span class="red_asterisk">*</span></label>
                              <div class="col-sm-10">
                                  <input type="text" class="required form-control" value="<?php echo  $user[0]['user_fname']; ?>"  name="user_fname" >
                              </div>
                          </div>
			  
			  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Last Name</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" value="<?php echo  $user[0]['user_lname']; ?>"  name="user_lname" >
                              </div>
                          </div>
			  
			  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Email Address<span class="red_asterisk">*</span></label>
                              <div class="col-sm-10">
                                  <input class="required form-control" name="user_email" type="email" maxlength="80" size="30" value="<?php echo $user[0]['user_email']; ?>" >
                              </div>
                          </div>
			  
			  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">User Name<span class="red_asterisk">*</span></label>
                              <div class="col-sm-10">
                                  <input type="text" class="required form-control" value="<?php echo  $user[0]['username']; ?>"  name="username" >
                              </div>
                          </div>
			  
			  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Password<span class="red_asterisk">*</span></label>
                              <div class="col-sm-10">
                                  <input type="text" class="required form-control" value="<?php echo  $user[0]['org_password']; ?>"  name="user_password" >
                              </div>
                          </div>
		     
		        <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Phone</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" value="<?php echo  $user[0]['user_phone']; ?>"  name="user_phone" >
                              </div>
                          </div>
		     
		     
			  <h4 class="mb"><i class="fa fa-angle-right"></i> Address</h4>
			  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">House no.</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" value="<?php echo  $user[0]['house_no']; ?>"  name="house_no" >
                              </div>
                          </div>
			  
			  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Street</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" value="<?php echo  $user[0]['street']; ?>"  name="street" >
                              </div>
                          </div>
			  
			  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">State</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" value="<?php echo $user[0]['state']; ?>"  name="state" >
                              </div>
                          </div>
			  
			  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">City</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" value="<?php echo  $user[0]['city']; ?>"  name="city" >
                              </div>
                          </div>
			  
			  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Zip</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" value="<?php echo  $user[0]['zip']; ?>"  name="zip" >
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
	$("#user-form").validate({
	});
});
</script>