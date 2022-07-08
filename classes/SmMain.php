<?php

namespace Sm;
class SmMain {

    private static $requestUrl = 'https://httpbin.org/post';
    private static $requestLogin = 'login_example'; // if autorized based login/pass
    private static $requestPassword = 'pass_example'; // if autorized based login/pass
    private static $requestKey = 'XSCSASA242880JFEIJS9SF9SF_EXAMPLE';
    private static $loginInUserId;
    private static $loginInUserMetaName = 'test_api_resonse';

    public function __construct(){
        $this::$loginInUserId = get_current_user_id();
        add_action('wp_enqueue_scripts', array($this, 'loadAssets'));
        $init = new SmPanel();
    }
    public function loadAssets(){
        wp_enqueue_script('sm_custom_script', plugin_dir_url('/assets/script.js'), array(), '1', true);
        wp_localize_script( 'sm_custom_script', 'ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ), 'nonce' => wp_create_nonce('ajax-nonce') ) );
    }
}
