<?php $memberId = getMemberUserID();?>

<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="utf-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta name="viewport" content="width=device-width, initial-scale=1">

<title><?php 

$urlCont = $this->router->fetch_class();$pageTitle = '';

if(isset($pageData)){

  $pageTitle = (isset($pageData->page_slug) and $pageData->page_slug=='home')?'Home':$pageData->page_title;

}

$getTitle=(!isset($title))?$pageTitle:$title;Title($getTitle);

?></title>

<?php $url = $this->router->fetch_class()."/".$this->router->fetch_method();

if($url == 'pages/index'){?>

  <meta name="title" content="Florida Holidays | Best price | 100%  Financial Protection | Book Now Pay Later | HolidayFloridas.co.uk"/>

  <meta name="keywords" content="florida deals, disney holidays 2017, florida villas, orlando holidays 2018"/>

  <meta name="description" content="Best Price Guarantee on Florida Holiday Packages. TTA & ATOL Protected. No hidden fees. Book now!"/>

<?php }?>

<?php $this->load->view('headjs');?>

</head>

<?php 

$url =$this->router->fetch_class()."/".$this->router->fetch_method();

if ($this->router->fetch_class() == 'pages' and $this->uri->segment(2) != '') {

  $url = $this->uri->segment(2);

}

//ECHO ' == '.$url;

?>

<body>

<header class="sn_header">

    <div class="container">

        <div class="row">

            <div class="col-sm-12 col-md-5">

                <div class="sn_logo">
                    <a href="<?php echo base_url();?>"><img src="<?php echo isset($settings[0]['site_logo'])?base_url().$settings[0]['site_logo']:''; ?>" class="img-responsive" alt="Logo"></a>
                </div>

            </div>

            <div class="col-sm-12 col-md-7">

                <nav class="navbar navbar-default" role="navigation">

                    <div class="container-fluid">

                        <!-- Brand and toggle get grouped for better mobile display -->

                        <div class="navbar-header">

                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".main_navbar">

                                <span class="sr-only">Toggle navigation</span>

                                <span class="icon-bar"></span>

                                <span class="icon-bar"></span>

                                <span class="icon-bar"></span>

                            </button>

                        </div>

                        

                        <!-- Collect the nav links, forms, and other content for toggling -->

                        <div class="collapse navbar-collapse main_navbar">

                            <ul class="nav navbar-nav navbar-right">

                                <li><a href="<?php echo base_url();?>pages/what-to-expect">What to Expect</a></li>

                                <li><a href="<?php echo base_url();?>upcoming-weddings">Upcoming Weddings</a></li>

                                <li><a href="<?php echo base_url();?>pages/wedding-bazaar">Wedding Bazaar</a></li>

                                <li><a href="<?php echo base_url();?>registration">Become a Host</a></li>

                                <?php if($memberId){?>

                                      <li class="sn_contact_btn"><a class="btn btn_prime" href="<?php echo base_url();?>user/profile">My Account</a></li>

                                <?php }else{?>

                                    <li class="sn_contact_btn"><a class="btn btn_prime" href="<?php echo base_url();?>registration">Sign Up / Sign In</a></li>

                                <?php }?>

                            </ul>

                        </div><!-- /.navbar-collapse -->

                    </div>

                </nav>

            </div>

        </div>

    </div>

</header>