<?php

require_once 'wpdb.php';

class master extends wpdb {
    public function __construct(){
        parent::__construct();
    }
    public function master(){
        $sql = "select id, post_title, post_type from wp_posts WHERE `post_status`='publish'  ORDER BY ID DESC";
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

$db = new master();
echo $db->master();