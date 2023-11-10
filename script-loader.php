<?php
function random_url_rotator_enqueue_scripts() {
    // Main plugin file is called 'random-url-rotator.php'
    wp_enqueue_script('random-url-rotator-script', plugin_dir_url(__FILE__) . 'assets/js/update-links.js', array(), '1.0.0', true);
    
    // Get the current rotation class and URL
    $rotation_class = get_option('rotation_class', '');
    $random_url = get_random_url();

    // Localize the script with your data
    $translation_array = array(
        'rotationClass' => esc_attr($rotation_class),
        'randomUrl'     => esc_url($random_url)
    );
    wp_localize_script('random-url-rotator-script', 'rotatorVars', $translation_array);
}

add_action('admin_enqueue_scripts', 'random_url_rotator_enqueue_scripts');
add_action('wp_enqueue_scripts', 'random_url_rotator_enqueue_scripts');

function random_url_rotator_enqueue_styles() {
    // Use plugins_url to get the correct path to your CSS file
    $css_file_url = plugins_url('assets/css/styles.css', __FILE__);

    // Enqueue the style
    wp_enqueue_style('random-url-rotator-styles', $css_file_url, array(), '1.0.0', 'all');
}

// Hook into wp_enqueue_scripts for back-end styles
add_action('admin_enqueue_scripts', 'random_url_rotator_enqueue_styles');
