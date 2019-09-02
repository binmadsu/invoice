<?php $this->load->view('admin/header');
$this->load->view('admin/left-sidebar');
?>
<div class="contentpanel">

<div class="panel panel-default">
<div class="panel-heading">
	<h3 class='panel-title'><i class="fa"></i>Member List</h3>
</div>
<div class="panel-body">
		<?php /*?><h5 class='subtitle mb5'><i class="fa fa-angle-right"></i> Page List</h5><?php */?>
		<div class="sn_search_container">
		    <?php $attributes = array('class' => 'form-horizontal style-form input_from_custom', 'id' => 'search-form', 
				'name' => 'search-form' ,'enctype'=>'multipart/form-data' ); ?>
              	<?php echo form_open(base_url().'admin/members/listing', $attributes ); ?>
                <?php /*
                if(validation_errors()!=''){ ?> 
                  <div class="alert alert-danger">
                    <?php if( isset($error)) print($error); ?>
                    <?php echo validation_errors(); ?>
                  </div>
                <?php } */?>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="row">

                        <div class="col-sm-4">
                          <div class="form-group">
                            <input type='text' placeholder="Name to search..." id='firstname' name='firstname' 
                            value='<?php echo $this->input->post('firstname');?>' />
                          </div>
                        </div>

				        <div class="col-sm-4">
                          <div class="form-group">
                            <input type='text' placeholder="City to search..." id='city' name='city' 
                            value='<?php if($current_city):echo $current_city;endif;?>' />
                          </div>
                        </div>

				        <?php /*?>
                        <div class="col-sm-4">
                          <div class="form-group">
							<?php 
							$form_select = '<select id="state" name="state" data-placeholder="Select State" class="state select2">';
							if (! empty($states)) {
							  foreach ($states as $k=>$option) {
							    $selected = ($k == $current_state) ? 'selected="selected"' : '';
							    $form_select .= '<option value="'.$k.'" ' . $selected . '>'.$option.'</option>';
							  }
							}
							$form_select .= '</select>';
							echo $form_select;
							?>
                          </div>
                          <label class="error" for="state"></label>
                        </div>

                        <div class="col-sm-4">
                          <div class="form-group">
							<?php 
								$form_select = '<select id="city" name="city" data-placeholder="Select City" class="city select2">';
								if (! empty($cities)) {
								  foreach ($cities as $k=>$option) {
								    $selected = ($k == $current_city) ? 'selected="selected"' : '';
								    $form_select .= '<option value="'.$k.'" ' . $selected . '>'.$option.'</option>';
								  }
								}
								$form_select .= '</select>';
								echo $form_select;
							?>
                          </div>
                          <label class="error" for="city"></label>
                        </div>
                        <?php */?>

                    </div>
                  </div>
                  <div class="col-sm-6">
                    <input type='submit' class="btn btn-success" id='btnSubmit' name='btnSubmit' value='Search' />
                    <a href='<?php echo base_url().'admin/members/listing';?>' class="btn btn-success">Reset</a>
                  </div>
              </div>
		    </form>
        </div>
			<?php 
			  echo showmsg($this->session->flashdata('msg'));
			?>
			<div class="table-responsive">
				<table id="tbl_results" class="table mb30">
				  <thead class="cf">
				      <tr>
				          <th>SL#</th>
				          <th>Name</th>
				          <th>Email</th>
				          <th>Contact No.</th>
				          <?php /*?><th>Gender</th><th>DOB</th>
				          <th>City</th>
				          <th>Home Town</th>
				          <th>About Me</th><?php */?>
					      <th><i class="fa fa-edit"></i>Action</th>
				      </tr>
				  </thead>
				<?php 
				if(is_array($results)){
				?>
				<?php $i=++$page;?>
				<tbody>
				<?php 
				foreach($results as $row){ ?>
				<tr>
					<td data-title="SL#"><?php echo $i;?></td>
					<!-- <td data-title="userTypeId"><?php //echo getUserTypeById($row['userTypeId']);?></td> -->
					<td data-title="Full Name"><?php echo $row['firstname'];?></td>
					<td data-title="email"><?php echo $row['email'];?></td>
					<td data-title="Mobile"><?php echo $row['mobile'];?></td>
					<?php /*?><td data-title="Gender"><?php echo $row['gender'];?></td>
					<td data-title="DOB"><?php echo $row['date_of_birth'];?></td>
					<td data-title="City"><?php echo $row['city'];?></td>
					<?php /*?><td data-title="Hometown"><?php echo $row['hometown'];?></td>
					<td data-title="About Me"><?php $content=strip_tags($row['aboutme']); echo substr($content,0,100)." ....."; ?></td>
					<?php */?>
					<td class='table-action' data-title="Action">
						
						<!---view page-->
						<a class="" href="<?php echo base_url()."admin/members/view/".$row['id']; ?>" title="View">
							<i class="fa fa-eye"></i></a>
						<!---end view page-->
						
						<!---edit page-->
						<a class="" href="<?php echo base_url()."admin/members/edit/".$row['id']; ?>" 
							onclick="return confirm('Are you sure you want to edit user<?php //echo addslashes($row['firstname']); ?>?');" title="Edit" >
							<i class="fa fa-pencil"></i></a>
						<!---end edit page-->
						<!---status-->
						<?php  if($row['status']==1){?>
						<a href="<?php echo base_url() . "admin/members/status/".$row['id']."/0";?>" class="btn btn-success btn-xs"  title="Enable" onclick="return confirm('Are you sure you want to disable?');">
						<i class="fa fa-check"></i></a>
						<?php }else{?>
						<a class="btn btn-warning btn-xs" href="<?php echo base_url() . "admin/members/status/".$row['id']."/1";?>"  title="Disable" onclick="return confirm('Are you sure you want to enable?');"> 
						<i class="fa fa-check"></i></a>
						<?php }?> <!--end status-->

						<!--delete-->
						<a class="" href="<?php echo base_url()."admin/members/delete/".$row['id'];  ?>" onclick="return confirm('Are you sure you want to remove?');" title="Remove">
							<i class="fa fa-trash-o "></i></a>
						<!--end delete-->
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
<?php $this->load->view('admin/footer');?>
<script type="text/javascript">
jQuery(document).ready(function() {
	// Select2
	jQuery(".select2").select2({
	  width: '100%'
	});
	jQuery("#utype").select2({
	  width: '100%',minimumResultsForSearch: -1
	});

	<?php /*?>
	// For State
	<?php if($current_state){ ?>
		FillCity('<?php echo $current_state;?>');
		<?php if($current_city){ ?>
		  $('#city').val('<?php echo $current_city;?>').trigger("change");
		<?php }?>
	<?php }?>
	$("#state").change(function(){
		var stateval=$(this).val();
		FillCity(stateval);
	});
	function FillCity(stateval){
		$.ajax({
		    type:"POST",
		    async:false,
		    url: '<?php echo base_url(); ?>ajax/getcity',
		    data: {id:stateval},
		    success: function(output){
		      $('#city').html('');
		      $('#city').append($('<option>', {
		            value: '',text : 'Select City' 
		      }));
		      var arroutput = JSON.parse(output);
		      //console.log(arroutput);
		      $.each(arroutput, function(key, val) {
		        if(key)
		           $('#city').append($('<option>', {
		               value: key,
		               text : val 
		           }));
		      });
		      $('#city').val('').trigger("change");
		    },
		});
	}
	// City
	$("#city").change(function(){
		//$('#dealerlist-form').submit();
	});
	<?php */?>
});
</script>