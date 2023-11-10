<?php
/*
Plugin Name: Random URL Rotator
Description: A simple plugin for rotating URLs.
Version: 1.0
Author: Jovan Kitanovic
*/

// Include the other parts of the plugin
include_once plugin_dir_path(__FILE__) . 'admin-menu.php';
include_once plugin_dir_path(__FILE__) . 'url-rotator-page.php';
include_once plugin_dir_path(__FILE__) . 'activation.php';
include_once plugin_dir_path(__FILE__) . 'rotator-functions.php';
include_once plugin_dir_path(__FILE__) . 'script-loader.php';
include_once plugin_dir_path(__FILE__) . 'admin-footer.php';
include_once plugin_dir_path(__FILE__) . 'class-update-handler.php';
