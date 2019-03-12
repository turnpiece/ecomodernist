<?php
/**
* The main template file.
*
* @package Ecomodernist
* @since Ecomodernist 1.0
* @version 1.0.0
*/

$GLOBALS['posts_displayed'] = array();

get_header(); ?>

	<div id="page-start" class="cf">

<?php
// Featured Slider
if ( '' != get_theme_mod( 'ecomodernist_featuredtag' ) ) : ?>
<div class="featured-content cf">
	<?php
	// Front Page Featured Post Slider
	get_template_part( 'template-parts/featured-content' ); ?>
</div>
<?php endif; ?>

<?php
// Front Page Section 1 (Featured Top)
if ( '' != get_theme_mod( 'ecomodernist_front_section_one_tag' ) || '' != get_theme_mod( 'ecomodernist_front_section_one_cat' ) ) : ?>
<?php get_template_part( 'template-parts/front-section-one' ); ?>
<?php endif; ?>

<?php
// Front Page Section 2-column
if ( '' != get_theme_mod( 'ecomodernist_front_section_twocolumn_tag' ) || '' != get_theme_mod( 'ecomodernist_front_section_twocolumn_cat' ) ) : ?>
<?php get_template_part( 'template-parts/front-section-twocolumn' ); ?>
<?php endif; ?>

<?php
// Front Page Section 3-column
if ( '' != get_theme_mod( 'ecomodernist_front_section_threecolumn_tag' ) || '' != get_theme_mod( 'ecomodernist_front_section_threecolumn_cat' ) ) : ?>
<?php get_template_part( 'template-parts/front-section-threecolumn' ); ?>
<?php endif; ?>

<?php
// Front Page Section 4 (Fullwidth)
if ( '' != get_theme_mod( 'ecomodernist_front_section_four_tag' ) || '' != get_theme_mod( 'ecomodernist_front_section_four_cat' ) ) : ?>
<?php get_template_part( 'template-parts/front-section-four' ); ?>
<?php endif; ?>

<?php
// Hide default blog on Front Page
if ( '' == get_theme_mod( 'ecomodernist_front_hideblog' ) ) : ?>
<div id="blog-wrap" class="blog-wrap cf">

	<div id="primary" class="site-content cf" role="main">

		<?php if ( get_theme_mod( 'ecomodernist_custom_latestposts' ) ) : ?>
			<h3 class="blog-title"><?php echo esc_html( get_theme_mod( 'ecomodernist_custom_latestposts' ) ); ?></h3>
		<?php else : ?>
			<h3 class="blog-title"><?php esc_html_e('Latest Posts', 'ecomodernist') ?></h3>
		<?php endif; ?>

		<div class="posts-wrap">

		<?php /* Start the Loop */ 

			$args = array(
				'post__not_in'	=> ecomodernist_get_posts_displayed(),
			);

			$ecomodernist_posts_query = new WP_Query( $args );
		?>
		<?php while ( $ecomodernist_posts_query->have_posts() ) : $ecomodernist_posts_query->the_post(); 
			// add to exclude array
			ecomodernist_add_posts_displayed( get_the_ID() );
		?>

		<?php if ( 'classic' == get_theme_mod( 'ecomodernist_bloglayout' ) ) : ?>
			<?php get_template_part( 'content-classic' ); ?>
		<?php elseif ( 'threecolumns' == get_theme_mod( 'ecomodernist_bloglayout' ) || 'fourcolumns' == get_theme_mod( 'ecomodernist_bloglayout' ) ) : ?>
			<?php get_template_part('content-grid' ); ?>
		<?php else : ?>
			<?php get_template_part('content' ); ?>
		<?php endif; ?>

		<?php endwhile; // end of the loop. ?>

		<?php the_posts_pagination( array(
			'next_text' => '<span class="meta-nav">' . esc_html__( 'Older', 'ecomodernist' ) . '</span> ' .
			'<span class="screen-reader-text">' . esc_html__( 'Older Posts', 'ecomodernist' ) . '</span> ',
			'prev_text' => '<span class="meta-nav">' . esc_html__( 'Newer', 'ecomodernist' ) . '</span> ' .
			'<span class="screen-reader-text">' . esc_html__( 'Newer Posts', 'ecomodernist' ) . '</span> ',
			'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'ecomodernist' ) . ' </span>',
			) ); ?>

		</div><!-- end .posts-wrap -->
		</div><!-- end #primary -->

		<?php get_sidebar(); ?>

	</div><!-- end .blog-wrap -->
<?php endif; ?>

<?php
// Front Page Section 2 (Featured Bottom)
if ( '' != get_theme_mod( 'ecomodernist_front_section_two_tag' ) || '' != get_theme_mod( 'ecomodernist_front_section_two_cat' ) ) : ?>
<?php get_template_part( 'template-parts/front-section-two' ); ?>
<?php endif; ?>

<?php
// Front Page Section About
if ( '' != get_theme_mod( 'ecomodernist_front_section_about_text' ) ) : ?>
<?php get_template_part( 'template-parts/front-section-about' ); ?>
<?php endif; ?>

<?php
// Front Page Section 3 (on Background)
if ( '' != get_theme_mod( 'ecomodernist_front_section_three_tag' ) || '' != get_theme_mod( 'ecomodernist_front_section_three_cat' ) ) : ?>
<?php get_template_part( 'template-parts/front-section-three' ); ?>
<?php endif; ?>

<?php
// Front Page Section 4-column
if ( '' != get_theme_mod( 'ecomodernist_front_section_fourcolumn_tag' ) || '' != get_theme_mod( 'ecomodernist_front_section_fourcolumn_cat' ) ) : ?>
<?php get_template_part( 'template-parts/front-section-fourcolumn' ); ?>
<?php endif; ?>

<?php
// Front Page Section 6-column
if ( '' != get_theme_mod( 'ecomodernist_front_section_sixcolumn_tag' ) || '' != get_theme_mod( 'ecomodernist_front_section_sixcolumn_cat' ) ) : ?>
<?php get_template_part( 'template-parts/front-section-sixcolumn' ); ?>
<?php endif; ?>

</div><!-- end #page-start -->

<?php get_footer(); ?>
