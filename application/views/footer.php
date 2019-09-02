<?php $memberId = getMemberUserID();?>
<section class="sn_newsletter">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="sn_nltitle">Newsletter Subscription</div>
                    <p class="sn_nldesc">Subscribe to our newsletter and get exclusive offers and updates</p>
                </div>
                <div class="col-md-6">
                    <div class="sn_btm_nlsubs">
                        <form id="frmNewsletter" method="POST" class="form-inline" role="form">
                            <div class="form-group sn_round_corner">
                                <label class="sr-only" for="">Your Email Address</label>
                                <input type="email" class="form-control sn_round_corner" name='newsletteremail' id='newsletteremail' placeholder="Your Email Address">
                                <button id="newsletter" type="submit" class="btn btn_prime btn_round">SUBSCRIBE</button>
                                <div class="clearfix"></div>
                                <span id='msgSubscribe' style="color:#ef3636"></span>
                                <span for='newsletteremail' class="error" style="color:#ef3636"></span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</section>
<footer class="sn_footer">
    <div class="sn_ftr_info">
       <div class="container">
           <div class="row">
               <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                   <div class="sn_links_block">
                       <h4>Quick Links</h4>
                       <ul class="list-unstyled">
                            <li><a href="<?php echo base_url();?>">Home</a></li>
                            <li><a href="<?php echo base_url();?>pages/about-us">About us</a></li>
                            <li><a href="<?php echo base_url();?>pages/what-to-expect">What to expect?</a></li>
                            <li><a href="<?php echo base_url();?>upcoming-weddings">Upcoming Weddings</a></li>
                            <li><a href="<?php echo base_url();?>registration">Become a host</a></li>
                            <li><a href="<?php echo base_url();?>pages/contact-us">Contact us</a></li>
                       </ul>
                   </div>
               </div> 
               <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                   <div class="sn_links_block">
                       <h4>Services for Guests</h4>
                       <ul class="list-unstyled">
                            <li><a href="<?php echo base_url();?>service/ethnic-wedding-wears">Ethenic wear shopping</a></li>
                            <li><a href="<?php echo base_url();?>service/stylish-jewellery">Stylish Jewellery</a></li>
                            <li><a href="<?php echo base_url();?>service/tour-management">Tour packages</a></li>
                            <li><a href="<?php echo base_url();?>service/makeup-hair-styling">Wedding Mackup</a></li>
                       </ul>
                   </div>
               </div>
               <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                   <div class="sn_links_block">
                       <h4>Information</h4>
                       <ul class="list-unstyled">
                            <li><a href="<?php echo base_url();?>faq">FAQ's</a></li>
                            <?php if($memberId){?>
                            <li>
                              <a href="<?php echo base_url();?>user/profile">My Account</a>
                            </li>
                            <li>
                              <a href="<?php echo base_url();?>user/logout">Logout</a>
                            </li>
                            <?php }else{?>
                            <li>
                              <a href="<?php echo base_url();?>registration">Login</a>
                            </li>
                            <?php }?>
                            <li><a href="<?php echo base_url();?>pages/privacy-policy">Privacy Policy</a></li>
                            <li><a href="<?php echo base_url();?>pages/terms-and-conditions">Terms and Conditions</a></li>
                            <li><a href="<?php echo base_url();?>pages/contact-us">Contact Us</a></li>
                       </ul>
                   </div>
               </div>

               <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                   <div class="sn_links_block">
                       <h4>Get in Touch</h4>
                       <ul class="list-unstyled">
                            <li>
                                <div class="media">
                                    <span class="pull-left">
                                        <i class="fa fa-phone"></i>
                                    </span>
                                    <div class="media-body">
                                        <p><?php echo isset($settings[0]['company_phone1'])?$settings[0]['company_phone1']:''; ?></p>
                                        <p><?php echo isset($settings[0]['company_phone2'])?$settings[0]['company_phone2']:''; ?></p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="media">
                                    <span class="pull-left">
                                        <i class="fa fa-envelope-o"></i>
                                    </span>
                                    <div class="media-body">
                                        <p><?php echo isset($settings[0]['admin_email'])?$settings[0]['admin_email']:''; ?></p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="media">
                                    <span class="pull-left">
                                        <i class="fa fa-map-marker"></i>
                                    </span>
                                    <div class="media-body">
                                        <p><?php echo isset($settings[0]['address1'])?$settings[0]['address1']:'';?></p>
                                    </div>
                                </div>
                            </li>
                            <li class="sn_ftrsocial">
                                <?php if(isset($settings[0]['facebook_link'])){?>
                                    <a href="<?php echo @$settings[0]['facebook_link'];?>"><i class="fa fa-facebook"></i></a>
                                <?php }?>
                                <?php if(isset($settings[0]['twitter_link'])){?>
                                    <a href="<?php echo @$settings[0]['twitter_link'];?>"><i class="fa fa-twitter"></i></a>
                                <?php }?>
                                <?php if(isset($settings[0]['youtube_link'])){?>
                                    <a href="<?php echo @$settings[0]['youtube_link'];?>"><i class="fa fa-youtube"></i></a>
                                <?php }?>
                                <?php if(isset($settings[0]['google_plus_link'])){?>
                                    <a href="<?php echo @$settings[0]['google_plus_link'];?>"><i class="fa fa-google-plus"></i></a>
                                <?php }?>
                                <?php if(isset($settings[0]['pinterest_link'])){?>
                                    <a href="<?php echo @$settings[0]['pinterest_link'];?>"><i class="fa fa-pinterest"></i></a>
                                <?php }?>
                            </li>
                       </ul>
                   </div>
               </div>
           </div>
       </div>       
    </div>
    <div class="sn_ftrbtm">
        <div class="container text-center">
            <p>Copyright 2017, <strong>MarriageTicket.com</strong> All Rights Reserved.</p>
        </div>
    </div>
