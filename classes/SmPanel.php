<?php

namespace Sm;
class SmPanel{
    public function __construct(){
        add_action( 'init', array($this, 'addEndpoint') );
        add_filter( 'query_vars', array($this, 'initQueryVars'), 0 );
        add_filter( 'woocommerce_account_menu_items', array($this, 'addLinkToMenu') );
        add_action( 'woocommerce_account_sm-woo_endpoint', array($this, 'loadContent') );
    }

    function addEndpoint() {
        add_rewrite_endpoint( 'sm-woo', EP_ROOT | EP_PAGES );
    }

    function initQueryVars( $vars ) {
        $vars[] = 'sm-woo';
        return $vars;
    }

    function addLinkToMenu( $items ) {
        $items['sm-woo'] = 'SM Data';
        return $items;
    }

    function loadContent() {
        echo 'Example content';
    }
}