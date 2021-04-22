<?php
/*
  Plugin Name: WP BOT
  Plugin URI: https://bot.io
  Description: A beautiful, intelligent <strong>chat BOT</strong>.
  Version: 2.8.2
  Author: Screets
  Author URI: https://bot.io
  Requires at least: 4.7
  Tested up to: 4.9.6
  Text Domain: bot
*/
defined('ABSPATH') or die('No script kiddies please!');
define('MYPLUGIN_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('MYPLUGIN_PLUGIN_DIR_URL', plugin_dir_url(__FILE__));
require_once(MYPLUGIN_PLUGIN_DIR . 'src/main.php');


global $wpdb;

$charset_collate = $wpdb->get_charset_collate();
$table_name = $wpdb->prefix . 'chatbot';


$action = $_POST['myc_general_settings'];
if ($action) {
    $sql = "CREATE TABLE $table_name (
      id mediumint(9) NOT NULL AUTO_INCREMENT,
      pid varchar(10) NOT NULL,
      title text NOT NULL,
      keyword text NOT NULL,
      answer varchar(255) DEFAULT '' NOT NULL,
      url varchar(255) DEFAULT '' NOT NULL,
      price varchar(10) DEFAULT '' NOT NULL,
      dtime varchar(255) DEFAULT '' NOT NULL,
      next varchar(255) DEFAULT '' NOT NULL,
      action varchar(255) DEFAULT '' NOT NULL,
      PRIMARY KEY  (id)
    ) $charset_collate;
    CREATE INDEX title
      ON $table_name(title);
    CREATE INDEX keyword
      ON $table_name(keyword);
    CREATE INDEX price
      ON $table_name(price);
    CREATE INDEX dtime
      ON $table_name(dtime);";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    //dbDelta($sql);
}
// count
$user_count = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->users");
// insert from posts

function get_term_name($term_id){
    $term_name = $GLOBALS['wpdb']->get_row("SELECT name FROM {$GLOBALS['wpdb']->prefix}terms WHERE `term_id` = {$term_id}", ARRAY_N);
    return $term_name[0];
}

if ($action) {
    $results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}posts WHERE post_status='publish' ORDER BY ID DESC LIMIT 50", OBJECT);
    $except = array('and', 'the', 'text', 'simply');
    if ($results) {
        foreach ($results as $post) {
            // Post AI
            $pid = $post->ID;
            $input = 'Lorem Ipsum is simply dummy text of the printing industry.';
            if (preg_match_all('/\b(?!(?:' . implode('|', $except) . ')\b)\w{3,}/', $post->post_title, $matches)) {
                $post_title = implode(', ',$matches[0]);
            }
            // Post Content
            $row_content = preg_match_all('/<[^>@]*>(*SKIP)(*F)|[^<@]{3,}+/', $post->post_content, $row) ? $row[0] : '';
            if (preg_match_all('/\b(?!(?:' . implode('|', $except) . ')\b)\w{3,}/', implode(' ', $row[0]), $contents)) {
                $content = implode(', ',$contents[0]);
            }
            $content10 = array_slice($contents[0], 0, 10);
            // Taxonomy AI
            $terms = $wpdb->get_results("SELECT term.term_taxonomy_id FROM {$wpdb->prefix}term_relationships term WHERE object_id = {$pid} ORDER BY object_id DESC ", OBJECT);
            $term_key = array();
            foreach ($terms as $term){
               array_push($term_key, get_term_name($term->term_taxonomy_id));
            }
            // SOme AI Value
            $extra_key = array("p=".$pid, "url=".$post->post_name, "date='".$post->post_date."'");
            $keywords = array_unique(array_merge($content10, $matches[0], $term_key, $extra_key));
            //print_r($keywords);

            $title = $post_title ? $post_title : '';
            $keyword = implode(' ', $keywords);
            //print_r($keywords);
            $answer = $post->post_excerpt;
            $url = $post->guid;
            $price = '';
            $dtime = $post->post_modified;
            $next = 0;
            $action = 1;

            $wpdb->insert(
                $table_name,
                array(
                    'pid' => $pid,
                    'title' => $title,
                    'keyword' => $keyword,
                    'answer' => $answer,
                    'url' => $url,
                    'price' => $price,
                    'dtime' => $dtime,
                    'next' => $next,
                    'action' => $action
                ),
                array('%s','%s','%s','%s','%s','%s','%s','%s','%s',)
            );
        }
    }

    $sql = "CREATE TABLE $table_name (
      id mediumint(9) NOT NULL AUTO_INCREMENT,
      pid varchar(10) NOT NULL,
      title text NOT NULL,
      keyword text NOT NULL,
      answer varchar(255) DEFAULT '' NOT NULL,
      url varchar(255) DEFAULT '' NOT NULL,
      price varchar(10) DEFAULT '' NOT NULL,
      dtime varchar(255) DEFAULT '' NOT NULL,
      next varchar(255) DEFAULT '' NOT NULL,
      action varchar(255) DEFAULT '' NOT NULL,
      PRIMARY KEY  (id)
    ) $charset_collate;
    CREATE INDEX title
      ON $table_name(title);
    CREATE INDEX keyword
      ON $table_name(keyword);
    CREATE INDEX price
      ON $table_name(price);
    CREATE INDEX dtime
      ON $table_name(dtime);";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    //dbDelta($sql);
}