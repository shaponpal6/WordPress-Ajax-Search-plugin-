<?php

require_once plugin_dir_path(__DIR__) . 'includes/ais_actions_controller.php';

class ais_request_handler implements ais_actions_controller
{
    public function __construct($action)
    {
        $this->action = $action;
    }

    function ais_add_to_cart()
    {
        $product_id = $_REQUEST['product_id'];
        add_action('wp_loaded', function ($product_id) {
            $add_to_cart = WC()->cart->add_to_cart($product_id);
            return $add_to_cart;
        });
    }

    function ais_cart_total()
    {
        echo json_encode(array('cart_total' => WC()->cart->get_cart_contents_count()));
    }

    function ais_cart_contents(){
        $cart = array();
        $items = WC()->cart->get_cart();
        foreach ($items as $item => $values) {
            $_product = wc_get_product($values['data']->get_id());
            //product image
            $getProductDetail = wc_get_product($values['product_id']);
            $image = $getProductDetail->get_image(); // accepts 2 arguments ( size, attr )
            $price = get_post_meta($values['product_id'], '_price', true);
            $regular_price = get_post_meta($values['product_id'], '_regular_price', true);
            $sale_price = get_post_meta($values['product_id'], '_sale_price', true);
            $att = array(
                'title' => $_product->get_title(),
                'quantity' => $values['quantity'],
                'price' => $price,
                'item_total' => wc_price($values['quantity'] * $price),
                'regular_price' => wc_price($regular_price),
                'sale_price' => wc_price($sale_price),
                'image' => $image,
            );
            array_push($cart, $att);
        }
        echo json_encode(array(
            'cart_total' => WC()->cart->get_cart_contents_count(),
            'subtotal' => WC()->cart->get_cart_subtotal(),
            'total' => wc_price(WC()->cart->total),
            'shipping_cost' => WC()->cart->get_cart_shipping_total(),
            'cart_contents' => $cart,
        ));
    }

    function ais_subtotal(){
        add_action('wp_loaded', function () {
            $subtotal = WC()->cart->get_cart_subtotal();
            return $subtotal;
        });
    }

    function ais_total(){
        add_action('wp_loaded', function () {
            $total = WC()->cart->total;
            return $total;
        });
    }

    function ais_professor(){
        $models = array('posts', 'pages', 'products', 'tags', 'master');
        $api = isset($_POST['ais_api']) && $_POST['ais_api'] != '' ? $_POST['ais_api'] : '';
        $session = isset($_POST['ais_session']) && $_POST['ais_session'] != '' ? $_POST['ais_session'] : '';
        $ip = isset($_POST['ais_ip']) && $_POST['ais_ip'] != '' ? $_POST['ais_ip'] : '';
        $secret_key = isset($_POST['ais_secret_key']) && $_POST['ais_secret_key'] != '' ? $_POST['ais_secret_key'] : '';

//        if (in_array($api , $models)){
//            $feature = new ais_bot_features();
////            echo $feature->$api();
//            echo json_encode(array(
//                'data' => $feature->$api(),
//                'api'  => $api,
//                'seasion'=> $session,
//                'ip' => $ip,
//                'secret_key' => $secret_key,
//                'status' => 300
//
//            ));
//
//        }else{
//            echo json_encode(array(
//                'data' => '',
//                'api'  => $api,
//                'seasion'=> $session,
//                'ip' => $ip,
//                'secret_key' => $secret_key,
//                'status' => 300
//            ));
//        }

        if (in_array($api , $models)){
            $feature = new ais_bot_features();
            $posts = $feature->$api();
        }else{
            $posts = array();
        }
//        $feature = new ais_bot_features();
//        $posts = $feature->post();
//        $ac = $_POST['api'];

        return json_encode(array(
            'cart_total' => WC()->cart->get_cart_contents_count(),
            'subtotal' => WC()->cart->get_cart_subtotal(),
            'total' => wc_price(WC()->cart->total),
            'shipping_cost' => WC()->cart->get_cart_shipping_total(),
            'post' => $_POST,
            'data' => $posts,
            'api'  => $api,
            'seasion'=> $session,
            'ip' => $ip,
            'secret_key' => $secret_key,
            'status' => 'ok'
        ));
    }

    // Install Bot
    function ais_bot_install(){
        $models = array('ais_site_config', 'ais_bot_init', 'ais_bot_active', 'ais_bot_settings','ais_get_bot','ais_get_bot_config');
        $api = isset($_POST['ais_api']) && $_POST['ais_api'] != '' ? $_POST['ais_api'] : '';
        $data = isset($_POST['requestData']) && $_POST['requestData'] != '' ? $_POST['requestData'] : '';
        $data = str_replace('u00a0', '', str_replace('\\', '', $data));
        if (in_array($api , $models)){
            $feature = new ais_bot_install();
            $setup = $feature->$api($data);
        }else{
            $setup = "Your request not correct!!";
        }

        return json_encode(array(
            'post' => $_POST,
            'data' => $setup,
            'status' => 1
        ));
    }

    // ais_bot_create
    function ais_bot_manager(){
        $models = array('ais_bot_create', 'ais_bot_update', 'ais_bot_delete', 'ais_bot_get','ais_bot_list','ais_get_bot_settings');
        $api = isset($_POST['ais_api']) && $_POST['ais_api'] != '' ? $_POST['ais_api'] : '';
        $requestData = isset($_POST['requestData']) && $_POST['requestData'] != '' ? $_POST['requestData'] : '';
        $data = str_replace('u00a0', '', str_replace('\\', '', $requestData));
        if (in_array($api , $models)){
            $feature = new ais_bot_manager();
            $result = $feature->$api($data);
        }else{
            $result = array();
        }

        return json_encode($result);
    }
}

$data = '{"aisb_8":"8","aisb_9":"9","aisb_7":"7","aisb_10":"10"}';
//$data = '{ "botName": "AIS Bot 2", "botDesc": "AIS Bot 2 desc", "botType": "2", "ais_terms_condition": 0 }';
//$data = '{\"botName\":\"AIS Search Bot one\",\"botDesc\":\"AIS Search Bot1 Desc\",\"botType\":\"2\"}';
$data = str_replace('u00a0', '', str_replace('\\', '', $data));
//require_once plugin_dir_path( __DIR__) . 'app/ais_bot_install.php';
$feature = new ais_bot_manager();
//print_r($feature->ais_get_bot_settings($data));
//$feature = new ais_bot_install();
//print_r($feature->ais_get_bot_config($data));

