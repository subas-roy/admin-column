<?php
/*
 * Plugin Name:       Admin Column
 * Description:       A plugin to add custom columns to WordPress admin screens.
 * Version:           1.0.0
 * Requires at least: 6.8
 * Requires PHP:      8.0
 * Author:            Subas Roy
 * Author URI:        https://github.com/subas-roy/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       admin-column
 */

if (!defined('ABSPATH')) {
    exit;
}

if (file_exists(plugin_dir_path(__FILE__) . 'includes/AdminColumn.php')) { 
    require_once plugin_dir_path(__FILE__) . 'includes/AdminColumn.php';
}

$admin_column = new AdminColumn(); 
$admin_column->init();