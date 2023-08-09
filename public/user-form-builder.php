<?php

// Get the list of form fields from the repeater control

$form_fields = $this->get_settings('list');
$redirect_url = $this->get_settings('redirect_url');
// print_r($settings['list']['0']);
// die
// Check if the form is submitted
if (isset($_POST['submit_registration'])) {
    // Validate the form fields and sanitize the input
    $username = isset($_POST['username']) ? sanitize_text_field($_POST['username']) : '';
    $email = isset($_POST['email']) ? sanitize_email($_POST['email']) : '';
    $password = isset($_POST['password']) ? sanitize_text_field($_POST['password']) : '';
    // $tel = isset($_POST[]) ? sanitize_text_field($_POST['password']) : '';
    // $tel = isset($_POST[$setting['input_label']]);

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
    // 2. Check if the password contains at least one uppercase letter, one lowercase letter, and one digit
    elseif (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/', $password)) {
        $errors[] =  '<p class="error">The password must contain at least one uppercase letter, one lowercase letter, and one digit.</p>';
    }
    // 3. Check if the password contains any special characters
    elseif (!preg_match('/[!@#$%^&*(),.?":{}|<>]/', $password)) {
        $errors[] = '<p class="error">The password must contain at least one special character.</p>';
    }
    if ($input_type === 'tel') {
        // Validate the mobile number field here
        $mobile_number = isset($_POST[$input_label]) ? $_POST[$input_label] : '';

        // Remove any non-numeric characters from the mobile number
        $mobile_number = preg_replace('/[^0-9]/', '', $mobile_number);

        // Check if the mobile number is empty
        if (empty($mobile_number)) {
            echo '<p class="error">The mobile number field is required.</p>';
        } else {
            // Check if the mobile number contains only numeric characters
            if (!is_numeric($mobile_number)) {
                echo '<p class="error">Invalid mobile number. Please enter only numeric characters.</p>';
            }
            // Check if the mobile number has the correct number of digits (assuming 10 digits for mobile number)
            elseif (strlen($mobile_number) !== 10) {
                echo '<p class="error">Invalid mobile number. Please enter a 10-digit mobile number.</p>';
            }
            // Add any additional checks for the allowed format of the mobile number
            // For example, you may check if the mobile number starts with a specific prefix, country code, etc.
            // You can use regular expressions to match specific formats if needed
        }
    }


    // If there are no errors, proceed with user registration
    if (empty($errors)) {
        // Register the user
        $user_id = wp_create_user($username, $password, $email);

        if (!is_wp_error($user_id)) {
            // User registration successful
            // Register a function to perform the redirection after user registration
            $email = $_POST['email']; // Get the email from the registration form

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
// Check if there are any form fields
if ($form_fields && is_array($form_fields)) {
    // Start the registration form
?>
    <?php
    if ('yes' === $settings['show_formtitle']) {

    ?>
        <h2 class="reg-form-title"><?php echo $settings['reg_form_titele']; ?></h2>
    <?php
    }
    ?>
    <form method="post">
        <?php
        // Loop through the form fields and print the input fields
        foreach ($form_fields as $field) {
            // Get the field settings
            $input_type = isset($field['input_type']) ? $field['input_type'] : 'text';
            $input_name = isset($field['input_name']) ? $field['input_name'] : 'text';
            $input_label = isset($field['input_label']) ? $field['input_label'] : '';
            $input_placeholder = isset($field['inputplaceholder']) ? $field['inputplaceholder'] : '';
            $required = isset($field['required_form']) && 'yes' === $field['required_form'] ? 'required' : '';
            $use_as_username = isset($field['use_as_username']) && 'yes' === $field['use_as_username'];
            $input_size = $settings['regform_input_size'];

            // Print the input field based on the field type
            switch ($input_type) {
                case 'text':
                case 'email':
                case 'password':
                case 'tel':
                case 'number':
                case 'url':
        ?>
                    <div class="row-gap">
                        <?php if ('yes' === $settings['regform_label_showhide']) {
                            # code...
                        ?>
                            <label for="<?php echo esc_attr($input_label); ?>" class="reg-text-color filed-typo label_settings"><?php echo esc_html($input_label); ?>:</label>
                        <?php  } ?>
                        <input type="<?php echo esc_attr($input_type); ?>" name="<?php echo esc_attr($input_name); ?>" id="<?php echo esc_attr($input_label); ?>" class="<?php echo $input_size ?> reg_inputtext-color filed-typo input-bgcolor input-border-color input-border-width input-border-radius" placeholder="<?php echo esc_attr($input_placeholder); ?>" <?php echo esc_attr($required); ?>>
                    </div>
        <?php
                    break;
            }
        }

        $btn_size = $settings['register_button_size'];
        $submitbtn_txt = $settings['register_submitbtn_text'];
        // Close the registration form
        echo '<input type="hidden" name="submit_registration" value="1">'; ?>
        <?php if ('justify' === $settings['register_submitbutton_align']) {
            $registerbtn_justify = 'btn-justify';
        } ?>
        <div class="register-button row-gap <?php echo $registerbtn_justify; ?>">
            <button type="submit" class="button-primary btn-settings <?php echo $btn_size; ?>">
                <?php echo $submitbtn_txt ?>
            </button>
        </div>
    <?php
    echo '</form>';
    // print_r($field);
    // die();
}
