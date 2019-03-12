<?php
/**
 * Ecomodernist functions and definitions
 *
 * @package Ecomodernist
 * @since Ecomodernist 1.0
 * @version 1.0.9
 */

define( 'ECOMODERNIST_VERSION', '1.0.9' );

/*-----------------------------------------------------------------------------------*/
/* Sets up theme defaults and registers support for various WordPress features.
/*-----------------------------------------------------------------------------------*/
function ecomodernist_setup() {

	// Make Ecomodernist available for translation. Translations can be added to the /languages/ directory.
	load_theme_textdomain( 'ecomodernist', get_template_directory() . '/languages' );

	// This theme styles the visual editor to resemble the theme style.
	if ( 'neo' == get_theme_mod( 'ecomodernist_main_design' ) ) {
		add_editor_style( array( 'assets/css/editor-style-neo.css', ecomodernist_fonts_url() ) );
	}
	elseif ( 'serif' == get_theme_mod( 'ecomodernist_main_design' ) ) {
		add_editor_style( array( 'assets/css/editor-style-serif.css', ecomodernist_fonts_url() ) );
	}
	else {
		add_editor_style( array( 'assets/css/editor-style.css', ecomodernist_fonts_url() ) );
	}

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// This theme uses wp_nav_menu().
	register_nav_menus( array (
		'primary'				=> esc_html__( 'Main menu', 'ecomodernist' ),
		'social' 				=> esc_html__( 'Social Icons', 'ecomodernist' ),
		'social-front' 	=> esc_html__( 'Social menu', 'ecomodernist' ),
		'footer-one' 		=> esc_html__( 'Footer 1', 'ecomodernist' ),
		'footer-two' 		=> esc_html__( 'Footer 2', 'ecomodernist' ),
		'footer-three' 	=> esc_html__( 'Footer 3', 'ecomodernist' ),
		'footer-four' 	=> esc_html__( 'Footer 4', 'ecomodernist' ),
	) );

	// Switch default core markup to output valid HTML5.
	add_theme_support( 'html5', array(
		'gallery',
		'caption',
	) );

	// Implement the Custom Header feature
	require get_template_directory() . '/inc/custom-header.php';

	// This theme allows users to set a custom background.
	add_theme_support( 'custom-background', apply_filters( 'ecomodernist_custom_background_args', array(
		'default-color'	=> 'fff',
		'default-image'	=> '',
	) ) );

	// Enable support for Video Post Formats.
	add_theme_support( 'post-formats', array (
		'video',
	) );

	// Enable support for custom logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 520,
		'height'      => 236,
	) );

	// This theme uses post thumbnails.
	add_theme_support( 'post-thumbnails' );

	//  Adding several sizes for Post Thumbnails
	add_image_size( 'ecomodernist-standard-blog', 1024, 576, true );
	add_image_size( 'ecomodernist-featured', 1440, 530, true );
	add_image_size( 'ecomodernist-featured-big', 1440, 690, true );
	add_image_size( 'ecomodernist-bigthumb', 1440, 580, true );
	add_image_size( 'ecomodernist-front-big', 1260, 709, true );
	add_image_size( 'ecomodernist-front-small', 800, 450, true );
	add_image_size( 'ecomodernist-neo-big', 1500, 680, true );
	add_image_size( 'ecomodernist-serif-big', 1500, 690);
	add_image_size( 'ecomodernist-neo-blog', 1024, 768, true );
	add_image_size( 'ecomodernist-neo-featuredbottom', 880, 932, true );
	add_image_size( 'ecomodernist-serif-small', 790, 593, true );

}
add_action( 'after_setup_theme', 'ecomodernist_setup' );

/*-----------------------------------------------------------------------------------*/
/* Sets up the content width value based on the theme's design.
/*-----------------------------------------------------------------------------------*/
if ( ! isset( $content_width ) ) {
	$content_width = 900;
}

function ecomodernist_content_width() {
	if ( is_page_template('full-width.php') ) {
		$GLOBALS['content_width'] = 1500;
	}
}
add_action( 'template_redirect', 'ecomodernist_content_width' );

