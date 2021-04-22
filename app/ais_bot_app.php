<?php


class ais_bot_app extends WP_REST_Controller {


    public function get_items_permissions_check($request) {
        return true;
    }

    public function session_validation($session){
        return false;
    }

    public function posts(){
        return 'From Posts';
    }

    public function get_items($request) {
        $all_type = array('posts','pages','tags','master','author','products','post');

        $type = in_array($request['type'],$all_type)?$request['type']:'';
        $key = $request['key']=='018'?$request['key']:'';
        $session = preg_match('/^\d{23}$/', $request['session'])?$request['session']:'';

//        print_r($request);
//        print_r($type);
//        print_r($key);
//        print_r($session);

        if ( empty($type) || empty($key) || $this->session_validation($session)) {

            return new WP_Error( 'empty_category', 'there is no post in this category', array( 'status' => 404 ) );
        }else{
            $aisb = new ais_bot_features();
            $features = $aisb->$type();
        }
        return new WP_REST_Response($features, 200);
    }

    public function register_routes() {
        $namespace = 'aisbot/v1';
        $path = '(?P<type>\w+)/(?P<key>\d+)/(?P<session>\d+)';

        register_rest_route( $namespace, '/' . $path, [
            array(
                'methods'             => 'GET',
                'callback'            => array( $this, 'get_items' ),
                'permission_callback' => array( $this, 'get_items_permissions_check' )
            ),

        ]);
    }
}


add_action('rest_api_init', function () {
    $latest_posts_controller = new ais_bot_app();
    $latest_posts_controller->register_routes();
});