<?php $this->load->view('admin/header');
$this->load->view('admin/left-sidebar');
?>  
<div class="contentpanel">
  <div class="row">
    <div class="col-md-12">
            <?php /*?><h3><i class="fa fa-angle-right"></i> Add Page</h3><?php */?>
          <?php $attributes = array('class' => 'form-horizontal style-form input_from_custom', 'id' => 'school-form', 'name' => 'school-form' 
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
                <h4 class="panel-title">Edit Member</h4>
            </div>
            <div class="panel-body">

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Full Name<span class="red_asterisk">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Full Name" value="<?php echo $member[0]['firstname']; ?>" name="firstname" required />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Mobile<span class="red_asterisk">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Mobile" value="<?php echo $member[0]['mobile']; ?>" 
                        name="mobile" required />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Email<span class="red_asterisk">*</span></label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" placeholder="Email" value="<?php echo $member[0]['email']; ?>" 
                        name="email" required />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">City<span class="red_asterisk">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="City" value="<?php echo $member[0]['city']; ?>" 
                        name="city" required />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">About Me</label>
                    <div class="col-sm-10">
                      <textarea id='aboutme' name="aboutme" class="form-control" rows="5" placeholder="About Me"><?php echo strip_tags(@$member[0]['aboutme']);?></textarea>
                      <?php /*$aboutme = isset($member[0]['aboutme'])?$member[0]['aboutme']:'';
                        echo $this->ckeditor->editor("aboutme",$aboutme);*/?>
                    </div>
                </div>
                <?php /*?><div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Profile Image</label>
                    <div class="col-sm-10">
                         <?php if(isset($member[0]['profile_image']) and !empty($member[0]['profile_image'])){?>
                            <img src="<?php echo base_url().$member[0]['profile_image']; ?>" width="70" height="70" />
                          <?php }?>
                          <input type="file" class="form-control" name="profile_image" />
                    </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">User Type<span class="red_asterisk">*</span></label>
                  <div class="col-sm-10">
                    <?php 
                      $userTypeId = isset($member[0]['userTypeId'])?$member[0]['userTypeId']:'';
                      $form_select = '<select id="userTypeId" name="userTypeId" required data-placeholder="Select User Type" class="userTypeId select2">';
                      if (! empty($userTypes)) {
                         foreach ($userTypes as $k=>$option) {
                            $selected = ($k == $userTypeId) ? 'selected="selected"' : '';
                            $form_select .= '<option value="'.$k.'" ' . $selected . '>'.$option.'</option>';
                         }
                      }
                      $form_select .= '</select>';
                      echo $form_select;?>
                    <label class="error" for="userTypeId"></label>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Country<span class="red_asterisk">*</span></label>
                  <div class="col-sm-10">
                    <?php 
                      $country = isset($school[0]['country'])?$school[0]['country']:'';
                      $form_select = '<select id="country" name="country" required data-placeholder="Select Country" class="country select2">';
                      if (! empty($countries)) {
                         foreach ($countries as $k=>$option) {
                            $selected = ($k == $country) ? 'selected="selected"' : '';
                            $form_select .= '<option value="'.$k.'" ' . $selected . '>'.$option.'</option>';
                         }
                      }
                      $form_select .= '</select>';
                      echo $form_select;?>
                    <label class="error" for="country"></label>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">City</label>
                  <div class="col-sm-10">
                    <?php echo form_dropdown('dealer_city', $cities,'', 'class="cityid"');?>
                  </div>
                </div><?php */?>
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

  // Select2
  jQuery(".select2").select2({
     width: '100%',
     //minimumResultsForSearch: -1
  });
  // Date Picker
  jQuery('#date_of_birth').datepicker({
    changeMonth: true,
    changeYear: true,
    yearRange: '1950:2025',
  });
  /////

  jQuery("#school-form").validate({
    highlight: function(element) {
      jQuery(element).closest('.form-group').removeClass('has-success').addClass('has-error');
    },
    success: function(element) {
      jQuery(element).closest('.form-group').removeClass('has-error');
    }
  });
});
</script>