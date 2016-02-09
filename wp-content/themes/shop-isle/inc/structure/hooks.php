<?php
/**
 * storefront hooks
 *
 * @package storefront
 */

/**
 * General
 * @see  shop_isle_setup()
 * @see  shop_isle_widgets_init()
 * @see  shop_isle_scripts()
 * @see  shop_isle_get_sidebar()
 */
add_action( 'after_setup_theme',			'shop_isle_setup' );
add_action( 'widgets_init',					'shop_isle_widgets_init' );
add_action( 'wp_enqueue_scripts',			'shop_isle_scripts',				10 );
add_action( 'admin_enqueue_scripts',        'shop_isle_admin_styles',           10 );
add_action( 'shop_isle_sidebar',			'shop_isle_get_sidebar',			10 );

/**
 * Header
 * @see  storefront_skip_links()
 * @see  storefront_site_branding()
 * @see  shop_isle_primary_navigation()
 */
add_action( 'storefront_header', 'storefront_skip_links', 				0 );
add_action( 'storefront_header', 'storefront_site_branding',			20 );
add_action( 'shop_isle_header', 'shop_isle_primary_navigation',		50 );

/**
 * Footer
 * @see  shop_isle_footer_widgets()
 * @see  shop_isle_footer_copyright_and_socials()
 */
add_action( 'shop_isle_footer', 'shop_isle_footer_widgets',	                    10 );
add_action( 'shop_isle_footer', 'shop_isle_footer_copyright_and_socials',	    20 );

/**
 * Homepage
 * @see  storefront_homepage_content()
 * @see  storefront_product_categories()
 * @see  storefront_recent_products()
 * @see  storefront_featured_products()
 * @see  storefront_popular_products()
 * @see  storefront_on_sale_products()
 */
add_action( 'homepage', 'storefront_homepage_content',		10 );
add_action( 'homepage', 'storefront_product_categories',	20 );
add_action( 'homepage', 'storefront_recent_products',		30 );
add_action( 'homepage', 'storefront_featured_products',		40 );
add_action( 'homepage', 'storefront_popular_products',		50 );
add_action( 'homepage', 'storefront_on_sale_products',		60 );

/**
 * Posts
 * @see  shop_isle_post_header()
 * @see  shop_isle_post_meta()
 * @see  shop_isle_post_content()
 * @see  storefront_paging_nav()
 * @see  storefront_single_post_header()
 * @see  storefront_post_nav()
 * @see  storefront_display_comments()
 */
add_action( 'storefront_loop_post',			'shop_isle_post_header',		10 );
add_action( 'storefront_loop_post',			'shop_isle_post_meta',			20 );
add_action( 'storefront_loop_post',			'shop_isle_post_content',		30 );
add_action( 'storefront_loop_after',		'storefront_paging_nav',		10 );
add_action( 'storefront_single_post',		'shop_isle_post_header',		10 );
add_action( 'storefront_single_post',		'shop_isle_post_meta',			20 );
add_action( 'storefront_single_post',		'shop_isle_post_content',		30 );
add_action( 'storefront_single_post_after',	'storefront_post_nav',			10 );
add_action( 'storefront_single_post_after',	'storefront_display_comments',	10 );

/**
 * Pages
 * @see  storefront_page_content()
 * @see  storefront_display_comments()
 */
add_action( 'storefront_page', 			'storefront_page_content',		20 );
add_action( 'storefront_page_after', 	'storefront_display_comments',	10 );

/**
 * Extras
 * @see  storefront_setup_author()
 * @see  storefront_body_classes()
 * @see  storefront_page_menu_args()
 */
add_filter( 'body_class',			'storefront_body_classes' );
add_filter( 'wp_page_menu_args',	'storefront_page_menu_args' );

/**
 * Customize
 * 
 * @see  shop_isle_customize_preview_js()
 * @see  shop_isle_customize_register()
 * @see  shop_isle_customizer_script()
 */
 add_action( 'customize_preview_init',               'shop_isle_customize_preview_js' );
 add_action( 'customize_register',                   'shop_isle_customize_register' );
 add_action( 'customize_controls_enqueue_scripts',   'shop_isle_customizer_script' );