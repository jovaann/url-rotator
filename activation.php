<?php
// Register the activation hook
register_activation_hook(__FILE__, 'random_url_rotator_activate');

function random_url_rotator_activate() {
    // Initialize the database options, including the rotation class
    add_option('rotator_urls', array());
    add_option('rotation_class', ''); // Default class is ''
}
