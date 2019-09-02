<?php 
$this->load->view('admin/header');
$this->load->view('admin/dasboardheader');
?>
       
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i>Users Management       
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
                        <h3 class="box-title">Add New User </h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    
                 <form role="form" id="company" action="" method="post" role="form">
                        <div class="box-body">
						
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">User name</label>
                                       <input type="text"  class="form-control" value="<?php echo  $this->input->post('username'); ?>" name="username" />
                                    </div>
                                    </div>
                                
                               <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                         <input type="password"  class="form-control" value="<?php echo  $this->input->post('password'); ?>" name="password" />
                                    </div>
                                </div>
                            </div>
							
                            <div class="row" style="display:none;">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">Company</label>
                                       <input type="text" class="form-control" value="<?php echo  $this->input->post('company'); ?>" name="company"  />
                                    </div>
                                </div>
								
                                 <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="role">Department</label>
                                         <select  class="form-control" name="depeartment">
											<option value="">Select a Department</option>
											<option value="Nextra Developer">Nextra Developer</option>
											<option value="IT Depeartment">IT Depeartment</option>
											<option value="Marketing">Marketing</option>
											<option value="Sales">Sales</option>
											<option value="Nextraone">Nextraone</option>
											<option value="RA">RA</option>
											<option value="Finance">Finance</option>
											<option value="other">Other</option>
									</select>
                                    </div>
                            </div></div>
							
							<div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">First Name</label>
                                        <input type="text" class="form-control" value="<?php echo  $this->input->post('first_name'); ?>" name="first_name"  />
                                    </div>
                                </div>
								
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cpassword">Last Name</label>
                                        <input type="text" class="form-control" value="<?php echo  $this->input->post('last_name'); ?>" name="last_name" />
                                    </div>
                                </div>
                            </div>
							
							<div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">Email</label>
                                         <input type="text" class="form-control" value="<?php echo  $this->input->post('email'); ?>" name="email" />
                                    </div>
                                </div>
								
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">Mobile Phone</label>
                                        <input type="text" class="form-control" value="<?php echo  $this->input->post('mobile_no'); ?>" name="mobile_no" />
                                    </div>
                                </div>
								</div>
							
							<div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="password">Address</label>
                                      <textarea class="form-control" rows="2" cols="35" name="address" ><?php echo $this->input->post('address'); ?></textarea>
                                    </div>
                                </div>
								
								<div class="col-md-3">
                                    <div class="form-group">
                                        <label for="role">Country</label>
                                          <?php 
                                          //$current_main_parent = $current_main_parent?$current_main_parent:'';
                                          $form_select = '<select id="country" name="country" class="country form-control">';
                                          if (! empty($countries)) {
                                             foreach ($countries as $k=>$option) {
                                                //$selected = ($k == $current_main_parent) ? 'selected="selected"' : '';
                                                //$form_select .= '<option value="'.$k.'" ' . $selected . '>'.$option.'</option>';
                                                $form_select .= '<option value="'.$k.'">'.$option.'</option>';
                                             }
                                          }
                                          $form_select .= '</select>';
                                          echo $form_select;?>
                                    </div>
                                </div>    
								
								  <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="password">State</label>
                                          <?php 
                                          $form_select = '<select id="state" name="state" class="state form-control">';
                                          $form_select .= '<option value="">Select State</option>';
                                          $form_select .= '</select>';
                                          echo $form_select;?>
                                    </div>
                                </div>
								
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="cpassword">City</label>
                                          <?php 
                                          $form_select = '<select id="city" name="city" class="city form-control">';
                                          $form_select .= '<option value="">Select City</option>';
                                          $form_select .= '</select>';
                                          echo $form_select;?>
                                    </div>
                                </div>
								</div>
								
								 <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cpassword">Pin Code</label>
                                         <input type="text" class="form-control" value="<?php echo  $this->input->post('pincode'); ?>" name="pincode" />
                                    </div>
                                </div>
                            
							    <div class="col-md-6" style="display:none;">
                                    <div class="form-group">
									<label for="password">Role</label>
									<?php $selectrole = (!isset($roleid))?0:$roleid;?>
									<?php $js = 'class="required form-control" id="rolename"'; ?>
									<?php echo form_dropdown('rolename',$rolename,$selectrole,$js);?>
								</div>
                            </div></div>
                      <br>
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Submit" />
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
    $("#company").validate({
            rules: {
                username :{required: true},
				company :{required: true},
				password :{required: true},
                email :{required: true,email: true},
                mobile_no:{required: true,digits: true,minlength: 10,maxlength: 10},
                country :{required: true},
                city :{required: true},
                state :{required: true},
				pincode :{required: true},
            },
            messages: {
              username : " User Name is required.",
			  Password : " Password is required.",
              mobile_no: {
                required: "Please enter your mobile.",
                digits: "Please enter digits."
              },
              email : "Please enter a valid email address.",
              country : "Select Country.",
			  company : "Select Company.",
              city : "Select City.",
              state : "Select State.",
			  pincode : "Select Pin Code.",
            }
        });
		
		
	  $("#country").change(function(){
            var stateval=$(this).val();
            $.ajax({
                type:"POST",
                async:false,
                url: '<?php echo base_url(); ?>ajax/getstate',
                data: {id:stateval},
                success: function(output){
                  $('#state').empty();
                  var arroutput = JSON.parse(output);
                  //console.log(arroutput);
                  var $select = $('#state');
                  $('<option>').val('').text('Select State').appendTo($select);
                  $.each(arroutput, function(key, value) {
                    if(key){
                        $('<option>').val(key).text(value).appendTo($select);
                    }
                  });
                }
            });

        });

        $("#state").change(function(){
            var stateval=$(this).val();
            $.ajax({
                type:"POST",
                async:false,
                url: '<?php echo base_url(); ?>ajax/getcity',
                data: {id:stateval},
                success: function(output){
                  $('#city').empty();
                  var arroutput = JSON.parse(output);
                  //console.log(arroutput);
                  var $select = $('#city');
                  $('<option>').val('').text('Select City').appendTo($select);
                  $.each(arroutput, function(key, value) {
                    if(key){
                        $('<option>').val(key).text(value).appendTo($select);
                    }
                  });
                }
            });

        });

});
</script>