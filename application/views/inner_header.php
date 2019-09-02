<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php if (isset($meta_title)) echo $meta_title; ?></title>

 
<meta name="title" content="<?php if (isset($meta_title)) echo $meta_title; ?>"/>
<meta name="description" content="<?php if (isset($meta_description)) echo $meta_description; ?>"/>
<meta name=keywords content="<?php if (isset($meta_keywords)) echo $meta_keywords; ?>"/>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/owl.carousel.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/owl.theme.default.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/animate.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/select2.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/main.css">
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/frontend/images/favicon.png">
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-NXV2W6S');</script>
<!-- End Google Tag Manager -->
<script type="text/javascript">
(function(a,e,c,f,g,h,b,d){var k={ak:"849877541",cl:"VqzDCPXY-XEQpbSglQM",autoreplace:"0203 744 3070"};a[c]=a[c]||function(){(a[c].q=a[c].q||[]).push(arguments)};a[g]||(a[g]=k.ak);b=e.createElement(h);b.async=1;b.src="//www.gstatic.com/wcm/loader.js";d=e.getElementsByTagName(h)[0];d.parentNode.insertBefore(b,d);a[f]=function(b,d,e){a[c](2,b,k,d,null,new Date,e)};a[f]()})(window,document,"_googWcmImpl","_googWcmGet","_googWcmAk","script");
</script>
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<?php 
    $url =$this->router->fetch_class()."/".$this->router->fetch_method();
    if ($this->router->fetch_class() == 'pages' and $this->uri->segment(2) != '') {
      $url = $this->uri->segment(2);
    }
    /*if ($this->router->fetch_class() == 'category' and $this->uri->segment(3) != '') {
      $url =$this->router->fetch_class()."/".$this->router->fetch_method()."/".$this->uri->segment(3);
    }*/
    //ECHO ' == '.$url;
    $listingPage = '';
    if($url == 'package/index')
      $listingPage = 'sn_inhdr';
?>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NXV2W6S"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<header class="sn_header sn_inhdr">
    <div class="sn_hdr_top">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <div class="sn_logo">
                       <a href="<?php echo base_url();?>"><img src="<?php echo isset($settings[0]['site_logo'])?base_url().$settings[0]['site_logo']:''; ?>" class="img-responsive" alt="Holiday Floridas Logo"> </a>
                    </div>
                </div>
                <div class="col-sm-5 col-md-5 col-lg-6">
                   <div class="sn_contact_block">
                       <div class="sn_contact_info">
                            <h4 class="sn_text_red"> For A Florida Holiday Like Never Before</h4>
                            <div class="sn_info_list">
                                <div class="media">
                                    <span class="pull-left sn_hp_icon">
                                        <img src="<?php echo base_url();?>assets/frontend/images/headphone-icon.png" class="media-object" alt="Image">
                                    </span>
                                    <span class="media-body">
                                        <span class="sn_phone_lg"><span>Call Now</span> 0203 744 3070
</span> 
                                        <p class="sn_call_msg">Calls answered in less than <span>60 Seconds</span></p>
                                    </span>
                                </div>
                            </div>
                        </div>
                   </div>
                    
                </div>
                <div class="col-sm-3 col-md-3 col-lg-2">
                    <div class="sn_enqBlock">
                        <span class="sn_title">TIMING</span> <div class="clearfix"></div><span class="info_content"><i class="icon sn_text_red fa fa-clock-o"></i> 08:00AM - 11:00PM</span>
                        <div class="clearfix"></div>
        <a class="sn_enqBtn btn btn_theme" data-hotelname="Disney"  s="" all-star="" movies="" resort="" data-toggle="modal" href="#make_enq_Modal">
                        GET AN INSTANT QUOTE</a>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    
    
    <div class="sn_hdr_btm">
        <nav class="navbar navbar-default yamm sn_bg_blue">
          <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed btn_theme" data-toggle="collapse" data-target="#mainNavbar" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand hidden-lg hidden-md" href="tel:0203 744 3070
