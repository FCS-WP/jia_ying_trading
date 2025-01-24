<?php
class Themesflat_Filter_Categories extends WP_Widget {
    /**
     * Holds widget settings defaults, populated in constructor.
     *
     * @var array
     */
    protected $defaults;

    /**
     * Constructor
     *
     * @return Themesflat_Filter_Categories
     */
    function __construct() {
        $this->defaults = array(
            'title'         => 'Filter Categories',
            'count'         => 10,
            // 'custom_ids'    => '',
            // 'child_of'      => 'false',
            // 'show_count'    => 0
        );
        parent::__construct(
            'widget_filter_categories',
            esc_html__( 'Themesflat - Filter Categories', 'themesflat-core' ),
            array(
                'classname'   => 'widget_filter_categories',
                'description' => esc_html__( 'Filter woocommerce products by categories.(Not show category childs and empty)', 'themesflat-core' )
            )
        );
    }

    /**
     * Display widget
     */
    function widget( $args, $instance ) {
        $instance = wp_parse_args( $instance, $this->defaults );
        extract( $instance );
        extract( $args );
        $classes[] = 'widget widget_filter_categories ';
        echo wp_kses_post( $before_widget );
        ?>
        <div class="<?php echo esc_attr(implode(' ', $classes)) ;?>">
        <?php 
            if ( !empty($title) ) echo wp_kses_post($before_title).esc_html($title).wp_kses_post($after_title);
            
            if ( !empty($count) ) {$count = $count ;} else $count = 10;
            ?>
            
			<?php
				$product_categories = get_terms(array(
                    'taxonomy' => 'product_cat',
                    'hide_empty' => true,
                ));
                echo '<ul>';
                echo print_product_categories($product_categories);
                echo '</ul>';

				?>
        </div>
        <?php echo wp_kses_post( $after_widget );
    }

    /**
     * Update widget
     */
    function update( $new_instance, $old_instance ) {
        $instance                   = $old_instance;
        $instance['title']          = strip_tags( $new_instance['title'] );
        $instance['count']          = strip_tags( $new_instance['count'] );

        
        return $instance;
    }

    /**
     * Widget setting
     */
    function form( $instance ) {
        $instance = wp_parse_args( $instance, $this->defaults );
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'themesflat-core' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>">
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'count' ) ); ?>"><?php esc_html_e( 'Count:', 'themesflat-core' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'count' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'count' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['count'] ); ?>">
        </p>
        
    <?php
    }
}

add_action( 'widgets_init', 'themesflat_register_filter_categories' );

/**
 * Register widget
 *
 * @return void
 * @since 1.0
 */
function themesflat_register_filter_categories() {
    register_widget( 'Themesflat_Filter_Categories' );
}