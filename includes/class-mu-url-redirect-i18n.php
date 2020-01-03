<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://audilu.com
 * @since      1.0.0
 *
 * @package    Mu_Url_Redirect
 * @subpackage Mu_Url_Redirect/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Mu_Url_Redirect
 * @subpackage Mu_Url_Redirect/includes
 * @author     Audi Lu <mrmu@mrmu.com.tw>
 */
class Mu_Url_Redirect_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'mu-url-redirect',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
