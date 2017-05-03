<?php
/*
Plugin Name: WP Tips - Update Manager
Version: 0.1
Description: A WordPress plugin to enable or disable the updates
Author: WP Tips
Author URI: http://wptips.altervista.org
Text Domain: WPTips-UpdateManager
*/

// Security
if (!defined('ABSPATH')) {die();}
if (defined('WP_INSTALLING') && WP_INSTALLING) {return;}

// Declarations
$plugin_basename = plugin_basename(__FILE__);

// Include options
include 'WPTips-UpdateManager_options.php';

// Add settings link on plugin page
function UpdateManager_options_quicklink($links){
	$settings_link = '<a href="options-general.php?page=WPTips-UpdateManager.php">Settings</a>';
	array_unshift($links,$settings_link);
	return $links;
} 
add_filter("plugin_action_links_$plugin_basename",'UpdateManager_options_quicklink');
?>
