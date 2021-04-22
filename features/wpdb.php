<?php
header('Access-Control-Allow-Origin: *');

/**
 * Class wpdb
 */
class wpdb{
    private $dbName = 'wpartificial';
    private $server = 'localhost';
    private $user = 'root';
    private $password = '';
    protected $conn = null;
    private $output = '';
    private $results = array();

    public function __construct(){
        $this->conn = @mysqli_connect($this->server, $this->user, $this->password, $this->dbName);
        if (mysqli_connect_errno($this->conn)){
            echo 'Disconnected!!:'. mysqli_connect_error();
        }
        return $this->conn;
    }
    private function realScapeString($input){
        $this->output = mysqli_real_escape_string($this,$input);
        return $this->output;
    }

    public function products(){
        $sql = "select id, post_title from wp_posts WHERE `post_status`='publish' AND `post_type`='product' ORDER BY ID DESC";
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
    public function posts(){
        $sql = "select id, post_title from wp_posts WHERE `post_status`='publish' AND `post_type`='post' ORDER BY ID DESC";
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
