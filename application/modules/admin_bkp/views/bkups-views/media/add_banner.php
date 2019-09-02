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
		      <?php if(validation_errors()!=''){ ?>
            <div class="alert alert-danger">
            <?php if( isset($error)) print($error); ?>
                 <?php echo validation_errors(); ?>
            </div>
          <?php } ?>
            <div class="panel-heading">
              <h4 class="panel-title">Add Press Image</h4>
            </div>
            <div class="panel-body">
                    <?php /*?>
                    <div class="form-group">
                          <label class="col-sm-2 col-sm-2 control-label">Banner Title</label>
                          <div class="col-sm-10">
                              <input type="text" required class="form-control" value="<?php echo  $this->input->post('title'); ?>"  name="title" >
                          </div>
                    </div>
			  
                    <div class="form-group">
                          <label class="col-sm-2 col-sm-2 control-label">Banner Description</label>
                          <div class="col-sm-10">
                            <?php
                              echo $this->ckeditor->editor("banner_description");
                            ?>
                          </div>
                    </div>
                    <?php */?>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Image</label>
                        <div class="col-sm-5">
                            <input type="file" required class="form-control" value="<?php echo $this->input->post('banner_image'); ?>"  name="banner_image" >
                            <span class="image_size">Image size: 1100 × 715 px</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Priority</label>
                        <div class="col-sm-5">
                            <input type="text" id='priority' style='width: 50px' maxlength="3" class="form-control" value="<?php echo $priority ?>"  name="priority" >
                        </div>
                    </div>
                    <?php /*?>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Banner Link</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="<?php echo  $this->input->post('banner_url'); ?>"  name="banner_url" >
                        </div>
                    </div>
                    <?php */?>
                  </div><!-- panel-body -->

                  <div class="panel-footer">
                    <div class="row">
                      <div class="col-sm-9 col-sm-offset-2">
                        <button type="submit" class="btn btn-black btn-lg">Submit</button>
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
  	$("#banner-form").validate({
        rules: {
          priority: {
            required: true,
            digits: true
          }
        }
    });
  });
</script>