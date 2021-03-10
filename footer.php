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
        <div class="social-link-group">
            <a class="footer-link" href="<?php echo get_page_link(19) ?>">facebook</a>
            <a class="footer-link" href="<?php echo esc_url('https://www.instagram.com/lilywoodsphotography/') ?>">instagram</a>
        </div>
        <a class="footer-link" href="<?php echo esc_url('mailto:lily-woods@lilywoods.ca') ?>">lily-woods@lilywoods.ca</a>
        <a class="return-top-link" href="<?php echo esc_url('#page')?>">Return to top of page
            <span class="screen-reader-text">Scrolls back to the top of the page</span>
        </a>
    </footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
