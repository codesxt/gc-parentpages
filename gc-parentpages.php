<?php

/*
Plugin Name: Great Chile Parent Pages
Plugin URI: http://ferativ.com/
Description: Adds parent page option to Custom Post Types. Developed for Great Chile.
Author: Ferativ
Version: 1.0
Author URI: http://ferativ.com/
*/

if ( ! defined( 'ABSPATH' ) ) {
	die( '' );
}

// Add metabox
include( plugin_dir_path( __FILE__ ) . '/parent-page-metabox/parent-page-metabox.php' );

// Add settings page
include( plugin_dir_path( __FILE__ ) . '/admin/admin-page.php' );
