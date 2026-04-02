<?php

// Setup theme
function kongresszentrum_theme_setup() {

	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'kongresszentrum-kreuz' ),
		)
	);

	add_theme_support( 'menus' );

	add_theme_support( 'custom-logo' );

	add_theme_support( 'title-tag' );

	add_theme_support( 'post-thumbnails' );

	add_theme_support( 'widgets-block-editor' );

	add_theme_support( 'customize-selective-refresh-widgets' );

	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ) );

	add_image_size( 'main-block-thumbnail', 462, 330, array( 'center', 'center' ) );

	add_image_size( 'banner-slider', 1920, 1080, array( 'center', 'center' ) );

}

add_action( 'after_setup_theme', 'kongresszentrum_theme_setup' );


// Enqueue styles and scripts
function theme_enqueue_styles() {
	// Get the theme data
	$the_theme     = wp_get_theme();
	$theme_version = $the_theme->get( 'Version' );
	wp_enqueue_style( 'theme-styles', get_stylesheet_directory_uri() . '/dist/main.css', array(), $theme_version );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'theme-scripts', get_stylesheet_directory_uri() . '/dist/main.js', array( 'jquery' ), $theme_version, true );
	if ( is_page_template( 'page-templates/page-contacts.php' ) ) :
		wp_enqueue_script( 'google-map-api', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyBAZN5TfX1aWmjodZ4e_6sOcaJV4D59jfo', array(), $theme_version, true );
		wp_enqueue_script( 'google-map-settings', get_stylesheet_directory_uri() . '/dist/google-maps.js', array( 'jquery' ), $theme_version, true );
	endif;
}

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

// Preload LCP hero image (first banner slide) to eliminate resource load delay.
function kongresszentrum_preload_lcp_image() {
	$query = new WP_Query( array(
		'post_type'      => 'seminare_rooms',
		'posts_per_page' => 1,
		'order'          => 'ASC',
		'fields'         => 'ids',
	) );
	if ( empty( $query->posts ) ) {
		return;
	}
	$thumbnail_id = get_post_thumbnail_id( $query->posts[0] );
	if ( ! $thumbnail_id ) {
		return;
	}
	$image = wp_get_attachment_image_src( $thumbnail_id, 'banner-slider' );
	if ( ! $image ) {
		return;
	}
	echo '<link rel="preload" as="image" href="' . esc_url( $image[0] ) . '" fetchpriority="high">' . "\n";
}

add_action( 'wp_head', 'kongresszentrum_preload_lcp_image', 1 );

// Custom widget for mobile language switcher
function register_custom_language_widget() {
	register_sidebar(
		array(
			'id'            => 'lang-switcher-mobile',
			'name'          => esc_html__( 'Language Switcher Mobile Widget' ),
			'description'   => esc_html__( 'Widget area for language selector mobile' ),
			'before_widget' => '<div id="%1$s" class="col-sm-12 col-md-2 widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '',
			'after_title'   => '',
		)
	);
}

add_action( 'widgets_init', 'register_custom_language_widget' );

// Google maps
function my_acf_init() {
	acf_update_setting( 'google_api_key', 'AIzaSyBAZN5TfX1aWmjodZ4e_6sOcaJV4D59jfo' );
}

if ( is_page_template( 'page-templates/page-contacts.php' ) || is_admin() ) :
	add_action( 'acf/init', 'my_acf_init' );
endif;


// Theme otimizations.
require get_template_directory() . '/inc/theme-optimizations.php';

// Theme custom template tags.
require get_template_directory() . '/inc/theme-template-tags.php';

// Theme customizer options.
require get_template_directory() . '/inc/customizer.php';

// Theme custom admin settings.
require get_template_directory() . '/inc/theme-admin-settings.php';
