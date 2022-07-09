<?php
namespace Sm;
defined( 'ABSPATH' ) || exit;

/**
 * Class SmMain
 * @package Sm
 */
class SmMain {
    /**
     * SmMain constructor.
     */
    public function __construct(){
        add_action( 'init', array($this, 'init'));
        add_action( 'widgets_init', array($this, 'initWidget') );
    }

    /**
     * Initialize loading plugin
     */
    public function init(){
        if($this->checkWoocmmerceStatus()){
            SmUser::setUserId();
            add_action('wp_enqueue_scripts', array($this, 'loadAssets'));
            new SmPanel();
        }
        else{
            add_action( 'admin_notices', array($this, 'showErrorNotice') );
        }
    }

    public function initWidget(){
        register_widget( 'Sm\SmWidget' );
    }

    /**
     * Show notice in admin panel if WooCommerce not active
     */
    public function showErrorNotice(){
        echo '<div class="notice notice-error is-dismissible">
      <p><strong>SM WooCommerce Data</strong> ' .
      __('plugin for correct work needs active WooCommerce!', SM_TEXTDOMAIN) . '</p>
      </div>';
    }

    /**
     * Check WooCommerce plugin status
     * @return bool
     */
    private function checkWoocmmerceStatus(){
        if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Load required assets
     */
    public function loadAssets(){
        wp_enqueue_script('sm_custom_script', plugin_dir_url( __FILE__ ) . '/../../assets/scripts.js', array(), SM_VERSION, true);
    }
}
