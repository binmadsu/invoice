<!--ckeditor-->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
<!--end-->


					<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">From : </label>
                              <div class="col-sm-10">
                                 <input type="text" placeholder="From" class="required form-control" size="20" id="admin_email" required="required" name="from" value="<?php echo $template_detail->from; ?>">
								<input type="hidden" name="email_id" value="<?php echo $template_detail->id; ?>" />
                              </div>
                          </div>
						  
						  
						  
					<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Subject : </label>
                              <div class="col-sm-10">
                                 <input type="text" placeholder="From" class="required form-control" size="20" id="admin_email" required="required" name="subject" value="<?php echo $template_detail->subject; ?>">
								
                              </div>
                          </div>
				  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Email Text Content : </label>
                              <div class="col-sm-10">
                                  <?php
					echo $this->ckeditor->editor("content",$template_detail->email_text_content);
							?>
                              </div>
                    </div>
						  
				 <div class="form-group">
                               <label class="col-sm-2 col-sm-2 control-label"></label>
							  <div class="col-sm-10">
							    <button type="submit" id="submit" class="btn btn-theme custom_blue_btn" data-loading-text="Loading...">Update</button>
							   </div>
                    </div>
						 
						  
	