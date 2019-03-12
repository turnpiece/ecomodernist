<?php
/**
 * The template for the WooCommerce Menu (Login and Cart)
 *
 * @package Ecomodernist
 * @since Ecomodernist 1.2
 * @version 1.0.1
 */
?>

<div class="shop-menu">
	<?php if ( is_user_logged_in() ) { ?>
		<a class="account-btn" href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php esc_html_e('Account','ecomodernist'); ?>"><span class="btn-text"><?php esc_html_e('Account','ecomodernist'); ?></span></a>
	<?php }
	else { ?>
		<a class="account-btn" href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php esc_html_e('Login / Register','ecomodernist'); ?>"><span class="btn-text"><?php esc_html_e('Login / Register','ecomodernist'); ?></span></a>
	<?php } ?>

	<button class="cart-offcanvas-open"><?php esc_html_e('Cart open', 'ecomodernist') ?></button>
	<a class="cart-btn" href="<?php echo wc_get_cart_url(); ?>" title="<?php esc_html_e( 'View cart', 'ecomodernist' ); ?>">
		<span class="btn-text"><?php esc_html_e('Cart', 'ecomodernist') ?></span>
		<span class="cart-count"><?php echo sprintf ( esc_html__('%d', 'ecomodernist'), WC()->cart->cart_contents_count ); ?></span>
	</a><!-- end .cart-btn -->

	<div class="cart-offcanvas">
		<button class="cart-close"><span><?php esc_html_e('Close cart', 'ecomodernist') ?></span></button>
			<h2 class="offcanvas-cart-title"><?php esc_html_e('Shopping cart', 'ecomodernist') ?></h2>
		<?php the_widget( 'WC_Widget_Cart', 'title=' ); ?>
	</div><!-- end .cart-dropdown -->
</div><!-- end .shop-menu -->
