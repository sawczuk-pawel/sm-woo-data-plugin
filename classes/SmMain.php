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
        $this::$loginInUserId = get_current_user_id();
        add_action('wp_enqueue_scripts', array($this, 'loadAssets'));
        $init = new SmPanel();
    }

    /**
     * Load required assets
     */
    public function loadAssets(){
        wp_enqueue_script('sm_custom_script', plugin_dir_url('/assets/script.js'), array(), '1', true);
        wp_localize_script( 'sm_custom_script', 'ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ), 'nonce' => wp_create_nonce('ajax-nonce') ) );
    }
}
