<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package Ecomodernist
 * @since Ecomodernist 1.0
 * @version 1.0.1
 */

function ecomodernist_jetpack_setup() {

	/**
		* Add theme support for Infinite Scroll.
	 */
	add_theme_support( 'infinite-scroll', array(
		'type'      => 'click',
		'container'	=> 'primary',
		'render'    => 'ecomodernist_infinite_scroll_render',
	) );

}
add_action( 'after_setup_theme', 'ecomodernist_jetpack_setup' );


// Custom render function for Infinite Scroll.
function ecomodernist_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		if ( 'classic' == get_theme_mod( 'ecomodernist_bloglayout') ) {
			get_template_part( 'content-classic' );
		} elseif ( 'threecolumns' == get_theme_mod( 'ecomodernist_bloglayout' ) || 'fourcolumns' == get_theme_mod( 'ecomodernist_bloglayout' ) ) {
			get_template_part( 'content-grid' );
		}
		else {
		 get_template_part( 'content' );
	 }
	}
} // end function nikau_infinite_scroll_render
