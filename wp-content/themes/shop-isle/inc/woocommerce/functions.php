<?php
/**
 * General functions used to integrate this theme with WooCommerce.
 *
 */

add_image_size( 'shop_isle_cart_item_image_size', 58, 72, true );



/**
 * Before Content
 * Wraps all WooCommerce content in wrappers which match the theme markup
 * @since   1.0.0
 * @return  void
 */
if ( ! function_exists( 'shop_isle_before_content' ) ) {
	function shop_isle_before_content() {
		?>
		<div class="main">
	    	<?php
	}
}

/**
 * After Content
 * Closes the wrapping divs
 * @since   1.0.0
 * @return  void
 */
if ( ! function_exists( 'shop_isle_after_content' ) ) {
	function shop_isle_after_content() {
		?>
		</div><!-- .main -->

		<?php
	}
}

/**
 * Before Shop loop
 * @since   1.0.0
 * @return  void
 */
if ( ! function_exists( 'shop_isle_shop_page_wrapper' ) ) {
	function shop_isle_shop_page_wrapper() {
		?>
		<section class="module-small">
				<div class="container"> 
		<?php	
	}
}

/**
 * Before Product content
 * @since   1.0.0
 * @return  void
 */
function shop_isle_product_page_wrapper() {
	echo '<section class="module module-super-small">
			<div class="container product-main-content">';
}

/**
 * After Product content
 * Closes the wrapping div and section
 * @since   1.0.0
 * @return  void
 */
if ( ! function_exists( 'shop_isle_product_page_wrapper_end' ) ) {	
	function shop_isle_product_page_wrapper_end() {
		?>
			</div><!-- .container -->
		</section><!-- .module-small -->
			<?php	
	}
}

/**
 * After Shop loop
 * Closes the wrapping div and section
 * @since   1.0.0
 * @return  void
 */
if ( ! function_exists( 'shop_isle_shop_page_wrapper_end' ) ) {	
	function shop_isle_shop_page_wrapper_end() {
		?>
			</div><!-- .container -->
		</section><!-- .module-small -->
			<?php	
	}
}	

/**
 * Default loop columns on product archives
 * @return integer products per row
 * @since  1.0.0
 */
function storefront_loop_columns() {
	return apply_filters( 'storefront_loop_columns', 4 ); // 4 products per row
}

/**
 * Add 'woocommerce-active' class to the body tag
 * @param  array $classes
 * @return array $classes modified to include 'woocommerce-active' class
 */
function storefront_woocommerce_body_class( $classes ) {
	if ( is_woocommerce_activated() ) {
		$classes[] = 'woocommerce-active';
	}

	return $classes;
}

/**
 * Cart Fragments
 * Ensure cart contents update when products are added to the cart via AJAX
 * @param  array $fragments Fragments to refresh via AJAX
 * @return array            Fragments to refresh via AJAX
 */
if ( ! function_exists( 'storefront_cart_link_fragment' ) ) {
	function storefront_cart_link_fragment( $fragments ) {
		global $woocommerce;

		ob_start();

		storefront_cart_link();

		$fragments['a.cart-contents'] = ob_get_clean();

		return $fragments;
	}
}

/**
 * WooCommerce specific scripts & stylesheets
 * @since 1.0.0
 */
function storefront_woocommerce_scripts() {
	global $shop_isle_version;

	wp_enqueue_style( 'storefront-woocommerce-style1', get_template_directory_uri() . '/inc/woocommerce/css/woocommerce.css', array(), 'v3' );
}

/**
 * Related Products Args
 * @param  array $args related products args
 * @since 1.0.0
 * @return  array $args related products args
 */
function storefront_related_products_args( $args ) {
	$args = apply_filters( 'storefront_related_products_args', array(
		'posts_per_page' => 4,
		'columns'        => 4,
	) );

	return $args;
}

/**
 * Product gallery thumnail columns
 * @return integer number of columns
 * @since  1.0.0
 */
function storefront_thumbnail_columns() {
	return intval( apply_filters( 'storefront_product_thumbnail_columns', 4 ) );
}

/**
 * Products per page
 * @return integer number of products
 * @since  1.0.0
 */
