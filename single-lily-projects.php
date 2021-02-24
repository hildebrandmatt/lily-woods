<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Lily_Woods
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			the_post_thumbnail('large');

			?><section class="project-description"><?php
				if ( get_field('single_project_description') ){
					?><p> <?php the_field('single_project_description') ?> </p><?php
				} ?>
			</section>

			<section class="project-gallery">
				<?php $images = get_field('single_project_gallery');
				$size = 'large'; // (thumbnail, medium, large, full or custom size)
				if( $images ): ?>
					<?php foreach( $images as $image_id ): ?>
						<?php echo wp_get_attachment_image( $image_id, $size ); ?>
					<?php endforeach; ?>
				<?php endif; ?>
			</section> <?php

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
