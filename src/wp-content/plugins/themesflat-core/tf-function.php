<?php 
if(!function_exists('flat_get_post_page_content')){
    function flat_get_post_page_content( $slug ) {
        $content_post = get_posts(array(
            'name' => $slug,
            'posts_per_page' => 1,
            'post_type' => 'elementor_library',
            'post_status' => 'publish'
        ));
        if (array_key_exists(0, $content_post) == true) {
            $id = $content_post[0]->ID;
            return $id;
        }
    }
}

if(!function_exists('tf_header_enabled')){
    function tf_header_enabled() {
        $header_id = ThemesFlat_Addon_For_Elementor_core::get_settings( 'type_header', '' );
        $status    = false;

        if ( '' !== $header_id ) {
            $status = true;
        }

        return apply_filters( 'tf_header_enabled', $status );
    }
}

if(!function_exists('tf_footer_enabled')){
    function tf_footer_enabled() {
        $header_id = ThemesFlat_Addon_For_Elementor_core::get_settings( 'type_footer', '' );
        $status    = false;

        if ( '' !== $header_id ) {
            $status = true;
        }

        return apply_filters( 'tf_footer_enabled', $status );
    }
}

if(!function_exists('get_header_content')){
    function get_header_content() {
        $tf_get_header_id = ThemesFlat_Addon_For_Elementor_core::tf_get_header_id();
        echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display($tf_get_header_id);
    }
}

if(!function_exists('tf_get_template_widget')){
    function tf_get_template_widget($template_name, $args = null, $return = false){
        $template_file = $template_name . '.php';
        $default_folder = plugin_dir_path(__FILE__) . 'templates/';
        $theme_folder = apply_filters('tf_templates_folder', dirname(plugin_basename(__FILE__)));
        $template = locate_template($theme_folder . '/' . $template_file);
        if (!$template) {
            $template = $default_folder . $template_file;
        }
        if ($args && is_array($args)) {
            extract($args);
        }
        if ($return) {
            ob_start();
        }
        if (file_exists($template)) {
            include $template;
        }
        if ($return) {
            return ob_get_clean();
        }
        return null;
    }
}

// Get post views
// function themesflat_set_post_views($postID) {
//     $count_key = 'themesflat_post_views_count';
//     $count = get_post_meta($postID, $count_key, true);
//     if($count==''){
//         $count = 0;
//         delete_post_meta($postID, $count_key);
//         add_post_meta($postID, $count_key, '0');
//     }else{
//         $count++;
//         update_post_meta($postID, $count_key, $count);
//     }
// }
// remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

// function themesflat_track_post_views ($post_id) {
//     if ( !is_single() ) return;
//     if ( empty ( $post_id) ) {
//         global $post;
//         $post_id = $post->ID;    
//     }
//     themesflat_set_post_views($post_id);
// }
// add_action( 'wp_head', 'themesflat_track_post_views');

// function themesflat_get_post_views($postID){
//     $count_key = 'themesflat_post_views_count';
//     $count = get_post_meta($postID, $count_key, true);
//     if($count==''){
//         delete_post_meta($postID, $count_key);
//         add_post_meta($postID, $count_key, '0');
//         return "0 View";
//     }
//     return $count.' Views';
// }

// Hide render sidebar container css
remove_filter( 'render_block', 'wp_render_layout_support_flag', 10, 2 );
remove_filter( 'render_block', 'gutenberg_render_layout_support_flag', 10, 2 );
remove_filter( 'render_block', 'wp_render_layout_support_flag', 10, 2 );

add_filter( 'render_block', function( $block_content, $block ) {
    if ( $block['blockName'] === 'core/group' ) {
        return $block_content;
    }

    return wp_render_layout_support_flag( $block_content, $block );
}, 10, 2 );

// Filter Ajax tab single

