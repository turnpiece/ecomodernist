<?php
/**
 * The template for displaying the footer.
 *
 * @package Uku
 * @since Uku 1.0
 * @version 1.0.4
 */

$blogname = get_bloginfo('name');
?>

	<?php get_sidebar( 'instagram' ); ?>

	<?php
	// Big One Column Mailchimp newsletter widget area, for Serif Style only.
	if ( 'serif' === get_theme_mod( 'uku_main_design' ) ) : ?>
		<?php get_sidebar( 'newsletter' ); ?>
	<?php endif; ?>

	<footer id="colophon" class="site-footer cf">

		<?php
		// Big Footer Feature Section
		if ( '' !== get_theme_mod( 'uku_footerfeature_image', '' ) && 'serif' != get_theme_mod( 'uku_main_design' ) ) : ?>
			<?php get_template_part( 'template-parts/footer-feature' ); ?>
		<?php endif; ?>

		<div class="footer-wrap">
			<?php // Footer Menus.
			if ( has_nav_menu( 'footer-one' ) || has_nav_menu( 'footer-two' ) || has_nav_menu( 'footer-three' ) || has_nav_menu( 'footer-four' ) ) : ?>
				<?php get_template_part( 'template-parts/footermenus' ); ?>
			<?php endif; ?>

			<div id="site-info" class="cf">
				<ul class="credit" role="contentinfo">
				<?php if ( get_theme_mod( 'uku_credit' ) ) : ?>
					<li><?php echo wp_kses_post( get_theme_mod( 'uku_credit' ) ); ?></li>
				<?php else : ?>
					<li class="copyright"><?php printf(esc_html__('Copyright &copy; %1$s %2$s', 'uku'), date("Y"), $blogname ); ?></li>
					<li class="wp-credit"><?php esc_html_e('Powered by', 'uku') ?> <a href="<?php echo esc_url(__( 'https://wordpress.org/', 'uku' ) ); ?>" ><?php esc_html_e( 'WordPress', 'uku' ); ?></a></li>
					<li class="theme-author"><?php printf( esc_html__( 'Theme: %1$s by %2$s', 'uku' ), 'Uku', '<a href="' . esc_url('http://www.elmastudio.de/en/') . '">Elmastudio</a>' ); ?></li>
				<?php endif; ?>
				</ul><!-- end .credit -->
			</div><!-- end #site-info -->

			<?php if (has_nav_menu( 'social' ) ) : ?>
				<nav id="footer-social" class="social-nav" role="navigation">
					<?php if ( get_theme_mod( 'uku_custom_followus' ) ) : ?>
						<span><?php echo esc_html( get_theme_mod( 'uku_custom_followus' ) ); ?></span>
					<?php else : ?>
						<span><?php esc_html_e( 'Follow us', 'uku' ); ?></span>
					<?php endif; ?>
					<?php wp_nav_menu( array(
						'theme_location'	 => 'social',
						'container' 		   => 'false',
						'depth' 			     => -1));
					?>
				</nav><!-- end #footer-social -->
			<?php endif; ?>

		</div><!-- end .footer-wrap -->
	</footer><!-- end #colophon -->
</div><!-- end .container-all -->

<?php wp_footer(); ?>

</body>
</html>
