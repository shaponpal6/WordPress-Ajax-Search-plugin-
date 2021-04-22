<?php


class ais_bot_api extends WP_REST_Posts_Controller
{

    /**
     * The namespace.
     *
     * @var string
     */
    protected $namespace;

    /**
     * The post type for the current object.
     *
     * @var string
     */
    protected $post_type;

    /**
     * Rest base for the current object.
     *
     * @var string
     */
    protected $rest_base;


    /**
     * Register the routes for the objects of the controller.
     * Nearly the same as WP_REST_Posts_Controller::register_routes(), but with a
     * custom permission callback.
     */
    public function register_routes()
    {
        return register_rest_route($this->namespace, '/' . $this->rest_base, array(
            array(
                'methods' => WP_REST_Server::READABLE,
                'callback' => array($this, 'aisb_get_data'),
                'permission_callback' => array($this, 'aisb_permissions_check'),
                'args' => $this->get_collection_params(),
                'show_in_index' => true,
            ),
            'schema' => array($this, 'aisb_public_item_schema'),
        ));
    }

    /**
     * Rest get data for the current object.
     *
     * @parms array
     */
    protected function aisb_get_data($request){}

    /**
     * Rest get data permissions check for the current object.
     *
     * @parms array
     */
    protected function aisb_permissions_check($request){}

    /**
     * Rest get data schema for the current object.
     *
     * @parms array
     */
    protected function aisb_public_item_schema($request){}

    /**
     * Check if a given request has access to get items
     *
     * @param WP_REST_Request $request Full data about the request.
     * @return WP_Error|bool
     */
//    public function get_items_permissions_check( $request ) {
//        return current_user_can( 'edit_posts' );
//    }


}