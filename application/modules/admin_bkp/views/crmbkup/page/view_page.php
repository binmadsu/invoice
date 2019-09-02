<?php $this->load->view('admin/header');
$this->load->view('admin/left-sidebar');
?>
<div class="contentpanel">

		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class='panel-title'><i class="fa"></i>Contact Details</h3>
			</div>
			<div class="panel-body">
					<?php /*?><h5 class='subtitle mb5'><i class="fa fa-angle-right"></i> Page List</h5><?php */?>
					<?php 
						echo showmsg($this->session->flashdata('msg'));
					?>
					<div class="table-responsive">
							<table id="tbl_results" class="table mb30">
							  <thead class="cf">
							      <tr>
							          <th>SL#</th>
							          <th>Title</th>
								      <th>Content</th>
								      <th><i class=" fa fa-edit"></i>Action</th>
							      </tr>
							  </thead>
							<?php 
							if(is_array($pages)){
							?>
							<?php $i=++$page;?>
							<tbody>
							<?php 
							foreach($pages as $row){ ?>
							<tr>
								<td data-title="SL#"><?php echo $i ; ?></td>
								<td data-title=""><?php echo $row['page_title'] ; ?></td>
								<td data-title=""><?php $content=strip_tags($row['page_content']); echo substr($content,0,100)." ....."; ?></td>

								<td class='table-action' data-title="Action">
									<!---edit page-->
									<a class="" href="<?php echo base_url()."admin/page/edit/".$row['id']; ?>" 
										onclick="return confirm('Are you sure you want to edit <?php echo addslashes($row['page_title']); ?>?');" title="Edit" >
										<i class="fa fa-pencil"></i></a>
									<!---end edit page-->

									<?php /*?>
									<!---status-->
									<?php  if($row['status']==1){?>
									<a href="<?php echo base_url() . "admin/page/status/".$row['id']."/0";?>" class="btn btn-success btn-xs"  title="Enable" onclick="return confirm('Are you sure you want to disable <?php $row['page_title'] ; ?>?');">
									<i class="fa fa-check"></i></a>
									<?php } else { ?>
									<a class="btn btn-warning btn-xs" href="<?php echo base_url() . "admin/page/status/".$row['id']."/1";?>"  title="Disable" onclick="return confirm('Are you sure you want to enable <?php echo $row['page_title'] ; ?>?');"> 
									<i class="fa fa-check"></i></a>
									<?php } ?> <!--end status-->
									

									<!--delete-->
									<a class="" href="<?php echo base_url() . "admin/page/delete/".$row['id'];  ?>" onclick="return confirm('Are you sure you want to remove this page?');" title="Remove">
										<i class="fa fa-trash-o "></i></a>
									<!--end delete-->
									<?php */?>
								</td>
							</tr>
							<?php $i++; } ?>
							</tbody>
							<tfoot>
							<tr>
								<td colspan="15"><div class="pagination custom_pagination"><?php echo $links; ?></div></td>
							</tr>
							<?php }else{ ?>
							<tr>
								<td colspan="15">Record not available.</td>
							</tr>
							<?php  } ?>
					        </table>
					   </div>
				</div>
			</div>
      </div>
<?php 
$this->load->view('admin/footer');
?>
<script type="text/javascript">
jQuery(document).ready(function() {
	"use strict";
	//jQuery('#tbl_results').dataTable();
});
</script>