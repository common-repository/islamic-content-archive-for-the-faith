<?php
/**
 * Islamic Content Archive For The Faith
 *
 * Plugin Name: Islamic Content Archive For The Faith
 * Plugin URI:  https://wordpress.org/plugins/islamic-content-archive-for-the-faith/
 * Description: The Faith introduces Islam to non-Muslims. It provides information about the Quran, Prophet Muhammad, and Islamic civilization.
 * Version:     1.3.7
 * Author:      EDC TEAM (E-Dawah Committee)
 * Author URI:  https://edc.org.kw
 * License:     GPLv2 or later
 * License URI: http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * Requires at least: 5.0
 * Requires PHP: 7.4
*/

define('OPICTF_PLUGIN_PATH',plugin_dir_path( __FILE__ ));
define('OPICTF_PLUGIN_URL',plugin_dir_url( __FILE__ ));
define('OPICTF_Page_SLUG','islamic_content_archive_for_the_faith');
define('OPICTF_Input_SLUG','opictf_');
define('TFLIB','lib');
define('TFDS','/');
define('TFCONTROLLERS','controllers');
define('TFMODELS','models');
define('TFDBTable', 'opictf_categories');
define('TFBootstrappath',OPICTF_PLUGIN_PATH.'style'.TFDS);
define('TFLogourl',OPICTF_PLUGIN_URL.'style'.TFDS.'images'.TFDS.'logo'.TFDS);
define('TFIconpath',OPICTF_PLUGIN_PATH.'style'.TFDS.'images'.TFDS.'icons'.TFDS);
define('TFIconurl',OPICTF_PLUGIN_URL.'style'.TFDS.'images'.TFDS.'icons'.TFDS);
define('TFFlagspath',OPICTF_PLUGIN_PATH.'style'.TFDS.'images'.TFDS.'flags'.TFDS);
define('TFFlagsurl',OPICTF_PLUGIN_URL.'style'.TFDS.'images'.TFDS.'flags'.TFDS);

define('TFControlerspath',OPICTF_PLUGIN_PATH.'controllers'.TFDS);
define('TFModelspath',OPICTF_PLUGIN_PATH.'models'.TFDS);
define('TFViewspath',OPICTF_PLUGIN_PATH.'views'.TFDS);
define('TFLayoutpath',OPICTF_PLUGIN_PATH.'views'.TFDS.'layout'.TFDS);
define('TFLangpath',OPICTF_PLUGIN_PATH.'views'.TFDS.'lang'.TFDS);

function OPICTF_plugin_install(){
	$default_lang = 'eng';
	$source = 'Soucre Link';
	add_option(OPICTF_Input_SLUG.'language', $default_lang);
	add_option(OPICTF_Input_SLUG.'source', $source);
	add_option(OPICTF_Input_SLUG.'cronjobtime', 'everyhour');
	add_option(OPICTF_Input_SLUG.'version', '1.1');
}
function OPICTF_plugin_uninstall(){
	$options = get_option(OPICTF_Input_SLUG.'language');
 	if( is_array($options) && $options['uninstall'] === true){
		delete_option(OPICTF_Input_SLUG.'language');
		delete_option(OPICTF_Input_SLUG.'source');
		delete_option(OPICTF_Input_SLUG.'cronjobtime');
		delete_option(OPICTF_Input_SLUG.'version');
	}
}
register_activation_hook(plugin_basename(__FILE__),'OPICTF_plugin_install');
register_deactivation_hook(plugin_basename(__FILE__), 'OPICTF_plugin_uninstall');

function thefaith_settings_link( $links ) {
    $url = get_admin_url() . 'options-general.php?page='.OPICTF_Page_SLUG;
    $settings_link = '<a href="' . $url . '">' . __('Settings') . '</a>';
    array_unshift( $links, $settings_link );
    return $links;
}

function thefaith_after_setup_theme() {
     add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'thefaith_settings_link');
}
add_action ('after_setup_theme', 'thefaith_after_setup_theme');

include_once(OPICTF_PLUGIN_PATH.'load.php');
?>
