<?php $this->load->view('admin/header');
$this->load->view('admin/right-sidebar');
?>
<link href="<?php echo base_url(); ?>assets/css/table-responsive.css" rel="stylesheet">
<!--middle contaen-->
 <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Module Management</h3>
			<?php
				echo showmsg($this->session->flashdata('msg'));
			?>
		  	<div class="row mt">
              <div class="col-lg-12">
                      <div class="content-panel">
						  <h4><i class="fa fa-angle-right"></i> Module List</h4>
                          <section id="no-more-tables">
                              <table class="table table-bordered table-striped table-condensed cf">
                                  <thead class="cf">
                                  <tr>
                                   <th>SL#</th>
								    <th>Module Name</th>
                 			       <th><i class=" fa fa-edit"></i> Action</th>
                                  </tr>
                                  </thead>
				  <?php 
				
				
					//pr($module);
				
				  if(is_array($module)){

			
				  ?>
				  
        <?php $i=++$page;?>
                                  <tbody>
				      <?php 
				 
				      foreach($module as $row){ ?>
                                  <tr>
                                      <td data-title="SL#"><?php echo $i ; ?></td>
                                      <td data-title="First Name"><?php echo $row['m_name'] ; ?></td>
                               
						<td data-title="Email">
						<!---edit page---->
						<a class="btn btn-primary btn-xs"  href="<?php echo base_url() . "admin/module/edit/".$row['m_id']; ?>" onclick="return confirm('Are you sure you want to edit <?php echo $row['m_name'] ; ?>?');" title="Edit" ><i class="fa fa-pencil"></i></a>
						<!---end edit page---->
						<!----delete------>
						<a class="btn btn-danger btn-xs" href="<?php echo base_url() . "admin/module/delete/".$row['m_id'];  ?>" onclick="return confirm('Are you sure you want to remove this zipcode?');" title="Remove"><i class="fa fa-trash-o "></i></a>
						<!----end delete------>
						</td>
                                  </tr>
				      <?php $i++; } ?>
                                  </tbody>
				  <tfoot>
        <tr>
          <td colspan="15"><div class="pagination custom_pagination"><?php //echo $links; ?></div>
	  </td>
        </tr>
				  <?php }else{ ?>
        <tr>
          <td colspan="15">Record not available.</td>
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
