<?php
if (!defined('ABSPATH')) {
    exit;
}


class AdminColumn {

    public function init() {
        $this->define_constents();
        add_action('plugins_loaded', [$this, 'init_plugin']);
    }

    public function define_constents() {
        define('ADMIN_COLUMN_VERSION', '1.0.0');
        define('ADMIN_COLUMN_PLUGIN_DIR', plugin_dir_path(__DIR__)); // Needs to include files, so we need the directory path.
        define('ADMIN_COLUMN_PLUGIN_URL', plugin_dir_url(__DIR__)); // Needs to load assets like CSS and JS, so we need the URL.
    }

    public function init_plugin() {}

}