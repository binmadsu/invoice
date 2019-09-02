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
          <?php if(validation_errors()!=''){?>
            <div class="alert alert-danger">
              <?php if( isset($error)) print($error);?>
              <?php echo validation_errors();?>
            </div>
          <?php } ?>
          <div class="panel-heading">
            <h4 class="panel-title">USP Manage</h4>
          </div>
          <div class="panel-body">
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">USP1</label>
                </div>
		             <div class="panel-body">
		             	  <div class="form-group">
                          <label class="col-sm-2 col-sm-2 control-label">USP Heading1</label>
                          <div class="col-sm-10">
                              <input type="text"  class="form-control" value="<?php echo  $banners[0]['heading11']; ?>"  name="heading11" >
                          </div>
                    </div>
                    <div class="form-group">
                          <label class="col-sm-2 col-sm-2 control-label">USP Heading2</label>
                          <div class="col-sm-10">
                              <input type="text"  class="form-control" value="<?php echo  $banners[0]['heading12']; ?>"  name="heading12" >
                          </div>
                    </div>
			  
                    <div class="form-group">
                          <label class="col-sm-2 col-sm-2 control-label">Text1</label>
                          <div class="col-sm-10">
                            <input type="text"  class="form-control" value="<?php echo  $banners[0]['text11']; ?>"  name="text11" >
                          </div>
                    </div>
                    <div class="form-group">
                          <label class="col-sm-2 col-sm-2 control-label">Text2</label>
                          <div class="col-sm-10">
                            <input type="text"  class="form-control" value="<?php echo  $banners[0]['text12']; ?>"  name="text12" >
                          </div>
                    </div>
                    <div class="form-group">
                          <label class="col-sm-2 col-sm-2 control-label">Text3</label>
                          <div class="col-sm-10">
                            <input type="text"  class="form-control" value="<?php echo  $banners[0]['text13']; ?>"  name="text13" >
                          </div>
                    </div>
                    <div class="form-group">
                          <label class="col-sm-2 col-sm-2 control-label">Text4</label>
                          <div class="col-sm-10">
                           <input type="text"  class="form-control" value="<?php echo  $banners[0]['text14']; ?>"  name="text14" >
                          </div>
                    </div>
                    
                    <div class="form-group">
                          <label class="col-sm-2 col-sm-2 control-label">USP2</label>
                    </div>
		             <div class="panel-body">
		             	  <div class="form-group">
                          <label class="col-sm-2 col-sm-2 control-label">USP Heading1</label>
                          <div class="col-sm-10">
                              <input type="text"  class="form-control" value="<?php echo  $banners[0]['heading21']; ?>"  name="heading21" >
                          </div>
                    </div>
                    <div class="form-group">
                          <label class="col-sm-2 col-sm-2 control-label">USP Heading2</label>
                          <div class="col-sm-10">
                              <input type="text"  class="form-control" value="<?php echo  $banners[0]['heading22']; ?>"  name="heading22" >
                          </div>
                    </div>
			  
                    <div class="form-group">
                          <label class="col-sm-2 col-sm-2 control-label">Text1</label>
                          <div class="col-sm-10">
                            <input type="text"  class="form-control" value="<?php echo  $banners[0]['text21']; ?>"  name="text21" >
                          </div>
                    </div>
                    <div class="form-group">
                          <label class="col-sm-2 col-sm-2 control-label">Text2</label>
                          <div class="col-sm-10">
                            <input type="text"  class="form-control" value="<?php echo  $banners[0]['text22']; ?>"  name="text22" >
                          </div>
                    </div>
                    <div class="form-group">
                          <label class="col-sm-2 col-sm-2 control-label">Text3</label>
                          <div class="col-sm-10">
                            <input type="text"  class="form-control" value="<?php echo  $banners[0]['text23']; ?>"  name="text23" >
                          </div>
                    </div>
                    <div class="form-group">
                          <label class="col-sm-2 col-sm-2 control-label">Text4</label>
                          <div class="col-sm-10">
                           <input type="text"  class="form-control" value="<?php echo  $banners[0]['text24']; ?>"  name="text24" >
                          </div>
                    </div>
                    
                    <div class="form-group">
                          <label class="col-sm-2 col-sm-2 control-label">USP3</label>
                    </div>
		             <div class="panel-body">
		             	  <div class="form-group">
                          <label class="col-sm-2 col-sm-2 control-label">USP Heading1</label>
                          <div class="col-sm-10">
                              <input type="text"  class="form-control" value="<?php echo  $banners[0]['heading31']; ?>"  name="heading31" >
                          </div>
                    </div>
                    <div class="form-group">
                          <label class="col-sm-2 col-sm-2 control-label">USP Heading2</label>
                          <div class="col-sm-10">
                              <input type="text"  class="form-control" value="<?php echo  $banners[0]['heading32']; ?>"  name="heading32" >
                          </div>
                    </div>
			  
                    <div class="form-group">
                          <label class="col-sm-2 col-sm-2 control-label">Text1</label>
                          <div class="col-sm-10">
                            <input type="text"  class="form-control" value="<?php echo  $banners[0]['text31']; ?>"  name="text31" >
                          </div>
                    </div>
                    <div class="form-group">
                          <label class="col-sm-2 col-sm-2 control-label">Text2</label>
                          <div class="col-sm-10">
                            <input type="text"  class="form-control" value="<?php echo  $banners[0]['text32']; ?>"  name="text32" >
                          </div>
                    </div>
                    <div class="form-group">
                          <label class="col-sm-2 col-sm-2 control-label">Text3</label>
                          <div class="col-sm-10">
                            <input type="text"  class="form-control" value="<?php echo  $banners[0]['text33']; ?>"  name="text33" >
                          </div>
                    </div>
                    <div class="form-group">
                          <label class="col-sm-2 col-sm-2 control-label">Text4</label>
                          <div class="col-sm-10">
                           <input type="text"  class="form-control" value="<?php echo  $banners[0]['text34']; ?>"  name="text34" >
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