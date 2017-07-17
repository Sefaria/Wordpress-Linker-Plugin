<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://www.sefaria.org
 * @since      1.0.0
 *
 * @package    Sefaria_Auto_Linker
 * @subpackage Sefaria_Auto_Linker/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Sefaria_Auto_Linker
 * @subpackage Sefaria_Auto_Linker/public
 * @author     Sefaria <hello@sefaria.org>
 */
class Sefaria_Auto_Linker_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Sefaria_Auto_Linker_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Sefaria_Auto_Linker_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/sefaria-auto-linker-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Sefaria_Auto_Linker_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Sefaria_Auto_Linker_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_enqueue_script( 'sefaria', esc_url_raw( 'https://sefaria.org/linker.js' ), array('jquery'), null, true );
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/sefaria-auto-linker-public.js', array( 'jquery' ), $this->version, true );


		wp_localize_script($this->plugin_name, 'scriptOptions', array(
				'linkerMode' => get_option( $this->option_name . '_mode', 'popup-hover' ),
			)
		);

	}

}