/*-----------------------------------------------------------------------------------*/
/* Register Google fonts for Ecomodernist.
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'ecomodernist_fonts_url' ) ) :

function ecomodernist_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Noticia Text, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== esc_html_x( 'on', 'Noticia Text font: on or off', 'ecomodernist' ) && 'standard' == get_theme_mod( 'ecomodernist_main_design' ) || '' == get_theme_mod( 'ecomodernist_main_design' ) ) {
		$fonts[] = 'Noticia Text:400,400italic,700,700italic';
	}

	/* translators: If there are characters in your language that are not supported by Kanit, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== esc_html_x( 'on', 'Kanit font: on or off', 'ecomodernist' ) && 'standard' == get_theme_mod( 'ecomodernist_main_design' ) || '' == get_theme_mod( 'ecomodernist_main_design' )) {
		$fonts[] = 'Kanit:400,500,600,700';
	}

	/* translators: If there are characters in your language that are not supported by Source Serif Pro, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== esc_html_x( 'on', 'Source Serif Pro font: on or off', 'ecomodernist' ) && 'neo' == get_theme_mod( 'ecomodernist_main_design' ) ) {
		$fonts[] = 'Source Serif Pro:400,600,700';
	}

	/* translators: If there are characters in your language that are not supported by Poppins, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== esc_html_x( 'on', 'Poppins font: on or off', 'ecomodernist' ) && 'neo' == get_theme_mod( 'ecomodernist_main_design') || 'serif' == get_theme_mod( 'ecomodernist_main_design' ) ) {
		$fonts[] = 'Poppins:400,500,600,700';
	}

	/* translators: If there are characters in your language that are not supported by Cormorant Garamond, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== esc_html_x( 'on', 'Cormorant Garamond font: on or off', 'ecomodernist' ) && 'serif' == get_theme_mod( 'ecomodernist_main_design' ) ) {
		$fonts[] = 'Cormorant Garamond:400,500,700,400i,700i';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;

 /*-----------------------------------------------------------------------------------*/
 /*  JavaScript detection.
 /*  Adds a `js` class to the root `<html>` element when JavaScript is detected.
 /*-----------------------------------------------------------------------------------*/
function ecomodernist_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'ecomodernist_javascript_detection', 0 );

/*-----------------------------------------------------------------------------------*/
/*  Enqueue scripts and styles
/*-----------------------------------------------------------------------------------*/
function ecomodernist_scripts() {
	global $wp_styles;

	// Add fonts, used in the main stylesheet.
	wp_enqueue_style( 'ecomodernist-fonts', ecomodernist_fonts_url(), array(), null );

	// Loads JavaScript to pages with the comment form to support sites with threaded comments (when in use)
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Loads stylesheets.
	wp_enqueue_style( 'ecomodernist-style', get_stylesheet_directory_uri(). '/assets/css/main.css', array(), ECOMODERNIST_VERSION );

	if ( 'neo' == get_theme_mod( 'ecomodernist_main_design' ) ) {
		wp_enqueue_style( 'ecomodernist-neo-style', get_template_directory_uri(). '/assets/css/neo-style.css' , array(), ECOMODERNIST_VERSION );
	}

	if ( 'serif' == get_theme_mod( 'ecomodernist_main_design' ) ) {
		wp_enqueue_style( 'ecomodernist-serif-style', get_template_directory_uri(). '/assets/css/serif-style.css' , array(), ECOMODERNIST_VERSION );
	}

	// Loads Custom Ecomodernist JavaScript functionality
	wp_enqueue_script( 'ecomodernist-script', get_template_directory_uri() . '/assets/js/functions.js', array( 'jquery' ), '20160507', true );
	wp_localize_script( 'ecomodernist-script', 'screenReaderText', array(
		'expand'   => '<span class="screen-reader-text">' . esc_html__( 'expand child menu', 'ecomodernist' ) . '</span>',
		'collapse' => '<span class="screen-reader-text">' . esc_html__( 'collapse child menu', 'ecomodernist' ) . '</span>',
	) );

	// Add Genericons font, used in the main stylesheet.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/assets/fonts/genericons.css', array(), '3.4.1' );

	// Loads Scripts for Featured Post Slider
	if ( '' != get_theme_mod( 'ecomodernist_featuredtag' ) ) {
		wp_enqueue_style( 'ecomodernist-slick-style', get_template_directory_uri() . '/assets/js/slick/slick.css' );
		wp_enqueue_script( 'ecomodernist-slick', get_template_directory_uri() . '/assets/js/slick/slick.min.js', array( 'jquery' ) );
	}

	// Loading viewpoint checker script
	wp_enqueue_script( 'viewportchecker', get_template_directory_uri() . '/assets/js/jquery.viewportchecker.min.js', array( 'jquery' ), '1.8.7' );

	// Loads Scripts Sticky Sidebar Element
	wp_enqueue_script( 'sticky-kit', get_template_directory_uri() . '/assets/js/sticky-kit.min.js', array( 'jquery' ) );

	// Loading FitVids responsive Video script
	wp_enqueue_script( 'fitvids', get_template_directory_uri() . '/assets/js/jquery.fitvids.js', array( 'jquery' ), '1.1' );

}
add_action( 'wp_enqueue_scripts', 'ecomodernist_scripts' );

