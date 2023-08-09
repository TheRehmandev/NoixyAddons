<?php
/**
 * Render the user registration form.
 *
 * @since 1.0.0
 *
 * @access protected
 */
$redirect_url = $this->get_settings('redirect_url');
// Check if the form is submitted
if (isset($_POST['submit_registration'])) {
    // Validate the form fields and sanitize the input
    $username = isset($_POST['username']) ? sanitize_text_field($_POST['username']) : '';
    $email = isset($_POST['email']) ? sanitize_email($_POST['email']) : '';
    $password = isset($_POST['password']) ? sanitize_text_field($_POST['password']) : '';

    // Initialize the errors array
    $errors = array();

    // Validate the username field
    if (empty($username)) {
        $errors[] = 'The username field is required.';
    } elseif (strlen($username) < 6) {
        $errors[] = 'The username must be at least 6 characters long.';
    }

    // Validate the email field
    if (empty($email)) {
        $errors[] = 'The email field is required.';
    } elseif (!is_email($email)) {
        $errors[] = 'The email address is not valid.';
    }

    // Validate the password field
    if (empty($password)) {
        $errors[] = 'The password field is required.';
    } elseif (strlen($password) < 6) {
        $errors[] = 'The password must be at least 6 characters long.';
    }

    // If there are no errors, proceed with user registration
    if (empty($errors)) {
        // Register the user
        $user_id = wp_create_user($username, $password, $email);

        if (!is_wp_error($user_id)) {
            // User registration successful
            // Register a function to perform the redirection after user registration
            $def_email = $_POST['email']; // Get the email from the registration form
            $this->success_message();
            
            // echo 'holala';
        } else {
            // Display error message
            $this->error_message($user_id->get_error_message());
        }
    } else {
        // Display error messages
        $this->error_message(implode('<br>', $errors));
    }
}

// Render the registration form
?>
<?php
$input_size = $settings['regform_input_size'];
// $redirect_url = $settings['redirect_url'];
?>
<div class="">
    <div class="">
        <div class="">
            <?php
            if ('yes' === $settings['show_formtitle']) {

            ?>
                <h2 class="reg-form-title"><?php echo $settings['reg_form_titele']; ?></h2>
            <?php
            }
            ?>
        </div>
    </div>
    <div class="">
        <div class="">
            <form method="post">
                <div class="row-gap ">
                    <label for="username" class="reg-text-color filed-typo label_settings"><?php echo $settings['def_regform_inputlabel1'] ?></label>
                    <input type="text" name="username" id="username" class="<?php echo $input_size ?> reg_inputtext-color filed-typo input-bgcolor input-border-color input-border-width input-border-radius" placeholder="<?php echo $settings['def_regform_placeholdertxt1'] ?>" required>
                </div>

                <div class="row-gap ">
                    <label for="email" class="reg-text-color filed-typo label_settings"><?php echo $settings['def_regform_inputlabel2'] ?></label>
                    <input type="email" name="email" id="email" class="<?php echo $input_size ?> reg_inputtext-color filed-typo input-bgcolor input-border-color input-border-width input-border-radius" placeholder="<?php echo $settings['def_regform_placeholdertxt2'] ?>" required>
                </div>

                <div class="row-gap ">
                    <label for="password" class="reg-text-color filed-typo label_settings"><?php echo $settings['def_regform_inputlabel3'] ?></label>
                    <input type="password" name="password" id="password" class="<?php echo $input_size ?> reg_inputtext-color filed-typo input-bgcolor input-border-color input-border-width input-border-radius" placeholder="<?php echo $settings['def_regform_placeholdertxt3'] ?>" required>
                </div>
                <?php
                $btn_size = $settings['register_button_size'];
                $submitbtn_txt = $settings['register_submitbtn_text'];
                // Close the registration form
               
                echo '<input type="hidden" name="submit_registration" value="1">'; 
                if ( ! empty( $settings['redirect_urle']['url'] ) ) {
                    $this->add_link_attributes( 'redirect_urle', $settings['redirect_urle'] );
                }
                $ok=  str_replace('"','',str_replace('href=','',trim($this->get_render_attribute_string( 'redirect_urle' ))));

                // exit;
                ?>
           
                <input type="hidden" name="redirect_url" value='<?php echo htmlspecialchars($ok); ?>'>
               
                <?php if ('justify' === $settings['register_submitbutton_align']) {
                    $registerbtn_justify = 'btn-justify';
                } ?>
                <div class="register-button row-gap <?php echo $registerbtn_justify; ?>">
                    <button type="submit" class="button-primary btn-settings <?php echo $btn_size; ?>">
                        <?php echo $submitbtn_txt ?>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>