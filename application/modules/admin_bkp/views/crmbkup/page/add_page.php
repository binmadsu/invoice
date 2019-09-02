<?php $this->load->view('admin/header');
      $this->load->view('admin/left-sidebar');
?>
<div class="contentpanel">
  <div class="row">
    <div class="col-md-12">
            <?php /*?><h3><i class="fa fa-angle-right"></i> Add Page</h3><?php */?>
    			  <?php $attributes = array('class' => 'form-horizontal style-form input_from_custom', 'id' => 'page-form', 'name' => 'page-form' 
            ,'enctype'=>'multipart/form-data' ); ?>
            <?php echo form_open(current_url(), $attributes ); ?>
            <div class="panel panel-default">
    		    <?php if(validation_errors()!=''){ ?> 
      				<div class="alert alert-danger">
        			  <?php if( isset($error)) print($error); ?>
                <?php echo validation_errors(); ?>
              </div>
    		    <?php } ?>
            <div class="panel-heading">
                <h4 class="panel-title">Add Page</h4>
            </div>
            <div class="panel-body">

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Page Title<span class="red_asterisk">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Page Title" value="<?php echo  $this->input->post('page_title'); ?>" 
                        name="page_title" required />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Page Content</label>
                    <div class="col-sm-10">
                      <?php
                        echo $this->ckeditor->editor("page_content");
                      ?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Banner Text</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?php echo  $this->input->post('banner_text'); ?>"  name="banner_text" >
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Banner Image</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" value="<?php echo $this->input->post('banner_image'); ?>"  name="banner_image" >
                    </div>
                </div>
                <?php /*?>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Meta Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?php echo  $this->input->post('meta_title'); ?>"  name="meta_title" >
                    </div>
                </div>
            
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Meta Description</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?php echo  $this->input->post('meta_description'); ?>"  name="meta_description" >
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Meta keyword</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?php echo  $this->input->post('meta_keyword'); ?>"  name="meta_keyword" >
                        <span class="user-message">Seprated by comma(,)</span>
                    </div>
                </div>
                <?php */?>

            </div><!-- panel-body -->

            <div class="panel-footer">
              <div class="row">
                <div class="col-sm-9 col-sm-offset-3">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-default">Reset</button>
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