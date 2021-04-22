<?php

require_once 'wpdb.php';

class productMeta extends wpdb {
    public function __construct(){
        parent::__construct();
    }
    public function meta(){
        $meta_key = array('_sale_price','_height','_width','_length','_weight');
        if (!empty($meta_key)){
            $sql = "select * from wp_postmeta WHERE meta_key IN ('" . implode("','", $meta_key) . "')";
        }else {
            $sql = "select id, post_title from wp_posts WHERE `post_status`='publish' AND `post_type`='product' ORDER BY ID DESC";
        }
        $query = mysqli_query($this->conn, $sql);
        $nums_rows = mysqli_num_rows($query);
        if ($nums_rows > 0){
            while ($row = mysqli_fetch_assoc($query)){
                $this->results[] = $row;
            }
        }
        //echo '<pre>';
        return json_encode($this->results);
    }
}

$db = new productMeta();
echo $db->meta();