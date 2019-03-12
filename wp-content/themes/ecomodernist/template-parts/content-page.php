<?php
/**
 * The template used for displaying page content.
 *
 * @package Ecomodernist
 * @since Ecomodernist 1.0
 * @version 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?>>


		<header class="entry-header">
			<h1 class="entry-title"><?php the_title(); ?></h1>
		</header><!-- end .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ecomodernist' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	
	<?php edit_post_link( esc_html__( 'Edit Page', 'ecomodernist' ), '<div class="edit-link cf">', '</div>' ); ?>

</article><!-- #post-## -->
