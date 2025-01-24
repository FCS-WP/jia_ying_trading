<?php
/*
Plugin Name: List Number Input Widget
Plugin URI:  https://www.example.com/plugin-name/
Description: This plugin creates a list number input widget for WordPress.
Version:     1.0.0
Author:      Your Name
Author URI:  https://www.example.com/
License:     MIT
License URI: https://opensource.org/licenses/MIT
*/

add_action( 'widgets_init', function() {
  register_widget( 'List_Number_Input_Widget' );
} );

class List_Number_Input_Widget extends WP_Widget {

  public function __construct() {
    parent::__construct(
      'list_number_input_widget', // widget ID
      'List Number Input' // widget name
    );
  }

  public function form( $instance ) {
    // outputs the options form on admin
    ?>
    <p>
      Number: <input type="number" name="number" value="<?php echo esc_attr( $instance['number'] ); ?>" />
    </p>
    <?php
  }

  public function update( $new_instance, $old_instance ) {
    // processes widget options to be saved
    $instance = array();
    $instance['number'] = esc_attr( $new_instance['number'] );
    return $instance;
  }

  public function widget( $args, $instance ) {
    // outputs the content of the widget
    echo $args['before_widget'];
    echo $args['before_title'] . $instance['number'] . $args['after_title'];
    echo '<ul>';
    for ($i = 1; $i <= $instance['number']; $i++) {
      echo '<li>' . $i . '</li>';
    }
    echo '</ul>';
    echo $args['after_widget'];
  }

}