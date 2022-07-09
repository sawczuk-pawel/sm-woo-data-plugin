<?php
namespace Sm;
defined( 'ABSPATH' ) || exit;

/**
 * Class SmWidget
 * @package Sm
 */
class SmWidget extends \WP_Widget{
    /**
     * SmWidget constructor.
     */
    function __construct() {
        parent::__construct(
            'sm_widget',
            __('SM WooCommerce Data', SM_TEXTDOMAIN),
            array( 'description' => __( 'Sample widget for SM WooCommerce Data plugin', SM_TEXTDOMAIN ), )
        );
    }

    /**
     * Creating widget front-end
     * @param array $args
     * @param array $instance
     */
    public function widget($args, $instance ) {
        $userId = SmUser::getUserId();
        if($userId){
            $data = SmFakeApi::getDataByUserId($userId);
        }
        echo $args['before_widget'];
        echo SmTemplate::renderWidget($data);
        echo $args['after_widget'];
    }

}



