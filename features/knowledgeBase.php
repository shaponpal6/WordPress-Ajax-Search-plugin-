<?php

require_once 'wpdb.php';

class knowledgeBase extends wpdb {
    public function __construct(){
        parent::__construct();
    }
    public function knowledge(){
        $sql = "SELECT * FROM `wp_knowledgebase_cb` ORDER BY `wp_knowledgebase_cb`.`id` ASC";
        $query = mysqli_query($this->conn, $sql);
        $nums_rows = mysqli_num_rows($query);
        if ($nums_rows > 0){
            while ($row = mysqli_fetch_assoc($query)){
                $this->results[] = $row;
            }
        }
        // echo '<pre>';
        return json_encode($this->results);
    }
}

$db = new knowledgeBase();
echo $db->knowledge();