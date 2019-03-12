<?php
/**
 * The template for displaying featured content slider
 *
 * @package Ecomodernist
 * @since Ecomodernist 1.0
 * @version 1.0
 */
?>

<div class="featured-slider cf">
<?php
	// Get a number of Front page recent posts set in the customizer
	$featuredtag = get_theme_mod('ecomodernist_featuredtag');

		$args = array(
			'posts_per_page'=> 6,
			'post_status'	=> 'publish',
			'tag_id'  		=> $featuredtag,
	);

	$ecomodernist_front_query = new WP_Query( $args );
?>

<?php // The Loop
	if($ecomodernist_front_query->have_posts()) : ?>
	  	<?php while($ecomodernist_front_query->have_posts()) : $ecomodernist_front_query->the_post() ?>
	
	<?php
		// Include the featured content template.
		 get_template_part( 'template-parts/content', 'featured-post' );
	 ?>
			 
<?php endwhile; ?>
		<?php
		/* Restore original Post Data */
			wp_reset_postdata();
		?>
	</div><!-- end .featured-slider -->
<?php endif; // have_posts() blog ?>

</div><!-- #featured-content .featured-content -->
