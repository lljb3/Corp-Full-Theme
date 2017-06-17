jQuery(document).ready(function($) {

	// Global Vars
	var windowHeight = $(window).innerHeight();
	var menu = $('#header-container');
	var origOffsetY = menu.offset().top;
	
	// Sticky Header
	function scroll() {
		if ($(window).scrollTop() <= origOffsetY) {
			$("#header-container").removeClass('sticky');
			$('.jumbotron').removeClass('menu-padding');
		} else {
			$("#header-container").addClass('sticky');
			$('.jumbotron').addClass('menu-padding');
		}
	}
	document.onscroll = scroll;
	
	// Transition Navbar
	$(document).on("scroll",function(){
		if($(document).scrollTop() > 300){
			$("#trans-menu").removeClass("large").addClass("small");
		} 
		else{
			$("#trans-menu").removeClass("small").addClass("large");
		}
	});
		
	// Height to Viewport
	$(this).ready(function(e) {
		$(window).resize(function() {
			setHeight();
		});
				
		function setHeight() {
			windowHeight = $(window).innerHeight();
			$('.jumbotron').css('min-height', windowHeight);
			$('.jumbotron .ls-wp-fullwidth-container').css('min-height', windowHeight).css('height','100% !important');
			$('.jumbotron .ls-wp-fullwidth-helper').css('min-height', windowHeight).css('height','100% !important');
			$('.jumbotron .ls-wp-container.ls-container.ls-fullwidth').css('min-height', windowHeight).css('height','100% !important');
			$('.jumbotron .ls-inner').css('min-height', windowHeight).css('height','100% !important');
			$('.jumbotron .ls-slide.ls-animating').css('min-height', windowHeight).css('height','100% !important');
		};
		setHeight();			
    });
		
	// To Top Button
	var offset = 220;
	var duration = 600;
	$(window).scroll(function() {
		if (jQuery(this).scrollTop() > offset) {
			jQuery('.totop').addClass('fadeIn').removeClass('fadeOut');
		} else {
			jQuery('.totop').addClass('fadeOut').removeClass('fadeIn');
		}
    });
	
	// Facebook API
	(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
	
	// Twitter API
	!function(d,s,id){
		var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';
		if(!d.getElementById(id)){
			js=d.createElement(s); js.id=id;
			js.src=p+"://platform.twitter.com/widgets.js";
			fjs.parentNode.insertBefore(js,fjs);
		}
	}(document,"script","twitter-wjs");
	
	// Detect External Links
	var externallinkage = $('a').click(function() {
		var href = $(this).attr('href');
		if ((href.match(/^https?\:/i)) && (!href.match(document.domain))) {
			var extLink = href.replace(/^https?\:\/\//i, '');
		}
	});
	externallinkage.init();
	
	// Require.JS
	requirejs.config({
		paths: {
			'angular': '/wp-content/themes/corp-full-theme/assets/js/lib/angular.min',
			'plugins': '/wp-content/themes/corp-full-theme/assets/js/lib/plugins.min',
		},
		shim: {
			'scrollreveal': {
				deps: ['jquery'],
			}
		},
	});
	if (typeof jQuery === 'function') {
		define('jquery', function () { return jQuery; });
	}
	requirejs(['angular','plugins'], function() {
		// Flowtype
		$('body').flowtype({
			minimum   : 300,
			maximum   : 3000,
			minFont   : 16,
			maxFont   : 48,
			fontRatio : 72
		});
	});
					
});