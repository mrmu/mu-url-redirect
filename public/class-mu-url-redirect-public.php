<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://audilu.com
 * @since      1.0.0
 *
 * @package    Mu_Url_Redirect
 * @subpackage Mu_Url_Redirect/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Mu_Url_Redirect
 * @subpackage Mu_Url_Redirect/public
 * @author     Audi Lu <mrmu@mrmu.com.tw>
 */
class Mu_Url_Redirect_Public {

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
		 * defined in mu-url-redirect_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The mu-url-redirect_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( 
			$this->plugin_name, 
			plugin_dir_url( __FILE__ ) . 'css/mu-url-redirect-public.css', 
			array(), 
			filemtime( (dirname( __FILE__ )) . '/css/mu-url-redirect-public.css' ),
			'all' 
		);

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
		 * defined in mu-url-redirect_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The mu-url-redirect_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( 
			$this->plugin_name, 
			plugin_dir_url( __FILE__ ) . 'js/mu-url-redirect-public.js', 
			array( 'jquery' ), 
			filemtime( (dirname( __FILE__ )) . '/js/mu-url-redirect-public.js' ),
			false 
		);

	}

	public function register_shortcodes() {
		add_shortcode( 'my_short_code', array($this, 'my_short_code_display') );
	}

	public function my_short_code_display() {
		if (!is_admin()) {
			ob_start();
			?>
			<!-- my_short_code: some HTML tags with a little bit PHP. -->
			<?php
			/* Load client template from theme dir first, load template file of 
			 * plugin/templates/ if client template is not exist.	
			 */		
			// if ( $overridden_template = locate_template( 'my-template.php' ) ) {
			// 	load_template( $overridden_template );
			// } else {
			// 	load_template( dirname(dirname( __FILE__ )) . '/templates/my-template.php' );
			// }
			$results = ob_get_clean();
			return $results;
		}
	}
}
