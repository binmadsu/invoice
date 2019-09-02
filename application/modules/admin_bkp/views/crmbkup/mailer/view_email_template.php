
<?php $this->load->view('admin/header');
$this->load->view('admin/right-sidebar');
?>
<link href="<?php echo base_url(); ?>assets/css/table-responsive.css" rel="stylesheet">
<!--middle contaen-->
 <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
    
          	<h3><i class="fa fa-angle-right"></i>Mailer Template </h3>
      
	     	<div class="row mt">
          		<div class="col-lg-12"> 
                  <div class="form-panel">
                  	  
			 <?php $attributes = array('class' => 'form-horizontal style-form input_from_custom', 'id' => 'faq-form', 'name' => 'faq-form' ,'enctype'=>'multipart/form-data' ); ?>
             <?php echo form_open('admin/email_template',$attributes); ?>
		     <?php if(validation_errors()!=''){ ?> 
		<div class="alert alert-danger">
			<?php if( isset($error)) print($error); ?>
                       <?php echo validation_errors(); ?>
        
                  </div>
			<?php } ?>
                     <h4 class="mb"><i class="fa fa-angle-right"></i> General Information</h4>
                          <div class="form-group">
						     <label class="col-sm-2 col-sm-2 control-label">Change Email Content : </label>
                              <div class="col-sm-6">
                                <?php $js = 'id="email_template_drop" class="form-control"'; ?>
								<?php echo form_dropdown('user_role',$templates,'',$js); ?>
                              </div>
                          </div>
			  
			 
				<div id="dynamic_email_content" >
                            <!---mailer content---------->
							
							
                </div>
				     
                   </form>
                  </div>
          		</div><!-- col-lg-12-->      	
          	</div><!-- /row -->
	   

		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
<!--content end-->

<?php 
$this->load->view('admin/footer');
?>
