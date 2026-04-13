<?php
function editorial_enqueue_scripts() {
    wp_enqueue_style('main-style', get_stylesheet_uri());
    wp_enqueue_script('analytics-js', get_template_directory_uri() . '/analytics.js', [], null, true);
    wp_localize_script('analytics-js', 'analyticsData', [
        'ajax_url' => admin_url('admin-ajax.php')
    ]);
}
add_action('wp_enqueue_scripts', 'editorial_enqueue_scripts');
?>