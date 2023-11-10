<?php
// Hook for handling the "rotator" parameter in the URL and other core functions
add_action('init', 'handle_rotator_url');

function handle_rotator_url() {
    if (isset($_GET['rotator']) && $_GET['rotator'] == 'true') {
        $random_url = get_random_url();
        wp_redirect($random_url);
        exit;
    }
}

function get_random_url() {
    $urls = get_option('rotator_urls', array());

    if (empty($urls)) {
        return home_url('/');
    }

    $random_key = array_rand($urls);
    $random_url = $urls[$random_key];

    // Check if the URL already has 'http://' or 'https://' prefix, adjust if necessary
    if (substr($random_url, 0, 7) === "http://") {
        $random_url = "https://" . substr($random_url, 7);
    } elseif (substr($random_url, 0, 8) !== "https://") {
        $random_url = "https://" . $random_url;
    }

    return $random_url;
}