function ajax_tab_filter_get_posts(  ) {

    $tab_filter = $_POST['tab_filter'];
    $post_page = $_POST['post_page'];
    // $style = $_POST['style'];

	global $woocommerce;
    $number = $post_page + 1;
    // WP Query
	wp_reset_query();

    $args = array(
		'post_type' => 'product',
		'posts_per_page' => $post_page,
	);
	
	switch(  $tab_filter ) {
		case 'sale':
            // $query_args['post__in'] = array_merge( array( 0 ), wc_get_product_ids_on_sale() );
            $args = array(
                'post_type'      => 'product',
                'posts_per_page' => $post_page,
                'meta_query'     => array(
                    'relation' => 'OR',
                    array( // Simple products type
                        'key'           => '_sale_price',
                        'value'         => 0,
                        'compare'       => '>',
                        'type'          => 'numeric'
                    ),
                    array( // Variable products type
                        'key'           => '_min_variation_sale_price',
                        'value'         => 0,
                        'compare'       => '>',
                        'type'          => 'numeric'
                    )
                )
            );
        break;

		case 'featured':
			$args['tax_query'][] = array(
				'taxonomy' => 'product_visibility',
				'field'    => 'name',
				'terms'    => 'featured',
				'operator' => 'IN',
				
			);
		break;

		case 'best_selling':
				
            $args['meta_key']='total_sales';
            $args['orderby']='meta_value_num';
            $args['ignore_sticky_posts']   = 1;
            $args['meta_query'] = array();
            $args['meta_query'][] = $woocommerce->query->stock_status_meta_query();
            $args['meta_query'][] = $woocommerce->query->visibility_meta_query();
        break;

        case 'top_rated': 
            $args = array(
                'posts_per_page' => $post_page,
                'no_found_rows'  => 1,
                'post_type'      => 'product',
                'meta_key'       => '_wc_average_rating',
                'orderby'        => 'meta_value_num',
                'meta_query'     => WC()->query->get_meta_query(),
                'tax_query'      => WC()->query->get_tax_query(),
            );
            
        break;

		case 'mixed_order':
			$args['orderby']    = 'rand';
		break;

		default: 
			/* Recent */
			$args['orderby']    = 'date';
			$args['order']      = 'desc';
		break;
	}
    
	
    $query = new WP_Query( $args );
		
	$output = '';
    $count = 0;
    if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
	  ob_start();
	  ?>

      <?php 
       global $product;
       $product_id = $product->get_id();
       $get_id_post_thumbnail = get_post_thumbnail_id();

       if( get_the_post_thumbnail_url()  ){
        $featured_image = sprintf('<img src="%s" alt="image">',get_the_post_thumbnail_url()); ; 
       } else $featured_image ='';
       
       
       
       $stock_sold = ( $total_sales = get_post_meta( $product_id, 'total_sales', true ) ) ? round( $total_sales ) : 0;
       $stock_available = ( $stock = get_post_meta( $product_id, '_stock', true ) ) ? round( $stock ) : 0;
       $total_stock = $stock_sold + $stock_available;
       $percentage = ( $stock_available > 0 ? round($stock_sold/$stock_available * 100) : 0 );
       
       $product_type = $product->get_type();
       $sale_price  = 0;
       $regular_price = 0;
       if($product_type === 'variable'){
           $product_variations = $product->get_available_variations();
           foreach ($product_variations as $kay => $value){
               if($value['display_price'] < $value['display_regular_price']){
                   $sale_price = $value['display_price'];
                   $regular_price = $value['display_regular_price'];
               }
           }

        $product_sale = ( $regular_price > 0 ? round(($regular_price - $sale_price)/$regular_price * 100) : 0 );
        $product_save = ( $regular_price > 0 ? ($regular_price - $sale_price) : 0 );
        //    if($regular_price > $sale_price && $stock != 'outofstock') {
        //        $product_sale = ( $regular_price > 0 ? round(($regular_price - $sale_price)/$regular_price * 100) : 0 );
        //        $product_save = ( $regular_price > 0 ? ($regular_price - $sale_price) : 0 );
        //    }else{
        //        return  '';
        //    }
       }else{		
           $regular_price = get_post_meta( get_the_ID(), '_regular_price', true);
           $sale_price = get_post_meta( get_the_ID(), '_sale_price', true);
           $regular_price = intval(floatval($regular_price));
           $sale_price = intval(floatval($sale_price));
           $regular_price1 = get_post_meta( get_the_ID(), '_regular_price', true);
           $sale_price1 = get_post_meta( get_the_ID(), '_sale_price', true);
           if (isset($sale_price) && $sale_price != 0 && isset($regular_price) && $regular_price != 0 ) {
               $product_sale = ( $regular_price > 0 ? round(($regular_price - $sale_price)/$regular_price * 100) : 0 );
                $product_save = ( $regular_price1 > 0 ? $regular_price1 - $sale_price1 : 0 );
           }
       }

        ?>
            
        <?php
        if ($count == 1) {?>
             <div class="item col-2x <?php echo $count; ?>" data-product-id="<?php echo esc_attr($product_id); ?>"  >
                <?php if($featured_image != '') { ?>
                <div class="image">
                    <div class="swiper-container gallery-slider3">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide"><?php echo $featured_image; ?><?php if (isset( $sale_price) &&  $sale_price != 0) {?> <div class="price-save"><div class="label"><?php echo esc_html__( 'Save', 'themesflat-core' ) ?></div><?php echo esc_html__( '$', 'themesflat-core' ).$product_save ?></div> <?php } ?> <?php echo themesflat_product_action_btn();?></div>
                            <?php
                            $attachment_ids = $product->get_gallery_image_ids();
                            if (isset($attachment_ids)) {$count = count($attachment_ids);} else $count = 0;
                                $c = 1;
                            if($count != 0) {
                                foreach( $attachment_ids as $attachment_id ) { 
                                    $image_link = wp_get_attachment_url( $attachment_id );?>
                                    <div class="swiper-slide"><img src="<?php echo $image_link; ?>" alt="Image"><?php if (isset( $sale_price) &&  $sale_price != 0) {?> <div class="price-save"><div class="label"><?php echo esc_html__( 'Save', 'themesflat-core' ) ?></div><?php echo esc_html__( '$', 'themesflat-core' ).$product_save ?></div> <?php } ?></div>
                                <?php $c++; if ($c > 2) break; }  }
                            ?>
                        </div>
                    </div>
                    <div class="swiper-container gallery-thumbs3">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide"><?php echo $featured_image; ?></div>
                            <?php
                            $attachment_ids = $product->get_gallery_image_ids();
                            $count = count($attachment_ids);
                            $c = 1;
                            if($count != 0) {
                                foreach( $attachment_ids as $attachment_id ) { 
                                    $image_link = wp_get_attachment_url( $attachment_id );?>
                                    <div class="swiper-slide"><img src="<?php echo $image_link; ?>" alt="Image"></div>
                                <?php $c++; if ($c > 2) break; }  }
                            ?>
                        </div>
                    </div>
                    
                </div>
                <?php } ?>
                <div class="bottom-product">
                    <div class="content">
                        <h3 class="name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <div class="price"><?php echo trim($product->get_price_html()); ?></div>
                    </div>
                    <?php
                        $time_sale = get_post_meta( $product_id, '_sale_price_dates_to', true );
                        if ( $time_sale ) { ?>
                            <div class="time-wrapper">
                                <div class=" tf-countdown  clearfix" 
                                    data-date="<?php echo  esc_attr( date( 'Y-m-d H:i:s', $time_sale ) )  ; ?>">
                                </div>
                            </div>
                    <?php } ?>
                </div>
                    
            </div>
        <?php  $count = 1;}
        else  { ?> 	
            <div class="item col-1x <?php echo $count; ?>" data-product-id="<?php echo esc_attr($product_id); ?>">
                <div class="ounner">
                    <div class="inner">
                        <div class="image">
                            <?php if($featured_image != '') { echo sprintf('%s',$featured_image);} ?>
                            <?php echo themesflat_product_action_btn();?>
                        </div>
                        <div class="content">
                            <?php themesflat_display_product_cat( $product_id ); ?>
                            <h3 class="name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            
                            <div class="price"><?php echo trim($product->get_price_html()); ?></div>
                        </div>
                        <div class="product-footer">
                            <?php echo tf_configuration(); ?>
                            <?php echo tf_delivery(); ?>
                            <?php echo themesflat_product_add_to_cart_btn(); ?>
                        </div>   
                    </div>        
                </div> 
            </div>
	 		
	  <?php }
      
      $count ++;
      if ($count > 6) {$count = 0;};
	  $output .= ob_get_clean();
      

    endwhile; wp_reset_postdata();  else:
      $output = '<h2>No posts found</h2>';

    endif;

    // $response = json_encode($output);
    echo $output;

    die();
  }

