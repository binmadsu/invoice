<?php $this->load->view('admin/header');
$this->load->view('admin/left-sidebar');
?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
<div class="contentpanel">
  <div class="row">
    <div class="col-md-12">
			  <?php $attributes = array('class' => 'form-horizontal style-form input_from_custom', 'id' => 'banner-form', 'name' => 'banner-form' ,'enctype'=>'multipart/form-data' ); ?>
        <?php echo form_open(current_url(), $attributes ); ?>
        <div class="panel panel-default">
		      <?php if(validation_errors()!=''){?>
            <div class="alert alert-danger">
            <?php if( isset($error)) print($error);?>
              <?php echo validation_errors();?>
            </div>
          <?php } ?>
            <div class="panel-heading">
              <h4 class="panel-title"><?php if(isset($pages[0]['id'])){?>Edit<?php }else{?>Add<?php }?> Partner</h4>
            </div>
                <div class="panel-body">
                  <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Partner Image</label>
                      <div class="col-sm-10">
                          <?php if(isset($pages[0]['banner_image'])){?>
                            <img src="<?php echo base_url().$pages[0]['banner_image']; ?>" width="160" height="55" />
                          <?php }?>
                          <input type="file" <?php if(isset($pages[0]['id'])){?><?php }else{?>required<?php }?> class="form-control" value="<?php echo $this->input->post('banner_image'); ?>"  name="banner_image">
                      </div>
                  </div>
                </div><!-- panel-body -->

                <div class="panel-footer">
                  <div class="row">
                    <div class="col-sm-9 col-sm-offset-3">
                      <button type="submit" class="btn btn-primary">Submit</button>
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
<script type="text/javascript" src="<?php echo base_url();?>assets/js/common/jquery.validate.js"></script>
<script>
  $().ready(function() {
  	$("#banner-form").validate({});
  });
</script>