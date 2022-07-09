<?php
/*
Plugin Name: SM WooCommerce Data
Author: Paweł Sawczuk
Version: 1.0
Description: Plugin to show data from external API
*/

namespace Sm;
const SM_TEXTDOMAIN = 'sm-woocommerce-data';
const SM_VERSION = '1.0';
const SM_PLUGIN_DIR = WP_PLUGIN_DIR . '/sm-woo-data-plugin';
defined( 'ABSPATH' ) || exit;

spl_autoload_register( function ( $class ) {
    $baseDirectory = __DIR__ . '/classes';
    $namespacePrefixLength = strlen( __NAMESPACE__ );
    if ( strncmp( __NAMESPACE__, $class, $namespacePrefixLength ) !== 0 ) {
        return;
    }
    $relativeClassName = substr( $class, $namespacePrefixLength );
    $classFilename = $baseDirectory . str_replace( '\\', '/', $relativeClassName ) . '.php';

    if ( file_exists( $classFilename ) ) {
        require $classFilename;
    }
} );

new SmMain();



