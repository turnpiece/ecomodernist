/* global screenReaderText */
/**
 * File custom.js.

	* @version 1.0.1
 */

( function( $ ) {

	// Variables and DOM Caching.
	var $body = $( 'body' ),
	headerOffset,
	menuTop = 0,
	resizeTimer;

	// Add Page Section CSS classes
	$( '.fullwidth' )
		.parents( '.elementor-widget-wp-widget-pukeko-product-widget' )
				.addClass( 'is-fullwidth' );

	$( '.fullscreen' )
		.parents( '.elementor-widget-wp-widget-pukeko-product-widget' )
				.addClass( 'is-fullscreen' );

	// Toggle navigation
	$( '#hamburger' ).on( 'click', function(){
		$( 'body' ).toggleClass( 'mobilemenu-active' );
	} );

	// Add header video class after the video is loaded.
	$( document ).on( 'wp-custom-header-video-loaded', function() {
		$body.addClass( 'has-header-video' );
	});


	// Hide Header on on scroll down
	var didScroll;
	var lastScrollTop = 0;
	var delta = 5;
	var navbarHeight = $('#masthead').outerHeight();

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

			// If they scrolled down and are past the navbar, add class .header-up.
			// This is necessary so you never see what is "behind" the navbar.
			if (st > lastScrollTop && st > navbarHeight){
					// Scroll Down
					$('#masthead').removeClass('header-down').addClass('header-up');
			} else {
					// Scroll Up
					if(st + $(window).height() < $(document).height()) {
							$('#masthead').removeClass('header-up').addClass('header-down');
					}
			}

			lastScrollTop = st;
	}

} )( jQuery );
