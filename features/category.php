<?php

require_once 'wpdb.php';

class category extends wpdb {
    public function __construct(){
        parent::__construct();
    }
    public function cat(){
        $sql = "SELECT `term_id`, `name` FROM `wp_terms` ORDER BY `term_id`  DESC";
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

$db = new category();
echo $db->cat();