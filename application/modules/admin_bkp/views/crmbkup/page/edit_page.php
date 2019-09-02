<?php $this->load->view('admin/header');
$this->load->view('admin/left-sidebar');?>
<div class="contentpanel">
  <div class="row">
    <div class="col-md-12">
			  <?php /*?><h3><i class="fa fa-angle-right"></i> Add Page</h3><?php */?>
            <?php $attributes = array('class' => 'form-horizontal style-form input_from_custom', 'id' => 'page-form', 'name' => 'page-form' ,'enctype'=>'multipart/form-data' );?>
            <?php echo form_open(current_url(), $attributes );?>
            <div class="panel panel-default">
            <?php if(validation_errors()!=''){?>
              <div class="alert alert-danger">
                <?php if( isset($error)) print($error);?>
                <?php echo validation_errors();?>
              </div>
            <?php }?>
            <div class="panel-heading">
                <h4 class="panel-title">General Information</h4>
            </div>
            <div class="panel-body">

                          <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Page Title<span class="red_asterisk">*</span></label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" placeholder="Page Title" value="<?php echo $pages[0]['page_title']; ?>" name="page_title" required />
                            </div>
                          </div>

                          <?php if(@$pages[0]['page_slug'] == 'contact-us'){?>
                          <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Google Map Code</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="<?php echo @$pages[0]['gmapurl'];?>"  name="gmapurl" >
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Contact</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="<?php echo @$pages[0]['mobile'];?>"  name="mobile" >
                            </div>
                          </div>
                          <?php }?>

                          <?php if(@$pages[0]['page_slug'] == 'about-us'){?>
                          <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Sub Title 1</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="<?php echo @$pages[0]['subtitle2'];?>"  name="subtitle2" >
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Sub Title 2</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="<?php echo @$pages[0]['subtitle3'];?>"  name="subtitle3" >
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Image</label>
                            <div class="col-sm-10">
                              <?php if(isset($pages[0]['banner_image'])){?>
                                <img src="<?php echo base_url().$pages[0]['banner_image']; ?>" width="300" height="200" />
                              <?php }?>
                              <input type="file" class="form-control" name="banner_image">
                              <span class="image_size">Image size: 263 × 59 px</span>
                            </div>
                          </div>
                          <?php }?>
                          <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Page Content</label>
                            <div class="col-sm-10">
                              <?php echo $this->ckeditor->editor("page_content",$pages[0]['page_content']);?>
                            </div>
                          </div>
                          <?php /*?>
                          <div class="form-group">
                          <label class="col-sm-2 col-sm-2 control-label">Banner Text</label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control" value="<?php echo @$pages[0]['banner_text'];?>"  name="banner_text" >
                          </div>
                          </div>

                          <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Banner Image</label>
                            <div class="col-sm-10">
                              <?php if(isset($pages[0]['banner_image'])){?>
                                <img src="<?php echo base_url().$pages[0]['banner_image']; ?>" width="263" height="59" />
                              <?php }?>
                              <input type="file" class="form-control" name="banner_image">
                              <span class="image_size">Image size: 263 × 59 px</span>
                            </div>
                          </div>
                          <?php */?>
                          
                       </div><!-- panel-body -->

            <div class="panel-footer">
              <div class="row">
                <div class="col-sm-9 col-sm-offset-3">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </div>
            </div>

            </div>
            </form>


          </div>
      </div>
</div>
<?php 
  $this->load->view('admin/footer');
?>
<script type="text/javascript">
jQuery(document).ready(function(){
  jQuery("#page-form").validate({
    highlight: function(element) {
      jQuery(element).closest('.form-group').removeClass('has-success').addClass('has-error');
    },
    success: function(element) {
      jQuery(element).closest('.form-group').removeClass('has-error');
    }
  });
});
</script>