add_action('wp_ajax_tab_filter_posts', 'ajax_tab_filter_get_posts');
add_action('wp_ajax_nopriv_tab_filter_posts', 'ajax_tab_filter_get_posts');

// Filter Ajax tab

function ajax_tab_filter_get_product() {

    $tab_filter = $_POST['tab_filter'];
    $post_page = $_POST['post_page'];
    // $style = $_POST['style'];

    $image = $_POST['image'];
    $sale = $_POST['sale'];
    $group_btn = $_POST['group_btn'];
    $thum = $_POST['thum'];
    $meta = $_POST['meta'];
    $title = $_POST['title'];
    $price = $_POST['price'];
    $save_price = $_POST['save_price'];
    $coutdown = $_POST['coutdown'];
    $skillbar = $_POST['skillbar'];
    $information = $_POST['information'];
    $delivery = $_POST['delivery'];
    $add_to_cart = $_POST['add_to_cart'];


	
    // WP Query
	wp_reset_query();


    $args = array(
		'post_type' => 'product',
		'posts_per_page' => $post_page,
	);
    global $woocommerce;
    $number = $post_page + 1;
    
    switch(  $tab_filter ) {
        case 'sale':
            // $query_args['post__in'] = array_merge( array( 0 ), wc_get_product_ids_on_sale() );
            $args = array(
                'post_type'      => 'product',
                'posts_per_page' => $post_page,
                'meta_query'     => array(
                    'relation' => 'OR',
                    array( // Simple products type
                        'key'           => '_sale_price',
                        'value'         => 0,
                        'compare'       => '>',
                        'type'          => 'numeric'
                    ),
                    array( // Variable products type
                        'key'           => '_min_variation_sale_price',
                        'value'         => 0,
                        'compare'       => '>',
                        'type'          => 'numeric'
                    )
                )
            );
        break;

		case 'featured':
			$args['tax_query'][] = array(
				'taxonomy' => 'product_visibility',
				'field'    => 'name',
				'terms'    => 'featured',
				'operator' => 'IN',
				
			);
		break;

		case 'best_selling':
				
            $args['meta_key']='total_sales';
            $args['orderby']='meta_value_num';
            $args['ignore_sticky_posts']   = 1;
            $args['meta_query'] = array();
            $args['meta_query'][] = $woocommerce->query->stock_status_meta_query();
            $args['meta_query'][] = $woocommerce->query->visibility_meta_query();

        break;

        case 'top_rated': 
            $args = array(
                'posts_per_page' => $post_page,
                'no_found_rows'  => 1,
                'post_type'      => 'product',
                'meta_key'       => '_wc_average_rating',
                'orderby'        => 'meta_value_num',
                'meta_query'     => WC()->query->get_meta_query(),
                'tax_query'      => WC()->query->get_tax_query(),
            );
            
        break;

		case 'mixed_order':
			$args['orderby']    = 'rand';
		break;

		default: 
			/* Recent */
			$args['orderby']    = 'date';
			$args['order']      = 'desc';
		break;
	}
    $query = new WP_Query( $args );
		
	$output = '';
    $count = 0;
    if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
	  ob_start();
	  ?>

        <?php 
        global $product;
        $product_id = $product->get_id();
        // $get_id_post_thumbnail = get_post_thumbnail_id();
        if(get_the_post_thumbnail_url()) {
        $featured_image = sprintf('<img src="%s" alt="image">',get_the_post_thumbnail_url()); }
        else  $featured_image = '';

        $stock_sold = ( $total_sales = get_post_meta( $product_id, 'total_sales', true ) ) ? round( $total_sales ) : 0;
        $stock_available = ( $stock = get_post_meta( $product_id, '_stock', true ) ) ? round( $stock ) : 0;
        $total_stock = $stock_sold + $stock_available;
        $percentage = ( $stock_available > 0 ? round($stock_sold/$total_stock * 100) : 0 );

        $product_type = $product->get_type();
        $sale_price  = 0;
        $regular_price = 0;
        if($product_type === 'variable'){
            $product_variations = $product->get_available_variations();
            foreach ($product_variations as $kay => $value){
                if($value['display_price'] < $value['display_regular_price']){
                    $sale_price = $value['display_price'];
                    $regular_price = $value['display_regular_price'];
                }
            }
            $product_sale = ( $regular_price > 0 ? round(($regular_price - $sale_price)/$regular_price * 100) : 0 );
            // if($regular_price > $sale_price && $stock != 'outofstock') {
            //     // $product_sale = intval(((floatval($regular_price) - floatval($sale_price)) / floatval($regular_price)) * 100);
            //     $product_sale = ( $regular_price > 0 ? round(($regular_price - $sale_price)/$regular_price * 100) : 0 );
            // } else{
            //     return  '';
            // }
        } else {		
            $regular_price = get_post_meta( get_the_ID(), '_regular_price', true);
            $sale_price = get_post_meta( get_the_ID(), '_sale_price', true);
            $regular_price = intval(floatval($regular_price));
            $sale_price = intval(floatval($sale_price));
            // $product_sale = intval(((floatval($regular_price) - floatval($sale_price)) / floatval($regular_price)) * 100);
            $product_sale = ( $regular_price > 0 ? round(($regular_price - $sale_price)/$regular_price * 100) : 0 );                
        }
        ?>
        <div class="item" data-product-id="<?php echo esc_attr($product_id); ?>"  >
            <div class="ounner">
                <div class="inner">
                    <?php if ( $image == 'yes' ): ?>
                    <div class="image">
                        <?php if ( $sale == 'yes' ): ?>
                        <?php if ( isset($sale_price) && $sale_price != 0 ) { ?>
                            <div class="label-sale">
                                <div class="text"><?php echo esc_html__( 'SALE', 'onsus' ) ?></div>
                                <div class="percent-sale"><?php echo esc_attr($product_sale) . esc_html__( '%', 'onsus' )?></div>
                            </div>
                        <?php } ?>
                        <?php endif; ?>

                        <?php if($featured_image != '')  {echo sprintf('%s',$featured_image);}?>
                        
                        <?php if ( $group_btn == 'yes' ): ?>
                        <?php echo themesflat_product_action_btn();?>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?> 

                    <?php if ( $thum == 'yes' ): ?>
                    <?php echo tf_product_thumb();?>
                    <?php endif; ?> 

                    <div class="content">

                        <?php if ( $meta == 'yes' ): ?>
                        <?php themesflat_display_product_cat( $product_id ); ?>
                        <?php endif; ?> 

                        <?php if ( $title == 'yes' ): ?>
                        <h3 class="name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <?php endif; ?> 

                        <?php if ( $price == 'yes' ): ?>
                        <div class="price"><?php  echo str_replace("-"," ",$product->get_price_html()); ?></div>
                        <?php endif; ?> 

                        <?php if ( $coutdown == 'yes' ): ?>
                        <?php
                            $time_sale = get_post_meta( $product_id, '_sale_price_dates_to', true );
                            if ( $time_sale ) { ?>
                                <div class="time-wrapper">
                                    <div class=" tf-countdown  clearfix" 
                                        data-date="<?php echo  esc_attr( date( 'Y-m-d H:i:s', $time_sale ) )  ; ?>">
                                    </div>
                                </div>
                        <?php } ?>
                        <?php endif; ?>

                        <?php if ( $skillbar == 'yes' ): ?>
                        <?php if ( $stock_available > 0 ) { ?>
                        <div class="special-progress">
                            <div class="progress">
                                <span class="progress-bar" style="<?php echo esc_attr('width:' . $percentage . '%'); ?>"></span>
                            </div>
                            <div class="infor-sold">
                                <div class="left">
                                    <?php echo esc_html__('Sold: ','onsus').'<span class="text-theme">'.$stock_sold.'</span>'; ?>
                                    
                                </div>
                                <div class="right">
                                    <?php echo esc_html__('Available: ','onsus').'<span class="text-theme">'.$stock_available.'</span>'; ?>
                                </div>
                            </div>
                            
                        </div>
                        <?php } ?>
                        <?php endif; ?> 
                    </div>
                    <div class="product-footer">
                        <?php if ( $information == 'yes' ): ?>
                        <?php echo tf_configuration(); ?>
                        <?php endif; ?> 
                        <?php if ( $delivery == 'yes' ): ?>
                        <?php echo tf_delivery(); ?>
                        <?php endif; ?> 
                        <?php if ( $add_to_cart == 'yes' ): ?>
                        <?php echo themesflat_product_add_to_cart_btn(); ?>
                        <?php endif; ?> 
                    </div>
                </div>
            </div>        
        </div>
	 		
	  <?php
	  $output .= ob_get_clean();
      $count ++;
       if ($count >= $post_page) break;  

    endwhile; wp_reset_postdata();  else:
      $output = '<h2>No posts found</h2>';

    endif;

    // $response = json_encode($output);
    // echo $output;
    echo json_encode( $output );

    die();
  }

