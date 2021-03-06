<?php
/**
 * Custom template tags used to integrate this theme with WooCommerce.
 *
 * @package storefront
 */

/**
 * Cart Link
 * Displayed a link to the cart including the number of items present and the cart total
 * @param  array $settings Settings
 * @return array           Settings
 * @since  1.0.0
 */
if ( ! function_exists( 'storefront_cart_link' ) ) {
	function storefront_cart_link() {
		?>
			<a class="cart-contents" href="<?php echo esc_url( WC()->cart->get_cart_url() ); ?>" title="<?php _e( 'View your shopping cart', 'storefront' ); ?>">
				<?php echo wp_kses_data( WC()->cart->get_cart_subtotal() ); ?> <span class="count"><?php echo wp_kses_data( sprintf( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count(), 'storefront' ), WC()->cart->get_cart_contents_count() ) );?></span>
			</a>
		<?php
	}
}

/**
 * Display Product Search
 * @since  1.0.0
 * @uses  is_woocommerce_activated() check if WooCommerce is activated
 * @return void
 */
if ( ! function_exists( 'storefront_product_search' ) ) {
	function storefront_product_search() {
		if ( is_woocommerce_activated() ) { ?>
			<div class="site-search">
				<?php the_widget( 'WC_Widget_Product_Search', 'title=' ); ?>
			</div>
		<?php
		}
	}
}

/**
 * Display Header Cart
 * @since  1.0.0
 * @uses  is_woocommerce_activated() check if WooCommerce is activated
 * @return void
 */
if ( ! function_exists( 'storefront_header_cart' ) ) {
	function storefront_header_cart() {
		if ( is_woocommerce_activated() ) {
			if ( is_cart() ) {
				$class = 'current-menu-item';
			} else {
				$class = '';
			}
		?>
		<ul class="site-header-cart menu">
			<li class="<?php echo esc_attr( $class ); ?>">
				<?php storefront_cart_link(); ?>
			</li>
			<?php the_widget( 'WC_Widget_Cart', 'title=' ); ?>
		</ul>
		<?php
		}
	}
}

/**
 * Upsells
 * Related products on single page and line above it
 * @since   1.0.0
 * @return  void
 * @uses    woocommerce_upsell_display()
 */
if ( ! function_exists( 'shop_isle_upsell_display' ) ) {
	function shop_isle_upsell_display() {
		echo '</div></div>';
		echo '<hr class="divider-w">';
		echo '<div class="container">';
		woocommerce_upsell_display( -1, 3 );
	}
}

/**
 * Sorting wrapper
 * @since   1.4.3
 * @return  void
 */
function shop_isle_sorting_wrapper() {
	echo '<div class="row">';
		echo '<div class="col-sm-12">';
}

/**
 * Sorting wrapper close
 * @since   1.4.3
 * @return  void
 */
function shop_isle_sorting_wrapper_close() {
		echo '</div>';
	echo '</div>';
}

/**
 * Storefront shop messages
 * @since   1.4.4
 * @uses    do_shortcode
 */
function shop_isle_shop_messages() {
	if ( ! is_checkout() ) {
		echo wp_kses_post( do_shortcode( '[woocommerce_messages]' ) );
	}
}

/**
 * Pagination on shop page
 * @since  1.0.0
 */
if ( ! function_exists( 'shop_isle_woocommerce_pagination' ) ) {
	function shop_isle_woocommerce_pagination() {
		if ( woocommerce_products_will_display() ) {	
			woocommerce_pagination();
		}
	}
}