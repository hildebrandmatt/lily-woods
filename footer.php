<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Lily_Woods
 */

?>

	<footer id="colophon" class="site-footer">
        <h2 class="footer-title">follow along on instagram</h2>
		<?php echo do_shortcode( '[instagram-feed num=4 cols=4]' ); ?>
		<a class="social-link" href="<?php echo get_page_link(19) ?>">Check out my Facebook</a>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
