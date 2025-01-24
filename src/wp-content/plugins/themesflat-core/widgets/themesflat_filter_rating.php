<?php
/**
 * CW Ajax Product Filter by Attribute
 */
if (!class_exists('Themesflat_Filter_Rating')) {
	class Themesflat_Filter_Rating extends WP_Widget {


		/**
		 * Register widget with WordPress.
		 */
		function __construct() {
			parent::__construct(
				'widget_filter_rating', // Base ID
				__('Themesflat_Filter_Rating', 'themesflat-core'), // Name
				array('description' => __('Filter woocommerce products by rating.', 'themesflat-core')) // Args
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
		<div class="widget widget_filter_rating">
		<?php
			if (!empty($instance['title']) ) {
				echo $args['before_title'] ."<span>". apply_filters('widget_title', $instance['title'])."</span>". $args['after_title'];
			}

			$post_page = themesflat_get_opt('shop_products_per_page');
			?>
			<ul>
				<li class="five-star">
					<a href="#" class="tax-filter-rating rating" data-star="5"  data-post='<?php echo $post_page; ?>'><i class="fa-star"></i><i class="fa-star"></i><i class="fa-star"></i><i class="fa-star"></i><i class="fa-star"></i></a>
				</li>
				<li class="four-star">
					<a href="#" class="tax-filter-rating rating" data-star="4"  data-post='<?php echo $post_page; ?>'><i class="fa-star"></i><i class="fa-star"></i><i class="fa-star"></i><i class="fa-star"></i><i class="fa-star color-2"></i> <?php esc_html_e( ' & Up', 'themesflat-core' ) ;?></a>
				</li>
				<li class="three-star">
					<a href="#" class="tax-filter-rating rating" data-star="3"  data-post='<?php echo $post_page; ?>'><i class="fa-star"></i><i class="fa-star"></i><i class="fa-star"></i><i class="fa-star color-2"></i><i class="fa-star color-2"></i> <?php esc_html_e( ' & Up', 'themesflat-core' ) ;?></a>
				</li>
				<li class="two-star">
					<a href="#" class="tax-filter-rating rating" data-star="2"  data-post='<?php echo $post_page; ?>'><i class="fa-star"></i><i class="fa-star"></i><i class="fa-star color-2"></i><i class="fa-star color-2"></i><i class="fa-star color-2"></i> <?php esc_html_e( ' & Up', 'themesflat-core' ) ;?></a>
				</li>
				<li class="one-star">
					<a href="#" class="tax-filter-rating rating" data-star="1"  data-post='<?php echo $post_page; ?>'><i class="fa-star "></i><i class="fa-star color-2"></i><i class="fa-star color-2"></i><i class="color-2 fa-star"></i><i class="color-2 fa-star"></i> <?php esc_html_e( ' & Up', 'themesflat-core' ) ;?></a>
				</li>
			</ul>
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
				<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo (!empty($instance['title']) ? esc_attr($instance['title']) : __( 'Customer Review', 'themesflat-core' )); ?>">
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
			$instance['attr_name'] = (!empty($new_instance['attr_name'])) ? strip_tags($new_instance['attr_name']) : '';

			return $instance;
		}
	}
}


add_action( 'widgets_init', 'themesflat_register_attribute_filter_rating_widget' );

/**
 * Register widget
 *
 * @return void
 * @since 1.0
 */
function themesflat_register_attribute_filter_rating_widget() {
    register_widget( 'Themesflat_Filter_Rating' );
}