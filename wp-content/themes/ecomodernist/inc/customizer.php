<?php
/**
 * Implement Theme Customizer additions and adjustments.
 *
 * @package Ecomodernist
 * @since Ecomodernist 1.0
 * @version 1.0.3
 */

function ecomodernist_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	// Rename the label to "Site Title Color" because this only affects the site title in this theme.
	$wp_customize->get_control( 'header_textcolor' )->label = esc_html__( 'Site Title Color', 'ecomodernist' );

	// Custom Ecomodernist panels:
	$wp_customize->add_panel( 'ecomodernist_themeoptions', array(
		'priority' 	               => 1,
		'theme_supports' 	         => '',
		'title' 	                 => esc_html__('Theme Options', 'ecomodernist'),
	) );

	$wp_customize->add_panel( 'ecomodernist_frontpage', array(
		'priority' 	               => 2,
		'theme_supports' 	         => '',
		'title' 	                 => esc_html__('Blog Front Page', 'ecomodernist'),
	) );

	$wp_customize->add_panel( 'ecomodernist_shop', array(
		'priority' 	               => 3,
		'theme_supports' 	         => '',
		'title' 	                 => esc_html__('Shop Front Page', 'ecomodernist'),
	) );

	// Ecomodernist Theme Options Sections:
	$wp_customize->add_section( 'ecomodernist_style', array(
		'title' 		               => esc_html__( 'Design Style', 'ecomodernist' ),
		'priority' 	               => 1,
		'panel' 					         => 'ecomodernist_themeoptions',
	) );

	$wp_customize->add_section( 'ecomodernist_general', array(
		'title' 		               => esc_html__( 'General', 'ecomodernist' ),
		'priority' 	               => 2,
		'panel' 					         => 'ecomodernist_themeoptions',
	) );

	$wp_customize->add_section( 'ecomodernist_header', array(
		'title' 		               => esc_html__( 'Header', 'ecomodernist' ),
		'priority' 	               => 3,
		'panel' 					         => 'ecomodernist_themeoptions',
	) );

	$wp_customize->add_section( 'ecomodernist_images', array(
		'title' 		               => esc_html__( 'Images', 'ecomodernist' ),
		'priority' 	               => 4,
		'panel' 					         => 'ecomodernist_themeoptions',
	) );

	$wp_customize->add_section( 'ecomodernist_footerfeature', array(
		'title' 		               => esc_html__( 'Footer Featured Area', 'ecomodernist' ),
		'priority' 	               => 5,
		'panel' 					         => 'ecomodernist_themeoptions',
	) );

	// Main Design Style
	$wp_customize->add_setting( 'ecomodernist_main_design', array(
		'default' 				         => 'standard',
		'sanitize_callback' 	     => 'ecomodernist_sanitize_main_design',
	) );

	$wp_customize->add_control( 'ecomodernist_main_design', array(
		'label' 			             => esc_html__( 'Design Style', 'ecomodernist' ),
		'description'					     => esc_html__( 'Choose your main design style.', 'ecomodernist' ),
		'section' 			           => 'ecomodernist_style',
		'priority' 			           => 1,
		'type' 			               => 'select',
		'choices' 						     => array(
					'standard'		       => esc_html__( 'standard', 'ecomodernist' ),
					'neo' 				       => esc_html__( 'neo', 'ecomodernist' ),
					'serif' 			       => esc_html__( 'serif', 'ecomodernist' ),
		),
	) );


	// Ecomodernist Front Page Sections.
	$wp_customize->add_section( 'ecomodernist_frontpage_general', array(
		'title' 		               => esc_html__( 'General', 'ecomodernist' ),
		'priority' 	               => 1,
		'panel' 					         => 'ecomodernist_frontpage',
	) );

	$wp_customize->add_section( 'ecomodernist_slider', array(
		'title' 		               => esc_html__( 'Featured Posts Slider', 'ecomodernist' ),
		'description'			         => esc_html__( 'Up to 6 posts will show up in the Front page slider. The image dimension for the Featured post images should be at least 1440 x 530 pixels for the standard design style and 1500 x 690 for neo and serif.', 'ecomodernist' ),
		'priority' 	               => 3,
		'panel' 					         => 'ecomodernist_frontpage',
	) );

	$wp_customize->add_section( 'ecomodernist_front_section_one', array(
		'title' 		               => esc_html__( 'Section Featured Top', 'ecomodernist' ),
		'priority' 	               => 3,
		'panel' 					         => 'ecomodernist_frontpage',
	) );

	$wp_customize->add_section( 'ecomodernist_front_section_twocolumn', array(
		'title' 		               => esc_html__( 'Section 2-Columns', 'ecomodernist' ),
		'priority' 	               => 4,
		'panel' 					         => 'ecomodernist_frontpage',
	) );

	$wp_customize->add_section( 'ecomodernist_front_section_threecolumn', array(
		'title' 		               => esc_html__( 'Section 3-Columns', 'ecomodernist' ),
		'priority' 	               => 5,
		'panel' 					         => 'ecomodernist_frontpage',
	) );

	$wp_customize->add_section( 'ecomodernist_front_section_four', array(
		'title' 		               => esc_html__( 'Section Fullwidth', 'ecomodernist' ),
		'priority' 	               => 6,
		'panel' 					         => 'ecomodernist_frontpage',
	) );

	$wp_customize->add_section( 'ecomodernist_front_section_two', array(
		'title' 		               => esc_html__( 'Section Featured Bottom', 'ecomodernist' ),
		'priority' 	               => 7,
		'panel' 					         => 'ecomodernist_frontpage',
	) );

	$wp_customize->add_section( 'ecomodernist_front_section_about', array(
		'title' 		               => esc_html__( 'Section About', 'ecomodernist' ),
		'priority' 	               => 8,
		'panel' 					         => 'ecomodernist_frontpage',
	) );

	$wp_customize->add_section( 'ecomodernist_front_section_three', array(
		'title' 		               => esc_html__( 'Section on Background', 'ecomodernist' ),
		'priority' 	               => 9,
		'panel' 					         => 'ecomodernist_frontpage',
	) );

	$wp_customize->add_section( 'ecomodernist_front_section_fourcolumn', array(
		'title' 		               => esc_html__( 'Section 4-Columns', 'ecomodernist' ),
		'priority' 	               => 10,
		'panel' 					         => 'ecomodernist_frontpage',
	) );

	$wp_customize->add_section( 'ecomodernist_front_section_sixcolumn', array(
		'title' 		               => esc_html__( 'Section 6-Columns', 'ecomodernist' ),
		'priority' 	               => 11,
		'panel' 					         => 'ecomodernist_frontpage',
	) );


	// Ecomodernist Shop Sections.
	$wp_customize->add_section( 'ecomodernist_shop_front_general', array(
		'title' 		               => esc_html__( 'General', 'ecomodernist' ),
		'priority' 	               => 1,
		'panel' 					         => 'ecomodernist_shop',
	) );

	$wp_customize->add_section( 'ecomodernist_shop_front_cats', array(
		'title' 		               => esc_html__( 'Product Categories', 'ecomodernist' ),
		'priority' 	               => 2,
		'panel' 					         => 'ecomodernist_shop',
	) );

	$wp_customize->add_section( 'ecomodernist_shop_front_featured', array(
		'title' 		               => esc_html__( 'Featured Products', 'ecomodernist' ),
		'priority' 	               => 3,
		'panel' 					         => 'ecomodernist_shop',
	) );

	$wp_customize->add_section( 'ecomodernist_shop_front_latest', array(
		'title' 		               => esc_html__( 'Latest Products', 'ecomodernist' ),
		'priority' 	               => 4,
		'panel' 					         => 'ecomodernist_shop',
	) );

	$wp_customize->add_section( 'ecomodernist_shop_front_toprated', array(
		'title' 		               => esc_html__( 'Top Rated Products', 'ecomodernist' ),
		'priority' 	               => 5,
		'panel' 					         => 'ecomodernist_shop',
	) );

	$wp_customize->add_section( 'ecomodernist_shop_front_sale', array(
		'title' 		               => esc_html__( 'On Sale Products', 'ecomodernist' ),
		'priority' 	               => 6,
		'panel' 					         => 'ecomodernist_shop',
	) );



	// Ecomodernist Custom Colors.
	$wp_customize->add_setting( 'ecomodernist_link_color' , array(
			'default' 			         => '#51a8dd',
			'sanitize_callback'	     => 'sanitize_hex_color',
		'transport' 				       => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ecomodernist_link_color', array(
		'label'								     => esc_html__( 'Text Link Color', 'ecomodernist' ),
		'section'							     => 'colors',
		'settings'						     => 'ecomodernist_link_color',
	) ) );

	$wp_customize->add_setting( 'ecomodernist_linkhover_color' , array(
			'default' 			         => '#0c6ca6',
			'sanitize_callback'      => 'sanitize_hex_color',
		'transport' 				       => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ecomodernist_linkhover_color', array(
		'label'								     => esc_html__( 'Text Link Hover Color', 'ecomodernist' ),
		'section'							     => 'colors',
		'settings'						     => 'ecomodernist_linkhover_color',
	) ) );

	$wp_customize->add_setting( 'ecomodernist_footer_bg_color' , array(
			'default' 			         => '#1a1a1a',
			'sanitize_callback'      => 'sanitize_hex_color',
		'transport' 				       => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ecomodernist_footer_bg_color', array(
		'label'								     => esc_html__( 'Footer Background Color', 'ecomodernist' ),
		'section'							     => 'colors',
		'settings'						     => 'ecomodernist_footer_bg_color',
	) ) );

	$wp_customize->add_setting( 'ecomodernist_footer_text_color' , array(
			'default' 			         => '#ffffff',
			'sanitize_callback'      => 'sanitize_hex_color',
		'transport' 				       => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ecomodernist_footer_text_color', array(
		'label'								     => esc_html__( 'Footer Text Color', 'ecomodernist' ),
		'section'							     => 'colors',
		'settings'						     => 'ecomodernist_footer_text_color',
	) ) );

	$wp_customize->add_setting( 'ecomodernist_offcanvas_bg_color' , array(
			'default' 			         => '#f4f4f4',
			'sanitize_callback'      => 'sanitize_hex_color',
		'transport' 				       => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ecomodernist_offcanvas_bg_color', array(
		'label'								     => esc_html__( 'Off Canvas Background Color', 'ecomodernist' ),
		'section'							     => 'colors',
		'settings'						     => 'ecomodernist_offcanvas_bg_color',
	) ) );

	$wp_customize->add_setting( 'ecomodernist_offcanvas_text_color' , array(
			'default' 			         => '#2b2b2b',
			'sanitize_callback'      => 'sanitize_hex_color',
		'transport' 				       => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ecomodernist_offcanvas_text_color', array(
		'label'								     => esc_html__( 'Off Canvas Text Color', 'ecomodernist' ),
		'section'							     => 'colors',
		'settings'						     => 'ecomodernist_offcanvas_text_color',
	) ) );

	$wp_customize->add_setting( 'ecomodernist_frontsection_bg_color' , array(
			'default' 			         => '#f4f4f4',
			'sanitize_callback'      => 'sanitize_hex_color',
		'transport' 				       => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ecomodernist_frontsection_bg_color', array(
		'label'								     => esc_html__( 'Posts on Background Color', 'ecomodernist' ),
		'description'					     => esc_html__( 'Background color of the "Posts on Background" section.', 'ecomodernist' ),
		'section'							     => 'colors',
		'settings'						     => 'ecomodernist_frontsection_bg_color',
	) ) );

	$wp_customize->add_setting( 'ecomodernist_subscribe_bg_color' , array(
			'default' 			         => '#f4f4f4',
			'sanitize_callback'      => 'sanitize_hex_color',
		'transport' 				       => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ecomodernist_subscribe_bg_color', array(
		'label'								     => esc_html__( 'Subscribe Widget Background Color', 'ecomodernist' ),
		'description'					     => esc_html__( 'Background color of the Jetpack Blog Subscribe or Mailchimp newsletter widget.', 'ecomodernist' ),
		'section'							     => 'colors',
		'settings'						     => 'ecomodernist_subscribe_bg_color',
	) ) );

	$wp_customize->add_setting( 'ecomodernist_aboutsection_bg_color' , array(
			'default' 			         => '#ffefef',
			'sanitize_callback'      => 'sanitize_hex_color',
		'transport' 				       => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ecomodernist_aboutsection_bg_color', array(
		'label'								     => esc_html__( 'About Section Background Color', 'ecomodernist' ),
		'description'					     => esc_html__( 'Transparent About section background color (Serif Design style only).', 'ecomodernist' ),
		'section'							     => 'colors',
		'settings'						     => 'ecomodernist_aboutsection_bg_color',
	) ) );

	$wp_customize->add_setting( 'ecomodernist_shopcats_bg_color' , array(
			'default' 			         => '#f2f2ee',
			'sanitize_callback'      => 'sanitize_hex_color',
		'transport' 				       => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ecomodernist_shopcats_bg_color', array(
		'label'								     => esc_html__( 'Shop Categories Background Color', 'ecomodernist' ),
		'description'					     => esc_html__( 'Background color of the "Shop Categories" Shop Front page section (only available, when WooCommerce is activated.)', 'ecomodernist' ),
		'section'							     => 'colors',
		'settings'						     => 'ecomodernist_shopcats_bg_color',
	) ) );

	// Ecomodernist Site Title - Custom Title and Logo
	$wp_customize->add_setting( 'ecomodernist_hidetagline', array(
		'default'							     => '',
		'sanitize_callback' 	     => 'ecomodernist_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'ecomodernist_hidetagline', array(
		'label'								     => esc_html__( 'Hide tagline only', 'ecomodernist' ),
		'section'							     => 'title_tagline',
		'type'								     => 'checkbox',
		'priority'						     => 22,
	) );

	$wp_customize->add_setting( 'ecomodernist_titleuppercase', array(
		'default'							     => '',
		'sanitize_callback' 	     => 'ecomodernist_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'ecomodernist_titleuppercase', array(
		'label'								     => esc_html__( 'Title in uppercase font', 'ecomodernist' ),
		'section'							     => 'title_tagline',
		'type'								     => 'checkbox',
		'priority'						     => 23,
	) );

	$wp_customize->add_setting( 'ecomodernist_customlogofooter', array(
		'default'							     => '',
		'sanitize_callback' 	     => 'ecomodernist_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'ecomodernist_customlogofooter', array(
		'label'								     => esc_html__( 'Show custom logo in footer', 'ecomodernist' ),
		'description'					     => esc_html__( '(Only available with the "standard" and "neo" design style, see Theme Options / Design Style.).', 'ecomodernist' ),
		'section'							     => 'title_tagline',
		'type'								     => 'checkbox',
		'priority'						     => 24,
	) );

	// Ecomodernist Additional Header Options
	$wp_customize->add_setting( 'ecomodernist_headerstyle', array(
		'default' 				         => 'header-fullwidth',
		'sanitize_callback' 	     => 'ecomodernist_sanitize_headerstyle',
	) );

	$wp_customize->add_control( 'ecomodernist_headerstyle', array(
		'label' 			             => esc_html__( 'Header Image Style', 'ecomodernist' ),
		'description'					     => esc_html__( 'Choose the Header image style you like to use.', 'ecomodernist' ),
		'section' 			           => 'header_image',
		'priority' 			           => 10,
		'type' 			               => 'select',
		'choices' 						     => array(
					'header-fullwidth' 	 => esc_html__( 'fullwidth', 'ecomodernist' ),
					'header-boxed' 			 => esc_html__( 'boxed', 'ecomodernist' ),
					'header-fullscreen'  => esc_html__( 'fullscreen (serif and standard only)', 'ecomodernist' ),
		),
	) );

	$wp_customize->add_setting( 'ecomodernist_custom_header_intro', array(
		'default' 			           => '',
		'sanitize_callback' 	     => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'ecomodernist_custom_header_intro', array(
		'label' 			             => esc_html__( 'Header Image Intro Text', 'ecomodernist' ),
		'description'					     => esc_html__( 'Add a short intro text that will displayed centered on your header image. (Design style "serif" only.)', 'ecomodernist' ),
		'section' 			           => 'header_image',
		'type' 			               => 'textarea',
		'priority'						     => 11,
	) );

	$wp_customize->add_setting( 'ecomodernist_scrolldownbtn_text', array(
		'default' 			           => 'Scroll Down',
		'sanitize_callback'		     => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'ecomodernist_scrolldownbtn_text', array(
		'label'								     => esc_html__( 'Customize "Scroll Down" button text', 'ecomodernist' ),
		'description'					     => esc_html__( '(Design style "serif" only.)', 'ecomodernist' ),
		'section' 					       => 'header_image',
		'type' 			               => 'text',
		'priority'						     => 12,
	) );

	// Ecomodernist Theme Options - General
	$wp_customize->add_setting( 'ecomodernist_sidebar', array(
		'default' 				         => 'sidebar-right',
		'sanitize_callback'		     => 'ecomodernist_sanitize_sidebar',
	) );

	$wp_customize->add_control( 'ecomodernist_sidebar', array(
		'label' 			             => esc_html__( 'Sidebar Position', 'ecomodernist' ),
		'section' 			           => 'ecomodernist_general',
		'priority' 			           => 2,
		'type' 			               => 'select',
		'choices'							     => array(
					'sidebar-right' 	   => esc_html__( 'sidebar right', 'ecomodernist' ),
					'sidebar-left' 		   => esc_html__( 'sidebar left', 'ecomodernist' ),
		),
	) );

	$wp_customize->add_setting( 'ecomodernist_sidebar_hide', array(
		'default' 				         => 'sidebar-show',
		'sanitize_callback' 	     => 'ecomodernist_sanitize_sidebar_hide',
	) );

	$wp_customize->add_control( 'ecomodernist_sidebar_hide', array(
		'label' 			             => esc_html__( 'Sidebar Visibility', 'ecomodernist' ),
		'section' 			           => 'ecomodernist_general',
		'priority' 			           => 3,
		'type' 			               => 'select',
		'choices' 						     => array(
					'sidebar-show'			 => esc_html__( 'Show sidebar', 'ecomodernist' ),
					'sidebar-no'				 => esc_html__( 'Hide sidebar', 'ecomodernist' ),
					'sidebar-no-single'	 => esc_html__( 'Hide sidebar on single posts', 'ecomodernist' ),
					'sidebar-no-front'	 => esc_html__( 'Hide sidebar on front page', 'ecomodernist' ),

		),
	) );

	$wp_customize->add_setting( 'ecomodernist_hidecomments', array(
		'default'							     => '',
		'sanitize_callback' 	     => 'ecomodernist_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'ecomodernist_hidecomments', array(
		'label'								     => esc_html__( 'Show Comments button on single posts', 'ecomodernist' ),
		'description'					     => esc_html__( '(Hides comments behind a Show Comments button on single posts.)', 'ecomodernist' ),
		'section'							     => 'ecomodernist_general',
		'type'								     => 'checkbox',
		'priority'						     => 4,
	) );

	$wp_customize->add_setting( 'ecomodernist_credit', array(
		'default' 			           => '',
		'sanitize_callback'		     => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'ecomodernist_credit', array(
		'label'								     => esc_html__( 'Footer credit text', 'ecomodernist' ),
		'description'					     => esc_html__( 'Customize the footer credit text. (HTML is allowed)', 'ecomodernist' ),
		'section' 					       => 'ecomodernist_general',
		'type' 			               => 'text',
		'priority'						     => 5,
	) );

	// Ecomodernist Theme Options - Header
	$wp_customize->add_setting( 'ecomodernist_hidesearch', array(
		'default'							     => '',
		'sanitize_callback' 	     => 'ecomodernist_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'ecomodernist_hidesearch', array(
		'label'								     => esc_html__( 'Hide search in Header', 'ecomodernist' ),
		'section'							     => 'ecomodernist_header',
		'type'								     => 'checkbox',
		'priority'						     => 1,
	) );

	$wp_customize->add_setting( 'ecomodernist_header_font', array(
		'default' 				         => 'dark',
		'sanitize_callback' 	     => 'ecomodernist_sanitize_header_font',
	) );

	$wp_customize->add_control( 'ecomodernist_header_font', array(
		'label' 			             => esc_html__( 'Header Font', 'ecomodernist' ),
		'description'					     => esc_html__( 'You can choose the light header font in combination with the fullscreen header image or fullscreen slider style.', 'ecomodernist' ),
		'section' 			           => 'ecomodernist_header',
		'priority' 			           => 2,
		'type' 			               => 'select',
		'choices' 							   => array(
					'light' 	           => esc_html__( 'light', 'ecomodernist' ),
					'dark' 		           => esc_html__( 'dark', 'ecomodernist' ),
		),
	) );

	$wp_customize->add_setting( 'ecomodernist_fixedheader_style', array(
		'default' 				         => 'light',
		'sanitize_callback' 	     => 'ecomodernist_sanitize_fixedheader_style',
	) );

	$wp_customize->add_control( 'ecomodernist_fixedheader_style', array(
		'label' 			             => esc_html__( 'Fix-positioned Header style', 'ecomodernist' ),
		'description'					     => esc_html__( 'Choose a dark or light colored fix-positioned header bar.', 'ecomodernist' ),
		'section' 			           => 'ecomodernist_header',
		'priority' 			           => 3,
		'type' 			               => 'select',
		'choices' 						     => array(
					'light' 	           => esc_html__( 'light', 'ecomodernist' ),
					'dark' 		           => esc_html__( 'dark', 'ecomodernist' ),
		),
	) );

	$wp_customize->add_setting( 'ecomodernist_fixedheader', array(
		'default'							     => '',
		'sanitize_callback' 	     => 'ecomodernist_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'ecomodernist_fixedheader', array(
		'label'								     => esc_html__( 'Hide fix-positioned Header', 'ecomodernist' ),
		'description'					     => esc_html__( '(By default the fix-positioned Header is visible on wider screens, if the browser window is scrolled.)', 'ecomodernist' ),
		'section'							     => 'ecomodernist_header',
		'type'								     => 'checkbox',
		'priority'						     => 4,
	) );

	// Ecomodernist Theme Options - Images
	$wp_customize->add_setting( 'ecomodernist_imggradient', array(
		'default' 			           => '0.7',
		'sanitize_callback' 	     => 'ecomodernist_sanitize_imggradient',
	) );

	$wp_customize->add_control( 'ecomodernist_imggradient', array(
		'label' 			             => esc_html__( 'Image Bottom Gradient', 'ecomodernist' ),
		'description'					     => esc_html__( 'Level of transparency (in percent) for the bottom gradient of Featured images with text on the image. (The default value is 70%. Ecomodernist standard only.)', 'ecomodernist' ),
		'section' 			           => 'ecomodernist_images',
		'priority' 			           => 1,
		'type' 			               => 'select',
		'choices' 						     => array(
			'0'                      => esc_html__( '0', 'ecomodernist' ),
					'0.1'		             => esc_html__( '10', 'ecomodernist' ),
					'0.2'		             => esc_html__( '20', 'ecomodernist' ),
					'0.3' 	             => esc_html__( '30', 'ecomodernist' ),
					'0.4'		             => esc_html__( '40', 'ecomodernist' ),
					'0.5' 	             => esc_html__( '50', 'ecomodernist' ),
					'0.6' 	             => esc_html__( '60', 'ecomodernist' ),
					'0.7' 	             => esc_html__( '70', 'ecomodernist' ),
					'0.8' 	             => esc_html__( '80', 'ecomodernist' ),
					'0.9' 	             => esc_html__( '90', 'ecomodernist' ),
					'0.99'	             => esc_html__( '100', 'ecomodernist' ),
		),
	) );

	$wp_customize->add_setting( 'ecomodernist_imgoverlay_color' , array(
			'default' 			         => '#000000',
			'sanitize_callback'      => 'sanitize_hex_color',
		'transport' 				       => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ecomodernist_imgoverlay_color', array(
		'label'								     => esc_html__( 'Image Overlay Color', 'ecomodernist' ),
		'description'					     => esc_html__( 'Image overlay color for Featured images with text on the image.', 'ecomodernist' ),
		'section'							     => 'ecomodernist_images',
		'priority' 			           => 2,
		'settings'						     => 'ecomodernist_imgoverlay_color',
	) ) );

	$wp_customize->add_setting( 'ecomodernist_imgoverlay_transparency', array(
		'default' 			           => '0',
		'sanitize_callback' 	     => 'ecomodernist_sanitize_imgoverlay_transparency',
	) );

	$wp_customize->add_control( 'ecomodernist_imgoverlay_transparency', array(
		'label' 			             => esc_html__( 'Image Overlay Transparency', 'ecomodernist' ),
		'description'					     => esc_html__( 'Overlay transparency (in percent) for Featured images with text on the image.', 'ecomodernist' ),
		'section' 			           => 'ecomodernist_images',
		'priority' 			           => 3,
		'type' 			               => 'select',
		'choices' 						     => array(
			'0'                      => esc_html__( '0', 'ecomodernist' ),
					'0.1'		             => esc_html__( '10', 'ecomodernist' ),
					'0.2' 	             => esc_html__( '20', 'ecomodernist' ),
					'0.3' 	             => esc_html__( '30', 'ecomodernist' ),
					'0.4' 	             => esc_html__( '40', 'ecomodernist' ),
					'0.5' 	             => esc_html__( '50', 'ecomodernist' ),
					'0.6' 	             => esc_html__( '60', 'ecomodernist' ),
					'0.7'		             => esc_html__( '70', 'ecomodernist' ),
					'0.8' 	             => esc_html__( '80', 'ecomodernist' ),
					'0.9'		             => esc_html__( '90', 'ecomodernist' ),
					'1' 		             => esc_html__( '100', 'ecomodernist' ),
		),
	) );

	$wp_customize->add_setting( 'ecomodernist_image_font', array(
		'default' 				         => 'light',
		'sanitize_callback' 	     => 'ecomodernist_sanitize_header_font',
	) );

	$wp_customize->add_control( 'ecomodernist_image_font', array(
		'label' 			             => esc_html__( 'Image Font', 'ecomodernist' ),
		'description'					     => esc_html__( 'You can choose a dark image font, if you have Featured images in very light colors. (Ecomodernist standard only)', 'ecomodernist' ),
		'section' 			           => 'ecomodernist_images',
		'priority' 			           => 4,
		'type' 			               => 'select',
		'choices' 						     => array(
					'light' 	           => esc_html__( 'light', 'ecomodernist' ),
					'dark' 		           => esc_html__( 'dark', 'ecomodernist' ),
		),
	) );


	// Ecomodernist Theme Options - Big Footer Feature Area
	$wp_customize->add_setting( 'ecomodernist_footerfeature_title', array(
		'default' 			           => '',
		'sanitize_callback' 	     => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'ecomodernist_footerfeature_title', array(
		'label' 			             => esc_html__( 'Title', 'ecomodernist' ),
		'description'					     => esc_html__( 'A small title text visible at the top of the area.', 'ecomodernist' ),
		'section' 			           => 'ecomodernist_footerfeature',
		'type' 			               => 'text',
		'priority'						     => 1,
	) );

	$wp_customize->add_setting( 'ecomodernist_footerfeature_image', array(
		'default' 			           => '',
		'sanitize_callback' 	     => 'wp_kses_post',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,'ecomodernist_footerfeature_image', array(
				'label'						     => esc_html__( 'Upload Featured image', 'ecomodernist' ),
				'section'					     => 'ecomodernist_footerfeature',
				'priority'				     => 2,
	) ) );

	$wp_customize->add_setting( 'ecomodernist_footerfeature_text_big', array(
		'default' 			           => '',
		'sanitize_callback' 	     => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'ecomodernist_footerfeature_text_big', array(
		'label' 			             => esc_html__( 'Big Text', 'ecomodernist' ),
		'section' 			           => 'ecomodernist_footerfeature',
		'type' 			               => 'textarea',
		'description'					     => esc_html__( 'A big slogan text next to the image (HTML is allowed.)', 'ecomodernist' ),
		'priority'						     => 3,
	) );

	$wp_customize->add_setting( 'ecomodernist_footerfeature_text_small', array(
		'default' 			           => '',
		'sanitize_callback' 	     => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'ecomodernist_footerfeature_text_small', array(
		'label' 			             => esc_html__( 'Small Text', 'ecomodernist' ),
		'description'					     => esc_html__( 'An additional smaller description text below the big text (HTML is allowed.)', 'ecomodernist' ),
		'section' 			           => 'ecomodernist_footerfeature',
		'type' 			               => 'textarea',
		'priority'						     => 4,
	) );

	$wp_customize->add_setting( 'ecomodernist_footerfeature_btn_text', array(
		'default' 			           => '',
		'sanitize_callback' 	     => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'ecomodernist_footerfeature_btn_text', array(
		'label' 			             => esc_html__( 'Button Text', 'ecomodernist' ),
		'description'					     => esc_html__( 'If you want to add a "Call to Action" button, include the button text here.', 'ecomodernist' ),
		'section' 			           => 'ecomodernist_footerfeature',
		'type' 			               => 'text',
		'priority'						     => 5,
	) );

	$wp_customize->add_setting( 'ecomodernist_footerfeature_btn_link', array(
		'default' 			           => '',
		'sanitize_callback' 	     => 'esc_url_raw',
	) );

	$wp_customize->add_control( 'ecomodernist_footerfeature_btn_link', array(
		'label' 			             => esc_html__( 'Button Link URL', 'ecomodernist' ),
		'description'					     => esc_html__( 'The URL the button should link to.', 'ecomodernist' ),
		'section' 			           => 'ecomodernist_footerfeature',
		'type' 			               => 'text',
		'priority'						     => 6,
	) );


	// Ecomodernist Front Page - General
	$wp_customize->add_setting( 'ecomodernist_bloglayout', array(
		'default' 				         => 'default',
		'sanitize_callback' 	     => 'ecomodernist_sanitize_bloglayout',
	) );

	$wp_customize->add_control( 'ecomodernist_bloglayout', array(
		'label' 			             => esc_html__( 'Blog Layout', 'ecomodernist' ),
		'description'					     => esc_html__( 'Choose your blog layout', 'ecomodernist' ),
		'section' 			           => 'ecomodernist_frontpage_general',
		'priority' 			           => 1,
		'type' 			               => 'select',
		'choices' 						     => array(
					'default'						=> esc_html__( 'default', 'ecomodernist' ),
					'fourthhighlighted' => esc_html__( 'default, every 4. post highlighted', 'ecomodernist' ),
					'classic' 					=> esc_html__( 'classic', 'ecomodernist' ),
					'threecolumns' 			=> esc_html__( '3-column grid', 'ecomodernist' ),
					'fourcolumns' 			=> esc_html__( '4-column grid', 'ecomodernist' ),
		),
	) );

	$wp_customize->add_setting( 'ecomodernist_front_hideblog', array(
		'default'							     => '',
		'sanitize_callback' 	     => 'ecomodernist_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'ecomodernist_front_hideblog', array(
		'label'								     => esc_html__( 'Hide blog on Front page', 'ecomodernist' ),
		'section'							     => 'ecomodernist_frontpage_general',
		'type'								     => 'checkbox',
		'priority'						     => 2,
	) );

	$wp_customize->add_setting( 'ecomodernist_front_hidedate', array(
		'default'							     => '',
		'sanitize_callback' 	     => 'ecomodernist_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'ecomodernist_front_hidedate', array(
		'label'								     => esc_html__( 'Hide date on Front page', 'ecomodernist' ),
		'section'							     => 'ecomodernist_frontpage_general',
		'type'								     => 'checkbox',
		'priority'						     => 3,
	) );

	$wp_customize->add_setting( 'ecomodernist_front_hidecomments', array(
		'default'							     => '',
		'sanitize_callback' 	     => 'ecomodernist_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'ecomodernist_front_hidecomments', array(
		'label'								     => esc_html__( 'Hide comments count on Front page', 'ecomodernist' ),
		'section'							     => 'ecomodernist_frontpage_general',
		'type'								     => 'checkbox',
		'priority'						     => 4,
	) );

	$wp_customize->add_setting( 'ecomodernist_front_hidecats', array(
		'default'							     => '',
		'sanitize_callback'		     => 'ecomodernist_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'ecomodernist_front_hidecats', array(
		'label'								     => esc_html__( 'Hide categories on Front page', 'ecomodernist' ),
		'section'							     => 'ecomodernist_frontpage_general',
		'type'								     => 'checkbox',
		'priority'						     => 5,
	) );

	$wp_customize->add_setting( 'ecomodernist_front_hideauthor', array(
		'default'							     => '',
		'sanitize_callback' 	     => 'ecomodernist_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'ecomodernist_front_hideauthor', array(
		'label'								     => esc_html__( 'Hide author name on Front page', 'ecomodernist' ),
		'section'							     => 'ecomodernist_frontpage_general',
		'type'								     => 'checkbox',
		'priority'						     => 6,
	) );

	$wp_customize->add_setting( 'ecomodernist_custom_latestposts', array(
		'default' 			           => '',
		'sanitize_callback' 	     => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'ecomodernist_custom_latestposts', array(
		'label' 			             => esc_html__( 'Latest Posts title', 'ecomodernist' ),
		'description'					     => esc_html__( 'Customize the "Latest Posts" title text above the blog content on your blog front page.', 'ecomodernist' ),
		'section' 			           => 'ecomodernist_frontpage_general',
		'type' 			               => 'text',
		'priority'						     => 7,
	) );

	$wp_customize->add_setting( 'ecomodernist_front_hidelatestpoststitle', array(
		'default'							     => '',
		'sanitize_callback' 	     => 'ecomodernist_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'ecomodernist_front_hidelatestpoststitle', array(
		'label'								     => esc_html__( 'Hide Latest Posts title', 'ecomodernist' ),
		'section'							     => 'ecomodernist_frontpage_general',
		'type'								     => 'checkbox',
		'priority'						     => 8,
	) );

	$wp_customize->add_setting( 'ecomodernist_custom_followus', array(
		'default' 			           => '',
		'sanitize_callback' 	     => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'ecomodernist_custom_followus', array(
		'label' 			             => esc_html__( 'Follow us text', 'ecomodernist' ),
		'description'					     => esc_html__( 'Customize the "Follow us" text in your About section and footer social menus.', 'ecomodernist' ),
		'section' 			           => 'ecomodernist_frontpage_general',
		'type' 			               => 'text',
		'priority'						     => 9,
	) );


	// Ecomodernist Theme Options - Featured Posts Slider
	$wp_customize->add_setting( 'ecomodernist_featuredtag', array(
		'default' 			           => '',
		'sanitize_callback' 	     => 'wp_kses_post',
	) );

	$wp_customize->add_control(new WP_Customize_Tag_Control($wp_customize,'ecomodernist_featuredtag', array(
		'label' 			             => esc_html__( 'Featured Slider tag (required)', 'ecomodernist' ),
		'settings' 						     => 'ecomodernist_featuredtag',
		'section' 						     => 'ecomodernist_slider',
		'priority'						     => 1,
	) ) );

	$wp_customize->add_setting( 'ecomodernist_sliderstyle', array(
		'default' 				         => 'slider-fullwidth',
		'sanitize_callback' 	     => 'ecomodernist_sanitize_sliderstyle',
	) );

	$wp_customize->add_control( 'ecomodernist_sliderstyle', array(
		'label' 			             => esc_html__( 'Slider Style', 'ecomodernist' ),
		'description'					     => esc_html__( 'Choose the slider design.', 'ecomodernist' ),
		'section' 			           => 'ecomodernist_slider',
		'priority' 			           => 2,
		'type' 			               => 'select',
		'choices' 						     => array(
			'slider-fullwidth'	 => esc_html__( 'fullwidth', 'ecomodernist' ),
			'slider-boxed' 			 => esc_html__( 'boxed', 'ecomodernist' ),
			'slider-fullscreen'  => esc_html__( 'fullscreen', 'ecomodernist' ),
		),
	) );

	$wp_customize->add_setting( 'ecomodernist_slideranimation', array(
		'default' 				         => 'slider-slide',
		'sanitize_callback' 	     => 'ecomodernist_sanitize_slideranimation',
	) );

	$wp_customize->add_control( 'ecomodernist_slideranimation', array(
		'label' 			             => esc_html__( 'Slider Image Animation', 'ecomodernist' ),
		'description'					     => esc_html__( 'Choose, if you want the slider images to fade or slide from one image to the next.', 'ecomodernist' ),
		'section' 			           => 'ecomodernist_slider',
		'priority' 			           => 3,
		'type' 			               => 'select',
		'choices' 						     => array(
			'slider-slide'	 => esc_html__( 'slide', 'ecomodernist' ),
			'slider-fade' 			 => esc_html__( 'fade', 'ecomodernist' ),
		),
	) );

	// Ecomodernist Front Page - Sections 1 (Featured Top)
	$wp_customize->add_setting( 'ecomodernist_front_section_one_title', array(
		'default' 			           => '',
		'sanitize_callback' 	     => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'ecomodernist_front_section_one_title', array(
		'label' 			             => esc_html__( 'Section Title (optional)', 'ecomodernist' ),
		'description'					     => esc_html__( 'The title will appear at the top of the section.', 'ecomodernist' ),
		'section' 			           => 'ecomodernist_front_section_one',
		'type' 			               => 'text',
		'priority'						     => 1,
	) );

	$wp_customize->add_setting( 'ecomodernist_front_section_one_cat', array(
		'default' 			           => '',
		'sanitize_callback' 	     => 'wp_kses_post',
	) );

	$wp_customize->add_control(new WP_Customize_Category_Control($wp_customize,'ecomodernist_front_section_one_cat', array(
		'label' 							     => esc_html__( 'Section category', 'ecomodernist' ),
		'settings' 						     => 'ecomodernist_front_section_one_cat',
		'section' 						     => 'ecomodernist_front_section_one',
		'priority'						     => 2,
	) ) );

	$wp_customize->add_setting( 'ecomodernist_front_section_one_tag', array(
		'default' 			           => '',
		'sanitize_callback' 	     => 'wp_kses_post',
	) );

	$wp_customize->add_control(new WP_Customize_Tag_Control($wp_customize,'ecomodernist_front_section_one_tag', array(
		'label' 			             => esc_html__( 'Section tag', 'ecomodernist' ),
		'settings' 						     => 'ecomodernist_front_section_one_tag',
		'section' 						     => 'ecomodernist_front_section_one',
		'priority'						     => 3,
	) ) );

	// Ecomodernist Front Page - Sections 2 (Featured Bottom)
	$wp_customize->add_setting( 'ecomodernist_front_section_two_title', array(
		'default' 			           => '',
		'sanitize_callback' 	     => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'ecomodernist_front_section_two_title', array(
		'label' 			             => esc_html__( 'Section Title (optional)', 'ecomodernist' ),
		'description'					     => esc_html__( 'The title will appear at the top of the section.', 'ecomodernist' ),
		'section' 			           => 'ecomodernist_front_section_two',
		'type' 			               => 'text',
		'priority'						     => 1,
	) );

	$wp_customize->add_setting( 'ecomodernist_front_section_two_cat', array(
		'default' 			           => '',
		'sanitize_callback' 	     => 'wp_kses_post',
	) );

	$wp_customize->add_control(new WP_Customize_Category_Control($wp_customize,'ecomodernist_front_section_two_cat', array(
		'label' 							     => esc_html__( 'Section category', 'ecomodernist' ),
		'settings' 						     => 'ecomodernist_front_section_two_cat',
		'section' 						     => 'ecomodernist_front_section_two',
		'priority'						     => 2,
	) ) );

	$wp_customize->add_setting( 'ecomodernist_front_section_two_tag', array(
		'default' 			           => '',
		'sanitize_callback' 	     => 'wp_kses_post',
	) );

	$wp_customize->add_control(new WP_Customize_Tag_Control($wp_customize,'ecomodernist_front_section_two_tag', array(
		'label' 			             => esc_html__( 'Section tag', 'ecomodernist' ),
		'settings' 						     => 'ecomodernist_front_section_two_tag',
		'section' 						     => 'ecomodernist_front_section_two',
		'priority'						     => 3,
	) ) );

	// Ecomodernist Front Page - Sections 3 (on Background)
	$wp_customize->add_setting( 'ecomodernist_front_section_three_title', array(
		'default' 			           => '',
		'sanitize_callback'		     => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'ecomodernist_front_section_three_title', array(
		'label' 			             => esc_html__( 'Section Title (optional)', 'ecomodernist' ),
		'description'					     => esc_html__( 'The title will appear at the top of the section.', 'ecomodernist' ),
		'section' 			           => 'ecomodernist_front_section_three',
		'type' 			               => 'text',
		'priority'						     => 1,
	) );

	$wp_customize->add_setting( 'ecomodernist_front_section_three_cat', array(
		'default' 			           => '',
		'sanitize_callback' 	     => 'wp_kses_post',
	) );

	$wp_customize->add_control(new WP_Customize_Category_Control($wp_customize,'ecomodernist_front_section_three_cat', array(
		'label' 							     => esc_html__( 'Section category', 'ecomodernist' ),
		'settings' 						     => 'ecomodernist_front_section_three_cat',
		'section' 						     => 'ecomodernist_front_section_three',
		'priority'						     => 2,
	) ) );

	$wp_customize->add_setting( 'ecomodernist_front_section_three_tag', array(
		'default' 			           => '',
		'sanitize_callback' 	     => 'wp_kses_post',
	) );

	$wp_customize->add_control(new WP_Customize_Tag_Control($wp_customize,'ecomodernist_front_section_three_tag', array(
		'label' 			             => esc_html__( 'Section tag', 'ecomodernist' ),
		'settings' 						     => 'ecomodernist_front_section_three_tag',
		'section' 						     => 'ecomodernist_front_section_three',
		'priority'						     => 3,
	) ) );

	// Ecomodernist Front Page - Sections 4 (Fullwidth)
	$wp_customize->add_setting( 'ecomodernist_front_section_four_cat', array(
		'default' 			           => '',
			'sanitize_callback'	     => 'wp_kses_post',
	) );

	$wp_customize->add_control(new WP_Customize_Category_Control($wp_customize,'ecomodernist_front_section_four_cat', array(
		'label' 							     => esc_html__( 'Section category', 'ecomodernist' ),
		'settings' 						     => 'ecomodernist_front_section_four_cat',
		'section' 						     => 'ecomodernist_front_section_four',
		'priority'						     => 1,
	) ) );

	$wp_customize->add_setting( 'ecomodernist_front_section_four_tag', array(
		'default' 			           => '',
		'sanitize_callback' 	     => 'wp_kses_post',
	) );

	$wp_customize->add_control(new WP_Customize_Tag_Control($wp_customize,'ecomodernist_front_section_four_tag', array(
		'label' 			             => esc_html__( 'Section tag', 'ecomodernist' ),
		'settings' 						     => 'ecomodernist_front_section_four_tag',
		'section' 						     => 'ecomodernist_front_section_four',
		'priority'						     => 2,
	) ) );

	// Ecomodernist Front Page - Sections About
	$wp_customize->add_setting( 'ecomodernist_front_section_about_title', array(
		'default' 			           => '',
		'sanitize_callback' 	     => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'ecomodernist_front_section_about_title', array(
		'label' 			             => esc_html__( 'Section Title', 'ecomodernist' ),
		'section' 			           => 'ecomodernist_front_section_about',
		'type' 			               => 'text',
		'priority'						     => 1,
	) );

	$wp_customize->add_setting( 'ecomodernist_front_section_about_image', array(
		'default' 			           => '',
		'sanitize_callback' 	     => 'wp_kses_post',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,'ecomodernist_front_section_about_image', array(
				'label'						     => esc_html__( 'Upload About image', 'ecomodernist' ),
				'description'			     => esc_html__( 'The recommended image width for the About image is 580 pixels for Ecomodernist standard and 1500 pixels for the Ecomodernist neo and serif design style.', 'ecomodernist' ),
				'section'					     => 'ecomodernist_front_section_about',
				'priority'				     => 2,
	) ) );

	$wp_customize->add_setting( 'ecomodernist_front_section_about_text', array(
		'default' 			           => '',
		'sanitize_callback' 	     => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'ecomodernist_front_section_about_text', array(
		'label' 			             => esc_html__( 'About Text (required)', 'ecomodernist' ),
		'section' 			           => 'ecomodernist_front_section_about',
		'type' 			               => 'textarea',
		'description'					     => esc_html__( '(HTML is allowed.)', 'ecomodernist' ),
		'priority'						     => 3,
	) );


	// Ecomodernist Front Page - Sections 2-Column
	$wp_customize->add_setting( 'ecomodernist_front_section_twocolumn_title', array(
		'default' 			           => '',
		'sanitize_callback' 	     => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'ecomodernist_front_section_twocolumn_title', array(
		'label' 			             => esc_html__( 'Section Title (optional)', 'ecomodernist' ),
		'description'					     => esc_html__( 'The title will appear at the top of the section.', 'ecomodernist' ),
		'section' 			           => 'ecomodernist_front_section_twocolumn',
		'type' 			               => 'text',
		'priority'						     => 1,
	) );

	$wp_customize->add_setting( 'ecomodernist_front_section_twocolumn_cat', array(
		'default' 			           => '',
		'sanitize_callback'		     => 'wp_kses_post',
	) );

	$wp_customize->add_control(new WP_Customize_Category_Control($wp_customize,'ecomodernist_front_section_twocolumn_cat', array(
		'label' 							     => esc_html__( 'Section category', 'ecomodernist' ),
		'settings' 						     => 'ecomodernist_front_section_twocolumn_cat',
		'section' 						     => 'ecomodernist_front_section_twocolumn',
		'priority'						     => 2,
	) ) );

	$wp_customize->add_setting( 'ecomodernist_front_section_twocolumn_tag', array(
		'default' 			           => '',
		'sanitize_callback' 	     => 'wp_kses_post',
	) );

	$wp_customize->add_control(new WP_Customize_Tag_Control($wp_customize,'ecomodernist_front_section_twocolumn_tag', array(
		'label' 			             => esc_html__( 'Section tag', 'ecomodernist' ),
		'settings' 						     => 'ecomodernist_front_section_twocolumn_tag',
		'section' 						     => 'ecomodernist_front_section_twocolumn',
		'priority'						     => 2,
	) ) );

	$wp_customize->add_setting( 'ecomodernist_front_section_twocolumn_number', array(
		'default' 				         => '',
		'sanitize_callback' 	     => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'ecomodernist_front_section_twocolumn_number', array(
		'label' 			             => esc_html__( 'Number of posts', 'ecomodernist' ),
		'section' 			           => 'ecomodernist_front_section_twocolumn',
		'priority' 			           => 4,
		'type' 			               => 'text',
	) );

	$wp_customize->add_setting( 'ecomodernist_front_section_twocolumn_excerpt', array(
		'default'							     => '',
		'sanitize_callback' 	     => 'ecomodernist_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'ecomodernist_front_section_twocolumn_excerpt', array(
		'label'								     => esc_html__( 'Show post excerpt texts', 'ecomodernist' ),
		'section'							     => 'ecomodernist_front_section_twocolumn',
		'type'								     => 'checkbox',
		'priority'						     => 5,
	) );

	// Ecomodernist Front Page - Sections 3-Column
	$wp_customize->add_setting( 'ecomodernist_front_section_threecolumn_title', array(
		'default' 			           => '',
		'sanitize_callback' 	     => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'ecomodernist_front_section_threecolumn_title', array(
		'label' 			             => esc_html__( 'Section Title (optional)', 'ecomodernist' ),
		'description'					     => esc_html__( 'The title will appear at the top of the section.', 'ecomodernist' ),
		'section' 			           => 'ecomodernist_front_section_threecolumn',
		'type' 			               => 'text',
		'priority'						     => 1,
	) );

	$wp_customize->add_setting( 'ecomodernist_front_section_threecolumn_cat', array(
		'default' 			           => '',
		'sanitize_callback'		     => 'wp_kses_post',
	) );

	$wp_customize->add_control(new WP_Customize_Category_Control($wp_customize,'ecomodernist_front_section_threecolumn_cat', array(
		'label' 							     => esc_html__( 'Section category', 'ecomodernist' ),
		'settings' 						     => 'ecomodernist_front_section_threecolumn_cat',
		'section' 						     => 'ecomodernist_front_section_threecolumn',
		'priority'						     => 2,
	) ) );

	$wp_customize->add_setting( 'ecomodernist_front_section_threecolumn_tag', array(
		'default' 			           => '',
		'sanitize_callback' 	     => 'wp_kses_post',
	) );

	$wp_customize->add_control(new WP_Customize_Tag_Control($wp_customize,'ecomodernist_front_section_threecolumn_tag', array(
		'label' 			             => esc_html__( 'Section tag', 'ecomodernist' ),
		'settings' 						     => 'ecomodernist_front_section_threecolumn_tag',
		'section' 						     => 'ecomodernist_front_section_threecolumn',
		'priority'						     => 3,
	) ) );

	$wp_customize->add_setting( 'ecomodernist_front_section_threecolumn_number', array(
		'default' 				         => '',
		'sanitize_callback'		     => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'ecomodernist_front_section_threecolumn_number', array(
		'label' 			             => esc_html__( 'Number of posts', 'ecomodernist' ),
		'section' 			           => 'ecomodernist_front_section_threecolumn',
		'priority' 			           => 4,
		'type' 			               => 'text',
	) );

	$wp_customize->add_setting( 'ecomodernist_front_section_threecolumn_excerpt', array(
		'default'							     => '',
		'sanitize_callback' 	     => 'ecomodernist_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'ecomodernist_front_section_threecolumn_excerpt', array(
		'label'								     => esc_html__( 'Show post excerpt texts', 'ecomodernist' ),
		'section'							     => 'ecomodernist_front_section_threecolumn',
		'type'								     => 'checkbox',
		'priority'						     => 5,
	) );


	// Ecomodernist Front Page - Sections 4-Column
	$wp_customize->add_setting( 'ecomodernist_front_section_fourcolumn_title', array(
		'default' 			           => '',
		'sanitize_callback' 	     => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'ecomodernist_front_section_fourcolumn_title', array(
		'label' 			           => esc_html__( 'Section title (optional)', 'ecomodernist' ),
		'description'					   => esc_html__( 'The title will appear at the top of the section.', 'ecomodernist' ),
		'section' 			         => 'ecomodernist_front_section_fourcolumn',
		'type' 			             => 'text',
		'priority'						   => 1,
	) );

	$wp_customize->add_setting( 'ecomodernist_front_section_fourcolumn_cat', array(
		'default' 			         => '',
		'sanitize_callback' 	   => 'wp_kses_post',
	) );

	$wp_customize->add_control(new WP_Customize_Category_Control($wp_customize,'ecomodernist_front_section_fourcolumn_cat', array(
		'label' 							   => esc_html__( 'Section category', 'ecomodernist' ),
		'settings' 						   => 'ecomodernist_front_section_fourcolumn_cat',
		'section' 						   => 'ecomodernist_front_section_fourcolumn',
		'priority'						   => 2,
	) ) );

	$wp_customize->add_setting( 'ecomodernist_front_section_fourcolumn_tag', array(
		'default' 			         => '',
		'sanitize_callback' 	   => 'wp_kses_post',
	) );

	$wp_customize->add_control(new WP_Customize_Tag_Control($wp_customize,'ecomodernist_front_section_fourcolumn_tag', array(
		'label' 			           => esc_html__( 'Section tag', 'ecomodernist' ),
		'settings' 						   => 'ecomodernist_front_section_fourcolumn_tag',
		'section' 						   => 'ecomodernist_front_section_fourcolumn',
		'priority'						   => 3,
	) ) );

	$wp_customize->add_setting( 'ecomodernist_front_section_fourcolumn_number', array(
		'default' 				       => '',
		'sanitize_callback' 	   => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'ecomodernist_front_section_fourcolumn_number', array(
		'label' 			           => esc_html__( 'Number of posts', 'ecomodernist' ),
		'section' 			         => 'ecomodernist_front_section_fourcolumn',
		'priority' 			         => 4,
		'type' 			             => 'text',
	) );

	$wp_customize->add_setting( 'ecomodernist_front_section_fourcolumn_excerpt', array(
		'default'							   => '',
		'sanitize_callback' 	   => 'ecomodernist_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'ecomodernist_front_section_fourcolumn_excerpt', array(
		'label'								   => esc_html__( 'Show post excerpt texts', 'ecomodernist' ),
		'section'							   => 'ecomodernist_front_section_fourcolumn',
		'type'								   => 'checkbox',
		'priority'						   => 5,
	) );


	// Ecomodernist Front Page - Sections 6-Column
	$wp_customize->add_setting( 'ecomodernist_front_section_sixcolumn_title', array(
		'default' 			         => '',
		'sanitize_callback'		   => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'ecomodernist_front_section_sixcolumn_title', array(
		'label' 			           => esc_html__( 'Section Title (optional)', 'ecomodernist' ),
		'description'					   => esc_html__( 'The title will appear at the top of the section.', 'ecomodernist' ),
		'section' 			         => 'ecomodernist_front_section_sixcolumn',
		'type' 			             => 'text',
		'priority'						   => 1,
	) );

	$wp_customize->add_setting( 'ecomodernist_front_section_sixcolumn_cat', array(
		'default' 			         => '',
		'sanitize_callback' 	   => 'wp_kses_post',
	) );

	$wp_customize->add_control(new WP_Customize_Category_Control($wp_customize,'ecomodernist_front_section_sixcolumn_cat', array(
		'label' 							   => esc_html__( 'Section category', 'ecomodernist' ),
		'settings' 						   => 'ecomodernist_front_section_sixcolumn_cat',
		'section' 						   => 'ecomodernist_front_section_sixcolumn',
		'priority'						   => 2,
	) ) );

	$wp_customize->add_setting( 'ecomodernist_front_section_sixcolumn_tag', array(
		'default' 			         => '',
		'sanitize_callback'		   => 'wp_kses_post',
	) );

	$wp_customize->add_control(new WP_Customize_Tag_Control($wp_customize,'ecomodernist_front_section_sixcolumn_tag', array(
			'label' 			         => esc_html__( 'Section tag', 'ecomodernist' ),
			'settings' 						 => 'ecomodernist_front_section_sixcolumn_tag',
			'section' 						 => 'ecomodernist_front_section_sixcolumn',
			'priority'						 => 3,
	) ) );

	$wp_customize->add_setting( 'ecomodernist_front_section_sixcolumn_number', array(
			'default' 				     => '',
			'sanitize_callback' 	 => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'ecomodernist_front_section_sixcolumn_number', array(
			'label' 			         => esc_html__( 'Number of posts', 'ecomodernist' ),
			'section' 			       => 'ecomodernist_front_section_sixcolumn',
			'priority' 			       => 4,
			'type' 			           => 'text',
	) );

	$wp_customize->add_setting( 'ecomodernist_front_section_sixcolumn_excerpt', array(
			'default'							 => '',
			'sanitize_callback' 	 => 'ecomodernist_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'ecomodernist_front_section_sixcolumn_excerpt', array(
			'label'								 => esc_html__( 'Show post excerpt texts', 'ecomodernist' ),
			'section'							 => 'ecomodernist_front_section_sixcolumn',
			'type'								 => 'checkbox',
			'priority'						 => 5,
	) );


	// Ecomodernist Shop - Front Page

	// General Settings
	$wp_customize->add_setting('ecomodernist_shopfront_about_activate', array(
		'default'           => '',
		'sanitize_callback' => 'ecomodernist_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'ecomodernist_shopfront_about_activate', array(
		'type'              => 'checkbox',
		'label'             => esc_html__('Show About Section on Shop Front Page', 'ecomodernist'),
		'section'           => 'ecomodernist_shop_front_general',
		'priority'          => 1,
	) );

	$wp_customize->add_setting('ecomodernist_shopfront_blog_activate', array(
		'default'           => '',
		'sanitize_callback' => 'ecomodernist_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'ecomodernist_shopfront_blog_activate', array(
		'type'              => 'checkbox',
		'label'             => esc_html__('Show "Posts on a Background" Section on Shop Front Page', 'ecomodernist'),
		'section'           => 'ecomodernist_shop_front_general',
		'priority'          => 2,
	) );

	// Product catgories
	$wp_customize->add_setting('ecomodernist_shopcats_activate', array(
		'default'           => '',
		'sanitize_callback' => 'ecomodernist_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'ecomodernist_shopcats_activate', array(
		'type'              => 'checkbox',
		'label'             => esc_html__('Show product categories', 'ecomodernist'),
		'section'           => 'ecomodernist_shop_front_cats',
		'priority'          => 1,
	) );

	$wp_customize->add_setting( 'ecomodernist_shopcats_number', array(
		'sanitize_callback' => 'absint',
		'default'           => '3'
) );

	$wp_customize->add_control( 'ecomodernist_shopcats_number', array(
		'type'              => 'number',
		'label'             => esc_html__('Number of product categories', 'ecomodernist'),
		'section'           => 'ecomodernist_shop_front_cats',
		'priority'          => 2,
	) );

	$wp_customize->add_setting('ecomodernist_shopcats_title', array(
		'default'           => esc_html__('Product categories', 'ecomodernist'),
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'ecomodernist_shopcats_title', array(
		'type'              => 'text',
		'label'             => esc_html__('Product categories title', 'ecomodernist'),
		'section'           => 'ecomodernist_shop_front_cats',
		'priority'          => 3,
	) );

	// Featured Products
	$wp_customize->add_setting('ecomodernist_shopfeatured_activate', array(
		'default'           => '',
		'sanitize_callback' => 'ecomodernist_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'ecomodernist_shopfeatured_activate', array(
		'type'              => 'checkbox',
		'label'             => esc_html__('Show Featured products', 'ecomodernist'),
		'section'           => 'ecomodernist_shop_front_featured',
		'priority'          => 1,
	) );

	$wp_customize->add_setting( 'ecomodernist_shopfeatured_number', array(
		'sanitize_callback' => 'absint',
		'default'           => '2'
) );

	$wp_customize->add_control( 'ecomodernist_shopfeatured_number', array(
		'type'              => 'number',
		'label'             => esc_html__('Number of Featured products', 'ecomodernist'),
		'section'           => 'ecomodernist_shop_front_featured',
		'priority'          => 2,
	) );

	$wp_customize->add_setting('ecomodernist_shopfeatured_title', array(
		'default'           => esc_html__('Featured Products', 'ecomodernist'),
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'ecomodernist_shopfeatured_title', array(
		'type'              => 'text',
		'label'             => esc_html__('Featured products title', 'ecomodernist'),
		'section'           => 'ecomodernist_shop_front_featured',
		'priority'          => 3,
	) );

	// Latest Products
	$wp_customize->add_setting('ecomodernist_shoplatest_activate', array(
		'default'           => '',
		'sanitize_callback' => 'ecomodernist_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'ecomodernist_shoplatest_activate', array(
		'type'              => 'checkbox',
		'label'             => esc_html__('Show Latest products', 'ecomodernist'),
		'section'           => 'ecomodernist_shop_front_latest',
		'priority'          => 1,
	) );

	$wp_customize->add_setting( 'ecomodernist_shoplatest_number', array(
		'sanitize_callback' => 'absint',
		'default'           => '4'
) );

	$wp_customize->add_control( 'ecomodernist_shoplatest_number', array(
		'type'              => 'number',
		'label'             => esc_html__('Number of Latest products', 'ecomodernist'),
		'section'           => 'ecomodernist_shop_front_latest',
		'priority'          => 2,
	) );

	$wp_customize->add_setting('ecomodernist_shoplatest_title', array(
		'default'           => esc_html__('Latest Products', 'ecomodernist'),
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'ecomodernist_shoplatest_title', array(
		'type'              => 'text',
		'label'             => esc_html__('Latest products title', 'ecomodernist'),
		'section'           => 'ecomodernist_shop_front_latest',
		'priority'          => 3,
	) );

	// Top Rated Products
	$wp_customize->add_setting('ecomodernist_shoptoprated_activate', array(
		'default'           => '',
		'sanitize_callback' => 'ecomodernist_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'ecomodernist_shoptoprated_activate', array(
		'type'              => 'checkbox',
		'label'             => esc_html__('Show Top Rated products', 'ecomodernist'),
		'section'           => 'ecomodernist_shop_front_toprated',
		'priority'          => 1,
	) );

	$wp_customize->add_setting( 'ecomodernist_shoptoprated_number', array(
		'sanitize_callback' => 'absint',
		'default'           => '4'
	) );

	$wp_customize->add_control( 'ecomodernist_shoptoprated_number', array(
		'type'              => 'number',
		'label'             => esc_html__('Number of Top Rated products', 'ecomodernist'),
		'section'           => 'ecomodernist_shop_front_toprated',
		'priority'          => 2,
	) );

	$wp_customize->add_setting('ecomodernist_shoptoprated_title', array(
		'default'           => esc_html__('Top Rated', 'ecomodernist'),
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'ecomodernist_shoptoprated_title', array(
		'type'              => 'text',
		'label'             => esc_html__('Top Rated products title', 'ecomodernist'),
		'section'           => 'ecomodernist_shop_front_toprated',
		'priority'          => 3,
	) );

	// On Sale Products
	$wp_customize->add_setting('ecomodernist_shopsale_activate', array(
		'default'           => '',
		'sanitize_callback' => 'ecomodernist_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'ecomodernist_shopsale_activate', array(
		'type'              => 'checkbox',
		'label'             => esc_html__('Show On Sale products', 'ecomodernist'),
		'section'           => 'ecomodernist_shop_front_sale',
		'priority'          => 1,
	) );

	$wp_customize->add_setting( 'ecomodernist_shopsale_number', array(
	'sanitize_callback'   => 'absint',
	'default'             => '4'
	) );

	$wp_customize->add_control( 'ecomodernist_shopsale_number', array(
		'type'              => 'number',
		'label'             => esc_html__('Number of On Sale products', 'ecomodernist'),
		'section'           => 'ecomodernist_shop_front_sale',
		'priority'          => 2,
	) );

	$wp_customize->add_setting('ecomodernist_shopsale_title', array(
		'default'           => esc_html__('On Sale', 'ecomodernist'),
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'ecomodernist_shopsale_title', array(
		'type'              => 'text',
		'label'             => esc_html__('On Sale products title', 'ecomodernist'),
		'section'           => 'ecomodernist_shop_front_sale',
		'priority'          => 3,
	) );

}
add_action( 'customize_register', 'ecomodernist_customize_register' );


/**
 * Add Custom Customizer Controls - Category Dropdown
 */
if (class_exists('WP_Customize_Control')) {
		class WP_Customize_Category_Control extends WP_Customize_Control {

				public function render_content() {
						$dropdown = wp_dropdown_categories(
								array(
										'name'              => '_customize-dropdown-categories-' . $this->id,
										'echo'              => 0,
										'orderby'           => 'name',
										'show_option_none'  => esc_html__( '&mdash; Select &mdash;', 'ecomodernist' ),

										'option_none_value' => '',
										'selected'          => $this->value(),
								)
						);

						$dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );

						printf(
								'<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>',
								$this->label,
								$dropdown
						);
				}
		}
}

/**
 * Add Custom Customizer Controls - Tag Dropdown
 */
if (class_exists('WP_Customize_Control')) {
		class WP_Customize_Tag_Control extends WP_Customize_Control {

				public function render_content() {
						$dropdown = wp_dropdown_categories(
								array(
										'name'              => '_customize-dropdown-tags-' . $this->id,
										'echo'              => 0,
										'orderby'           => 'name',
										'show_option_none'  => esc_html__( '&mdash; Select &mdash;', 'ecomodernist' ),

										'option_none_value' => '',
										'taxonomy'           => 'post_tag',
										'selected'          => $this->value(),
								)
						);

						$dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );

						printf(
								'<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>',
								$this->label,
								$dropdown
						);
				}
		}
}

/**
 * Sanitize Checkboxes.
 */
function ecomodernist_sanitize_checkbox( $input ) {
	if ( 1 == $input ) {
		return true;
	} else {
		return false;
	}
}

/**
 * Sanitize Main Design Style
 */
function ecomodernist_sanitize_main_design( $ecomodernist_main_design ) {
	if ( ! in_array( $ecomodernist_main_design, array( 'standard', 'neo', 'serif' ) ) ) {
		$ecomodernist_main_design = 'standard';
	}
	return $ecomodernist_main_design;
}

/**
 * Sanitize Sidebar Position.
 */
function ecomodernist_sanitize_sidebar( $ecomodernist_sidebar ) {
	if ( ! in_array( $ecomodernist_sidebar, array( 'sidebar-right', 'sidebar-left' ) ) ) {
		$ecomodernist_sidebar = 'sidebar-right';
	}
	return $ecomodernist_sidebar;
}

/**
 * Sanitize Sidebar Visibility Settings.
 */
function ecomodernist_sanitize_sidebar_hide( $ecomodernist_sidebar_hide ) {
	if ( ! in_array( $ecomodernist_sidebar_hide, array( 'sidebar-show', 'sidebar-no', 'sidebar-no-single', 'sidebar-no-front' ) ) ) {
		$ecomodernist_sidebar_hide = 'sidebar-show';
	}
	return $ecomodernist_sidebar_hide;
}

/**
 * Sanitize Featured Slider Style.
 */
function ecomodernist_sanitize_sliderstyle( $ecomodernist_sliderstyle ) {
	if ( ! in_array( $ecomodernist_sliderstyle, array( 'slider-fullwidth', 'slider-boxed', 'slider-fullscreen' ) ) ) {
		$ecomodernist_sliderstyle = 'slider-fullwidth';
	}
	return $ecomodernist_sliderstyle;
}

/**
 * Sanitize Featured Slider image animation.
 */
function ecomodernist_sanitize_slideranimation( $ecomodernist_slideranimation ) {
	if ( ! in_array( $ecomodernist_slideranimation, array( 'slider-slide', 'slider-fade' ) ) ) {
		$ecomodernist_slideranimation = 'slider-slide';
	}
	return $ecomodernist_slideranimation;
}

/**
 * Sanitize Custom Header Image Style.
 */
function ecomodernist_sanitize_headerstyle( $ecomodernist_headerstyle ) {
	if ( ! in_array( $ecomodernist_headerstyle, array( 'header-fullwidth', 'header-boxed', 'header-fullscreen' ) ) ) {
		$ecomodernist_headerstyle = 'header-fullwidth';
	}
	return $ecomodernist_headerstyle;
}

/**
 * Sanitize Custom Fix-positioned header style.
 */
function ecomodernist_sanitize_fixedheader_style( $ecomodernist_fixedheader_style ) {
	if ( ! in_array( $ecomodernist_fixedheader_style, array( 'light', 'dark' ) ) ) {
		$ecomodernist_fixedheader_style = 'light';
	}
	return $ecomodernist_fixedheader_style;
}

/**
 * Sanitize header font.
 */
function ecomodernist_sanitize_header_font( $ecomodernist_header_font ) {
	if ( ! in_array( $ecomodernist_header_font, array( 'light', 'dark' ) ) ) {
		$ecomodernist_header_font = 'dark';
	}
	return $ecomodernist_header_font;
}

/**
 * Sanitize the image font.
 */
function ecomodernist_sanitize_image_font( $ecomodernist_image_font ) {
	if ( ! in_array( $ecomodernist_image_font, array( 'light', 'dark' ) ) ) {
		$ecomodernist_image_font = 'light';
	}
	return $ecomodernist_image_font;
}

/**
 * Sanitize Image Transition Transparency.
 */
function ecomodernist_sanitize_imggradient( $ecomodernist_imggradient ) {
	if ( ! in_array( $ecomodernist_imggradient, array( '0','0.1', '0.2', '0.3', '0.4', '0.5', '0.6', '0.7', '0.8', '0.9', '0.99' ) ) ) {
		$ecomodernist_imggradient = '0.7';
	}
	return $ecomodernist_imggradient;
}

/**
 * Sanitize Image Overlay Transparency.
 */
function ecomodernist_sanitize_imgoverlay_transparency( $ecomodernist_imgoverlay_transparency ) {
	if ( ! in_array( $ecomodernist_imgoverlay_transparency, array( '0','0.1', '0.2', '0.3', '0.4', '0.5', '0.6', '0.7', '0.8', '0.9', '1' ) ) ) {
		$ecomodernist_imgoverlay_transparency = '0';
	}
	return $ecomodernist_imgoverlay_transparency;
}

/**
 * Sanitize Blog Layouts
 */
function ecomodernist_sanitize_bloglayout( $ecomodernist_bloglayout ) {
	if ( ! in_array( $ecomodernist_bloglayout, array( 'default', 'fourthhighlighted', 'classic', 'threecolumns', 'fourcolumns' ) ) ) {
		$ecomodernist_bloglayout = 'classic';
	}
	return $ecomodernist_bloglayout;
}
