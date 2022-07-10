<?php
namespace Sm;
defined( 'ABSPATH' ) || exit;

/**
 * Class SmCron
 * @package Sm
 */
class SmCron{

    /**
     * SmCron constructor.
     */
    public function __construct(){
        add_filter('cron_schedules', array($this, 'cronDetails') );
        if( !wp_next_scheduled( 'wp_sm_woo_data_cron' ) ) {
            wp_schedule_event( time(), 'smwoodata', 'wp_sm_woo_data_cron' );
        }
        add_action( 'wp_sm_woo_data_cron', array($this, 'cronData') );
    }

    /**
     * Add some extra schedule options
     * @param $schedules
     * @return mixed
     */
    function cronDetails($schedules) {
        $schedules['smwoodata'] = array('interval' => 15*60, 'display' => 'SM Woo Data Plugin');
        return $schedules;
    }

    /**
     * Init function to load data to transient
     */
    function cronData() {
        SmFakeApi::getData();
    }
}