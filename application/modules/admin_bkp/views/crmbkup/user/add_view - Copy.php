<?php $this->load->view('admin/header');$this->load->view('admin/dasboardheader');?><style type="text/css">#accountForm {    margin-top: 25px;	}ul.nav.nav-tabs.tab-border {    background-color: #3c8dbc;}</style>         <section id="main-content"> <!--main content start-->			<div class="row mt">			<div class="col-lg-10"> 			<div class="form-panel">			<?php $attributes = array('class' => 'form-horizontal style-form input_from_custom', 'id' => 'user-form', 'name' => 'user-form'); ?>			<?php echo form_open(current_url(), $attributes ); ?>			<?php if(validation_errors()!=''){ ?> 			<div class="alert alert-danger">			<?php if( isset($error)) print($error); ?>			<?php echo validation_errors(); ?>			</div>			<?php } ?>			<br>		<ul class="nav nav-tabs tab-border">		<li class="active"><a href="#info-tab" data-toggle="tab">Account Info <i class="fa"></i></a></li>		<li><a href="#userinfo" data-toggle="tab">User Info<i class="fa"></i></a></li>		<li><a href="#billing-tab" data-toggle="tab">Billing Info<i class="fa"></i></a></li>		<li><a href="#network-tab" data-toggle="tab">Network<i class="fa"></i></a></li>		<li><a href="#payment-tab" data-toggle="tab">Payment<i class="fa"></i></a></li>		<li><a href="#docoment-tab" data-toggle="tab">Docoment<i class="fa"></i></a></li>		</ul>		   <form id="accountForm" method="post" class="form-horizontal">    <div class="tab-content">        <div class="tab-pane active"  id="info-tab">		            <div class="form-group">                <label class="col-xs-2 control-label">User name</label>                <div class="col-xs-3">                    <input type="text" class="form-control" value="<?php echo  $this->input->post('username'); ?>" name="username" />                </div>            </div>            <div class="form-group">                <label class="col-xs-2 control-label">Password</label>                <div class="col-xs-3">                    <input type="text" class="form-control" value="<?php echo  $this->input->post('portalloginpassword'); ?>" name="portalloginpassword" />                </div>            </div>            <div class="form-group">                <label class="col-xs-2 control-label">Plan</label>                <div class="col-xs-3">                    <select class="form-control" name="Plan">                        <option value="">Select a Plan</option>                        <option value="FR">FIber</option>                        <option value="DE">Nifinty</option>                        <option value="IT">Dhakad</option>                        <option value="other">Other</option>                    </select>                </div>            </div>									 <div class="form-group">                <label class="col-xs-2 control-label">MAC Address Authentication</label>                <div class="col-xs-3">                    <input type="text" class="form-control" value="<?php echo  $this->input->post('mac'); ?>" name="mac" />                </div>            </div>						 <div class="form-group">                <label class="col-xs-2 control-label">Nas Port Authentication</label>                <div class="col-xs-3">                    <input type="text" class="form-control" value="<?php echo  $this->input->post('nasport_id'); ?>" name="nasport_id" />                </div>            </div>							<div class="form-group">                <label class="col-xs-2 control-label">Option 82 Authentication</label>                <div class="col-xs-3">                    <input type="text" class="form-control"  value="<?php echo  $this->input->post('option82_string'); ?>" name="option82_string" />                </div>            </div>	        </div>				        <div class="tab-pane"  id="userinfo">         <div class="tab-content">		 		    <div class="row">			<div class="col-xs-12">			<div class="col-xs-6">			<div class="form-group">                <label class="col-xs-2 control-label">User Name</label>                <div class="col-xs-8">                    <input type="text" class="form-control" value="<?php echo  $this->input->post('username'); ?>" name="username" />                </div>            </div>						 <div class="form-group">                <label class="col-xs-2 control-label">First Name</label>                <div class="col-xs-8">                    <input type="text" class="form-control" value="<?php echo  $this->input->post('firstname'); ?>" name="firstname" />                </div>            </div>						 <div class="form-group">                <label class="col-xs-2 control-label">Last Name</label>                <div class="col-xs-8">                    <input type="text" class="form-control" value="<?php echo  $this->input->post('lastname'); ?>" name="lastname" />                </div>            </div>			</div>			<br>			<div class="col-xs-6">            <div class="form-group">                <label class="col-xs-2 control-label">Email</label>                <div class="col-xs-8">                    <input type="text" class="form-control" value="<?php echo  $this->input->post('email'); ?>" name="email" />                </div>            </div>						<div class="form-group">                <label class="col-xs-2 control-label">Department</label>                <div class="col-xs-8">                    <input type="text" class="form-control" value="<?php echo  $this->input->post('department'); ?>" name="department" />                </div>            </div>						 <div class="form-group">                <label class="col-xs-2 control-label">Company</label>                <div class="col-xs-8">                    <input type="text" class="form-control" value="<?php echo  $this->input->post('company'); ?>" name="company" />                </div>            </div>			</div>																					<div class="row">			<div class="col-xs-12">			<div class="col-xs-6">			<div class="form-group">                <label class="col-xs-2 control-label">User Name</label>                <div class="col-xs-8">                    <input type="text" class="form-control" value="<?php echo  $this->input->post('username'); ?>" name="username" />                </div>            </div>						 <div class="form-group">                <label class="col-xs-2 control-label">Home Phone</label>                <div class="col-xs-8">                    <input type="text" class="form-control" value="<?php echo  $this->input->post('homephone'); ?>" name="homephone" />                </div>            </div>			<div class="form-group">                <label class="col-xs-2 control-label">Mobile Phone</label>                <div class="col-xs-8">                    <input type="text" class="form-control" value="<?php echo  $this->input->post('mobilephone'); ?>" name="mobilephone" />                </div>              </div>             </div>			 			<br>						<div class="col-xs-6">			<div class="form-group">                <label class="col-xs-2 control-label">Address</label>                <div class="col-xs-8">                    <input type="text" class="form-control" value="<?php echo  $this->input->post('address'); ?>" name="address" />                </div>            </div>						<div class="form-group">                <label class="col-xs-2 control-label">City</label>                <div class="col-xs-8">                    <input type="text" class="form-control" value="<?php echo  $this->input->post('city'); ?>" name="city" />                </div>            </div>						<div class="form-group">                <label class="col-xs-2 control-label">State</label>                <div class="col-xs-8">                    <input type="text" class="form-control" value="<?php echo  $this->input->post('state'); ?>" name="state" />                </div>            </div>			</div>																											 <div class="row">			<div class="col-xs-12">			<div class="col-xs-6">			<div class="form-group">                <label class="col-xs-2 control-label">Country</label>                <div class="col-xs-8">                    <select class="form-control" name="country">                        <option value="">Select a country</option>                        <option value="FR">France</option>                        <option value="DE">Germany</option>                        <option value="IT">Italy</option>                        <option value="JP">Japan</option>                        <option value="RU">Russian</option>                        <option value="US">United State</option>                        <option value="GB">United Kingdom</option>                        <option value="other">Other</option>                    </select>                </div>            </div>        			<div class="form-group">                <label class="col-xs-2 control-label">Zip</label>                <div class="col-xs-8">                    <input type="text" class="form-control" value="<?php echo  $this->input->post('zip'); ?>" name="zip" />                </div>            </div>						<div class="form-group">                <label class="col-xs-2 control-label">Zip</label>                <div class="col-xs-8">                    <input type="text" class="form-control" value="<?php echo  $this->input->post('changeuserinfo'); ?>" name="changeuserinfo" />                  </div>              </div>             </div>			 			<br>						<div class="form-group">                <label class="col-xs-2 control-label">Zip</label>                <div class="col-xs-8">                    <input type="text" class="form-control" value="<?php echo  $this->input->post('portalloginpassword'); ?>" name="portalloginpassword" />                </div>            </div>						<div class="form-group">                <label class="col-xs-2 control-label">Zip</label>                <div class="col-xs-8">                    <input type="text" class="form-control" value="<?php echo  $this->input->post('enableportallogin'); ?>" name="enableportallogin" />                </div>            </div>						<div class="form-group">                <label class="col-xs-2 control-label">Zip</label>                <div class="col-xs-8">                    <input type="text" class="form-control" value="<?php echo  $this->input->post('creationdate'); ?>" name="creationdate" />                 </div>            </div>		</div>																																	<div class="form-group">                <label class="col-xs-2 control-label">Zip</label>                <div class="col-xs-3">                    <input type="text" class="form-control" value="<?php echo  $this->input->post('creationby'); ?>" name="creationby" />                </div>            </div>						<div class="form-group">                <label class="col-xs-2 control-label">Zip</label>                <div class="col-xs-3">                    <input type="text" class="form-control" value="<?php echo  $this->input->post('updatedate'); ?>" name="updatedate" />                </div>            </div>						<div class="form-group">                <label class="col-xs-2 control-label">Zip</label>                <div class="col-xs-3">                    <input type="text" class="form-control" value="<?php echo  $this->input->post('updateby'); ?>" name="updateby" />                </div>            </div>						<div class="form-group">                <label class="col-xs-2 control-label">Zip</label>                <div class="col-xs-3">                    <input type="text" class="form-control" value="<?php echo  $this->input->post('mac_bind'); ?>" name="mac_bind" />                </div>            </div>						<div class="form-group">                <label class="col-xs-2 control-label">Zip</label>                <div class="col-xs-3">                    <input type="text" class="form-control" value="<?php echo  $this->input->post('nasport_bind'); ?>" name="nasport_bind" />                </div>            </div>						<div class="form-group">                <label class="col-xs-2 control-label">Zip</label>                <div class="col-xs-3">                    <input type="text" class="form-control" value="<?php echo  $this->input->post('option82_bind'); ?>" name="option82_bind" />                </div>            </div>									<div class="form-group">                <label class="col-xs-2 control-label">Zip</label>                <div class="col-xs-3">                    <input type="text" class="form-control" value="<?php echo  $this->input->post('mac'); ?>" name="mac" />                </div>            </div>						<div class="form-group">                <label class="col-xs-2 control-label">Zip</label>                <div class="col-xs-3">                    <input type="text" class="form-control" value="<?php echo  $this->input->post('nasport_id'); ?>" name="nasport_id" />                </div>            </div>						<div class="form-group">                <label class="col-xs-2 control-label">Zip</label>                <div class="col-xs-3">                    <input type="text" class="form-control" value="<?php echo  $this->input->post('option82_string'); ?>" name="option82_string" />                </div>            </div>						<div class="form-group">                <label class="col-xs-2 control-label">Zip</label>                <div class="col-xs-3">                    <input type="text" class="form-control" value="<?php echo  $this->input->post('usertype'); ?>" name="usertype" />                </div>            </div>						<div class="form-group">                <label class="col-xs-2 control-label">Zip</label>                <div class="col-xs-3">                    <input type="text" class="form-control" value="<?php echo  $this->input->post('authtype'); ?>" name="authtype" />                </div>            </div>						<div class="form-group">                <label class="col-xs-2 control-label">Zip</label>                <div class="col-xs-3">                    <input type="text" class="form-control" value="<?php echo  $this->input->post('servicetype'); ?>" name="servicetype" />                </div>            </div>						<div class="form-group">                <label class="col-xs-2 control-label">Zip</label>                <div class="col-xs-3">                    <input type="text" class="form-control" value="<?php echo  $this->input->post('status'); ?>" name="status" />                </div>            </div>						<div class="form-group">                <label class="col-xs-2 control-label">notes</label>                <div class="col-xs-3">                   <textarea rows="4" cols="50" name="note" ><?php echo $this->input->post('note'); ?></textarea>                </div>            </div>			</div>    </div>		 	 <div class="tab-pane" id="billing-tab"> 	 <div class="tab-content">            <div class="form-group">                <label class="col-xs-2 control-label">Plan Name</label>                <div class="col-xs-3">                    <input type="text" class="form-control" value="<?php echo  $this->input->post('name'); ?>" name="User Name" />                </div>            </div>            <div class="form-group">                <label class="col-xs-2 control-label">Contact Person</label>                <div class="col-xs-3">                    <input type="text" class="form-control" value="<?php echo  $this->input->post('name'); ?>" name="Email" />                </div>            </div>						<div class="form-group">                <label class="col-xs-2 control-label">Department</label>                <div class="col-xs-3">                    <input type="text" class="form-control" value="<?php echo  $this->input->post('name'); ?>" name="Department" />                </div>            </div>						<div class="form-group">                <label class="col-xs-2 control-label">Company</label>                <div class="col-xs-3">                    <input type="text" class="form-control" value="<?php echo  $this->input->post('name'); ?>" name="Company" />                </div>            </div>			<div class="form-group">                <label class="col-xs-2 control-label">Mobile Phone</label>                <div class="col-xs-3">                    <input type="text" class="form-control" value="<?php echo  $this->input->post('name'); ?>" name="Mobile Phone" />                </div>            </div>						<div class="form-group">                <label class="col-xs-2 control-label">Email</label>                <div class="col-xs-3">                    <input type="text" class="form-control" value="<?php echo  $this->input->post('name'); ?>" name="email" />                </div>            </div>						<div class="form-group">                <label class="col-xs-2 control-label">Address</label>                <div class="col-xs-3">                    <input type="text" class="form-control" value="<?php echo  $this->input->post('name'); ?>" name="address" />                </div>            </div>						<div class="form-group">                <label class="col-xs-2 control-label">State</label>                <div class="col-xs-3">                    <input type="text" class="form-control" value="<?php echo  $this->input->post('name'); ?>" name="State" />                </div>            </div>						<div class="form-group">                <label class="col-xs-2 control-label">Zip</label>                <div class="col-xs-3">                    <input type="text" class="form-control" value="<?php echo  $this->input->post('name'); ?>" name="city" />                </div>            </div>						<div class="form-group">                <label class="col-xs-2 control-label">City</label>                <div class="col-xs-3">                    <input type="text" class="form-control" value="<?php echo  $this->input->post('name'); ?>" name="city" />                </div>            </div>						<div class="form-group">                <label class="col-xs-2 control-label">Postal Invoice</label>                <div class="col-xs-3">                    <input type="text" class="form-control" value="<?php echo  $this->input->post('name'); ?>" name="invoice" />                </div>            </div>					</div></div>						 <div class="tab-pane" id="network-tab"> 	      <div class="tab-content">	            <div class="form-group">                <label class="col-xs-2 control-label">Mac port</label>                <div class="col-xs-3">                    <input type="text" class="form-control" value="<?php echo  $this->input->post('name'); ?>" name="macport" />                </div>            </div>            <div class="form-group">                <label class="col-xs-2 control-label"> Nas Port</label>                <div class="col-xs-3">                    <input type="text" class="form-control" value="<?php echo  $this->input->post('name'); ?>" name="nasport" />                </div>            </div>				</div></div>						<div class="tab-pane" id="payment-tab"> 	      <div class="tab-content">	            <div class="form-group">                <label class="col-xs-2 control-label">Payment Method</label>                <div class="col-xs-3">                    <input type="text" class="form-control" value="<?php echo  $this->input->post('name'); ?>" name="Payment Method" />                </div>            </div>            <div class="form-group">                <label class="col-xs-2 control-label"> Cash</label>                <div class="col-xs-3">                    <input type="text" class="form-control" value="<?php echo  $this->input->post('name'); ?>" name="Cash" />                </div>            </div>							<div class="form-group">                <label class="col-xs-2 control-label"> Credit Card Name</label>                <div class="col-xs-3">                    <input type="text" class="form-control" value="<?php echo  $this->input->post('name'); ?>" name="Credit Card Name" />                </div>            </div>							<div class="form-group">                <label class="col-xs-2 control-label">Credit Card Verification Number</label>                <div class="col-xs-3">                    <input type="text" class="form-control" value="<?php echo  $this->input->post('name'); ?>" name="Credit Card Verification Number" />                </div>            </div>							<div class="form-group">                <label class="col-xs-2 control-label">Credit Card Type</label>                <div class="col-xs-3">                    <select class="form-control" name="Credit Card Type">                        <option value="">Credit Card Type</option>                        <option value="FR">Visa</option>                        <option value="DE">Master card</option>                        <option value="IT">Diner</option>                        <option value="other">Other</option>                    </select>                </div>            </div>						<div class="form-group">                <label class="col-xs-2 control-label">Credit Card Expiration</label>                <div class="col-xs-3">                    <input type="text" class="form-control" value="<?php echo  $this->input->post('name'); ?>" name="Credit Card Number" />                </div>            </div>				</div></div>									<div class="tab-pane" id="docoment-tab"> 	      <div class="tab-content">	            <div class="form-group">                <label class="col-xs-2 control-label">Addhar no.</label>                <div class="col-xs-3">                    <input type="text" class="form-control" value="<?php echo  $this->input->post('name'); ?>" name="addhar no." />                </div>            </div>            <div class="form-group">                <label class="col-xs-2 control-label">drive licence</label>                <div class="col-xs-3">                    <input type="text" class="form-control" value="<?php echo  $this->input->post('name'); ?>" name="drive licence" />                </div>            </div>							<div class="form-group">                <label class="col-xs-2 control-label"> Pan Card</label>                <div class="col-xs-3">                    <input type="text" class="form-control" value="<?php echo  $this->input->post('name'); ?>" name="Pan Card" />                </div>            </div>							<div class="form-group">                <label class="col-xs-2 control-label">voter id card</label>                <div class="col-xs-3">                    <input type="text" class="form-control" value="<?php echo  $this->input->post('name'); ?>" name="voter id card" />                </div>            </div>				</div></div>	<br>	    <div class="form-group" style="margin-top: 25px;">        <div class="col-xs-5 col-xs-offset-5">            <button type="submit" class="btn btn-primary">Submit</button>        </div>    </div></form><script>$(document).ready(function() {    $('#accountForm')        .formValidation({            excluded: [':disabled'],            ...        })        .on('err.field.fv', function(e, data) {            // Get the first invalid field            var $invalidFields = data.fv.getInvalidFields().eq(0);            // Get the tab that contains the first invalid field            var $tabPane     = $invalidFields.parents('.tab-pane'),                invalidTabId = $tabPane.attr('id');            // If the tab is not active            if (!$tabPane.hasClass('active')) {                // Then activate it                ...                // Focus on the field                $invalidFields.focus();            }        });});</script>			<!--main content end-->			<?php 			$this->load->view('admin/footer');			?>			<script type="text/javascript" src="<?php echo base_url();?>assets/js/common/jquery.validate.js"></script>			<script>			$().ready(function() {			$("#user-form").validate({			});			});			</script>