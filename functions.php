<?php
function theme_register_styles_and_scripts()
{
    // Enqueue styles
    wp_enqueue_style('header', get_stylesheet_directory_uri() . '/css/header.css');
    wp_enqueue_style('footer', get_stylesheet_directory_uri() . '/css/footer.css');
    wp_enqueue_style('landing', get_stylesheet_directory_uri() . '/css/landing.css');
    wp_enqueue_style('about-us', get_stylesheet_directory_uri() . '/css/about-us.css');
    wp_enqueue_style('style', get_stylesheet_directory_uri() . '/style.css');
}
add_action('wp_enqueue_scripts', 'theme_register_styles_and_scripts');

function enqueue_aos_files()
{
    // Enqueue AOS CSS
    wp_enqueue_style('aos-css', get_template_directory_uri() . '/js/AOS/aos.css', array());

    // Enqueue AOS JS
    wp_enqueue_script('aos-js', get_template_directory_uri() . '/js/AOS/aos.js', array('jquery'), true);

    // Enqueue custom script to initialize AOS
wp_add_inline_script('aos-js', '
    document.addEventListener("DOMContentLoaded", function() {
        AOS.init({
            once: true // Set this to true to animate elements only once per page load
        });
    });
');

}
add_action('wp_enqueue_scripts', 'enqueue_aos_files');



add_theme_support('post-thumbnails');


// Add this code to your theme's functions.php or your plugin's main file

function display_email_list_admin()
{
    global $wpdb;

    // Assuming you have a table named 'email_subscriptions' with a column named 'email'
    $table_name = $wpdb->prefix . 'email_subscriptions';
    $results = $wpdb->get_results("SELECT email FROM $table_name", ARRAY_A);

    // Render the HTML table
    echo '<div class="wrap">';
    echo '<h1>Email List</h1>';
    echo '<table class="wp-list-table widefat fixed striped">';
    echo '<thead><tr><th>Email Address</th></tr></thead>';
    echo '<tbody>';
    foreach ($results as $row) {
        echo '<tr><td>' . esc_html($row['email']) . '</td></tr>';
    }
    echo '</tbody>';
    echo '</table>';
    echo '</div>';
}

function register_email_list_admin_page()
{
    add_submenu_page(
        'tools.php',
        // Parent slug
        'Email List',
        // Page title
        'Email List',
        // Menu title
        'manage_options',
        // Capability
        'email_list',
        // Menu slug
        'display_email_list_admin' // Callback function
    );
}

add_action('admin_menu', 'register_email_list_admin_page');

function save_email_subscription()
{
    global $wpdb;

    $email = sanitize_email($_POST['email']);

    if (is_email($email)) {
        $table_name = $wpdb->prefix . 'email_subscriptions';

        // Check if the email already exists in the database
        $email_exists = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM $table_name WHERE email = %s", $email));

        if (!$email_exists) {
            // Save the email to the database
            $result = $wpdb->insert($table_name, array('email' => $email));

            if ($result) {
                wp_send_json_success();
            } else {
                wp_send_json_error(array('error' => 'Failed to save the email address.'));
            }
        } else {
            wp_send_json_error(array('error' => 'That email has already been registered.'));
        }
    } else {
        wp_send_json_error(array('error' => 'Invalid email address.'));
    }
}

add_action('wp_ajax_save_email_subscription', 'save_email_subscription');
add_action('wp_ajax_nopriv_save_email_subscription', 'save_email_subscription');