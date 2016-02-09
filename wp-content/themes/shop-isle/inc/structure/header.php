<?php
/**
 * Template functions used for the site header.
 *
 * @package storefront
 */


if ( ! function_exists( 'storefront_site_branding' ) ) {
	/**
	 * Display Site Branding
	 * @since  1.0.0
	 * @return void
	 */
	function storefront_site_branding() {
		if ( function_exists( 'jetpack_has_site_logo' ) && jetpack_has_site_logo() ) {
			jetpack_the_site_logo();
		} else { ?>
			<div class="site-branding">
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php if ( '' != get_bloginfo( 'description' ) ) { ?>
					<p class="site-description"><?php echo bloginfo( 'description' ); ?></p>
				<?php } ?>
			</div>
		<?php }
	}
}

if ( ! function_exists( 'shop_isle_primary_navigation' ) ) {
	/**
	 * Display Primary Navigation
	 * @since  1.0.0
	 * @return void
	 */
	function shop_isle_primary_navigation() {

		global $wp_customize;

		?>
		<!-- Navigation start -->
		<nav class="navbar navbar-custom navbar-transparent navbar-fixed-top" role="navigation">

			<div class="container">

				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#custom-collapse">
						<span class="sr-only"><?php _e('Toggle navigation','shop-isle'); ?></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<?php

						$shop_isle_logo = get_theme_mod('shop_isle_logo');
						echo '<div class="shop_isle_header_title">';
						if( !empty($shop_isle_logo) ):
							echo '<a href="'.esc_url( home_url( '/' ) ).'" class="logo-image"><img src="'.$shop_isle_logo.'"></a>';
							if( isset( $wp_customize ) ):
								echo '<h1 class="site-title shop_isle_hidden_if_not_customizer""><a href="'.esc_url( home_url( '/' ) ).'" title="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'" rel="home">'.get_bloginfo( 'name' ).'</a></h1>';
								echo '<h2 class="site-description shop_isle_hidden_if_not_customizer"><a href="'.esc_url( home_url( '/' ) ).'" title="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'" rel="home">'.get_bloginfo( 'description' ).'</a></h2>';
							endif;
						else:
							if( isset( $wp_customize ) ):
								echo '
										<a href="'.esc_url( home_url( '/' ) ).'" class="logo-image shop_isle_hidden_if_not_customizer">
											<img src="">
										</a>
									';
							endif;							
							echo '<h1 class="site-title"><a href="'.esc_url( home_url( '/' ) ).'" title="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'" rel="home">'.get_bloginfo( 'name' ).'</a></h1>';
							echo '<h2 class="site-description"><a href="'.esc_url( home_url( '/' ) ).'" title="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'" rel="home">'.get_bloginfo( 'description' ).'</a></h2>';
						endif;
						echo '</div>';
					?>

				</div>

				<div class="collapse navbar-collapse" id="custom-collapse">

						<?php wp_nav_menu( array('theme_location' => 'primary', 'container' => false, 'menu_class' => 'nav navbar-nav navbar-right') ); ?>

				</div>

			</div>

		</nav>
		<!-- Navigation end -->
		<?php
	}
}

if ( ! function_exists( 'storefront_skip_links' ) ) {
	/**
	 * Skip links
	 * @since  1.4.1
	 * @return void
	 */
	function storefront_skip_links() {
		?>
		<a class="skip-link screen-reader-text" href="#site-navigation"><?php _e( 'Skip to navigation', 'storefront' ); ?></a>
		<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'storefront' ); ?></a>
		<?php
	}
}


