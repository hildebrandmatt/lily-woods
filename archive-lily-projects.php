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

		<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<?php
					//the_archive_title( '<h1 class="page-title">', '</h1>' );
					//the_archive_description( '<div class="archive-description">', '</div>' );
					?>
				</header><!-- .page-header -->

				<nav class="category-nav"><?php

				$terms = get_terms( array(
					'taxonomy' => 'lily-project-type',
				) );
				if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
					foreach ( $terms as $term ) {
						?><a href="<?php strtok($_SERVER["REQUEST_URI"], '?') ?>?id=<?php echo $term->name ?>"><?php echo $term->name ?></a><?php
					}
				}?>
				
				</nav><?php

				if ( $_GET['id'] == "" ) {
					$category = "stories";
				} else {
					$category = $_GET['id'];
				}

				/* For stories... */
				if ( $category == "stories") :
				/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						if ( function_exists( 'get_field' ) ){
						/*
						* Include the Post-Type-specific template for the content.
						* If you want to override this in a child theme, then include a file
						* called content-___.php (where ___ is the Post Type name) and that will be used instead.
						*/
						//get_template_part( 'template-parts/content', get_post_type() );
						?><a href="<?php the_permalink() ?>"><?php
						the_post_thumbnail('large');
						?><h2><?php the_title(); ?></h2></a><?php

						}

					endwhile;
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
						while ( $query->have_posts() ) {
							$query->the_post();

							if ( function_exists( 'get_field' ) ){
								$images = get_field('single_project_gallery');
								$size = 'medium'; // (thumbnail, medium, large, full or custom size)
								if( $images ): ?>
									<?php foreach( $images as $image_id ): ?>
										<?php echo wp_get_attachment_image( $image_id, $size ); ?>
									<?php endforeach; ?>
								<?php endif;
							}
						}
						wp_reset_postdata();
					}
				endif;

			the_posts_navigation();

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif;
			?>

	</main><!-- #main -->

<?php
get_footer();
