<?php
// Add and delete URLs
function url_rotator_page() {
    if (isset($_POST['submit'])) {
        // Check the nonce for the add URL action for security
        if (check_admin_referer('add_url_nonce')) {
            // Save the URL to the database
            $url = sanitize_text_field($_POST['url']); // Sanitize the URL
            $existing_urls = get_option('rotator_urls', array());
            $existing_urls[] = $url;
            update_option('rotator_urls', $existing_urls);
            echo '<div class="updated"><p>URL added.</p></div>';
        }
    }

    // Get the updated list of URLs
    $urls = get_option('rotator_urls', array());

    // Check if the delete URL form was submitted
    if (isset($_POST['delete'])) {
        // Check the nonce for the delete URL action for security
        if (check_admin_referer('delete_url_nonce')) {
            // Delete selected URL from the database
            $url_id = intval($_POST['url_id']); // Sanitize the URL ID
            if (isset($urls[$url_id])) {
                unset($urls[$url_id]);
                $urls = array_values($urls); // Re-index the array
                update_option('rotator_urls', $urls);
                echo '<div class="updated"><p>URL deleted.</p></div>';
            }
        }
    }

    // Get the user-defined class from the settings
    $rotation_class = get_option('rotation_class', ''); // Default class is ''
    ?>
    <div class="wrap sections">
        <h2>Random URL Rotator</h2>
        <form method="post" class="add_url_form">
            <?php wp_nonce_field('add_url_nonce'); ?>
            <h3>Add a new URL (Just domain name without http:// or https://)</h3>
            <input type="text" name="url" class="url-input" placeholder="Enter URL" style="width: 235px;" />
            <input type="submit" name="submit" class="button-primary" value="Add URL" />
        </form>
    </div>
    <div class="wrap sections">
        <h3>Manage URLs</h3>
        <?php foreach ($urls as $url_id => $url) : ?>
            <form method="post" class="manage_url_form">
                <?php echo '<p class="url_string">' . esc_html($url) . '</p>'; ?>
                <input type="hidden" name="url_id" value="<?php echo esc_attr($url_id); ?>">
                <?php wp_nonce_field('delete_url_nonce'); ?>
                <input type="submit" name="delete" class="button-secondary" value="Delete">
            </form>
<?php endforeach; ?>
    </div>

    <!-- Settings form for the rotation class -->
    <div class="wrap sections">
        <h3>Rotation class settings (Add class without dot in the beginning)</h3>
        <form method="post" class="class_form">
            <input type="text" name="rotation_class" style="width:235px;" value="<?php echo esc_attr($rotation_class); ?>" />
            <input type="submit" name="update_class" class="button-primary" value="Update Class" />
        </form>
    </div>
    <?php
}