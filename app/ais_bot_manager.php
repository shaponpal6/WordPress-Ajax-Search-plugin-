<?php


class ais_bot_manager{

    /**
     * ais_bot_features constructor.
     */
    function __construct()
    {
        global $wpdb;
        $this->wpdb =& $wpdb;
        $this->prefix = $GLOBALS['wpdb']->prefix;
    }
    private function postMeta($pid='',$key='')
    {
        $pMeta = "SELECT * FROM `{$this->prefix}postmeta` WHERE `meta_key` = {$key} ORDER BY `meta_value` DESC";
        $postMetas = $GLOBALS['wpdb']->get_results($pMeta, object);
        return $postMetas;
    }

    function ais_bot_create2($obj){
        $post = json_decode($obj, true);
//        if (isset($post['post_id']) && $post['post_id'] !='') return ais_bot_update($obj);
        $table = $this->prefix.'ais_search';
        $bot = array (
            'ais_name' => wp_strip_all_tags($post['botName']),
            'ais_key' => 'ais_search_bot',
            'ais_status' => 1
        );
        $this->wpdb->insert($table, $bot, array( '%s', '%s', '%s'));
        return array('status'=>'ok', 'data' => $post);
    }
    function ais_bot_create($obj){
        $post = json_decode($obj, true);
//        if (isset($post['post_id']) && $post['post_id'] !='') return ais_bot_update($obj);
        $table = $this->prefix.'posts';
        $aid = get_option( 'ais_search_no' );
//        echo '<pre>';
        if (!$aid){
            $sql = "SELECT MAX(`post_parent`) as id FROM {$table} WHERE `post_type` ='ais_search_bot' ORDER BY `post_parent` DESC";
            $getId = $this->wpdb->get_row($sql, object);
            $aid = $getId->id;
        }else{
            $sql = "SELECT MAX(`option_value`) as id FROM {$this->wpdb->options} WHERE option_name ='ais_search_no' ";
            $getId = $this->wpdb->get_row($sql, object);
            $aid = $getId->id;
        }
        $bot = array (
            'post_title' => wp_strip_all_tags($post['botName']),
            'post_name' => str_replace(' ', '_', strtolower(wp_strip_all_tags($post['botName']))),
            'post_type' => 'ais_search_bot',
            'post_parent' => $aid+1,
            'post_author' => 1,
            'post_date' => date('Y-m-d H:i:s'),
            'post_status' => 'private',
            'comment_status' => 'closed',
            'ping_status' => 'closed',
        );
        $this->wpdb->insert($table, $bot, array( '%s', '%s', '%s'));
//        add_option( 'ais_search_no', $aid + 1, '', 'yes' );
        if ( get_option( 'ais_search_no' ) !== false ) {
            update_option( 'ais_search_no', $aid+1 );
        } else {
            add_option( 'ais_search_no', $aid+1, null, 'no' );
        }
        add_option( "wpartificial_sb_".($aid+1), $aid+1, null, 'no' );
        return array('status'=>'ok', 'data' => $post);
    }

    function ais_bot_update($obj){
        $post = json_decode($obj, true);
        $post['post_id'] = 97;
        if (!isset($post['post_id']) && $post['post_id'] =='') return 0;
        $post_id = wp_update_post(array (
            'ID' => $post['post_id'],
            'post_type' => 'ais_search_bot',
            'post_title' => wp_strip_all_tags($post['botName']),
            'post_content' => $post['botDesc'],
            'post_status' => 'private',
            'comment_status' => 'closed',
            'ping_status' => 'closed',
        ));

        return array('status'=>'ok', 'data' => $post_id);
    }

    function ais_bot_get($obj){
        $post = json_decode($obj, true);
        $post['post_id'] = 97;
        if (!isset($post['post_id']) && $post['post_id'] =='') return 0;
        $data = get_post($post['post_id']);

        return  !empty($data) ? $data  : 0;
    }

    function ais_bot_delete($obj){
        $post = json_decode($obj, true);
        $post['post_id'] = 97;
        if (!isset($post['post_id']) && $post['post_id'] =='') return 0;

        $data = wp_delete_post($post['post_id']);

        return  !empty($data) ? $data  : 0;
    }
    function ais_bot_list($obj){
        $table = $this->prefix.'posts';
        $sql = "SELECT `ID`,`post_title`,`post_parent`,`post_name` FROM {$table} WHERE `post_type` ='ais_search_bot' ORDER BY `post_parent` DESC";
        $data = $this->wpdb->get_results($sql, object);

        return  array('status'=>'ok', 'data'=>$data);
    }
    function ais_get_bot_settings($obj){
        $configs = array();
        $data = json_decode($obj, true);
        $ids = array_keys($data);
//        echo '<pre>';
//        var_dump($obj);
//        print_r($data);
//        print_r($ids);
        $table = $this->prefix.'options';
        $sql = "SELECT `option_name`, `option_value` FROM {$table} WHERE `option_name` IN('".implode("','",$ids)."')";
        $results = $this->wpdb->get_results($sql, ARRAY_A);
//        print_r($results);
        foreach ($results as $result){
            $option = unserialize($result['option_value']);
            $configs[$result['option_name']] = json_encode(unserialize($option));
        }

        return  array('status'=>1, 'data'=>json_encode($configs));
    }



}