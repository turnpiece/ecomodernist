<?php
/**
 * Template Name: Full Width Page
 *
 * Description: A page template for a Full Width Page
 *
 * @package Ecomodernist
 * @since Ecomodernist 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="content-wrap">
	
	<?php if ( '' != get_the_post_thumbnail() && ! post_password_required() ) : ?>
	<div class="entry-thumbnail">
		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('ecomodernist-bigthumb'); ?></a>
	</div><!-- end .entry-thumbnail -->
	<?php endif; ?>

	<div id="blog-wrap" class="blog-wrap cf">
		<div id="primary" class="site-content cf" role="main">

		<?php
			// Start the Loop.
			while ( have_posts() ) : the_post();
	
				// Include the page content template.
				get_template_part( 'template-parts/content', 'page' );
	
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}
			endwhile;
		?>

		</div><!-- end #primary -->
	</div><!-- end .blog-wrap -->
</div><!-- end .content-wrap -->

<?php get_footer(); ?>
