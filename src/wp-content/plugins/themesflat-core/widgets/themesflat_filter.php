<?php
/**
 * CW Ajax Product Filter by Attribute
 */
if (!class_exists('Themesflat_Filter')) {
	class Themesflat_Filter extends WP_Widget {


		/**
		 * Register widget with WordPress.
		 */
		function __construct() {
			parent::__construct(
				'widget_filter', // Base ID
				__('Themesflat_Filter_Attribute', 'themesflat-core'), // Name
				array('description' => __('Filter woocommerce products by attribute.', 'themesflat-core')) // Args
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
			
			
			if ( (empty($instance['attr_name']) && empty($instance['query_type'])) || !taxonomy_exists('pa_' . $instance['attr_name']) ) {
				return;
			}

			$attribute_name = $instance['attr_name'];
			$taxonomy   = 'pa_' . $attribute_name;
			


			?>
			<div class="widget widget-filter-attribute <?php echo $instance['attr_name']; ?>">
			<?php

			if (!empty($instance['title']) && !empty($instance['attr_name'])) {
				echo $args['before_title'] ."<span>". apply_filters('widget_title', $instance['title'])."</span>". $args['after_title'];
			}

			$post_page = themesflat_get_opt('shop_products_per_page');

			$colors = get_terms( array(
				'taxonomy' =>  $taxonomy,
				'hide_empty' => false,
			) );
				if($colors){
				?>
					<?php
						foreach ($colors as $k => $v) {
					?>

						<label class="tax-filter <?php echo $v->slug ?>" data-post='<?php echo $post_page ?>' data-nameatt='<?php echo $v->slug ?>' data-name='<?php echo $taxonomy ?>' data-id='<?php echo $v->term_id ;?>'>
							<span class="custom-check-box">
								<input type="checkbox" data-post='<?php echo $post_page ?>' data-nameatt='<?php echo $v->slug ?>' data-name='<?php echo $taxonomy ?>' data-id='<?php echo $v->term_id ;?>'>
								<span class="btn-checkbox"></span>
							</span>
							<span><?php echo $v->name ;?></span>
						</label>
					<!-- <div class="" style="margin-bottom:10px">
						<a href="#" class="tax-filter" data-post='<?php //echo $post_page ?>' data-name='<?php //echo $taxonomy ?>' data-id='<?php //echo $v->term_id ;?>' data-<?php //echo $taxonomy ?>='<?php //echo $v->term_id ;?>'  > <?php //echo $v->name ;?> </a> 
						</div> -->
					<?php } ?>
			</div>	
			<?php }

			// echo $html;

			// echo $args['after_widget'];
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
				<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo (!empty($instance['title']) ? esc_attr($instance['title']) : __( 'Filter by ', 'themesflat-core' ))  ?>">
			</p>
			<p>
			<?php
			$attribute_taxonomies = wc_get_attribute_taxonomies();
			if (sizeof($attribute_taxonomies) > 0) {
				?>
				<label for="<?php echo $this->get_field_id('attr_name'); ?>"><?php printf(__('Attribute', 'themesflat-core')); ?></label>
				<select class="widefat" id="<?php echo $this->get_field_id('attr_name'); ?>" name="<?php echo $this->get_field_name('attr_name'); ?>">
					<?php
					foreach ($attribute_taxonomies as $taxonomy) {
						echo '<option value="' . $taxonomy->attribute_name . '" ' . ((!empty($instance['attr_name']) && $instance['attr_name'] === $taxonomy->attribute_name) ? 'selected="selected"' : '') . '>' . $taxonomy->attribute_label . '</option>';
					}
					?>
				</select>
				<?php
			} else {
				printf(__('No attribute found!', 'themesflat-core'));
			}
			?>
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


add_action( 'widgets_init', 'themesflat_register_attribute_filter_widget' );

/**
 * Register widget
 *
 * @return void
 * @since 1.0
 */
function themesflat_register_attribute_filter_widget() {
    register_widget( 'Themesflat_Filter' );
}