<?php
/*
Plugin Name: EasyPremium
Plugin URI: http://easypremium.com
Version: 0.1
Author: Easy Premium
Description: Plugin ready to use for EasyPremium.
*/


class EP_Plugin
{
    public function __construct()
    {
		// Load scripts
		add_action( 'init', 'load_scripts' );
		
		// Include Admin components
        include_once plugin_dir_path( __FILE__ ).'/admin.php';
        new EP_Admin_Panel();
		
		// Include widgets components
        include_once plugin_dir_path( __FILE__ ).'/widgets.php';
		new EP_Widgets_Manager();
    }
}

new EP_Plugin();

function load_scripts() {
    wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'jquery-ui-dialog', array( 'jquery' ) );
	wp_register_style('jquery-ui', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css');
	wp_enqueue_style( 'jquery-ui' ); 
}
?>