jQuery(document).ready(function($) {

    var ocPortfolio = $("#oc-portfolio");

    ocPortfolio.owlCarousel({
            margin: 30,
            nav: true,
            navText: ['<i class="icon-angle-left"></i>','<i class="icon-angle-right"></i>'],
            autoplay: true,
            autoplayHoverPause: true,
            dots: false,
            responsive:{
                    0:{ items:1 },
                    600:{ items:2 },
                    1000:{ items:3 },
                    //1200:{ items:4 }
            }
    });
    
    var ocProducts = $("#oc-products");

    ocProducts.owlCarousel({
            margin: 20,
            nav: true,
            navText: ['<i class="icon-angle-left"></i>','<i class="icon-angle-right"></i>'],
            autoplay: true,
            autoplayHoverPause: true,
            dots: false,
            responsive:{
                    0:{ items:1 },
                    600:{ items:2 },
                    1000:{ items:3 },
                    1200:{ items:4 },
                    1200:{ items:5 }
            }
    });
    
    
    jQuery(document).ready(function($) {

        var ocClients = $("#oc-portfolio-sidebar");
        ocClients.owlCarousel({
                items: 1,
                margin: 10,
                loop: true,
                nav: false,
                autoplay: true,
                dots: true,
                autoplayHoverPause: true
        });

    });
    
    $('.goToFooter').on('click', function(){
        $(this).parent().find('.current_page_item').removeClass('current_page_item');
        $(this).addClass('current_page_item');
        $('body,html').stop(true).animate({scrollTop:$('#footer').offset().top},400);
    });
   

});