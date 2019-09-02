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
                <h4 class="panel-title">Add School</h4>
            </div>
            <div class="panel-body">

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Academic Type<span class="red_asterisk">*</span></label>
                  <div class="col-sm-10">
                    <?php 
                      //$current_main_parent = $current_main_parent?$current_main_parent:'';
                      $form_select = '<select name="academictype" required data-placeholder="Select Academic Type" class="academictype select2">';
                      if (! empty($academicTypes)) {
                         foreach ($academicTypes as $k=>$option) {
                            //$selected = ($k == $current_main_parent) ? 'selected="selected"' : '';
                            //$form_select .= '<option value="'.$k.'" ' . $selected . '>'.$option.'</option>';
                            $form_select .= '<option value="'.$k.'">'.$option.'</option>';
                         }
                      }
                      $form_select .= '</select>';
                      echo $form_select;?>
                     <label class="error" for="academictype"></label>
                  </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">School Name<span class="red_asterisk">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="School Name" value="<?php echo  $this->input->post('school_name'); ?>" 
                        name="school_name" required />
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">School Address Line</label>
                    <div class="col-sm-10">
                      <textarea name='address_line' rows="5" class="form-control" placeholder="Type Address Line.."><?php echo $this->input->post('address_line'); ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Road No./Gali No.</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Road No./Gali No." value="<?php echo $this->input->post('road_no'); ?>" 
                        name="road_no" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Landmark</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Landmark" value="<?php echo  $this->input->post('landmark'); ?>" 
                        name="landmark" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Locality</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Locality" value="<?php echo  $this->input->post('locality'); ?>" 
                        name="locality" />
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Disst / City<span class="red_asterisk">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Disst / City" value="<?php echo  $this->input->post('district'); ?>" 
                        name="district" required />
                    </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">State<span class="red_asterisk">*</span></label>
                  <div class="col-sm-10">
                    <?php 
                      //$current_main_parent = $current_main_parent?$current_main_parent:'';
                      $form_select = '<select id="state" name="state" required data-placeholder="Select State" class="state select2">';
                      if (! empty($states)) {
                         foreach ($states as $k=>$option) {
                            //$selected = ($k == $current_main_parent) ? 'selected="selected"' : '';
                            //$form_select .= '<option value="'.$k.'" ' . $selected . '>'.$option.'</option>';
                            $form_select .= '<option value="'.$k.'">'.$option.'</option>';
                         }
                      }
                      $form_select .= '</select>';
                      echo $form_select;?>
                    <label class="error" for="state"></label>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Country<span class="red_asterisk">*</span></label>
                  <div class="col-sm-10">
                    <?php 
                      //$current_main_parent = $current_main_parent?$current_main_parent:'';
                      $form_select = '<select id="country" name="country" required data-placeholder="Select Country" class="country select2">';
                      if (! empty($countries)) {
                         foreach ($countries as $k=>$option) {
                            //$selected = ($k == $current_main_parent) ? 'selected="selected"' : '';
                            //$form_select .= '<option value="'.$k.'" ' . $selected . '>'.$option.'</option>';
                            $form_select .= '<option value="'.$k.'">'.$option.'</option>';
                         }
                      }
                      $form_select .= '</select>';
                      echo $form_select;?>
                    <label class="error" for="country"></label>
                  </div>
                </div>
                <?php /*?><div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">City</label>
                  <div class="col-sm-10">
                    <?php echo form_dropdown('dealer_city', $cities,'', 'class="cityid"');?>
                  </div>
                </div><?php */?>

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Pincode<span class="red_asterisk">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Pincode" value="<?php echo  $this->input->post('pincode'); ?>" 
                        name="pincode" required />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Contact No.<span class="red_asterisk">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Contact No." value="<?php echo  $this->input->post('contact_no'); ?>" 
                        name="contact_no" required />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Email<span class="red_asterisk">*</span></label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" placeholder="Email" value="<?php echo  $this->input->post('email'); ?>" 
                        name="email" required />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Established On</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="established_on" name="established_on"
                             value="<?php echo $this->input->post('established_on'); ?>">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Currently Active<span class="red_asterisk">*</span></label>
                  <div class="col-sm-10">
                    <?php 
                      $arrActive = array('' => '',0 => 'No',1 => 'Yes');
                      //$current_main_parent = $current_main_parent?$current_main_parent:'';
                      $form_select = '<select name="currently_active" required data-placeholder="Is Active" class="currently_active select2">';
                      if (! empty($arrActive)) {
                         foreach ($arrActive as $k=>$option) {
                            //$selected = ($k == $current_main_parent) ? 'selected="selected"' : '';
                            //$form_select .= '<option value="'.$k.'" ' . $selected . '>'.$option.'</option>';
                            $form_select .= '<option value="'.$k.'">'.$option.'</option>';
                         }
                      }
                      $form_select .= '</select>';
                      echo $form_select;?>
                    <label class="error" for="currently_active"></label>
                  </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Class<span class="red_asterisk">*</span></label>
                    <div class="col-sm-10">
                      <?php 
                      $arrClasses[''] = '';
                      for ($x = 1; $x <= 12; $x++) {
                        $arrClasses[] = $x;
                      }
                      $form_select = '<select name="classname" required data-placeholder="Select Class" class="classname select2">';
                      if (! empty($arrClasses)) {
                         foreach ($arrClasses as $k=>$option) {
                            $form_select .= '<option value="'.$k.'">'.$option.'</option>';
                         }
                      }
                      $form_select .= '</select>';
                      echo $form_select;?>
                      <label class="error" for="classname"></label>
                      <?php /* ?><input type="text" required class="form-control" placeholder="Class" value="<?php echo  $this->input->post('classname'); ?>" 
                        name="classname" ><?php */?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Board<span class="red_asterisk">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" required class="form-control" placeholder="Board" value="<?php echo  $this->input->post('board'); ?>" 
                        name="board" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Type<span class="red_asterisk">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" required class="form-control" placeholder="Type" value="<?php echo  $this->input->post('type'); ?>" 
                        name="type" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">About School</label>
                    <div class="col-sm-10">
                      <?php
                        echo $this->ckeditor->editor("school_description");
                      ?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">School Logo</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" value="<?php echo $this->input->post('school_logo'); ?>" name="school_logo">
                    </div>
                </div>

                <div class="form-group school_gallery">
                  <label class="col-sm-2 col-sm-2 control-label">School Image(s)</label>
                  <div class="col-sm-10">

                      <div class="repeater">
                        <div data-repeater-list="school_gallery">
                          <?php if( $school_gallery!='0' and  sizeof($school_gallery) > 0){
                                  foreach($school_gallery as $k=>$arrField){
                                    if($arrField['gallery_image'] != ''){ ?>
                                <div data-repeater-item>
                                  <input type="file" class="form-control" id="categoryimage_<?php echo $k;?>" 
                                         name="school_gallery[<?php echo $k;?>][gallery_image]" value="<?php echo $arrField['gallery_image'];?>">
                                  <input data-repeater-delete type="button" value="Delete" />
                                </div>
                              <?php 
                                  }}
                              }else{?>
                                <div data-repeater-item>
                                  <input type="file" class="form-control" name="gallery_image" value="" />
                                  <input data-repeater-delete type="button" value="Delete"/>
                                </div>
                          <?php }?>
                        </div>
                        <input data-repeater-create type="button" value="Add"/>
                      </div>

                  </div>
                </div>

                <?php /*?>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Meta Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?php echo  $this->input->post('meta_title'); ?>" name="meta_title" >
                    </div>
                </div>
            
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Meta Description</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?php echo  $this->input->post('meta_description'); ?>" name="meta_description" >
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Meta keyword</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?php echo  $this->input->post('meta_keyword'); ?>" name="meta_keyword" >
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
<script type="text/javascript" src="<?php echo base_url();?>assets/admin/js/jquery.repeater.min.js"></script>
<script type="text/javascript">
jQuery(document).ready(function(){
    // Select2
    jQuery(".select2").select2({
      width: '100%'
    });
    // Date Picker
    jQuery('#established_on').datepicker({
      changeMonth: true,
      changeYear: true,
      yearRange: '1850:2025',
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
    // Repeater
    $('.repeater').repeater({
        show: function () {
            $(this).slideDown();
        },
        hide: function (deleteElement) {
            if(confirm('Are you sure you want to delete this element?')) {
                $(this).slideUp(deleteElement);
            }
        },
        ready: function (setIndexes){}
    });
    //
    $("#country").change(function(){
      var countryval=$(this).val();
      $.ajax({
            type:"POST",
            async:false,
            url: '<?php echo base_url(); ?>admin/registerschool/getstate',
            data: {id:countryval},
            success: function(output){
              $('#state').empty();
              var arroutput = JSON.parse(output);
              //console.log(arroutput);
              var $select = $('#state');
              //$('<option>').val('').text('Select State').appendTo($select);
              $.each(arroutput, function(key, value) {    
                $('<option>').val(key).text(value).appendTo($select);
              });
            }
      });
  });
  /*
  $("#state").change(function(){
      var stateval=$(this).val();
      $.ajax({
            type:"POST",
            async:false,
            url: '<?php echo base_url(); ?>admin/dealer/getcity',
            data: {id:stateval},
            success: function(output){
              $('#city').empty();
              var arroutput = JSON.parse(output);
              //console.log(arroutput);
              var $select = $('#city');
              //$('<option>').val('').text('Select City').appendTo($select);
              $.each(arroutput, function(key, value) {    
                $('<option>').val(key).text(value).appendTo($select);
              });
            }
      });
  }); */
    /////
});
</script>