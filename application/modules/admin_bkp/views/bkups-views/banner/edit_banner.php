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
			             	<h4 class="panel-title">Edit Slide</h4>
			             </div>
			             <div class="panel-body">
			             	  <div class="form-group">
	                          <label class="col-sm-2 col-sm-2 control-label">Banner Heading1</label>
	                          <div class="col-sm-10">
	                              <input type="text"  class="form-control" value="<?php echo  $banners[0]['heading1']; ?>"  name="heading1" >
	                          </div>
	                    </div>
	                    
	                    <div class="form-group">
	                          <label class="col-sm-2 col-sm-2 control-label">Banner Heading2</label>
	                          <div class="col-sm-10">
	                              <input type="text"  class="form-control" value="<?php echo  $banners[0]['heading2']; ?>"  name="heading2" >
	                          </div>
	                    </div>
				  
	                    <div class="form-group">
	                          <label class="col-sm-2 col-sm-2 control-label">Banner Description</label>
	                          <div class="col-sm-10">
	                            <textarea name="description" rows="2" class="form-control"><?php echo  $banners[0]['description']; ?></textarea>
	                          </div>
	                    </div>
	                    <?php /*?>
	                    <div class="form-group">
	                          <label class="col-sm-2 col-sm-2 control-label">Home Page Banner</label>
	                          <div class="col-sm-10">
	                          	<?php 
		                                $show_home = @$datarows[0]['show_home'];
		                                $data = array(
		                                  'name'          => 'show_home',
		                                  'id'            => 'show_home',
		                                  'value'         => 'yes',
		                                  'checked'       => ($show_home)?true:false,
		                                );
		                                echo form_checkbox($data);?>                            
	                          </div>
	                    </div>
	                    <?php */?>
		                  <div class="form-group">
		                      <label class="col-sm-2 col-sm-2 control-label">Banner Image</label>
		                      <div class="col-sm-10">
		                        <?php if(isset($banners[0]['banner_image'])){?>
		                          <img src="<?php echo base_url().$banners[0]['banner_image']; ?>" width="600" height="200" />
		                          <input type="file" class="form-control" name="banner_image" >
		                          <span class="image_size">Image size: 1600 × 750 px</span>
		                          <?php }?>
		                          
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