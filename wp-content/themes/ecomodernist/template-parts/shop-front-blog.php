<?php
/**
 * The template for the Front Page Post Section Three
 *
 * @package Ecomodernist
 * @since Ecomodernist 1.0
 * @version 1.0.5
 */
?>

<?php

	$ecomodernist_section_three_first_query = new WP_Query( array(
			'posts_per_page'			=> 1,
			'post_status'					=> 'publish',
			'ignore_sticky_posts'	=> 1,
			'post__not_in'			=> ecomodernist_get_posts_displayed(),
	) );

	$ecomodernist_section_three_second_query = new WP_Query( array(
			'posts_per_page' 			=> 4,
			'offset' 							=> 1,
			'post_status'	 				=> 'publish',
			'ignore_sticky_posts'	=> 1,
			'post__not_in'			=> ecomodernist_get_posts_displayed(),
	) );
?>

<section id="front-section-three" class="front-section cf">
	<div class="section-three-wrap cf">

		<h3 class="front-section-title"><?php esc_html_e('From the Blog', 'ecomodernist') ?></h3>

		<div class="section-three-column-one">
			<?php if($ecomodernist_section_three_first_query->have_posts()) : ?>
				<?php while($ecomodernist_section_three_first_query->have_posts()) : $ecomodernist_section_three_first_query->the_post() ?>
					<?php ecomodernist_add_posts_displayed( get_the_ID() ); // add post to exclude array ?>
					<?php get_template_part('template-parts/content-frontpost-big' ); ?>
				<?php endwhile; ?>
			<?php endif; // have_posts() ?>
		</div><!-- end .section-three-column-one -->

		<div class="section-three-column-two">
		<?php if($ecomodernist_section_three_second_query->have_posts()) : ?>
			<?php while($ecomodernist_section_three_second_query->have_posts()) : $ecomodernist_section_three_second_query->the_post() ?>
				<?php ecomodernist_add_posts_displayed( get_the_ID() ); // add post to exclude array ?>
				<?php get_template_part('template-parts/content-frontpost-small' ); ?>
			<?php endwhile; ?>
		<?php endif; // have_posts() ?>
		</div><!-- end .section-three-column-two -->

		<?php wp_reset_postdata(); ?>

	</div><!-- end .section-three-wrap -->
</section><!-- end #front-section-three -->
