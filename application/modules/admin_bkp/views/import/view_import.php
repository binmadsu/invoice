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
            <div class="panel-heading">
                <h4 class="panel-title">Import School</h4>
            </div>
            <div class="panel-body">
            <?php if(isset($error) and $error!=''){
                //if(validation_errors()!=''){?>
                <div class="alert alert-danger">
                    <?php echo $error;//if( isset($error)) print($error); ?>
                    <?php //echo validation_errors(); ?>
                </div>
            <?php }
            if($this->session->flashdata('error')){?>
                <div class="alert alert-danger">
                    <?php echo $this->session->flashdata('error'); ?>
                </div>
            <?php } ?>
            <?php if($this->session->flashdata('success')){?>
                <div class="alert alert-success">
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
            <?php } ?>
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Choose a File</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" value="" name="filepath">
                </div>
            </div>

            </div><!-- panel-body -->

            <div class="panel-footer">
              <div class="row">
                <div class="col-sm-9 col-sm-offset-3">
                  <button type="submit" class="btn btn-primary">Upload</button>
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