<?php
/**
 * The template for displaying the About page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Lily_Woods
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			?><section id="about-section-top">
				<?php $image = get_field('about_photographer_image');
				if( !empty( $image ) ): ?>
					<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" id="banner-image" />
				<?php endif; ?>

				<article id="about-text-top">
					<h3><?php the_field('about_photographer_title'); ?></h3>
					<p><?php the_field('about_photographer_description'); ?></p>
				</article>
			</section>

			<section id="about-section-bottom">
				<p><?php the_field('about_photographer_description_cont'); ?></p>

				<?php $images = get_field('about_photographer_gallery');
				$size = 'large'; // (thumbnail, medium, large, full or custom size)
				if( $images ): ?>
					<?php foreach( $images as $image_id ): ?>						
						<?php echo wp_get_attachment_image( $image_id, $size ); ?>					
					<?php endforeach; ?>
				<?php endif; ?>
			</section>

			<section id="associate-photographers">
				<?php
				// Check rows exists.
				if( have_rows('associate_about_repeater') ):
					// Loop through rows.
					while( have_rows('associate_about_repeater') ) : the_row();
						// Load sub field value.
						$image = get_sub_field('associate_about_photo');
						if( !empty( $image ) ): ?>
							<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" id="banner-image" />
						<?php endif; ?>

						<article class="about-text">
							<h3><?php the_sub_field('associate_about_title'); ?></h3>
							<p><?php the_sub_field('associate_about_text'); ?></p>
						</article>
					<?php endwhile;
				// No value.
				else :
					// Do something...
				endif; ?>
			</section>

		<?php endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
