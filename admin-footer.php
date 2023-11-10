<?php
// Script for updating the start button URL in footer
add_action('admin_footer', 'update_start_button_url_in_footer'); // Load in backend
add_action('wp_footer', 'update_start_button_url_in_footer'); // Load in the frontend as well

function update_start_button_url_in_footer() {
    // Get the user-defined rotation class from the settings
    $rotation_class = get_option('rotation_class', '');
    $random_url = get_random_url();
}
