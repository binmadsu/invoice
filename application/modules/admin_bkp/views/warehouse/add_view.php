<?php $this->load->view('admin/header');$this->load->view('admin/dasboardheader');?>           <!-- Content Header (Page header) -->    <section class="content-header">      <h1>        <i class="fa fa-users"></i>Ware House Management        <small>Add Ware House Management </small>      </h1>    </section>    <br>    <section class="content">           <div class="row">            <!-- left column -->            <div class="col-md-8">              <!-- general form elements -->                 <div class="box box-primary">                    <div class="box-header">                        <h3 class="box-title">Add Ware House Management </h3>                    </div><!-- /.box-header -->                    <!-- form start -->                                     <form role="form" id="addUser" action="" method="post" role="form">                        <div class="box-body">						                            <div class="row">                                <div class="col-md-4">                                                                    <div class="form-group">                                        <label for="fname">Ware House Name</label>                                       <input type="text" required class="form-control" value="<?php echo  $this->input->post('name'); ?>" name="name" />                                    </div>                                    </div>																<div class="col-md-4">								<div class="form-group">									<label for="password">Company</label>									<?php $selectcompany = (!isset($companyid))?0:$companyid;?>									<?php $js = 'class="required form-control" id="companyname"'; ?>									<?php echo form_dropdown('companyname',$companies,$selectcompany,$js);?>								</div></div>															<div class="col-md-4">                                    <div class="form-group">                                        <label for="cpassword">Store Manager Name</label>                                         <input type="text" required class="form-control" value="<?php echo  $this->input->post('str_manager_name'); ?>" name="str_manager_name" />                                    </div>                                                            </div></div>							                            <div class="row">							<div class="col-md-4">                                    <div class="form-group">                                        <label for="password">Email address</label>                                         <input type="text" required class="form-control" value="<?php echo  $this->input->post('email_id'); ?>" name="email_id" />                                    </div>                                </div>								                                <div class="col-md-4">                                    <div class="form-group">                                        <label for="password">Landline</label>                                         <input type="text" class="form-control" value="<?php echo  $this->input->post('landline'); ?>" name="landline" />                                    </div>                                </div>								                                <div class="col-md-4">                                    <div class="form-group">                                        <label for="cpassword">Phone</label>                                         <input type="text" required class="form-control" value="<?php echo  $this->input->post('phone'); ?>" name="phone" />                                    </div>                                </div>                            </div>														<div class="row">                                <div class="col-md-4">                                    <div class="form-group">                                        <label for="password">Logitude</label>                                        <input type="text" class="form-control" value="<?php echo  $this->input->post('logitude'); ?>" name="logitude" />                                    </div>                                </div>								                                <div class="col-md-4">                                    <div class="form-group">                                        <label for="cpassword">Latitude</label>                                        <input type="text" class="form-control" value="<?php echo  $this->input->post('latitude'); ?>" name="latitude" />                                    </div>                                </div>																<div class="col-md-4">                                    <div class="form-group">                                        <label for="cpassword">Location</label>                                        <input type="text" required class="form-control" value="<?php echo  $this->input->post('location'); ?>" name="location" />                                    </div>                                </div>                            </div>														<div class="row">                                <div class="col-md-6">                                    <div class="form-group">                                        <label for="password">Addresss 1</label>										<br>                                        <textarea rows="3" cols="35" name="address1" ><?php echo $this->input->post('address1'); ?></textarea>                                    </div>                                </div>								                                <div class="col-md-6">                                    <div class="form-group">                                        <label for="cpassword">Addresss 2</label>										<br>                                        <textarea rows="3" cols="35" name="address2" ><?php echo $this->input->post('address2'); ?></textarea>                                    </div>                                </div>                            </div>														<div class="row">                                <div class="col-md-6">                                    <div class="form-group">                                        <label for="password">City</label>                                        <input type="text" class="form-control" value="<?php echo  $this->input->post('city'); ?>" name="city" />                                    </div>                                </div>								                                <div class="col-md-6">                                    <div class="form-group">                                        <label for="cpassword">State</label>                                         <input type="text" class="form-control" value="<?php echo  $this->input->post('state'); ?>" name="state" />                                    </div>                                </div>                            </div>																						 <div class="row">                                <div class="col-md-6">                                    <div class="form-group">                                        <label for="role">Country</label>                                         <select required class="form-control" name="country">											<option value="">Select a Country</option>											<option value="INDIA">india</option>											<option value="FRANCE">France</option>											<option value="GERMANY">Germany</option>											<option value="ITALY">Italy</option>											<option value="JAPAN">Japan</option>											<option value="RUSSIAN">Russian</option>											<option value="UNITED STATE">United State</option>											<option value="UNITED KINDOM">United Kingdom</option>											<option value="other">Other</option>									</select>                                    </div>                                </div>                                							<div class="col-md-6">                                    <div class="form-group">                                        <label for="cpassword">Notes</label>										<br>                                         <textarea class="form-control" rows="4" cols="35" name="note" ><?php echo $this->input->post('note'); ?></textarea>                                    </div>                                </div>                            </div>                      <br>                            <div class="box-footer">                            <input type="submit" class="btn btn-primary" value="Submit" />                            <input type="reset" class="btn btn-default" value="Reset" />                        </div>                    </form>                </div>            </div>            <div class="col-md-4">                <?php                    $this->load->helper('form');                    $error = $this->session->flashdata('error');                    if($error)                    {                ?>                <div class="alert alert-danger alert-dismissable">                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>                    <?php echo $this->session->flashdata('error'); ?>                                    </div>                <?php } ?>                <?php                      $success = $this->session->flashdata('success');                    if($success)                    {                ?>                <div class="alert alert-success alert-dismissable">                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>                    <?php echo $this->session->flashdata('success'); ?>                </div>                <?php } ?>                                <div class="row">                    <div class="col-md-12">                        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>                    </div>                </div>            </div>        </div>        </section>   </div>			<!--main content end-->			<?php 			$this->load->view('admin/footer');			?>			<script type="text/javascript" src="<?php echo base_url();?>assets/js/common/jquery.validate.js"></script>			<script>			$().ready(function() {			$("#user-form").validate({			});			});			</script>