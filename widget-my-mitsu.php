<?php
/*
Plugin Name: widget for My Mitsu Estimation Form
Plugin URI:
Description: You can embed an estimation(calculation) form by putting a widget. An estimation form is provided by a webservice in Japan called My Mitsu.
Version: 1.1
Author: Fumito MIZUNO
Author URI: https://my-mitsu.com/
License: GPL ver.2 or later
*/

add_action( 'widgets_init', 'mymitsu_widget_register' );

function mymitsu_widget_register() {
    register_widget( 'MyMitsu_Widget' );
}

class MyMitsu_Widget extends WP_Widget {

    function __construct() {
        parent::__construct(
            'mymitsu_widget',
            __( 'My Mitsu Widget', 'mymitsu_widget' ),
            array( 'description' => __( 'Widget for My Mitsu Estimation Form', 'mymitsu_widget' ), )
        );
    }

    public function widget( $args, $instance ) {
        echo $args['before_widget'];

        $format = '<iframe src="%s" id="%s" width="%d" height="%d"></iframe>';

        echo sprintf( $format,
            esc_url( $instance['url'] ),
            sanitize_html_class( $instance['id'], 'mymitsu' ),
            intval( $instance['width'] ),
            intval( $instance['height'] )
        );

        echo $args['after_widget'];
    }

    public function form( $instance ) {
        $url = ! empty( $instance['url'] ) ? $instance['url'] : apply_filters( 'mymitsu_widget_default_url', 'https://my-mitsu.jp/estimation/274' );
        $width = ! empty( $instance['width'] ) ? $instance['width'] : apply_filters( 'mymitsu_widget_default_width', 320 );
        $height = ! empty( $instance['height'] ) ? $instance['height'] : apply_filters( 'mymitsu_widget_default_height', 320 );
        $id = ! empty( $instance['id'] ) ? $instance['id'] : apply_filters( 'mymitsu_widget_default_id', 'mymitsu' );
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'url' ); ?>"><?php _e( 'URL for My Mitsu', 'mymitsu_widget' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'url' ); ?>" name="<?php echo $this->get_field_name( 'url' ); ?>" type="text" value="<?php echo esc_attr( $url ); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'width' ); ?>"><?php _e( 'Width', 'mymitsu_widget'  ); ?></label>
            <input size="4" id="<?php echo $this->get_field_id('width'); ?>" name="<?php echo $this->get_field_name('width'); ?>" type="text" value="<?php echo intval($width); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'height' ); ?>"><?php _e( 'Height', 'mymitsu_widget'  ); ?></label>
            <input size="4" id="<?php echo $this->get_field_id('height'); ?>" name="<?php echo $this->get_field_name('height'); ?>" type="text" value="<?php echo intval($height); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'id' ); ?>"><?php _e( 'id', 'mymitsu_widget'  ); ?></label>
            <input size="4" id="<?php echo $this->get_field_id('id'); ?>" name="<?php echo $this->get_field_name('id'); ?>" type="text" value="<?php echo esc_attr($id); ?>" />
        </p>
     <?php
    }


} 