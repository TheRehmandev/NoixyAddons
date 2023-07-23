<?php
/**
 * Plugin Name: Login Scripts
 * Plugin URI: #
 * Description: Add custom login and signup functionality to your WordPress site.
 * Version: 1.0.0
 * Author: Noor ur Rehman
 * Author URI: https://noixtech.com
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: login-scripts
 */

// Prevent direct access to this file
if (!defined('ABSPATH')) {
    exit;
}
// Defining the plugin constant 
if(!defined('LOGIN_SCRIPTS')) {
    define( 'LOGIN_SCRIPTS', __FILE__ );
}
// Defining the plugin path 
if(!defined('LOGIN_SCRIPTS_PLUGIN_PATH')) {
    define( "LOGIN_SCRIPTS_PLUGIN_PATH", plugin_dir_path(__FILE__) );
}

// Define the assets path constant
if(!defined('LOGIN_SCRIPTS_ASSETS_PATH')) {
    define( "LOGIN_SCRIPTS_ASSETS_PATH", plugins_url( 'assets/', __FILE__ ) );
}
require_once LOGIN_SCRIPTS_PLUGIN_PATH .'plugin-loader.php';

