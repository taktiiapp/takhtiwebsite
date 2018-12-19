$(window).load(function(){
	"use strict";
	
	
	//preloader animation
    $('.wrap.go').fadeOut();
	$('.preloader').delay(300).fadeOut('slow');
	
	
	//top navigation smooth scroll settings
	$(".navbar .nav a, a.learn-more, .download-link").smoothScroll({speed: 800});
	$(window).bind('scroll', function() {
        if ($(window).scrollTop() > $(".navbar").height()+30) {
            $(".navbar").addClass("show-nav");
        } else {
            	$(".navbar").removeClass("show-nav");
				$(".navbar .navscroll").collapse({toggle: false});
				$(".navbar .navscroll").collapse("hide");
				$(".navbar .navbar-toggle").addClass("collapsed");
        }
    });
	if (matchMedia('(max-width: 480px)').matches) {
		$('.main-navigation a').on('click', function () {
			$(".navbar-toggle").click();
		});
	}	
		
	//wow animations
	var wow = new WOW({
    	offset:100,
    	mobile:false
  	});
	wow.init();
	
	
	//tooltip settings
	$('.tool-tip').tooltip();
		
	
	//Nivo lightbox settings
	$('.lightbox').nivoLightbox();
	
	
	//responsive video with fitvids
	$(".video-wrap").fitVids();
	
	
	//Team section (left side slider) (owl carousel settings)
	$("#team-left").owlCarousel({
		items: 1,
		itemsDesktop: [1199,1],
		itemsDesktopSmall: [980,1],
		itemsTablet: [768,1],
		itemsTabletSmall: [590,1],
		itemsMobile: [479,1],
		autoPlay: true,
		stopOnHover: true,
		pagination: false,
		transitionStyle: 'fade'
	});
	$("#team-right").owlCarousel({
		items: 1,
		itemsDesktop: [1199,1],
		itemsDesktopSmall: [980,1],
		itemsTablet: [768,1],
		itemsTabletSmall: [590,1],
		itemsMobile: [479,1],
		autoPlay: true,
		stopOnHover: true,
		pagination: false,
		transitionStyle: 'fade'
	});
	
	
	//client carousel
	$("#client-carousel").owlCarousel({
		items: 1,
		itemsDesktop: [1199,1],
		itemsDesktopSmall: [980,1],
		itemsTablet: [768,1],
		itemsTabletSmall: [590,1],
		itemsMobile: [479,1],
		autoPlay: true,
		stopOnHover: true,
		pagination: true
	});
	
	
	//app screenshots
	$("#app-screenshots").owlCarousel({
		items: 5,
		itemsDesktop: [1199,5],
		itemsDesktopSmall: [980,4],
		itemsTablet: [768,3],
		itemsTabletSmall: [590,2],
		itemsMobile: [479,1],
		autoPlay: true,
		stopOnHover: true,
		pagination: true
	});
	
	
	//currency switcher script
	$('.choose-currency button').click(function(){
		var btnId = $(this).attr('id');
		if(!($(this).hasClass('active'))){
		$('.choose-currency button').removeClass('active');
		$(this).addClass('active');			
		}
		if(btnId == 'pound'){
			$('.price').each(function(){
				$(this).find('.currency').hide();
				$(this).find('.pound').show();
			});
		}else
		if(btnId == 'euro'){
			$('.price').each(function(){
				$(this).find('.currency').hide();
				$(this).find('.euro').show();
			});
		}else
		if(btnId == 'dollar'){
			$('.price').each(function(){
				$(this).find('.currency').hide();
				$(this).find('.dollar').show();
			});
		}
	});
	
	
	//form switch script
	$('.form-switch button').click(function(){
		var btnId = $(this).attr('id');
		if(!($(this).hasClass('active'))){
		$('.form-switch button').removeClass('active');
		$(this).addClass('active');			
		}
		if(btnId == 'onpen-sub-form'){
			$('.contact-form').slideUp();
			$('.subscribe-form').slideDown();
		}else
		if(btnId == 'onpen-contact-form'){
			$('.subscribe-form').slideUp();
			$('.contact-form').slideDown();			
		}	
	});
	
	
	// campaign monitor subscription
	// form settings	
	$(function () {
		$('#sub-form').on('submit', function (e) {
			e.preventDefault();
			$.getJSON(
			this.action + "?callback=?",
			$(this).serialize(),
			function (data) {
				if (data.Status === 400) {
					alert("Error: " + data.Message);
				} else { // 200
					alert("Success: " + data.Message);
				}
			});
		});
	});
	
		
	//accordion (added in v2.0)
	$('.panel .panel-heading').on('click', function(){
		if($(this).hasClass('active')){
			//do nothing
		}else{
			$(this).parent().parent().find('.panel-heading').removeClass('active');
			$(this).addClass('active');
			}
	});
		
	  
});