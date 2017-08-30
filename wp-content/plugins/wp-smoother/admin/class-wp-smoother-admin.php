<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://harryrobinsondev.com
 * @since      1.0.0
 *
 * @package    Wp_Smoother
 * @subpackage Wp_Smoother/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wp_Smoother
 * @subpackage Wp_Smoother/admin
 * @author     Harry Robinson <harry.robo14@yahoo.co.uk>
 */
class Wp_Smoother_Admin {

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
		 * defined in Wp_Smoother_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Smoother_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wp-smoother-admin.css', array(), $this->version, 'all' );

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
		 * defined in Wp_Smoother_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Smoother_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wp-smoother-admin.js', array( 'jquery' ), $this->version, false );

	}
/**
*
* admin/class-wp-cbf-admin.php - Don't add this
*
**/

/**
 * Register the administration menu for this plugin into the WordPress Dashboard menu.
 *
 * @since    1.0.0
 */

public function add_plugin_admin_menu() {

    /*
     * Add a settings page for this plugin to the Settings menu.
     *
     * NOTE:  Alternative menu locations are available via WordPress administration menu functions.
     *
     *        Administration Menus: http://codex.wordpress.org/Administration_Menus
     *
     */
    add_options_page( 'WP Smoother Settings', 'WP Smoother', 'manage_options', $this->plugin_name, array($this, 'display_plugin_setup_page')
    );
}

 /**
 * Add settings action link to the plugins page.
 *
 * @since    1.0.0
 */

public function add_action_links( $links ) {
    /*
    *  Documentation : https://codex.wordpress.org/Plugin_API/Filter_Reference/plugin_action_links_(plugin_file_name)
    */
   $settings_link = array(
    '<a href="' . admin_url( 'options-general.php?page=' . $this->plugin_name ) . '">' . __('Settings', $this->plugin_name) . '</a>',
   );
   return array_merge(  $settings_link, $links );

}

/**
 * Render the settings page for this plugin.
 *
 * @since    1.0.0
 */

public function display_plugin_setup_page() {
    include_once( 'partials/wp-smoother-admin-display.php' );
}

public function validate($input) {
    // All checkboxes inputs        
    $valid = array();

    //Cleanup
    //  $valid['cleanup'] = (isset($input['cleanup']) && !empty($input['cleanup'])) ? 1 : 0;
      $valid['wpsmoother_activate_fade'] = (isset($input['wpsmoother_activate_fade']) && !empty($input['wpsmoother_activate_fade'])) ? 1 : 0;
      $valid['wpsmoother_fade_home'] = (isset($input['wpsmoother_fade_home']) && !empty($input['wpsmoother_fade_home'])) ? 1 : 0;
      $valid['wpsmoother_activate_mouse_scroll'] = (isset($input['wpsmoother_activate_mouse_scroll']) && !empty($input['wpsmoother_activate_mouse_scroll'])) ? 1 : 0;
      $valid['wpsmoother_activate_click_scroll'] = (isset($input['wpsmoother_activate_click_scroll']) && !empty($input['wpsmoother_activate_click_scroll'])) ? 1 : 0;
      $valid['wpsmoother_fade_duration'] = preg_replace('/[^0-9.]/', '', $input['wpsmoother_fade_duration']);
      $valid['wpsmoother_mouse_distance'] = preg_replace('/[^0-9.]/', '', $input['wpsmoother_mouse_distance']);
      $valid['wpsmoother_mouse_speed'] = preg_replace('/[^0-9.]/', '', $input['wpsmoother_mouse_speed']);
      $valid['wpsmoother_anchor_speed'] = preg_replace('/[^0-9.]/', '', $input['wpsmoother_anchor_speed']);      
    return $valid;
 }
 public function options_update() {
    register_setting($this->plugin_name, $this->plugin_name, array($this, 'validate'));
 }
        
        
        

        
        
        
        
        
        
        
}