/*-----------------------------------------------------------------------------------*/
/* Enqueue Google fonts style to admin screen for custom header display.
/*-----------------------------------------------------------------------------------*/
function ecomodernist_admin_fonts() {
	wp_enqueue_style( 'ecomodernist-fonts', ecomodernist_font_url(), array(), null );
}
add_action( 'admin_print_scripts-appearance_page_custom-header', 'ecomodernist_admin_fonts' );

/*-----------------------------------------------------------------------------------*/
/* Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
/*-----------------------------------------------------------------------------------*/
function ecomodernist_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'ecomodernist_page_menu_args' );

/*-----------------------------------------------------------------------------------*/
/* Sets the authordata global when viewing an author archive.
/*-----------------------------------------------------------------------------------*/
function ecomodernist_setup_author() {
	global $wp_query;

	if ( $wp_query->is_author() && isset( $wp_query->post ) ) {
		$GLOBALS['authordata'] = get_userdata( $wp_query->post->post_author );
	}
}
add_action( 'wp', 'ecomodernist_setup_author' );

/*-----------------------------------------------------------------------------------*/
/* Add title to custom menu
/*-----------------------------------------------------------------------------------*/
function ecomodernist_get_menu_by_location( $location ) {
		if( empty($location) ) return false;

		$locations = get_nav_menu_locations();
		if( ! isset( $locations[$location] ) ) return false;

		$menu_obj = get_term( $locations[$location], 'nav_menu' );

		return $menu_obj;
}

/*-----------------------------------------------------------------------------------*/
/* Add custom max excerpt lengths.
/*-----------------------------------------------------------------------------------*/
function ecomodernist_custom_excerpt_length( $length ) {
	return 23;
}
add_filter( 'excerpt_length', 'ecomodernist_custom_excerpt_length', 999 );

/*-----------------------------------------------------------------------------------*/
/* Replace "[...]" with custom read more in excerpts.
/*-----------------------------------------------------------------------------------*/
function ecomodernist_excerpt_more( $more ) {
	global $post;
	return '&hellip;';
}
add_filter( 'excerpt_more', 'ecomodernist_excerpt_more' );

/*-----------------------------------------------------------------------------------*/
/* Featured Slider Function
/*-----------------------------------------------------------------------------------*/
function ecomodernist_has_featured_posts( $minimum = 1 ) {
		if ( is_paged() )
				return false;

		$minimum = absint( $minimum );
		$featured_posts = apply_filters( 'ecomodernist_get_featured_posts', array() );

		if ( ! is_array( $featured_posts ) )
				return false;

		if ( $minimum > count( $featured_posts ) )
				return false;

		return true;
}

/*-----------------------------------------------------------------------------------*/
/* Add Twitter Username to User Profile
/*-----------------------------------------------------------------------------------*/
function add_twitter_contactmethod( $contactmethods ) {
	// Add Twitter
	if ( !isset( $contactmethods['twitter'] ) )
		$contactmethods['twitter'] = 'Twitter Name';

	return $contactmethods;
}
add_filter( 'user_contactmethods', 'add_twitter_contactmethod', 10, 1 );

/*-----------------------------------------------------------------------------------*/
/* Customize Jetpack Related Posts
/*-----------------------------------------------------------------------------------*/
function jetpackme_more_related_posts( $options ) {
		$options['size'] = 4;
		return $options;
}
add_filter( 'jetpack_relatedposts_filter_options', 'jetpackme_more_related_posts' );

/*-----------------------------------------------------------------------------------*/
/* Remove Related Posts in defalut position (added via shortcode to the single.php)
/*-----------------------------------------------------------------------------------*/
function jetpackme_remove_rp() {
		if ( class_exists( 'Jetpack_RelatedPosts' ) ) {
				$jprp = Jetpack_RelatedPosts::init();
				$callback = array( $jprp, 'filter_add_target_to_dom' );
				remove_filter( 'the_content', $callback, 40 );
		}
}
add_filter( 'wp', 'jetpackme_remove_rp', 20 );

