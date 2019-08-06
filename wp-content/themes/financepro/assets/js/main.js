jQuery(document).ready(function($){
	"use strict";

	//new WOW().init();
	
    /* Scroll to top */
    $('.scrollToTop').on('click',function(){
        $('html, body').animate({scrollTop : 0},800);
        return false;
    });
    $(window).scroll(function(){
        if ($(this).scrollTop() > 100) {
            $('.scrollToTop').fadeIn();
        } else {
            $('.scrollToTop').fadeOut();
        }
    });

    /* Nav smooth scroll */
    $('#site-navigation .menu').onePageNav({
        extraOffset: FinanceObj.extraOffset,
    });
	
    /* Search Box */
    $(".search-box-area").on('click', '.search-button', function(event){
        event.preventDefault();
        var v = $(this).prev('.search-text');
        if(v.hasClass('active')){
            v.removeClass('active');
        }
        else{
            v.addClass('active');
        }
        return false;
    });


    /* MeanMenu - Mobile Menu */
    $('#site-navigation nav').meanmenu({
        meanMenuContainer: '#meanmenu',
        meanScreenWidth: FinanceObj.meanWidth,
        removeElements: "#masthead",
        siteLogo: FinanceObj.siteLogo
    });

    /* Header Right Menu */
    $('.additional-menu-area').on('click', '.side-menu-trigger', function (e) {
    	e.preventDefault();
        $('.sidenav').width(280);
    });
    $('.additional-menu-area').on('click', '.closebtn', function (e) {
        e.preventDefault();
        $('.sidenav').width(0);
    });

    /* Mega Menu */
    $('.site-header .main-navigation ul > li.mega-menu').each(function() {
        // total num of columns
        var items = $(this).find(' > ul.sub-menu > li').length;
        // screen width
        var bodyWidth = $('body').outerWidth();
        // main menu link width
        var parentLinkWidth = $(this).find(' > a').outerWidth();
        // main menu position from left
        var parentLinkpos = $(this).find(' > a').offset().left;

        var width = items * 220;
        var left  = (width/2) - (parentLinkWidth/2);

        var linkleftWidth  = parentLinkpos + (parentLinkWidth/2);
        var linkRightWidth = bodyWidth - ( parentLinkpos + parentLinkWidth );

        // exceeds left screen
        if( (width/2)>linkleftWidth ){
            $(this).find(' > ul.sub-menu').css({
                width: width + 'px',
                right: 'inherit',
                left:  '-' + parentLinkpos + 'px'
            });        
        }
        // exceeds right screen
        else if ( (width/2)>linkRightWidth ) {
            $(this).find(' > ul.sub-menu').css({
                width: width + 'px',
                left: 'inherit',
                right:  '-' + linkRightWidth + 'px'
            }); 
        }
        else{
            $(this).find(' > ul.sub-menu').css({
                width: width + 'px',
                left:  '-' + left + 'px'
            });            
        }
    });	
	
	/*header content gap*/
	var Hh1 = $('.header-area'),
	Hh1slider = Hh1.parents('body').find("#header-area-space"),	
	isAdmin = $( "body" ).hasClass( "admin-bar" ),
	isMobile_view = $( "#masthead" ).hasClass( "mean-remove" ),
	adminBarHeight,
	totalHeight,
	mHeight;
	if (isAdmin == true){
		adminBarHeight = 32;
	} else {
		adminBarHeight = 0;
	}
	
	if ( isMobile_view == false ){
		if(Hh1.length){
			mHeight = $('body .header-area').outerHeight();		
			totalHeight = mHeight - adminBarHeight;
			Hh1slider.css("margin-top", totalHeight + 'px');
		}
	}
	
    /* Sticky Menu */
    if ( FinanceObj.stickyMenu == 1 || FinanceObj.stickyMenu == 'on' ) {
		
		$(window).on('scroll', function () {
								
				var s = $('#sticker'),
					w = $('body'),
					h = s.outerHeight(),
					windowpos = $(window).scrollTop(),
					windowWidth = $(window).width(),
					h1 = s.parent('#header-1'),
					h2 = s.parent('#header-2'),
					h3 = s.parent('#header-3'),
					h4 = s.parent('#header-4'),
					h5 = s.parent('#header-5'),
					h6 = s.parent('#header-6'),
					h7 = s.parent('#header-7'),
					h1H = h1.find('.header-top-bar').outerHeight(),
					topBar = s.prev('.header-top-bar'),
					topBarP = w.hasClass('has-topbar'),
					tempMenu;
				if (windowWidth > 991) {
					
					w.css('padding-top', '');
					var topBarH, mBottom = 0;
					
				/*header 1 & header 2*/
				if ( h1.length || h2.length || h5.length ) {
					if (topBarP == true) {
					
						topBarH = topBar.outerHeight();
						if (windowpos <= topBarH) {
							if (h1.hasClass('header-fixed') || h2.hasClass('header-fixed') || h5.hasClass('header-fixed')) {
								h1.css('top', '-' + windowpos + 'px');
								h2.css('top', '-' + windowpos + 'px');
								h5.css('top', '-' + windowpos + 'px');
							}
						}
						
						if (windowpos >= topBarH) {
							if (h1.length || h2.length || h5.length) {
								s.addClass('stickp');
								$('.header-fixed').addClass('bottomBorder');
								w.removeClass("non-stickh");
								w.addClass("stickh");
							}
							if (h1.length || h2.length || h5.length) {
								if (h1.hasClass('header-fixed') || h2.hasClass('header-fixed')) {
									h1.css('top', '-' + topBarH + 'px');
									h2.css('top', '-' + topBarH + 'px');
									h5.css('top', '-' + topBarH + 'px');
								} 
							} 
						} else {
							s.removeClass('stickp');
							$('.header-fixed').removeClass('bottomBorder');
							w.removeClass("stickh");
							w.addClass("non-stickh");
						}
					
					} else {
						if (windowpos == 0) {
							if (h1.length || h2.length || h5.length) {
								s.addClass('stickp');
								$('.header-fixed').removeClass('bottomBorder');
								w.removeClass("non-stickh");
								w.addClass("stickh");
							}
							if (h1.length || h2.length || h5.length) {
								if (h1.hasClass('header-fixed') || h2.hasClass('header-fixed') || h5.hasClass('header-fixed')) {
									h1.css('top', '-' + topBarH + 'px');
									h2.css('top', '-' + topBarH + 'px');
									h5.css('top', '-' + topBarH + 'px');
								}
							} 
						} else {
							s.removeClass('stickp');
							$('.header-fixed').addClass('bottomBorder');
							w.removeClass("stickh");
							w.addClass("non-stickh");
						}
					}
				}
				/*header 5*/
				if ( h5.length ) {
					if (topBarP == true) {
					
						topBarH = topBar.outerHeight();
						if (windowpos <= topBarH) {
							if (h5.hasClass('header-fixed')) {
								h5.css('top', '-' + windowpos + 'px');
							}
						}
						
						if (windowpos >= topBarH) {
							if (h5.length) {
								s.addClass('stickp');
								$('.header-fixed').addClass('bottomBorder');
								w.removeClass("non-stickh");
								w.addClass("stickh");
							}
							if (h5.length) {
								if (h5.hasClass('header-fixed')) {									
									h5.css('top', '-' + 36 + 'px');
								} 
							} 
						} else {
							s.removeClass('stickp');
							$('.header-fixed').removeClass('bottomBorder');
							w.removeClass("stickh");
							w.addClass("non-stickh");
						}
					
					} else {
						if (windowpos == 0) {
							if (h5.length) {
								s.addClass('stickp');
								$('.header-fixed').removeClass('bottomBorder');
								w.removeClass("non-stickh");
								w.addClass("stickh");
							}
							if (h5.length) {
								if (h5.hasClass('header-fixed')) {
									h5.css('top', '-' + topBarH + 'px');
								}
							} 
						} else {
							s.removeClass('stickp');
							$('.header-fixed').addClass('bottomBorder');
							w.removeClass("stickh");
							w.addClass("non-stickh");
						}
					}
				}
				/*header 3*/
				var headerFirstrow = $('.header-firstrow').outerHeight(), h3heightGap;
				if (h3.length) {
					topBarH = topBar.outerHeight();
					h3heightGap = headerFirstrow + topBarH;
					if (windowpos <= h3heightGap) {
						if (h3.hasClass('header-fixed')) {
							h3.css('top', '-' + windowpos + 'px');
						}
					}
				
					if (windowpos >= h3heightGap) {
						if (h3.length) {
							s.addClass('stickp');
							$('.header-fixed').addClass('bottomBorder');
							w.removeClass("non-stickh");
							w.addClass("stickh");
						}
						if (h3.length) {
							if (h3.hasClass('header-fixed')) {
								h3.css('top', '-' + h3heightGap + 'px');
							} else {
								w.css('padding-top', h + 'px');
							}
						} 
					} else {
						s.removeClass('stickp');
						$('.header-fixed').removeClass('bottomBorder');
						w.removeClass("stickh");
						w.addClass("non-stickh");
						if (h3.length) {
							w.css('padding-top', 0);
						}
					}
				}
					
				/*header 4*/
				var headerFirstrow = $('.header-firstrow').outerHeight(), h4heightGap;
				if (h4.length) {
					topBarH = topBar.outerHeight();
					h4heightGap = headerFirstrow + topBarH;
					if (windowpos <= h4heightGap) {
						if (h4.hasClass('header-fixed')) {
							h4.css('top', '-' + windowpos + 'px');
						}
					}
				
					if (windowpos >= h4heightGap) {
						if (h4.length) {
							s.addClass('stickp');
							$('.header-fixed').addClass('bottomBorder');
							
							w.removeClass("non-stickh");
							w.addClass("stickh");

						}
						if (h4.length) {
							if (h4.hasClass('header-fixed')) {
								h4.css('top', '-' + h4heightGap + 'px');
							}
						} 
					} else {
						s.removeClass('stickp');
						$('.header-fixed').removeClass('bottomBorder');
						
							w.removeClass("stickh");
							w.addClass("non-stickh");
					}
				}
				
				/*header 6*/
				var headerFirstrow = $('.header-firstrow').outerHeight(), h6heightGap,
					navBarPosition = $('.header-style-6 .nav-area').outerHeight();
				if (h6.length) {
					topBarH = topBar.outerHeight();
					h6heightGap = headerFirstrow + topBarH;
					if (windowpos <= h6heightGap) {
						if (h6.hasClass('header-fixed')) {
							h6.css('top', '-' + windowpos + 'px');
						}
					}
					if (windowpos >= h6heightGap) {
						if (h6.length) {
							s.addClass('stickp');							
							$('.header-fixed').addClass('bottomBorder');
							
						w.removeClass("non-stickh");
						w.addClass("stickh");				
						}
						if (h6.length) {
							if (h6.hasClass('header-fixed')) {
								h6.css('top', '-' + h6heightGap + 'px');
							} else {
								w.css('padding-top', h + 'px');
							}
						} 
					} else {
						s.removeClass('stickp');
						$('.header-fixed').removeClass('bottomBorder');
						
							w.removeClass("stickh");
							w.addClass("non-stickh");	
						
						if (h6.length) {
							w.css('padding-top', 0);
						}
					}
					if (windowpos <= h6heightGap) {
						if (h6.hasClass('header-fixed')) {
							h6.removeClass('h6-fixed');
						}
					} else {
						if (h6.hasClass('header-fixed')) {
							h6.addClass('h6-fixed');
						}						
					}
					
				}
				
				var headerFirstrow = $('.header-firstrow').outerHeight(), h7heightGap;
				if (h7.length) {
					topBarH = topBar.outerHeight();
					h7heightGap = headerFirstrow + topBarH;
					if (windowpos <= h7heightGap) {
						if (h7.hasClass('header-fixed')) {
							h7.css('top', '-' + windowpos + 'px');
						}
					}
				
					if (windowpos >= h7heightGap) {
						if (h7.length) {
							s.addClass('stickp');
							$('.header-fixed').addClass('bottomBorder');
							
							w.removeClass("non-stickh");
							w.addClass("stickh");

						}
						if (h7.length) {
							if (h7.hasClass('header-fixed')) {
								h7.css('top', '-' + h7heightGap + 'px');
							}
						} 
					} else {
						s.removeClass('stickp');
						$('.header-fixed').removeClass('bottomBorder');
						
							w.removeClass("stickh");
							w.addClass("non-stickh");
					}
				}
				/*---*/
				
			} //checking window width
		});
		
	}

	
    /* Owl Custom Nav */
    if (typeof $.fn.owlCarousel == 'function') {
        $(".owl-custom-nav .owl-next").on('click', function() {
            $(this).closest('.owl-wrap').find('.owl-carousel').trigger('next.owl.carousel');
        });
        $(".owl-custom-nav .owl-prev").on('click', function() {
            $(this).closest('.owl-wrap').find('.owl-carousel').trigger('prev.owl.carousel');
        });
		
        $(".rt-owl-carousel").each(function() {
            var options = $(this).data('carousel-options');
            if ( FinanceObj.rtl == 'yes' ) {
                options['rtl'] = true; //@rtl
            }
            $(this).owlCarousel(options); 
        });
    }

	/*VC JS*/
    /* Counter */
    if ( typeof $.fn.counterUp == 'function') { 
        $('.rt-vc-counter .rt-counter').counterUp({
            delay: $(this).data('rtSteps'),
            time: $(this).data('rtSpeed')
        });
    }
	
	/* Team Slider 3 Detail*/
    $(".rtin-team-box").on({
        mouseenter: function(){
            var bghover = $(this).data('bghover');
            $(this).find(".rtin-single-team").css('background-color', bghover);
        },
        mouseleave: function(){
            var bgcolor = $(this).data('bgcolor');
            $(this).find(".rtin-single-team").css('background-color', bgcolor);          
        }
    }, this);
	
	/*Team Slider 6 Detail*/	
    $('.member-slideshow img').on('click', function(event) {
        var displayTarget = $("#product-1");
        displayTarget.find('.single-team').removeClass('active');
        var id = $(this).attr('data-id');
        var targetClass = ".product-gallery-img-" + id;
        console.log(targetClass);
        displayTarget.find(targetClass).addClass('active');

    });
	/* Pricing Box 1 */
    $(".rt-price-table-box1").on({
        mouseenter: function(){
            var bghover = $(this).data('bghover');
            $(this).css('background-color', bghover);
            $(this).find(".rt-btn a , .price-holder , a.pricetable-btn").css('color', bghover);
			
        },
        mouseleave: function(){
            var bgcolor = $(this).data('bgcolor');
            $(this).css('background-color', bgcolor);
            $(this).find(".rt-btn a").css('color', '');          
            $(this).find(".price-holder").css('color', bgcolor);
			$(this).find("a.pricetable-btn").css('color', '#f8f8f8');
        }
    }, this);
			
	/* Service Box 6 - grid & slider also */
    $(".rt-service-layout-6").on({
        mouseenter: function(){
            var bghover = $(this).data('bghover');
            $(this).css('background-color', bghover);
        },
        mouseleave: function(){
            var bgcolor = $(this).data('bgcolor');
            $(this).css('background-color', bgcolor);
        }
    }, this);
	
	/* Infobox 1 */
    $(".rt-info-text").on({
        mouseenter: function(){
            var title_hover = $(this).data('title-hover');
            $(this).find(".media-heading , .media-heading a").css('color', title_hover);
        },
        mouseleave: function(){
            var title_color = $(this).data('title-color');
            $(this).find(".media-heading , .media-heading a").css('color', title_color);			
        }
    }, this);
	
	/* Infobox 5 */	
	$('.rt-infobox-5').each(function() {
        var $column = $(this).closest('.vc_column-inner');
        var bgcolor = $column.css('background-color');
        var bghover = $(this).data('hover');
        $column.on({
            mouseenter: function(){
                $column.attr('style', 'background-color: '+ bghover +' !important');
            },
            mouseleave: function(){
                $column.attr('style', 'background-color: '+ bgcolor +' !important');
            }
        });
    });
	/*Light Box*/
	if ($('.gallery-wrapper, #gallery-wrapper').length) {

		$('.gallery-wrapper, #gallery-wrapper').magnificPopup({
			type: 'image',
			delegate: 'a.pfp-zoom',
			gallery: {
				enabled: true
			}
		});
		
	}
	/* Isotope initialization */
	var $container = $('#inner-isotope');
	if ($container.length > 0) {

		// Isotope initialization
		var $isotope = $container.find('.featuredContainer').isotope({
			filter: '*',
			animationOptions: {
				duration: 750,
				easing: 'linear',
				queue: false
			}
		});

		// Isotope filter
		$container.find('.rt-portfolio-tab').on('click', 'a', function () {

			var $this = $(this);
			$this.parent('.rt-portfolio-tab').find('a').removeClass('current');
			$this.addClass('current');
			var selector = $this.attr('data-filter');
			$isotope.isotope({
				filter: selector,
				animationOptions: {
					duration: 750,
					easing: 'linear',
					queue: false
				}
			});
			return false;

		});
	}
    /* Woocommerce Shop change view */
    $('#shop-view-mode li a').on('click',function(){
        $('body').removeClass('product-grid-view').removeClass('product-list-view');

        if ( $(this).closest('li').hasClass('list-view-nav')) {
            $('body').addClass('product-list-view');
            Cookies.set('shopview', 'list');
        }
        else{
            $('body').addClass('product-grid-view');
            Cookies.remove('shopview');
        }
        return false;
    });
	
	
});

