<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://wpartificial.com/
 * @since             1.0.0
 * @package           Ais_bot
 *
 * @wordpress-plugin
 * Plugin Name:       AI Search
 * Plugin URI:        https://aisearch.wpartificial.com
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Shapon pal
 * Author URI:        https://wpartificial.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       ais_bot
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'AIS_BOT_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-ais_bot-activator.php
 */
function activate_ais_bot() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/ais_bot_activator.php';
    ais_bot_activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-ais_bot-deactivator.php
 */
function deactivate_ais_bot() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/ais_bot_deActivator.php';
    ais_bot_deActivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_ais_bot' );
register_deactivation_hook( __FILE__, 'deactivate_ais_bot' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/Ais_bot.php';

//print_r(plugin_dir_url( __FILE__ ));


/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
//require plugin_dir_path( __FILE__ ) . 'ais_search.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_ais_bot() {

	$plugin = new Ais_bot();
	$plugin->run();

}
run_ais_bot();

//do_action('wp_ais_master_request', 'ais_cart_total');

/* Add a paragraph only to Pages. */
function my_added_page_content ( $content ) {
    if ( is_page() ) {
        return '<button id="ais_ajax">Ajax Test</button> <br/><p id="ais_ajax_result">  </p>' . $content;
    }
}
add_filter( 'the_content', 'my_added_page_content');

add_action( 'wp_ajax_my_action', 'my_action' );
add_action( 'wp_ajax_nopriv_my_action', 'my_action' );

function my_action(){
    print_r('This is ajax call');
    do_action('wp_ais_master_request', 'ais_cart_total');
}


// ---------------------------
// -----Post type


