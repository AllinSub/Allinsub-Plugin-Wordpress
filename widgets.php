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
        parent::__construct('easypremium_auth', 'EasyPremium', array('description' => 'A widget to show auth information for EasyPremium to your users'));
    }

    public function widget($args, $instance)
    {
		?>
		<script type='text/javascript' src="<?php echo plugins_url( 'js/easypremium-core.js' , __FILE__ );?>"></script>
		<link rel="stylesheet" type='text/css' href="<?php echo plugins_url( 'css/widgets.css' , __FILE__ );?>"></link>
		<div id="EP_Widget" >
			<h1>EasyPremium</h1>
			<br />
			<div>Soutenez <?php echo $blog_title = get_bloginfo('name');?></div>
			<br />
			<button id="bSubscribe" onClick="showAuthDialog()">Je m'abonne</button>
			<br />
			<div id="textViaDiv">Via <a href="www.easypremium.com">EasyPremium</a></div>
		
			<div id="dialog" title="Basic dialog" style="display: none;">
			
			</div>
		</div>
		<?php
    }

}

?>