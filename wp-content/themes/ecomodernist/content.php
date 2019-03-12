

<?php
/**
 * The default template for displaying content
 *
 * @package Ecomodernist
 * @since Ecomodernist 1.0
 * @version 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?>>

	<?php if ( 'neo' === get_theme_mod( 'ecomodernist_main_design' ) || 'serif' === get_theme_mod( 'ecomodernist_main_design' ) && '' !== get_the_post_thumbnail() && ! post_password_required() ) : ?>
		<div class="entry-thumbnail fadein">
			<a href="<?php the_permalink(); ?>"><span class="thumb-wrap"><?php the_post_thumbnail('ecomodernist-neo-blog'); ?></span></a>
			<?php if ( has_post_format('video') ) : ?>
				<span class="video-icon"><?php esc_html_e('Video', 'ecomodernist') ?></span>
			<?php endif; ?>
		</div><!-- end .entry-thumbnail -->
	<?php elseif ( '' !== get_the_post_thumbnail() && ! post_password_required() ) : ?>
		<div class="entry-thumbnail fadein">
			<a href="<?php the_permalink(); ?>"><span class="thumb-wrap"><?php the_post_thumbnail('ecomodernist-standard-blog'); ?></span></a>
		</div><!-- end .entry-thumbnail -->
	<?php endif; ?>

	<div class="meta-main-wrap">

		<?php if ( '' === get_theme_mod( 'ecomodernist_main_design' ) || 'standard' === get_theme_mod( 'ecomodernist_main_design' ) ) : ?>
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
		<?php endif; ?>

		<div class="entry-main">
			<header class="entry-header">
				<?php if ( has_category() ) : ?>
				<div class="entry-cats">
					<?php the_category(' '); ?>
				</div><!-- end .entry-cats -->
				<?php endif; // has_category() ?>
				<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
			</header><!-- end .entry-header -->

			<?php if ( 'serif' !== get_theme_mod( 'ecomodernist_main_design' )) : ?>
				<div class="entry-summary">
					<?php the_excerpt(); ?>
				</div><!-- .entry-summary -->
			<?php endif; ?>

			<?php if ( 'serif' == get_theme_mod( 'ecomodernist_main_design' )) : ?>
				<div class="entry-meta">
					<?php ecomodernist_posted_by(); ?>
					<span class="entry-date">
						<a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a>
					</span><!-- end .entry-date -->
					<?php if ( comments_open() ) : ?>
					<span class="entry-comments">
						<?php comments_popup_link(
							'<span class="leave-reply"><span class="comment-name">' . esc_html__( 'Comments', 'ecomodernist' ) . '</span>' . esc_html__( '0', 'ecomodernist' ) . '</span>',
							'<span class="comment-name">' . esc_html__( 'Comments', 'ecomodernist' ) . '</span>' . esc_html__( '1', 'ecomodernist' ),
							'<span class="comment-name">' . esc_html__( 'Comments', 'ecomodernist' ) . '</span>' . esc_html__( '%', 'ecomodernist' ) )
						; ?>
					</span><!-- end .entry-comments -->
					<?php endif; // comments_open() ?>
					<?php edit_post_link( esc_html__( 'Edit Post', 'ecomodernist' ), '<span class="entry-edit">', '</span>' ); ?>
				</div><!-- end .entry-meta -->

				</div><!-- .entry-main -->

			<?php endif; ?>

		<?php if ( 'neo' == get_theme_mod( 'ecomodernist_main_design' ) ) : ?>
			<div class="entry-meta">
				<?php ecomodernist_posted_by(); ?>
				<span class="entry-date">
					<a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a>
				</span><!-- end .entry-date -->
				<?php if ( comments_open() ) : ?>
				<span class="entry-comments">
					<?php comments_popup_link(
						'<span class="leave-reply"><span class="comment-name">' . esc_html__( 'Comments', 'ecomodernist' ) . '</span>' . esc_html__( '0', 'ecomodernist' ) . '</span>',
						'<span class="comment-name">' . esc_html__( 'Comments', 'ecomodernist' ) . '</span>' . esc_html__( '1', 'ecomodernist' ),
						'<span class="comment-name">' . esc_html__( 'Comments', 'ecomodernist' ) . '</span>' . esc_html__( '%', 'ecomodernist' ) )
					; ?>
				</span><!-- end .entry-comments -->
				<?php endif; // comments_open() ?>
				<?php edit_post_link( esc_html__( 'Edit Post', 'ecomodernist' ), '<span class="entry-edit">', '</span>' ); ?>
			</div><!-- end .entry-meta -->
		</div><!-- .meta-main-wrap -->
		<?php endif; ?>
</article><!-- end post -<?php the_ID(); ?> -->
