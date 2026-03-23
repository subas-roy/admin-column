<?php
if (!defined('ABSPATH')) {
    exit;
}

class CustomColumn {
    public function __construct() {
        add_filter('manage_posts_columns', [$this, 'add_custom_column']); // Hook to add custom column
        add_action('manage_posts_custom_column', [$this, 'render_column'], 10, 2); // Hook to add custom column and render its content
        add_filter('manage_edit-post_sortable_columns', [$this, 'make_sortable_column']); // Hook to make the column sortable
        add_filter('pre_get_posts', [$this, 'sort_column']); 
    }

    public function add_custom_column($columns) { // Add a new column with the key 'price' and label 'Price'
        $columns['price'] = esc_html__('Price', 'admin-column');

        // esc_html__() // return data
        // esc_html_e() // void, echo data
        // esc_html_x() // return data, data explaination
        // esc_attr__() // return data
        // esc_attr_e() // void, echo data
        // esc_attr_x() // return data, data explaination

        // $first_part['test-1'] = printf(
        // /* translators: %s: Url to the website */
        // _( 'Please visit our website at %s for more information', 'admin-admin' ),
        // "<a href='https://sayedulsayem.com/'>Sayedul Sayem</a>"
        // );
        // $first_part['test-2'] = printf(
        // /* translators: 1: Name of a city 2: ZIP code */
        // ('Your city is %1$s, and your zip code is %2$s.', 'my-plugin'),
        //'Dhaka',
        // '1205'
        //);
        // $first_part['price'] = esc_html_x('park', 'A place where people enjoy weekend', 'admin-column');
        // $first_part['price'] = esc_html_x('park', 'Place your car for shopping', 'admin-column');
        
        return $columns;
    }

    public function render_column($column_name, $post_id) { // Render the content of the custom column based on the column name
        // $screen = get_current_screen(); 
        // var_dump($screen->id); 
        if ($column_name === 'price') {
            // $price = get_post_meta($post_id, 'price', true); // WordPress way
            $price = get_field('price', $post_id); // ACF way
            echo esc_html($price ? $price : 'N/A');
        }
    }

    public function make_sortable_column($columns) {
        $columns['price'] = 'Price';
        return $columns;
    }

    public function sort_column($query) {
        if($query->get('orderby') === 'price') {
            $query->set('meta_key', 'price'); // ACF way
            $query->set('orderby', 'meta_value_num'); // Sort by numeric value
        }
    }
}