/*-----------------------------------------------------------------------------------*/
/* Remove Sharing Icons position (added via shortcode to the single.php)
/*-----------------------------------------------------------------------------------*/
function jptweak_remove_share() {
		remove_filter( 'the_content', 'sharing_display',19 );
		remove_filter( 'the_excerpt', 'sharing_display',19 );
		if ( class_exists( 'Jetpack_Likes' ) ) {
				remove_filter( 'the_content', array( Jetpack_Likes::init(), 'post_likes' ), 30, 1 );
		}
}

add_action( 'loop_start', 'jptweak_remove_share' );

/*-----------------------------------------------------------------------------------*/
/* Add Theme Customizer CSS
/*-----------------------------------------------------------------------------------*/
function ecomodernist_customize_css() {
		?>
	<style type="text/css">
		<?php if ('' != get_theme_mod( 'ecomodernist_titleuppercase' ) ) { ?>
			#site-branding h1.site-title, #site-branding p.site-title, .sticky-header p.site-title {text-transform: uppercase; letter-spacing: 5px;}
		<?php } ?>
		<?php if ('#51a8dd' != get_theme_mod( 'ecomodernist_link_color' ) ) { ?>
			.entry-content a,
			.comment-text a,
			#desktop-navigation ul li a:hover,
			.featured-slider button.slick-arrow:hover::after,
			.front-section a.all-posts-link:hover,
			#overlay-close:hover,
			.widget-area .widget ul li a:hover,
			#sidebar-offcanvas .widget a:hover,
			.textwidget a:hover,
			#overlay-nav a:hover,
			.author-links a:hover,
			.single-post .post-navigation a:hover,
			.single-attachment .post-navigation a:hover,
			.author-bio a,
			.single-post .hentry .entry-meta a:hover,
			.entry-header a:hover,
			.entry-header h2.entry-title a:hover,
			.blog .entry-meta a:hover,
			.ecomodernist-neo .entry-content p a:hover,
			.ecomodernist-neo .author-bio a:hover,
			.ecomodernist-neo .comment-text a:hover,
			.ecomodernist-neo .entry-header h2.entry-title a:hover,
			.ecomodernist-serif .entry-header h2.entry-title a:hover,
			.ecomodernist-serif .entry-content p a,
			.ecomodernist-serif .author-bio a,
			.ecomodernist-serif .comment-text a {
				color: <?php echo get_theme_mod('ecomodernist_link_color'); ?>;
			}
			.ecomodernist-serif .entry-content p a,
			.ecomodernist-serif .author-bio a,
			.ecomodernist-serif .comment-text a {
				box-shadow: inset 0 -1px 0 <?php echo get_theme_mod('ecomodernist_link_color'); ?>;
			}
			.single-post .post-navigation a:hover,
			.single-attachment .post-navigation a:hover,
			#desktop-navigation ul li.menu-item-has-children a:hover::after,
			.desktop-search input.search-field:active,
			.desktop-search input.search-field:focus {
				border-color: <?php echo get_theme_mod('ecomodernist_link_color'); ?>;
			}
			.featured-slider .entry-cats a,
			.section-one-column-one .entry-cats a,
			.section-three-column-one .entry-cats a,
			#front-section-four .entry-cats a,
			.single-post .entry-cats a,
			.blog.ecomodernist-standard.blog-defaultplus #primary .hentry.has-post-thumbnail:nth-child(4n+1) .entry-cats a,
			#desktop-navigation .sub-menu li a:hover,
			#desktop-navigation .children li a:hover,
			.widget_mc4wp_form_widget input[type="submit"],
			.ecomodernist-neo .featured-slider .entry-cats a:hover,
			.ecomodernist-neo .section-one-column-one .entry-cats a:hover,
			.ecomodernist-neo .section-three-column-one .entry-cats a:hover,
			.ecomodernist-neo #front-section-four .entry-cats a:hover,
			.ecomodernist-neo .single-post .entry-cats a:hover,
			.ecomodernist-neo .format-video .entry-thumbnail span.video-icon:before,
			.ecomodernist-neo .format-video .entry-thumbnail span.video-icon:after,
			.ecomodernist-neo .entry-content p a:hover::after,
			.ecomodernist-neo .author-bio a:hover::after,
			.ecomodernist-neo .comment-text a:hover::after {
				background: <?php echo get_theme_mod('ecomodernist_link_color'); ?>;
			}
			.blog.blog-classic #primary .hentry.has-post-thumbnail:nth-child(4n+1) .entry-cats a {
				background: none !important;
			}
			@media screen and (min-width: 66.25em) {
				.ecomodernist-neo #overlay-open:hover,
				.ecomodernist-neo .search-open:hover,
				.ecomodernist-neo #overlay-open-sticky:hover,
				.ecomodernist-neo.fixedheader-dark.header-stick #overlay-open-sticky:hover,
				.ecomodernist-neo.fixedheader-dark.header-stick #search-open-sticky:hover {
					background: <?php echo get_theme_mod('ecomodernist_link_color'); ?>;
				}
			}
		<?php } ?>
		<?php if ('#0c6ca6' != get_theme_mod( 'ecomodernist_linkhover_color' ) ) { ?>
			.entry-content a:hover,
			.comment-text a:hover,
			.author-bio a:hover {
				color: <?php echo get_theme_mod('ecomodernist_linkhover_color'); ?> !important;
			}
			.blog #primary .hentry.has-post-thumbnail:nth-child(4n+1) .entry-cats a:hover,
			.featured-slider .entry-cats a:hover,
			.section-one-column-one .entry-cats a:hover,
			.section-three-column-one .entry-cats a:hover,
			#front-section-four .entry-cats a:hover,
			.single-post .entry-cats a:hover,
			#colophon .footer-feature-btn:hover,
			.comments-show #comments-toggle,
			.widget_mc4wp_form_widget input[type="submit"]:hover,
			#comments-toggle:hover,
			input[type="submit"]:hover,
			input#submit:hover,
			#primary #infinite-handle span:hover,
			#front-section-three a.all-posts-link:hover,
			.desktop-search input[type="submit"]:hover,
			.widget_search input[type="submit"]:hover,
			.post-password-form input[type="submit"]:hover,
			#offcanvas-widgets-open:hover,
			.offcanvas-widgets-show #offcanvas-widgets-open,
			.ecomodernist-standard.blog-classic .entry-content p a.more-link:hover {
				background: <?php echo get_theme_mod('ecomodernist_linkhover_color'); ?>;
			}
			#colophon .footer-feature-textwrap .footer-feature-btn:hover,
			.comments-show #comments-toggle,
			#comments-toggle:hover,
			input[type="submit"]:hover,
			input#submit:hover,
			.blog #primary #infinite-handle span:hover,
			#front-section-three a.all-posts-link:hover,
			.desktop-search input[type="submit"]:hover,
			.widget_search input[type="submit"]:hover,
			.post-password-form input[type="submit"]:hover,
			#offcanvas-widgets-open:hover,
			.offcanvas-widgets-show #offcanvas-widgets-open,
			.ecomodernist-standard.blog-classic .entry-content p a.more-link:hover {
				border-color: <?php echo get_theme_mod('ecomodernist_linkhover_color'); ?> !important;
			}
		<?php } ?>
		<?php if ('#1a1a1a' != get_theme_mod( 'ecomodernist_footer_bg_color' ) ) { ?>
			#colophon,
			.ecomodernist-serif .big-instagram-wrap {background: <?php echo get_theme_mod('ecomodernist_footer_bg_color'); ?>;}
		<?php } ?>
		<?php if ('#ffffff' != get_theme_mod( 'ecomodernist_footer_text_color' ) ) { ?>
		#colophon,
		#colophon .footer-menu ul a,
		#colophon .footer-menu ul a:hover,
		#colophon #site-info, #colophon #site-info a,
		#colophon #site-info, #colophon #site-info a:hover,
		#footer-social span,
		#colophon .social-nav ul li a,
		.ecomodernist-serif .big-instagram-wrap .null-instagram-feed .clear a,
		.ecomodernist-serif .big-instagram-wrap .widget h2.widget-title {
			color: <?php echo get_theme_mod('ecomodernist_footer_text_color'); ?>;
		}
		.footer-menus-wrap {
			border-bottom: 1px solid <?php echo get_theme_mod('ecomodernist_footer_text_color'); ?>;
		}
		<?php } ?>
		<?php if ('#f4f4f4' != get_theme_mod( 'ecomodernist_offcanvas_bg_color' ) ) { ?>
			.mobile-search, .inner-offcanvas-wrap, .close-btn-wrap {background: <?php echo get_theme_mod('ecomodernist_offcanvas_bg_color'); ?>;}
		<?php } ?>
		<?php if ('#2b2b2b' != get_theme_mod( 'ecomodernist_offcanvas_text_color' ) ) { ?>
			#mobile-social ul li a,
			#overlay-nav ul li a,
			#offcanvas-widgets-open,
			.dropdown-toggle,
			#sidebar-offcanvas .widget h2.widget-title,
			#sidebar-offcanvas .widget,
			#sidebar-offcanvas .widget a,
			.close-btn-wrap {
				color: <?php echo get_theme_mod('ecomodernist_offcanvas_text_color'); ?>;
			}
			#sidebar-offcanvas .widget h2.widget-title {border-color: <?php echo get_theme_mod('ecomodernist_offcanvas_text_color'); ?>;}
			#offcanvas-widgets-open {border-color: <?php echo get_theme_mod('ecomodernist_offcanvas_text_color'); ?>;}
			@media screen and (min-width: 66.25em) {
			#overlay-nav ul li,
			#overlay-nav ul ul.sub-menu,
			#overlay-nav ul ul.children {border-color: <?php echo get_theme_mod('ecomodernist_offcanvas_text_color'); ?>;}
			#overlay-close {color: <?php echo get_theme_mod('ecomodernist_offcanvas_text_color'); ?>;}
			#overlay-nav {
				border-color: <?php echo get_theme_mod('ecomodernist_offcanvas_text_color'); ?>;
			}
			}
		<?php } ?>
		<?php if ('#f4f4f4' != get_theme_mod( 'ecomodernist_frontsection_bg_color' ) ) { ?>
			#front-section-three {background: <?php echo get_theme_mod('ecomodernist_frontsection_bg_color'); ?>;}
		<?php } ?>
		<?php if ('#f4f4f4' != get_theme_mod( 'ecomodernist_subscribe_bg_color' ) ) { ?>
			.widget_mc4wp_form_widget, .jetpack_subscription_widget {background: <?php echo get_theme_mod('ecomodernist_subscribe_bg_color'); ?>;}
		<?php } ?>
		<?php if ('#ffefef' != get_theme_mod( 'ecomodernist_aboutsection_bg_color' ) ) { ?>
			.ecomodernist-serif .front-about-img:after {background: <?php echo get_theme_mod('ecomodernist_aboutsection_bg_color'); ?>;}
		<?php } ?>
		<?php if ('#f2f2ee' != get_theme_mod( 'ecomodernist_shopcats_bg_color' ) ) { ?>
			#shopfront-cats {background: <?php echo get_theme_mod('ecomodernist_shopcats_bg_color'); ?>;}
		<?php } ?>
		<?php if ('' != get_theme_mod( 'ecomodernist_front_section_twocolumn_excerpt') ) { ?>
			#front-section-twocolumn .entry-summary {display: block;}
		<?php } ?>
		<?php if ('' != get_theme_mod( 'ecomodernist_front_section_threecolumn_excerpt' ) ) { ?>
			#front-section-threecolumn .entry-summary {display: block;}
		<?php } ?>
		<?php if ('' != get_theme_mod( 'ecomodernist_front_section_fourcolumn_excerpt' ) ) { ?>
			#front-section-fourcolumn .entry-summary {display: block;}
		<?php } ?>
		<?php if ('' != get_theme_mod( 'ecomodernist_front_section_sixcolumn_excerpt' ) ) { ?>
			#front-section-sixcolumn .entry-summary {display: block;}
		<?php } ?>
		<?php if ('' != get_theme_mod( 'ecomodernist_front_hidedate' ) ) { ?>
			.blog .entry-date {display: none !important;}
		<?php } ?>
		<?php if ('' != get_theme_mod( 'ecomodernist_front_hidecomments' ) ) { ?>
			.blog .entry-comments {display: none !important;}
		<?php } ?>
		<?php if ('' != get_theme_mod( 'ecomodernist_front_hidecats' ) ) { ?>
			.blog .entry-cats {display: none !important;}
		<?php } ?>
		<?php if ('' != get_theme_mod( 'ecomodernist_front_hideauthor' ) ) { ?>
			.entry-author, .entry-date:before {display: none !important;}
		<?php } ?>
		<?php if ('#000000' != get_theme_mod( 'ecomodernist_imgoverlay_color' ) ) { ?>
			.blog #primary .hentry.has-post-thumbnail:nth-child(4n+1) .entry-thumbnail a:after,
			.featured-slider .entry-thumbnail a:after,
			.ecomodernist-serif .featured-slider .entry-thumbnail:after,
			.header-image:after,
			#front-section-four .entry-thumbnail a:after,
			.ecomodernist-serif #front-section-four .entry-thumbnail a .thumb-wrap:after,
			.single-post .big-thumb .entry-thumbnail a:after,
			.blog #primary .hentry.has-post-thumbnail:nth-child(4n+1) .thumb-wrap:after,
			.section-two-column-one .thumb-wrap:after,
			.header-fullscreen #headerimg-wrap:after {background-color: <?php echo get_theme_mod('ecomodernist_imgoverlay_color'); ?>;}
		<?php } ?>
		<?php if ('0' != get_theme_mod( 'ecomodernist_imgoverlay_transparency' ) ) { ?>
			.blog #primary .hentry.has-post-thumbnail:nth-child(4n+1) .entry-thumbnail a:after,
			.blog #primary .hentry.has-post-thumbnail:nth-child(4n+1) .thumb-wrap:after,
			.section-two-column-one .thumb-wrap:after,
			.featured-slider .entry-thumbnail a:after,
			.ecomodernist-serif .featured-slider .entry-thumbnail:after,
			.header-image:after,
			.ecomodernist-serif .section-two-column-one .entry-thumbnail a:after,
			#front-section-four .entry-thumbnail a:after,
			.ecomodernist-serif #front-section-four .entry-thumbnail a .thumb-wrap:after,
			.single-post .big-thumb .entry-thumbnail a:after,
			.header-fullscreen #headerimg-wrap:after {opacity: <?php echo get_theme_mod('ecomodernist_imgoverlay_transparency'); ?>;}
		<?php } ?>
		<?php if ('0' == get_theme_mod( 'ecomodernist_imgoverlay_transparency' ) ) { ?>
			.header-fullscreen #headerimg-wrap:after {	background-color: transparent;}
		<?php } ?>
		<?php if ('0.7' != get_theme_mod( 'ecomodernist_imggradient' ) ) { ?>
			#front-section-four .meta-main-wrap,
			.featured-slider .meta-main-wrap,
			.blog #primary .hentry.has-post-thumbnail:nth-child(4n+1) .meta-main-wrap,
			.ecomodernist-serif .section-two-column-one .entry-text-wrap,
			.big-thumb .title-wrap {
				background: -moz-linear-gradient(top, rgba(0,0,0,0) 0%, rgba(0,0,0,<?php echo get_theme_mod('ecomodernist_imggradient'); ?>) 100%);
				background: -webkit-linear-gradient(top, rgba(0,0,0,0) 0%,rgba(0,0,0,<?php echo get_theme_mod('ecomodernist_imggradient'); ?>) 100%);
				background: linear-gradient(to bottom, rgba(0,0,0,0) 0%,rgba(0,0,0,<?php echo get_theme_mod('ecomodernist_imggradient'); ?>) 100%);
			}
			<?php } ?>

			<?php if ('' != get_theme_mod( 'ecomodernist_custom_css' ) ) { ?>
				<?php echo get_theme_mod('ecomodernist_custom_css'); ?>
			<?php } ?>
	</style>
		<?php
}
add_action( 'wp_head', 'ecomodernist_customize_css');

