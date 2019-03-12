<?php
/**
 * Template Name: No Sidebar
 *
 * Description: A page template without Sidebar
 *
 * @package Pukeko
 * @since Pukeko 1.0.0
 * @version 1.0.0
 */

get_header(); ?>

 <div id="primary" class="content-area">
	 <main id="main" class="site-main" role="main">

		 <?php
		 while ( have_posts() ) : the_post();

			 get_template_part( 'template-parts/page/content', 'page' );

			 // If comments are open or we have at least one comment, load up the comment template.
			 if ( comments_open() || get_comments_number() ) :
				 comments_template();
			 endif;

		 endwhile; // End of the loop.
		 ?>

	 </main><!-- #main -->
 </div><!-- #primary -->

 <?php
 get_footer();
