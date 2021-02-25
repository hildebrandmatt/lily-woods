<?php
/**
 * The template for displaying Home page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package nyan
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			if ( function_exists( 'get_field' ) ){

			$image = get_field('banner');
			$size = 'full'; // (thumbnail, medium, large, full or custom size)
			if( $image ) {
				echo wp_get_attachment_image( $image, $size );
			}?>

			<section id="portfolio-sneak-peek">
				<?php $portfolioimages = get_field('portfolio_sneak_peek');
				$size = 'large'; // (thumbnail, medium, large, full or custom size)
				if( $portfolioimages ): ?>
					<?php foreach( $portfolioimages as $image_id ): ?>						
						<?php echo wp_get_attachment_image( $image_id, $size ); ?>					
					<?php endforeach; ?>
				<?php endif; ?>
			</section>

			<section id="about-section">
				<?php $image = get_field('home_about_image');
				$size = 'large'; // (thumbnail, medium, large, full or custom size)
				if( $image ) {
					echo wp_get_attachment_image( $image, $size );
				}
				the_field('home_about'); ?>
			</section>

			<section id="featured-gallery">
				<?php $featuredimages = get_field('home_featured_gallery');
				$size = 'large'; // (thumbnail, medium, large, full or custom size)
				if( $featuredimages ): ?>
					<?php foreach( $featuredimages as $image_id ): ?>
						<?php echo wp_get_attachment_image( $image_id, $size ); ?>
					<?php endforeach; ?>
				<?php endif; ?>
			</section>

            <?php 

			//If we want a testimonial carousel presumbly need to change the below code!

			$args = array(
                'post_type' => 'lily-testimonials',
				'orderby'	=> 'rand',
                'posts_per_page' => 1,
            );

            $query = new WP_Query( $args );

            if ( $query->have_posts() ) :
				?><section class="testimonial-section">
				<?php
                while ( $query->have_posts() ) :
                    $query->the_post();

					?><div class="testimonial-div"><?php
					the_post_thumbnail('medium');
					if ( get_field('testimonial_text') ){
						?><p> <?php the_field('testimonial_text') ?> </p><?php
					}
					if ( get_field('testimonial_client') ){
						?><p> <?php the_field('testimonial_client') ?> </p><?php
					}
					?></div><?php

                	wp_reset_postdata();
				endwhile;
				?></section><?php
			endif;

			}

		endwhile; ?>
		
	</main><!-- #primary -->

<?php
get_footer();