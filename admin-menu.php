<?php
function random_url_rotator_menu() {
    add_options_page(
        'Random URL Rotator', 
        'URL Rotator',
        'manage_options',
        'url_rotator',
        'url_rotator_page'
    );
}

add_action('admin_menu', 'random_url_rotator_menu');
