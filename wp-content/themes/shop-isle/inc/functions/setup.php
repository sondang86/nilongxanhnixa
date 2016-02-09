<?php
/**
 * ShopIsle setup functions
 *
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 980; /* pixels */
}

/**
 * Assign the ShopIsle version to a var
 */
$theme 					= wp_get_theme();
$shop_isle_version 	= $theme['Version'];

if ( ! function_exists( 'shop_isle_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function shop_isle_setup() {

		/*
		 * Load Localisation files.
		 *
		 * Note: the first-loaded translation file overrides any following ones if the same translation is present.
		 */

		// wp-content/languages/themes/shop-isle-it_IT.mo
		load_theme_textdomain( 'shop-isle', trailingslashit( WP_LANG_DIR ) . 'themes/' );

		// wp-content/themes/child-theme-name/languages/it_IT.mo
		load_theme_textdomain( 'shop-isle', get_stylesheet_directory() . '/languages' );

		// wp-content/themes/theme-name/languages/it_IT.mo
		load_theme_textdomain( 'shop-isle', get_template_directory() . '/languages' );

		/**
		 * Add default posts and comments RSS feed links to head.
		 */
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus( array(
			'primary'		=> __( 'Primary Menu', 'shop-isle' )
		) );

		/*
		 * Switch default core markup for search form, comment form, comments, galleries, captions and widgets
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'widgets',
		) );

		// Setup the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'storefront_custom_background_args', array(
			'default-color' => apply_filters( 'storefront_default_background_color', 'fcfcfc' ),
			'default-image' => '',
		) ) );

		// Add support for the Site Logo plugin and the site logo functionality in JetPack
		// https://github.com/automattic/site-logo
		// http://jetpack.me/
		add_theme_support( 'site-logo', array( 'size' => 'full' ) );

		// Declare WooCommerce support
		add_theme_support( 'woocommerce' );

		// Declare support for title theme feature
		add_theme_support( 'title-tag' );
		
		/* Custom header */
		add_theme_support( 'custom-header', array( 'default-image' => get_template_directory_uri().'/assets/images/header.jpg' ));
	}
endif; // shop_isle_setup

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function shop_isle_widgets_init() {

	register_sidebar( array(
		'name'          => __( 'Sidebar', 'shop-isle' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer area 1', 'shop-isle' ),
		'id'            => 'sidebar-footer-area-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer area 2', 'shop-isle' ),
		'id'            => 'sidebar-footer-area-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer area 3', 'shop-isle' ),
		'id'            => 'sidebar-footer-area-3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer area 4', 'shop-isle' ),
		'id'            => 'sidebar-footer-area-4',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

}

/**
 * Enqueue scripts and styles.
 * @since  1.0.0
 */
function shop_isle_scripts() {
	global $shop_isle_version;
	
	wp_enqueue_style( 'shop-isle-bootstrap', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap.min.css', array(), '20120206', "all"  );
		
	wp_enqueue_style( 'shop-isle-magnific-popup', get_template_directory_uri() . '/assets/css/magnific-popup.css', array(), '20120206', "all"  );
	
	wp_enqueue_style( 'shop-isle-flexslider', get_template_directory_uri() . '/assets/css/flexslider.css', array('shop-isle-magnific-popup'), '20120206', "all"  );

	wp_enqueue_style( 'shop-isle-owl-carousel', get_template_directory_uri() . '/assets/css/owl.carousel.css', array('shop-isle-flexslider'), '20120206', "all"  );

	wp_enqueue_style( 'shop-isle-animate', get_template_directory_uri() . '/assets/css/animate.css', array('shop-isle-owl-carousel'), '20120206', "all"  );

	wp_enqueue_style( 'shop-isle-main-style', get_template_directory_uri() . '/assets/css/style.css', array('shop-isle-bootstrap'), '20120206', "all" );
	
	wp_enqueue_style( 'shop-isle-style', get_stylesheet_uri(), '', $shop_isle_version );
	
	wp_enqueue_script( 'jquery' );
	
	wp_enqueue_script( 'shop-isle-bootstrap-js', get_template_directory_uri() . '/assets/bootstrap/js/bootstrap.min.js', array('jquery'), '20120206', true );
	
	wp_enqueue_script( 'shop-isle-jquery-mb-YTPlayer', get_template_directory_uri() . '/assets/js/jquery.mb.YTPlayer.min.js', array('jquery'), '20120206', true );
	
	wp_enqueue_script( 'shop-isle-jqBootstrapValidation', get_template_directory_uri() . '/assets/js/jqBootstrapValidation.js', array('jquery'), '20120206', true );
	
	wp_enqueue_script( 'shop-isle-flexslider', get_template_directory_uri() . '/assets/js/jquery.flexslider-min.js', array('jquery'), '20120206', true );
	
	wp_enqueue_script( 'shop-isle-magnific-popup', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js', array('jquery'), '20120206', true );
	
	wp_enqueue_script( 'shop-isle-fitvids', get_template_directory_uri() . '/assets/js/jquery.fitvids.js', array('jquery'), '20120206', true );
	
	wp_enqueue_script( 'shop-isle-smoothscroll', get_template_directory_uri() . '/assets/js/smoothscroll.js', array('jquery'), '20120206', true );
	
	wp_enqueue_script( 'shop-isle-owl', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), '20120206', true );
	
	wp_enqueue_script( 'shop-isle-custom', get_template_directory_uri() . '/assets/js/custom.js', array('jquery','shop-isle-flexslider','shop-isle-jquery-mb-YTPlayer'), '20120206', true );

	wp_enqueue_script( 'shop-isle-navigation', get_template_directory_uri() . '/js/navigation.min.js', array(), '20120206', true );

	wp_enqueue_script( 'shop-isle-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.min.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

function shop_isle_admin_styles() {
	wp_enqueue_media();
    wp_enqueue_style( 'shop_isle_admin_stylesheet', get_template_directory_uri() . '/assets/css/admin-style.css' );
}