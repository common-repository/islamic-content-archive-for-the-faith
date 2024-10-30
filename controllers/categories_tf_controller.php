<?php
/**
 * 
 */
class categories_tf_controller extends app_tf_controlers {
	
	function __construct() {
		parent::__construct();
		$this->loadView('categories');
	}
}


?>