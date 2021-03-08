<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Lily_Woods
 */

get_header();
?>

	<main id="primary" class="site-main">
	<h1>Portfolio</h1>
    <h2>Experience their stories</h2>
		<?php if ( have_posts() ) : ?>

				<nav class="category-nav"><?php

				$terms = get_terms( array(
					'taxonomy' => 'lily-project-type',
					'orderby' => 'count',
					'order' => 'DESC',
				) );
				if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
					foreach ( $terms as $term ) {
						?><a href="<?php strtok($_SERVER["REQUEST_URI"], '?') ?>?id=<?php echo $term->name ?>"<?php
						if ( $_GET['id'] == $term->name || ( $_GET['id'] == "" && $term->name == "Stories" ) ) {
							?> class="a-underlined"<?php
						}?>
						><?php echo $term->name ?></a><?php
					}
				}?>
				
				</nav><?php

				if ( $_GET['id'] == "" ) {
					$category = "Stories";
				} else {
					$category = $_GET['id'];
				}

				/* For stories... */
				if ( $category == "Stories") :
				/* Start the Loop */
					?>
					<div class="isotope-stories-grid"><?php
					$i = 0;
					while ( have_posts() ) :
						the_post();
						

						if ( function_exists( 'get_field' ) ){
						/*
						* Include the Post-Type-specific template for the content.
						* If you want to override this in a child theme, then include a file
						* called content-___.php (where ___ is the Post Type name) and that will be used instead.
						*/
						//get_template_part( 'template-parts/content', get_post_type() );
						?><div class="grid-item">							
						<a href="<?php the_permalink() ?>"><?php
						the_post_thumbnail('large');
						?><p class="project-title-link"><?php the_title(); ?></p></a>
						</div><?php

						}

					endwhile;
					?></div><?php
				else :					

					$args = array(
						'post_type' => 'lily-projects',
						'orderby'	=> 'rand',
						'posts_per_page' => -1,
						'tax_query' => array(
							array(
								'taxonomy' => 'lily-project-type',
								'field' => 'slug',
								'terms' => $category
							),
						),
					);

					$query = new WP_Query( $args );

					if ( $query->have_posts() ) {
						?><div class="isotope-grid full-grid" id="lightgallery"><?php
						while ( $query->have_posts() ) {
							$query->the_post();

							if ( function_exists( 'get_field' ) ){
								$images = get_field('single_project_gallery');
								$size = 'full'; // (thumbnail, medium, large, full or custom size)
								if( $images ): ?>
									<?php foreach( $images as $image_id ):
										?><div class="grid-item" data-src="<?php echo wp_get_attachment_url( $image_id ) ?>" data-sub-html="<a href='<?php the_permalink(); ?>' target='_parent'><p>Check out <?php  the_title(); ?>!</p></a>">
											<?php echo wp_get_attachment_image( $image_id, $size ); ?>
										</div><?php	
									endforeach; ?>
								<?php endif;
							}
						}
						?></div><?php
						wp_reset_postdata();
					}
				
				/*jQuery('.isotope-grid').isotope({
					itemSelector: '.grid-item',
					layoutMode: 'fitRows'
				});*/
				endif;

			the_posts_navigation();

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif;
			?>

	</main><!-- #main -->

<?php
get_footer();