</footer>
<!-- ENQUIRY MODAL -->
<div class="modal fade" id="sn_enq_Modal">
    <form id="frmEnquiry" method="post">
    <div class="modal-dialog">
        <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Enquire Now</h4>
                    <input type='hidden' name='title' id='title' value='' />
                    <input type='hidden' name='sourceurl' id='sourceurl' value='' />
                </div>
                <div class="modal-body">
                <div id="message" style="text-align:center"></div>
                        <div></div>
                        <div style='padding-bottom:10px;' class='error' id='error-message'></div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="label-control" for="name">Name</label>
                                    <input required type="text" class="form-control" id="detail_name" name="name" placeholder="Your Name">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="label-control" for="email">Email</label>
                                    <input required type="email" class="form-control" id="detail_email" name="email" placeholder="Your Email ID">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="label-control" for="contact_no">Contact No.</label>
                                    <input required type="text" class="form-control" id="contact_no" name="contact_no" placeholder="Your Contact No.">
                                </div>
                            </div>
                        </div>

                        <!-- <div class="form-group">
                            <label class="checkbox-inline">
                              <input type="checkbox" id="extra_offer1" name="extra_offer1" value="Add Car Hire"> Add Car Hire
                            </label>
                            <label class="checkbox-inline">
                              <input type="checkbox" id="extra_offer2" name="extra_offer2" value="Add Attraction Passes"> Add Attraction Passes
                            </label>
                        </div> -->
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="label-control" for="Subject">Subject</label>
                                <input required type="text" class="form-control" id="subject" name="subject" placeholder="Subject">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Comments</label>
                            <textarea required id="frmcomments" name="frmcomments" class="form-control" rows="3"></textarea>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">CLOSE</button>
                    <button type="submit" class="btn btn-danger enroll">SUBMIT ENQUIRY</button>
                </div>
            
            
        </div>
    </div>
    </form>
