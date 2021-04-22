<?php

/**
 * Fired during plugin activation
 *
 * @link       https://wpartificial.com/
 * @since      1.0.0
 *
 * @package    Ais_bot
 * @subpackage Ais_bot/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Ais_bot
 * @subpackage Ais_bot/includes
 * @author     Shapon pal <shaponpal4@gmail.com>
 */
class ais_bot_activator
{

    /**
     * Short Description. (use period)
     *
     * Long Description.
     *
     * @since    1.0.0
     */
    public static function activate()
    {

//        print_r('Activated');
        $notOptions = wp_cache_get( 'notoptions', 'options' );
        if ( isset( $notOptions['ais_bot_version'] ) ) {
            add_option("ais_bot_version", "1.0");
        }else{
            update_option("ais_bot_version", "1.0");
        }
        if ( isset( $notOptions['ais_bot_status'] ) ) {
            add_option("ais_bot_status", "activated");
        }else{
            update_option("ais_bot_status", "activated");
        }

    }
}
