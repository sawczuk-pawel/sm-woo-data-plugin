<?php
namespace Sm;
defined( 'ABSPATH' ) || exit;

/**
 * Class SmPanel
 * @package Sm
 */
class SmPanel{
    /**
     * SmPanel constructor.
     */
    public function __construct(){
        add_action( 'init', array($this, 'addEndpoint') );
        add_filter( 'query_vars', array($this, 'initQueryVars'), 0 );
        add_filter( 'woocommerce_account_menu_items', array($this, 'addLinkToMenu') );
        add_action( 'woocommerce_account_sm-woo_endpoint', array($this, 'loadContent') );
    }

    /**
     * Adds an endpoint
     */
    function addEndpoint() {
        add_rewrite_endpoint( 'sm-woo', EP_ROOT | EP_PAGES );
    }

    /**
     * Add to query vars new item
     * @param $vars
     * @return mixed
     */
    function initQueryVars($vars ) {
        $vars[] = 'sm-woo';
        return $vars;
    }

    /**
     * Add link to sidbar menu in 'My Account'
     * @param $items
     * @return mixed
     */
    function addLinkToMenu($items ) {
        $items['sm-woo'] = 'SM Data';
        return $items;
    }

    /**
     * Load panel content
     */
    function loadContent() {
        echo 'Example content';
    }
}