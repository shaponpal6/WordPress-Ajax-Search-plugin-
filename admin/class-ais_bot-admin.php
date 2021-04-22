<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://wpartificial.com/
 * @since      1.0.0
 *
 * @package    Ais_bot
 * @subpackage Ais_bot/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Ais_bot
 * @subpackage Ais_bot/admin
 * @author     Shapon pal <shaponpal4@gmail.com>
 */
class Ais_bot_Admin {

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
		$this->load_dependencies();

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
		 * defined in Ais_bot_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ais_bot_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/ais-admin.min.css', array(), $this->version, 'all' );

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
		 * defined in Ais_bot_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ais_bot_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
        wp_enqueue_script('jquery');
        wp_localize_script( 'jquery', 'aisb_root', array(
                'ajaxurl'       => admin_url( 'admin-ajax.php' ),
                'custom_ajax_url'       => plugins_url('ais_bot/ais_search.php') ,
                'nextNonce'     => wp_create_nonce( 'myajax-next-nonce' ),
                'siteurl' => get_option('siteurl'),
                'domain' => rtrim(get_option('siteurl'),'/').'/',
                'plugin_dir' => rtrim(plugin_dir_url(__FILE__), 'admin/') . '/',
                'upload_path' => rtrim(wp_upload_dir()['baseurl'],'/').'/',
                'key' => '018'
            )
        );



        //add_action('admin_footer', 'ais_admin_js');

        function ais_admin_js()
        { ?>

            <script src="<?php echo plugin_dir_url(__FILE__) . '../admin-html/js/libs/jquery-3.4.1.min.js';?>" type="text/javascript" charset="utf-8"></script>
            <script src="<?php echo plugin_dir_url(__FILE__) . '../admin-html/js/common.js';?>" type="text/javascript" charset="utf-8"></script>
            <script src="<?php echo plugin_dir_url(__FILE__) . '../admin-html/js/aisb_adminjs.js';?>" type="text/javascript" charset="utf-8"></script>
            <script src="<?php echo plugin_dir_url(__FILE__) . '../admin-html/js/config.js';?>" type="text/javascript" charset="utf-8"></script>

        <?php }




		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/ais-admin.min.js', array( 'jquery' ), $this->version, false );

	}

    /**
     * Load the required dependencies for this plugin.
     *
     * Include the following files that make up the plugin:
     *
     * - Ais_bot_Loader. Orchestrates the hooks of the plugin.
     * - Ais_bot_i18n. Defines internationalization functionality.
     * - Ais_bot_Admin. Defines all hooks for the admin area.
     * - Ais_bot_Public. Defines all hooks for the public side of the site.
     *
     * Create an instance of the loader which will be used to register the hooks
     * with WordPress.
     *
     * @since    1.0.0
     * @access   private
     */
    private function load_dependencies() {

        /**
         * The class responsible for orchestrating the actions and filters of the
         * core plugin.
         */
        require_once  'ais_bot_settings.php';
        require_once  'partials/ais_settings.php';
        require_once  'partials/ais_intro.php';
        require_once  'partials/ais_docs.php';
        require_once  'partials/ais_actions.php';

    }

}
