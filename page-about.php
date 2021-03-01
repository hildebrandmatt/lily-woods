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
	<h1 class="screen-reader-text"><?php the_title() ?></h1>

		<?php
		while ( have_posts() ) :
			the_post();

			if ( function_exists( 'get_field' ) ){

			?>
			<section id="about-lily-woods">
				<h2>About Lily Woods</h2>
				<div id="about-section-top"><?php
					$image = get_field('about_photographer_image');
					$size = 'large'; // (thumbnail, medium, large, full or custom size)
					if( $image ) {
						echo wp_get_attachment_image( $image, $size );
					}?>

					<article id="about-text-top">
						<h3><?php the_field('about_photographer_title'); ?></h3>
						<p><?php the_field('about_photographer_description'); ?></p>
					</article>
				</div>

				<div id="about-section-bottom">
					<p><?php the_field('about_photographer_description_cont'); ?></p>

					<?php $images = get_field('about_photographer_gallery');
					$size = 'large'; // (thumbnail, medium, large, full or custom size)
					if( $images ): ?>
						<div class="isotope-grid half-grid">
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
					<a href="<?php echo get_post_type_archive_link( 'lily-projects' ) ?>">Check out my portfolio!</a>
				</div>
			</section>

			<section id="associate-photographers">
				<h2>Meet my associates!</h2>
				<?php
				// Check rows exists.
				if( have_rows('associate_about_repeater') ):
					// Loop through rows.
					while( have_rows('associate_about_repeater') ) : the_row();
						// Load sub field value. ?>						

						<article class="about-article"><?php
							$image = get_sub_field('associate_about_photo');
							$size = 'medium'; // (thumbnail, medium, large, full or custom size)
							if( $image ) {
								echo wp_get_attachment_image( $image, $size );
							}?>
							<h3><?php the_sub_field('associate_about_title'); ?></h3>
							<p><?php the_sub_field('associate_about_text'); ?></p>
						</article>
					<?php endwhile;
				// No value.
				else :
					// Do something...
				endif; ?>
			</section><?php
			}

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
