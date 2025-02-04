<?php
if ( ! function_exists( 'site_setup' ) ) :
	function site_setup() {
        //Remove emoji script
        remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
        remove_action( 'wp_print_styles', 'print_emoji_styles' );
        //Remove emoji script END
        add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
        add_theme_support( 'woocommerce' );

		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Hidden 1(Left)', 'lumina' ),
				'menu-2' => esc_html__( 'Hidden 2(Right)', 'lumina' ),
				'menu-3' => esc_html__( 'Buttons', 'lumina' ),
				'menu-4' => esc_html__( 'Footer', 'lumina' ),
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
	}
endif;
add_action( 'after_setup_theme', 'site_setup' );

function site_scripts() {
	wp_enqueue_style( 'site-style', get_stylesheet_uri(), array(), '1.0.2' );
    wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', array(), null, true);
    wp_enqueue_script('slick', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js', array(), null, true);

	// GSAP
	wp_enqueue_script('gsap', get_template_directory_uri() . '/js/plugins/gsap.min.js', true);
	wp_enqueue_script('split-text', get_template_directory_uri() . '/js/plugins/SplitText.min.js', true);
	wp_enqueue_script('scrolltrigger', get_template_directory_uri() . '/js/plugins/ScrollTrigger.min.js', true);
	wp_enqueue_script('scrollto', get_template_directory_uri() . '/js/plugins/ScrollToPlugin.min.js', true);

    wp_enqueue_script('splide-slider', get_theme_file_uri('/js/plugins/splide.min.js'), NULL, '3.6.4', true);
    wp_enqueue_script('splide-slider-extension-auto-scroll', get_theme_file_uri('/js/plugins/splide-extension-auto-scroll.min.js'), NULL, '1', true);

    wp_enqueue_script('jquery-validate', get_theme_file_uri('/js/plugins/jquery.validate.min.js'), NULL, '1', true);
    // wp_enqueue_script('select2', get_theme_file_uri('/js/plugins/select2.js'), NULL, '1', true);

    wp_enqueue_script('global', get_theme_file_uri('/js/global.js'), NULL, '1.0.2', true);
    wp_enqueue_script('woocommerce-custom-cart', get_theme_file_uri('/js/woocommerce-custom-cart.js'), NULL, '1.0', true);
    wp_enqueue_script('page-js', get_theme_file_uri('/js/page.js'), NULL, '1.0.2', true);


    wp_localize_script('global','site_data',array(
        'site_url' => site_url(),
        'theme_url' => get_template_directory_uri(),
    ));
}
add_action( 'wp_enqueue_scripts', 'site_scripts' );

//Remove gutenberg styles
function remove_block_css(){
    wp_dequeue_style( 'wp-block-library' );
}
add_action( 'wp_enqueue_scripts', 'remove_block_css', 100 );
//Remove gutenberg styles END

require_once("inc/additional-functions.php");
require_once("inc/custom-posts-types.php");
require_once("inc/custom-taxonomies.php");
require_once("inc/woocommerce-custom-cart.php");
require_once("inc/woocommerce-custom-product-fields.php");
require_once("inc/calendar-filters.php");
require_once("inc/programs-filter.php");
require_once("inc/galleries-filter.php");

/** Exclude .git info in exports */
add_filter('ai1wm_exclude_content_from_export', function($exclude_filters) {
    $exclude_filters[] = 'themes/lumina/.git';
    return $exclude_filters;
});

add_filter( 'auto_update_plugin', '__return_false' );
add_filter( 'auto_update_theme', '__return_false' );