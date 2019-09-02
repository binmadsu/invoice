//Main Document.Ready Ends
$(document).ready(function() {

    //HOME SLIDER Starts
    jQuery(document).ready(function($) {
      $('#sn_home_slider').owlCarousel({
        items: 1,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        loop: true,
        autoplay:true,
        margin: 10,
        items: 1,
        margin: 0,
        stagePadding: 0,
        smartSpeed: 450
      });
    });
    //HOME SLIDER Ends


        $('#sn_wedding_carousel').owlCarousel({
            loop:true,
            margin:0,
            nav:true,
            navText:['<i class="fa fa-chevron-left" aria-hidden="true"></i>','<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
            dots:true,
            responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:2
                    },
                    1024:{
                        items:3
                    },
                    1200:{
                        items:4
                    }
            }
        });


        $('#sn_services_carousel').owlCarousel({
            loop:true,
            margin:0,
            nav:true,
            navText:['<i class="fa fa-chevron-left" aria-hidden="true"></i>','<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
            dots:true,
            responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:2
                    },
                    1024:{
                        items:3
                    },
                    1200:{
                        items:4
                    }
            }
        });




         // Hide Header on on scroll down
        var didScroll;
        var lastScrollTop = 0;
        var delta = 5;
        var headerHeight = $('.sn_header').outerHeight();

        $(window).scroll(function(event){
            didScroll = true;
        });

        setInterval(function() {
            if (didScroll) {
                hasScrolled();
                didScroll = false;
            }
        }, 250);

        function hasScrolled() {
            var st = $(this).scrollTop();
            
            // Make sure they scroll more than delta
            if(Math.abs(lastScrollTop - st) <= delta)
                return;

            
            
            // If they scrolled down and are past the navbar, add class .nav-up.
            // This is necessary so you never see what is "behind" the navbar.
            if (st > lastScrollTop && st > headerHeight){
                // Scroll Down
                $('.sn_header').removeClass('nav-down').addClass('nav-up');
                $('.sn_header').css('top',(-headerHeight));
                

            } else {
                // Scroll Up
                if(st + $(window).height() < $(document).height()) {
                    $('.sn_header').removeClass('nav-up').addClass('nav-down');
                    $('.sn_header').css('top',0);

                }
            }
            
            lastScrollTop = st;
        }


          $(function() {
            var headerHeight = $('.sn_header').outerHeight();
            $('a[href*=#]:not([href=#])').click(function() {
              if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') 
                && location.hostname == this.hostname) {

                var target = $(this.hash);
              target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
              if (target.length) {
                $('html,body').animate({
                  scrollTop: target.offset().top - headerHeight //offsets for fixed header
                }, 1000);
                return false;
              }
            }
          });
          //Executed on page load with URL containing an anchor tag.
          if($(location.href.split("#")[1])) {
            var target = $('#'+location.href.split("#")[1]);
            if (target.length) {
              $('html,body').animate({
                  scrollTop: target.offset().top - headerHeight //offset height of header here too.
                }, 1000);
              return false;
            }
          }
        });
    



 
}); //Main Document.Ready Ends

