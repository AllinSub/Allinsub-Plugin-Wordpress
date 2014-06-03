<?php
class EP_Widgets_Manager {

    public function __construct()
    {
        add_action('widgets_init', function() {
            register_widget('EP_Widget_Login');
        });
	}
}
		
class EP_Widget_Login extends WP_Widget {
    public function __construct()
    {
        parent::__construct('allinsub_auth', 'Allinsub', array('description' => 'A widget to show auth information for Allinsub to your users'));
    }

    public function widget($args, $instance)
    {
    	include (MY_PLUGIN_FOLDER . '/php/widget_ui.php');
    }

}

?>