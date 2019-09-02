<?php $this->load->view('admin/header');
$this->load->view('admin/right-sidebar');
?>
<link href="<?php echo base_url(); ?>assets/css/table-responsive.css" rel="stylesheet">
<!--middle contaen-->
 <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Feedback Management</h3>
			<?php
				echo showmsg($this->session->flashdata('msg'));
			?>
		  	<div class="row mt">
              <div class="col-lg-12">
                      <div class="content-panel">
						  <h4><i class="fa fa-angle-right"></i> Feedback List</h4>
						  
				<section id="no-more-tables">
				  <table class="table table-bordered table-striped table-condensed cf">
					<thead class="cf">
					  <tr>
                      <th>SL#</th>
                     <th>Module Name</th>
						  <th>Controller Name</th>
						   <th>Action Name</th>
					    <th>Description</th>
                      <th><i class=" fa fa-edit"></i> Action</th>
                      </tr>
                      </thead>
				  
                  
				  <?php 
				
				
				  if(!empty($capability)){

			
				  ?>
				 
				  
				  
				<?php $i=++$page;?>
                                  <tbody>
				      <?php 
				 
				      foreach($capability as $row){ ?>
					 					  
                                  <tr>
                                      <td data-title="SL#"><?php echo $i ; ?></td>
                      
				       <td data-title="Last Name"><?php echo $row['c_name'] ; ?></td>
                        <td data-title="First Name"><?php echo $row['c_controller_name'] ; 	?></td>  
						<td data-title="First Name"><?php echo $row['c_function'] ;	?></td>
						<td data-title="First Name"><?php echo $row['c_description'] ;	?></td>
							<td data-title="Email">
							<!---edit page---->
							<a class="btn btn-primary btn-xs"  href="<?php echo base_url() . "admin/userpermission/editpermission/".$row['c_id']; ?>" onclick="return confirm('Are you sure you want to edit <?php echo $row['c_id'] ; ?>?');" title="Edit" ><i class="fa fa-pencil"></i></a>
							<!---end edit page---->
							
							<!----delete------>
							<a class="btn btn-danger btn-xs" href="<?php echo base_url() . "admin/userpermission/delete/".$row['c_id'];  ?>" onclick="return confirm('Are you sure you want to remove this module?');" title="Remove"><i class="fa fa-trash-o "></i></a>
							<!----end delete------>
							</td>
							</tr>
				      <?php $i++; } ?>
                                  </tbody>
				  <tfoot>
        <tr>
          <td colspan="15"><div class="pagination custom_pagination"><?php echo $links; ?></div>
	  </td>
        </tr>     
		
				  <?php }else{ ?>
       <tr>
          <td colspan="15">  <center>Record not available.</center> </td>
        </tr>     
        <?php  } ?>
                
			</table>				
                          </section>
                      </div><!-- /content-panel -->
                  </div><!-- /col-lg-12 -->
              </div><!-- /row -->

		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->


<!--content end-->
<?php 
$this->load->view('admin/footer');
?>
