<?php $this->load->view('header');?>
<main class="sn_page_content sn_userprofileadmin">

  <section class="sn_usermanagepanel">
    <?php $this->load->view('postmarriage/view_sidebar');?>

    <div class="sn_rtContentsection">
      <div class="page-header">
        <h1><i class="fa fa-user"></i> Profile Management</h1>
      </div><!--page- header -->

      <div class="sn_rtcontentContainer">
        <div class="notfound">

            <?php echo showmsg($this->session->flashdata('msg'));?>

            <?php $attributes = array('class' => 'form-horizontal ak', 'id' => 'user-form', 'name' => 'user-form','enctype'=>'multipart/form-data'); ?>

            <?php echo form_open('login/updateprofile', $attributes);?>

            <?php if(validation_errors()!=''){?>

                <div class="alert alert-danger">

                    <?php if( isset($error)) print($error); ?>

                    <?php echo validation_errors(); ?>

                </div>

            <?php } ?>

            <?php if(isset($msg)){ echo'<div style="color:green">'.$msg.'</div>';}?>

            <div class="row">
              <div class="col-sm-12 col-md-8 col-lg-7">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h3 class="panel-title">Edit Profile</h3>
                  </div>
                  <div class="panel-body">
                    <fieldset>

            
              <div class="form-group">

                  <label class="col-md-4 text-left" for="Name">Name </label>

                  <div class="col-md-8">

                    <div class="input-group">

                      <div class="input-group-addon"> <i class="fa fa-user"> </i> </div>

                      <input type="text" class="form-control input-md" id="firstname" name="firstname" placeholder="Name" value="<?php echo @$user['firstname'];?>">

                      </div>

                  </div>

              </div>

              

              <div class="form-group">

                  <label class="col-md-4 text-left" for="Email">Email</label>

                  <div class="col-md-8">

                      <div class="input-group">

                          <div class="input-group-addon"> <i class="fa fa-envelope-o"></i> </div>

                          <input type="email" class="form-control input-md" id="email" name="email" placeholder="Email Address" value="<?php echo @$user['email'];?>">

                      </div>

                  </div>

              </div>

              <div class="form-group">
                  <label class="col-md-4 text-left" for="Mobile">Mobile </label>
                  <div class="col-md-8">
                    <div class="input-group">
                      <div class="input-group-addon"> <i class="fa fa-user"> </i> </div>
                      <input type="text" class="form-control input-md" id="mobile" name="mobile" placeholder="Mobile" value="<?php echo @$user['mobile'];?>">
                      </div>
                  </div>
              </div>
              <div class="form-group">
                  <label class="col-md-4 text-left" for="City">City </label>
                  <div class="col-md-8">
                    <div class="input-group">
                      <div class="input-group-addon"> <i class="fa fa-user"> </i> </div>
                      <input type="text" class="form-control input-md" id="city" name="city" placeholder="City" value="<?php echo @$user['city'];?>" />
                    </div>
                  </div>
              </div>

              <div class="form-group">
                  <label class="col-md-4 text-left" for="About Me">About Me </label>
                  <div class="col-md-8">
                    <div class="input-group">
                      <div class="input-group-addon"> <i class="fa fa-user"> </i> </div>
                      <textarea id='aboutme' name="aboutme" class="form-control" rows="5" placeholder="About Me"><?php echo strip_tags(@$user['aboutme']);?></textarea>
                    </div>
                  </div>
              </div>

              <div class="form-group">

                  <label class="col-md-4 text-left" for="Phone number ">Password </label>

                  <div class="col-md-8">

                    <div class="input-group">

                      <div class="input-group-addon"> <i class="fa fa-key" aria-hidden="true"></i> </div>

                      <input type="password" class="form-control input-md" id="pwd" name="pwd" placeholder="Password" value="">

                    </div>

                  </div>

              </div>

              <div class="form-group">

                <label class="col-md-4 text-left" for="Phone number ">Confirm Password</label>

                <div class="col-md-8">

                  <div class="input-group">

                    <div class="input-group-addon"> <i class="fa fa-key" aria-hidden="true"></i> </div>

                    <input type="password" class="form-control input-md" id="confirmpassword" name="confirmpassword" placeholder="Confirm Password" value="">

                </div>

                </div>

              </div>

             <div class="row">
               <label class="col-md-4"></label>
              <div class="col-md-8">
                  <div class="sn_proceedwrap aks"> <button type="submit" class="btn btn_prime btn-block">Update</button> </div>
              </div>
             </div>
            </fieldset>
                  </div>
                </div>
              </div>
            </div>

            

          </form>

        </div>
      </div><!-- sn_rtcontentContainer -->
      
    </div><!-- sn_rtContentsection -->
  </section><!-- sn_usermanagepanel -->



    



        




</main>

<style>

.ak .form-control{border: 1px solid #ccc;}   .ak.form-group label{ font-size:15px;} .ak .sn_proceedwrap{ border:none}

</style>

<?php $this->load->view('footer');?>

<script type="text/javascript" src="<?php echo base_url();?>assets/frontend/js/jquery.validate.min.js"></script>

<script type="text/javascript">

jQuery(document).ready(function(){

    // Form

    jQuery("#user-form").validate({

	    rules: {

          firstname :{required: true},

          email :{required: true,email: true},

          mobile:{required: true,digits: true,minlength: 10,maxlength: 15},

          /*confirmpassword: {

            required: true,

            minlength: 5,

            equalTo: "#password"

          },*/

          address :{required: true},

    	},

    	messages: {

          firstname : "Name is required.",

          mobile: {

            required: "Please enter your mobile.",

            digits: "Please enter digits."

          },

          email : "Please enter a valid email address.",

          confirmpassword: {

            required: "Confirm Password is required.",

            equalTo: "Password doesn't match."

          },

          address : "Address is required.",

        }

  	});

});

</script>