<?php
namespace Sm;

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
        $title = apply_filters( 'widget_title', $instance['title'] );
        echo $args['before_widget'];
        if ( ! empty( $title ) )
            echo $args['before_title'] . $title . $args['after_title'];
        echo __( 'Hello, World!', 'wpb_widget_domain' );
        echo $args['after_widget'];
    }

    /**
     * Widget Backend
     * @param array $instance
     * @return string|void
     */
    public function form($instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }
        else {
            $title = __( 'New title', SM_TEXTDOMAIN);
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', SM_TEXTDOMAIN ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <?php
    }

    /**
     * Updating widget replacing old instances with new
     * @param array $new_instance
     * @param array $old_instance
     * @return array
     */
    public function update($new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        return $instance;
    }
}