(function($){
    "use strict";

    // Window Load+Resize
    $(window).on('load resize', function () {
        // Define the maximum height for mobile menu
        var wHeight = $(window).height();
        wHeight = wHeight - 50;
        $('.mean-nav > ul').css('max-height', wHeight + 'px');
    });

    // Window Load
    $(window).on('load', function () {
        // Preloader
        $('#preloader').fadeOut('slow', function () {
            $(this).remove();
        });
        
        // Onepage Nav on meanmenu
        $('#meanmenu .menu').onePageNav({
            extraOffset: FinanceObj.extraOffsetMobile,
            end: function() {
                $('.meanclose').trigger('click');
            } 
        });
		
		/* Isotope initialization */
		var $container = $('#inner-isotope');
		if ($container.length > 0) {

			// Isotope initialization
			var $isotope = $container.find('.featuredContainer').isotope({
				filter: '*',
				animationOptions: {
					duration: 750,
					easing: 'linear',
					queue: false
				}
			});

			// Isotope filter
			$container.find('.rt-portfolio-tab').on('click', 'a', function () {

				var $this = $(this);
				$this.parent('.rt-portfolio-tab').find('a').removeClass('current');
				$this.addClass('current');
				var selector = $this.attr('data-filter');
				$isotope.isotope({
					filter: selector,
					animationOptions: {
						duration: 750,
						easing: 'linear',
						queue: false
					}
				});
				return false;

			});
		}
    });

})(jQuery);