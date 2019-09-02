<?php $this->load->view('header');?>

<section class="sn_hSlider">

    <div id="sn_home_slider" class="owl-carousel owl-theme">

        <?php //print_r($banners);die;

        $cnt=0;

        if(is_array($banners)){

            foreach($banners as $bkey=>$banner) {

            $cnt++;?>

            <div class="item">

                <img src="<?php echo base_url().$banner['banner_image'];?>" class="fitImg" alt="Slide">

                <?php /*?><div class="container">

                    <div class="sn_caption_wrap animated6">

                        <div class="sn_slide_title animated3">

                            <p class="sn_text_red"><?php echo @$banner['heading1'];?></p> <?php echo @$banner['heading2'];?>

                        </div>

                        <div class="sn_capText animated4"><p><?php echo html_entity_decode(@$banner['description']);?></p></div>

                    </div>

                </div><?php */?>

            </div>

        <?php }}?>

    </div>

    <a href="#sn_about" class="scroll_down_arrow_cont">

        <div class="scroll_down_arrow"></div>

    </a>

</section>





<section id="sn_about" class="sn_intro">

    <div class="container">

        <div class="sn_secTitle">

            <h1><span><?php echo @$about['about_heading'];?></span> <span class="sn_heading"><?php echo @$about['about_heading2'];?></span></h1>

        </div>

        <div class="clear30"></div>

        <div class="row">

            <div class="col-sm-10 col-sm-offset-1">

                <?php echo @$about['about_description'];?>

                <img src="<?php echo base_url();?>assets/frontend/images/liveit.png" class="img-responsive center-block" alt="Live It">

            </div>



            <div class="sn_statistics">

                <div class="row">

                    <div class="col-sm-8 col-sm-offset-2">

                        <div class="row">

                            <?php if(isset($about['weddings']) and $about['weddings']){?>
                                <div class="col-sm-4">
                                    <div class="sn_statitem">
                                        <h1 class="counter"><?php echo @$about['weddings'];?><sup>+</sup></h1>
                                        <p>Royal Weddings</p>
                                    </div>
                                </div>
                            <?php }?>

                            <?php if(isset($about['location']) and $about['location']){?>
                                <div class="col-sm-4">
                                    <div class="sn_statitem">
                                        <h1 class="counter"><?php echo @$about['location'];?><sup>+</sup></h1>
                                        <p>Weddings Locations</p>
                                    </div>
                                </div>
                            <?php }?>

                            <?php if(isset($about['guests']) and $about['guests']){?>
                                <div class="col-sm-4">
                                    <div class="sn_statitem">
                                        <h1 class="counter"><?php echo @$about['guests'];?><sup>+</sup></h1>
                                        <p>Guest Visited</p>
                                    </div>
                                </div>
                            <?php }?>
                            
                        </div>

                    </div>

                </div>

            </div>

            <img src="<?php echo base_url();?>assets/frontend/images/flower-bg.png" class="img-responsive center-block" alt="Image">

        </div>

    </div>

</section>



<section class="sn_weddings">

    <div class="container">

        <div class="sn_secTitle">

            <h1><span>GALLERY</span> <span class="sn_heading">Upcoming Marriages</span></h1>

        </div>

            

            <div id="sn_wedding_carousel" class="owl-carousel owl-theme">

                <?php if(count($weddings) > 0){

                    foreach ($weddings as $key => $wed) {

                ?>

                <div class="item">

                    <div class="sn_wedding_block sn_transistion">

                        <figure>

                            <img src="<?php echo base_url().$wed['banner_image'];?>" class="fitImg center-block" alt="Wedding">

                        </figure>

                        <h4><?php echo @$wed['wedding_title'];?></h4>

                        <p><strong>Location:</strong> <?php echo @$wed['location'];?></p>

                        <!-- <a href="#" class="btn btn-sm btn-default btn_round">PHOTO GALLERY</a> -->

                    </div>

                </div>

                <?php }}?>

            </div>





            <div class="text-center sn_cta_group">

                <a class="btn btn_black btn_round" href="<?php echo base_url();?>upcoming-weddings">More Marriages</a>
                <?php /*?> <a class="btn btn_black btn_round" href="#">MORE RECENT WEDDINGS</a>
                <a class="btn btn_prime btn_round" href="#">VIEW UPCOMING WEDDINGS</a><?php */?>

            </div>





        

    </div>

</section>



<section class="sn_services">

    <div class="container">

        <div class="sn_secTitle">

            <h1><span>SERVICES FOR GUESTS</span> <span class="sn_heading">Celebrations in Style</span></h1>

        </div>



        <div id="sn_services_carousel" class="owl-carousel owl-theme">

            <?php //print_r($packages);die;

            $cnt=0;

            if(is_array($packages)){

                foreach($packages as $bkey=>$cat) {$cnt++;?>

                <div class="item">

                    <a class="sn_service_block" href="<?php echo base_url().'service/'.$cat['slug'];?>">

                        <figure>

                            <img src="<?php echo base_url().$cat['banner_image'];?>" class="img-responsive fitImg" alt="Image">

                            <figcaption>

                                <p class="servicename h4"><?php echo @$cat['category_title'];?></p>

                                <span class="sn_arrow sn_transistion">

                                    <i class="fa fa-angle-right" aria-hidden="true"></i>

                                </span>

                            </figcaption>

                        </figure>

                    </a>

                </div>

            <?php }}?>

        </div>



        

    </div>

</section>

<?php $this->load->view('footer');?>