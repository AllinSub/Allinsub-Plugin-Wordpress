<?php

class EP_Admin_Panel {
	var $userRights = 'activate_plugins';

    public function __construct() {
        add_action( 'admin_menu', array($this, 'allinsub_options_page') );
    }

    function allinsub_options_page() {
        add_options_page( 'Allinsub Options', 'Allinsub', 'activate_plugins', 'allinsub_options_page', array($this, 'allinsub_options_page_content'));
    }

    function allinsub_options_page_content() {
        if ( !current_user_can( 'activate_plugins' ) )  {
            wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
        }
		?>
		<div class="wrap">
			<h2>Allinsub Options</h2>
			<table class="form-table">
				<tbody>
					<tr>
						<th scope="row">
							<label for="bPublisherId">PublisherId</label>
						</th>
						<td>
							<input name="bPublisherId" type="text" id="bPublisherId" value="" class="regular-text" data-cip-id="blogname">
							<button id="bCheckPublisherId" onClick="checkPublisherId()">Check</button>
							<button id="bCreateAccount" >Create account</button>
						</td>
					</tr>
					<tr>
						<th scope="row">Premium posts</th>
						<td>
							<fieldset><legend class="screen-reader-text"><span>Premium posts</span></legend><label for="cbIsPremiumPostsActivated">
							<input name="cbIsPremiumPostsActivated" type="checkbox" id="cbIsPremiumPostsActivated" value="1">
							You can select posts to be visible only by premium users.</label>
							</fieldset>
						</td>
					</tr>
				</tbody>
			</table>
			<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Enregistrer les modifications"></p>
		</div>
		<?php
    }
}

?>