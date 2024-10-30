<?php
/**
 *
 */
class TheFaithMaincontroller extends app_tf_controlers {

	function __construct() {
		parent::__construct();
		add_action('admin_menu', array($this, 'tf_admin_menu'));
	}

	function tf_admin_menu() {
		add_options_page('Islamic Content Archive For The Faith ', 'Islamic Content Archive For The Faith', 'manage_options',OPICTF_Page_SLUG, array($this, 'tfsettings_page'));
	}

	function tfsettings_page() {
		if(isset($_GET['tab'])){
			$tab = strip_tags($_GET['tab']);
		}else{
			$tab = '';
		}
		switch ($tab) {
			case 'options':
				$this->loadController('options');
				break;
			case 'language':
				$this->loadController('language');
				break;
			case 'categories':
				echo $this->loadController('categories');
				break;
			default:
				$this->loadController('language');
				break;
		}
	}

}
new TheFaithMaincontroller();
?>