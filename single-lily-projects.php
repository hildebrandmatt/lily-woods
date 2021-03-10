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
	<h1 class="single-project-title"><?php the_title() ?></h1>
    <?php
        $post_date = get_the_date( 'F j, Y' );?>
    <h2 class="single-project-date"><?php echo $post_date;?></h2>

		<?php
		while ( have_posts() ) :
			the_post();

			if ( function_exists( 'get_field' ) ){

			the_post_thumbnail();

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
					<div class="isotope-grid full-grid" id="lightgallery">
					<?php foreach( $images as $image_id ):
						?><a href="<?php echo wp_get_attachment_url( $image_id ) ?>" class="grid-item" data-src="<?php echo wp_get_attachment_url( $image_id) ?>"><?php echo wp_get_attachment_image( $image_id, $size ); ?></a><?php
					endforeach; ?>
					</div>
				<?php endif; ?>
			</section> <?php

			}

		endwhile; // End of the loop.
		?>

		<a class="project-cta" href="<?php echo get_post_type_archive_link( 'lily-projects' ) ?>">Check out my other projects!</a>

	</main><!-- #main -->

<?php
get_footer();
