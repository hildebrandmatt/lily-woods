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

			$image = get_field('banner');
			if( !empty( $image ) ): ?>
				<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" id="banner-image" />
			<?php endif; ?>

			<section id="portfolio-sneak-peek">
				<?php $portfolioimages = get_field('portfolio_sneak_peek');
				$size = 'full'; // (thumbnail, medium, large, full or custom size)
				if( $portfolioimages ): ?>
					<?php foreach( $portfolioimages as $image_id ): ?>						
						<?php echo wp_get_attachment_image( $image_id, $size ); ?>					
					<?php endforeach; ?>
				<?php endif; ?>
			</section>

			<section id="about-section">
				<?php $image = get_field('home_about_image');
				if( !empty( $image ) ): ?>
					<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
				<?php endif; ?>
				<?php the_field('home_about'); ?>
			</section>

			<section id="featured-gallery">
				<?php $featuredimages = get_field('home_featured_gallery');
				$size = 'full'; // (thumbnail, medium, large, full or custom size)
				if( $featuredimages ): ?>
					<?php foreach( $featuredimages as $image_id ): ?>
						<?php echo wp_get_attachment_image( $image_id, $size ); ?>
					<?php endforeach; ?>
				<?php endif; ?>
			</section>
		<?php endwhile; ?>
		
	</main><!-- #primary -->

<?php
get_footer();