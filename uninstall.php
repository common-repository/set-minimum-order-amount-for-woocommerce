<?php
/**
* uninstall.php
*	remove plugin 'Set Minimum Order Amount for Woocommerce'
**/

/* Block direct access */
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

/* Check if we want to uninstall */
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

/* Delete Db settings for this plugin */
delete_option( 'SMOAFW_order_amount' );
?>