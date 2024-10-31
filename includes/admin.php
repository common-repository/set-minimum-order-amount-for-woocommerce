<?php
/**
* admin.php
*	Woocommerce options page for 'Set Minimum Order Amount for Woocommerce'
**/

/* Block direct access */
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

/* Settings menu in Woocommerce */
function smoafw_minimum_order_setting( $settings ) {
	$updated_settings = array();
	foreach ( $settings as $section ) {
	/* at the bottom of the General Options section */
    if ( isset( $section['id'] ) && 'general_options' == $section['id'] &&
		isset( $section['type'] ) && 'sectionend' == $section['type'] ) {
			$updated_settings[] = array(
			'name'     => __( 'Minimum Order Amount', 'set-minimum-order-amount-for-woocommerce' ),
			'desc_tip' => __( 'Set the minimum allowed order amount, all cart checkouts below this value will be blocked. Set to 0 to allow all order amounts.', 'set-minimum-order-amount-for-woocommerce' ),
			'id'       => 'SMOAFW_order_amount',
			'type'     => 'number',
			'css'      => 'min-width:50px;',
			'std'      => '0',  // WC < 2.0
			'default'  => '0',  // WC >= 2.0
			'desc'     => __( 'Set the minimum allowed order amount.', 'set-minimum-order-amount-for-woocommerce' ),
			);
		}
		$updated_settings[] = $section;
	}
return $updated_settings;
}

/* Link function to woocommerce filter */
add_filter( 'woocommerce_general_settings', 'smoafw_minimum_order_setting' );

/* Settings link on Plugin page */
function smoafw_plugin_settings_link($links) {
	$settings_text = __( 'Settings', 'set-minimum-order-amount-for-woocommerce' ); 
	$settings_link = '<a href="admin.php?page=wc-settings">'.$settings_text.'</a>'; 
	array_unshift($links, $settings_link); 
	return $links; 
}
$plugin = SMOAFW_BASE; 
add_filter("plugin_action_links_$plugin", 'smoafw_plugin_settings_link' );
?>