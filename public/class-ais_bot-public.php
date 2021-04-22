<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://wpartificial.com/
 * @since      1.0.0
 *
 * @package    Ais_bot
 * @subpackage Ais_bot/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Ais_bot
 * @subpackage Ais_bot/public
 * @author     Shapon pal <shaponpal4@gmail.com>
 */
class Ais_bot_Public
{

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $plugin_name The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $version The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @param string $plugin_name The name of the plugin.
     * @param string $version The version of this plugin.
     * @since    1.0.0
     */
    public function __construct($plugin_name, $version)
    {

        $this->plugin_name = $plugin_name;
        $this->version = $version;

    }

    /**
     * Register the stylesheets for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_styles()
    {

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
//        wp_enqueue_style( 'wpartificial_sb', plugin_dir_url(__FILE__) . 'css/search.css',false,'1.0','all');


//        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/search.css', array(), $this->version, 'all');


        function hook_css() {
            ?>
            <style>
                .wp_head_example {
                    background-color : #f1f1f1;
                }
            </style>
            <link rel="stylesheet" type="text/css" media="screen" href="<?php echo plugin_dir_url(__FILE__) . '../html/css/search.css';?>">
            <?php
        }
        add_action('wp_head', 'hook_css');
    }

    /**
     * Register the JavaScript for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts()
    {

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



//        $suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? : '.min';
//        wp_deregister_script( 'jquery-cookie' );
//        wp_register_script( 'jquery-cookie', plugin_dir_url( __FILE__ ) .'js/jquery.cookie.min.js', array( 'jquery' ), '1.3.1', true );

        wp_enqueue_script('jquery');
        wp_localize_script( 'jquery', 'aisb_root', array(
                'ajaxurl'       => admin_url( 'admin-ajax.php' ),
                'custom_ajax_url'       => plugins_url('ais_bot/ais_search.php') ,
                'nextNonce'     => wp_create_nonce( 'myajax-next-nonce' ),
                'siteurl' => get_option('siteurl'),
                'domain' => rtrim(get_option('siteurl'),'/').'/',
                'plugin_dir' => rtrim(plugin_dir_url(__FILE__), 'public/') . '/',
                'upload_path' => rtrim(wp_upload_dir()['baseurl'],'/').'/',
                'key' => '018'
            )
        );

//        wp_enqueue_script( 'wpartificial_sb', plugin_dir_url( __FILE__ ) . 'js/wpartificial-search.min.js', array ( 'jquery' ), 1.0, true);

//        echo '<pre>';
//        print_r(rtrim(plugin_dir_url(__FILE__), 'public/') . '/');
//        print_r(wp_get_upload_dir());
//        print_r(rtrim(wp_upload_dir()['baseurl'],'/').'/');

//        wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wpartificial-search.min.js', array('jquery'), $this->version, false );







        wp_deregister_script('js-cookie');
        wp_dequeue_script('js-cookie');

        $suffix = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.min';

        wp_register_script('js-cookie', plugins_url('js_cookie' . $suffix . '.js', __FILE__), array(), '2.1.4', true);


        wp_localize_script('js-cookie', 'ais_bot', array('site_url' => get_option('siteurl'), 'ajax_url' => admin_url('admin-ajax.php')));

        add_action('wp_footer', 'so45956946_mailchimp_popup', PHP_INT_MAX);

        function so45956946_mailchimp_popup()
        { ?>

            <script src="<?php echo plugin_dir_url(__FILE__) . '../html/botjs/fuse.min.js';?>" type="text/javascript" charset="utf-8"></script>
            <script src="<?php echo plugin_dir_url(__FILE__).'../html/botjs/jsCookie.js';?>"></script>
            <script src="<?php echo plugin_dir_url(__FILE__).'../html/botjs/Aisb.js';?>"></script>
            <script src="<?php echo plugin_dir_url(__FILE__).'../html/botjs/elasticlunr.js';?>"></script>
            <script src="<?php echo plugin_dir_url(__FILE__).'../html/botjs/pagination.js';?>"></script>
            <script src="<?php echo plugin_dir_url(__FILE__).'../html/botjs/axios.min.js';?>"></script>
            <script src="<?php echo plugin_dir_url(__FILE__).'../html/botjs/common.js';?>"></script>
            <script src="<?php echo plugin_dir_url(__FILE__).'../html/botjs/eCommerce.js';?>"></script>
            <script src="<?php echo plugin_dir_url(__FILE__).'../html/botjs/help.js';?>"></script>
            <script src="<?php echo plugin_dir_url(__FILE__).'../html/botjs/knowledgeBase.js';?>"></script>
            <script src="<?php echo plugin_dir_url(__FILE__).'../html/botjs/customBot.js';?>"></script>
            <script src="<?php echo plugin_dir_url(__FILE__).'../html/botjs/actionBot.js';?>"></script>
            <script src="<?php echo plugin_dir_url(__FILE__).'../html/botjs/template.js';?>"></script>
            <script src="<?php echo plugin_dir_url(__FILE__).'../html/botjs/searchEngine.js';?>"></script>
            <script src="<?php echo plugin_dir_url(__FILE__).'../html/botjs/controller.js';?>"></script>
            <script src="<?php echo plugin_dir_url(__FILE__).'../html/botjs/searchBot.js';?>"></script>



<!--            <script type="text/javascript" src="--><?php //echo plugin_dir_url(__FILE__) . 'js/wpartificial-search.min.js'; ?><!--"></script>-->
            <script type="text/javascript" src="<?php echo plugin_dir_url(__FILE__) . 'js/test.js'; ?>"></script>
        <?php }




    }

    /**
     * Register the Request Handler for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function ais_master_request($action)
    {
//        new ais_request_handler($action);
        $handler = new ais_request_handler($action);
        $request_handler = array_intersect( get_class_methods($handler), get_class_methods('ais_actions_controller') );

        if (in_array($action, $request_handler)){
//            print_r('here.............');
            $handler->$action();
        }else{
            die('-1');
        }



//        return new ais_request_handler($action);

    }

}
