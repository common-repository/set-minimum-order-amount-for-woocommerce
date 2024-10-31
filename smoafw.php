<?php
/**
* Plugin Name:			Set Minimum Order Amount for Woocommerce
* Plugin URI:			https://wordpress.org/plugins/set-minimum-order-amount-for-woocommerce/
* Description:			Set your custom Minimum Order Amount in the Woocommerce shop.
* Version:				2020.04.29
* Requires at least:	5.0
* Requires PHP:			7.0
* Author:				Olivier Willems
* Author URI:			http://willemso.com/
* Text Domain:			set-minimum-order-amount-for-woocommerce
* Domain Path:			/languages/
* License:				GPL v2 or later
* License URI:			http://www.gnu.org/licenses/gpl-2.0.txt
**/

/* Block direct access */
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

/* Paths to Files */
define('SMOAFW_DIR', plugin_dir_path(__FILE__));
define('SMOAFW_DIR_URL', plugin_dir_url(__FILE__));
define('SMOAFW_BASE', plugin_basename(__FILE__));
define('SMOAFW_BASENAME', basename( dirname( __FILE__ ) ));

/* Function: Pre-load translation files */
function smoafw_load_plugin_textdomain() {
	load_plugin_textdomain( 'set-minimum-order-amount-for-woocommerce', false, SMOAFW_BASENAME . '/languages/' );
}

/* Function: Load Plugin files */
function smoafw_load_plugin(){
	/* Load translation */
	add_action( 'plugins_loaded', 'smoafw_load_plugin_textdomain' );

	/* Load Admin Files Only in Backend*/
	if( is_admin() )
		require_once(SMOAFW_DIR.'includes/admin.php');
	
	/* Load Frontend message */
	require_once(SMOAFW_DIR.'includes/core.php');
}

/* Let´s do this! */
smoafw_load_plugin();
?>