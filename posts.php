<?php
define ( 'MY_PLUGIN_FOLDER', str_replace ( "\\", '/', dirname ( __FILE__ ) ) );
define ( 'METAKEY_ISPREMIUM', 'allinsub_is_premium' );

class EP_PostEdit {
	var $log;

	public function __construct () {
		$this->log = new Logging ();
		$this->log->lfile ( '/mylog.txt' );
		
		add_action ( 'add_meta_boxes', array ($this,'initMetabox' ) );
		
		add_action ( 'pre_post_update', array ($this,'save_metaboxes' ) );
		
		add_filter ( 'the_content', array ($this,'filter_post_content' ) );
	}

	function initMetabox () {
		$screens = array ('post','page' );
		
		foreach ( $screens as $screen ) {
			
			add_meta_box ( 'id_allinsub_meta', 'AllinSub', array ($this,'meta_function' ), $screen, 'side', 'default' );
		}
	}

	function meta_function ( $post ) {
		$savedValue = get_post_meta ( $post->ID, METAKEY_ISPREMIUM, true );
		$isPremium = strcmp ( $savedValue, 'true' ) == 0;
		
		if ($isPremium == true) {
			$isChecked = 'checked="yes" ';
		} else {
			$isChecked = '';
		}
		
		// echo 'savedValue';
		// var_dump ( $savedValue );
		// echo 'isPremium';
		// var_dump ( $isPremium );
		// echo 'isChecked';
		// var_dump ( $isChecked );
		// echo '<div>isPremium is null ? : ' . is_null ( $isPremium ) . '</div>';
		// echo '<div>Is post ' . $post->ID . ' premium : ' . $isPremium . '</div>';
		
		// instead of writing HTML here, lets do an include
		include (MY_PLUGIN_FOLDER . '/php/metabox_ui.php');
	}

	function save_metaboxes ( $post_id ) {
		// isPremium is true if checkbox is set
		$isPremium = isset ( $_POST ['allinsub_is_premium'] );
		$isPremiumString = ($isPremium ? 'true' : 'false');
		$resUpdate = update_post_meta ( $post_id, METAKEY_ISPREMIUM, $isPremiumString );
		
		if (! $resUpdate) {
			$resAdd = add_post_meta ( $post_id, METAKEY_ISPREMIUM, $isPremiumString );
		}
		
		// Print log to confirm
		// $this->log->lwrite ( 'Post id : ' . $post_id . ' / Key : ' . METAKEY_ISPREMIUM . ' / Value : ' . $isPremiumString );
		// $this->log->lwrite ( 'isPremiumString :' . $isPremiumString );
		// $this->log->lwrite ( 'update_post_meta :' . ($resUpdate ? 'true' : 'false') );
		// $this->log->lwrite ( 'add_post_meta :' . ($resAdd ? 'true' : 'false') );
	}

	function filter_post_content ( $content ) {
		global $post;
		// var_dump ( $post );
		// var_dump ( $content );
		
		if (is_singular ()) {
			$isPremium = get_post_meta ( $post->ID, METAKEY_ISPREMIUM, true );
			$isPremium = strcmp ( $isPremium, 'true' ) == 0;
			
			if ($isPremium) {
				// If has more, hide after more.
				$morePosition = strpos ( get_the_content (), 'id="more-' );
				if ($morePosition) {
					$content = substr ( $content, 0, $morePosition ) . " [...]";
				}
				
				$content = $content . "\n<br />\n";
				$content = $content . "<div>Cet article est un article premium. Merci de vous abonner pour profiter d'un article complet</div>\n";
				$content = $content . "<br />\n";
				$content = $content . "<div>Il vous suffit de cliquer sur le bouton suivant.</div>\n";
				$content = $content . "<br />\n";
				$content = $content . "<div><button>Je m'abonne</button></div>\n";
			}
		}
		return $content;
	}
}

?>