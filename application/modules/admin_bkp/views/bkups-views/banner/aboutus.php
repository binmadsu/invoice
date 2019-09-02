<?php $this->load->view('admin/header');
      $this->load->view('admin/left-sidebar');
?>  
<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
 <div class="contentpanel">
  <div class="row">
    <div class="col-md-12">
			    <?php $attributes = array('class' => 'form-horizontal style-form input_from_custom', 'id' => 'banner-form', 'name' => 'banner-form','enctype'=>'multipart/form-data'); ?>
                          <?php echo form_open(current_url(), $attributes ); ?>
                	<div class="panel panel-default">
					<?php if(validation_errors()!=''){ ?> 
						<div class="alert alert-danger">
							<?php if( isset($error)) print($error); ?>
							<?php echo validation_errors(); ?>
						</div>
					<?php } ?>
						 <div class="panel-heading">
						 	<h4 class="panel-title">About Us Manage</h4>
						 </div>
						 <div class="panel-body">

						<div class="panel-body">
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">Heading</label>
							<div class="col-sm-10">
								<input type="text"  class="form-control" value="<?php echo  $banners[0]['about_heading']; ?>"  name="about_heading" >
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">Sub Heading</label>
							<div class="col-sm-10">
								<input type="text"  class="form-control" value="<?php echo  $banners[0]['about_heading2']; ?>"  name="about_heading2" >
							</div>
						</div>
						<div class="form-group">
						      <label class="col-sm-2 col-sm-2 control-label">Description</label>
						      <div class="col-sm-10">
								<?php echo $this->ckeditor->editor("about_description",$banners[0]['about_description']);?>
						      </div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">Royal Weddings</label>
							<div class="col-sm-10">
								<input type="text"  class="form-control" value="<?php echo  $banners[0]['weddings']; ?>"  name="weddings" >
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">Weddings Locations</label>
							<div class="col-sm-10">
								<input type="text"  class="form-control" value="<?php echo  $banners[0]['location']; ?>"  name="location" >
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">Guest Visited</label>
							<div class="col-sm-10">
								<input type="text"  class="form-control" value="<?php echo  $banners[0]['guests']; ?>"  name="guests" >
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
	$("#banner-form").validate({
	});
});
</script>