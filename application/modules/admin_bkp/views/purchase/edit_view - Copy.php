<?php $this->load->view('admin/header');$this->load->view('admin/left-sidebar');?>  <script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script> <div class="contentpanel">  <div class="row">    <div class="col-md-12">			    <?php $attributes = array('class' => 'form-horizontal style-form input_from_custom', 'id' => 'banner-form', 'name' => 'banner-form','enctype'=>'multipart/form-data'); ?>                <?php echo form_open(current_url(), $attributes );?>                <div class="panel panel-default">					<?php if(validation_errors()!=''){?>						<div class="alert alert-danger">							<?php if( isset($error)) print($error);?>							<?php echo validation_errors();?>						</div>					<?php }?>	                 <div class="panel-heading">		             	<h4 class="panel-title">Edit Role</h4>		             </div>		             <div class="panel-body">							<div class="form-group">								<label class="col-sm-2 col-sm-2 control-label">Role Name</label>								<div class="col-sm-10">									<input type="text" required class="form-control" value="<?php echo @$datarows[0]['role_name']; ?>" name="role_name">								</div>							</div>							<div class="form-group">								<label class="col-sm-2 col-sm-2 control-label">Role Description</label>								<div class="col-sm-10">								<textarea class="form-control" id="description" name="description" ><?php echo @$datarows[0]['description']; ?></textarea>								</div>							</div>							<div class="form-group">								<label class="col-sm-2 col-sm-2 control-label"></label>								<div class="col-sm-10">								  <button class="btn btn-black btn-lg" type="submit">Save</button>								</div>							</div>                      </form>                  </div>          		</div><!-- col-lg-12-->          	</div><!-- /row -->		</section><!--/wrapper -->      </section><!-- /MAIN CONTENT --><!--main content end--><?php $this->load->view('admin/footer');?><script type="text/javascript" src="<?php echo base_url();?>assets/js/common/jquery.validate.js"></script><script>$(document).ready(function() {	// validate signup form on keyup and submit	$("#banner-form").validate({});});</script>