function storefront_products_per_page() {
	return intval( apply_filters( 'storefront_products_per_page', 12 ) );
}

/**
 * Query WooCommerce Extension Activation.
 * @var  $extension main extension class name
 * @return boolean
 */
function is_woocommerce_extension_activated( $extension = 'WC_Bookings' ) {
	return class_exists( $extension ) ? true : false;
}

/**
 * Header for shop page
 * @since  1.0.0
 */
function shop_isle_header_shop_page( $page_title ) {

	$shop_isle_title = '';

	$shop_isle_header_image = get_header_image();
	if( !empty($shop_isle_header_image) ):
		$shop_isle_title = '<section class="module bg-dark" data-background="'.$shop_isle_header_image.'">';
	else:
		$shop_isle_title = '<section class="module bg-dark">';
	endif;

		$shop_isle_title .= '<div class="container">';

			$shop_isle_title .= '<div class="row">';

				$shop_isle_title .= '<div class="col-sm-6 col-sm-offset-3">';

					if( !empty($page_title) ):

						$shop_isle_title .= '<h1 class="module-title font-alt">'.$page_title.'</h1>';

					endif;

					$shop_isle_shop_id = get_option( 'woocommerce_shop_page_id' );

					if( !empty($shop_isle_shop_id) ):

						$shop_isle_page_description = get_post_meta($shop_isle_shop_id, 'shop_isle_page_description');

						if( !empty($shop_isle_page_description[0]) ):
							$shop_isle_title .= '<div class="module-subtitle font-serif mb-0">'.$shop_isle_page_description[0].'</div>';
						endif;

					endif;
				
				$shop_isle_title .= '</div>';

			$shop_isle_title .= '</div><!-- .row -->';

		$shop_isle_title .= '</div>';
	$shop_isle_title .= '</section>';

	return $shop_isle_title;
}

/**
 * New thumbnail size for cart page
 * @since  1.0.0
 */
function shop_isle_cart_item_thumbnail( $thumb, $cart_item, $cart_item_key ) {
	
	$product = get_product( $cart_item['product_id'] );
	return $product->get_image( 'shop_isle_cart_item_image_size' ); 
	
}


/**
 * Add meta box for page header description
 * @since  1.0.0
 */
function shop_isle_page_description_box() {
	add_meta_box('shop_isle_post_info', __('Header description','shop-isle'), 'shop_isle_page_description_box_callback', 'page', 'side', 'high');
}

/**
 * Add meta box for page header description - callback
 * @since  1.0.0
 */
function shop_isle_page_description_box_callback() {
	global $post;
	?>
	<fieldset>
		<div>
			<p>
				<label for="shop_isle_page_description"><?php _e('Description','shop-isle'); ?></label><br />
				<?php wp_editor( get_post_meta($post->ID, 'shop_isle_page_description', true), 'shop_isle_page_description' ); ?>
			</p>
		</div>
	</fieldset>
	<?php
}



/**
 * Add meta box for page header description - save meta box
 * @since  1.0.0
 */
function shop_isle_custom_add_save($postID){

	if($parent_id = wp_is_post_revision($postID))
	{
		$postID = $parent_id;
	}
	if (isset($_POST['shop_isle_page_description'])) {
		shop_isle_update_custom_meta($postID, $_POST['shop_isle_page_description'], 'shop_isle_page_description');
	}
}

/**
 * Add meta box for page header description - update meta box
 * @since  1.0.0
 */
function shop_isle_update_custom_meta($postID, $newvalue, $field_name) {
	// To create new meta
	if(!get_post_meta($postID, $field_name)){
		add_post_meta($postID, $field_name, $newvalue);
	}else{
	// or to update existing meta
		update_post_meta($postID, $field_name, $newvalue);
	}
}

/**
 * Products slider on single page product
 * @since  1.0.0
 */
