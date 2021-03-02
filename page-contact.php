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
	<h1><?php the_title() ?></h1>

		<?php
		while ( have_posts() ) :
			the_post(); ?>

            <div class="contact-wrapper">
            <section class="contact-form">
				<h2 class="screen-reader-text">Contact Form</h2>
                <?php echo do_shortcode( '[forminator_form id="369"]' ); ?>
            </section>

			<section class="contact-info">
				<h2 class="screen-reader-text">Contact Info</h2><?php
				//check for acf existing
				if ( function_exists( 'get_field' ) ){?>

					<p><?php the_field('contact_package_info'); ?></p>
					<a href="tel:<?php the_field('contact_phone') ?>">
						<p><?php the_field('contact_phone'); ?></p>
					</a>
					<a href="mailto:<?php the_field('contact_email') ?>">
						<p><?php the_field('contact_email'); ?></p>
					</a><?php

					$image = get_field('contact_photo');
					$size = 'large'; // (thumbnail, medium, large, full or custom size)
					if( $image ) {
						echo wp_get_attachment_image( $image, $size );
					}
				}?>
			</section>
            </div>
		<?php endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
