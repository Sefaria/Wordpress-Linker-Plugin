<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://www.sefaria.org
 * @since      1.0.0
 *
 * @package    Sefaria_Auto_Linker
 * @subpackage Sefaria_Auto_Linker/admin
 */



/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Sefaria_Auto_Linker
 * @subpackage Sefaria_Auto_Linker/admin
 * @author     Sefaria <hello@sefaria.org>
 */


class Sefaria_Auto_Linker_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/sefaria-auto-linker-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/sefaria-auto-linker-admin.js', array( 'jquery' ), $this->version, false );

	}
	
	public function register_setting() {
  
	// Add a General section
		add_settings_section(
			$this->option_name . '_general',
			__( 'General', 'sefaria-auto-linker' ),
			array( $this, $this->option_name . '_general_cb' ),
			$this->plugin_name
		);

	add_settings_field(
		$this->option_name . '_mode',
		__( 'Mode', 'sefaria-auto-linker' ),
		array( $this, $this->option_name . '_mode_cb' ),
		$this->plugin_name,
		$this->option_name . '_general',
		array( 'label_for' => $this->option_name . '_mode' )
	);
	
	register_setting( $this->plugin_name, $this->option_name . '_mode');

	}




	/**
	 * Render the text for the general section
	 *
	 * @since  1.0.0
	 */
	public function _general_cb() {
		echo '<p>' . __( 'Please change the settings accordingly.', 'sefaria-auto-linker' ) . '</p>';
	}




	/**
	 * Render the radio input field for position option
	 *
	 * @since  1.0.0
	 */
	public function _mode_cb() {
		$mode = get_option( $this->option_name . '_mode' );

		?>
			<fieldset>
				<label>
					<input type="radio" name="<?php echo $this->option_name . '_mode' ?>" id="<?php echo $this->option_name . '_mode' ?>" value="popup-hover" <?php checked( $mode, 'popup-hover' ); ?>>
					<?php _e( '<strong>popup-hover</strong>: when the user\'s mouse hovers over a reference, a popup with the textual content is displayed. A click on the reference goes to the content in Sefaria.', 'sefaria-auto-linker' ); ?>
				</label>
				<br>
				<label>
					<input type="radio" name="<?php echo $this->option_name . '_mode' ?>" value="popup-click" <?php checked( $mode, 'popup-click' ); ?>>
					<?php _e( '<strong>popup-click</strong>: when the the user clicks on a reference, a popup is displayed with the textual content. Within the popup is a link to Sefaria.', 'sefaria-auto-linker' ); ?>
				</label>
				<br>
				<label>
					<input type="radio" name="<?php echo $this->option_name . '_mode' ?>" value="link" <?php checked( $mode, 'link' ); ?>>
					<?php _e( '<strong>link</strong>: The references are turned into links, which open in a new browser tab when clicked. There is no popup with textual content.', 'sefaria-auto-linker' ); ?>
				</label>
			</fieldset>
		<?php
	}
	

	/**
	 * Add an options page under the Settings submenu
	 *
	 * @since  1.0.0
	 */
	public function add_options_page() {
	
		$this->plugin_screen_hook_suffix = add_options_page(
			__( 'Sefaria Auto Linker Settings', 'sefaria-auto-linker' ),
			__( 'Sefaria Auto Linker', 'sefaria-auto-linker' ),
			'manage_options',
			$this->plugin_name,
			array( $this, 'display_options_page' )
		);
	
	}

	/**
	 * Render the options page for plugin
	 *
	 * @since  1.0.0
	 */
	public function display_options_page() {
		include_once 'partials/sefaria-auto-linker-admin-display.php';
	}


}
