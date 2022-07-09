<?php
namespace Sm;
defined( 'ABSPATH' ) || exit;

/**
 * Class SmAjax
 * @package Sm
 */
class SmAjax{
    /**
     * SmAjax constructor.
     */
    public function __construct(){
        add_action('wp_ajax_sm-woo', array( $this, 'getDataAjax' ));
    }

    /**
     * Check WP Nonce is correct
     * @param $nonce
     */
    public function verifyNonce($nonce){
        if ( ! wp_verify_nonce( $nonce, 'ajax-nonce' ) )
            die ( 'Busted!');
    }

    /**
     * Fuction to AJAX request
     */
    public function getDataAjax(){
        self::verifyNonce($_POST['nonce']);
        $data = esc_html($_POST['data']);
        $user_id = SmUser::getUserId();
        $data = explode(',', $data);

        $data = array_filter($data, 'strlen');
        $data = array_values($data);

        $output = array(
            'user_id' => $user_id,
            'data' => $data
        );

        $api = new SmApi();
        $api->loadData(json_encode($output));
        if($api->sendRequest()){
            wp_send_json_success(array(
                'status' => __('Data sended!', SM_TEXTDOMAIN),
                'class' => 'woocommerce-message'
            ));
        }
        else{
            wp_send_json_error(array(
                'status' => __('Please try again later!', SM_TEXTDOMAIN),
                'class' => 'woocommerce-error'
            ));
        }
        wp_die();
    }

}