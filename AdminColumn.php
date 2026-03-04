<?php
if (!defined('ABSPATH')) {
    exit;
}


class AdminColumn {

    public function init() {
        $this->define_constents();
        add_action('plugins_loaded', [$this, 'init_plugin']);
    }

    public function define_constents() {}

    public function init_plugin() {}

}