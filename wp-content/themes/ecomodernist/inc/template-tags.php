<?php
/**
 * Custom Ecomodernist template tags
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Ecomodernist
 * @since Ecomodernist 1.0
 * @version 1.0
 */


 if ( ! function_exists( 'ecomodernist_posted_on' ) ) :
 /**
	* Prints HTML with meta information for the current post-date/time and author.
	*/
 function ecomodernist_posted_on() {
 	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

 	$time_string = sprintf( $time_string,
 		esc_attr( get_the_date( 'c' ) ),
 		esc_html( get_the_date() )
 	);

 	$posted_on = sprintf(
 		esc_html_x( '%s', 'post date', 'ecomodernist' ),
 		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
 	);

 	$byline = sprintf(
 		esc_html_x( '%s', 'post author', 'ecomodernist' ),
 		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
 	);

 	echo '<div class="entry-author"> ' . $byline . '</div><div class="entry-date">' . $posted_on . '</div>';

 }
 endif;


 if ( ! function_exists( 'ecomodernist_posted_by' ) ) :
 /**
	* Prints Post Author Information
	*/
 function ecomodernist_posted_by() {

	$byline = sprintf(
	/* translators: used to show post author name */
	esc_html_x( '%s', 'post author', 'ecomodernist' ),
	'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html__( 'by ', 'ecomodernist' ) . esc_html( get_the_author() ) . '</a></span>'
	);

echo '<span class="entry-author"> ' . $byline . '</span>';

}
 endif;
