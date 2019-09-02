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
		             	<h4 class="panel-title">Edit Client</h4>
		             </div>
		             <div class="panel-body">
		             	  <?php /*?>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Banner Title</label>
                              <div class="col-sm-10">
                                  <input type="text" required class="form-control" value="<?php echo $banners[0]['title']; ?>"  name="title">
                              </div>
                          </div>
	                      <div class="form-group">
	                            <label class="col-sm-2 col-sm-2 control-label">Banner Description</label>
	                            <div class="col-sm-10">
	                              <?php 
	                                echo $this->ckeditor->editor("banner_description",$banners[0]['banner_description']);
	                              ?>
	                            </div>
	                      </div>
	                      <?php */?>
	                      <div class="form-group">
	                          <label class="col-sm-2 col-sm-2 control-label">Client Image</label>
	                          <div class="col-sm-5">
	                            <?php if(isset($clients[0]['banner_image'])){?>
	                              <img src="<?php echo base_url().$clients[0]['banner_image']; ?>" width="300" class="img_btm10">
	                              <input type="file" class="form-control" name="banner_image" >
	                              <?php }?>
                                   <span class="image_size">Image size: 1170 × 2837 px</span>
	                          </div>
	                         
	                      </div>
	                      <?php /*?>
	                      <div class="form-group">
	                            <label class="col-sm-2 col-sm-2 control-label">Banner Link</label>
	                            <div class="col-sm-10">
	                                <input type="text" class="form-control" value="<?php echo $banners[0]['banner_url']; ?>"  name="banner_url">
	                            </div>
	                      </div>
	                      <?php */?>
	                      <div class="form-group">
	                          <label class="col-sm-2 col-sm-2 control-label"></label>
	                          <div class="col-sm-10">
	                              <button class="btn btn-black btn-lg" type="submit">Save</button>
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