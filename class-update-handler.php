<?php
// Handle class update from settings
if (isset($_POST['update_class'])) {
    $rotation_class = sanitize_text_field($_POST['rotation_class']);
    update_option('rotation_class', $rotation_class);
}
