<?php
/**
 * The template for displaying archive pages
 *
 * @package Ecomodernist
 * @since Ecomodernist 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="content-wrap">

	<div id="blog-wrap" class="blog-wrap cf">

	<div id="primary" class="site-content cf" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="archive-header">
				<?php
					the_archive_title( '<h1 class="archive-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- end .archive-header -->

			<div class="posts-wrap">

			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();
				if ( 'classic' == get_theme_mod( 'ecomodernist_bloglayout') ) {
					get_template_part( 'content-classic' );
				} elseif ( 'threecolumns' == get_theme_mod( 'ecomodernist_bloglayout' ) || 'fourcolumns' == get_theme_mod( 'ecomodernist_bloglayout' ) ) {
					get_template_part( 'content-grid' );
				}
				else {
				 get_template_part( 'content' );
			 }
				// End the loop.
				endwhile;

				// Previous/next page navigation.
				the_posts_pagination( array(
					'next_text' => '<span aria-hidden="true" class="meta-nav">' . esc_html__( 'Older', 'ecomodernist' ) . '</span> ' .
					'<span class="screen-reader-text">' . esc_html__( 'Older Posts', 'ecomodernist' ) . '</span> ',
					'prev_text' => '<span aria-hidden="true" class="meta-nav">' . esc_html__( 'Newer', 'ecomodernist' ) . '</span> ' .
					'<span class="screen-reader-text">' . esc_html__( 'Newer Posts', 'ecomodernist' ) . '</span> ',
					'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'ecomodernist' ) . ' </span>',
			) );
			?>
			
		</div><!-- end .posts-wrap -->			
			
		<?php
			// If no content, include the "No posts found" template.
		else :
			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</div><!-- end #primary -->

	<?php get_sidebar(); ?>

	</div><!-- end .blog-wrap -->
</div><!-- end .content-wrap -->

<?php get_footer(); ?>
