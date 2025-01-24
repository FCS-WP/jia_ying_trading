<?php 
global $product;
$product_id = $product->get_id();
$get_id_post_thumbnail = get_post_thumbnail_id();
if(\Elementor\Group_Control_Image_Size::get_attachment_image_src( $get_id_post_thumbnail, 'thumbnail', $settings )){
    $featured_image = sprintf('<img src="%s" class="img_thumbnail" alt="image">', \Elementor\Group_Control_Image_Size::get_attachment_image_src( $get_id_post_thumbnail, 'thumbnail', $settings )); 
} else $featured_image ='';


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
    if($regular_price > $sale_price && $stock != 'outofstock') {
        // $product_sale = intval(((floatval($regular_price) - floatval($sale_price)) / floatval($regular_price)) * 100);
        $product_sale = ( $regular_price > 0 ? round(($regular_price - $sale_price)/$regular_price * 100) : 0 );
    
    }else{
        return  '';
    }
}else{		
    $regular_price = get_post_meta( get_the_ID(), '_regular_price', true);
    $sale_price = get_post_meta( get_the_ID(), '_sale_price', true);
    $regular_price = intval(floatval($regular_price));
    $sale_price = intval(floatval($sale_price));
    // $product_sale = intval(((floatval($regular_price) - floatval($sale_price)) / floatval($regular_price)) * 100);
    $product_sale = ( $regular_price > 0 ? round(($regular_price - $sale_price)/$regular_price * 100) : 0 );
    
    if (isset($sale_price) && $sale_price != 0 && isset($regular_price) && $regular_price != 0 ) {
        // $product_sale = intval(((floatval($regular_price) - floatval($sale_price)) / floatval($regular_price)) * 100);
        $product_sale = ( $regular_price > 0 ? round(($regular_price - $sale_price)/$regular_price * 100) : 0 );
    }
}
?>
<div class="item" data-product-id="<?php echo esc_attr($product_id); ?>"  >
    <div class="ounner">
        <div class="inner">
            <div class="left">
                <?php if ( $settings['show_image'] == 'yes' ): ?>
                <div class="image">
                    <?php if ( $settings['show_sale2'] == 'yes' ): ?>
                    <?php if ( isset($regular_price) && $regular_price != 0 && isset($sale_price) && $sale_price != 0  ) { ?>
                        <div class="label-sale">
                            <div class="text"><?php echo esc_html__( 'SALE', 'onsus' ) ?></div>
                            <div class="percent-sale"><?php echo esc_attr($product_sale) . esc_html__( '%', 'onsus' )?></div>
                        </div>
                    <?php } ?>
                    <?php endif; ?>

                    <?php if($featured_image != '') { ?><a href="<?php the_permalink(); ?>"><?php echo sprintf('%s',$featured_image); ?></a> <?php } ?>
                    
                    
                    
                </div>
                <?php endif; ?> 

                <?php if ( $settings['show_thum2'] == 'yes' ): ?>
                <?php echo tf_product_thumb();?>
                <?php endif; ?> 
            </div>
            <div class="content">
                <div class="content-inner">
                    <?php if ( $settings['show_meta'] == 'yes' ): ?>
                    <?php themesflat_display_product_cat( $product_id ); ?>
                    <?php endif; ?> 

                    <?php if ( $settings['show_title'] == 'yes' ): ?>
                    <h3 class="name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <?php endif; ?> 

                    <div class="group-bt">
                    <?php if ( $settings['show_price'] == 'yes' ): ?>
                    <div class="price"><?php  echo str_replace(""," ",$product->get_price_html()); ?></div>
                    <?php endif; ?> 

                    <?php if ( $settings['show_group_btn2'] == 'yes' ): ?>
                    <?php echo themesflat_product_action_btn_2();?>                    
                    <?php endif; ?>

                    </div>
                    
                    <?php if ( $settings['show_add_to_cart'] == 'yes' ): ?>
                    <?php //echo themesflat_product_add_to_cart_btn(); ?>
                    <?php endif; ?> 

                    <?php if ( $settings['show_coutdown2'] == 'yes' ): ?>
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

                    <?php if ( $settings['show_skillbar2'] == 'yes' ): ?>
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
               

            </div>
            <?php if ( $settings['show_information'] == 'yes' || $settings['show_delivery'] == 'yes' ) { ?>
                <div class="product-footer">
                    <?php if ( $settings['show_information'] == 'yes' ): ?>
                    <?php echo tf_configuration(); ?>
                    <?php endif; ?> 
                    <?php if ( $settings['show_delivery'] == 'yes' ): ?>
                    <?php echo tf_delivery(); ?>
                    <?php endif; ?>                     
                </div>
            <?php } ?> 
        </div>
    </div>        
</div>