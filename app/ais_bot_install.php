<?php


class ais_bot_install{

    /**
     * ais_bot_features constructor.
     */
    function __construct()
    {
        global $wpdb;
        $this->wpdb =& $wpdb;
        $this->prefix = $GLOBALS['wpdb']->prefix;
    }

    //step 1
    function ais_site_config($obj){
        $options = json_decode($obj, true);
        $options['plugin_dir'] = plugin_dir_url(__FILE__);
        $options['domain'] = rtrim(get_site_url(), '/') . '/';
        $options['plugin_dir'] = rtrim(plugin_dir_url(__FILE__), 'app/') . '/';
        $data = serialize($options);
        $notOptions = wp_cache_get( 'notoptions', 'options' );
        if ( isset( $notOptions['ais_bot_configuration'] ) ) {
            // option does not exist
            add_option( 'ais_bot_configuration', $data, '', 'yes' );
            add_option( 'ais_reset', 0, '', 'yes' );
            return 1;
        } else {
            // option exists, $value is legit
            update_option('ais_bot_configuration', $data);
            return 1;
        }
    }

    // Step 2
    function ais_bot_init($obj){
//        global $wpdb;
       $this->ais_site_config($obj);
       // Create Table
        $table = $this->prefix.'ais_search';
        $charset_collate = $this->wpdb->get_charset_collate();
        $sql = "CREATE TABLE IF NOT EXISTS `{$table}` (
                      `ais_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
                      `ais_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                      `ais_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                      `ais_options` longtext COLLATE utf8mb4_unicode_ci,
                      `ais_status` int(10) UNSIGNED NOT NULL,
                      `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
                    ) ".$charset_collate;
        $create = $this->wpdb->query($sql);

