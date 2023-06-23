<?php
require_once(plugin_dir_path(__FILE__) . '/Db/Db.php');

class Data {
    private $data;

    public function __construct($data) {
        $this->data = $data;
    }

    public function getData() {
        $a = new Db();
        $wpdb = $a->getDb();

        $table_name = $wpdb->prefix . $this->data;

        $query_name = "SELECT * FROM $table_name";
        
        $results_name = $wpdb->get_results($query_name); //
        return $results_name;
    }

    public function getDataLpUserItem($id = false, array $arr = null) {
        $a = new Db();
        $wpdb = $a->getDb();
        if ($id) {
            $query_name = "SELECT COUNT(*) as total FROM wp_posts as C , wp_users as A INNER JOIN wp_learnpress_user_items as B 
                            ON A.id = B.user_id 
                            WHERE B.status = 'enrolled' and B.item_id=C.ID and C.ID= $id";
            return $wpdb->get_results($query_name);
        } 
        $query_name = "SELECT * FROM wp_posts as C , wp_users as A INNER JOIN wp_learnpress_user_items as B 
                                                                    ON A.id = B.user_id 
                                                                    WHERE B.status = 'enrolled' LIMIT $arr[0], $arr[1]";
        return $wpdb->get_results($query_name);
    }
}