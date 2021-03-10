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
	<h1 class="screen-reader-text"><?php the_title() ?></h1>

		<?php
		while ( have_posts() ) :
			the_post();

			if ( function_exists( 'get_field' ) ){?>

			<div class="banner-image"><?php
				$image = get_field('banner');
				$size = 'full'; // (thumbnail, medium, large, full or custom size)
				if( $image ) {
					echo wp_get_attachment_image( $image, $size );
				}?>
			</div>

            <div class="down-arrow" aria-hidden="true">
                <span></span>
            </div>

			<section class="portfolio-sneak-peek">
				<h2 class="screen-reader-text">Portfolio Sneak Peak Gallery</h2>
				<?php $images = get_field('portfolio_sneak_peek');
				$size = 'large'; // (thumbnail, medium, large, full or custom size)
				if( $images ): ?>
					<div class="isotope-set-grid half-grid">
					<?php foreach( $images as $image_id ):
						?><div class="grid-item">
							<?php echo wp_get_attachment_image( $image_id, $size ); ?>
						</div><?php
					endforeach; ?>
					</div>
				<?php endif; ?>
				<article class="sneak-peek-article"><?php
					?><h2 class="sub-heading-home"><?php the_field('sneak_peek_title'); ?></h2><?php
					?><h3><?php the_field('sneak_peek_subtitle'); ?></h3><?php
					the_field('sneak_peek_text') ?>
					<a href="<?php echo get_post_type_archive_link( 'lily-projects' ) ?>">See their stories</a>
				</article>
			</section>

			<section class="home-about-section">
				<h2 class="screen-reader-text">About Me</h2>
				<?php $image = get_field('home_about_image');
				$size = 'large'; // (thumbnail, medium, large, full or custom size)
				if( $image ) {
					echo wp_get_attachment_image( $image, $size );
				}?>
				<article class="home-about-article"><?php
					the_field('home_about'); ?>
					<a href="<?php echo get_page_link(16) ?>">Read more about me</a>
				</article>
			</section>

			<section id="featured-gallery">
				<h2 class="screen-reader-text">Featured Gallery</h2>
				<?php $images = get_field('home_featured_gallery');
				$size = 'large'; // (thumbnail, medium, large, full or custom size)
				if( $images ): ?>
					<div class="isotope-set-grid full-grid-home" id="lightgallery">
					<?php foreach( $images as $image_id ):						
						if(!empty(wp_get_post_parent_id($image_id))) {
							$parent_id = wp_get_post_parent_id($image_id);
						}
						?><div class="grid-item" data-src="<?php echo wp_get_attachment_url( $image_id ) ?>" data-sub-html="<a href='<?php echo get_permalink($parent_id) ?>' target='_parent'><p>Check out <?php echo get_the_title($parent_id); ?>!</p></a>">
							<?php echo wp_get_attachment_image( $image_id, $size ); ?>
						</div><?php
					endforeach; ?>
					</div>
				<?php endif; ?>
			</section>

            <?php 

			//If we want a testimonial carousel presumbly need to change the below code!

			$args = array(
                'post_type' => 'lily-testimonials',
				'orderby'	=> 'rand',
                'posts_per_page' => 6,
            );

            $query = new WP_Query( $args );

            if ( $query->have_posts() ) :
				?><section class="testimonial-section">
					<h2 class="screen-reader-text">Testimonial</h2>
					<div class="carousel">
						<?php
						while ( $query->have_posts() ) :
							$query->the_post();

							?><div class="testimonial"><?php

								the_post_thumbnail('large');
								?><article class="testimonial-article"><?php
								if ( get_field('testimonial_text') ){
									?><p> <?php the_field('testimonial_text') ?> </p><?php
								}
								if ( get_field('testimonial_client') ){
									?><p> <?php the_field('testimonial_client') ?> </p><?php
								}
								?><a href="<?php echo get_page_link(352) ?>">See our packages here</a>
								</article>
							</div><?php
							wp_reset_postdata();
						endwhile;
					?></div>
				</section><?php
			endif;
			}
		endwhile; ?>		
	</main><!-- #primary -->

<?php
get_footer();