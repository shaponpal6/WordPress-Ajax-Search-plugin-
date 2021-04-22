<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://wpartificial.com/
 * @since      1.0.0
 *
 * @package    Ais_bot
 * @subpackage Ais_bot/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Ais_bot
 * @subpackage Ais_bot/includes
 * @author     Shapon pal <shaponpal4@gmail.com>
 */
class ais_bot_deActivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
        $notOptions = wp_cache_get( 'notoptions', 'options' );
        if ( isset( $notOptions['ais_bot_status'] ) ) {
            add_option("ais_bot_status", "deactivated");
        }else{
            update_option("ais_bot_status", "deactivated");
        }
	}

}
