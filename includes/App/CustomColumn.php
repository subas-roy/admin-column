<?php
if (!defined('ABSPATH')) {
    exit;
}

class CustomColumn {
    public function __construct() {
        add_filter('manage_posts_columns', [$this, 'add_custom_column']); // Hook to add custom column
        add_action('manage_posts_custom_column', [$this, 'render_column'], 10, 2); // Hook to add custom column and render its content
    }

    public function add_custom_column($columns) { // Add a new column with the key 'price' and label 'Price'
        $columns['price'] = 'Price';
        return $columns;
    }

    public function render_column($column_name, $post_id) { // Render the content of the custom column based on the column name
        if ($column_name === 'price') {
            // $price = get_post_meta($post_id, 'price', true); // WordPress way
            $price = get_field('price', $post_id); // ACF way
            echo esc_html($price ? $price : 'N/A');
        }
    }
}