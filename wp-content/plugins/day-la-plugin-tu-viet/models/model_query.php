<?php 

class ModelQuery {

    public function getCourseEnrollred() {
        global $wpdb;
        $sql = "Select * from wp_posts as C , wp_users as A INNER JOIN wp_learnpress_user_items as B ON A.id = B.user_id WHERE B.status = 'enrolled' and B.item_id=C.ID;";
        return  $wpdb->get_results($sql);
    }

    public function getIdCourseBySlug($valueSlug) {
        global $wpdb;
        $sql = "Select id from wp_posts WHERE post_name = '".$valueSlug."'";
        return  $wpdb->get_results($sql);
    }

    public function addCourseTableCourse($arrTablePost) {
        global $wpdb;
        $wpdb->insert('wp_posts', $arrTablePost);
        return $wpdb->get_results('Select LAST_INSERT_ID() as lastId');
    }

    public function addCourseTablePostmeta($arr) {
        global $wpdb;
        $wpdb->insert('wp_postmeta', $arr);
    }

    public function addCourseTableLpOrderItem($arr) {
        global $wpdb;
        $wpdb->insert('wp_learnpress_order_items', $arr);
        // return $wpdb->get_results('Select LAST_INSERT_ID() as lastIdOrderItem');
    }

    public function addCourseTableLpUserItem($arr) {
        global $wpdb;
        $wpdb->insert('wp_learnpress_user_items', $arr);
    }

    public function addCourseTableLpOrderItemmeta($arr) {
        global $wpdb;
        $wpdb->insert('wp_learnpress_order_itemmeta', $arr);
    }
}