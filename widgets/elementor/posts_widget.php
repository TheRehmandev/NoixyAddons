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
 class posts_widget extends Widget_Base
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
        return 'posts_widget';
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
        return __('Posts Layouts', 'login-scripts');
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
        return 'eicon-grid';
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
        return ['posts', 'grid posts', 'block posts', 'post layout'];
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
        // Start Section
        $this->start_controls_section(
            'section_content',
            [
                'label' => __('Posts Layouts', 'login-scripts'),
            ]
        );
        // Post Layout
        $this->add_control(
            'post_layout',
            [
                'label' => __('Post Layout', 'login-scripts'),
                'type' => Controls_Manager::SELECT,
                'default' => 'grid',
                'options' => [
                    'grid' => __('Grid', 'login-scripts'),
                    'list' => __('List', 'login-scripts'),
                ],
            ]
        );
        // End Section
        $this->end_controls_section();
    }
    protected function grid_post_layout($settings){
        include_once(LOGIN_SCRIPTS_PLUGIN_PATH . 'public/post-widget/posts-grid.php');
    }
    protected function list_post_layout($settings){
        include_once(LOGIN_SCRIPTS_PLUGIN_PATH . 'public/post-widget/posts-list.php');
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
        // Post Layout
        $post_layout = $settings['post_layout'];
        // Get the posts
        // $posts = get_posts(array(
        //     'posts_per_page' => 3,
        //     'post_type' => 'post',
        //     'post_status' => 'publish',
        // ));
        // If there are posts
        if ('grid' === $post_layout) {
            $this->grid_post_layout($settings);
        }
        elseif ('list' === $post_layout) {
           $this->list_post_layout($settings);
        }
        
        
    }
 }