        return $create;
    }
    // Step 3
    function ais_bot_active($obj){
        $options = json_decode($obj, true);

        if(get_option('ais_site_config') && get_option('aisb100')){
            $bot = get_option('ais_site_config');
            $bot1 = get_option('aisb100');
            $new_bot = unserialize($bot);
            $new_bot['aisb100'] = unserialize($bot1);
            $data = serialize($new_bot);

            if(get_option('aisConfig')){
                update_option('aisConfig', $data);
            }
            else {
                add_option( 'aisConfig', $data, '', 'yes' );
            }
            add_option( 'ais_reset', 1, '', 'yes' );
        }
        else {
            return 'Something was wrong';
        }

        return 1;
    }

    // Save settings
    //step 1
    function ais_bot_settings($obj){
        $options = json_decode($obj, true);
//        echo '<pre>';
//        var_dump($obj);
//        var_dump($options);
//        $options['plugin_dir'] = plugin_dir_url(__FILE__);
//        $options['domain'] = get_site_url();
//        var_dump($options);
        $data = serialize($options);

//        var_dump($data);
//        var_dump(unserialize($data));
        if(get_option('wpartificial_sb_'.$options['aisb_id']) !== false){
            update_option('wpartificial_sb_'.$options['aisb_id'], $data);
        }
        else {
            add_option( 'wpartificial_sb_'.$options['aisb_id'], $data, '', 'yes' );
        }

        return 1;
    }

    function ais_bot_create($obj){
        $jsonString =  str_replace('u00a0', '', str_replace('\\', '', $obj));
        $post = json_decode($jsonString, true);
        $data = array(
            'post_title'=>$post['botName'],
            'post_type'=>'ais_search_bot',
            'post_content'=>$post['botDesc'],
            'post_status' => 'private',
        );
        $this->wpdb->insert($this->prefix.'posts', $data, array('%s','%s','%s','%s' ));

        return $this->wpdb->insert_id;
    }
    function ais_get_bot($obj){
        $jsonString =  str_replace('u00a0', '', str_replace('\\', '', $obj));
        $post = json_decode($jsonString, true);
        $terms = "SELECT * FROM {$this->prefix}posts WHERE `post_type` ='ais_search_bot' ORDER BY `post_parent` DESC ";
        $bot = $this->wpdb->get_results($terms, object);

        return $bot;
    }
    function ais_get_bot_config($obj){
        $post = json_decode($obj, true);
        $name = "wpartificial_sb_". $post['botId'];
//        $name = "wpartificial_sb_8";
        $terms = "SELECT `option_value` FROM `cb_options` WHERE `option_name` = '{$name}' ";
        $bot = $this->wpdb->get_results($terms, object);
        $option = unserialize($bot[0]->option_value);
//        echo '<pre>';
//        var_dump($bot);
//        print_r($bot[0]->option_value);
//        echo '<br>';
//        print_r(json_encode(unserialize($option)));
//        echo '<br>';
//        print_r((unserialize($option)));
//        echo '<br>';
//        print_r(json_encode( unserialize( $bot[0]->option_value)));
//        die('die');
        return json_encode(unserialize($option));
    }

    public function post_types(){
        $sql = "SELECT DISTINCT( post_type ) FROM {$this->prefix}posts ";
        $post_types = $GLOBALS['wpdb']->get_results($sql, object);
        $pt_allow = array();
        // Remove _builtins or others
        $pt_remove = array("attachment","nav_menu_item","customize_changeset","revision","scheduled-action");
        if (!empty($post_types)) {
            foreach ( $post_types as $post_type) {
                if (in_array($post_type->post_type, $pt_remove)) continue;
                $pt_allow[] = $post_type->post_type;
            }
        }
        if (empty($pt_allow)) $pt_allow = array('post');
        return $pt_allow;
    }

    public function postContent($content, $count)
    {
        $text = strip_tags($content);
        return implode(' ', array_slice(str_word_count($text, 1), 0, $count));
    }

    private function get_term_name($term_id)
    {
        $term_name = $GLOBALS['wpdb']->get_row("SELECT name FROM {$GLOBALS['wpdb']->prefix}terms WHERE `term_id` = {$term_id}", ARRAY_N);
        return $term_name[0];
    }

    private function get_tags($pid)
    {
        $terms = "SELECT term.term_taxonomy_id FROM {$this->prefix}term_relationships term WHERE object_id = {$pid} ORDER BY object_id DESC ";
        $tags = $GLOBALS['wpdb']->get_results($terms, object);
        $term_key = array();
        if (!empty($tags)) {
            foreach ($tags as $tag) {
                $term_key[] = $this->get_term_name($tag->term_taxonomy_id);
            }
        }
        return $term_key;
    }

    private function postMeta($pid)
    {
        $pMeta = "SELECT meta_key, meta_value FROM `{$this->prefix}postmeta` WHERE `post_id` = {$pid} ORDER BY `meta_id` DESC";
        $postMetas = $GLOBALS['wpdb']->get_results($pMeta, object);
        return $postMetas;
    }

    public function postMetaValue($key, $postMeta){
//        print_r($postMeta); exit();
        foreach ($postMeta as $meta){
            if ($meta->meta_key == $key){
                return $meta->meta_value;
            }
        }
    }

    public function attachment($pid)
    {
        $attach = "select id, guid, post_mime_type from {$this->prefix}posts WHERE `post_parent`={$pid} AND `post_status`='inherit' AND `post_type`='attachment' ORDER BY ID DESC";
        $attachment = $GLOBALS['wpdb']->get_results($attach, object);

        if (isset($attachment[0]->id) && $attachment[0]->id > 0) {
            $img_sql = "SELECT `meta_value` FROM `{$this->prefix}postmeta` WHERE `post_id` = {$attachment[0]->id} AND `meta_key` = '_wp_attached_file' ORDER BY `post_id` ASC";
            $thumbnail = $GLOBALS['wpdb']->get_results($img_sql, object);
            //return $thumbnail;
//                    print_r($thumbnail->meta_value);
            if (isset($thumbnail[0]->meta_value) && $thumbnail[0]->meta_value != '') {
                return $thumbnail[0]->meta_value;
            } else {
                return ' a';
            }
        } else {
            return 's ';
        }

    }

    /**
     * @return array
     */
    public function posts()
    {
        $sql = "select id, post_title, post_content, post_type from {$this->prefix}posts WHERE `post_status`='publish' AND `post_type` NOT IN('nav_menu_item') ORDER BY ID DESC";
        $posts = $GLOBALS['wpdb']->get_results($sql, ARRAY_N);
        return $posts;
    }

    /**
     * @return array
     */
    public function post()
    {
        $sql = "select id, post_title, post_content, post_type from {$this->prefix}posts WHERE `post_status`='publish' AND `post_type`='post' ORDER BY ID DESC";
        $posts = $GLOBALS['wpdb']->get_results($sql, ARRAY_N);
        return $posts;
    }

    /**
     * @return array
     */
    public function pages()
    {
        $sql = "select id, post_title, post_content, post_type from {$this->prefix}posts WHERE `post_status`='publish' AND `post_type`='page' ORDER BY ID DESC";
        $posts = $GLOBALS['wpdb']->get_results($sql, ARRAY_N);
        return $posts;
    }

    /**
     * @return array
     */
    public function tags()
    {
        $sql = "select id, post_title, post_content, post_type from {$this->prefix}posts WHERE `post_status`='publish' AND `post_type`='publish' ORDER BY ID DESC";
        $posts = $this->attachment(21);
        return $posts;
    }

    /**
     * @return array
     */
    public function products(){
        $sql = "select id, post_title, post_content, post_type from {$this->prefix}posts WHERE `post_status`='publish' AND `post_type`='product' ORDER BY ID DESC";
        $products = $GLOBALS['wpdb']->get_results($sql, object);
        if (empty($products)) return 'No Product Found';
        $results = array();
        foreach ($products as $product) {
//            print_r($product->id); exit();
//            print_r($this->get_tags($product->id)); exit();
            $tags = implode(' ', $this->get_tags($product->id));
            $post = array(
                'id' => $product->id,
                'type' => $product->post_type,
                'post_title' => $product->post_title,
                'post_content' => $this->postContent($product->post_content, 100),
                'tags' => implode(', ', $this->get_tags($product->id)),
                'query_string' => $product->post_title . ' ' . $tags,
                'attachment' => $this->attachment($product->id)
            );
            if ($product->post_type == 'product'){
                $postMeta = $this->postMeta($product->id);
                $post['product'] = array(
                    'price' => $this->postMetaValue('_price',$postMeta),
                    'weight' => $this->postMetaValue('_weight',$postMeta),
                    'height' => $this->postMetaValue('_height',$postMeta),
                    'width' => $this->postMetaValue('_width',$postMeta),
                    'length' => $this->postMetaValue('_length',$postMeta),
                );
                //array_push($post, $productMeta);
            }
            $results[] = $post;
        }
        return $results;
    }


    /**
     * @return array
     */
    public function master(){
        $sql = "select id, post_title, post_content, post_type from {$this->prefix}posts WHERE `post_status`='publish' AND `post_type` IN('".implode("', '",$this->post_types())."') ORDER BY ID DESC";
        $products = $GLOBALS['wpdb']->get_results($sql, object);
        if (empty($products)) return '{"status":"No Product Found"}';
        $results = array();
        foreach ($products as $product) {
//            print_r($product->id); exit();
//            print_r($this->get_tags($product->id)); exit();
            $tags = implode(' ', $this->get_tags($product->id));
            $post = array(
                'id' => $product->id,
                'type' => $product->post_type,
                'post_title' => $product->post_title,
                'post_content' => $this->postContent($product->post_content, 100),
                'tags' => implode(', ', $this->get_tags($product->id)),
                'query_string' => $product->post_title . ' ' . $tags,
                'attachment' => $this->attachment($product->id)
            );
            if ($product->post_type == 'product'){
                $postMeta = $this->postMeta($product->id);
                $post['product'] = array(
                    'price' => $this->postMetaValue('_price',$postMeta),
                    'weight' => $this->postMetaValue('_weight',$postMeta),
                    'height' => $this->postMetaValue('_height',$postMeta),
                    'width' => $this->postMetaValue('_width',$postMeta),
                    'length' => $this->postMetaValue('_length',$postMeta),
                );
                //array_push($post, $productMeta);
            }
            $results[] = $post;
        }
        return $results;
    }

}