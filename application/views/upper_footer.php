<section class="sn_features parallax-window" data-parallax="scroll" data-image-src="<?php echo base_url(); ?>assets/frontend/images/feature_bg.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="sn_feature_block">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="sn_ft_img sn_bg_red"><img src="<?php echo base_url(); ?>assets/frontend/images/ft_icon1.png" class="img-responsive center-block" alt="Image"></div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="sn_title"><?php echo @$usp['heading11'];?><span><?php echo @$usp['heading12'];?></span>
                                    </div>
                                    <ul class="m0">
                                        <li><?php echo @$usp['text11'];?></li>
                                        <li><?php echo @$usp['text12'];?></li>
                                        <li><?php echo @$usp['text13'];?></li>
                                        <li><?php echo @$usp['text14'];?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="sn_feature_block">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="sn_ft_img sn_bg_red"><img src="<?php echo base_url(); ?>assets/frontend/images/ft_icon2.png" class="img-responsive center-block" alt="Image"></div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="sn_title">
                                        <?php echo @$usp['heading21'];?>
                                        <span><?php echo @$usp['heading22'];?></span>
                                    </div>
                                    <ul class="m0">
                                        <li><?php echo @$usp['text21'];?></li>
                                        <li><?php echo @$usp['text22'];?></li>
                                        <li><?php echo @$usp['text23'];?></li>
                                        <li><?php echo @$usp['text24'];?></li>
                                    </ul>
                                </div>
                            </div>
                            
                            
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="sn_feature_block">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="sn_ft_img sn_bg_red"><img src="<?php echo base_url(); ?>assets/frontend/images/ft_icon3.png" class="img-responsive center-block" alt="Image"></div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="sn_title">
                                        <?php echo @$usp['heading31'];?>
                                        <span><?php echo @$usp['heading32'];?></span>
                                    </div>
                                    <ul class="m0">
                                        <li><?php echo @$usp['text31'];?></li>
                                        <li><?php echo @$usp['text32'];?></li>
                                        <li><?php echo @$usp['text33'];?></li>
                                        <li><?php echo @$usp['text34'];?></li>
                                    </ul>
                                </div>
                            </div>
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="sn_video parallax-window" data-parallax="scroll" data-image-src="<?php echo base_url(); ?>assets/frontend/images/videobg.jpg">
            
                <div class="sn_section_content">
                    <div class="container">
                        
                        <div class="row">
                            <div class="col-sm-10 col-sm-offset-1">
                                <div class="sn_in_block1">
                                    <div class="sn_sectionTitle">
                                        <span><?php echo @$about['about_heading'];?></span>
                                    </div>
                                    <p class="h3"><?php echo strip_tags(@$about['about_description']);?></p>
                                </div>
                            </div>
                        </div>

                        
                    </div>
                </div>
        </section>
        
        <section class="sn_partners">
            <div class="container">
                <div class="sn_sectionTitle">
                    Trade <span>Partners</span>
                </div>
                <ul class="list-inline list-unstyled sn_logo_list">
                    <?php 
                        if(is_array($partners)){
                        foreach($partners as $bkey=>$partner) {
                    ?>
                      <li><img src="<?php echo base_url().$partner['banner_image'];?>" class="img-responsive center-block" alt="Image"></li>
                    <?php }}?>
                </ul>
            </div>
        </section>
        
        <section class="sn_newsletter sn_bg_blue">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="sn_img"><img src="<?php echo base_url();?>assets/frontend/images/newsletter.png" class="img-responsive" alt="Image"></div>
                        <div class="sn_title">
                            <h3 class="m0 p0">Newsletter Subscription</h3>
                            <div class="clear5"></div>
                            <p class="mb0">Stay updated with our latest offers and news</p>
                        </div>
                    </div>
                    <div class="col-sm-5 col-sm-offset-1">
                        <div class="sn_form_wrap">
                            <div class="input-group">
                              <input type="text" class="form-control" placeholder="Your Email Address">
                              <span class="input-group-btn">
                                <button class="btn btn_theme" type="button">SUBSCRIBE</button>
                              </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>