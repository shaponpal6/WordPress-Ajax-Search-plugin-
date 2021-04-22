<?php

require_once 'wpdb.php';

class page extends wpdb {
    public function __construct(){
        parent::__construct();
    }
    public function pages(){
        $sql = "select id, post_title from wp_posts WHERE `post_status`='publish' AND `post_type`='page' ORDER BY ID DESC";
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

$db = new page();
echo $db->pages();