function shop_isle_products_slider_on_single_page() {

	global $wp_customize;

	$shop_isle_products_slider_single_hide = get_theme_mod('shop_isle_products_slider_single_hide');

	if( isset($shop_isle_products_slider_single_hide) && $shop_isle_products_slider_single_hide != 1 ):
		echo '<hr class="divider-w">';
		echo '<section class="module module-small-bottom aya">';
	elseif ( isset( $wp_customize ) ):
		echo '<hr class="divider-w">';
		echo '<section class="module module-small-bottom shop_isle_hidden_if_not_customizer">';
	endif;

	if( ( isset($shop_isle_products_slider_single_hide) && $shop_isle_products_slider_single_hide != 1 ) || isset( $wp_customize ) ):

			echo '<div class="container">';

				$shop_isle_products_slider_title = get_theme_mod('shop_isle_products_slider_title',__( 'Exclusive products', 'shop-isle' ));
				$shop_isle_products_slider_subtitle = get_theme_mod('shop_isle_products_slider_subtitle',__( 'Special category of products', 'shop-isle' ));

				if( !empty($shop_isle_products_slider_title) || !empty($shop_isle_products_slider_subtitle) ):
					echo '<div class="row">';
						echo '<div class="col-sm-6 col-sm-offset-3">';
							if( !empty($shop_isle_products_slider_title) ):
								echo '<h2 class="module-title font-alt">'.$shop_isle_products_slider_title.'</h2>';
							endif;
							if( !empty($shop_isle_products_slider_subtitle) ):
								echo '<div class="module-subtitle font-serif">'.$shop_isle_products_slider_subtitle.'</div>';
							endif;
						echo '</div>';
					echo '</div><!-- .row -->';
				endif;

				$shop_isle_products_slider_category = get_theme_mod('shop_isle_products_slider_category');

				if( !empty($shop_isle_products_slider_category) && ($shop_isle_products_slider_category != '-') ):

					$shop_isle_products_slider_args = array( 'post_type' => 'product', 'posts_per_page' => 10, 'tax_query' => array(
						array(
							'taxonomy' => 'product_cat',
							'field'    => 'term_id',
							'terms'    => $shop_isle_products_slider_category,
						)
					));

					$shop_isle_products_slider_loop = new WP_Query( $shop_isle_products_slider_args );

					if( $shop_isle_products_slider_loop->have_posts() ):

							echo '<div class="row">';

								echo '<div class="owl-carousel text-center" data-items="5" data-pagination="false" data-navigation="false">';

									while ( $shop_isle_products_slider_loop->have_posts() ) :

										$shop_isle_products_slider_loop->the_post();

										echo '<div class="owl-item">';
											echo '<div class="col-sm-12">';
												echo '<div class="ex-product">';
													echo '<a href="'.get_permalink().'">' . woocommerce_get_product_thumbnail().'</a>';
													echo '<h4 class="shop-item-title font-alt"><a href="'.get_permalink().'">'.get_the_title().'</a></h4>';
													echo 'L12.00';
												echo '</div>';
											echo '</div>';
										echo '</div>';

									endwhile;

									wp_reset_postdata();
								echo '</div>';

							echo '</div>';

					endif;

				else:

					$shop_isle_products_slider_args = array( 'post_type' => 'product', 'posts_per_page' => 10);

					$shop_isle_products_slider_loop = new WP_Query( $shop_isle_products_slider_args );

					if( $shop_isle_products_slider_loop->have_posts() ):

							echo '<div class="row">';

								echo '<div class="owl-carousel text-center" data-items="5" data-pagination="false" data-navigation="false">';

									while ( $shop_isle_products_slider_loop->have_posts() ) :

										$shop_isle_products_slider_loop->the_post();

										echo '<div class="owl-item">';
											echo '<div class="col-sm-12">';
												echo '<div class="ex-product">';
													echo '<a href="'.get_permalink().'">' . woocommerce_get_product_thumbnail().'</a>';
													echo '<h4 class="shop-item-title font-alt"><a href="'.get_permalink().'">'.get_the_title().'</a></h4>';
													echo 'L12.00';
												echo '</div>';
											echo '</div>';
										echo '</div>';

									endwhile;

									wp_reset_postdata();
								echo '</div>';

							echo '</div>';

					endif;

				endif;

			echo '</div>';

		echo '</section>';

	endif;
}
