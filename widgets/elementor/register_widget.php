<?php

/**
 * Widgets class.
 *
 * @category   Class
 * @package    LoginScripts
 * @subpackage WordPress
 */

namespace LoginScripts\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

// Security Note: Blocks direct access to the plugin PHP files.

if (!defined('ABSPATH')) {
    // Exit if accessed directly.
    exit;
}
class register_widget extends Widget_Base
{
    /**
     * Retrieve the widget name.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'register_widget';
    }
    /**
     * Retrieve the widget title.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return __('Register Widget', 'login-scripts');
    }

    /**
     * Retrieve the widget icon.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'eicon-person';
    }

    /**
     * Retrieve the list of categories the widget belongs to.
     *
     * Used to determine where to display the widget in the editor.
     *
     * Note that currently Elementor supports only one category.
     * When multiple categories passed, Elementor uses the first one.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return array Widget categories.
     */
    public function get_categories()
    {
        return array('custom-widgets');
    }
    public function get_keywords()
    {
        return ['login', 'form', 'authentication', 'user', 'account', 'register', 'registration form'];
    }
    protected function _register_controls()
    {
        /**
         * The Input Settings Tab
         * 
         */
        $this->start_controls_section(
            'registerformswitch_section',
            array(
                'label' => __('Form Settings', 'login-scripts'),
            )
        );
        // Add the switcher control
        $this->add_control(
            'use_custom_form',
            [
                'label' => esc_html__('Use Custom Form', 'login-scripts'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'login-scripts'),
                'label_off' => esc_html__('No', 'login-scripts'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );
        $this->add_control(
            'regform_label_showhide',
            array(
                'label'   => __('Show/Hide Labels', 'login-scripts'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'login-scripts'),
                'label_off' => __('No', 'login-scripts'),
                'return_value' => 'yes',
                'default' => 'yes',
            )
        );
        // Add the control in your Elementor widget class
        $this->add_control(
            'regform_input_size',
            [
                'label' => esc_html__('Input Size', 'login-scripts'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'input-med',
                'options' => [
                    'input-xs' => esc_html__('Extra Small', 'login-scripts'),
                    'input-sm' => esc_html__('Small', 'login-scripts'),
                    'input-med' => esc_html__('Medium', 'login-scripts'),
                    'input-lg' => esc_html__('Large', 'login-scripts'),
                    'input-xlg' => esc_html__('Extra Large', 'login-scripts'),
                ],
            ]
        );
        $this->add_control(
            'show_formtitle',
            [
                'label' => esc_html__('Display Form Title', 'login-scripts'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'login-scripts'),
                'label_off' => esc_html__('No', 'login-scripts'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'reg_form_titele',
            [
                'label' => esc_html__('Form Title'),
                'description' => esc_html__('Enter the title for register form this title is global for both forms (Custom & Default)'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__('Enter Form Title'),
                'default' => esc_html__('Register Here'),
                'condition' => [
                    'show_formtitle' => 'yes'
                ]
            ]
        );

        // Other controls for default form settings can be added here if needed

        // Add controls for custom form fields if users choose to use custom form


        $this->end_controls_section();
        /**
         * The Submit Button Tab
         * 
         */
        $this->start_controls_section(
            'register_submit-section',
            array(
                'label' => __('Submit Button', 'login-scripts'),
            )
        );
        $this->add_control(
            'register_submitbtn_text',
            [
                'label' => esc_html__('Button Text', 'login-scripts'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__('Submit Button Text', 'login-scripts'),
                'default' => 'Register Now',
            ]
        );
        // Add the control in your Elementor widget class
        $this->add_control(
            'register_button_size',
            [
                'label' => esc_html__('Button Size', 'login-scripts'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'btn-md',
                'options' => [
                    'btn-xs' => esc_html__('Extra Small', 'login-scripts'),
                    'btn-sm' => esc_html__('Small', 'login-scripts'),
                    'btn-md' => esc_html__('Medium', 'login-scripts'),
                    'btn-lg' => esc_html__('Large', 'login-scripts'),
                    'btn-xlg' => esc_html__('Extra Large', 'login-scripts'),
                ],
            ]
        );


        $this->add_control(
            'register_submitbutton_align',
            [
                'label' => esc_html__('Alignment', 'login-scripts'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'login-scripts'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'login-scripts'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'login-scripts'),
                        'icon' => 'eicon-text-align-right',
                    ],
                    'justify' => [
                        'title' => esc_html__('Justify', 'login-scripts'),
                        'icon' => 'eicon-text-align-justify',
                    ],
                ],
                'default' => 'center',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .register-button' => 'text-align: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'reg_form_inputlabel&placeholders',
            array(
                'label' => esc_html__('Form Label & Placeholders', 'login-scripts'),
            )

        );
        $this->add_control(
            'def_regform_inputlabel1',
            [
                'label' => esc_html__('UserName Label Text', 'login-scripts'),
                'description' => 'This is only for default registeration form',
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__('Enter Your Label Text', 'login-scripts'),
                'default' => 'UserName',
                'label_block' => 'true',
            ]
        );
        $this->add_control(
            'def_regform_inputlabel2',
            [
                'label' => esc_html__('Email Label Text', 'login-scripts'),
                'description' => 'This is only for default registeration form',
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__('Enter Your Label Text', 'login-scripts'),
                'default' => 'Email',
                'label_block' => 'true',
            ]
        );
        $this->add_control(
            'def_regform_inputlabel3',
            [
                'label' => esc_html__('Password Label Text', 'login-scripts'),
                'description' => 'This is only for default registeration form',
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__('Enter Your Label Text', 'login-scripts'),
                'default' => 'Password',
                'label_block' => 'true',
            ]
        );
        $this->add_control(
            'def_regform_placeholdertxt1',
            [
                'label' => esc_html__('Username Placeholder Text', 'login-scripts'),
                'description' => 'This is only for default registeration form',
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__('Enter Username Placeholder Text', 'login-scripts'),
                'default' => 'Enter Your UserName',
                'label_block' => 'true',
            ]
        );
        $this->add_control(
            'def_regform_placeholdertxt2',
            [
                'label' => esc_html__('Email Placeholder Text', 'login-scripts'),
                'description' => 'This is only for default registeration form',
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__('Enter Email Placeholder Text', 'login-scripts'),
                'default' => 'Enter Your Email',
                'label_block' => 'true',
            ]
        );
        $this->add_control(
            'def_regform_placeholdertxt3',
            [
                'label' => esc_html__('Password Placeholder Text', 'login-scripts'),
                'description' => 'This is only for default registeration form',
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => 'true',
                'placeholder' => esc_html__('Enter Password Placeholder Text', 'login-scripts'),
                'default' => 'Enter Your Password',
            ]
        );

        $this->end_controls_section();
        $this->start_controls_section(
            'register_form_builder',
            array(
                'label' => __('Form Builder', 'login-scripts'),
                'condition' => [
                    'use_custom_form' => 'yes', // Make input_label1 control dependent on the label_showhide switcher control being set to 'yes'
                ],
            )
        );
        $this->add_control(
            'list',
            [
                'label' => esc_html__('Form Fields', 'login-scripts'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'input_type',
                        'label' => esc_html__('Field Type', 'login-scripts'),
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'default' => 'text',
                        'options' => [
                            'text' => esc_html__('Text', 'login-scripts'),
                            'email'  => esc_html__('Email', 'login-scripts'),
                            'password' => esc_html__('Password', 'login-scripts'),
                            'tel' => esc_html__('Tel', 'login-scripts'),
                            'number' => esc_html__('Number', 'login-scripts'),
                            'url' => esc_html__('URL', 'login-scripts'),
                        ]
                    ],
                    [
                        'name' => 'input_label',
                        'label' => esc_html__('Label', 'login-scripts'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__('Name', 'login-scripts'),
                        'label_block' => true,
                    ],
                    [
                        'name' => 'input_name',
                        'label' => esc_html__('Name', 'login-scripts'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__('name', 'login-scripts'),
                        'label_block' => true,
                    ],
                    [
                        'name' => 'inputplaceholder',
                        'label' => esc_html__('PlaceHolder', 'login-scripts'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__('Enter Your Name', 'login-scripts'),
                        'label_block' => true,
                    ],
                    [
                        'name' => 'required_form',
                        'label' => esc_html__('Required', 'login-scripts'),
                        'type' => \Elementor\Controls_Manager::SWITCHER,
                        'label_on' => esc_html__('Yes', 'login-scripts'),
                        'label_off' => esc_html__('No', 'login-scripts'),
                        'return_value' => 'yes',
                        'default' => 'no',
                    ],
                    [
                        'name' => 'use_as_username',
                        'label' => esc_html__('Use as Username', 'login-scripts'),
                        'type' => \Elementor\Controls_Manager::SWITCHER,
                        'label_on' => esc_html__('Yes', 'login-scripts'),
                        'label_off' => esc_html__('No', 'login-scripts'),
                        'return_value' => 'yes',
                        'default' => 'no',
                    ],
                ],
                'default' => [
                    [
                        'input_label' => esc_html__('name', 'login-scripts'),
                        'inputplaceholder' => esc_html__('Enter Your Name', 'login-scripts'),
                        'input_type' => esc_html__('text'),
                    ],
                    [
                        'input_label' => esc_html__('email', 'login-scripts'),
                        'inputplaceholder' => esc_html__('Enter Your Email', 'login-scripts'),
                        'input_type' => esc_html__('email'),
                    ],
                    [
                        'input_label' => esc_html__('password', 'login-scripts'),
                        'inputplaceholder' => esc_html__('Enter Your Password', 'login-scripts'),
                        'input_type' => esc_html__('password'),
                    ],

                ],
                'title_field' => '{{{ input_label }}}',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'actions_after_submit_section',
            array(
                'label' => esc_html__('Actions After Submit', 'login-scripts'),
            )
        );
        $this->add_control(
            'actions_after_submit',
            array(
                'label' => 'Actions After Submit',
                'type' => \Elementor\Controls_Manager::SELECT2,
                'multiple' => true,
                'label_block' => 'true',
                'description' => esc_html__('Add actions that will be performed after a visitor submits the form (e.g. send an email notification). Choosing an action will add its setting below.', 'login-scripts'),
                'options' => [
                    'redirect' => esc_html__('Redirect', 'login-scripts'),
                    'send_email_admin' => esc_html__('Send Email to Admin', 'login-scripts'),
                    'send_email_user' => esc_html__('Send Email to User', 'login-scripts'),
                    'collect_data' => esc_html__('Collect Submission', 'login-scripts'),
                ],
                'default' => ['redirect'],
            )

        );
        $this->end_controls_section();
        $this->start_controls_section(
            'redirect_settings_section',
            array(
                'label' => esc_html__('Redirect Settings', 'login-scripts'),
                'condition' => [
                    'actions_after_submit' => 'redirect',
                ],
            )
        );
        $this->add_control(
            'redirect_urle',
            [
                'label' => esc_html__('Redirect URL', 'login-scripts'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'login-scripts'),
                // 'show_external' => true,
                'dynamic' => [
                    'active' => true,
                ],
                'default' => [
                    'url' => '',
                ],
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'send_email_admin_settings_section',
            array(
                'label' => esc_html__('Send Email to Admin Settings', 'login-scripts'),
                'condition' => [
                    'actions_after_submit' => 'send_email_admin',
                ],
            )
        );
        $this->add_control(
            'admin_email',
            [
                'label' => esc_html__('Admin Email', 'login-scripts'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => 'true',
                'placeholder' => esc_html__('Enter Admin Email', 'login-scripts'),
                'default' => get_option('admin_email'),
            ]
        );
        $this->add_control(
            'admin_email_subject',
            [
                'label' => esc_html__('Email Subject', 'login-scripts'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => 'true',
                'default' => esc_html__('New User Registration', 'login-scripts'),
                'placeholder' => esc_html__('Enter Email Subject', 'login-scripts'),
            ]
        );
        $this->add_control(
            'admin_email_body',
            [
                'label' => esc_html__('Email Body', 'login-scripts'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => 'true',
                'default' => esc_html__('New user registered on your site', 'login-scripts'),
                'placeholder' => esc_html__('Enter Email Body', 'login-scripts'),
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'send_email_user_settings_section',
            array(
                'label' => esc_html__('Send Email to User Settings', 'login-scripts'),
                'condition' => [
                    'actions_after_submit' => 'send_email_user',
                ],
            )
        );
        $this->add_control(
            'user_email_subject',
            [
                'label' => esc_html__('Email Subject', 'login-scripts'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => 'true',
                'default' => esc_html__('New User Registration', 'login-scripts'),
                'placeholder' => esc_html__('Enter Email Subject', 'login-scripts'),
            ]
        );
        $this->add_control(
            'user_email_body',
            [
                'label' => esc_html__('Email Body', 'login-scripts'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => 'true',
                'default' => esc_html__('New user registered on your site', 'login-scripts'),
                'placeholder' => esc_html__('Enter Email Body', 'login-scripts'),
            ]
        );
        $this->end_controls_section();
        // Starts Style tab 
        $this->start_controls_section(
            'regformstyle_section',
            [
                'label' => esc_html__('Form', 'login-scripts'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'regform_row_gap',
            [
                'label' => esc_html__('Row Gap', 'login-scripts'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 05,
                ],
                'selectors' => [
                    '{{WRAPPER}} .row-gap' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'reg_form_title',
                'label' => 'Form Title Typography',
                'selector' => '{{WRAPPER}} .reg-form-title',
            ]
        );
        $this->add_control(
            'reg_formtitle_color',
            [
                'label' => esc_html__('Form Title Color', 'login-scripts'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .reg-form-title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'register_formtitle_align',
            [
                'label' => esc_html__('Form Title Alignment', 'login-scripts'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'login-scripts'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'login-scripts'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'login-scripts'),
                        'icon' => 'eicon-text-align-right',
                    ]
                ],
                'default' => 'left',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .reg-form-title' => 'text-align: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'reg_fieldstyle_section',
            [
                'label' => esc_html__('Fields', 'login-scripts'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'reg_fieldstext_color',
            [
                'label' => esc_html__('Text Color', 'login-scripts'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .reg-text-color' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'reg_input_text_color',
            [
                'label' => esc_html__('Input Text Color', 'login-scripts'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .reg_inputtext-color' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'reg_fields_typo',
                'selector' => '{{WRAPPER}} .filed-typo',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'reg_fields_bgcolor',
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .input-bgcolor',
            ]
        );
        $this->add_control(
            'reg_fieldborder_color',
            [
                'label' => esc_html__('Border Color', 'login-scripts'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .input-border-color' => 'border-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'reg_field_border_width',
            [
                'label' => esc_html__('Border Width', 'login-scripts'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .input-border-width' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'reg_field_border_radius',
            [
                'label' => esc_html__('Border Radius', 'login-scripts'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .input-border-radius' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'reg_field_spacing',
            [
                'label' => esc_html__('Label Spacing', 'login-scripts'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 05,
                ],
                'selectors' => [
                    '{{WRAPPER}} .label_settings' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'reg_btnstyle_section',
            [
                'label' => esc_html__('Buttons', 'login-scripts'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'reg_style_tabs'
        );

        $this->start_controls_tab(
            'reg_style_normal_tab',
            [
                'label' => esc_html__('Normal', 'login-scripts'),
            ]
        );
        $this->add_control(
            'reg_submitbtn_text_color',
            [
                'label' => esc_html__('Text Color', 'login-scripts'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-settings' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'reg_submitbtn_typo',
                'selector' => '{{WRAPPER}} .btn-settings',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'reg_submitbtn_bgcolor',
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .btn-settings',
            ]
        );
        $this->add_control(
            'reg_btn_border_settings',
            [
                'label' => esc_html__('Border', 'login-scripts'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .btn-settings' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'reg_btn_borderradius_settings',
            [
                'label' => esc_html__('Border Radius', 'login-scripts'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .btn-settings' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'reg_btnborder_color',
            [
                'label' => esc_html__('Border Color', 'login-scripts'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-settings' => 'border-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'reg_btn_padding_settings',
            [
                'label' => esc_html__('Padding', 'login-scripts'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .btn-settings' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'reg_style_hover_tab',
            [
                'label' => esc_html__('Hover', 'login-scripts'),
            ]
        );
        $this->add_control(
            'reg_submitbtn_text_hovercolor',
            [
                'label' => esc_html__('Text Color', 'login-scripts'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-settings:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'reg_submitbtnhover_bgcolor',
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .btn-settings:hover',
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_section();
    }




    /**
     * Render the user registration form.
     *
     * @since 1.0.0
     *
     * @access protected
     */
    protected function render_registration_form($settings)
    {
        // Include the custom-registration-form.php file to use the method from there
        include_once(LOGIN_SCRIPTS_PLUGIN_PATH . 'public/register-form.php');
    }
    /**
     * Render the user registration form.
     *
     * @since 1.0.0
     *
     * @access protected
     */
    protected function render_customuserbased_registration_form($settings)
    {
        // Include the custom-registration-form.php file to use the method from there
        include(LOGIN_SCRIPTS_PLUGIN_PATH . 'public/user-form-builder.php');
    }
    /**
     * Display an error message.
     *
     * @since 1.0.0
     *
     * @access protected
     *
     * @param string $message The error message to display.
     */
    protected function error_message($message)
    {
        echo '<p class="error">' . $message . '</p>';
    }

    /**
     * Display a success message.
     *
     * @since 1.0.0
     *
     * @access protected
     */
    protected function success_message($redirect_url, $email, $def_email)
    {
        // Default form eamil settings 
        $def_user_email_subject = $this->get_settings('user_email_subject');
        $def_user_email_body = $this->get_settings('user_email_body');

        wp_mail($def_email, $def_user_email_subject, $def_user_email_body);

        $def_admin_email = get_option('admin_email'); // Get the admin's email address
        $def_admin_subject = 'New User Registration';
        $def_admin_message = 'A new user has registered on your site. Email: ' . $def_email;

        wp_mail($def_admin_email, $def_admin_subject, $def_admin_message);

        // default registration form email settings ends here

        // Inside your registration process after successful user registration
        $send_confirmation_email = $this->get_settings('send_email_user');
        $user_email_subject = $this->get_settings('user_email_subject');
        $user_email_body = $this->get_settings('user_email_body');

        if ($send_confirmation_email === 'yes') {
            // Send the confirmation email to the user
            $user_email =  $email; // Replace with the user's email from the registration process
            $subject = $user_email_subject;
            $message = $user_email_body;

            wp_mail($user_email, $subject, $message);
        }
        $send_admin_email = $this->get_settings('send_email_admin');

        if ($send_admin_email === 'yes') {
            // Send the registration notification email to the admin
            $admin_email = get_option('admin_email'); // Get the admin's email address
            $admin_subject = 'New User Registration';
            $admin_message = 'A new user has registered on your site. Email: ' . $email;

            wp_mail($admin_email, $admin_subject, $admin_message);
        }
        echo '<p>You have been registered successfully.</p>';
        $script = "<script>setInterval(function(){  window.location = '" . $redirect_url . "'; }, 2000);</script>";
        echo $script;
        exit;
    }
    public function render()
    {
        // Get the Elementor settings
        $settings = $this->get_settings();

        if ('yes' === $settings['use_custom_form']) {
            $this->render_customuserbased_registration_form($settings);
            // include(LOGIN_SCRIPTS_PLUGIN_PATH . 'public/user-form-builder.php');
        } else {
            // Display the registration form
            $this->render_registration_form($settings);
        }
    }

    // ...
}
