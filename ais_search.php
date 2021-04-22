<?php
/**
 * WordPress Ajax Process Execution
 *
 * @package WordPress
 * @subpackage Administration
 *
 * @link https://codex.wordpress.org/AJAX_in_Plugins
 */

/**
 * Preparing Ajax process.
 *
 * @since 1.0
 */
define( 'DOING_AJAX', true );

if (!isset( $_POST['action'])) {
//    die('-1');
//    print_r($_POST);
    die('Bad Request');
}
/** Load WordPress Bootstrap */
//require_once( dirname( dirname( __FILE__ ) ) . '/wp-load.php' );
require_once('../../../wp-load.php');

// Require an action parameter
if ( empty( $_REQUEST['action'] ) ) {
    wp_die( '0', 400 );
}

//Typical headers
//@header( 'Content-Type: application/json; charset=' . get_option( 'blog_charset' ) );
@header( 'Content-Type: application/text; charset=' . get_option( 'blog_charset' ) );
//@header( 'X-Robots-Tag: noindex' );

send_nosniff_header();
nocache_headers();
//cache_javascript_headers();


$action = isset($_POST['action']) ? esc_attr(trim($_POST['action'])) : '';
//echo $action;

//print_r(!empty($action));
//print_r(preg_match('/\bais\b/', $action));
//print_r(strpos($action, 'ais_')===0);

if (!empty($action) && strpos($action, 'ais_')===0){
    $handler = new ais_request_handler($action);
    $request_handler = array_intersect( get_class_methods($handler), get_class_methods('ais_actions_controller') );
    if (in_array($action, $request_handler)){
        echo $handler->$action();
//        echo json_encode(['action'=>$action]);
    }else{
        wp_die('{"status":"Action not Match"}');
    }
}else{
    wp_die('{"status":"Action not valid"}');
}


//add_action( 'wp_ajax_ais_ajax_request_handler', 'ais_ajax_request_handler' );
//add_action( 'wp_ajax_nopriv_ais_ajax_request_handler', 'ais_ajax_request_handler' );
//
//function ais_ajax_request_handler(){
//    $action = isset($_POST['action']) ? esc_attr(trim($_POST['action'])) : '';
//
//    if (!empty($action) && preg_match('/\bais\b/', $action)){
//        $handler = new ais_request_handler($action);
//        $request_handler = array_intersect( get_class_methods($handler), get_class_methods('ais_actions_controller') );
//        if (in_array($action, $request_handler)){
//            echo $handler->$action();
//        }else{
//            wp_die('{"status":"Action not Match"}');
//        }
//    }else{
//        wp_die('{"status":"Action not valid"}');
//    }
//
//}
//
//
//// do action
//if(is_user_logged_in()) {
//    print_r('---- 11---');
//    preg_match('/\bais\b/', $action) ? do_action('wp_ais_master_request', $action) : die('-1');
//}else{
////    print_r('---- 22---');
//    do_action('wp_nopriv_ais_master_request', $action);
////    preg_match('/\bais\b/', $action) ? do_action('wp_nopriv_ais_master_request', $action) : die('-1');
//    $handler = new ais_request_handler($action);
//    $request_handler = array_intersect( get_class_methods($handler), get_class_methods('ais_actions_controller') );
//
//    if (in_array($action, $request_handler)){
//        echo $handler->$action();
//    }else{
//        die('-1');
//    }
//}

////A bit of security
//$allowed_actions = WD_ASL_Ajax::getAll();
//WD_ASL_Ajax::registerAll(true);
//
//
//if(in_array($action, $allowed_actions)) {
//    if(is_user_logged_in())
//        do_action('ASL_'.$action);
//    else
//        do_action('ASL_nopriv_'.$action);
//} else {
//    die('-1');
//}