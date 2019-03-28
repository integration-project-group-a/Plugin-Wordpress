<?php

/*
Plugin Name: Test Plugin
Plugin URI: http://URI_Of_Page_Describing_Plugin_and_Updates
Description: A brief description of the Plugin.
Version: 1.0
Author: Temp
Author URI: http://URI_Of_The_Plugin_Author
License: A "Slug" license name e.g. GPL2
*/

// Include first-function.php. require_once stopts the script if first-function.php is not found
require_once plugin_dir_path(__FILE__).'includes/first-function.php';

//the 2 functions are called when the plugin is activated by admin om wordpress site
register_activation_hook(__FILE__, 'create_customdb' );