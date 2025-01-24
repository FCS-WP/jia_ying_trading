<?php
/**
 * CW Ajax Product Filter by Attribute
 */
if (!class_exists('Themesflat_Filter_Price')) {
	class Themesflat_Filter_Price extends WP_Widget {


		/**
		 * Register widget with WordPress.
		 */
		function __construct() {
			parent::__construct(
				'widget_filter_price', // Base ID
				__('Themesflat_Filter_Price', 'themesflat-core'), // Name
				array('description' => __('Filter woocommerce products by price.', 'themesflat-core')) // Args
			);
		}

		/**
		 * Front-end display of widget.
		 *
		 * @see WP_Widget::widget()
		 *
		 * @param array $args     Widget arguments.
		 * @param array $instance Saved values from database.
		 */
		public function widget($args, $instance) {
			if (!is_post_type_archive('product') && !is_tax(get_object_taxonomies('product'))) {
				return;
			}			
		?>	 
		<div class="widget widget_filter_price">
		<?php
			if (!empty($instance['title']) ) {
				echo $args['before_title'] ."<span>". apply_filters('widget_title', $instance['title'])."</span>". $args['after_title'];
			}

			

			$post_page = themesflat_get_opt('shop_products_per_page');
			?>
				<div class="slider-filter">				
					<div id="slider-range" class="slider-range"  data-min='0'  data-max='<?php if (!empty($instance['max']) ) { echo esc_attr($instance['max']);} else { echo esc_html( '2000', 'themesflat-core' ) ;}?>' ></div>
					<div class=" slider-labels">
						<div class="caption">
							<span id="slider-range-value1" class="slider-range-value1"></span>
							<span id="slider-range-value2" class="slider-range-value2"></span>
						</div>
						<div class="tax-filter-rating price" data-post='<?php echo $post_page; ?>'><?php printf(__('Filter', 'themesflat-core')); ?> </div>
					</div>
				</div>
		</div> 
			<?php
		}

		/**
		 * Back-end widget form.
		 *
		 * @see WP_Widget::form()
		 *
		 * @param array $instance Previously saved values from database.
		 */
		public function form($instance) {
			?>
			<p>
				<label for="<?php echo $this->get_field_id('title'); ?>"><?php printf(__('Title:', 'themesflat-core')); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo (!empty($instance['title']) ? esc_attr($instance['title']) : __( 'Price', 'themesflat-core' )); ?>">
			</p>

			<p>
				<label for="<?php echo $this->get_field_id('max'); ?>"><?php printf(__('Max value slider', 'themesflat-core')); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id('max'); ?>" name="<?php echo $this->get_field_name( 'max' ); ?>" type="text" value="<?php echo (!empty($instance['max']) ? esc_attr($instance['max']) : __( '2000', 'themesflat-core' )); ?>">
			</p>

			
			
			<?php
		}

		/**
		 * Sanitize widget form values as they are saved.
		 *
		 * @see WP_Widget::update()
		 *
		 * @param array $new_instance Values just sent to be saved.
		 * @param array $old_instance Previously saved values from database.
		 *
		 * @return array Updated safe values to be saved.
		 */
		public function update($new_instance, $old_instance) {
			$instance = array();
			$instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
			$instance['max'] = (!empty($new_instance['max'])) ? strip_tags($new_instance['max']) : '5000';

			return $instance;
		}
	}
}


add_action( 'widgets_init', 'themesflat_register_attribute_filter_price_widget' );

/**
 * Register widget
 *
 * @return void
 * @since 1.0
 */
function themesflat_register_attribute_filter_price_widget() {
    register_widget( 'Themesflat_Filter_Price' );
}