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
			the_post(); ?>

			<section class="contact-info"><?php
				//check for acf existing
				if ( function_exists( 'get_field' ) ){?>

					<p><?php the_field('contact_package_info'); ?></p>
					<p><?php the_field('contact_phone'); ?></p>
					<p><?php the_field('contact_email'); ?></p><?php

					$image = get_field('contact_photo');
					$size = 'large'; // (thumbnail, medium, large, full or custom size)
					if( $image ) {
						echo wp_get_attachment_image( $image, $size );
					}
				}?>
			</section>

            <section class="contact-form">
                <?php echo do_shortcode( '[forminator_form id="369"]' ); ?>
            </section>

		<?php endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
