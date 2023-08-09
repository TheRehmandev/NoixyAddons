<?php
/**
 * Widgets class.
 *
 * @category   Class
 * @package    LoginScripts
 * @subpackage WordPress
 */

namespace LoginScripts;
// Security Note: Blocks direct access to the plugin PHP files.

if (!defined('ABSPATH')) {
    // Exit if accessed directly.
    exit;
}

/**
 * Class Plugin
 *
 * Main Plugin class
 *
 * @since 1.0.0
 */
class Widgets {

    /**
	 *  Plugin class constructor
	 *
	 * Register plugin action hooks and filters
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function __construct() {
		// Register the widgets.
		add_action( 'elementor/widgets/widgets_registered', array( $this, 'register_widgets' ) );
		add_action('elementor/elements/categories_registered', array($this, 'register_elementor_categories'));
	}
    /**
	 * Instance
	 *
	 * @since 1.0.0
	 * @access private
	 * @static
	 *
	 * @var Plugin The single instance of the class.
	 */
	private static $instance = null;    
    /**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return Plugin An instance of the class.
	 */
	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}
    /**
     * Add elementor category
     *
     * @since v1.0.0
     */
    public function register_elementor_categories($elements_manager)
    {
        $elements_manager->add_category(
            'custom-widgets',
            [
                'title' => __('Login Scripts', 'custom-widgets'),
                'icon' => 'fas fa-plug',
            ], 10);
	}
    	/**
	 * Include Widgets files
	 *
	 * Load widgets files
	 *
	 * @since 1.0.0
	 * @access private
	 */
	private function include_widgets_files() {
		require_once LOGIN_SCRIPTS_PLUGIN_PATH . 'widgets/elementor/login_widget.php';
		require_once LOGIN_SCRIPTS_PLUGIN_PATH . 'widgets/elementor/register_widget.php';
		require_once LOGIN_SCRIPTS_PLUGIN_PATH . 'widgets/elementor/posts_widget.php';
	}
    /**
	 * Register Widgets
	 *
	 * Register new Elementor widgets.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function register_widgets() {

		// It's now safe to include Widgets files.
		$this->include_widgets_files();

        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\login_widget() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\register_widget() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\posts_widget() );
    
    }
}
// Instantiate the Widgets class.
Widgets::instance();