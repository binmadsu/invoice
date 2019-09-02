<?php $this->load->view('header');?>

<?php /*if(@$pageData->page_slug == 'terms-and-conditions'){?>

<?php }?>

<?php if(@$pageData->page_slug == 'privacy-policy'){?>

<?php }*/?>

<?php if(@$pageData->page_slug == 'about-us'){?>
        <main class="sn_page_content sn_about">

        <div class="container">
            <div class="sn_content sn_abtPage">
                <div class="container">
                    <div class="row">
                        
                        <div class="col-sm-12 col-md-6">
                            <article class="aboutContent">
                                <hgroup>
                                    <h1><?php echo @$pageData->page_title;?></h1>
                                    <h3><?php echo @$pageData->subtitle2;?></h3>
                                    <h4><?php echo @$pageData->subtitle3;?></h4>
                                </hgroup>
                                <?php echo @$pageData->page_content;?>
                                <div class="clear30 hidden-md hidden-lg visible-xs visible-sm"></div>
                            </article>
                        </div>

                        <div class="col-sm-12 col-md-6">
                            <img src="<?php echo base_url().$pageData->banner_image;?>" alt="" class="img-responsive center-block">
                        </div>
                        
                    </div>
                    
                    </div>
                </div>
            </div>

            
        </main>
<?php }
elseif(@$pageData->page_slug == 'contact-us'){?>
        <main class="sn_page_content sn_contact">
            <?php /*?><section class="sn_location_map">
                <iframe src="<?php echo @$pageData->gmapurl;?>" width="" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            </section> <?php */?>
            <div class="container">
                <h3 class="pagehdr"><?php echo @$pageData->page_title;?></h3>
                <div class="sn_contactwrap">
                    <div class="row no_padding">
                        <div class="col-sm-12 col-md-6">
                            <div class="sn_contactblock_in sn_continfo_block">
                                <?php echo @$pageData->page_content;?>
                                <div class="clear20"></div>
                                <h4>CONTACT NUMBER</h4>
                                <p><a href="#"><strong>Call <?php echo @$pageData->mobile;?></strong></a></p>
                                <div class="clear20"></div>
                                <h4>CONNECT TO US</h4>
                                <div class="sn_social_connection">
                                    <ul>
                                        <li class="facebook">
                                            <a target="_blank" title="Facebook" href="#"><i class="fa fa-facebook"></i></a>
                                        </li>

                                        <li class="twitter">
                                            <a target="_blank" title="Twitter" href="#"><i class="fa fa-twitter"></i></a>
                                        </li>

                                        <li class="pinterest">
                                            <a target="_blank" title="Pinterest" href="#"><i class="fa fa-pinterest"></i></a>
                                        </li>

                                        <li class="instagram">
                                            <a target="_blank" title="Instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="sn_contactblock_in sn_contform_block sn_colorbg">
                                <h3 class="mt0">SUBMIT QUERY</h3>
                                <div class="clear15"></div>
                                    <?php echo form_open(current_url(),array('class' => 'form-login row','id'=>'contact-form', 'name' => 'contact-form'  ,'enctype'=>'multipart/form-data'));?>
                                    <?php if($this->session->flashdata('contact_error_msg')){?>
                                      <div class="alert alert-danger">
                                        <?php echo $this->session->flashdata('contact_error_msg');?>
                                      </div>
                                    <?php }?>
                                    <div style="display: none;" id='contact-error-message' class="alert alert-danger"></div>
                                    <div class="form-group">
                                      <input type="text" class="form-control" size="40" id="firstname" name="firstname" placeholder="Name"  value="<?php echo $this->input->post('firstname');?>">
                                    </div>

                                    <div class="form-group">
                                      <input type="email" class="form-control" size="40" id="email" name="email" placeholder="Email"  value="<?php echo $this->input->post('email');?>">
                                    </div>

                                    <div class="form-group">
                                      <input type="tel" size="40" class="form-control" placeholder="Contact No." id="mobile" name="mobile" value="<?php echo $this->input->post('mobile');?>">
                                    </div>

                                    <div class="form-group">
                                      <input type="text" name="subject" value="<?php echo $this->input->post('subject');?>" size="40" class="form-control" placeholder="Subject">
                                    </div>

                                    <div class="form-group">
                                      <textarea name="message" class="form-control" rows="3" placeholder="Message"><?php echo $this->input->post('message');?></textarea>
                                    </div>

                                    <input type='submit' id='btnContact' name='btnContact' class="btn btn-orange btn-block btn_submit" value='Contact Us'></input>
                                  </form>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </main>
<?php }
elseif(@$pageData->page_slug == 'partner-with-us'){?>
<main class="sn_page_content sn_contact">
    <div class="container">
        <h3 class="pagehdr"><?php echo @$pageData->page_title;?></h3>
        <div class="sn_contactwrap">
            <div class="row no_padding">
                <div class="col-sm-12 col-md-12">
                    <div class="sn_contactblock_in sn_continfo_block" style="min-height: auto">
                        <?php echo @$pageData->page_content;?>
                        <div class="sn_contact_btn" ><a class="btn btn_prime" href="<?php echo base_url(); ?>/pages/contact-us" style="padding:11px 30px 0px 30px;">Get in touch</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php }
elseif(@$pageData->page_slug == 'hosting-standards-and-guidelines'){?>
<main class="sn_page_content sn_contact">
    <div class="container">
        <h3 class="pagehdr"><?php echo @$pageData->page_title;?></h3>
        <div class="sn_contactwrap">
            <div class="row no_padding">
                <div class="col-sm-12 col-md-12">
                    <div class="sn_contactblock_in sn_continfo_block">
                        <?php echo @$pageData->page_content;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php }else{?>
<main class="sn_page_content sn_contact">
    <div class="container">
        <h3 class="pagehdr"><?php echo @$pageData->page_title;?></h3>
        <div class="sn_contactwrap">
            <div class="row no_padding">
                <div class="col-sm-12 col-md-12">
                    <div class="sn_contactblock_in sn_continfo_block">
                        <?php echo @$pageData->page_content;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php }?>
<?php $this->load->view('footer');?>