">Call us on : 0203 744 3070
</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="mainNavbar">
              <ul class="nav navbar-nav">
                <li <?php if($url=="pages/index") { echo 'class="active"'; }?>><a href="<?php echo base_url();?>"><i class="fa fa-home"></i> <span class="sr-only">(current)</span></a></li>
                <li><a href="<?php echo base_url();?>package/hotdeals">Hot Deals</a></li>
                <li class="dropdown yamm-fw"><a href="<?php echo base_url().'package/florida-villas-holidays/';?>" data-toggle="dropdown1" class="dropdown-toggle">Florida Villas <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li>
                      <div class="yamm-content">
                        <div class="row">
                        
                          <?php 
						  if(sizeof(@$florida_villa)>0){
						  foreach($florida_villa as $val1){?>
                          <div class="col-xs-6 col-sm-2">
                            <?php $pkslug = getSlugById('1','tbl_categories');?>
                            <a href="<?php echo base_url()."$pkslug/".$val1['slug'];?>" class="sn_navthumb">
                              <figure><img class="img-responsive" src="<?php echo base_url().$val1['banner_image'];?>" alt=""></figure>
                              <h4><?php echo $val1['hotel_name']?></h4>
                            </a>
                          </div>
                          <?php }}?>
                          
                        </div>
                        <a href="<?php echo base_url().'package/florida-villas-holidays/';?>" class="sn_viewAllLink">View All Florida Villas <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                      </div>
                    </li>
                  </ul>
                </li>
                <li class="dropdown yamm-fw"><a href="<?php echo base_url().'package/florida-hotels-holidays/';?>" data-toggle="dropdown1" class="dropdown-toggle">Florida Hotels <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li>
                      <div class="yamm-content">
                        <div class="row">
                        <?php 
						if(sizeof(@$florida_hotel)>0){
						foreach($florida_hotel as $val2){?>  
                         <div class="col-xs-6 col-sm-2">
                            <?php $pkslug2 = getSlugById('2','tbl_categories');?>
                            <a href="<?php echo base_url()."$pkslug2/".$val2['slug'];?>" class="sn_navthumb">
                              <figure><img class="img-responsive" src="<?php echo base_url().$val2['banner_image']; ?>" alt=""></figure>
                              <h4><?php echo $val2['hotel_name']?></h4>
                            </a>
                          </div>
                          <?php }}?>
                        </div>
                        <a href="<?php echo base_url().'package/florida-hotels-holidays/';?>" class="sn_viewAllLink">View All Florida Hotels <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                      </div>
                    </li>
                  </ul>
                </li>
                <li class="dropdown yamm-fw"><a href="<?php echo base_url().'package/walt-disney-holidays/'?>" data-toggle="dropdown1" class="dropdown-toggle">Walt Disney Holidays <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li>
                      <div class="yamm-content">
                        <div class="row">
                          <?php 
						 
			if(sizeof(@$walt_disney)>0){
			        foreach($walt_disney as $val3){?>  
                         <div class="col-xs-6 col-sm-2">
                            <?php $pkslug3 = getSlugById('4','tbl_categories');?>
                            <a href="<?php echo base_url()."$pkslug3/".$val3['slug'];?>" class="sn_navthumb">
                              <figure><img class="img-responsive" src="<?php echo base_url().$val3['banner_image']; ?>" alt=""></figure>
                              <h4><?php echo $val3['hotel_name']?></h4>
                            </a>
                          </div>
                          <?php }}?>
                           
                        </div>
                        <a href="<?php echo base_url().'package/walt-disney-holidays/'?>" class="sn_viewAllLink">View All Walt Disney Holidays <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                      </div>
                    </li>
                  </ul>
                </li>
                <li class="dropdown yamm-fw"><a href="<?php echo base_url();?>package/premium-florida-holidays/" data-toggle="dropdown1" class="dropdown-toggle">Premium Florida <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li>
                      <div class="yamm-content">
                        <div class="row">
                          
                          <?php 
		          if(sizeof(@$florida_premimum)>0){
			     foreach($florida_premimum as $val4){?>  
                         <div class="col-xs-6 col-sm-2">
                            <?php $pkslug4 = getSlugById('5','tbl_categories');?>
                              <a href="<?php echo base_url()."$pkslug4/".$val4['slug'];?>" class="sn_navthumb">
                              <figure><img class="img-responsive" src="<?php echo base_url().$val4['banner_image']; ?>" alt=""></figure>
                              <h4><?php echo $val4['hotel_name']?></h4>
                            </a>
                          </div>
                          <?php }}?>
                           
                        </div>
                        <a href="<?php echo base_url();?>package/premium-florida-holidays/" class="sn_viewAllLink">View All Premium Florida <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                      </div>
                    </li>
                  </ul>
                </li>
                <li class="dropdown yamm-fw"><a href="<?php echo base_url().'holidayflydrive';?>" data-toggle="dropdown1" class="dropdown-toggle">Fly Drive Holidays </a>
                  <!--<ul class="dropdown-menu">
                    <li>
                      <div class="yamm-content">
                        <div class="row">
                          
                          <div class="col-xs-6 col-sm-2">
                            <a href="#" class="sn_navthumb">
                              <figure><img class="img-responsive" src="images/pack4.jpg" alt=""></figure>
                              <h4>Florida Holidays Title 4</h4>
                            </a>
                          </div>
                          
     
                           
                          
                        </div>
                        <a href="<?php echo base_url().'flightsonly';?>" class="sn_viewAllLink">View All Fly Drive Holidays <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                      </div>
                    </li>
                  </ul>-->
                </li>
                <li class="dropdown yamm-fw"><a href="<?php echo base_url().'package/attraction';?>" data-toggle="dropdown1" class="dropdown-toggle">Theme Park Tickets</a>
                  <!--<ul class="dropdown-menu">
                    <li>
                      <div class="yamm-content">
                        <div class="row">
                          <div class="col-xs-6 col-sm-2">
                            <a href="#" class="sn_navthumb">
                              <figure><img class="img-responsive" src="images/pack4.jpg" alt=""></figure>
                              <h4>Florida Holidays Title 4</h4>
                            </a>
                          </div>
                           
                           
                           
                       
                      
                        </div>
                        <a href="<?php echo base_url();?>" class="sn_viewAllLink">View All Theme Park Tickets <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                      </div>
                    </li>

                  </ul>-->
                </li>
                <li class="dropdown yamm-fw"><a href="<?php echo base_url().'flightsonly';?>" data-toggle="dropdown1" class="dropdown-toggle"> Flights Only</a>
                  <!--<ul class="dropdown-menu">
                    <li>
                      <div class="yamm-content">
                        <div class="row">
                          <div class="col-xs-6 col-sm-2">
                            <a href="#" class="sn_navthumb">
                              <figure><img class="img-responsive" src="images/pack1.jpg" alt=""></figure>
                              <h4>Florida Holidays Title 1</h4>
                            </a>
                          </div>
                
                   
                    
                        </div>
                        <a href="<?php echo base_url();?>" class="sn_viewAllLink">View All Flights Only <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                      </div>
                    </li>
                  </ul>-->
                </li>
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
    </div>
</header>