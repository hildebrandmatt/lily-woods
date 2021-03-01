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
	<h1 class="screen-reader-text"><?php the_title() ?></h1>

		<?php
		while ( have_posts() ) :
			the_post();

			if ( function_exists( 'get_field' ) ){

			the_post_thumbnail('large');

			?><section class="project-description">
				<h2 class="screen-reader-text">Project Description</h2><?php
				if ( get_field('single_project_description') ){
					?><p> <?php the_field('single_project_description') ?> </p><?php
				} ?>
			</section>

			<section class="project-gallery">
				<h2 class="screen-reader-text">Gallery</h2>
				<?php $images = get_field('single_project_gallery');
				$size = 'large'; // (thumbnail, medium, large, full or custom size)
				if( $images ): ?>
					<div class="isotope-grid full-grid">
					<?php foreach( $images as $image_id ):
						$imginfo = wp_get_attachment_image_src( $image_id, "full" );
						if ( $imginfo[1] > $imginfo[2] ) {
							?><div class="grid-item grid-item-landscape"><?php echo wp_get_attachment_image( $image_id, $size ); ?></div><?php
						}
						if ( $imginfo[1] < $imginfo[2] ) {
							?><div class="grid-item grid-item-portrait"><?php echo wp_get_attachment_image( $image_id, $size ); ?></div><?php
						}
					endforeach; ?>
					</div>
				<?php endif; ?>
			</section> <?php

			}

		endwhile; // End of the loop.
		?>

		<a href="<?php echo get_post_type_archive_link( 'lily-projects' ) ?>">Check out my other projects!</a>

	</main><!-- #main -->

<?php
get_footer();
