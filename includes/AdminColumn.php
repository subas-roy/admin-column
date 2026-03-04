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
        define('ADMIN_COLUMN_PATH', plugin_dir_path(__DIR__)); 
        define('ADMIN_COLUMN_URL', plugin_dir_url(__DIR__)); 
    }

    public function init_plugin() {
        $this->includes();
        $this->init_hooks();
    }

    public function includes() {}

    public function init_hooks() {
        load_plugin_textdomain('admin-column', false, ADMIN_COLUMN_PATH . 'i18n/');
    }
}