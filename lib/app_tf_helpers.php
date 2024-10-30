<?php
/**
 * APP Helpers
 */
class app_tf_helpers {
	var $class_lang;
	var $langList;
	public function __construct() {
		global $opictf_lang;
		global $opictf_lang_list;
		$this->langList = $opictf_lang_list;
		$this->loadLang();
	}
	public function loadLang()
	{
		global $opictf_lang;
		$this->class_lang =  $opictf_lang;
	
	}
	
	public function getLang($key='')
	{
	    if(isset($this->class_lang[$key])){
	        return $this->class_lang[$key];
	    }
		return $key;
	}
	public function getLangList()
	{
		$result = [];
		if(isset($this->langList) && is_array($this->langList) && count($this->langList) > 0){
			foreach ($this->langList as $key => $value) {
				$result[$key] = $value["title"];
			}
		}
		return $result;
	}
	public function MainContent($mainViewFile) {
		if (file_exists($mainViewFile)) {
			include_once $mainViewFile;
		}

	}
	
	function opic_tf_admin_tabs($current = 'language') {
		 
		global $opictf_categories_lang,$tfcategories;
	 
		
		$cat_tab_list = [];
		if(isset($opictf_categories_lang[get_option(OPICTF_Input_SLUG.'language')]))
		{
		  $cat_tab_list = $opictf_categories_lang[get_option(OPICTF_Input_SLUG.'language')];  
		}
		
	 
		if(isset($_GET['page'])){
			$get_slug = strip_tags($_GET['page']);
		}else{
			$get_slug = '';
		}

		if (!empty($_GET['tab'])) {
			$current = esc_attr($_GET['tab']);
		};
		$tabs = array('language' => $this->getLang('tab-language'),'options' => $this->getLang('tab-options'));
		echo '<div id="icon-themes" class="icon32"><br></div>';
		echo '<h2 class="nav-tab-wrapper">';
		foreach ($tabs as $tab => $name) {
			$class = ($tab == $current) ? ' nav-tab-active' : '';
			$logo = NULL;
		 
			echo "<a class='nav-tab$class' href='?page=" . $get_slug . "&tab=$tab'>$logo $name</a>";
		}
		 
		if(isset($cat_tab_list) && is_array($cat_tab_list) && count($cat_tab_list) > 0){
			foreach ($cat_tab_list as $tab => $name) {
			if(isset($_GET['cat_slug'])){
				$_current = esc_attr($_GET['cat_slug']);
			}else{
				$_current = '';	
			}
			$class = ($current == 'categories' && $_current == $tab) ? ' nav-tab-active' : '';
			echo "<a class='nav-tab$class' href='?page=" . $get_slug . "&tab=categories&cat_slug=$tab'><img ?>".$this->getLang($tab)."</a>";
		}		
		}
		echo '</h2>';
	}
	
}
?>