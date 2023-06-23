<?php 
/**
* Plugin Name: day-la-plugin-tu-viet
* Plugin URI: https://www.your-site.com/
* Description: Test.
* Version: 0.1
* Author: your-name
* Author URI: https://www.your-site.com/
**/

if ( ! defined('ABSPATH') ) {
    die;
}

class DayLaPluginTuViet {
    // function __construct()
    // {
    //     add_action('init', array( $this, 'custom_post_type' ) );
    // }
    public function initModel() {
        require_once plugin_dir_path(__FILE__). 'models/model_query.php';
        return new ModelQuery();
    }

    function register() {
        add_action('admin_enqueue_scripts', array($this, 'enqueue'));
        add_action('admin_menu', array($this, 'add_admin_pages'));
        add_action('learn-press/after-checkout-form', array($this, 'add_event_buy_course'));
    }

    public function add_admin_pages() {
        add_menu_page('Test thu', 'Course purchased', 'manage_options', 'em-chi-test-thoi', array($this, 'admin_index'), 'dashicons-store', 2);

    }

    public function admin_index() {
        $model = $this->initModel();
        $data = $model->getCourseEnrollred();
        require_once plugin_dir_path(__FILE__). 'templates/admin.php';
    }

    function add_event_buy_course() {
        if (is_user_logged_in()) {
            global $wpdb;
            $stringSplit =  strstr($_SERVER['HTTP_REFERER'], 'courses');
            $slugCourse = substr($stringSplit, 8, $stringSplit.length -1);
            $model = $this->initModel();
            $idCourse = $model->getIdCourseBySlug($slugCourse);
            $arrTablePost = array(
                'post_author' => get_current_user_id(),
                'post_date' => date("Y-m-d H:i:s"),
                'post_date_gmt' => date("Y-m-d H:i:s"),
                'post_status' => 'lp-processing',
                'post_type' => 'lp_order',
            );
            $lastID = $model->addCourseTableCourse($arrTablePost);
            $arrMeta = array(array('_order_key', 'ORDER'.time()), array('_order_currency', 'VND'), array('_user_id', get_current_user_id()), array('_order_total', '0'), array('_created_via', 'checkout'));
            for($i = 0; $i < 5; $i ++ ) {
                $arr = array(
                    'post_id' => $lastID[0]->lastId,
                    'meta_key' => $arrMeta[$i][0],
                    'meta_value' => $arrMeta[$i][1],
                );
                $model->addCourseTablePostmeta($arr);
            }
            $idCoursePost = (int)$idCourse[0]->id;  
            $dataCourse = $wpdb->get_results('Select post_title from wp_posts where id ='.$idCoursePost);
            $arrLpOrderItem = array (
                'order_item_name' => $dataCourse[0]->post_title,
                'order_id' => $lastID[0]->lastId,
                'item_id' => $idCoursePost,
                'item_type' => 'lp_course',
            );
            $lastIdOrderItem = $model->addCourseTableLpOrderItem($arrLpOrderItem);
            $arrInfoBuyCourse = array (
                'user_id' => get_current_user_id(),
                'item_id' =>  $idCourse[0]->id,
                'start_time' => date("Y-m-d H:i:s"),
                'item_type' => 'lp_course',
                'status' => 'processing',
                'ref_id' => $idCoursePost,
                'ref_type' => 'lp_order',
            );
            $model->addCourseTableLpUserItem($arrInfoBuyCourse);
            $arrLpOrderItemmeta = array(array('_course_id', $idCourse[0]->id), array('_quantity', 1), array('_subtotal', 0), array('total', 0));
            for($i = 0; $i < 5; $i ++ ) {
                $arr = array(
                    'learnpress_order_item_id' => $lastIdOrderItem[0]->lastIdOrderItem,
                    'meta_key' => $arrLpOrderItemmeta[$i][0],
                    'meta_value' => $arrLpOrderItemmeta[$i][1],
                );
                $model->addCourseTableLpOrderItemmeta($arr);
            }
            echo "<h1 style='color:green'>OK, đang xử lý</h1>";
        } else {
            echo "<h1 style='color:red'>Bạn cần phải đăng nhập</h1>";
        }
    }

    function activate() {
        flush_rewrite_rules();
    }

    function deactivate() {
        flush_rewrite_rules();
    }

    // function custom_post_type() {
    //     register_post_type('book', ['public' => true, 'label' => 'Books']);
    // }
    function enqueue() {
        wp_enqueue_style('mypluginstyle', plugins_url('/assets/style.css', __FILE__));
    }
}
$a = new DayLaPluginTuViet();
$a->register();
// add_action('init', $a->custom_post_type() );
// register_activation_hook(__FILE__, array($a, 'activate'));
// register_deactivation_hook(__FILE__, array($a, 'deactivate'));
register_uninstall_hook(__FILE__, array($a, 'uninstall'));