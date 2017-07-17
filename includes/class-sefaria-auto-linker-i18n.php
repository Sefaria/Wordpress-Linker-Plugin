<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://www.sefaria.org
 * @since      1.0.0
 *
 * @package    Sefaria_Auto_Linker
 * @subpackage Sefaria_Auto_Linker/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Sefaria_Auto_Linker
 * @subpackage Sefaria_Auto_Linker/includes
 * @author     Sefaria <hello@sefaria.org>
 */
class Sefaria_Auto_Linker_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'sefaria-auto-linker',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
