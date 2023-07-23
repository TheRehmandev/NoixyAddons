<?php

/**
 * Widgets Loader class.
 *
 * @category   Class
 * @package    LoginScripts
 * @subpackage WordPress
 * @author     Noixtech <hi@noixtech.com>
 * @copyright  2023 Noixtech.com/LoginScripts
 * @since      1.0.0
 * php version  7.4 
 */

if (!defined('ABSPATH')) {
    // Exit if accessed directly.
    exit;
}
/**
 * Plugin Loader Class
 *
 * The init class that runs the LoginScripts plugin.
 * Intended To make sure that the plugin's minimum requirements are met.
 *
 */
final class LOGIN_SCRIPTS
{

    /**
     * Minimum Elementor Version
     *
     * @since 1.0.0
     * @var string Minimum Elementor version required to run the plugin.
     */
    const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

    public function __construct()
    {
        add_action('init', array($this, 'plugin_init'));
        add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'));
    }

    public function plugin_init()
    {
        $this->register_scripts();
        $this->register_styles();
        $this->include_files();
        $this->load_elementor_widgets();
    }

    public function register_scripts()
    {
        wp_register_script('your-login-script', LOGIN_SCRIPTS_ASSETS_PATH . 'js/login-script.js', array('jquery'), '1.0.0', true);
    }

    public function register_styles()
    {
        wp_register_style('your-login-style', LOGIN_SCRIPTS_ASSETS_PATH . 'css/login-script.css', array(), '1.0.0');
    }

    public function enqueue_scripts()
    {
        
            wp_enqueue_script('your-login-script');
            wp_enqueue_style('your-login-style');
    }
    public function include_files()
    {
        require_once(LOGIN_SCRIPTS_PLUGIN_PATH . 'inc/render_login_form.php');
    }



    /**
     * Initialize the plugin
     *
     * Validates that Elementor is already loaded.
     * Checks for basic plugin requirements, if one check fail don't continue,
     * if all check have passed include the plugin class.
     *
     * Fired by `plugins_loaded` action hook.
     *
     * @since 1.0.0
     * @access public
     */
    public function load_elementor_widgets()
    {
        // Check if Elementor installed and activated.
        if (!did_action('elementor/loaded')) {
            add_action('admin_notices', array($this, 'login_scripts_notice_missing_main_plugin'));
            return;
        }

        // Check for required Elementor version.
        if (!version_compare(ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=')) {
            add_action('admin_notices', array($this, 'login_scripts_minimum_elementor_version'));
            return;
        }

        // Once we get here, We have passed all validation checks so we can safely include our widgets.
        require_once(LOGIN_SCRIPTS_PLUGIN_PATH . 'inc/elementor-widgets.php');
    }

    /**
     * Admin notice
     * Warning when the site doesn't have Elementor installed or activated.
     *
     * @since 1.0.0
     *
     * @access public
     */
    function login_scripts_notice_missing_main_plugin()
    {

        $message = sprintf(
            __('%1$s requires %2$s to be installed and activated to function properly. %3$s', 'login-scripts'),
            '<strong>' . __('Login Scripts', 'login-scripts') . '</strong>',
            '<strong>' . __('Elementor', 'login-scripts') . '</strong>',
            '<a href="' . esc_url(admin_url('plugin-install.php?s=Elementor&tab=search&type=term')) . '">' . __('Please click here to install/activate Elementor', 'login-scripts') . '</a>'
        );

        printf('<div class="notice notice-warning is-dismissible"><p style="padding: 5px 0">%1$s</p></div>', $message);
    }

    /**
     * Admin notice
     *
     * Warning when the site doesn't have a minimum required Elementor version.
     *
     * @since 1.0.0
     * @access public
     */
    public function login_scripts_minimum_elementor_version()
    {

        if (isset($_GET['activate'])) unset($_GET['activate']);

        $message = sprintf(
            /* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
            esc_html__('"%1$s" requires "%2$s" version %3$s or greater.', 'custom-widgets'),
            '<strong>' . esc_html__('Custom Widgets For Elementor', 'custom-widgets') . '</strong>',
            '<strong>' . esc_html__('Elementor', 'custom-widgets') . '</strong>',
            self::MINIMUM_ELEMENTOR_VERSION
        );

        printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
    }
}

$login_scripts = new LOGIN_SCRIPTS();