<?php
require_once 'wpdb.php';

/**
 * Class wProfessor
 */
class wProfessor extends wpdb{
    function __construct(){
        parent::__construct();
        $this->prefix = 'cb_';
    }

    function stopWords(){
        $stop_words = array('and', 'the', 'text', 'simply');
        return $stop_words;
    }
    function keywords($string){
        $keywords = '';
        if (preg_match_all('/\b(?!(?:' . implode('|', $this->stopWords()) . ')\b)\w{3,}/', $string, $matches)) {
            $keywords = implode(', ',$matches[0]);
        }
        return $keywords;
    }

    function get_term_name($term_id){
        $term_name = "SELECT name FROM {$this->prefix}terms WHERE `term_id` = {$term_id}";
        $query = mysqli_query($this->conn, $term_name);
        if (mysqli_num_rows($query) > 0){
            return $query->fetch_object()->name;
        }else{
            return false;
        }
    }
    function get_tags($pid){
        $terms = "SELECT term.term_taxonomy_id FROM {$this->prefix}term_relationships term WHERE object_id = {$pid} ORDER BY object_id DESC ";
        $query = mysqli_query($this->conn, $terms);
        $term_key = array();
        if (mysqli_num_rows($query) > 0){
            while ($row = mysqli_fetch_assoc($query)){
                $term_key[] = $this->get_term_name($row['term_taxonomy_id']);
            }
        }
        return $term_key;
    }
    function postMeta($pid){
        $pMeta = "SELECT meta_key, meta_value FROM `{$this->prefix}postmeta` WHERE `post_id` = {$pid} ORDER BY `meta_id` DESC";
        $query = mysqli_query($this->conn, $pMeta);
        $postMeta = array();
        if (mysqli_num_rows($query) > 0){
            while ($row = mysqli_fetch_assoc($query)){
                $postMeta[] = $row;
            }
        }
        return $postMeta;
    }
    public function attachment($pid){
        $attach = "select id, guid, post_mime_type from {$this->prefix}posts WHERE `post_parent`={$pid} AND `post_status`='inherit' AND `post_type`='attachment' ORDER BY ID DESC";
        $query = mysqli_query($this->conn, $attach);
        if (mysqli_num_rows($query) > 0){
            $attachment = $query->fetch_object();
//            print_r($attachment->id);
            if (isset($attachment->id) && $attachment->id > 0){
                $img_sql = "SELECT `meta_value` FROM `{$this->prefix}postmeta` WHERE `post_id` = {$attachment->id} AND `meta_key` = '_wp_attached_file' ORDER BY `post_id` ASC";
                $img_query = mysqli_query($this->conn, $img_sql);
                if (mysqli_num_rows($img_query)> 0){
                    $thumbnail = $img_query->fetch_object();
//                    print_r($thumbnail->meta_value);
                    if (isset($thumbnail->meta_value) && $thumbnail->meta_value != ''){
                        return $thumbnail->meta_value;
                    }else{
                        return '';
                    }
                }
            }else{
                return '';
            }
//            $match = preg_match("#^image(.*)$#i", $attachment->post_mime_type);
//            if ($match > 0){
//                return $attachment->guid;
//            }else{
//                return 'No Image';
//            }
        }else{
            return '';
        }
    }
    public function postMetaValue($key, $postMeta){
        foreach ($postMeta as $meta){
            if ($meta['meta_key']==$key){
                return $meta['meta_value'];
            }
        }
    }
    public function postContent($content, $count){
        $text = strip_tags($content);
        return implode(' ', array_slice(str_word_count($text,1), 0, $count));
    }
    public function posts(){
        $sql = "select id, post_title, post_content, post_type from {$this->prefix}posts WHERE `post_status`='publish' AND `post_type` NOT IN('nav_menu_item') ORDER BY ID DESC";
        $query = mysqli_query($this->conn, $sql);
        $posts = array();
        if (mysqli_num_rows($query) > 0){
            while ($row = mysqli_fetch_assoc($query)){
                $this->results[] = $row;
                $tags = implode(' ',$this->get_tags($row['id']));
                $post = array(
                    'id' => $row['id'],
                    'type' => $row['post_type'],
                    'post_title' => $row['post_title'],
                    'post_content' => $this->postContent($row['post_content'],100),
                    'tags' => $tags,
                    'query_string' => $row['post_title'] .' '.$tags,
                    'attachment' => $this->attachment($row['id'])
                );
                if ($row['post_type'] == 'product'){
                    $postMeta = $this->postMeta($row['id']);
                    $post['product'] = array(
                        'price' => $this->postMetaValue('_price',$postMeta),
                        'weight' => $this->postMetaValue('_weight',$postMeta),
                        'height' => $this->postMetaValue('_height',$postMeta),
                        'width' => $this->postMetaValue('_width',$postMeta),
                        'length' => $this->postMetaValue('_length',$postMeta),
                    );
                    //array_push($post, $productMeta);
                }
                $posts[] = $post;
            }
        }
        //echo '<pre>';
        //return json_encode(array_slice($posts,0, 10, true));
        return json_encode($posts);
    }
}
//echo '<pre>';
$db = new wProfessor();
//echo $db->get_term_name(255);
//print_r($db->get_term_name(255));
print_r($db->posts());
//print_r($db->attachment(1329));
//print_r($db->postMeta(1329));

