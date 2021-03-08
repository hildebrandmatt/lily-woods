<?php
/**
 * Lily Woods functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Lily_Woods
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'lily_woods_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function lily_woods_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Lily Woods, use a find and replace
		 * to change 'lily-woods' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'lily-woods', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'lily-woods' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'lily_woods_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'lily_woods_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function lily_woods_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'lily_woods_content_width', 640 );
}
add_action( 'after_setup_theme', 'lily_woods_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
/*function lily_woods_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'lily-woods' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'lily-woods' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'lily_woods_widgets_init' );*/

/**
 * Enqueue scripts and styles.
 */
function lily_woods_scripts() {
	wp_enqueue_style( 'lily-woods-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'lily-woods-style', 'rtl', 'replace' );

	wp_enqueue_script( 'lily-woods-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	wp_register_script( 'isotope', get_theme_file_uri( '/js/libs/isotope.pkgd.min.js' ), array( 'jquery' ), '3.0.1', true );

	wp_register_script( 'isotope-settings', get_theme_file_uri( '/js/isotope.settings.js' ), array( 'isotope' ), '1.0', true );

	wp_enqueue_script( 'packery', get_theme_file_uri( '/js/libs/packery-mode.pkgd.min.js' ), array( 'isotope-settings' ), '2.0.1', true );

	wp_register_script( 'hc-lightgallery', get_theme_file_uri( '/js/libs/lightgallery.min.js' ), array('jquery'), '20210225', true );

	wp_enqueue_script( 'hc-lightgallery-settings', get_theme_file_uri( '/js/lightgallery-settings.js' ), array('hc-lightgallery'), '1.0', true );

	wp_register_script( 'slick-slider', get_theme_file_uri( '/js/libs/slick.min.js' ), array('jquery'), '1.8.1', true );

	wp_enqueue_script( 'slick-slider-settings', get_theme_file_uri( '/js/slick-settings.js' ), array('slick-slider'), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'lily_woods_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Custom Post Types & Taxonomies
 */
require get_template_directory() . '/inc/cpt-taxonomy.php';

/**
 * Remove Editor from Home, About, and Contact pages
 */
function lw_post_filter( $use_block_editor, $post ) {
    if ( 13 === $post->ID || 16 === $post->ID || 19 === $post->ID || 352 === $post->ID ) {
        return false;
    }
    return $use_block_editor;
}
add_filter( 'use_block_editor_for_post', 'lw_post_filter', 10, 2 );

function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/LilyWoodsLogo.png);
		height:155px;
		width:320px;
		background-size: contain;
		background-repeat: no-repeat;
        	padding-bottom: 30px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

function my_login_stylesheet() {
    wp_enqueue_style( 'custom-login', get_stylesheet_directory_uri() . '/css/style-login.css' );
}
add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );

/**
* Lower Yoast SEO Metabox location
*/
function yoast_to_bottom(){
   return 'low';
}
add_filter( 'wpseo_metabox_prio', 'yoast_to_bottom' );

function wporg_remove_all_dashboard_metaboxes() {
	if ( !current_user_can( 'manage_options' ) ) {
		// Remove Welcome panel
		remove_action( 'welcome_panel', 'wp_welcome_panel' );
		// Remove the rest of the dashboard widgets
		remove_meta_box( 'health_check_status', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_site_health', 'dashboard', 'normal');
	}
}
add_action( 'wp_dashboard_setup', 'wporg_remove_all_dashboard_metaboxes' );

function twd_remove_admin_links() {
	if ( !current_user_can( 'manage_options' ) ) {
		remove_menu_page( 'edit.php' );           // Remove Posts link
    	remove_menu_page( 'edit-comments.php' );   // Remove Comments link
	}
}

//Add Dashboard Widgets
// This function is hooked into the 'wp_dashboard_setup' action below.
function lilywoods_add_dashboard_widgets() {
	wp_add_dashboard_widget(
		'lilywoods_welcome_widget', // Widget slug.
		esc_html__( 'New Welcome Widget', 'lwwelcome' ), // Title.
		'lilywoods_add_widget_function' // Display function.
	);
}
add_action( 'wp_dashboard_setup', 'lilywoods_add_dashboard_widgets' );

// Create the function to output the content of your Dashboard Widget.
function lilywoods_add_widget_function() {
	// Display whatever you want to show.
	echo '<p>Hello there, welcome to your site! I am a New Dashboard Widget.
	Tutorials to come, so watch this space!</p>';
}