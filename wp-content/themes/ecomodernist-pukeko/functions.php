<?php
/**
 * @package Ecomodernist Theme
 * The parent theme functions are located at /onesocial/buddyboss-inc/theme-functions.php
 * Add your own functions in this file.
 */

/**
 * Sets up theme defaults
 *
 * @since Ecomodernist Theme 1.0.0
 */
function ecomodernist_theme_setup()
{
  /**
   * Makes child theme available for translation.
   * Translations can be added into the /languages/ directory.
   * Read more at: http://www.buddyboss.com/tutorials/language-translations/
   */

  // Translate text from the PARENT theme.
  load_theme_textdomain( 'pukeko', get_stylesheet_directory() . '/languages' );

  // Translate text from the CHILD theme only.
  // Change 'onesocial' instances in all child theme files to 'ecomodernist_theme'.
  // load_theme_textdomain( 'ecomodernist_theme', get_stylesheet_directory() . '/languages' );

}
add_action( 'after_setup_theme', 'ecomodernist_theme_setup' );

/**
 * Enqueues scripts and styles for child theme front-end.
 *
 * @since Ecomodernist Theme  1.0.0
 */
function ecomodernist_theme_scripts_styles()
{
  /**
   * Scripts and Styles loaded by the parent theme can be unloaded if needed
   * using wp_deregister_script or wp_deregister_style.
   *
   * See the WordPress Codex for more information about those functions:
   * http://codex.wordpress.org/Function_Reference/wp_deregister_script
   * http://codex.wordpress.org/Function_Reference/wp_deregister_style
   **/

  // parent
  wp_enqueue_style( 'pukeko-style', get_template_directory_uri() . '/style.min.css' );
 
  /*
   * Styles
   */
  //wp_enqueue_style( 'pukeko-child-custom', get_stylesheet_directory_uri().'/css/custom.css' );
}
add_action( 'wp_enqueue_scripts', 'ecomodernist_theme_scripts_styles', 9999 );


/****************************** CUSTOM FUNCTIONS ******************************/

// Add your own custom functions here



?>