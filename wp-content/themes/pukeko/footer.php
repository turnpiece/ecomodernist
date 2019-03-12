<?php
 /**
	* The template for displaying the footer
	*
	* @package Pukeko
	* @since Pukeko 1.0.0
	* @version 1.0.0
	*/
?>

	</div><!-- #content -->
</div><!-- .content-wrap -->

	<footer id="colophon" class="site-footer" role="contentinfo">

		<div class="footer-wrap cf">

				<?php get_template_part( 'template-parts/footer/footer', 'widgets' ); ?>

				<?php get_template_part( 'template-parts/footer/footer', 'menus' ); ?>

				<?php get_template_part( 'template-parts/footer/site', 'info' ); ?>

		</div><!-- .footer-container -->

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
