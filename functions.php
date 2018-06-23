<?php
/**
 * zs functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package zs
 */

if ( ! function_exists( 'zs_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function zs_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on zs, use a find and replace
		 * to change 'zs' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'zs', get_template_directory() . '/languages' );

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
		register_nav_menus( array(
			'principal-menu' => esc_html__( 'Primary Menu', 'zs' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'zs_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'zs_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function zs_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'zs_content_width', 640 );
}
add_action( 'after_setup_theme', 'zs_content_width', 0 );



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
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function zs_widgets_init() {

	register_sidebar( array(
		'name'          => esc_html__( 'header-text', 'zs' ),
		'id'            => 'header-text',
		'description'   => esc_html__( 'Add widgets here.', 'zs' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );


	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'zs' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'zs' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'zs_widgets_init' );

/**
 * Enqueue scripts and styles.
 */

 //Jquery desregistro
add_action('wp_enqueue_scripts', 'jquery_script_remove_header');
function jquery_script_remove_header() {
      wp_deregister_script( 'jquery' );
}

//Register scripts and sytles
function zs_scripts() {

	// Import Styles
	wp_enqueue_style('google_fonts', "https://fonts.googleapis.com/css?family=Montserrat:400,400i,700|PT+Sans+Narrow:400,700", array(), wp_get_theme()->get('Version') );
	wp_enqueue_style( 'zs-style', get_stylesheet_uri(),  array(), wp_get_theme()->get('Version') );

	// Import jquery
	wp_enqueue_script( 'jquery', "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js",false, '3.3.1', true);
	wp_enqueue_script( 'zs-script', get_template_directory_uri() . '/js/script.js', array('jquery'), wp_get_theme()->get('Version'), true );
	wp_enqueue_script( 'zs-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), wp_get_theme()->get('Version'), true );

	// if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	// 	wp_enqueue_script( 'comment-reply' );
	// }

}
add_action( 'wp_enqueue_scripts', 'zs_scripts' );


// Register styles footer
function zs_styles_footer() {
	wp_enqueue_style('fontawesome', "https://use.fontawesome.com/releases/v5.1.0/css/all.css", array(), '5.1.0');
	wp_enqueue_style('bulma', "https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css", array('fontawesome'), '0.7.1');
};
add_action( 'get_footer', 'zs_styles_footer' );



//Add search in menu

add_filter( 'wp_nav_menu_items', 'zs_item_search', 10, 2);

function zs_item_search( $items, $args ) {

	if ($args->theme_location == 'principal-menu') {

		$items .= '<li class="menu-item item-search">'
				. '<form role="search" method="get" class="search-form" action="'.home_url( '/' ).'">'
				. '<label>'
				. '<span class="screen-reader-text">' . _x( 'Buscar:', 'label' ) . '</span>'
				. '<input type="search" class="search-field" placeholder="' . esc_attr_x( 'Buscar …', 'placeholder' ) . '" value="' . get_search_query() . '" name="s" title="' . esc_attr_x( 'Search for:', 'label' ) . '" />'
				. '</label>'
				. '<a href="#" class="search-link hide"><i class="fas fa-search"></i></a>'
				. '</form>'
				. '</li>';
	}

	return $items;
}







// //SVG support
// function cc_mime_types($mimes) {
// 	$mimes['svg'] = 'image/svg+xml';
// 	return $mimes;
//   }
//   add_filter('upload_mimes', 'cc_mime_types');