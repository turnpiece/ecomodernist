<?php
/**
 * Demo Installer content, One Click Demo Import plugin required
 * See: https://wordpress.org/plugins/one-click-demo-import/
 *
 * @package Zuki
 * @since Zuki 1.1.4
 */

function ocdi_import_files() {
	return array(

		array(
			'import_file_name'             => 'Demo Zuki',
			'categories'                   => array( 'Magazine' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'assets/demo/zuki-content.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'assets/demo/zuki-widgets.wie',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'assets/demo/zuki-customizer.dat',
		),
	);
}
add_filter( 'pt-ocdi/import_files', 'ocdi_import_files' );


function ocdi_after_import_setup() {
		// Assign menus to their locations.
		$main_menu = get_term_by( 'name', 'Main', 'nav_menu' );
		$headertop_menu = get_term_by( 'name', 'Header', 'nav_menu' );
		$footersocial_menu = get_term_by( 'name', 'Footer Social', 'nav_menu' );

		set_theme_mod( 'nav_menu_locations', array(
						'primary' => $main_menu->term_id,
						'header-top' => $headertop_menu->term_id,
						'footer-social' => $footersocial_menu->term_id,
				)
		);

		// Assign front page and posts page (blog page).
		$front_page_id = get_page_by_title( 'Front' );
		$blog_page_id  = get_page_by_title( 'Blog' );

		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $front_page_id->ID );
		update_option( 'page_for_posts', $blog_page_id->ID );

}
add_action( 'pt-ocdi/after_import', 'ocdi_after_import_setup' );
