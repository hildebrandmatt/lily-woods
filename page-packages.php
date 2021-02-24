<?php
/**
 * The template for displaying the Packages page
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
            $args = array(
                'post_type' => 'lily-packages',
                'posts_per_page' => -1,
            );

            $query = new WP_Query( $args );

            if ( $query->have_posts() ) {
                while ( $query->have_posts() ) {
                    $query->the_post();

                    ?><section class="package-section">
						<h3> <?php the_title() ?> </h3> <?php
						if ( get_field('package_price') ){
							?><p> <?php the_field('package_price') ?> </p><?php
						}
						if ( get_field('package_duration') ){
							?><p> <?php the_field('package_duration') ?> </p><?php
						}
						if ( get_field('package_description') ){
							?><p> <?php the_field('package_description') ?> </p><?php
						}
					?></section><?php

                }
                wp_reset_postdata();
            }

			?><section id="faq-section">
			<h2>FAQ</h2>
				<?php
				// Check rows exists.
				if( have_rows('faq_repeater') ):
					// Loop through rows.
					while( have_rows('faq_repeater') ) : the_row();
						// Load sub field value.
						?><article class="faq-question">
							<h4><?php the_sub_field('question'); ?></h4>
							<p><?php the_sub_field('answer'); ?></p>
						</article>
					<?php endwhile;
				// No value.
				else :
					// Do something...
				endif; ?>
			</section> 
        ?>

	</main><!-- #main -->

<?php
get_footer();
