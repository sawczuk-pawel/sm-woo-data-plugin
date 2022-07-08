<?php

namespace Sm;
/**
 * Class SmMain
 * @package Sm
 */
class SmMain {
    /**
     * @var string
     */
    private static $requestUrl = 'https://httpbin.org/post';
    /**
     * @var string
     */
    private static $requestLogin = 'login_example'; // if autorized based login/pass
    /**
     * @var string
     */
    private static $requestPassword = 'pass_example'; // if autorized based login/pass
    /**
     * @var string
     */
    private static $requestKey = 'XSCSASA242880JFEIJS9SF9SF_EXAMPLE';
    /**
     * @var int
     */
    private static $loginInUserId;
    /**
     * @var string
     */
    private static $loginInUserMetaName = 'test_api_resonse';
    /**
     * SmMain constructor.
     */
    public function __construct(){
        if($this->checkWoocmmerceStatus()){
            $this::$loginInUserId = get_current_user_id();
            add_action('wp_enqueue_scripts', array($this, 'loadAssets'));
            $init = new SmPanel();
        }
        else{
            add_action( 'admin_notices', array($this, 'showErrorNotice') );
        }
    }

    /**
     * Show notice in admin panel if WooCommerce not active
     */
    public function showErrorNotice(){
        echo '<div class="notice notice-error is-dismissible">
      <p><strong>SM WooCommerce Data</strong> ' .
      __('plugin for correct work needs active WooCommerce!') . '</p>
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
        wp_enqueue_script('sm_custom_script', plugin_dir_url('/assets/script.js'), array(), '1', true);
    }
}
