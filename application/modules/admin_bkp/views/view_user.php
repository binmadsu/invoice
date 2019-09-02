<?php $this->load->view('admin/header');
$this->load->view('admin/dasboardheader');
?>
<link href="<?php echo base_url(); ?>assets/css/table-responsive.css" rel="stylesheet">
<!--middle contaen-->
 <!--main content start-->
      <section id="main-content">
          
          	<h3><i class="fa fa-angle-right"></i> User Management</h3>
			<?php
				echo showmsg($this->session->flashdata('msg'));
			?>
		  	<div class="row mt">
              <div class="col-lg-12">
                      <div class="content-panel">
						  <h4><i class="fa fa-angle-right"></i> Users List</h4>
                          <section id="no-more-tables">
                              <table class="table table-bordered table-striped table-condensed cf">
                                  <thead class="cf">
                                  <tr>
                                      <th>SL#</th>
                                      <th width="5%">First Name</th>
				       <th>Last Name</th>
                       <th class="numeric">Phone</th>
				       <th>Email</th>
				       <th>Username</th>
				       <th>House No.</th>
				       <th>Street</th>
				       <th>City</th>
				       <th>State</th>
<!--                                      <th class="numeric">Zip</th>-->
				       <th>Role</th>
				       <th><i class=" fa fa-edit"></i> Action</th>
                                  </tr>
                                  </thead>
				  <?php 
				
				  if(is_array($user)){ ?>
        <?php $i=++$page;?>
                                  <tbody>
				      <?php 
				 
				      foreach($user as $row){ ?>
                                  <tr>
                                      <td data-title="SL#"><?php echo $i ; ?></td>
                                      <td data-title="First Name"><?php echo $row['user_fname'] ; ?></td>
				       <td data-title="Last Name"><?php echo $row['user_lname'] ; ?></td>
                                      <td class="numeric" data-title="Phone"><?php echo $row['user_phone'] ; ?></td>
                                      <td data-title="Email"><?php echo $row['user_email'] ; ?></td>
                                      <td data-title="Username"><?php echo $row['username'] ; ?></td>
				      <td data-title="House No."><?php echo $row['house_no'] ; ?></td>				      
                                      <td data-title="Street"><?php echo $row['street'] ; ?></td>
				      <td data-title="City"><?php echo $row['city'] ; ?></td>
				      <td data-title="State"><?php echo $row['state'] ; ?></td>
<!--				      <td class="numeric" data-title="Zip"><?php echo $row['zip'] ; ?></td>-->
				      <td data-title="Role">
					  <span class="label label-info label-mini"><?php echo ($row['user_type']==0)?'Staff':'Admin'; ?></span>
				      </td>
				      <td data-title="Action">
					  <?php  if($row['user_status']){?>
					  <a href="<?php echo base_url() . "admin/user/status/".$row['user_id']."/0/".($page-1);?>" class="btn btn-success btn-xs"  title="Enable" onclick="return confirm('Are you sure you want to disable <?php echo $row['user_fname'].'&nbsp;'.$row['user_lname'] ; ?>?');">
		<i class="fa fa-check"></i>
					  </a>
            <?php } else{?>
		<a class="btn btn-warning btn-xs" href="<?php echo base_url() . "admin/user/status/".$row['user_id']."/1/".($page-1);?>"  title="Disable" onclick="return confirm('Are you sure you want to enable <?php echo $row['user_fname'].'&nbsp;'.$row['user_lname'] ; ?>?');"> 
		    <i class="fa fa-check"></i></a>
            <?php } ?>
					    
					    <a class="btn btn-primary btn-xs"  href="<?php echo base_url() . "admin/user/edit/".$row['user_id']."/".($page-1);?>" onclick="return confirm('Are you sure you want to edit <?php echo $row['user_fname'].'&nbsp;'.$row['user_lname'] ; ?>?');" title="Edit" ><i class="fa fa-pencil"></i></a>
					    <?php if($row['user_id']!=1) { $deleteUrl =  (empty($row['lock_row']))?(base_url() . "admin/user/delete/".$row['user_id']."/".($page-1)):"javascript:alert('Remove Not Allowed For ".$row['user_fname'].'&nbsp;'.$row['user_lname']."')"; ?>
					    <a class="btn btn-danger btn-xs" href="<?php echo $deleteUrl;?>" <?php if(empty($row['lock_row'])){ ?>  onclick="return confirm('Are you sure you want to remove <?php echo $row['user_fname'].'&nbsp;'.$row['user_lname'] ; ?>?');" <?php } ?> title="Remove"><i class="fa fa-trash-o "></i></a><?php  } ?>
				      </td>
                                  </tr>
				      <?php $i++; } ?>
                                  </tbody>
				  <tfoot>
        <tr>
          <td colspan="15"><div class="pagination custom_pagination"><?php
			echo $links;
		
		  ?></div>
	  </td>
        </tr>
				  <?php }else{ ?>
        <tr>
          <td colspan="15"><center>Record not available.</center></td>
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
