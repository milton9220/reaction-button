<?php
/****
Plugin Name:Reaction Button
Plugin URI:
Author: Milton
Author URI:
Description: The most simple WordPress any post or page reaction system
Version: 1.0.0
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Text Domain:reaction-button
 ******/

if(! defined('ABSPATH')){
	die;
}

if(file_exists(dirname(__FILE__).'/vendor/autoload.php')){
	require_once dirname(__FILE__).'/vendor/autoload.php';
}

if(class_exists('Reaction\\Inc\\Init')){
	Reaction\Inc\Init::register_services();
}