<?php

add_image_size( 'shop_isle_blog_image_size', 750, 500, true );
add_image_size( 'shop_isle_banner_homepage', 360, 235, true );

add_filter( 'image_size_names_choose', 'shop_isle_media_uploader_custom_sizes' );
function shop_isle_media_uploader_custom_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'shop_isle_banner_homepage'		=> esc_html__( 'Shop isle Small Banner Homepage', 'shop-isle' ),
    ) );
}

/**
 * Setup.
 * Enqueue styles, register widget regions, etc.
 */
require get_template_directory() . '/inc/functions/setup.php';

/**
 * Structure.
 * Template functions used throughout the theme.
 */
require get_template_directory() . '/inc/structure/hooks.php';
require get_template_directory() . '/inc/structure/post.php';
require get_template_directory() . '/inc/structure/page.php';
require get_template_directory() . '/inc/structure/header.php';
require get_template_directory() . '/inc/structure/footer.php';
require get_template_directory() . '/inc/structure/comments.php';
require get_template_directory() . '/inc/structure/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/functions/extras.php';

/**
 * Customizer additions.
 */
if ( is_storefront_customizer_enabled() ) {
	require get_template_directory() . '/inc/customizer/customizer.php';
	require get_template_directory() . '/inc/customizer/functions.php';
}

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack/jetpack.php';

/**
 * Load WooCommerce compatibility files.
 */
if ( is_woocommerce_activated() ) {
	require get_template_directory() . '/inc/woocommerce/hooks.php';
	require get_template_directory() . '/inc/woocommerce/functions.php';
	require get_template_directory() . '/inc/woocommerce/template-tags.php';
	require get_template_directory() . '/inc/woocommerce/integrations.php';
}