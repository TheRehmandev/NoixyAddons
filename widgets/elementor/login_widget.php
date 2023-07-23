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
class login_widget extends Widget_Base
{
    /**
     * Class constructor.
     *
     * @param array $data Widget data.
     * @param array $args Widget arguments.
     */
    public function __construct($data = array(), $args = null)
    {
        parent::__construct($data, $args);

        // wp_register_style( 'coneblog-author-box', plugins_url( '/assets/css/author-box.css', LOGIN_SCRIPTS ), array(), '1.0.0' );

    }

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
        return 'login_widget';
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
        return __('Login Widget', 'login-scripts');
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
        return ['login', 'form', 'authentication', 'user', 'account'];
    }
    /**
     * Register the widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     *
     * @access protected
     */
    protected function _register_controls()
    {
        /**
         * The Input Settings Tab
         * 
         */
        $this->start_controls_section(
            'input_section',
            array(
                'label' => __('Input Settings', 'login-scripts'),
            )
        );
        $this->add_control(
            'label_showhide',
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
            'input_size',
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
            'input_label1',
            [
                'label' => esc_html__('Username Label', 'login-scripts'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__('Set Custom Label', 'login-scripts'),
                'default' => esc_html__('Username', 'login-scripts'), // Set the default value here
                'condition' => [
                    'label_showhide' => 'yes', // Make input_label1 control dependent on the label_showhide switcher control being set to 'yes'
                ],
            ]
        );
        $this->add_control(
            'placeholde_1',
            [
                'label' => esc_html__('Username Placeholder', 'login-scripts'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__('Enter Username', 'login-scripts'),
                'default' => esc_html__('Enter Username', 'login-scripts'), // Set the default value here
                'condition' => [
                    'label_showhide' => 'yes', // Make input_label1 control dependent on the label_showhide switcher control being set to 'yes'
                ],
            ]
        );
        $this->add_control(
            'input_label2',
            [
                'label' => esc_html__('Password Label', 'login-scripts'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__('Set Custom Label', 'login-scripts'),
                'default' => esc_html__('Password', 'login-scripts'), // Set the default value here
                'condition' => [
                    'label_showhide' => 'yes', // Make input_label1 control dependent on the label_showhide switcher control being set to 'yes'
                ],
            ]
        );
        $this->add_control(
            'placeholde_2',
            [
                'label' => esc_html__('Password Placeholder', 'login-scripts'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__('Enter Password', 'login-scripts'),
                'default' => esc_html__('Enter Your Password', 'login-scripts'), // Set the default value here
                'condition' => [
                    'label_showhide' => 'yes', // Make input_label1 control dependent on the label_showhide switcher control being set to 'yes'
                ],
            ]
        );


        $this->end_controls_section();
        
        /**
         * The Submit Button Tab
         * 
         */
        $this->start_controls_section(
            'submit-section',
            array(
                'label' => __('Submit Button', 'login-scripts'),
            )
        );
        $this->add_control(
            'submitbtn_text',
            [
                'label' => esc_html__('Button Text', 'login-scripts'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__('Submit Button Text', 'login-scripts'),
                'default'=> 'Login',
            ]
        );
        // Add the control in your Elementor widget class
        $this->add_control(
            'button_size',
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
            'submitbutton_align',
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
                    '{{WRAPPER}} .login-button' => 'text-align: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'addtional-section',
            array(
                'label' => __('Addiotional Settings', 'login-scripts'),
            )
        );
        $this->add_control(
			'show_redirectafterlogin',
			[
				'label' => esc_html__( 'Redirect After Login', 'login-scripts' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'On', 'login-scripts' ),
				'label_off' => esc_html__( 'Off', 'login-scripts' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
        $this->add_control(
			'login_redirect_link',
			[
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'login-scripts' ),
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					// 'custom_attributes' => '',
				],
				'label_block' => true,
                'condition' => [
                    'show_redirectafterlogin' => 'yes', // Make input_label1 control dependent on the label_showhide switcher control being set to 'yes'
                ],
			]
		);
        $this->add_control(
			'show_redirectafterlogout',
			[
				'label' => esc_html__( 'Redirect After Logout', 'login-scripts' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'On', 'login-scripts' ),
				'label_off' => esc_html__( 'Off', 'login-scripts' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
        $this->add_control(
			'logout_redirect_link',
			[
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'login-scripts' ),
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					// 'custom_attributes' => '',
				],
				'label_block' => true,
                'condition' => [
                    'show_redirectafterlogout' => 'yes', // Make input_label1 control dependent on the label_showhide switcher control being set to 'yes'
                ],
			]
		);
        $this->end_controls_section();
        // Starts Style tab 
        $this->start_controls_section(
            'formstyle_section',
            [
                'label' => esc_html__( 'Form', 'login-scripts' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
            );
            $this->add_control(
                'row_gap',
                [
                    'label' => esc_html__( 'Row Gap', 'login-scripts' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
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
            $this->add_control(
                'links_color',
                [
                    'label' => esc_html__( 'Links Color', 'login-scripts' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .your-class' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'linkshover_color',
                [
                    'label' => esc_html__( 'Links Hover Color', 'login-scripts' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .your-class' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->end_controls_section();
            $this->start_controls_section(
                'fieldstyle_section',
                [
                    'label' => esc_html__( 'Fields', 'login-scripts' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                ]
                );
                $this->add_control(
                    'fieldstext_color',
                    [
                        'label' => esc_html__( 'Text Color', 'login-scripts' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .text-color' => 'color: {{VALUE}}',
                        ],
                    ]
                );
                $this->add_control(
                    'input_text_color',
                    [
                        'label' => esc_html__( 'Input Text Color', 'login-scripts' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .inputtext-color' => 'color: {{VALUE}}',
                        ],
                    ]
                );
                $this->add_group_control(
                    \Elementor\Group_Control_Typography::get_type(),
                    [
                        'name' => 'fields_typo',
                        'selector' => '{{WRAPPER}} .filed-typo',
                    ]
                );
                $this->add_group_control(
                    \Elementor\Group_Control_Background::get_type(),
                    [
                        'name' => 'fields_bgcolor',
                        'types' => [ 'classic', 'gradient' ],
                        'selector' => '{{WRAPPER}} .input-bgcolor',
                    ]
                );
                $this->add_control(
                    'fieldborder_color',
                    [
                        'label' => esc_html__( 'Border Color', 'login-scripts' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .input-border-color' => 'border-color: {{VALUE}}',
                        ],
                    ]
                );
                $this->add_control(
                    'field_border_width',
                    [
                        'label' => esc_html__( 'Border Width', 'login-scripts' ),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                        'selectors' => [
                            '{{WRAPPER}} .input-border-width' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );
                $this->add_control(
                    'field_border_radius',
                    [
                        'label' => esc_html__( 'Border Radius', 'login-scripts' ),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                        'selectors' => [
                            '{{WRAPPER}} .input-border-radius' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );
                $this->add_control(
                    'field_spacing',
                    [
                        'label' => esc_html__( 'Label Spacing', 'login-scripts' ),
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
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
                    'btnstyle_section',
                    [
                        'label' => esc_html__( 'Buttons', 'login-scripts' ),
                        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    ]
                    );
                $this->start_controls_tabs(
                    'style_tabs'
                );
        
                $this->start_controls_tab(
                    'style_normal_tab',
                    [
                        'label' => esc_html__( 'Normal', 'login-scripts' ),
                    ]
                );
                $this->add_control(
                    'submitbtn_text_color',
                    [
                        'label' => esc_html__( 'Text Color', 'login-scripts' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .btn-settings' => 'color: {{VALUE}}',
                        ],
                    ]
                );
                $this->add_group_control(
                    \Elementor\Group_Control_Typography::get_type(),
                    [
                        'name' => 'submitbtn_typo',
                        'selector' => '{{WRAPPER}} .btn-settings',
                    ]
                );
                $this->add_group_control(
                    \Elementor\Group_Control_Background::get_type(),
                    [
                        'name' => 'submitbtn_bgcolor',
                        'types' => [ 'classic', 'gradient' ],
                        'selector' => '{{WRAPPER}} .btn-settings',
                    ]
                );
                $this->add_control(
                    'btn_border_settings',
                    [
                        'label' => esc_html__( 'Border', 'login-scripts' ),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                        'selectors' => [
                            '{{WRAPPER}} .btn-settings' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );
                $this->add_control(
                    'btn_borderradius_settings',
                    [
                        'label' => esc_html__( 'Border Radius', 'login-scripts' ),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                        'selectors' => [
                            '{{WRAPPER}} .btn-settings' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );
                $this->add_control(
                    'btnborder_color',
                    [
                        'label' => esc_html__( 'Border Color', 'login-scripts' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .btn-settings' => 'border-color: {{VALUE}}',
                        ],
                    ]
                );
                $this->add_control(
                    'btn_padding_settings',
                    [
                        'label' => esc_html__( 'Padding', 'login-scripts' ),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                        'selectors' => [
                            '{{WRAPPER}} .btn-settings' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );
                $this->end_controls_tab();
                $this->start_controls_tab(
                    'style_hover_tab',
                    [
                        'label' => esc_html__( 'Hover', 'login-scripts' ),
                    ]
                );
                $this->add_control(
                    'submitbtn_text_hovercolor',
                    [
                        'label' => esc_html__( 'Text Color', 'login-scripts' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .btn-settings:hover' => 'color: {{VALUE}}',
                        ],
                    ]
                );
                $this->add_group_control(
                    \Elementor\Group_Control_Background::get_type(),
                    [
                        'name' => 'submitbtnhover_bgcolor',
                        'types' => [ 'classic', 'gradient' ],
                        'selector' => '{{WRAPPER}} .btn-settings:hover',
                    ]
                );
                $this->end_controls_tab();
                $this->end_controls_section();
                $this->start_controls_section(
                    'loggedin_section',
                    [
                        'label' => esc_html__( 'Logged In Message', 'login-scripts' ),
                        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    ]
                    );
                    $this->add_control(
                        'loggedin_textcolor',
                        [
                            'label' => esc_html__( 'Text Color', 'login-scripts' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .your-class' => 'color: {{VALUE}}',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        \Elementor\Group_Control_Typography::get_type(),
                        [
                            'name' => 'loddedin_typo',
                            'selector' => '{{WRAPPER}} .your-class',
                        ]
                    );
    }
    /**
     * Render the widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     *
     * @access protected
     */
    protected function render()
    {
        // Get the Elementor settings
        $settings = $this->get_settings();
        // Include the login form file
        include(LOGIN_SCRIPTS_PLUGIN_PATH . 'public/login-form.php');
    }
}
