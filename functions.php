<?php
/**
 * Theme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package mmh_weblog
 */

if ( ! function_exists( 'mmh_weblog_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function mmh_weblog_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Future Imperfect, use a find and replace
	 * to change 'mmh-weblog' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'mmh-weblog', get_template_directory() . '/languages' );

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
	add_image_size( 'frontpage-image-grid', 800, 200, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'mmh-weblog' ),
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

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'status',
		/*'image',
		'video',
		'quote',
		'link',*/
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'mmh_weblog_custom_background_args', array(
		'default-color' => '1c1c1c',
		'default-image' => '%1$s/bg.jpg',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'mmh_weblog_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function mmh_weblog_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'mmh_weblog_content_width', 640 );
}
add_action( 'after_setup_theme', 'mmh_weblog_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function mmh_weblog_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Frontpage Sidebar 1', 'mmh-weblog' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'class'         => 'row',
		'before_widget' => '<section id="%1$s" class="col-xs-12 col-md-12 widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Frontpage Sidebar 2', 'mmh-weblog' ),
		'id'            => 'sidebar-2',
		'description'   => '',
		'class'         => 'row',
		'before_widget' => '<section id="%1$s" class="col-xs-12 col-md-12 widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Top Bar 1', 'mmh-weblog' ),
		'id'            => 'topbar-1',
		'description'   => '',
		'class'         => '',
		'before_widget' => '<div id="%1$s" class="col-xs-2 col-sm-1 col-xs-offset-2 col-sm-offset-4 widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Top Bar 2', 'mmh-weblog' ),
		'id'            => 'topbar-2',
		'description'   => '',
		'class'         => '',
		'before_widget' => '<div id="%1$s" class="col-xs-2 col-sm-1 widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Top Bar 3', 'mmh-weblog' ),
		'id'            => 'topbar-3',
		'description'   => '',
		'class'         => '',
		'before_widget' => '<div id="%1$s" class="col-xs-2 col-sm-1 widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Top Bar 4', 'mmh-weblog' ),
		'id'            => 'topbar-4',
		'description'   => '',
		'class'         => '',
		'before_widget' => '<div id="%1$s" class="col-xs-2 col-sm-1 widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );

	register_sidebar( array(
	 	'name'          => esc_html__( 'Blog sidebar', 'mmh-weblog' ),
		'id'            => 'blog-sidebar',
		'description'   => 'Appears on blog pages and archives',
		'class'         => 'row',
		'before_widget' => '<section id="%1$s" class="col-xs-12 col-md-12 widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 1', 'mmh-weblog' ),
		'id'            => 'footer-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 2', 'mmh-weblog' ),
		'id'            => 'footer-2',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 3', 'mmh-weblog' ),
		'id'            => 'footer-3',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
	
}
add_action( 'widgets_init', 'mmh_weblog_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function mmh_weblog_scripts() {
	wp_enqueue_style( 'mmh-weblog-style', get_stylesheet_uri() );

	wp_enqueue_script( 'mmh-weblog-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'mmh-weblog-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'mmh_weblog_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

function change_custom_background_cb() {
	$background = get_background_image();
	$color = get_background_color();
 
	if ( ! $background && ! $color )
		return;
 
	$style = $color ? "background-color: #$color;" : '';
 
	if ( $background ) {
		$image = " background-image: url('$background');";

		$repeat = get_theme_mod( 'background_repeat', 'repeat' );

		if ( ! in_array( $repeat, array( 'no-repeat', 'repeat-x', 'repeat-y', 'repeat' ) ) )
			$repeat = 'repeat';

		$repeat = " background-repeat: $repeat;";

		$position = get_theme_mod( 'background_position_x', 'left' );

		if ( ! in_array( $position, array( 'center', 'right', 'left' ) ) )
			$position = 'left';

		$position = " background-position: top $position;";

		$attachment = get_theme_mod( 'background_attachment', 'scroll' );

		if ( ! in_array( $attachment, array( 'fixed', 'scroll' ) ) )
			$attachment = 'scroll';

		$attachment = " background-attachment: $attachment;";

		$style .= $image . $repeat . $position . $attachment;
	}

	echo('<style type="text/css">.site-header { ' . trim( $style ) .' } #page { ' . trim( $style ) .' !important } </style>');
}

add_custom_background('change_custom_background_cb');

function custom_excerpt_length( $length ) {
	return 20;
}
add_filter( ‘excerpt_length’, ‘custom_excerpt_length’, 999 );


function wp_nav_menu_no_ul()
{
    $options = array(
        'echo' => false,
        'container' => false,
        'theme_location' => 'primary',
        'fallback_cb'=> 'fall_back_menu'
    );

    $menu = wp_nav_menu($options);
    
    
    echo preg_replace(array(
        '#^<li[^>]*>#',
        '#</li>$#'
    ), '', $menu);

}

function fall_back_menu(){
    return;
}

