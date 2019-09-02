<?php 
$this->load->view('admin/header');
$this->load->view('admin/dasboardheader');
?>
       
    <!-- Content Header (Page header) -->
     <section class="content-header">
      <h1>
        <i class="fa fa-users"></i>Return Management
        <!--<small>Add New Purchase </small>-->
      </h1>
    </section>
	<div class="col-xs-8 text-right">
			<div class="form-group">
				<a class="btn btn-primary" href="<?php echo base_url(); ?>admin/returnitem/listing"><i class=""></i> Return and Repair List</a>
			</div>
		</div>	
    <br>
    <section class="content">
   
        <div class="row">
            <!-- left column -->
            <div class="col-md-8" id="msg_err">
			<?php 
				$err_message = '';
				$err_message = $this->session->flashdata('msg');
				if(isset($err_message)!=""){
			?>
					<?php if(isset($_GET['err_msg'])){ ?>
						<script>
							$(document).ready(function() {
								$('#msg_err').prepend('<div class="alert alert-fail"><?php echo $this->session->flashdata('msg'); ?></div>');
							});
						</script>
					<?php } else { ?>
						<?php echo showmsg($this->session->flashdata('msg'));?>
					<?php } ?>
			<?php } ?>
              <!-- general form elements --> 
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Return Item </h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    
                    <form role="form" id="return" action="" method="post" role="form">
                        <div class="box-body">
						
                           <div class="row">
						   
								<div class="col-md-4">
                                    <div class="form-group">
                                        <label for="po-number">Purchase Order Number </label>
                                         <input type="text" class="form-control" value="" name="po_number" id="ponum" autocomplete="off"/>
										 <ul class="dropdown-menu txtcountry" style="margin-left:15px;margin-right:0px;" role="menu" aria-labelledby="dropdownMenu"  id="DropdownPonum"></ul>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
										<label for="type_return"> Select One </label>
										<select name="return_type" class="required form-control" id="return-type">
											<option value="">Select Type</option>
											<option value="return">Return</option>
											<option value="repair">Repair</option>
											<option value="faulty">Faulty</option>
										</select>
									</div>
								</div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="po-number">Quantity </label>
                                         <input type="text" required class="form-control" value="" name="po_qty" id="qty" />
                                    </div>
                                </div>
                            </div>
							
                             <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cpassword">Reason</label>
                                        <textarea class="form-control" rows="3" cols="50" name="reason" ></textarea>
                                    </div>
                                </div>
                            </div>
                      <br>
    
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Submit" id="sub_btn"/>
                            <input type="reset" class="btn btn-default" value="Reset" />
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                                                
                <div class="row">
                    <div class="col-md-12">
                                            </div>
                </div>
            </div>
        </div>    
    </section>   
</div>


			<!--main content end-->


			<?php 
			$this->load->view('admin/footer');
			?>
			<script type="text/javascript" src="<?php echo base_url();?>assets/admin/js/jquery.validate.min.js"></script>
<script>
$(document).ready(function() {
    $("#return").validate({
            rules: {
                po_number :{required: true},
            },
            messages: {
              po_number : "Purchase Item Number is required.",
            }
        });

});
</script>
<script type="text/javascript" >
$(document).ready(function () {
    $("#ponum").keyup(function () {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>admin/returnitem/check_po",
            dataType: "json",
            success: function (data) {
				//console.log(data);
                if (data.length > 0) {
                    $('#DropdownPonum').empty();
                    $('#ponum').attr("data-toggle", "dropdown");
                    $('#DropdownPonum').dropdown('toggle');
                }
                else if (data.length == 0) {
                    $('#ponum').attr("data-toggle", "");
                }
                $.each(data, function (key,value) {
                    if (data.length >= 0)
                        $('#DropdownPonum').append('<li role="displayCountries" ><a role="menuitem dropdownCountryli" class="dropdownlivalue">' + value + '</a></li>');
                });
            }
        });
    });
    $('ul.txtcountry').on('click', 'li a', function () {
        $('#ponum').val($(this).text());
    });
});
	/*$(document).ready(function () {
		$("#ponum").blur(function () {
			//var ponum = $("#ponum").val();
				$.ajax({
				   type: "post",
				   url: "http://localhost/nextraInventory/admin/returnitem/check_po",
				   data:'ponum=' + $("#ponum").val(),
				   dataType: 'json',
				   success: function(response){ 
				  
				   		if(response.result != "yes"){
							$("#ponum").parent().next(".error").remove();
							$("#ponum").parent().after('<label class="error">Enter Purchase order not Exit</label>');
							//$('.error').text('Enter Purchase order not Exit');
							
						} else {
							$("#ponum").parent().next(".error").remove();
							
						}
					
				   },
				   
				});
			
		});
	});*/
</script>
<script type="text/javascript" >
	$(document).ready(function () {
		$("#sub_btn").click(function () {
			//alert("ghy");
			var ponum = $("#ponum").val();
			var po_type = $('#return-type :selected').val();
			var poqty = $("#qty").val();
			//alert(po_type);
			//var data = { ponum: ponum, po_type: po_type, poqty: poqty };
			
				$.ajax({
					url: '<?php echo base_url(); ?>admin/returnitem/deduct',
					type: 'post',
					data: {puror_num:ponum,pur_type:po_type,pur_qty:poqty},
					dataType: 'json',
					success: function(json) {
						

							
						}

									
				});
			
		});
	});
</script>