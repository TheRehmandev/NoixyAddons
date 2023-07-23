<?php

function render_login_form() {
    ob_start(); // Start output buffering

    // Include the login form file
    include(LOGIN_SCRIPTS_PLUGIN_PATH . 'public/login-form.php');

    return ob_get_clean(); // Return the buffered content
}

function login_form_shortcode() {
    return render_login_form();
}
add_shortcode('custom_login_form', 'login_form_shortcode');