</div>
<!-- ENQUIRY MODAL -->
<?php $this->load->view('js');?>
<script>
$(document).ready(function() {
    // Select2
    /*jQuery(".select2").select2({
        width: '100%'
    });*/

    // NewsLetter
    $("#frmNewsletter").validate({
        errorElement: 'span',
        rules:{
            newsletteremail:{required: true,email: true}
        },
        messages:{
            newsletteremail : {required: "Email field is required.",newsletteremail:"Invalid Email."},
        },
        showErrors: function(errorMap, errorList) {
         if(this.numberOfInvalids()){
            $('#msgSubscribe').html('');
         }
         this.defaultShowErrors();
        },
    });
    $("#frmNewsletter").submit(function( event ){
        event.preventDefault();
        $('#msgSubscribe').html('');
        var newsletteremail=$('#newsletteremail').val();
        var isvalidate=$("#frmNewsletter").valid();
        if(isvalidate){
            $.ajax({
              url:'<?php echo base_url().'common/add_newsletter'?>',
              method: "POST",
              data:{newsletteremail:newsletteremail},
              beforeSend: function( xhr ) {
                $('#newsletteremail').attr('disabled',true);
              },
              success:function(data){
                  if(data==1){
                    $('#newsletteremail').attr('disabled',false);
                    $('#newsletteremail').val('');
                    //alert('Subscribed Successfully.');
                    $('#msgSubscribe').html('Subscribed Successfully.');
                  }
              }
            });
        }
    });
    // NewsLetter

    // Enquiry
    $('.sn_enqBtn').on('click', function (event) {
        $('#message').html('');
        var title = $(this).data('title');
        var sourceurl = $(this).data('sourceurl');
        //alert(title);
        $('#title').val(title);
        $('#sourceurl').val(sourceurl);
    });
    $("#frmEnquiry").validate({
        //errorElement: 'span',
        showErrors: function(errorMap, errorList) {
            if(errorList.length) {
              $('#error-message').html(errorList[0].message);
            }
        },
        ignore: ".ignore",
        highlight: function(element) {
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
        },
        success: function(element) {
            $(element).closest('.form-group').removeClass('has-error');
        },
        rules:{
            contact_no:{required: true,digits: true}
        },
        messages:{
            name : "Name field is required.",
            email : {required: "Email field is required.",email:"Invalid Email."},
            contact_no : {required:"Contact is required.",digits: "Enter digits."},
            subject : "Subject field is required.",
            frmcomments : "Comments field is required.",
        },
    });

    $("#frmEnquiry").submit(function( event ){
        event.preventDefault();
        var sourceurl = $('#sourceurl').val();
        var title = $('#title').val();
        var name=$('#detail_name').val();
        var email=$('#detail_email').val();
        var contact_no=$('#contact_no').val();
        var subject=$('#subject').val();
        var comments = $('#frmcomments').val();
        var frm = $( "#frmEnquiry" );
        if(frm.valid()){
            $('#error-message').html('');
            $('#message').html('Sending Mail..');
            $('.enroll').attr('disabled',true);
            $.ajax({
              url:'<?php echo base_url().'common/add_enquiry'?>',
              method: "POST",data:{sourceurl:sourceurl,title:title,name:name,email:email,contact_no:contact_no,subject:subject,comments:comments},
              success:function(data){
                  //alert(data);
                  $('#sn_enq_Modal').modal('hide');
                  //$('#thanksmodal').modal();
                  //$('#thanksmodal .thanksmodal').hide();
                  if(data){
                    // Sending Mail
                    $.ajax({
                        url:'<?php echo base_url().'common/send_mail';?>',
                        method: "POST",data:{sourceurl:sourceurl,title:title,name:name,email:email,contact_no:contact_no,subject:subject,comments:comments},
                        success:function(data){
                            //
                            $('#title').val('');
                            $('#sourceurl').val('');
                            $('#detail_name').val('');
                            $('#detail_email').val('');
                            $('#contact_no').val('');
                            $('#subject').val('');
                            $('#frmcomments').val('');
                            $('.enroll').attr('disabled',false);
                            //////////
                            $('#message').html('Enquiry sent Successfully');
                            //window.location.href = "<?php echo base_url();?>pages/thank-you";
                        }
                    });
                  }
              }
            });
        }
    });
    /////
});
</script>
