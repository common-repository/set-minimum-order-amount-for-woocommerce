<?php
/**
* core.php
*	Displaymessage on frontend using the 'Set Minimum Order Amount for Woocommerce' plugin
**/

/* Block direct access */
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

/* link function to woocommerce action */
add_action( 'woocommerce_checkout_process', 'smoafw_check_amount' );
add_action( 'woocommerce_before_cart' , 'smoafw_check_amount' );

function smoafw_check_amount() {
	/* get minimum value from the wc settings, if null make it zero allowing all orders */
	$smoafw_minimum = get_option( 'SMOAFW_order_amount', 0 );
	
	if ( WC()->cart->total < $smoafw_minimum ) {
		if( is_cart() ) {
				wc_print_notice( sprintf( __( 'Attention, the minimum order amount is %s . Your current total is %s.' , 'set-minimum-order-amount-for-woocommerce' ), wc_price( $smoafw_minimum ), wc_price( WC()->cart->total ) ), 'error' );
		} else {
				wc_add_notice( sprintf( __( 'Attention, the minimum order amount is %s . Your current total is %s.' , 'set-minimum-order-amount-for-woocommerce' ), wc_price( $smoafw_minimum ), wc_price( WC()->cart->total ) ), 'error' );
		}
	}
}
?>