add_action('wp_ajax_tab_filter_product', 'ajax_tab_filter_get_product');
add_action('wp_ajax_nopriv_tab_filter_product', 'ajax_tab_filter_get_product');


// Get post views
function themesflat_set_post_views($postID) {
    $count_key = 'themesflat_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

function themesflat_track_post_views ($post_id) {
    if ( !is_single() ) return;
    if ( empty ( $post_id) ) {
        global $post;
        $post_id = $post->ID;    
    }
    themesflat_set_post_views($post_id);
}

add_action( 'wp_head', 'themesflat_track_post_views');

function themesflat_get_post_views($postID){
    $count_key = 'themesflat_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}


function tfre_reset_password_ajax() {
    check_ajax_referer('tfre_reset_password_ajax_nonce', 'tfre_security_reset_password');
    $user_login = isset($_POST['user_login']) ? wp_unslash($_POST['user_login']) : '';

    if ( empty( $user_login ) ) {
        echo json_encode(array( 'success' => false, 'message' => esc_html__('Enter a username or email address.', 'themesflat-core') ) );
        wp_die();
    }
    $login = trim( $user_login );
    $user_data = get_user_by('login', $login);
    // Check user by username first
    if ( empty( $user_data ) ){
        // Check user by email
        $user_data = get_user_by( 'email', $login );
        if(empty( $user_data )){
            echo json_encode(array( 'success' => false, 'message' => esc_html__('There is no user registered with that email or username.', 'themesflat-core') ) );
            wp_die();
        }
    }
    $user_login = $user_data->user_login;
    $user_email = $user_data->user_email;
    $key = get_password_reset_key( $user_data );
    if ( is_wp_error( $key ) ) {
        echo json_encode(array( 'success' => false, 'message' => $key ) );
        wp_die();
    }
   
    $message = esc_html__('You have requested to reset your password.', 'themesflat-core' ) . "\r\n\r\n";
    $message .= sprintf(esc_html__('Username: %s', 'themesflat-core'), $user_login) . "\r\n\r\n";
    $message .= esc_html__('If you did not request a password reset, please ignore this email.', 'themesflat-core') . "\r\n\r\n";
    $message .= esc_html__('To reset your password, visit the following address:', 'themesflat-core') . "\r\n\r\n";
    $message .= site_url("wp-login.php?action=rp&key=$key&login=" . rawurlencode($user_login), 'login') . "\r\n";
    $subject = sprintf( esc_html__('Password Reset Request', 'themesflat-core') );
    $subject = apply_filters( 'retrieve_password_title', $subject, $user_login, $user_data );
    $message = apply_filters( 'retrieve_password_message', $message, $key, $user_login, $user_data );
    if ( $message && !wp_mail( $user_email, $subject, $message ) ) {
        echo json_encode(array('success' => false, 'message' => esc_html__('The email could not be sent.', 'themesflat-core') . "<br />\n" . esc_html__('Possible reason: your host may have disabled the mail() function.', 'themesflat-core')));
        wp_die();
    } else {
        echo json_encode(array('success' => true, 'message' => esc_html__('Please check your email for reset password!', 'themesflat-core') ));
        wp_die();
    }
}
add_action('wp_ajax_tfre_reset_password_ajax', 'tfre_reset_password_ajax');
add_action('wp_ajax_nopriv_tfre_reset_password_ajax', 'tfre_reset_password_ajax');

function tfre_custom_register_ajax_handler () {
    check_ajax_referer('custom-ajax-nonce', 'security');
    $username = sanitize_user($_POST['username']);
    $email = sanitize_email($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    $response = array(
        'status'    => false,
        'message'   => ''
    );

    header('Content-Type: application/json');
    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        $response['message'] = esc_html__('All fields are required.', 'themesflat-core');
        echo json_encode($response);
        wp_die();
    }
    
    if (username_exists($username)) {
        $response['message'] = esc_html__('Username already exists. Please choose a different username.', 'themesflat-core');
        echo json_encode($response);
        wp_die();
    }

    if (!is_email($email)) {
        $response['message'] = esc_html__('Invalid email address', 'themesflat-core');
        echo json_encode($response);
        wp_die();
    }

    if (email_exists($email)) {
        $response['message'] = esc_html__('Email address is already registered.', 'themesflat-core');
        echo json_encode($response);
        wp_die();
    }

    if ($password !== $confirm_password) {
        $response['message'] = esc_html__('Passwords do not match.', 'themesflat-core');
        echo json_encode($response);
        wp_die();
    }

    // If no errors, create the user
    if (empty($errors)) {
        $user_id = wp_create_user($username, $password, $email);
        if (!is_wp_error($user_id)) {
            wp_set_current_user($user_id);
            wp_set_auth_cookie($user_id);
            $response['status'] = true;
            $response['message'] = esc_html__('Your account was created, login now!', 'themesflat-core');
            echo json_encode($response);
            wp_die();

        } else {
            $response['message'] = esc_html__('Cannot create a new account!', 'themesflat-core');
            wp_die();
        }
    }
}
add_action('wp_ajax_custom_register', 'tfre_custom_register_ajax_handler');
add_action('wp_ajax_nopriv_custom_register', 'tfre_custom_register_ajax_handler');

function tfre_custom_login_ajax_handler () {
    check_ajax_referer('custom-ajax-nonce', 'security');
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    $response = array(
        'status'    => false,
        'message'   => null
    );
    header('Content-Type: application/json');

    $credentials = array(
        'user_login'    => $username,
        'user_password' => $password,
    );

    $user = wp_signon($credentials, false);

    if (is_wp_error($user)) {
        // Login failed, handle the error
        $response['message'] = esc_html__('A account or password is invalid!', 'themesflat-core');
        echo json_encode($response);
        wp_die();
    } else {
        // Login successful
        wp_set_current_user($user->ID);
        wp_set_auth_cookie($user->ID);
        $response['status'] = true;
        $response['message'] = esc_html__('Login successful', 'themesflat-core');
        $response['redirect_url'] =  home_url();
        echo json_encode($response);
        wp_die();
    }
}
add_action('wp_ajax_custom_login', 'tfre_custom_login_ajax_handler');
add_action('wp_ajax_nopriv_custom_login', 'tfre_custom_login_ajax_handler');



function tfre_login_register_modal() {
    if ( !is_user_logged_in() ) {
        echo tf_get_template_widget("account/login-register-modal");
    }
}

add_action('wp_footer', 'tfre_login_register_modal');

function print_product_categories($categories,$parent=0) {
    $output = '';
    $children_class = '';
    foreach ($categories as $category) {
      if ($category->parent == $parent) {
        $children = get_terms(array(
            'taxonomy' => 'product_cat',
            'hide_empty' => false,
            'parent' => $category->term_id,
          ));
          if ($children) {
            $children_class = 'children';
          } else {
            $children_class = '';
          }
        $output .= '<li class='. $children_class .'>';
        // $output .= '<a href="' . get_term_link($category) . '">' . $category->name . '</a>';
        $output .= '<label class="tax-filter-rating taxonomy '. $category->slug . ' "  title="' . $category->slug . '" data-nametx="'. $category->name .' ">
        <span class="custom-check-box">
            <input type="checkbox">
            <span class="btn-checkbox"></span>
        </span>
        <span>'. $category->name .'</span>
    </label>';
    
       
    
        if ($children) {
          $output .= '<ul>';
          $output .= print_product_categories($children,$category->term_id);
          $output .= '</ul> <span class="toggle-category"></span>';
        }
    
        $output .= '</li>';
      }
    }
    
    return $output;
}