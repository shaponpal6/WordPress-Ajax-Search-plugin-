<?php


class ais_woocommerce
{
    /**
     * ais_bot_features constructor.
     */
    function __construct()
    {
        $this->is_woocommerce = $this->woocommerce();
        $this->get_action();


        // http://localhost/wp-content/plugins/ais_bot/app/ais_woocommerce.php
    }

    private function get_action(){
        $params = $_GET;
        if (!$this->is_woocommerce) die('Woocommrce Plugin Not Active');
        if (isset($_GET['ais_type']) && $_GET['ais_type'] == 'cart_total'){
            print_r($params);
            return $this->get_cart_count();
//            return $this->get_cart_contents();
        }else if (isset($_GET['ais_type']) && $_GET['ais_type'] == 'cart_contents'){
            print_r($params);
            return $this->get_cart_contents();
        }else if (isset($_GET['ais_type']) && $_GET['ais_type'] == 'subtotal'){
            print_r($params);
            return $this->subtotal();
        }else if (isset($_GET['ais_type']) && $_GET['ais_type'] == 'total'){
            print_r($params);
            return $this->total();
        }else if (isset($_GET['ais_type']) && $_GET['ais_type'] == 'add_to_cart'){
//            print_r($params);
            if ((isset($_GET['add-to-cart']) && $_GET['add-to-cart'] > 0) && (isset($_GET['post_type']) && $_GET['post_type'] == 'product'))
            return $this->add_to_cart($_GET['add-to-cart']);
        }else{
            print_r('No --------------Params');
        }
    }

    private function woocommerce(){
        if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
            return true;
        } else {
            return false;
        }
    }

    public function add_to_cart($product_id){
        add_action('wp_loaded', function ($product_id){
            $add_to_cart = WC()->cart->add_to_cart($product_id);
            print_r($add_to_cart);
            return $add_to_cart;
        });
    }

    public function subtotal(){
        add_action('wp_loaded', function (){
            $subtotal = WC()->cart->get_cart_subtotal();
            print_r($subtotal);
            return $subtotal;
        });
    }
    public function total(){
        add_action('wp_loaded', function (){
            $total = WC()->cart->total;
            print_r($total);
            return $total;
        });
    }

    public function get_cart_count(){
        add_action('wp_loaded', function (){
            $count = WC()->cart->get_cart_contents_count();
//            print_r( $count);
            return $count;
        });
    }

    public function get_cart_contents(){
        add_action('wp_loaded', function (){
            $cart = WC()->cart->get_cart();
//            print_r('<pre>');
            print_r($cart);
//            print_r('<pre>');
            return $cart;
        });


    }
}

if (!class_exists('ais_woocommerce')){
}
//new ais_woocommerce();
