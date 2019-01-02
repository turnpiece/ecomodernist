<?php
/**
 * Available Uku Shortcodes
 *
 *
 * @package Uku
 * @since Uku 1.0
 * @version 1.0.2
 */

/*-----------------------------------------------------------------------------------*/
/* Uku Shortcodes
/*-----------------------------------------------------------------------------------*/
// Enable shortcodes in widget areas
add_filter( 'widget_text', 'do_shortcode' );

/*-----------------------------------------------------------------------------------*/
/* Multi Columns Shortcodes
/* Don't forget to add "_last" behind the shortcode if it is the last column.
/*-----------------------------------------------------------------------------------*/

// Two Columns
function uku_shortcode_two_columns_one( $atts, $content = null ) {
	 return '<div class="two-columns-one">' . do_shortcode( ($content) ) . '</div>';
}
add_shortcode( 'two_columns_one', 'uku_shortcode_two_columns_one' );

function uku_shortcode_two_columns_one_last( $atts, $content = null ) {
	 return '<div class="two-columns-one last">' . do_shortcode( ($content) ) . '</div>';
}
add_shortcode( 'two_columns_one_last', 'uku_shortcode_two_columns_one_last' );

// Three Columns
function uku_shortcode_three_columns_one($atts, $content = null) {
	 return '<div class="three-columns-one">' . do_shortcode( ($content) ) . '</div>';
}
add_shortcode( 'three_columns_one', 'uku_shortcode_three_columns_one' );

function uku_shortcode_three_columns_one_last($atts, $content = null) {
	 return '<div class="three-columns-one last">' . do_shortcode( ($content) ) . '</div>';
}
add_shortcode( 'three_columns_one_last', 'uku_shortcode_three_columns_one_last' );

function uku_shortcode_three_columns_two($atts, $content = null) {
	 return '<div class="three-columns-two">' . do_shortcode( ($content) ) . '</div>';
}
add_shortcode( 'three_columns_two', 'uku_shortcode_three_columns_two' );

function uku_shortcode_three_columns_two_last($atts, $content = null) {
	 return '<div class="three-columns-two last">' . do_shortcode( ($content) ) . '</div>';
}
add_shortcode( 'three_columns_two_last', 'uku_shortcode_three_columns_two_last' );

// Four Columns
function uku_shortcode_four_columns_one($atts, $content = null) {
	 return '<div class="four-columns-one">' . do_shortcode( ($content) ) . '</div>';
}
add_shortcode( 'four_columns_one', 'uku_shortcode_four_columns_one' );

function uku_shortcode_four_columns_one_last($atts, $content = null) {
	 return '<div class="four-columns-one last">' . do_shortcode( ($content) ) . '</div>';
}
add_shortcode( 'four_columns_one_last', 'uku_shortcode_four_columns_one_last' );

function uku_shortcode_four_columns_two($atts, $content = null) {
	 return '<div class="four-columns-two">' . do_shortcode( ($content) ) . '</div>';
}
add_shortcode( 'four_columns_two', 'uku_shortcode_four_columns_two' );

function uku_shortcode_four_columns_two_last($atts, $content = null) {
	 return '<div class="four-columns-two last">' . do_shortcode( ($content) ) . '</div>';
}
add_shortcode( 'four_columns_two_last', 'uku_shortcode_four_columns_two_last' );

function uku_shortcode_four_columns_three($atts, $content = null) {
	 return '<div class="four-columns-three">' . do_shortcode( ($content) ) . '</div>';
}
add_shortcode( 'four_columns_three', 'uku_shortcode_four_columns_three' );

function uku_shortcode_four_columns_three_last($atts, $content = null) {
	 return '<div class="four-columns-three last">' . do_shortcode( ($content) ) . '</div>';
}
add_shortcode( 'four_columns_three_last', 'uku_shortcode_four_columns_three_last' );


// Divide Text Shortcode
function uku_shortcode_divider($atts, $content = null) {
	 return '<div class="divider"></div>';
}
add_shortcode( 'divider', 'uku_shortcode_divider' );


/*-----------------------------------------------------------------------------------*/
/* Info Boxes Shortcodes
/*-----------------------------------------------------------------------------------*/

function uku_shortcode_white_box($atts, $content = null) {
	 return '<div class="box white-box">' . do_shortcode( ($content) ) . '</div>';
}
add_shortcode( 'white_box', 'uku_shortcode_white_box' );

function uku_shortcode_yellow_box($atts, $content = null) {
	 return '<div class="box yellow-box">' . do_shortcode( ($content) ) . '</div>';
}
add_shortcode( 'yellow_box', 'uku_shortcode_yellow_box' );

function uku_shortcode_red_box($atts, $content = null) {
	 return '<div class="box red-box">' . do_shortcode( ($content) ) . '</div>';
}
add_shortcode( 'red_box', 'uku_shortcode_red_box' );

function uku_shortcode_blue_box($atts, $content = null) {
	 return '<div class="box blue-box">' . do_shortcode( ($content) ) . '</div>';
}
add_shortcode( 'blue_box', 'uku_shortcode_blue_box' );

function uku_shortcode_green_box($atts, $content = null) {
	 return '<div class="box green-box">' . do_shortcode( ($content) ) . '</div>';
}
add_shortcode( 'green_box', 'uku_shortcode_green_box' );

function uku_shortcode_lightgrey_box($atts, $content = null) {
	 return '<div class="box lightgrey-box">' . do_shortcode( ($content) ) . '</div>';
}
add_shortcode( 'lightgrey_box', 'uku_shortcode_lightgrey_box' );

function uku_shortcode_grey_box($atts, $content = null) {
	 return '<div class="box grey-box">' . do_shortcode( ($content) ) . '</div>';
}
add_shortcode( 'grey_box', 'uku_shortcode_grey_box' );

function uku_shortcode_dark_box($atts, $content = null) {
	 return '<div class="box dark-box">' . do_shortcode( ($content) ) . '</div>';
}
add_shortcode( 'dark_box', 'uku_shortcode_dark_box' );


/*-----------------------------------------------------------------------------------*/
/* Buttons Shortcodes
/*-----------------------------------------------------------------------------------*/
function uku_button( $atts, $content = null ) {
		extract(shortcode_atts(array(
		'link'	=> '#',
		'target' => '',
		'color'	=> '',
		'size'	=> '',
	 'form'	=> '',
	 'font'	=> '',
		), $atts));

	$color = ($color) ? ' '.$color. '-btn' : '';
	$size = ($size) ? ' '.$size. '-btn' : '';
	$form = ($form) ? ' '.$form. '-btn' : '';
	$font = ($font) ? ' '.$font. '-btn' : '';
	$target = ($target == 'blank') ? ' target="_blank"' : '';

	$out = '<a' .$target. ' class="standard-btn' .$color.$size.$form.$font. '" href="' .$link. '"><span>' .do_shortcode($content). '</span></a>';

		return $out;
}
add_shortcode('button', 'uku_button');
