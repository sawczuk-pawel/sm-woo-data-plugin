<?php
/*
Plugin Name: SM WooCommerce Data
Author: Paweł Sawczuk
Version: 1.0
Description: Plugin to show data from external API
*/

namespace Sm;
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

function smInit(){
    new SmMain();
}
add_action('init', 'Sm\smInit');



