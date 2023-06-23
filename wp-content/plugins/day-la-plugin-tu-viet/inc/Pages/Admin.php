<?php 

namespace Inc\Pages;

class Admin 
{

    function __construct()
    {
        add_action('init', array( $this, 'custom_post_type' ) );
    }
    
    function register() {
        add_action('admin_menu', array($this, 'add_admin_pages'));
    }

    function add_admin_pages() {
        add_menu_page('Test thu', 'Hello World', 'manage_options', 'em-chi-test-thoi', array($this, 'admin_index'), 'dashicons-store', 2);
    }
    
    function admin_index() {
        require_once plugin_dir_path(__FILE__). 'templates/admin.php';
    }

    function custom_post_type() {
        register_post_type('book', ['public' => true, 'label' => 'Books']);
    }
}
