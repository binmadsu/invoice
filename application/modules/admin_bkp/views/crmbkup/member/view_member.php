<?php $this->load->view('admin/header');
$this->load->view('admin/left-sidebar');?>

<div class="contentpanel">
  <div class="row">
    <div class="col-md-12">
            <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">Member Detail</h4>
            </div>
            <div class="panel-body">

            	<div class="table-responsive">
					<table id="tbl_results" class="table mb30">
						<thead class="cf">
						  <tr>
						      <th>Name</th>
						      <th>Email</th>
						      <!-- <th>Photo</th> -->
						      <th>Mobile</th>
						      <!-- <th>Gender</th> -->
						      <!-- <th>DOB</th> -->
						      <th>City</th>
						      <!-- <th>Hometown</th>
						      <th>Company</th> -->
						      <th>About Me</th>
						  </tr>
						</thead>
						<?php $i=0;if(!empty($row)){?>
						<tbody>
							<tr>
								<!-- <td data-title="userTypeId"><?php //echo getUserTypeById($row['userTypeId']);?></td> -->
								<td data-title="Full Name"><?php echo @$row['firstname'];?></td>
								<td data-title="Email"><?php echo @$row['email'];?></td>
								<!-- <td data-title="Photo">
									<img src='<?php //echo base_url().$row['profile_image'];?>' width='50' height='50'/>
								</td> -->
								<td data-title="Mobile"><?php echo $row['mobile'] ; ?></td>
								<td data-title="City"><?php echo $row['city'] ; ?></td>
								<td data-title="About Me"><?php $content=strip_tags($row['aboutme']); echo html_entity_decode($content); ?></td>
								<?php /*?><td data-title="Gender"><?php echo $row['gender'] ; ?></td>
								<td data-title="DOB"><?php echo date("d M Y",strtotime($row['date_of_birth']));?></td>
								<td data-title="Hometown"><?php echo $row['hometown'] ; ?></td>
								<td data-title="Company"><?php echo $row['comanyname'] ; ?></td>
								<?php */?>
							</tr>
						</tbody>
						<tfoot>
							<tr><td colspan="15"></td></tr>
							<?php }else{?>
							<tr><td colspan="15">No Row.</td></tr>
							<?php }?>
						</tfoot>
			        </table>
		   		</div>
            </div>


          </div>
      </div>
</div>
<?php $this->load->view('admin/footer');?>