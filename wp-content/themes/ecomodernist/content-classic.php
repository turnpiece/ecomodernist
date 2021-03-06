

<?php
/**
 * The default template for displaying the classic blog content
 *
 * @package Ecomodernist
 * @since Ecomodernist 1.3
 * @version 1.0.1
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?>>

	<header class="entry-header cf">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		<div class="entry-meta">
			<?php ecomodernist_posted_by(); ?>
			<span class="entry-date">
				<a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a>
			</span><!-- end .entry-date -->
			<?php if ( comments_open() ) : ?>
			<span class="entry-comments">
				<?php comments_popup_link(
					'<span class="leave-reply"><span class="comment-name">' . esc_html__( 'Comments', 'ecomodernist' ) .  '</span>' . esc_html__( '0', 'ecomodernist' ) . '</span>',
					'<span class="comment-name">' . esc_html__( 'Comments', 'ecomodernist' ) .  '</span>' . esc_html__( '1', 'ecomodernist' ),
					'<span class="comment-name">' . esc_html__( 'Comments', 'ecomodernist' ) .  '</span>' . esc_html__( '%', 'ecomodernist' ) )
				; ?>
			</span><!-- end .entry-comments -->
			<?php endif; // comments_open() ?>
			<?php edit_post_link( esc_html__( 'Edit Post', 'ecomodernist' ), '<span class="entry-edit">', '</span>' ); ?>
		</div><!-- end .entry-meta -->
	</header><!-- end .entry-header -->

	<?php if ( '' !== get_the_post_thumbnail() && ! post_password_required() ) : ?>
		<div class="entry-thumbnail fadein">
			<a href="<?php the_permalink(); ?>"><span class="thumb-wrap"><?php the_post_thumbnail(); ?></span></a>
			<?php if ( has_post_format('video') ) : ?>
				<span class="video-icon"><?php esc_html_e('Video', 'ecomodernist') ?></span>
			<?php endif; ?>
		</div><!-- end .entry-thumbnail -->
	<?php endif; ?>

	<div class="entry-content">
		<?php the_content(esc_html__( 'Read More', 'ecomodernist' )); ?>
	</div><!-- .entry-content -->

	<div class="entry-footer">
		<?php if ( has_category() ) : ?>
		<div class="entry-cats"><span><?php esc_html_e('Filed under', 'ecomodernist') ?></span>
			<?php the_category(' '); ?>
		</div><!-- end .entry-cats -->
		<?php endif; // has_category() ?>
	</div><!-- .entry-footer -->

</article><!-- end post -<?php the_ID(); ?> -->