/*-----------------------------------------------------------------------------------*/
/* Remove inline styles printed when the gallery shortcode is used.
/*-----------------------------------------------------------------------------------*/
add_filter('use_default_gallery_style', '__return_false');

if ( ! function_exists( 'ecomodernist_comment' ) ) :

/*-----------------------------------------------------------------------------------*/
/* Comments template ecomodernist_comment
/*-----------------------------------------------------------------------------------*/
function ecomodernist_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>

	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>" class="comment">
			<div class="comment-avatar">
				<?php echo get_avatar( $comment, 140 ); ?>
			</div>

			<div class="comment-wrap">
				<div class="comment-details">
					<div class="comment-author">

						<?php printf( ( '%s' ), wp_kses_post( sprintf( '%s', get_comment_author_link() ) ) ); ?>
					</div><!-- end .comment-author -->
					<div class="comment-meta">
						<span class="comment-time"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
							<?php
							/* translators: 1: date */
								printf( esc_html__( '%1$s', 'ecomodernist' ),
								get_comment_date());
							?></a>
						</span>
						<?php edit_comment_link( esc_html__(' Edit', 'ecomodernist'), '<span class="comment-edit">', '</span>'); ?>
					</div><!-- end .comment-meta -->
				</div><!-- end .comment-details -->

				<div class="comment-text">
				<?php comment_text(); ?>
					<?php if ( $comment->comment_approved == '0' ) : ?>
						<p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'ecomodernist' ); ?></p>
					<?php endif; ?>
				</div><!-- end .comment-text -->
				<?php if ( comments_open () ) : ?>
					<div class="comment-reply"><?php comment_reply_link( array_merge( $args, array( 'reply_text' => esc_html__( 'Reply', 'ecomodernist' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?></div>
				<?php endif; ?>
			</div><!-- end .comment-wrap -->
		</div><!-- end .comment -->

	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="pingback">
		<p><?php esc_html_e( 'Pingback:', 'ecomodernist' ); ?> <?php comment_author_link(); ?></p>
		<p class="pingback-edit"><?php edit_comment_link(); ?></p>
	<?php
			break;
	endswitch;
}
endif;

/*-----------------------------------------------------------------------------------*/
/* Register widgetized areas
/*-----------------------------------------------------------------------------------*/
function ecomodernist_widgets_init() {

	register_sidebar( array (
		'name'          => esc_html__( 'Blog Sidebar', 'ecomodernist' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Widgets appear in the default sidebar.', 'ecomodernist' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => "</section>",
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array (
		'name'          => esc_html__( 'Page Sidebar', 'ecomodernist' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Widgets appear in the sidebar on pages.', 'ecomodernist' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => "</section>",
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array (
		'name'          => esc_html__( 'Off Canvas Widget Area', 'ecomodernist' ),
		'id'            => 'sidebar-offcanvas',
		'description'   => esc_html__( 'Widgets appear in the off canvas area.', 'ecomodernist' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => "</section>",
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array (
		'name'          => esc_html__( 'Big Footer Instagram Widget Area', 'ecomodernist' ),
		'id'            => 'sidebar-instagram',
		'description'   => esc_html__( 'Widget area to show the WP Instagram Widget in a big one-column footer area .', 'ecomodernist' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => "</section>",
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	if ( 'serif' == get_theme_mod( 'ecomodernist_main_design' ) ) {
		register_sidebar( array (
			'name'          => esc_html__( 'Big Footer Mailchimp Widget Area', 'ecomodernist' ),
			'id'            => 'sidebar-newsletter',
			'description'   => esc_html__( 'Widget area to show the Mailchimp Newsletter Widget in a big one-column footer area .', 'ecomodernist' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => "</section>",
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
	}

}
add_action( 'widgets_init', 'ecomodernist_widgets_init' );


/*-----------------------------------------------------------------------------------*/
/* Posts displayed on front page
/*-----------------------------------------------------------------------------------*/

function ecomodernist_add_posts_displayed( $posts ) {
	global $posts_displayed;
	array_push( $posts_displayed, $posts );
}

function ecomodernist_get_posts_displayed() {
	global $posts_displayed;
	return $posts_displayed;
}

/*-----------------------------------------------------------------------------------*/
/* Excerpt length
/*-----------------------------------------------------------------------------------*/

function ecomodernist_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'ecomodernist_excerpt_length', 999 );



/*-----------------------------------------------------------------------------------*/
/* Customizer additions
/*-----------------------------------------------------------------------------------*/
require get_template_directory() . '/inc/customizer.php';

 /*-----------------------------------------------------------------------------------*/
 /* Additional features to allow styling of the templates.
 /*-----------------------------------------------------------------------------------*/
require get_parent_theme_file_path( '/inc/template-functions.php' );

/*-----------------------------------------------------------------------------------*/
/* Custom template tags for this theme.
/*-----------------------------------------------------------------------------------*/
require get_template_directory() . '/inc/template-tags.php';

/*-----------------------------------------------------------------------------------*/
/* Grab the Ecomodernist Custom shortcodes.
/*-----------------------------------------------------------------------------------*/
require( get_template_directory() . '/inc/shortcodes.php' );

/*-----------------------------------------------------------------------------------*/
/* Load Jetpack compatibility file.
/*-----------------------------------------------------------------------------------*/
require get_template_directory() . '/inc/jetpack.php';

/*-----------------------------------------------------------------------------------*/
/* Add WooCommerce code.
/*-----------------------------------------------------------------------------------*/
require get_template_directory() . '/woocommerce/woocommerce.php';

