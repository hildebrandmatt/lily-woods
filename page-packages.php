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
	<h1><?php the_title() ?></h1><?php

		the_field( 'package_page_description' );

        ?><section class="package-notice"><?php
		the_field( 'package_notice' );?>
        </section><?php
		
		$args = array(
			'post_type' => 'lily-packages',
			'posts_per_page' => -1,
			'order'		=> 'ASC',
			'orderby'	=> 'meta_value_num',
			'meta_key'	=> 'order_number',
			'tax_query' => array(
				array(
					'taxonomy' => 'lily-package-type',
					'field' => 'slug',
					'terms' => 'packages'
				),
			),
		);

		$query = new WP_Query( $args );

		if ( $query->have_posts() ) {
            ?><section class="package-group"><?php
			while ( $query->have_posts() ) {
				$query->the_post();

				?><section class="package-section">
					<h2 class="package-title"> <?php the_title() ?> </h2> <?php
					//check for acf existing
					if ( function_exists( 'get_field' ) ){
						if ( get_field('package_price') ){
							?><p class="package-pricing"> <?php the_field('package_price') ?> </p><?php
						}
						if ( get_field('number_of_photographers') ){
							?><p class="number-photographers"> <?php the_field('number_of_photographers') ?> </p><?php
						}
						if ( get_field('package_duration') ){
							?><p class="package-hours"> <?php the_field('package_duration') ?> </p><?php
						}
						if ( get_field('package_description') ){
							?><p class="package-summary"> <?php the_field('package_description') ?> </p><?php
						}
					}
				?></section><?php
			}
            ?></section> <?php
			wp_reset_postdata();
		}

		$args = array(
			'post_type' => 'lily-packages',
			'posts_per_page' => -1,
			'order'		=> 'ASC',
			'orderby'	=> 'meta_value_num',
			'meta_key'	=> 'order_number',
			'tax_query' => array(
				array(
					'taxonomy' => 'lily-package-type',
					'field' => 'slug',
					'terms' => 'extras'
				),
			),
		);
        ?><h2 class="sub-heading">Extras</h2><?php

		$query = new WP_Query( $args );

		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();
				?><section class="extras-section">
					<?php
					//check for acf existing
					if ( function_exists( 'get_field' ) ){
						if ( get_field('package_price') ){
							?><p class="extras-pricing"> <?php the_field('package_price') ?> </p><?php
						}
						if ( get_field('number_of_photographers') ){
							?><p> <?php the_field('number_of_photographers') ?> </p><?php
						}
						if ( get_field('package_duration') ){
							?><p> <?php the_field('package_duration') ?> </p><?php
						}?>
						<div class="extras-description">
							<h2 class="extras-title"> <?php the_title() ?> </h2> <?php
						if ( get_field('package_description') ){
							?>
                                <p class="extras-details"> <?php the_field('package_description') ?> </p>
                            <?php
						}?>
						</div><?php
					}
				?></section><?php

			}
			wp_reset_postdata();
		}

		?><section id="faq-section">
		<h2 class="sub-heading">FAQ</h2>
			<?php
			// Check rows exists.
			if( have_rows('faq_repeater') ):
				// Loop through rows.
				while( have_rows('faq_repeater') ) : the_row();
					// Load sub field value.
					?><article class="faq-question">
						<h3 class="question"><?php the_sub_field('question'); ?></h3>
						<p><?php the_sub_field('answer'); ?></p>
					</article>
				<?php endwhile;
			// No value.
			else :
				// Do something...
			endif; ?>
		</section>
		<a class="project-cta" href="<?php echo get_page_link(19) ?>">Have something in mind? Let's get in touch!</a>

	</main><!-- #main -->

<?php
get_footer();
