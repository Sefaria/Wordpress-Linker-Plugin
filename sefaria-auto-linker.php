<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://www.sefaria.org
 * @since             1.0.0
 * @package           Sefaria_Auto_Linker
 *
 * @wordpress-plugin
 * Plugin Name:       Sefaria Auto Linker
 * Plugin URI:        http://www.sefaria.org
 * Description:       The Sefaria auto linker recognizes references on a web page, links them to the corresponding texts on Sefaria, and optionally provides a popup containing the text of the references.
 * Version:           1.0.0
 * Author:            Sefaria
 * Author URI:        http://www.sefaria.org
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       sefaria-auto-linker
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-sefaria-auto-linker-activator.php
 */
function activate_sefaria_auto_linker() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-sefaria-auto-linker-activator.php';
	Sefaria_Auto_Linker_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-sefaria-auto-linker-deactivator.php
 */
function deactivate_sefaria_auto_linker() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-sefaria-auto-linker-deactivator.php';
	Sefaria_Auto_Linker_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_sefaria_auto_linker' );
register_deactivation_hook( __FILE__, 'deactivate_sefaria_auto_linker' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-sefaria-auto-linker.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_sefaria_auto_linker() {

	$plugin = new Sefaria_Auto_Linker();
	$plugin->run();

}
run_sefaria_auto_linker();
