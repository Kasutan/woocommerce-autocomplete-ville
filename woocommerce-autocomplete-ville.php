<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.kasutan.pro
 * @since             1.0.0
 * @package           Woocommerce_Autocomplete_Ville
 *
 * @wordpress-plugin
 * Plugin Name:       Autocomplete Ville pour Woocommerce
 * Plugin URI:        https://www.kasutan.pro
 * Description:       Autocomplète la ville à partir du code postal dans le formulaire de commande de WooCommerce. Ne fonctionne qu'avec un code postal français.
 * Version:           1.0.0
 * Author:            Magalie Castaing
 * Author URI:        https://www.kasutan.pro
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       woocommerce-autocomplete-ville
 * Domain Path:       /languages
 */

 
if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'wp_enqueue_scripts', 'woocommerce_autocomplete_ville_script_load' );

function woocommerce_autocomplete_ville_script_load(){
	if ( function_exists( 'is_woocommerce' ) ) {
		if ( is_checkout() ) {
			wp_enqueue_script( 'woocommerce-autocomplete-ville-script', plugin_dir_url( __FILE__ ) . '/woocommerce-autocomplete-ville.js', array( 'jquery' ) );
			wp_enqueue_style( 'woocommerce-autocomplete-ville-style', plugin_dir_url( __FILE__ ) . '/woocommerce-autocomplete-ville.css');
		}
	}
 
}