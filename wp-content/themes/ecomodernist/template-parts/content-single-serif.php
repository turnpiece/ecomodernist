<?php
/**
 * The template used for displaying single post content in the Serif Style.
 *
 * @package Ecomodernist
 * @since Ecomodernist 1.2
 * @version 1.0
 */
?>

<?php
$introtext = get_post_meta($post->ID, 'intro', true);
$custom_class = get_post_meta($post->ID, 'post_class', true);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if (  $custom_class != 'no-thumb' && '' != get_the_post_thumbnail() && ! post_password_required() ) : ?>
				<div class="entry-thumbnail">
					<?php the_post_thumbnail('ecomodernist-neo-big'); ?>
				</div><!-- end .entry-thumbnail -->
			<?php endif; ?>

		<header class="entry-header cf">

			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			<?php if ( get_post_meta($post->ID, 'intro', true) ) { ?>
				<p class="intro"><?php echo $introtext; ?></p>
			<?php } ?>

			<div class="entry-meta cf">
				<div class="entry-author">
				<?php ecomodernist_posted_by(); ?>
				</div><!-- end .entry-author -->
				<div class="entry-date">
					<a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a>
				</div><!-- end .entry-date -->
				<?php if ( comments_open() ) : ?>
				<div class="entry-comments">
					<?php comments_popup_link(
						'<span class="leave-reply"><span class="comment-name">' . esc_html__( 'Comments', 'ecomodernist' ) .  '</span>' . esc_html__( '0', 'ecomodernist' ) . '</span>',
						'<span class="comment-name">' . esc_html__( 'Comments', 'ecomodernist' ) .  '</span>' . esc_html__( '1', 'ecomodernist' ),
						'<span class="comment-name">' . esc_html__( 'Comments', 'ecomodernist' ) .  '</span>' . esc_html__( '%', 'ecomodernist' ) )
					; ?>
				</div><!-- end .entry-comments -->
				<?php endif; // comments_open() ?>

				<?php edit_post_link( esc_html__( 'Edit Post', 'ecomodernist' ), '<span class="entry-edit">', '</span>' ); ?>
			</div><!-- end .entry-meta -->

		</header><!-- end .entry-header -->

		<div class="contentwrap">
			<div id="entry-content" class="entry-content">
			<?php the_content(); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ecomodernist' ),
					'after'  => '</div>',
				) );
			?>
			</div><!-- end .entry-content -->

			<footer class="entry-footer cf">

				<?php if ( function_exists( 'sharing_display' ) ) {sharing_display( '', true );}
					if ( class_exists( 'Jetpack_Likes' ) ) {
					$custom_likes = new Jetpack_Likes;
					echo $custom_likes->post_likes( '' );
				} ?>

				<?php if ( has_category() ) : ?>
					<div class="entry-cats"><span><?php esc_html_e('Categories', 'ecomodernist') ?></span>
						<?php the_category(' '); ?>
					</div><!-- end .entry-cats -->
					<?php endif; // has_category() ?>

				<?php $tags_list = get_the_tag_list();
					if ( $tags_list ): ?>
					<div class="entry-tags"><span><?php esc_html_e('Tags', 'ecomodernist') ?></span><?php the_tags('',' ', ''); ?></div>
				<?php endif; ?>
				<?php
				// Author bio.
				if ( get_the_author_meta( 'description' ) ) :
					get_template_part( 'template-parts/authorbox' );
				endif;
				?>
			</footer><!-- end .entry-footer -->

			<?php
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
			?>

			<?php the_post_navigation( array (
				'next_text' => '<span class="meta-nav">' . esc_html__( 'Next Post', 'ecomodernist' ) . '</span> %title' .
				'<span class="screen-reader-text">' . esc_html__( 'Next Post', 'ecomodernist' ) . '</span> ',
				'prev_text' => '<span class="meta-nav">' . esc_html__( 'Previous Post', 'ecomodernist' ) . '</span> %title' .
				'<span class="screen-reader-text">' . esc_html__( 'Previous Post', 'ecomodernist' ) . '</span> ',
			) ); ?>

		</div><!-- end .content-wrap -->

	</article><!-- end post -<?php the_ID(); ?> -->
