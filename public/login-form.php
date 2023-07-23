<?php
// global $settings;
// Get the settings passed from the Elementor widget
if (isset($settings) && is_array($settings)) {
    // Access the specific settings using their keys
    $submitbtn_txt = isset($settings['submitbtn_text']) ? $settings['submitbtn_text'] : '';
    $username_label = isset($settings['input_label1']) ? $settings['input_label1'] : '';
    $placeholder_1 = isset($settings['placeholde_1']) ? $settings['placeholde_1'] : '';
    $placeholder_2 = isset($settings['placeholde_2']) ? $settings['placeholde_2'] : '';
    $password_label = isset($settings['input_label2']) ? $settings['input_label2'] : '';
    // ... access other settings as needed
}

$input_size = $settings['input_size'];
$btn_size = $settings['button_size'];
// Get the custom redirect URL value entered by the user
$custom_redirect_url = $this->get_settings('login_redirect_link');

// Get the default login URL
$login_url = wp_login_url();

// Append the redirect parameter to the login URL if the custom redirect URL is provided
if (!empty($custom_redirect_url['url'])) {
    $login_url .= '?redirect_to=' . urlencode($custom_redirect_url['url']);
}
?>
<form id="custom-login-form" action="<?php echo esc_url($login_url); ?>" method="post">
    <div class="row-gap">
        <?php if ('yes' === $settings['label_showhide']) : ?>
            <label for="user_login" class="text-color filed-typo label_settings"><?php echo $username_label ?></label>
        <?php endif ?>
        <input type="text" name="log" id="user_login" class="input inputtext-color filed-typo input-bgcolor input-border-color input-border-width input-border-radius <?php echo $input_size; ?>" value="" size="20" autocapitalize="off" placeholder="<?php echo $placeholder_1 ?>" />
    </div>
    <div class="row-gap">
        <?php if ('yes' === $settings['label_showhide']) : ?>
            <label for="user_pass" class="text-color filed-typo label_settings"><?php echo $password_label ?></label>
        <?php endif ?>
        <input type="password" name="pwd" id="user_pass" class="input inputtext-color filed-typo input-bgcolor input-border-color input-border-width input-border-radius <?php echo $input_size; ?>" value="" size="20" placeholder="<?php echo $placeholder_2 ?>" />
    </div>
    <?php if ('justify' === $settings['submitbutton_align']) {
        $loginbtn_justify = 'btn-justify';
    } ?>
    <div class="login-button row-gap <?php echo $loginbtn_justify; ?>">
        <button type="submit" name="wp-submit" id="wp-submit" class="button-primary btn-settings <?php echo $btn_size; ?>">
            <?php echo $submitbtn_txt ?>
        </button>
    </div>
</form>
<?php
?>