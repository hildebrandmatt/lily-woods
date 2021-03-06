<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Lily_Woods
 */

get_header();
?>

	<main id="primary" class="site-main">

		<section class="error-404 not-found">
			<header class="page-header">
				<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'lily-woods' ); ?></h1>
			</header><!-- .page-header -->

			<div class="page-content">
				<p class="oops-text"><?php esc_html_e( 'It looks like nothing was found at this location.', 'lily-woods' ); ?></p>


			</div><!-- .page-content -->
		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php
